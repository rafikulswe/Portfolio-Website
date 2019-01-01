@extends('layouts.admin')
@section('add-blog')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="col-sm-9">
                <strong>blog Upload</strong>
            </div>

              <div class="col-sm-3">
                <a href="{{url('admin/all-blog')}}" class="add-btn btn btn-default pull-right btn-md"> <i class="fa fa-plus-square"></i> Back To List</a>
              </div>

            <div class="clearfix"></div>
          </div>

          <div class="panel-body">
            @if(Session::has('success'))
            <div class="alert alert-success">
            <strong>Success!</strong> Blog Insert Successful.
            </div>
            @endif

            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{url('/admin/blog-insert')}}">
							@csrf
              <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="inputEmail3" class="col-sm-3 control-label">Title<span class="req_span">*</span></label>
                <div class="col-sm-8">
                  <input type="text" name="title" class="form-control" id="inputEmail3" placeholder="" value="{{old('title')}}">
                  <span class="text-danger">{{ $errors->first('title') }}</span>
                </div>
              </div>
              <div class="form-group {{ $errors->has('sub_titile') ? 'has-error' : '' }}">
                <label for="inputEmail3" class="col-sm-3 control-label">Sub_titile<span class="req_span">*</span></label>
                <div class="col-sm-8">
                  <input type="text" name="sub_titile" class="form-control" id="inputEmail3" placeholder="" value="{{old('sub_titile')}}">
                  <span class="text-danger">{{ $errors->first('sub_titile') }}</span>
                </div>
              </div>




              <div class="form-group {{ $errors->has('pic') ? 'has-error' : '' }}">
                <label for="" class="col-sm-3 control-label">Photo(600*400)</label>
                <div class="col-sm-8">
                    <input type="file" name="pic" class="" id="" placeholder="" value="{{old('pic')}}">
                    <span class="text-danger">{{ $errors->first('pic') }}</span>
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
