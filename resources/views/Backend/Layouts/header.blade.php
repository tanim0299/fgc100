<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.dashboardpack.com/admindek-html/default/dashboard-crm.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Jun 2022 06:17:12 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<title>Admin Dashboard</title>


<!--[if lt IE 10]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="description" content="Admindek Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
<meta name="keywords" content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
<meta name="author" content="colorlib" />

<link rel="icon" href="{{asset('public/Backend')}}/assets/images/favicon.jpg" type="image/x-icon">

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="{{asset('public/Backend')}}/bower_components/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="{{asset('public/Backend')}}/assets/pages/waves/css/waves.min.css" type="text/css" media="all">

<link rel="stylesheet" type="text/css" href="{{asset('public/Backend')}}/assets/icon/feather/css/feather.css">

<link rel="stylesheet" type="text/css" href="{{asset('public/Backend')}}/assets/css/font-awesome-n.min.css">

<link rel="stylesheet" href="{{asset('public/Backend')}}/bower_components/chartist/css/chartist.css" type="text/css" media="all">

<link rel="stylesheet" type="text/css" href="{{asset('public/Backend')}}/assets/css/style.css">
<link rel="stylesheet" type="text/css" href="{{asset('public/Backend')}}/assets/css/widget.css">

<link rel="stylesheet" type="text/css" href="{{asset('public/Backend')}}/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('public/Backend')}}/assets/pages/data-table/css/buttons.dataTables.min.css">

<link rel="stylesheet" type="text/css" href="{{asset('public/Backend')}}/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">


<link rel="stylesheet" type="text/css" href="{{asset('public/Backend')}}/assets/pages/advance-elements/css/bootstrap-datetimepicker.css">

<link rel="stylesheet" type="text/css" href="{{asset('public/Backend')}}/bower_components/bootstrap-daterangepicker/css/daterangepicker.css" />

<link rel="stylesheet" type="text/css" href="{{asset('public/Backend')}}/bower_components/datedropper/css/datedropper.min.css" />

<link rel="stylesheet" type="text/css" href="{{asset('public/Backend')}}/bower_components/spectrum/css/spectrum.css" />

<link rel="stylesheet" type="text/css" href="{{asset('public/Backend')}}/bower_components/jquery-minicolors/css/jquery.minicolors.css" />

<link rel="stylesheet" type="text/css" href="{{asset('public/Backend')}}/assets/css/pages.css">


<link rel="stylesheet" type="text/css" href="{{asset('public/Backend')}}/assets/icon/themify-icons/themify-icons.css">

<link rel="stylesheet" type="text/css" href="{{asset('public/Backend')}}/assets/icon/icofont/css/icofont.css">

<!-- <link rel="stylesheet" type="text/css" href="{{asset('public/Backend')}}/assets/icon/font-awesome/css/font-awesome.min.css"> -->

<link rel="stylesheet" type="text/css" href="{{asset('public/Backend')}}/bower_components/switchery/css/switchery.min.css">

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<link rel="stylesheet" type="text/css" href="{{asset('public')}}/Backend/css/dtsel.css">

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">






</head>
<style type="text/css">
	input.form-control{
		border: 1px solid lightgray;
	}
	input.form-control:focus
	{
		box-shadow: none;
	}

	select.form-control{
		border: 1px solid lightgray;
	}
	select.form-control:focus
	{
		box-shadow: none;
	}
	.input-single-box{
		margin-top: 20px;
	}
	.input-single-box span{
		color: red;
	}
	body{
		font-family: quicksand,sans-serif !important;
	}
	select.form-control: hover{
		border: 1px solid black !important;
	}
	.input-single-box select:hover {
    border: 1px solid lightgray;
}
.input-single-box select:focus {
    border: 1px solid lightgray;
}
	.dropdown-toggle img {
    height: 56px;
    width: 56px !important;
}
span#select2-student_id-qc-container {
    background: white !important;
    border: 1px solid lightgray;
}
.course_box {
    background: #f9eeee;
    padding: 0px;
    border-top: 2px solid black;
    margin-top: 32px;
    border-radius: 5px;
    border: 1px solid lightgray;
}

.title {
    background: #3c6ddb;
    color: white;
    padding: 5px 14px;
}
.trainer_single li {
    list-style: none;
    background: whtie !important;
    background-color: white;
    border-bottom: 1px solid lightgray;
    padding: 12px 10px;
}

.trainer_single li img {
    margin-left: 7px;
}

.trainer_single li span {
    margin-left: 12px;
    /* padding-left: 6px; */
}
h6.m-b-5.text-white {
    font-size: 13px;
}

h3.m-b-0.f-w-700.text-white {
    font-size: 18px;
}
.navbar-logo img {
    width: 100%;
    height: 47px;
}

.navbar-logo {
    overflow: hidden;
}
.trainer_single-box {
    border: 1px solid lightgray;
}

.trainer_image img {
    height: 93px;
    width: 93px;
    border-radius: 102px;
}

.box-header.bg-success {
    padding-left: 11px;
    padding: 9px 15px;
    padding-bottom: 0px !important;
}
</style>
<body>

<div class="loader-bg">
<div class="loader-bar"></div>
</div>

<div id="pcoded" class="pcoded">
<div class="pcoded-overlay-box"></div>
<div class="pcoded-container navbar-wrapper">

