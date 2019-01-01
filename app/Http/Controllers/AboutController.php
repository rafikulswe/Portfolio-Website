<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\About;
use App\user;
use Session;
use validate;
class AboutController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index(Request $request)
  {
    $asc = $request->input('asc');
    $desc = $request->input('desc');
    $orderField = ['title', 'details','subtitle','subdetails'];
    $paginate = About::paginate($orderField);
    $data['sn'] = $paginate->serial;

    if(!empty($asc)) {
      $ascDesc = 'asc'; $field = $orderField[$asc];
    } else if(!empty($desc)) {
      $ascDesc = 'desc'; $field = $orderField[$desc];
    } else {
      $ascDesc = 'desc'; $field = $orderField[0];
    }

  $searchTerm = $request->input('search');
  $allabout=DB::table('abouts')
      ->when($searchTerm, function ($query) use ($searchTerm) {
          return $query->where('title', 'like', '%'.$searchTerm.'%')
                        ->where('status',1);
                       // ->orWhere('customer_phone', 'like', '%' .$searchTerm. '%');

      })
      ->orderBy($field,$ascDesc)
      ->where('status',1)
      ->paginate($paginate->perPage);
      // print_r($paginate->perPage);
      return view('about.all', compact('allabout', 'searchTerm', 'asc'));
    }


    //add_form
      public function create(Request $request)
      {
        $data['inputData'] = $request->all();
        return view('about.add', $data);
      }


      //insert_procedure
        public function insert(Request $request)
        {
          $this->validate($request,
          [
            'title'=>'required',
            'details'=>'required',
            'subtitle'=>'required',
            'subdetails'=>'required'
          ],
          [
            'title.required'=>'Please Enter Your title',
            'details.required'=>'Please Enter Your details',
            'subtitle.required'=>'Please Enter Your subtitle',
            'subdetails.required'=>'Please Enter Your subdetails'
          ]
        );
          $insert=About::insertGetId(
            [
              'title'=>$_POST['title'],
              'details'=>$_POST['details'],
              'subtitle'=>$_POST['subtitle'],
              'subdetails'=>$_POST['subdetails'],

            ]
          );
          if ($insert) {
            Session::flash('success','value');
            return redirect('admin/add-about');
          }
          else {
            Session::flash('error','value');
            return redirect('admin/add-about');
          }
        }



        //update_form
          public function edit($id){
            $allabout=About::where('status',1)->where('id',$id)->first();
            return view('about.edit', compact('allabout'));
          }
        //update_procedure
          public function update(Request $request){
            $id=$_POST['id'];
            $this->validate($request,
            [
              'title'=>'required',
              'details'=>'required',
              'subtitle'=>'required',
              'subdetails'=>'required'
            ],
            [
              'title.required'=>'Please Enter Your title',
              'details.required'=>'Please Enter Your details',
              'subtitle.required'=>'Please Enter Your subtitle',
              'subdetails.required'=>'Please Enter Your subdetails'
            ]
          );
          $update=About::where('id',$id)->update(
            [
              'title'=>$_POST['title'],
              'details'=>$_POST['details'],
              'subtitle'=>$_POST['subtitle'],
              'subdetails'=>$_POST['subdetails'],
            ]
          );

          if ($update) {
            Session::flash('success','value');
            return redirect('admin/all-about');
          }
          else {
            Session::flash('error','value');
            return redirect('admin/edit-about');
          }
          }

        //softdelete_procedure
        public function softdelete1($id)
        {
            $softdelete=About::where('id',$id)
            ->update(
              [
                'status'=>0
              ]
              );
              if ($softdelete) {
                return redirect('admin/all-about');
              }
        }
}
