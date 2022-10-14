<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>শতবর্ষে ফেনী সরকারি কলেজ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('public/assets/css')}}/style.css">
    <link href="https://fonts.maateen.me/adorsho-lipi/font.css" rel="stylesheet">

    <link rel="icon" href="{{asset('public')}}/assets/images/logo.png" type="image/x-icon">
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.15.6/dist/css/uikit.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/brands.min.css" integrity="sha512-+oRH6u1nDGSm3hH8poU85YFIVTdSnS2f+texdPGrURaJh8hzmhMiZrQth6l56P4ZQmxeZzd2DqVEMqQoJ8J89A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/fontawesome.min.css" integrity="sha512-RvQxwf+3zJuNwl4e0sZjQeX7kUa3o82bDETpgVCH2RiwYSZVDdFJ7N/woNigN/ldyOOoKw8584jM4plQdt8bhA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/regular.min.css" integrity="sha512-aNH2ILn88yXgp/1dcFPt2/EkSNc03f9HBFX0rqX3Kw37+vjipi1pK3L9W08TZLhMg4Slk810sPLdJlNIjwygFw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/solid.min.css" integrity="sha512-uj2QCZdpo8PSbRGL/g5mXek6HM/APd7k/B5Hx/rkVFPNOxAQMXD+t+bG4Zv8OAdUpydZTU3UHmyjjiHv2Ww0PA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <!-- Toastr -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

