@extends('layouts.admin')
@section('all-banner')
<div class="row data-list">
    <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="col-sm-9">
                <strong>Banner Information</strong>
            </div>
            <div class="clearfix"></div>

          </div>
          <div class="panel-body" >
            <?php $defaultPerPage=4; if(empty($perPageArray)) { $perPageArray = array(5, 10, 20, 100); } ?>
          <div class="dataTables_length">
                <a href="{{url('admin/add-banner')}}" class="add-btn btn btn-default pull-right btn-sm"> <i class="fa fa-plus-square"></i> Add Banner</a>
            <label>
                  <span>
                      <select name="basic-datatables_length" class="form-control input-sm" id="perPage">
                          @foreach($perPageArray as $perPageVal)
                          <option onclick="myFunction()" @if(!empty($perPage) && ($perPage==$perPageVal)) {{'selected'}} @elseif(empty($perPage) && ($defaultPerPage==$perPageVal)) {{'selected'}} @endif value="{{$perPageVal}}">{{$perPageVal}}</option>
                          @endforeach
                      </select>
                  </span>
              </label>
          </div>

          <form method="get" action="{{url('/admin/all-banner')}}" role="search">
            {{csrf_field()}}

          <div class="input-group col-md-3">
                <input name="search" type="text" class="data-search form-control" id="search-input" placeholder="Search">
                <span class="input-group-btn"><button value="search" class="data-search btn btn-default" type="submit">Search</button></span>
          </div>
          </form><br>

            <table class="table table-striped table-bordered">
                <thead>
                    <tr class="active">
                        <th onclick="javascript:location.replace('{{url('/admin/all-banner?'.(($asc==1)?'desc':'asc').'=1')}}')" >Id <i id="btn1" class="fa fa-sort-up"></i></th>
                        <th>Banner</th>
                        <th>Manage</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($allbanner as $data)
                    <tr>
                        <td>{{$data->id}}</td>
                        <td align="center"><img src="{{asset('uploads/banners'.$data->customer_image)}}" height="50" width="50"/></td>

                        <td class="col-md-1">
                            <a href="{{url('admin/banner/softdelete/'.$data->id)}}" title="Delete"><i class="fa fa-trash"></i></a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <?php echo $allbanner->render(); ?>

          </div>
          <div class="panel-footer">
            .
          </div>
        </div>
    </div>
</div>
@endsection
