<?php
$link=explode('/',$_SERVER['REQUEST_URI']);
$page=$link[count($link)-1];
// echo "$page";
$page=($page=='admin')?'index':$page;


    // echo $_SERVER['REQUEST_URI'];

?>
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mr. Rafi - Personal Portfolio</title>
    <link type="text/css" rel="stylesheet" href="{{asset('contents')}}/css/font-awesome.min.css"/>
    <link href="{{asset('contents')}}/css/bootstrap.min.css" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="{{asset('contents')}}/css/style.css"/>

  </head>
  <body>
    <div class="container-fluid header_full">

          <div class="row">
          <div class="logo">
              <img src="{{asset('contents')}}/images/directadmin-logo.png">
          </div>
          <div class="note-fontname btn-group">

                <a href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                                 <i class="fa fa-sign-out"></i> Logout</a>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                     @csrf
                                 </form>

        </div>
        </div>
    </div><!--container-fluid end-->

        <div class="container-fluid content_full">
            	<div class="row">
                	<div class="col-md-2 sidebar">
                    	<div class="sidebar_user">
                        	<img src="{{asset('contents')}}/images/avatar.png" alt="user" class="img-responsive"/>
                        	<h4>  {{ Auth::user()->name }}</h4>
                            <p><i class="fa fa-envelope "></i> Mail</p>
                        </div>
                        <div class="menu">
                        	<h2>Navigation</h2>
                            <ul>
                            	<li><a <?php if($page=="index"){echo ' class="active-menu"';}; ?> href="{{url('admin/index')}}"><i class="fa fa-home "></i> Home</a></li>
                                <li><a <?php if($page=="all-user"){echo ' class="active-menu"';}; ?> href="{{url('admin/all-user')}}"><i class="fa fa-user"></i> Clients</a></li>
                                <li><a <?php if($page=="all-banner"){echo ' class="active-menu"';}; ?> href="{{url('admin/all-banner')}}"><i class="fa fa-image"></i> Banner</a></li>
                                <li><a <?php if($page=="all-about"){echo ' class="active-menu"';}; ?> href="{{url('admin/all-about')}}"><i class="fa fa-address-card"></i> About</a></li>
                                <li><a <?php if($page=="all-service"){echo ' class="active-menu"';}; ?> href="{{url('admin/all-service')}}"><i class="fa fa-info-circle"></i> Services</a></li>
                                <li><a <?php if($page=="all-blog"){echo ' class="active-menu"';}; ?> href="{{url('admin/all-blog')}}"><i class="fa fa-rss"></i> Blog</a></li>
                                <li><a <?php if($page=="all-sms"){echo ' class="active-menu"';}; ?> href="{{url('admin/all-sms')}}"><i class="fa fa-commenting-o"></i> Message</a></li>
                                <li><a <?php if($page=="all-work"){echo ' class="active-menu"';}; ?> href="{{url('admin/all-work')}}"><i class="fa fa-briefcase"></i> Work</a></li>
                                <li><a <?php if($page=="all-work-category"){echo ' class="active-menu"';}; ?> href="{{url('admin/all-work-category')}}"><i class="fa fa-briefcase"></i> Work Category</a></li>
                                <li><a href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                                 <i class="fa fa-sign-out"></i> Logout</a></li>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                     @csrf
                                 </form>
                            </ul>
                        </div>
                    </div><!--sidebar end-->
                    <div class="col-md-10">
  <div class="row">
      <ol class="breadcrumb">
          <li><a href="{{url('admin/index')}}"><i class="fa fa-home"></i> Home</a></li>
          <!-- <li><a href="{{url('/'.$page)}}">{{$page}}</a></li> -->
        </ol>
    </div>
  @yield('welcome')
  @yield('all-user')
  @yield('add-user')
  @yield('view-user')
  @yield('edit-user')

  @yield('all-banner')
  @yield('add-banner')

  @yield('all-about')
  @yield('add-about')
  @yield('edit-about')

  @yield('all-service')
  @yield('add-service')

  @yield('all-blog')
  @yield('add-blog')
  @yield('edit-blog')

  @yield('all-sms')

  @yield('all-work')
  @yield('add-work')

  @yield('all-work-category')
  @yield('add-work-category')
  @yield('edit-work-category')





  <!-- @yield('search-user') -->

</div><!--content part end-->
</div><!--row end-->
  </div><!--container-fluid end-->


  <div class="container-fluid footer_full">
     <div class="container footer">
         <div class="row">
              <p class="pull-left">Copyrights &copy; {{date('Y')}} <a href="http://www.iisbd.com/" class="color-blue strong" target=_blank>INNOVATION information system ltd.</a>. All rights reserved.</p>
                <p class="pull-right"><a href="#" class="mr5">Terms of use</a> | <a href="#" class="ml5 mr25">Privacy policy</a></p>
           </div><!--row end-->
       </div><!--container end-->
   </div><!--container-fluid end-->

   <script src="{{asset('contents')}}/js/jquery-3.2.1.js"></script>
   <script src="{{asset('contents')}}/js/bootstrap.min.js"></script>
   <script src="{{ asset('js/app.js') }}" defer></script>




 </body>
</html>
