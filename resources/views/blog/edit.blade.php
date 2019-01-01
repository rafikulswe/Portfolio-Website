@extends('layouts.admin')
@section('edit-blog')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="col-sm-9">
                <strong>Blog Information</strong>
            </div>
            <div class="col-sm-3">
                <a href="{{url('admin/all-blog')}}" class="amar_btn"> <i class="fa fa-plus-square"></i> All Blog</a>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="panel-body">

            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{url('admin/blog/update/'.$allblog->id)}}">
							@csrf
              <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label class="col-sm-3 control-label">title<span class="req_span">*</span></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="title" value="{{$allblog->title}}">
                  <input type="hidden" class="form-control" name="id" value="{{$allblog->id}}" >
                  <span class="text-danger">{{ $errors->first('title') }}</span>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Sub_title<span class="req_span">*</span></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="sub_titile" value="{{$allblog->sub_titile}}">
                </div>
              </div>



              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Photo</label>
                <div class="col-sm-8">
                    @if ("{{asset('uploads/'.$allblog->image)}}")
                    <img src="{{ asset('uploads/'.$allblog->image) }}" height="50" width="50">
                    @else
                            <p>No image found</p>
                    @endif
                         <input type="file" name="pic"/>
                    <!-- <img src="{{asset('uploads/'.$allblog->image)}}" height="50" width="50"/> -->
                    <!-- <input type="file" value="{{asset('uploads/'.$allblog->image)}}" class="" id="" name="pic"> -->
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
