@extends('Frontend.Student.Dashboard.Layouts.master')
@section('body')
<style>
    .input-single-box{
    margin-top: 20px;
}
</style>
<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Make Payment</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/std_dasboard')}}"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Make Your Payment</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->


        <!-- [ Main Content ] start -->
        <div class="card p-4">
            @if(Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{Session::get('success')}}</strong>
            </div>
            @elseif(Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{Session::get('error')}}</strong>
            </div>
            @endif
            <div class="form-wrapper">
                <div class="box">
                    <div class="bkash-logo" style="text-align: center">
                        <img src="https://1000logos.net/wp-content/uploads/2021/02/Bkash-logo.png" alt="" class="img-fluid" height="200px" width="200px">
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="input-single-box">
                                <label>আপনার নাম</label>
                                <input type="text" class="form-control" readonly value="{{$data->name}}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="input-single-box">
                                <label>আপনার নাম্বার</label>
                                <input type="text" class="form-control" readonly value="{{$data->phone}}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="input-single-box">
                                <label>মোট সদস্য</label>
                                <input type="text" class="form-control" readonly value="{{$data->total_member}}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="input-single-box">
                                <label>পরিশোধ করার পরিমাণ</label>
                                <input type="text" class="form-control" readonly value="{{$data->total_ammount}}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="input-single-box">
                                <input type="submit" class="btn btn-success" value="পরিশোধ করুন">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- [ Main Content ] end -->
@endsection