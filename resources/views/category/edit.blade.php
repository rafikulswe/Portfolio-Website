@extends('layouts.admin')
@section('edit-work-category')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="col-sm-9">
                <strong>Update Information</strong>
            </div>
            <div class="col-sm-3">
                <a href="{{url('admin/all-work-category')}}" class="amar_btn"> <i class="fa fa-plus-square"></i> All Category</a>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="panel-body">

            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{url('admin/work-category/update/'.$allworkcategory->category_id)}}">
							@csrf
              <div class="form-group {{ $errors->has('category_name') ? 'has-error' : '' }}">
                <label class="col-sm-3 control-label">Name<span class="req_span">*</span></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="category_name" value="{{$allworkcategory->category_name}}">
                  <input type="hidden" class="form-control" name="id" value="{{$allworkcategory->category_id}}" >
                  <span class="text-danger">{{ $errors->first('category_name') }}</span>
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
