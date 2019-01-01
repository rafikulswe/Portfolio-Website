@extends('layouts.admin')
@section('add-service')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="col-sm-9">
                <strong>Services Information</strong>
            </div>

              <div class="col-sm-3">
                <a href="{{url('admin/all-service')}}" class="add-btn btn btn-default pull-right btn-md"> <i class="fa fa-plus-square"></i> Service List</a>
              </div>

            <div class="clearfix"></div>
          </div>

          <div class="panel-body">
            @if(Session::has('success'))
            <div class="alert alert-success">
            <strong>Success!</strong> Service Insert Successful.
            </div>
            @endif

            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{url('/admin/service-insert')}}">
							@csrf

              <div class="form-group {{ $errors->has('service_title') ? 'has-error' : '' }}">
                <label for="inputEmail3" class="col-sm-3 control-label">service_title<span class="req_span">*</span></label>
                <div class="col-sm-8">
                  <input type="text" name="service_title" class="form-control" id="inputEmail3" placeholder="" value="{{old('service_title')}}">
                  <span class="text-danger">{{ $errors->first('service_title') }}</span>
                </div>
              </div>
               <div class="form-group {{ $errors->has('service_details') ? 'has-error' : '' }}">
                <label for="inputEmail3" class="col-sm-3 control-label">service_details</label>
                <div class="col-sm-8">
                  <input type="text" name="service_details" class="form-control" id="inputEmail3" placeholder="" value="{{old('service_details')}}">
                  <span class="text-danger">{{ $errors->first('service_details') }}</span>
                </div>
              </div>

              <div class="form-group">

                <div class="col-sm-3">
                    <input type="submit" class="btn btn-default" name="send" value="Upload">
                </div>
                <!-- <div class="col-sm-3">
                  <a href="{{url('admin/all-user')}}" class="add-btn btn btn-default pull-right btn-md"> <i class="fa fa-plus-square"></i> User List</a>
                </div> -->
              </div>

            </form>
          </div>
          <div class="panel-footer">
            .
          </div>
        </div>
    </div>
</div>
@endsection
