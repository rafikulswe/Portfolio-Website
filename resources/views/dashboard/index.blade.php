@extends('layouts.admin')
@section('welcome')
  <div class="row">
	<div class="container error-container col-sm-12">
	 <div class="error-panel panel panel-default plain animated bounceIn">
	    <div class=panel-body>
	       <div class=page-header>
	          <h1 class="text-center mb25">Hi,<big>{{ Auth::user()->name }}</big></h1>
	       </div>
	       <h2 class="text-center mt30 mb30">Welcome to<br>Your Administration Panel</h2>
	     </div>
	 </div>
	</div>
</div>

@endsection
