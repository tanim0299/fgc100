@extends('Frontend.Layouts.master')
@section('body')
<style>
    a.uk-inline {
    background: #f7ecec;
    padding: 12px;
    border-radius: 9px;
    height: 289px;
    box-shadow: 0px 0px 3px black;
    text-decoration: none;
    color:black;
}
</style>
  <section class="mid_banner">
    <div class="container">
        <div class="mid_banner-text">
            <b>নিবন্ধনকৃত  শিক্ষার্থী</b><br>
            <a href="{{url('/')}}">হোম</a> > <span>নিবন্ধনকৃত শিক্ষার্থীদের তথ্য</span>
        </div>
    </div>
  </section>


  <div class="section">
    <div class="container">
    
       <div class="photo_gallery">
           <div class="table-responsive">
             <table class="table table-hover table-bordered" id="myTable">
                <thead>
                    <tr>
                        <th>ক্রমিক নং</th>
                        <th>নাম</th>
                        <th>স্থায়ী ঠিকানা</th>
                        <th>ভর্তির সন</th>
                        <th>বর্তমান পেশা / কর্মস্থল</th>
                        <th>ছবি</th>
                        <th>প্রিন্ট</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>১</td>
                        <td>সামছুল করিম চৌধুরী</td>
                        <td>হরিপুর বাজার, ছাগলনাইয়া, ফেনী</td>
                        <td>২০১৬</td>
                        <td>ছাত্র</td>
                        <td>
                            <img src="{{asset('public/assets/images')}}/avatar.jpg" alt="" height="80px" width="80px" style="border-radius: 100%">
                        </td>
                        <td>
                            <a target="_blank" href="{{url('/print_data')}}" class="btn btn-info"><i class="fa fa-print"></i></a>
                        </td>
                    </tr>
                </tbody>
             </table>
           </div>
       </div>
    </div>
 </div>
@endsection