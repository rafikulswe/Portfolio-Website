<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Service;
use App\user;
use Session;
use validate;
use Carbon\Carbon;
class ServiceController extends Controller
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
    $orderField = ['id', 'service_title', 'service_details'];
    $paginate = Service::paginate($orderField);
    $data['sn'] = $paginate->serial;

    if(!empty($asc)) {
      $ascDesc = 'asc'; $field = $orderField[$asc];
    } else if(!empty($desc)) {
      $ascDesc = 'desc'; $field = $orderField[$desc];
    } else {
      $ascDesc = 'desc'; $field = $orderField[0];
    }

  $searchTerm = $request->input('search');
  $allservice=DB::table('services')
      ->when($searchTerm, function ($query) use ($searchTerm) {
          return $query->where('service_title', 'like', '%'.$searchTerm.'%')
                        ->where('status',1)
                       ->orWhere('service_details', 'like', '%' .$searchTerm. '%');

      })
      ->orderBy($field,$ascDesc)
      ->where('status',1)
      ->paginate($paginate->perPage);
      // print_r($paginate->perPage);
      return view('service.all', compact('allservice', 'searchTerm', 'asc'));
    }

    //add_form
      public function create(Request $request)
      {
        $data['inputData'] = $request->all();
        return view('service.add', $data);
      }

    //insert_procedure
      public function insert(Request $request)
      {
        $this->validate($request,
        [

          'service_title'=>'required',
          'service_details'=>'required'
        ],
        [
          'service_title.required'=>'Please Enter Your service_title',
          'service_details.required'=>'Please Enter Your service_details'
        ]
      );
        $insert=Service::insertGetId(
          [

            'service_title'=>$_POST['service_title'],
            'service_details'=>$_POST['service_details'],
            'created_at'=>Carbon::now('Asia/Dhaka')->toDateTimeString()

          ]
        );
        if ($insert) {
          Session::flash('success','value');
          return redirect('admin/add-service');
        }
        else {
          Session::flash('error','value');
          return redirect('admin/add-service');
        }
      }
}