</head>
{{-- oncontextmenu="return false;" --}}
<body >
    <div class="uk-background-muted uk-height-small">
    <div class="uk-card uk-card-default uk-card-body uk-text-center uk-position-z-index" uk-sticky="">
    <div class="container">
        <div class="header-wrapper">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <a class="navbar-brand" href="{{url('/')}}">
                            <div class="logo">
                                <img src="{{asset('public/assets/images')}}/logo.png" alt="" class="img-fluid">
                            </div>
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse " id="navbarSupportedContent">
                          <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                              <a class="nav-link" href="{{url('/')}}">হোম <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                শতবর্ষ উদযাপন
                              </a>
                              @php
                              $committee = DB::table('committee_infos')->where('status',1)->orderby('serial_no','ASC')->get();
                              @endphp
                              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @if($committee)
                                @foreach($committee as $view)
                                <a class="dropdown-item" href="{{url('/advisors-panel')}}/{{$view->id}}">{{$view->committee_name}}</a>
                                {{-- <a class="dropdown-item" href="{{url('/convenior-committee')}}">শতবর্ষ উদযাপন পরিষদ</a>
                                <a class="dropdown-item" href="{{url('/sub-committee')}}">উপ-কমিটি সমূহ</a>
                                <a class="dropdown-item" href="{{url('/convenior-speach')}}">আহ্বায়কের কথা</a>
                                <a class="dropdown-item" href="{{url('/member-secretary-speach')}}">সদস্য সচিবের কথা</a> --}}
                                @endforeach
                                @endif
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/events')}}">ইভেন্টস</a>
                              </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{url('/magazine')}}">স্মারক গ্রন্থ</a>
                              </li> --}}
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{url('/festival-gallery')}}">উৎসব গ্যালারী</a>
                              </li> --}}
                            
                              <li class="nav-item">
                                <a class="nav-link btn btn-info btn-sm" href="{{url('/present-registration-form')}}" style="color: white !important;"><i class="fa fa-users"></i> বর্তমান শিক্ষার্থীদের নিবন্ধন</a>
                              </li>
                              
                            <li class="nav-item">
                                <a class="nav-link btn btn-warning btn-sm" href="{{url('/ex-registration-form')}}" style="color: white !important;"><i class="fa fa-users"></i> প্রাক্তন শিক্ষার্থীদের নিবন্ধন</a>
                              </li>
                            @if(Auth::guard('students')->check())
                            @php
                            $type = Auth::guard('students')->user()->student_type;
                            $id = Auth::guard('students')->user()->student_id;
                            if($type == 1)
                            {
                              $data = DB::table('present_students')->where('registration_id',$id)->first();
                            }
                            else {
                              $data = DB::table('ex_students')->where('registration_id',$id)->first();
                            }
                            @endphp
                            <li class="nav-item" style="">
                                <a class="nav-link btn btn-dark btn-sm" href="{{url('/std_dashboard')}}" style="color: white !important;"><i class="fa fa-user"></i> {{$data->name}}</a>
                              </li>
                            @else
                            <li class="nav-item" style="">
                                <a class="nav-link btn btn-success btn-sm" href="{{url('/student_login')}}" style="color: white !important;"><i class="fa fa-user"></i> লগইন করুন</a>
                              </li>

                              @endif
                          </ul>
                        </div>
                      </nav>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
    @yield('body')

    <section class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-6">
                    <div class="footer-logo">
                        <img src="{{asset('public/assets/images')}}/logo.png" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-6">
                    <b>যোগাযোগ</b><br>
                    <ul class="list-item">
                        <li><i class="fa fa-phone"></i> 01711123436</li>
                        <li><i class="fa fa-envelope"></i> fgc100celebration@gmail.com</li>
                        <li><i class="fa fa-home"></i> <span>ফেনী সরকারি কলেজ, কলেজ রোড ,ফেনী</span></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-3 col-6">
                    <b>ওয়েবসাইট তথ্য সমূহ</b><br>
                    <ul class="list-item">
                        <li><i class="fa fa-chevron-right"></i> <a href="{{url('/terms-condition')}}">শর্তসমূহ</a></li>
                        <li><i class="fa fa-chevron-right"></i> <a href="{{url('/privacy-policy')}}">প্রাইভেসি পলিসি</a></li>
                        <li><i class="fa fa-chevron-right"></i> <a href="{{url('/refund-policy')}}">রিফান্ড পলিসি</a></li>
                     </ul>
                </div>
                <div class="col-lg-3 col-md-3 col-6">
                    <b>প্রয়োজনীয় লিংক সমূহ</b><br>
                    <ul class="list-item">
                        <li><i class="fa fa-chevron-right"></i> <a href="{{url('/')}}">হোম</a></li>
                        <li><i class="fa fa-chevron-right"></i> <a href="{{url('/events')}}">ইভেন্টস</a></li>
                        <li><i class="fa fa-chevron-right"></i> <a href="{{url('/magazine')}}">স্মারক গ্রন্থ</a></li>
                        <li><i class="fa fa-chevron-right"></i> <a href="{{url('/festival-gallery')}}">উৎসব গ্যালারী</a></li>
                        {{-- <li><a class="btn btn-warning" href="{{url('/registration-form')}}">নিবন্ধন করুন</a></li> --}}
                    </ul>
                </div>
            </div>
        </div>
        <div class="payment" style="text-align: center;border-top:1px dashed white;padding:10px;">
         <img src="{{asset('public/Backend/Images')}}/payment.jpg" class="img-fluid" style="max-width:60%">
        </div>
        <div class="copy-right">
            Developed By <a href="https://sbit.com.bd/" target="_blank">SBIT</a>
        </div>
    </section>

