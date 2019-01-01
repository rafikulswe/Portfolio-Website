@extends('layouts.admin')
@section('all-user')
<div class="row data-list">
    <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="col-sm-9">
                <strong>Users Information</strong>
            </div>
            <div class="clearfix"></div>

          </div>
          <div class="panel-body" >
            <?php $defaultPerPage=4; if(empty($perPageArray)) { $perPageArray = array(5, 10, 20, 100); } ?>
          <div class="dataTables_length">
                <a href="{{url('admin/add-user')}}" class="add-btn btn btn-default pull-right btn-sm"> <i class="fa fa-plus-square"></i> Add User</a>
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

          <form method="get" action="{{url('/admin/all-user')}}" role="search">
            {{csrf_field()}}
          <!-- <input type="text" placeholder="search" name="search" />
          <input type="submit" value="search" /> -->
          <div class="input-group col-md-3">
                <input name="search" type="text" class="data-search form-control" id="search-input" placeholder="Search">
                <span class="input-group-btn"><button value="search" class="data-search btn btn-default" type="submit">Search</button></span>
          </div>
          </form><br>

            <table class="table table-striped table-bordered">
                <thead>
                    <tr class="active">
                        <th onclick="javascript:location.replace('{{url('/admin/all-user?'.(($asc==1)?'desc':'asc').'=1')}}')" >Name <i id="btn1" class="fa fa-sort-up"></i></th>
                        <th onclick="javascript:location.replace('{{url('/admin/all-user?'.(($asc==2)?'desc':'asc').'=2')}}')">Email <i id="col2" class="fa fa-sort-up"></i></th>
                        <th onclick="javascript:location.replace('{{url('/admin/all-user?'.(($asc==3)?'desc':'asc').'=3')}}')">Phone <i id="col3" class="fa fa-sort-up"></i></th>
                        <!-- <th>User Role</th> -->
                        <!-- <th>Status</th> -->
                        <!-- <th>Photo</th> -->
                        <th>Manage</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($allcustomer as $data)
                    <tr>
                        <td>{{$data->customer_name}}</td>
                        <td>{{$data->customer_email}}</td>
                        <td>{{$data->customer_phone}}</td>
                        <!-- <td align="center"><img src="{{asset('uploads/'.$data->customer_image)}}" height="50" width="50"/></td> -->

                        <td>
                            <a href="{{url('admin/user-view/'.$data->customer_id)}}" title="View"><i class="fa fa-eye"></i></a>
                            <a href="{{url('admin/user/edit/'.$data->customer_id)}}" title="Edit"><i class="fa fa-pencil-square"></i></a>
                            <a href="{{url('admin/user/softdelete/'.$data->customer_id)}}" title="Delete"><i class="fa fa-trash"></i></a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <?php echo $allcustomer->render(); ?>

          </div>
          <div class="panel-footer">
            .
          </div>
        </div>
    </div>
</div>
@endsection
