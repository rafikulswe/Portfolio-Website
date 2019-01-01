@extends('layouts.admin')
@section('view-user')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="col-sm-9">
                <strong>User Information</strong>
            </div>
            <div class="col-sm-3">
                <a href="{{url('admin/all-user')}}" class="amar_btn"> <i class="fa fa-plus-square"></i> Back To list</a>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="panel-body">
          <div class="col-md-2"></div>
          <div class="col-md-8">

            <link type="text/css" rel="stylesheet" href="{{asset('contents')}}/css/app.css"/>
<div class="container">
  <div class="row">
    <div class="col-md-7">

            <div class="card hovercard">
                <div class="cardheader">

                </div>
                <div class="avatar">
                    <img alt="picture" src="{{asset('uploads/'.$customer->customer_image)}}">
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" href="">{{$customer->customer_name}}</a>
                    </div>
                    <div class="desc">{{$customer->customer_email}}</div>
                    <div class="desc">{{$customer->customer_phone}}</div>
                    <div class="desc">Tech geek</div>
                </div>
                <div class="bottom">
                    <a class="btn btn-primary btn-twitter btn-sm" href="">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" rel="publisher"
                       href="">
                        <i class="fa fa-google-plus"></i>
                    </a>
                    <a class="btn btn-primary btn-sm" rel="publisher"
                       href="">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a class="btn btn-warning btn-sm" rel="publisher" href="">
                        <i class="fa fa-behance"></i>
                    </a>
                </div>
            </div>

        </div>

  </div>
</div>
            </div>
            <div class="col-md-2"></div>
            <div class="clr"></div>
          </div>
          <div class="panel-footer">
            .
          </div>
        </div>
    </div>
</div>








@endsection
