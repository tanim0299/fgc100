<!-- [ navigation menu ] start -->
@php

$type = Auth::guard('students')->user()->student_type;
if($type == 1)
{
    $id = Auth::guard('students')->user()->student_id;
    $data = DB::table('present_students')->where('registration_id',$id)->first();
}
else
{
    $id = Auth::guard('students')->user()->student_id;
    $data = DB::table('ex_students')->where('registration_id',$id)->first();
}
@endphp
<nav class="pcoded-navbar  ">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div " >

            <div class="">
                <div class="main-menu-header">
                    @php
                    $path = public_path().'/Backend/Images/StudentImage/'.$data->image;
                    @endphp
                    @if(file_exists($path))
                    <img class="img-radius" src="{{asset('public')}}/Backend/Images/StudentImage/{{$data->image}}" alt="User-Profile-Image">
                    @endif
                    <div class="user-details">
                        <span>{{$data->name}}</span>
                        <div id="more-details">{{$data->phone}}<i class="fa fa-chevron-down m-l-5"></i></div>
                    </div>
                </div>
                <div class="collapse" id="nav-user-link">
                    <ul class="list-unstyled">
                        <li class="list-group-item"><a href="{{url('/student_logout')}}"><i class="feather icon-log-out m-r-5"></i>Logout</a></li>
                    </ul>
                </div>
            </div>

            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item pcoded-menu-caption">
                    <label>Navigation</label>
                </li>
                <li class="nav-item">
                    <a href="{{url('/std_dashboard')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                </li>
                @php
                $type = Auth::guard('students')->user()->student_type;
                @endphp
                @if($type == 1)
                @php
                $id = Auth::guard('students')->user()->student_id;
                $check = DB::table('present_students')->where('registration_id',$id)->first();
                $bank_id = DB::table('ssl_commerz_pay_infos')->where('value_b',$check->registration_id)->where('status','VALID')->pluck('bank_tran_id')->first();
                try {
                    //code...
                    $tran_id = decrypt($check->tran_id);
                } catch (\Throwable $th) {
                    //throw $th;
                    $tran_id=null;
                }
                @endphp
                @if($check->payment == 1 && $tran_id == $bank_id)
                <li class="nav-item">
                    <a target="_blank" href="{{url('/id_card')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Your Card</span></a>
                </li>
                @else
                <li class="nav-item">
                    <a href="{{url('/std_info_edit')}}/{{Auth::guard('students')->user()->student_type}}/{{Auth::guard('students')->user()->student_id}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-edit"></i></span><span class="pcoded-mtext">Edit Your Info</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/make_payment')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Make Payment</span></a>
                </li>
                <li class="nav-item">
                    <a target="_blank" href="{{url('/invoice')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Money Reciept</span></a>
                </li>
                @endif
                @else
                @php
                $id = Auth::guard('students')->user()->student_id;
                $check = DB::table('ex_students')->where('registration_id',$id)->first();
                $bank_id = DB::table('ssl_commerz_pay_infos')->where('value_b',$check->registration_id)->where('status','VALID')->pluck('bank_tran_id')->first();
                try {
                    //code...
                    $tran_id = decrypt($check->tran_id);
                } catch (\Throwable $th) {
                    //throw $th;
                    $tran_id=null;
                }
                @endphp
                
                @if($check->payment == 1 && $tran_id == $bank_id)
                <li class="nav-item">
                    <a target="_blank" href="{{url('/id_card')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Your Card</span></a>
                </li>
                @else
                <li class="nav-item">
                    <a href="{{url('/std_info_edit')}}/{{Auth::guard('students')->user()->student_type}}/{{Auth::guard('students')->user()->student_id}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-edit"></i></span><span class="pcoded-mtext">Edit Your Info</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/make_payment')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Make Payment</span></a>
                </li>

                
                @endif
                @endif



            </ul>

        </div>
    </div>
</nav>
<!-- [ navigation menu ] end -->
<!-- [ Header ] start -->
<header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">


    <div class="m-header">
        <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
        <a href="{{url('/std_dashboard')}}" class="b-brand">
            <!-- ========   change your logo hear   ============ -->
            {{-- <img src="{{asset('public')}}/student_dashboard/images/logo.png" alt="" class="logo">
            <img src="{{asset('public')}}/student_dashboard/images/logo-icon.png" alt="" class="logo-thumb"> --}}
            <b>FENI GOVT. COLLEGE</b>
        </a>
        <a href="#!" class="mob-toggler">
            <i class="feather icon-more-vertical"></i>
        </a>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="#!" class="pop-search"><i class="feather icon-search"></i></a>
                <div class="search-bar">
                    <input type="text" class="form-control border-0 shadow-none" placeholder="Search hear">
                    <button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </li>
            {{-- <li class="nav-item">
                <div class="dropdown">
                    <a class="dropdown-toggle h-drop" href="#" data-toggle="dropdown">
                        Dropdown
                    </a>
                    <div class="dropdown-menu profile-notification ">
                        <ul class="pro-body">
                            <li><a href="user-profile.html" class="dropdown-item"><i class="fas fa-circle"></i> Profile</a></li>
                            <li><a href="email_inbox.html" class="dropdown-item"><i class="fas fa-circle"></i> My Messages</a></li>
                            <li><a href="auth-signin.html" class="dropdown-item"><i class="fas fa-circle"></i> Lock Screen</a></li>
                        </ul>
                    </div>
                </div> --}}

        </ul>
        <ul class="navbar-nav ml-auto">
            <li>
                <div class="dropdown drp-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="feather icon-user"></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">
                            @php
                            $path = public_path().'/Backend/Images/StudentImage/'.$data->image;
                            @endphp
                            @if(file_exists($path))
                            <img src="{{asset('public')}}/Backend/Images/StudentImage/{{$data->image}}" class="img-radius" alt="User-Profile-Image">
                            @endif
                            <span>{{$data->name}}</span>
                            <a href="{{url('/student_logout')}}" class="dud-logout" title="Logout">
                                <i class="feather icon-log-out"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>


</header>
