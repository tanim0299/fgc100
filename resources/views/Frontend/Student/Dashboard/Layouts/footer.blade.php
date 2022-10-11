

	


    </div>
</div>

    <!-- Required Js -->
    <script src="{{asset('public')}}/student_dashboard/js/vendor-all.min.js"></script>
    <script src="{{asset('public')}}/student_dashboard/js/plugins/bootstrap.min.js"></script>
    <script src="{{asset('public')}}/student_dashboard/js/pcoded.min.js"></script>

<!-- Apex Chart -->
<script src="{{asset('public')}}/student_dashboard/js/plugins/apexcharts.min.js"></script>


<!-- custom-chart js -->
<script src="{{asset('public')}}/student_dashboard/js/pages/dashboard-main.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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

