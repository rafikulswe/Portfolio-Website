<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\user;
use App\Banner;
use Session;
use Image;
use validate;
class BannerController extends Controller
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
    $orderField = ['id', 'customer_image'];
    $paginate = Banner::paginate($orderField);
    $data['sn'] = $paginate->serial;

    if(!empty($asc)) {
      $ascDesc = 'asc'; $field = $orderField[$asc];
    } else if(!empty($desc)) {
      $ascDesc = 'desc'; $field = $orderField[$desc];
    } else {
      $ascDesc = 'desc'; $field = $orderField[0];
    }

  $searchTerm = $request->input('search');
  $allbanner=DB::table('banners')
      ->when($searchTerm, function ($query) use ($searchTerm) {
          return $query->where('id', 'like', '%'.$searchTerm.'%')
                        ->where('status',1);
                       // ->orWhere('customer_phone', 'like', '%' .$searchTerm. '%');

      })
      ->orderBy($field,$ascDesc)
      ->where('status',1)
      ->paginate($paginate->perPage);
      // print_r($paginate->perPage);
      return view('banner.all', compact('allbanner', 'searchTerm', 'asc'));
    }



    //add_form
      public function create(Request $request)
      {
        $data['inputData'] = $request->all();
        return view('banner.add', $data);
      }

      //insert_procedure
        public function insert(Request $request)
        {
          $this->validate($request,
          [
            'pic'=>'required'
          ],
          [
            'pic.required'=>'Please Enter Your Banner'
          ]
        );
          $insert=Banner::insertGetId(
            [
              'customer_image'=>''
            ]
          );
          if ($request->hasFile('pic')) {
            $image= $request->File('pic');
            $ImageName='banner-'.$insert.'-'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(2000,1333)->save(base_path('public/uploads/banners').$ImageName);
          }
          Banner::where('id',$insert)->update(
            [
              'customer_image'=>$ImageName
            ]
          );
          if ($insert) {
            Session::flash('success','value');
            return redirect('admin/add-banner');
          }
          else {
            Session::flash('error','value');
            return redirect('admin/add-banner');
          }
        }

        //softdelete_procedure
        public function softdelete1($id)
        {
            $softdelete=Banner::where('id',$id)
            ->update(
              [
                'status'=>0
              ]
              );
              if ($softdelete) {
                return redirect('admin/all-banner');
              }
        }

}
