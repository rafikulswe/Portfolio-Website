<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\user;
use App\Blog;
use Session;
use Image;
use validate;
use Carbon\Carbon;
class BlogController extends Controller
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
    $orderField = ['id', 'title', 'sub_titile', 'image'];
    $paginate = Blog::paginate($orderField);
    $data['sn'] = $paginate->serial;

    if(!empty($asc)) {
      $ascDesc = 'asc'; $field = $orderField[$asc];
    } else if(!empty($desc)) {
      $ascDesc = 'desc'; $field = $orderField[$desc];
    } else {
      $ascDesc = 'desc'; $field = $orderField[0];
    }

  $searchTerm = $request->input('search');
  $allblog=DB::table('blogs')
      ->when($searchTerm, function ($query) use ($searchTerm) {
          return $query->where('title', 'like', '%'.$searchTerm.'%')
                        ->where('status',1)
                       ->orWhere('sub_titile', 'like', '%' .$searchTerm. '%');

      })
      ->orderBy($field,$ascDesc)
      ->where('status',1)
      ->paginate($paginate->perPage);
      // print_r($paginate->perPage);
      return view('blog.all', compact('allblog', 'searchTerm', 'asc'));
}

//add_form
  public function create(Request $request)
  {
    $data['inputData'] = $request->all();
    return view('blog.add', $data);
  }

//insert_procedure
  public function insert(Request $request)
  {
    $this->validate($request,
    [
      'title'=>'required',
      'sub_titile'=>'required',
      'pic'=>'required'

    ],
    [
      'title.required'=>'Please Enter Your title',
      'sub_titile.required'=>'Please Enter Your sub_titile',
      'pic.required'=>'Please Enter Your photo'

    ]
  );
    $insert=Blog::insertGetId(
      [
        'title'=>$_POST['title'],
        'sub_titile'=>$_POST['sub_titile'],
        'created_at'=>Carbon::now('Asia/Dhaka')->toDateTimeString(),
        'image'=>''
      ]
    );
    if ($request->hasFile('pic')) {
      $image= $request->File('pic');
      $ImageName='blog-'.$insert.'-'.time().'.'.$image->getClientOriginalExtension();
      Image::make($image)->resize(2000,1333)->save(base_path('public/uploads/').$ImageName);
      Blog::where('id',$insert)->update(
        [
          'image'=>$ImageName
        ]
      );
    }

    if ($insert) {
      Session::flash('success','value');
      return redirect('admin/add-blog');
    }
    else {
      Session::flash('error','value');
      return redirect('admin/add-blog');
    }
  }

  //update_form
    public function edit($id){
      $allblog=Blog::where('status',1)->where('id',$id)->first();
      return view('blog.edit', compact('allblog'));
    }
  //update_procedure
    public function update(Request $request){
          $id=$_POST['id'];
      $this->validate($request,
      [
        'title'=>'required',
        'sub_titile'=>'required'
      ],
      [
        'title.required'=>'Please Enter Your title',
        'sub_titile.required'=>'Please Enter Your sub_titile'
      ]
    );
    $update=Blog::where('id',$id)->update(
      [
        'title'=>$_POST['title'],
        'sub_titile'=>$_POST['sub_titile'],
        'created_at'=>Carbon::now('Asia/Dhaka')->toDateTimeString()
      ]
    );
    if ($request->hasFile('pic')) {
      $image= $request->File('pic');
      $ImageName='blog-'.$update.'-'.time().'.'.$image->getClientOriginalExtension();
      Image::make($image)->resize(2000,1333)->save(base_path('public/uploads/').$ImageName);
      Blog::where('id',$id)->update(
        [
          'image'=>$ImageName
        ]
      );
    }

    if ($update) {
      Session::flash('success','value');
      return redirect('admin/all-blog');
    }
    else {
      Session::flash('error','value');
      return redirect('admin/edit-blog');
    }
    }

}
