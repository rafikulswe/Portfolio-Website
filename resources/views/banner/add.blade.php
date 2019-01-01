@extends('layouts.admin')
@section('add-banner')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="col-sm-9">
                <strong>Banner Uploads</strong>
            </div>

              <div class="col-sm-3">
                <a href="{{url('admin/all-banner')}}" class="add-btn btn btn-default pull-right btn-md"> <i class="fa fa-plus-square"></i> Banner List</a>
              </div>

            <div class="clearfix"></div>
          </div>

          <div class="panel-body">
            @if(Session::has('success'))
            <div class="alert alert-success">
            <strong>Success!</strong> Banner Insert Successful.
            </div>
            @endif

            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{url('/admin/banner-insert')}}">
							@csrf

              <div class="form-group {{ $errors->has('pic') ? 'has-error' : '' }}">
                <label for="" class="col-sm-3 control-label">Photo (2000*1333)</label>
                <div class="col-sm-8">
                    <input type="file" name="pic" class="" id="" placeholder="" value="{{old('pic')}}">
                    <span class="text-danger">{{ $errors->first('pic') }}</span>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-3">
                    <input type="submit" class="btn btn-default" name="send" value="Upload">
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
