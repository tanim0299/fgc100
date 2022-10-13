<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Password Reset</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
    .logo img {
    max-width: 183px;
}

.logo {
    text-align: center;
}

.box {
    max-width: 591px;
    margin: auto;
}
.box {
    box-shadow: 0px 2px 3px 0px;
    padding: 20px;
    height: auto;
    margin-top: 100px;
}
.form-title h1 {
    text-transform: uppercase;
    font-size: 27px;
}

.form-title {
    text-align: center;
    margin-top: 22px;
}

.input-sinlge-box {
    margin-top: 20px;
}

.input-sinlge-box input {
    border: 1px solid black;
    border-radius: 0px;
}

.input-sinlge-box input:focus {
    box-shadow: none;
    border: 1px solid lightgray;
}
</style>
<body>
    

    <div class="container">
        <div class="box">
            <div class="logo">
                <img src="{{asset('public/assets/images')}}/logo.png" alt="" class="img-fluid">
            </div>
            <div class="form-section">
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
                <form method="POST" action="{{url('/change_password')}}">
                    @csrf
                    <div class="form-title">
                        <h1>Create New Password</h1>
                    </div>
                    <div class="input-sinlge-box">
                        <label>Your Number</label>
                        <input type="number" class="form-control" value="{{$phone}}" name="phone" readonly id="phone">
                    </div>
                    <div class="input-sinlge-box">
                        <label>Password</label>
                        <input type="number" class="form-control" name="password" placeholder="Enter Your New Password ">
                    </div>
                    <div class="input-sinlge-box" id="submit">
                        <input type="submit" class="btn btn-dark btn-block" value="Change">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @if(Session::has('warning'))
  <script>
      swal('Oops!', '{{ Session::get('warning') }}', 'warning');
  </script>

@endif
@if(Session::has('error'))
  <script>
      swal('Oops!', '{{ Session::get('error') }}', 'error');
  </script>

@endif
@if(Session::has('success'))
  <script>
      swal('Congratulations!', '{{ Session::get('success') }}', 'success');
  </script>

@endif

</body>
</html>