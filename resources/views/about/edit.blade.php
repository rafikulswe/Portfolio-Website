@extends('layouts.admin')
@section('edit-about')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="col-sm-9">
                <strong>Update About</strong>
            </div>
            <div class="col-sm-3">
                <a href="{{url('admin/all-about')}}" class="amar_btn"> <i class="fa fa-plus-square"></i> All About</a>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="panel-body">

            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{url('admin/about/update/'.$allabout->id)}}">
							@csrf
              <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label class="col-sm-3 control-label">Title<span class="req_span">*</span></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="title" value="{{$allabout->title}}">
                  <input type="hidden" class="form-control" name="id" value="{{$allabout->id}}" >
                  <span class="text-danger">{{ $errors->first('title') }}</span>
                </div>
              </div>
              <div class="form-group {{ $errors->has('details') ? 'has-error' : '' }}">
                <label class="col-sm-3 control-label">Details<span class="req_span">*</span></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="details" value="{{$allabout->details}}">
                  <span class="text-danger">{{ $errors->first('details') }}</span>
                </div>
              </div>
              <div class="form-group {{ $errors->has('subtitle') ? 'has-error' : '' }}">
                <label  class="col-sm-3 control-label">Subtitle</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="subtitle" value="{{$allabout->subtitle}}">
                  <span class="text-danger">{{ $errors->first('subtitle') }}</span>
                </div>
              </div>
              <div class="form-group {{ $errors->has('subdetails') ? 'has-error' : '' }}">
                <label  class="col-sm-3 control-label">Subdetails<span class="req_span">*</span></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="subdetails" value="{{$allabout->subdetails}}">
                  <span class="text-danger">{{ $errors->first('subdetails') }}</span>
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
