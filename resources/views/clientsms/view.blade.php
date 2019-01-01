@extends('layouts.admin')
@section('view-user')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="col-sm-9">
                <strong>Clients Message</strong>
            </div>
            <div class="col-sm-3">
                <a href="{{url('admin/all-sms')}}" class="amar_btn"> <i class="fa fa-plus-square"></i> Back To List</a>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="panel-body">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <table class="table table-striped table-responsive table-hover amar_table">
           				<tr>
                        <td>Name</td>
                        <td>:</td>
                        <td>{{$sms->name}}</td>
                   		</tr>
               			<tr>
                        <td>Email</td>
                        <td>:</td>
                        <td>{{$sms->email}}</td>
                        </tr>
                        <tr>
                        <td>Subject</td>
                        <td>:</td>
                        <td>{{$sms->subject}}</td>
                   		</tr>
                        <tr>
                        <td>Message</td>
                        <td>:</td>
                        <td>{{$sms->textarea}}</td>
                   		</tr>
            </table>
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
