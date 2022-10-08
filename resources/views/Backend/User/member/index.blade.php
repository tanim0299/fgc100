@extends('Backend.Layouts.master')
@section('body')
<div class="pcoded-content">

<div class="page-header card">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<!-- <i class="feather icon-home bg-c-blue"></i> -->
<div class="d-inline">
<h5>View Member</h5>
<!-- <span>This Is SBIT Dashboard</span> -->
<div class="links" style="margin-top: 20px;">
    <a href="{{url('add_member')}}" class="btn btn-outline-info">Add Member</a>
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
             <h5>View Member</h5>
        </div>
        <div class="card-block">
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

            <div class="dt-responsive table-responsive">
                <table class="table table-striped table-bordered nowrap dataTable" id="order-table">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Committee</th>
                            <th>Designation</th>
                            <th>Workplace</th>
                            <th>Member Type</th>
                            <th>Adress</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($data)
                        @foreach($data as $showdata)
                        <tr>
                            <td>{{$sl++}}</td>
                            <td>{{$showdata->name}}</td>
                            <td>{{$showdata->email}}</td>
                            <td>{{$showdata->phone}}</td>
                            <td>{{$showdata->committee_name}}</td>
                            <td>{{$showdata->designation}}</td>
                            <td>{{$showdata->workplace}}</td>
                            <td>{{$showdata->type}}</td>
                            <td>{!! $showdata->adress !!}</td>
                            <td>
                                @if($showdata->status == 1)
                                <div class="badge badge-success">Active</div>
                                @else
                                <div class="badge badge-danger">Inactive</div>
                                @endif
                            </td>
                            <td>
                                <img src="{{asset('public/Backend/Images/MemberImage')}}/{{$showdata->image}}" alt="" style="height: 80px;width:80px;border-radius:100%">
                            </td>
                            <td>
                                <a href="{{url('edit_member')}}/{{$showdata->id}}" class="btn btn-outline-info">Edit</a>
                                {{-- <a href="{{url('delete_member')}}/{{$showdata->id}}" class="btn btn-outline-danger">Delete</a> --}}
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
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