<?php

namespace App;
use App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
  //Pagination
  public static function paginate($data=[], $perPage=4) {
      $perPage = (empty($data) || empty($data['perPage'])) ? $perPage : $data['perPage'];
      $serial = (!empty($data) && !empty($data['page']) && ($data['page']>1)) ? ($perPage*($data['page']-1))+1 : 1;
      return (object) ['perPage' => $perPage, 'serial' => $serial];
  }
}
