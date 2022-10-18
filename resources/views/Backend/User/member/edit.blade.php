@extends('Backend.Layouts.master')
@section('body')
<div class="pcoded-content">

<div class="page-header card">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<!-- <i class="feather icon-home bg-c-blue"></i> -->
<div class="d-inline">
<h5>Edit Member</h5>
<!-- <span>This Is SBIT Dashboard</span> -->
<div class="links" style="margin-top: 20px;">
    <a href="{{url('view_member')}}" class="btn btn-outline-info">View Member</a>
</div>
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
             <h5>Edit Member</h5>
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
            <form method="POST" enctype="multipart/form-data" action="{{url('/memberUpdate')}}/{{$data->id}}">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="input-single-box">
                            <label>Name</label> <span>(Required)</span>
                            <input type="text" name="name" class="form-control" value="{{$data->name}}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="input-single-box">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{$data->email}}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="input-single-box">
                            <label>Phone</label> <span>(Required)</span>
                            <input type="text" name="phone" class="form-control" value="{{$data->phone}}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="input-single-box">
                            <label>Committee</label> <span>(Required)</span>
                            <select class="form-control" name="committee">
                                <option>Select One</option>
                                @if($committee)
                                @foreach($committee as $showcommittee)
                                <option @if($showcommittee->id == $data->committee_id) selected @endif value="{{$showcommittee->id}}">{{$showcommittee->committee_name}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="input-single-box">
                            <label>Designation</label><span>(Required)</span>
                            <input type="text" name="designation" class="form-control" value="{{$data->designation}}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="input-single-box">
                            <label>Work Place</label> <span>(Required)</span>
                            <input type="text" name="workplace" class="form-control" value="{{$data->workplace}}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="input-single-box">
                            <label>Member Type</label> <span>(Required)</span>
                            <select name="type" class="form-control">
                                @if($data->type == 'main')
                                <option value="main">Head Member</option>
                                <option value="secretary">Secretary</option>
                                <option value="general">General Member</option>
                                @elseif($data->type == 'secretary')
                                <option value="secretary">Secretary</option>
                                <option value="general">General Member</option>
                                <option value="main">Head Member</option>
                                @else
                                <option value="general">General Member</option>
                                <option value="secretary">Secretary</option>
                                <option value="main">Head Member</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="input-single-box">
                            <label>Status</label> <span>(Required)</span>
                            <select name="status" class="form-control">
                                @if($data->status == 1)
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                                @else 
                                <option value="0">Inactive</option>
                                <option value="1">Active</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-6 col-12">
                        <div class="input-single-box">
                            <label>Adress</label>
                            <textarea class="form-control" name="adress">{!! $data->adress !!}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-6 col-12">
                        <div class="input-single-box">
                            <label>Comm Type</label>
                            <input class="form-control" name="committee_type" value="{!! $data->committee_type !!}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="input-single-box">
                            <label>Image</label>
                            <input type="file" name="image" class="">
                            <img src="{{asset('public/Backend/Images/MemberImage')}}/{{$data->image}}" alt="" style="height: 80px;width:80px;border-radius:100%">
                        </div>
                    </div>
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