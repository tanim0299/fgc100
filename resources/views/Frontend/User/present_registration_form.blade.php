@extends('Frontend.Layouts.master')
@section('body')
<style>
   span, b , a, p, table,li  {
    font-family: 'AdorshoLipi', Arial, sans-serif !important;
}
</style>
  <section class="mid_banners">
    <div class="container">
        <div class="mid_banner-text">
            <img src="{{asset('public/assets/images/slider_1.jpg')}}" alt="" class="">
        </div>
    </div>
  </section>


  <div class="section">
    <div class="container">
       <div class="section-title">
           <b>নিবন্ধন সংক্রান্ত তথ্যাবলী (বর্তমানে শিক্ষার্থীদের জন্য প্রযোজ্য)</b>
       </div>
       <div class="content">

           <div class="instruction">
           <!--      <li>উচ্চ মাধ্যমিক শ্রেণী ক্ষেত্রে ২০-২১ ও ২১-২২ শিক্ষা বর্ষের শিক্ষার্থীরা আবেদন করতে পারবে।</li>
                <li> ডিগ্রী পাস কোর্স এর ক্ষেত্রে ১৮-১৯, ১৯-২০ ও ২০-২১ শিক্ষাবর্ষের শিক্ষার্থীরা  আবেদন করতে পারবে।</li>
                <li>অনার্স এর ক্ষেত্রে ১৭-১৮, ১৮-১৯, ১৯-২০ ও ২০-২১ শিক্ষাবর্ষের অধ্যায়নরত শিক্ষার্থীরা আবেদন করতে পারবে।</li>
                <li>মাস্টার্স প্রথম পর্ব ক্ষেত্রে ১৮-১৯ ও ১৯-২০ শিক্ষাবর্ষের অধ্যায়নরত শিক্ষার্থীরা আবেদন করতে পারবে।</li>
                <li>মাস্টার্স শেষ পর্বের ক্ষেত্রে ২০-২১ শিক্ষাবর্ষের অধ্যায়নরত শিক্ষার্থীরা আবেদন করতে পারবে।</li>  -->

                <li>উচ্চ মাধ্যমিক শ্রেণীর ক্ষেত্রে ২০-২১ ও ২১-২২ শিক্ষাবর্ষে, ডিগ্রী পাস কোর্স এর ক্ষেত্রে ১৮-১৯, ১৯-২০ ও ২০-২১ শিক্ষাবর্ষে, অনার্স এর ক্ষেত্রে ১৭-১৮, ১৮-১৯, ১৯-২০ ও ২০-২১ শিক্ষাবর্ষে,  মাস্টার্স প্রথম পর্বের ১৮-১৯ ও ১৯-২০ শিক্ষাবর্ষে,  মাস্টার্স শেষ পর্বে ২০-২১ শিক্ষাবর্ষে অধ্যায়নরত শিক্ষার্থীরা আবেদন করতে পারবে।</li>

                <li>কোন শিক্ষার্থী তার পরিবারের সদস্যের জন্য আবেদন করতে পারবে না।</li> 

                <li>রেজিষ্ট্রেশন সম্পন্ন হওয়ার পর পেমেন্ট গেটওয়ের মাধ্যমে রেজিষ্ট্রেশন ফি প্রদান করতে হবে। কোন কারণে যদি রেজিষ্ট্রেশন ফি প্রদান করতে বিলম্ব হয় সেক্ষেত্রে আবেদন ফরম পূরণ করার পর আবেদনকারীর মোবাইলে যে ইউজার আইডি এবং পাসওয়ার্ড প্রেরণ করা হবে তা দিয়ে লগইন করে ফরম পূরণের দিন পেমেন্ট গেটওয়ের মাধ্যমে রেজিস্ট্রেশন ফি প্রদান করতে হবে। অন্যথায় আবেদনটি গ্রহণযোগ্য হবে না।</li> 

                <li>রেজিস্ট্রেশন ফি প্রদান করার পর আবেদনকারী আবেদন ফরমে যে মোবাইল নাম্বার দিবেন ওই নাম্বারে একটি অভিনন্দন ক্ষুদেবার্তা প্রেরন করা হবে। দাওয়াত কার্ড সংগ্রহ ও উপহার সামগ্রী গ্রহণের জন্য মোবাইলে প্রেরিত ক্ষুদেবার্তাটি সংরক্ষণ করতে হবে।</li>

                <li>রেজিস্ট্রেশন ফি প্রদান করার পর কোন আবেদন পরিবর্তন করা বা বাতিল করা যাবে না।</li>
           
           </div>
       </div>
    </div>
 </div>


 {{-- form --}}
 <div class="form-section">
    <div class="section-title">
        <b>অধ্যয়নরত শিক্ষার্থীদের নিবন্ধন ফরম</b>
    </div>
    <div class="container mt-4">
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

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <form method="post" enctype="multipart/form-data" action="{{url('/present_registration')}}" id="present_form">
            @csrf
            <div class="form-group row">
                <div class="col-lg-6 col-md-6 col-12" id="input-box">
                    <label>নাম (বাংলায়)</label> <span></span>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" required>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-6 col-md-6 col-12" id="input-box">
                    <label>পিতার নাম</label> <span></span>
                    <input type="text" name="fathers_name" class="form-control @error('fathers_name') is-invalid @enderror" value="{{old('fathers_name')}}" required>
                    @error('fathers_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-6 col-md-6 col-12" id="input-box">
                    <label>মাতার নাম</label> <span></span>
                    <input type="text" name="mothers_name" class="form-control @error('mothers_name') is-invalid @enderror" value="{{old('mothers_name')}}" required>
                    @error('mothers_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-6 col-md-6 col-12" id="input-box">
                    <label>লিঙ্গ</label>
                    <select class="form-control @error('gender') is-invalid @enderror" name="gender" required>
                        <option value="" disabled="" selected=""> নির্বাচন করুন</option>
                        <option {{old('gender') === 'Male' ? 'selected' : ''}} value="Male">Male</option>
                        <option {{old('gender') === 'Female' ? 'selected' : ''}} value="Female">Female</option>
                    </select>
                    @error('gender')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-12 col-md-12 col-12" id="input-box">
                    <label>স্থায়ী ঠিকানা / বর্তমান ঠিকানা</label>
                    <textarea name="address" id="" cols="" rows="2" class="form-control">{{old('address')}}</textarea>
                </div>
                <div class="col-lg-6 col-md-6 col-12" id="input-box">
                    <label>ভর্তির সময়ের ক্লাস রোল</label>
                    <input type="text" name="admisson_time_classroll" class="form-control" value="{{old('admisson_time_classroll')}}">
                </div>
                <div class="col-lg-6 col-md-6 col-12" id="input-box">
                    <label>ভর্তির সন <span>(ইংরেজীতে)</span>
                    <input type="text" name="admission_year" class="form-control" value="{{old('admission_year')}}">
                </div>
                <div class="col-lg-6 col-md-6 col-12" id="input-box">
                    <label>বর্তমান অধ্যয়নরত শ্রেণী</label> <span></span>
                    <select class="form-control" name="present_class" required>
                        <option value="" disabled="" selected="">শ্রেণী নির্বাচন করুন</option>
                        <option {{old('present_class') === 'HSC' ? 'selected' : ''}} value="HSC">এইচ এস সি</option>
                        <option {{old('present_class') === 'Degree' ? 'selected' : ''}} value="Degree">ডিগ্রী পাস কোর্স</option>
                        <option {{old('present_class') === 'Honurs' ? 'selected' : ''}} value="Honurs">অনার্স</option>
                        <option {{old('present_class') === 'Masters' ? 'selected' : ''}} value="Masters">মাষ্টার্স</option>
                        
                    </select>
                    @error('present_class')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-6 col-md-6 col-12" id="input-box">
                    <label>রেজিষ্ট্রেশন নম্বর</label> <span>( যদি থাকে )</span>
                    <input type="text" class="form-control" name="registration_number" value="{{old('registration_number')}}">
                </div>
                <div class="col-lg-6 col-md-6 col-12" id="input-box">
                    <label>রোল (বোর্ড / জাতীয় বিশ্ববিদ্যালয় কর্তৃক প্রদত্ত)</label> <span>( যদি থাকে )</span>
                    <input type="text" class="form-control" name="roll_number" value="{{old('roll_number')}}">
                </div>
                <div class="col-lg-6 col-md-6 col-12" id="input-box">
                    <label>শিক্ষাবর্ষ <span>(ইংরেজীতে)</span>
                    <input type="text" class="form-control" name="session" value="{{old('session')}}" required>
                    @error('session')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-6 col-md-6 col-12" id="input-box">
                    <label>মোবাইল (+88 ব্যতিত)</label> <span></span>
                    <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{old('phone')}}" required id="phone_number">
                    @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="alert alert-danger" id="present_invalid_alert">এই নাম্বার দ্বারা রেজিষ্ট্রেশন সম্পন্ন হয়ে গিয়েছে</div>
                    <div class="alert alert-success" id="present_success_alert">এই নাম্বার দ্বারা রেজিষ্ট্রেশন সম্পন্ন করা যাবে</div>
                </div>
                <div class="col-lg-6 col-md-6 col-12" id="input-box">
                    <label>ই-মেইল</label> <span> ( যদি থাকে )</span>
                    <input type="email" class="form-control" name="email" value="{{old('email')}}">
                </div>
                <div class="col-lg-6 col-md-6 col-12" id="input-box">
                    <label>টি-শার্ট সাইজ</label>
                    <select class="form-control @error('t_shirt') is-invalid @enderror" name="t_shirt">
                        <option value="0" disabled="" selected="">টি-শার্ট সাইজ নির্বাচন করুন</option>
                        <option {{old('t_shirt') === 'M' ? 'selected' : ''}} value="M">M</option>
                        <option {{old('t_shirt') === 'L' ? 'selected' : ''}} value="L">L</option>
                        <option {{old('t_shirt') === 'XL' ? 'selected' : ''}} value="XL">XL</option>
                        <option {{old('t_shirt') === 'XXL' ? 'selected' : ''}} value="XXL">XXL</option>
                    </select>
                    @error('t_shirt')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-6 col-md-6 col-12" id="input-box">
                    <label>আবেদনকারীর  ছবি</label>
                    <input type="file" class="form-control" name="image" id="image">
                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                    <input type="text" name="total_member" class="form-control" hidden value="1">

                <div class="col-lg-6 col-md-6 col-12" id="input-box">
                    <label>সর্বমোট টাকা</label>
                    <input type="text" name="total_ammount" class="form-control" readonly value="1000" readonly>
                </div>
                <div class="col-lg-12 col-md-6 col-12" id="input-box">
                    <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="accept">
                   
                 <label class="form-check-label" for="accept">আমি উল্লেখিত <a href="{{url('/terms-condition')}}" target="_blank">শর্তাবলী </a>, <a href="{{url('/privacy-policy')}}" target="_blank">গোপনীয়তা নীতি </a> এবং <a href="{{url('/refund-policy')}}" target="_blank"> রিটার্ন রিফান্ড নীতি </a> পড়েছি এবং এতে সম্মত হয়েছি ।</label>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-12" id="input-box" style="text-align: center">
                    <input disabled id="submit" type="submit" class="btn btn-info" value="রেজিষ্ট্রেশন সম্পন্ন করুন">
                </div>

                <div class="col-lg-12 col-md-12 col-12" id="input-box" style="text-align: center">
                    <span style="font-size: 15px;">[ বি:দ্র: - রেজিষ্ট্রেশন সম্পন্ন হওয়ার পর লগইন করে আপনার রেজিষ্ট্রেশন ফি পরিশোধ করুন । অন্যথায় আপনার রেজিষ্ট্রেশন  বাতিল বলে গণ্য করা হইবে । ]</span>
                </div>
            </div>
        </form>
    </div>
 </div>
@endsection