<!-- UIkit JS -->
<script src="https://cdn.jsdelivr.net/npm/uikit@3.15.6/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.15.6/dist/js/uikit-icons.min.js"></script>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/brands.min.js" integrity="sha512-1e+6G7fuQ5RdPcZcRTnR3++VY2mjeh0+zFdrD580Ell/XcUw/DQLgad5XSCX+y2p/dmJwboZYBPoiNn77YAL5A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/conflict-detection.min.js" integrity="sha512-CcCZYQSo4Vd+m76KUD1AvbEUoIlgJdUDpiPPzAdyT111z4K93ss2CIGVRQ34uWA+2OMN7jpnXVKTZAFKE0JQzw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/fontawesome.min.js" integrity="sha512-j3gF1rYV2kvAKJ0Jo5CdgLgSYS7QYmBVVUjduXdoeBkc4NFV4aSRTi+Rodkiy9ht7ZYEwF+s09S43Z1Y+ujUkA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/regular.min.js" integrity="sha512-Kcbb5bDGCQQwo67YHS9uDvRmyrNEqHLPA1Kmn0eqrritqGDp3OpkBGvHk36GNEH44MtWM1L5k3i9MSQPMkNIuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/solid.min.js" integrity="sha512-dcTe66qF6q/NW1X64tKXnDDcaVyRowrsVQ9wX6u7KSQpYuAl5COzdMIYDg+HqAXhPpIz1LO9ilUCL4qCbHN5Ng==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>

</script>

<script type="text/javascript">
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>


{{-- <script>
  $(document).ready(function(){
    $("#present_form").on('submit',function(e){
      e.preventDefault();
      var data = $('#present_form').serialize();
      alert(data);
      $.ajax({
        headers:
        {
          'X-CSRF-TOKEN' : '{{ csrf_token() }}'
        },
        url : '{{url('present_registration')}}',
        type : 'POST',
        data : {data},
        contentType:false,
        processData:false,
        success : function(data)
        {
          alert(data);
        }

      });
    });
  });
</script> --}}




<script>
  $(document).ready(function(){

    $('#present_invalid_alert').hide();
    $('#present_success_alert').hide();

    $('#phone_number').on('keyup',function(){

      var phone_data = $('#phone_number').val();

      var length = $('#phone_number').val().length;

      // alert(length);
      if(phone_data != ' ')
      {
        if(length == 11)
      {
        $.ajax({

          headers:{
              'X-CSRF-TOKEN' : '{{ csrf_token() }}'
          },

          url : '{{url('/check_phone')}}',

          type : 'POST',

          data : {phone_data},

          success : function(data)
          {
            if(data == 0)
            {
              $('#present_success_alert').hide();
              $('#present_invalid_alert').show();
              // $('#submit').prop('disabled',true);
            }
            else
            {
              $('#present_invalid_alert').hide();
              $('#present_success_alert').show();
              // $('#submit').prop('disabled',false);
            }
          }

        });
      }
      }

    });

  });
</script>



<script>
  $(document).ready(function(){

    $('#accept').on('change',function(){

      if($('#accept').is(':checked'))
      {
        $('#submit').prop('disabled',false);
      }
      else
      {
        $('#submit').prop('disabled',true);
      }


    });

  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
      $('#family_member').on('change',function(){
        var data = $(this).val();

        if(data == 'yes')
        {
          var total = $("#total_member").val();
          var subtotal = parseInt(total) + 1;

          var reg_fee = $("#reg_fee").val();
          var subtotal_ammount = parseInt(reg_fee) * subtotal;

          $("#total_member").val(subtotal);
          $("#total_ammount").val(subtotal_ammount);
          $('#family_info').show();
        }
        else if(data == 'no')
        {
          var total = 1;
          var subtotal = 1;

          var reg_fee = $("#reg_fee").val();
          var subtotal_ammount = parseInt(reg_fee) * subtotal;

          $("#total_member").val(subtotal);
          $("#total_ammount").val(subtotal_ammount);
          $('#family_info').hide();
        }

      });
  });
</script>

@if(Session::has('warning_pay'))
  <script>
      swal('Oops!', '{{ Session::get('warning_pay') }}', 'warning');
  </script>

@endif
@if(Session::has('error_pay'))
  <script>
      swal('Oops!', '{{ Session::get('error_pay') }}', 'error');
  </script>

@endif
@if(Session::has('success_pay'))
  <script>
      swal('Congratulations!', '{{ Session::get('success_pay') }}', 'success');
  </script>

@endif
</body>
</html>
