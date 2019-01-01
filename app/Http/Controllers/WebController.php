<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\customers;
use Session;
use App\Service;
use App\Clientsms;
use App\Work;
use Carbon\Carbon;
class WebController extends Controller
{
  public function __construct()
  {
      // $this->middleware('auth');
  }
  public function index(){
    $allcustomer=DB::table('customers')
        ->where('status',1)
        ->orderBy('customer_id', 'desc')
        //->limit(5)
        ->get();
        //print_r($allcustomer);
    $allbanner=DB::table('banners')
          ->where('status',1)
          ->orderBy('updated_at', 'desc')->first();

    $allabout=DB::table('abouts')
          ->where('status',1)
          ->orderBy('updated_at', 'asc')
          ->first();

    $allservice=DB::table('services')
        ->where('status',1)
        ->orderBy('id', 'desc')
        ->limit(6)
        ->get();
        // print_r($allservice);
    $allblog=DB::table('blogs')
        ->where('status',1)
        ->orderBy('id', 'desc')
        ->limit(3)
        ->get();

    $allwork=DB::table('works')
        ->where('status',1)
        ->orderBy('id', 'desc')
        ->limit(6)
        ->get();


        $allcategory=DB::table('categories')
            ->where('status',1)
            ->orderBy('category_id', 'desc')
            ->limit(6)
            ->get();
  return view('demo', compact('allcustomer','allbanner','allabout','allservice','allblog','allwork','allcategory'));
  }





  //insert_procedure
    public function insert(Request $request)
    {
      $this->validate($request,
      [

        'name'=>'required',
        'email'=>'required',
        'subject'=>'required',
        'textarea'=>'required'
      ],
      [
        'name.required'=>'Please Enter Your name',
        'email.required'=>'Please Enter Your email',
        'subject.required'=>'Please Enter Your subject',
        'textarea.required'=>'Please Enter Your textarea'
      ]
    );
      $insert=Clientsms::insertGetId(
        [

          'name'=>$_POST['name'],
          'email'=>$_POST['email'],
          'subject'=>$_POST['subject'],
          'textarea'=>$_POST['textarea'],
          'created_at'=>Carbon::now('Asia/Dhaka')->toDateTimeString()

        ]
      );
      if ($insert) {
        Session::flash('success','value');
        return redirect('/#contact');
      }
      else {
        Session::flash('error','value');
        return redirect('/#contact');
      }
    }
}