<nav class="navbar header-navbar pcoded-header">
<div class="navbar-wrapper">
<div class="navbar-logo">
<a href="{{url('/dashboard')}}">
{{-- <img class="img-fluid" src="{{asset('public/assets')}}/images/logo1.png" alt="Theme-Logo" style="max-height: 100px" /> --}}
<b style="font-size: 20px;">FENI GOVT. COLLEGE</b>
</a>
<a class="mobile-menu" id="mobile-collapse" href="#!">
<i class="feather icon-menu icon-toggle-right"></i>
</a>
<a class="mobile-options waves-effect waves-light">
<i class="feather icon-more-horizontal"></i>
</a>
</div>
<div class="navbar-container container-fluid">
<ul class="nav-left">
<li class="header-search">
<div class="main-search morphsearch-search">
<div class="input-group">
<span class="input-group-prepend search-close">
<i class="feather icon-x input-group-text"></i>
</span>
<input type="text" class="form-control" placeholder="Enter Keyword">
<span class="input-group-append search-btn">
<i class="feather icon-search input-group-text"></i>
</span>
</div>
</div>
</li>
<li>
<a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
<i class="full-screen feather icon-maximize"></i>
</a>
</li>
</ul>
<ul class="nav-right">
<li class="user-profile header-notification">
<div class="dropdown-primary dropdown">
<div class="dropdown-toggle" data-toggle="dropdown">
	@php

	$adminId = Auth()->user()->id;
	$image = DB::table('users')->where('id',$adminId)->first();
	@endphp
@if($image->image)
<img src="{{asset('public/Backend')}}/Images/adminImage/{{$image->image}}" class="img-radius" alt="User-Profile-Image">
@endif
<span>{{Auth()->user()->name}}</span>
<i class="feather icon-chevron-down"></i>
</div>
<ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
<li>


<a class="dropdown-item" href="{{ route('logout') }}"
	onclick="event.preventDefault();
					document.getElementById('logout-form').submit();">
	<i class="feather icon-log-out"></i> {{ __('Logout') }}
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
	@csrf
</form>

</li>
</ul>
</div>
</li>
</ul>
</div>
</div>
</nav>

<div id="sidebar" class="users p-chat-user showChat">
<div class="had-container">
<div class="p-fixed users-main">
<div class="user-box">
<div class="chat-search-box">
<a class="back_friendlist">
<i class="feather icon-x"></i>
</a>
<div class="right-icon-control">
<div class="input-group input-group-button">
<input type="text" id="search-friends" name="footer-email" class="form-control" placeholder="Search Friend">
<div class="input-group-append">
<button class="btn btn-primary waves-effect waves-light" type="button"><i class="feather icon-search"></i></button>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="pcoded-main-container">
<div class="pcoded-wrapper">

<nav class="pcoded-navbar">
<div class="nav-list">
<div class="pcoded-inner-navbar main-menu">
<div class="pcoded-navigation-label">Navigation</div>
<ul class="pcoded-item pcoded-left-item">
<li class="{{request()->Is('dashboard*') ? 'active' : ''}}">
<a href="{{url('/dashboard')}}" class="waves-effect waves-dark">
<span class="pcoded-micon">
<i class="feather icon-home"></i>
</span>
<span class="pcoded-mtext">Dashboard</span>
</a>
</li>


<li class="pcoded-hasmenu {{request()->Is('addMainMenu*') ? 'active' : ''}}{{request()->Is('addSubMenu*') ? 'active' : ''}}">
<a href="javascript:void(0)" class="waves-effect waves-dark">
<span class="pcoded-micon">
<i class="feather icon-layers"></i>
</span>
<span class="pcoded-mtext">Developer Option</span>
<!-- <span class="pcoded-badge label label-danger">100+</span> -->
</a>
<ul class="pcoded-submenu">
<li class="{{request()->Is('addMainMenu*') ? 'active' :''}}">
<a href="{{url('/addMainMenu')}}" class="waves-effect waves-dark">
<span class="pcoded-mtext">Add Main Menu</span>
</a>
</li>
<li class="{{request()->Is('addSubMenu*') ? 'active' :''}}">
<a href="{{url('addSubMenu')}}" class="waves-effect waves-dark">
<span class="pcoded-mtext">Add Sub Menu</span>
</a>
</li>
</ul>
</li>

</ul>
<div class="pcoded-navigation-label">Others Links</div>
<ul class="pcoded-item pcoded-left-item">
@php 
$main_menu = DB::table('main_menu')->orderBy('sl','ASC')->get()->where('status','1');
$sub_menu = DB::table('sub_menu')
			->join('main_menu','main_menu.id','=','sub_menu.main_menuid')
			->select('main_menu.link_name','sub_menu.*')
			->get()
			->where('status','1');
@endphp
@if($main_menu)
@foreach($main_menu as $show_mainmenu)
<li class="pcoded-hasmenu" id="main_link">
<a href="javascript:void(0)" class="waves-effect waves-dark">
<span class="pcoded-micon">
<i class="feather icon-layers"></i>
<!-- <i class="fas fa-folder"></i> -->
</span>
<span class="pcoded-mtext">{{$show_mainmenu->link_name}}</span>
</a>
<ul class="pcoded-submenu">
@if($sub_menu)
@foreach($sub_menu as $show_submenu)
@if($show_mainmenu->id == $show_submenu->main_menuid)
<li class="" id="sublink">
<a href="{{url($show_submenu->route_name)}}" class="waves-effect waves-dark">
<span class="pcoded-mtext">{{$show_submenu->submenu_name}}</span>
</a>
</li>
@endif
@endforeach
@endif

</ul>

</li>
@endforeach
@endif

</ul>

</div>
</div>
</nav>