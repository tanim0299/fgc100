@extends('Frontend.Layouts.master')
@section('body')
<style>
   span, b , a, p, table,li  {
    font-family: 'AdorshoLipi', Arial, sans-serif !important;
}
#family_info{
    display: none;
}
label.font {
    font-size: 14px;
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
           <b>নিবন্ধন সংক্রান্ত তথ্যাবলী (প্রাক্তন  শিক্ষার্থীদের জন্য প্রযোজ্য)</b>
       </div>
       <div class="content">
           <div class="instruction">
                <li>আবেদনকারী অবশ্যই ফেনী সরকারি কলেজের প্রাক্তন শিক্ষার্থী হতে হবে।</li>
                

                <li>রেজিষ্ট্রেশন সম্পন্ন হওয়ার পর পেমেন্ট গেটওয়ের মাধ্যমে রেজিষ্ট্রেশন ফি প্রদান করতে হবে। কোন কারণে যদি রেজিষ্ট্রেশন ফি প্রদান করতে বিলম্ব হয় সেক্ষেত্রে আবেদন ফরম পূরণ করার পর আবেদনকারীর মোবাইলে যে ইউজার আইডি এবং পাসওয়ার্ড প্রেরণ করা হবে তা দিয়ে লগইন করে ফরম পূরণের দিন পেমেন্ট গেটওয়ের মাধ্যমে রেজিস্ট্রেশন ফি প্রদান করতে হবে। অন্যথায় আবেদনটি গ্রহণযোগ্য হবে না।</li> 

                <li>আবেদনকারী যদি তার পরিবারের সদস্যদের নিয়ে অনুষ্ঠানে অংশগ্রহণ করতে চান, সেক্ষেত্রে তিনি ৩,০০০ (তিন হাজার) টাকা রেজিষ্ট্রেশন ফি দিয়ে পরিবারের একজন সদস্যের জন্য রেজিষ্ট্রেশন করতে পারবেন।</li>

                <li>রেজিস্ট্রেশন ফি প্রদান করার পর আবেদনকারী আবেদন ফরমে যে মোবাইল নাম্বার দিবেন ওই নাম্বারে একটি অভিনন্দন ক্ষুদেবার্তা প্রেরন করা হবে। দাওয়াত কার্ড সংগ্রহ ও উপহার সামগ্রী গ্রহণের জন্য মোবাইলে প্রেরিত ক্ষুদেবার্তাটি সংরক্ষণ করতে হবে।</li>
                <li>রেজিস্ট্রেশন ফি প্রদানের করার পর কোন আবেদন পরিবর্তন করা বা বাতিল করা   যাবে না।</li>

                <li>রেজিষ্ট্রেশন ফরম পূরণ করার সময় আবদনকারীকে সর্বশেষ যে শ্রেণী থেকে উত্তীর্ণ হয়েছেন ঐ শ্রেণীর তথ্যাবলী প্রদান করতে হবে।</li>
            
           </div>
       </div>
    </div>
 </div>


 {{-- form --}}
 <div class="form-section">
    <div class="section-title">
        <b>প্রাক্তন শিক্ষার্থীদের নিবন্ধন ফরম</b>
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
        <form method="post" enctype="multipart/form-data" action="{{url('/ex_registration')}}">
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
                        <option {{old('gender') === 'Male' ? 'selected' : ''}} value="male">Male</option>
                        <option {{old('gender') === 'Female' ? 'selected' : ''}} value="Female">Female</option>
                    </select>
                    @error('gender')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-12 col-md-6 col-12" id="input-box">
                    <label>স্থায়ী ঠিকানা / বর্তমান ঠিকানা</label>
                    <textarea name="address" id="" cols="" rows="2" class="form-control">{!! old('address') !!}</textarea>
                </div>
                <div class="col-12 mt-4">
                    <b>ফেনী সরকারি কলেজের সর্বশেষ যে শ্রেণীতে অধ্যয়ন করেছেন তার তথ্য </b>
                </div>
                <div class="col-lg-3 col-md-3 col-6" id="input-box">
                    <label>সর্বশেষ যে শ্রেণীতে অধ্যয়ন করেছেন</label> <span></span>
                    <select class="form-control @error('last_class') is-invalid @enderror" name="last_class" required>
                        <option value="" disabled="" selected="">শ্রেণী নির্বাচন করুন</option>
                        <option {{old('last_class') === 'HSC' ? 'selected' : ''}} value="HSC">এইচ এস সি</option>
                        <option {{old('last_class') === 'Degree' ? 'selected' : ''}} value="Degree">ডিগ্রী পাস কোর্স</option>
                        <option {{old('last_class') === 'Honurs' ? 'selected' : ''}} value="Honurs">অনার্স</option>
                        <option {{old('last_class') === 'Masters First Year' ? 'selected' : ''}} value="Masters First Year">মাষ্টার্স প্রথম পর্ব</option>
                        <option {{old('last_class') === 'Masters Last Year' ? 'selected' : ''}} value="Masters Last Year">মাষ্টার্স শেষ পর্ব</option>
                    </select>
                    @error('last_class')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- <div class="col-lg-3 col-md-3 col-6" id="input-box">
                    <label class="font">রেজিষ্ট্রেশন নম্বর(বোর্ড / বিশ্ববিদ্যালয় প্রদত্ত)</label>
                    <input type="number" class="form-control" name="registration_number" value="{{old('registration_number')}}">
                </div> --}}
                <div class="col-lg-3 col-md-3 col-6" id="input-box">
                    <label class="font">রোল নম্বর(বোর্ড / বিশ্ববিদ্যালয় প্রদত্ত)</label>
                    <input type="number" class="form-control" name="roll_number" value="{{old('roll_number')}}">
                </div>
                <div class="col-lg-3 col-md-3 col-6" id="input-box">
                    <label>পাসের সন</label>
                    <input type="number" class="form-control" name="passing_year" value="{{old('passing_year')}}">
                </div>
                <div class="col-lg-3 col-md-3 col-6" id="input-box">
                    <label>শিক্ষাবর্ষ</label>
                    <input type="number" class="form-control" name="session" value="{{old('session')}}">
                </div>

                <div class="col-lg-3 col-md-3 col-6" id="input-box">
                    <label>পেশা <span>*(যদি থাকে)</span></label>
                    <input type="text" class="form-control" name="occupation" value="{{old('occupation')}}">
                </div>
                <div class="col-lg-3 col-md-3 col-6" id="input-box">
                    <label>পদবি <span>*(যদি থাকে)</span></label>
                    <input type="text" class="form-control" name="designation" value="{{old('designation')}}">
                </div>
                <div class="col-lg-3 col-md-3 col-12" id="input-box">
                    <label>মোবাইল</label> <span></span>
                    <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{old('phone')}}" required>
                    @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-6 col-md-6 col-12" id="input-box">
                    <label>ই-মেইল</label> <span>*(যদি থাকে)</span>
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
                    <label>আপনার ছবি</label>
                    <input type="file" class="form-control" name="image">
                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-6 col-md-6 col-12" id="input-box">
                    <label>পরিবারের সদস্য আনতে ইচ্ছুক ?</label> <span>*(যদি থাকে)</span><br>
                    <select class="form-control" name="family_member" id="family_member">
                        <option value="0" disabled="" selected="">পরিবারে সদস্য নির্বাচন করুন</option>
                        <option value="yes">হ্যা</option>
                        <option value="no">না</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-3 col-12" id="input-box">
                    <label>মোট সদস্য</label>
                    <input type="text" name="total_member" class="form-control" readonly value="1" id="total_member">
                </div>
                <div class="col-lg-3 col-md-3 col-12" id="input-box">
                    <label>রেজিষ্ট্রেশন ফি</label>
                    <input type="text" id="reg_fee" name="reg_fee" class="form-control" readonly value="3000">
                </div>
                <div class="col-lg-3 col-md-3 col-12" id="input-box">
                    <label>সর্বমোট টাকা</label>
                    <input id="total_ammount" type="text" name="total_ammount" class="form-control" readonly value="3000">
                </div>
                <div class="col-6">

                </div>
            </div>
            <div class="family_infos" id="family_info">
                <div class="row" id="">
                    <div class="col-12 mt-4">
                        <b>পরিবারের সদস্যদের তথ্য</b>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mt-4">
                        <label>নাম</label>
                        <input type="text" name="family_member_name" class="form-control" value="{{old('family_member_name')}}">
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mt-4">
                        <label>Image</label>
                        <input type="file" name="family_member_image" class="form-control">
                        @error('family_member_image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
            </div>
            <div class="row">
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



