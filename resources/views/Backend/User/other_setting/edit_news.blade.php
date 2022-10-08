@extends('Backend.Layouts.master')
@section('body')
<div class="pcoded-content">

<div class="page-header card">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<!-- <i class="feather icon-home bg-c-blue"></i> -->
<div class="d-inline">
<h5>Add News</h5>
<!-- <span>This Is SBIT Dashboard</span> -->

</div>
</div>
</div>

</div>
</div>

<div class="pcoded-inner-content">
<div class="main-body">
<div class="page-wrapper">
<div class="page-body">
 
 <!-- //body content goes here -->
 <div class="form-body">
    <div class="card">
        <div class="card-header">
             <h5>Add News</h5>
        </div>
        <div class="card-block">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
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
            <form method="POST" enctype="multipart/form-data" action="{{url('/news_update')}}/{{$data->id}}">
                @csrf
                <div class="input-single-box">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" value="{{$data->title}}">
                </div>
                <div class="input-single-box">
                    <label>Description</label>
                    <textarea class="form-control" id="description" name="description">{!! $data->description !!}</textarea>
                </div>
                <div class="input-single-box">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                    <img src="{{asset('public/Backend/assets/images/news')}}/{{$data->image}}" alt="" style="height: 80px;width:80px;border-radius:100%">
                </div>
                <input type="text" name="admin_id" class="form-control" value="{{Auth()->user()->id}}" hidden>
                <div class="input-single-box">
                    <input type="submit" name="submit" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
 </div>
 <!-- //body content goes here -->

</div>
</div>
</div>
</div>
</div>




@endsection