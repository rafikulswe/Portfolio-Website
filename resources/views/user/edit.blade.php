@extends('layouts.admin')
@section('edit-user')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="col-sm-9">
                <strong>Update Information</strong>
            </div>
            <div class="col-sm-3">
                <a href="{{url('admin/all-user')}}" class="amar_btn"> <i class="fa fa-plus-square"></i> Back To List</a>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="panel-body">

            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{url('admin/user/update/'.$allcustomer->customer_id)}}">
							@csrf
              <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label class="col-sm-3 control-label">Name<span class="req_span">*</span></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="name" value="{{$allcustomer->customer_name}}">
                  <input type="hidden" class="form-control" name="id" value="{{$allcustomer->customer_id}}" >
                  <span class="text-danger">{{ $errors->first('name') }}</span>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Email<span class="req_span">*</span></label>
                <div class="col-sm-8">
                  <input type="email" class="form-control" name="email" value="{{$allcustomer->customer_email}}">
                </div>
              </div>
              <div class="form-group">
                <label  class="col-sm-3 control-label">Phone</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="phone" value="{{$allcustomer->customer_phone}}">
                </div>
              </div>
              <!-- <div class="form-group">
                <label  class="col-sm-3 control-label">Username<span class="req_span">*</span></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="user" value="" disabled="disabled">
                </div>
              </div> -->
              <!-- <div class="form-group">
                <label for="" class="col-sm-3 control-label">User-Role</label>
                <div class="col-sm-5">
                      <select name="role" class="form-control">

                </div>
              </div> -->
              <div class="form-group">


                <label for="" class="col-sm-3 control-label">Photo</label>
                <div class="col-sm-8">
                  @if ("{{asset('uploads/'.$allcustomer->customer_image)}}")
                  <img src="{{ asset('uploads/'.$allcustomer->customer_image) }}" height="50" width="50">
                  @else
                          <p>No image found</p>
                  @endif
                       <input type="file" name="pic"/>
                    <!-- <img src="{{asset('uploads/'.$allcustomer->customer_image)}}" height="50" width="50"/>
                    <input type="file" class="" id="" name="photo"> -->
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-3"></div>
                <div class="col-sm-8">
                    <input type="submit" class="btn btn-default" name="send" value="UPDATE">
                </div>
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
