<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\user;
use App\customers;
use Session;
use Helper;
use Image;
use validate;

class CustomerController extends Controller
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
    $orderField = ['customer_id', 'customer_name', 'customer_email', 'customer_phone'];
    $paginate = customers::paginate($orderField);
    $data['sn'] = $paginate->serial;

    if(!empty($asc)) {
      $ascDesc = 'asc'; $field = $orderField[$asc];
    } else if(!empty($desc)) {
      $ascDesc = 'desc'; $field = $orderField[$desc];
    } else {
      $ascDesc = 'desc'; $field = $orderField[0];
    }

  $searchTerm = $request->input('search');
  $allcustomer=DB::table('customers')
      ->when($searchTerm, function ($query) use ($searchTerm) {
          return $query->where('customer_name', 'like', '%'.$searchTerm.'%')
                        ->where('status',1)
                       ->orWhere('customer_phone', 'like', '%' .$searchTerm. '%');

      })
      ->orderBy($field,$ascDesc)
      ->where('status',1)
      ->paginate($paginate->perPage);
      // print_r($paginate->perPage);
      return view('user.all', compact('allcustomer', 'searchTerm', 'asc'));
}

//add_form
  public function create(Request $request)
  {
    $data['inputData'] = $request->all();
    return view('user.add', $data);
  }

//insert_procedure
  public function insert(Request $request)
  {
    $this->validate($request,
    [
      'name'=>'required',
      'email'=>'required',
      'phone'=>'required',
      'pic'=>'required'
    ],
    [
      'name.required'=>'Please Enter Your Name',
      'email.required'=>'Please Enter Your Email',
      'phone.required'=>'Please Enter Your Phone',
      'pic.required'=>'Please Enter Your Photo'
    ]
  );
    $insert=customers::insertGetId(
      [
        'customer_name'=>$_POST['name'],
        'customer_email'=>$_POST['email'],
        'customer_phone'=>$_POST['phone'],
        'customer_image'=>''
      ]
    );
    if ($request->hasFile('pic')) {
      $image= $request->File('pic');
      $ImageName='customer-'.$insert.'-'.time().'.'.$image->getClientOriginalExtension();
      Image::make($image)->resize(300,250)->save(base_path('public/uploads/').$ImageName);
      customers::where('customer_id',$insert)->update(
        [
          'customer_image'=>$ImageName
        ]
      );
    }

    if ($insert) {
      Session::flash('success','value');
      return redirect('admin/add-user');
    }
    else {
      Session::flash('error','value');
      return redirect('admin/add-user');
    }
  }


//view_part_with_procedure
  public function view($id){
    $customer=customers::where('status',1)->where('customer_id',$id)->first();
    return view('user.view', compact('customer'));
        // return view('user.view');

  }

  //softdelete_procedure
  public function softdelete1($id)
  {
      $softdelete=customers::where('customer_id',$id)
      ->update(
        [
          'status'=>0
        ]
        );
        if ($softdelete) {
          return redirect('admin/all-user');
        }
  }

//update_form
  public function edit($id){
    $allcustomer=customers::where('status',1)->where('customer_id',$id)->first();
    return view('user.edit', compact('allcustomer'));
  }
//update_procedure
  public function update(Request $request){
    $id=$_POST['id'];
    $this->validate($request,
    [
      'name'=>'required',
      'email'=>'required',
      'phone'=>'required'

    ],
    [
      'name.required'=>'Please Enter Your Name',
      'email.required'=>'Please Enter Your Email',
      'phone.required'=>'Please Enter Your Phone'

    ]
  );
  $update=customers::where('customer_id',$id)->update(
    [
      'customer_name'=>$_POST['name'],
      'customer_email'=>$_POST['email'],
      'customer_phone'=>$_POST['phone']
    ]
  );

      if ($request->hasFile('pic')) {
        $image= $request->File('pic');
        $ImageName='customer-'.$update.'-'.time().'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,250)->save(base_path('public/uploads/').$ImageName);
        customers::where('customer_id',$id)->update(
          [
            'customer_image'=>$ImageName
          ]
        );
      }


  if ($update) {
    Session::flash('success','value');
    return redirect('admin/all-user');
  }
  else {
    Session::flash('error','value');
    return redirect('admin/edit-user');
  }
  }


}
