<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\Clientsms;
use Session;
use validate;
use DB;
class SmsController extends Controller
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
    $orderField = ['name', 'email', 'subject','textarea'];
    $paginate = Clientsms::paginate($orderField);
    $data['sn'] = $paginate->serial;

    if(!empty($asc)) {
      $ascDesc = 'asc'; $field = $orderField[$asc];
    } else if(!empty($desc)) {
      $ascDesc = 'desc'; $field = $orderField[$desc];
    } else {
      $ascDesc = 'desc'; $field = $orderField[0];
    }

  $searchTerm = $request->input('search');
  $allsms=DB::table('Clientsms')
      ->when($searchTerm, function ($query) use ($searchTerm) {
          return $query->where('name', 'like', '%'.$searchTerm.'%')
                        ->where('status',1)
                       ->orWhere('email', 'like', '%' .$searchTerm. '%');

      })
      ->orderBy($field,$ascDesc)
      ->where('status',1)
      ->paginate($paginate->perPage);
      // print_r($paginate->perPage);
      return view('Clientsms.all', compact('allsms', 'searchTerm', 'asc'));
    }

    //softdelete_procedure
    public function softdelete1($id)
    {
      $softdelete=Clientsms::where('id',$id)
      ->update(
        [
          'status'=>0
        ]
        );
        if ($softdelete) {
          return redirect('admin/all-sms');
        }
    }

    //view_part_with_procedure
      public function view($id){
        $sms=Clientsms::where('status',1)->where('id',$id)->first();
        return view('Clientsms.view', compact('sms'));
            // return view('user.view');

      }
}
