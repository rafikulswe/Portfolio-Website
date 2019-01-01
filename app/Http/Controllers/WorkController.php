<?php

namespace App\Http\Controllers;
use DB;
use App\user;
use App\Work;
use Session;
use Image;
use validate;
use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Requests;

class WorkController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  //showlist
  public function index(Request $request)
  {

    $asc = $request->input('asc');
    $desc = $request->input('desc');
    $orderField = ['id', 'category', 'about', 'image'];
    $paginate = Work::paginate($orderField);
    $data['sn'] = $paginate->serial;
    $data['asc'] = $asc;

    if(!empty($asc)) {
      $ascDesc = 'asc'; $field = $orderField[$asc];
    } else if(!empty($desc)) {
      $ascDesc = 'desc'; $field = $orderField[$desc];
    } else {
      $ascDesc = 'desc'; $field = $orderField[0];
    }

  $searchTerm = $request->input('search');



  $data["our_work"] = Work::join("categories", "works.category", "=", "categories.category_id")
       ->select("works.*", "categories.category_name")
       ->where(function($query) use ($searchTerm)
       {
           $query->where('works.about', 'LIKE', '%'.$searchTerm.'%')
               ->orWhere('categories.category_name', 'LIKE', '%'.$searchTerm.'%');
       })
       ->where('works.status',1)
       ->orderBy($field,$ascDesc)
       ->paginate($paginate->perPage);




  // $allwork=DB::table('works')
  //     ->when($searchTerm, function ($query) use ($searchTerm) {
  //         return $query->where('category', 'like', '%'.$searchTerm.'%')
  //                       ->where('status',1)
  //                      ->orWhere('about', 'like', '%' .$searchTerm. '%');
  //
  //     })
  //     ->orderBy($field,$ascDesc)
  //     ->where('status',1)
  //     ->paginate($paginate->perPage);
      // print_r($paginate->perPage);
      return view('work.all', $data);
    }

    //add_form
      public function create(Request $request)
      {
        $data['inputData'] = $request->all();
        $data['allworkcategory']=DB::table('categories')
            ->where('status',1)
            ->get();
        return view('work.add', $data);

      }

    //insert_procedure
      public function insert(Request $request)
      {
        $this->validate($request,
        [
          'category'=>'required',
          'about'=>'required'

        ],
        [
          'category.required'=>'Please Enter Your category',
          'about.required'=>'Please Enter about photo'

        ]
      );
        $insert=Work::insertGetId(
          [
            'category'=>$_POST['category'],
            'about'=>$_POST['about'],
            'image'=>''
          ]
        );
        if ($request->hasFile('pic')) {
          $image= $request->File('pic');
          $ImageName='works-'.$insert.'-'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->resize(600,400)->save(base_path('public/uploads/').$ImageName);
        }
        Work::where('id',$insert)->update(
          [
            'image'=>$ImageName
          ]
        );
        if ($insert) {
          Session::flash('success','value');
          return redirect('admin/add-work');
        }
        else {
          Session::flash('error','value');
          return redirect('admin/add-work');
        }
      }


      //softdelete_procedure
      public function softdelete1($id)
      {
          $softdelete=Work::where('id',$id)
          ->update(
            [
              'status'=>0
            ]
            );
            if ($softdelete) {
              return redirect('admin/all-work');
            }
      }
}
