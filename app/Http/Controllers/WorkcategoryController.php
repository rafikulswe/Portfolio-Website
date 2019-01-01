<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\user;
use App\Work;
use App\Category;
use Session;
use Image;
use validate;
use Carbon\Carbon;
class WorkcategoryController extends Controller
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
    $orderField = ['category_id', 'category_name'];
    $paginate = Category::paginate($orderField);
    $data['sn'] = $paginate->serial;

    if(!empty($asc)) {
      $ascDesc = 'asc'; $field = $orderField[$asc];
    } else if(!empty($desc)) {
      $ascDesc = 'desc'; $field = $orderField[$desc];
    } else {
      $ascDesc = 'desc'; $field = $orderField[0];
    }

  $searchTerm = $request->input('search');
  $allworkcategory=DB::table('categories')
      ->when($searchTerm, function ($query) use ($searchTerm) {
          return $query->where('category_id', 'like', '%'.$searchTerm.'%')
                        ->where('status',1)
                       ->orWhere('category_name', 'like', '%' .$searchTerm. '%');

      })
      ->orderBy($field,$ascDesc)
      ->where('status',1)
      ->paginate($paginate->perPage);
      // print_r($paginate->perPage);
      return view('category.all', compact('allworkcategory', 'searchTerm', 'asc'));
    }

    //add_form
      public function create(Request $request)
      {
        $data['inputData'] = $request->all();
        return view('category.add', $data);
      }

    //insert_procedure
      public function insert(Request $request)
      {
        $this->validate($request,
        [

          'category_name'=>'required'

        ],
        [

          'category_name.required'=>'Please Enter Your category_name'

        ]
      );
        $insert=Category::insertGetId(
          [

            'category_name'=>$_POST['category_name'],
            'created_at'=>Carbon::now('Asia/Dhaka')->toDateTimeString()
          ]
        );

        if ($insert) {
          Session::flash('success','value');
          return redirect('admin/add-work-category');
        }
        else {
          Session::flash('error','value');
          return redirect('admin/add-work-category');
        }
      }

      //update_form
        public function edit($id){
          $allworkcategory=Category::where('status',1)->where('category_id',$id)->first();
          return view('category.edit', compact('allworkcategory'));
        }
      //update_procedure
        public function update(Request $request){
          $id=$_POST['id'];
          $this->validate($request,
          [
            'category_name'=>'required'
          ],
          [
            'category_name.required'=>'Please Enter Your category_name'
          ]
        );
        $update=Category::where('category_id',$id)->update(
          [
            'category_name'=>$_POST['category_name']

          ]
        );

        if ($update) {
          Session::flash('success','value');
          return redirect('admin/all-work-category');
        }
        else {
          Session::flash('error','value');
          return redirect('admin/all-work-category');
        }
        }
}
