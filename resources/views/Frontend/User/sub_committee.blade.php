@extends('Frontend.Layouts.master')
@section('body')
  <section class="mid_banner">
    <div class="container">
        <div class="mid_banner-text">
            <b>উপ-কমিটি সমূহ</b><br>
            <a href="{{url('/')}}">হোম</a> > <span>উপ-কমিটি সমূহ</span>
        </div>
    </div>
  </section>

  {{-- কমিটি --}}
  <div class="comitee-box">
    <div class="container">
        <div class="section-title">
            <b>উপ-কমিটির সদস্যবৃন্দ</b>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="member-box">
                    <div class="member-image">
                        <img src="{{asset('public/assets/images')}}/nijam_hazari.jpg" alt="">
                    </div>
                    <div class="member_name">
                        <b>জনাব নিজাম উদ্দিন হাজারী এমপি</b><br>
                        <span>মাননীয় সংসদ সদস্য, ফেনী - ২</span><br>
                        <span>আহ্বায়ক</span><br>
                        <span>শতবর্ষ উদযাপন কমিটি, ফেনী সরকারি কলেজ</span>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="member-box">
                    <div class="member-image">
                        <img src="{{asset('public/assets/images')}}/Principle.jpg" alt="">
                    </div>
                    <div class="member_name">
                        <b>প্রফেসর বিমল কান্তি পাল</b><br>
                        <span>অধ্যক্ষ, ফেনী সরকারি কলেজ</span><br>
                        <span>সচিব</span><br>
                        <span>শতবর্ষ উদযাপন কমিটি, ফেনী সরকারি কলেজ</span>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="member-box">
                    <div class="member-image">
                        <img src="{{asset('public/assets/images')}}/avatar.jpg" alt="">
                    </div>
                    <div class="member_name">
                        <b>ব্যাক্তির নাম</b><br>
                        <span>পদবি, কর্মরত প্রতিষ্ঠান</span><br>
                        <span>কমিটির পদ</span><br>
                        <span>শতবর্ষ উদযাপন কমিটি, ফেনী সরকারি কলেজ</span>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="member-box">
                    <div class="member-image">
                        <img src="{{asset('public/assets/images')}}/avatar.jpg" alt="">
                    </div>
                    <div class="member_name">
                        <b>ব্যাক্তির নাম</b><br>
                        <span>পদবি, কর্মরত প্রতিষ্ঠান</span><br>
                        <span>কমিটির পদ</span><br>
                        <span>শতবর্ষ উদযাপন কমিটি, ফেনী সরকারি কলেজ</span>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="member-box">
                    <div class="member-image">
                        <img src="{{asset('public/assets/images')}}/avatar.jpg" alt="">
                    </div>
                    <div class="member_name">
                        <b>ব্যাক্তির নাম</b><br>
                        <span>পদবি, কর্মরত প্রতিষ্ঠান</span><br>
                        <span>কমিটির পদ</span><br>
                        <span>শতবর্ষ উদযাপন কমিটি, ফেনী সরকারি কলেজ</span>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="member-box">
                    <div class="member-image">
                        <img src="{{asset('public/assets/images')}}/avatar.jpg" alt="">
                    </div>
                    <div class="member_name">
                        <b>ব্যাক্তির নাম</b><br>
                        <span>পদবি, কর্মরত প্রতিষ্ঠান</span><br>
                        <span>কমিটির পদ</span><br>
                        <span>শতবর্ষ উদযাপন কমিটি, ফেনী সরকারি কলেজ</span>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="member-box">
                    <div class="member-image">
                        <img src="{{asset('public/assets/images')}}/avatar.jpg" alt="">
                    </div>
                    <div class="member_name">
                        <b>ব্যাক্তির নাম</b><br>
                        <span>পদবি, কর্মরত প্রতিষ্ঠান</span><br>
                        <span>কমিটির পদ</span><br>
                        <span>শতবর্ষ উদযাপন কমিটি, ফেনী সরকারি কলেজ</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection