@extends('Backend.Layouts.master')
@section('body')
<div class="pcoded-content">

<div class="page-header card">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<i class="feather icon-home bg-c-blue"></i>
<div class="d-inline">
<h5>Dashboard</h5>
<span>This Is SBIT Dashboard</span>

<!-- <button onclick="javascript:toggleFullScreen()" class="btn btn-success">FFF</button> -->
<!-- <input id="dateTimePicker" /> -->
</div>
</div>
</div>

</div>
</div>

<div class="pcoded-inner-content">
<div class="main-body">
<div class="page-wrapper">
<div class="page-body">

<div class="row">

@php 

$admin = DB::table('users')->get();

$total_admin = count($admin);

@endphp
<div class="col-xl-3 col-md-6">
<div class="card prod-p-card card-blue">
<div class="card-body">
<div class="row align-items-center m-b-30">
<div class="col">
<h6 class="m-b-5 text-white">Total Admin</h6>
<h3 class="m-b-0 f-w-700 text-white">{{$total_admin}}</h3>
</div>
<div class="col-auto">
<i class="fas fa-user text-c-red f-18"></i>
</div>
</div>
</div>
</div>
</div>














</div>

</div>
</div>
</div>
</div>
</div>




@endsection