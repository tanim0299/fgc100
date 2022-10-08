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
            <b>উৎসব গ্যালারী</b><br>
            <a href="{{url('/')}}">হোম</a> > <span>উৎসব গ্যালারী</span>
        </div>
    </div>
  </section>

      {{-- গ্যালারী --}}
  <div class="section">
    <div class="container">
       <div class="section-title">
           <b>উৎসব গ্যালারী</b>
       </div>
       <div class="photo_gallery">
           <div class="uk-child-width-1-3@m" uk-grid uk-lightbox="animation: scale">
               <div>
                   <a class="uk-inline" href="{{asset('public/assets/images/gallery')}}/1.jpg" data-caption="আমাদের ঐতিহাসিক অনার্স ভবন">
                       <img src="{{asset('public/assets/images/gallery')}}/1.jpg" width="1800" height="1200" alt="" id="gallery_image">
                       <p>আমাদের ঐতিহাসিক অনার্স ভবন</p>
                   </a>
               </div>
               <div>
                   <a class="uk-inline" href="{{asset('public/assets/images/gallery')}}/2.jpg" data-caption="ইতিহাস ঐতিহ্যের শতবর্ষ">
                       <img src="{{asset('public/assets/images/gallery')}}/2.jpg" width="1800" height="1200" alt="" id="gallery_image">
                       <p>ইতিহাস ঐতিহ্যের শতবর্ষ</p>
                   </a>
               </div>
               <div>
                   <a class="uk-inline" href="{{asset('public/assets/images/gallery')}}/3.jpg" data-caption="শিক্ষামন্ত্রী ডাঃ দীপু মনি এর কাছ থেকে পুরুষ্কার গ্রহণ করছেন অত্র কলেজের অধ্যক্ষ প্রফেসর বিমল কান্তি পাল">
                       <img src="{{asset('public/assets/images/gallery')}}/3.jpg" width="1800" height="1200" alt="" id="gallery_image">
                       <p>শিক্ষামন্ত্রী ডাঃ দীপু মনি এর কাছ থেকে পুরুষ্কার গ্রহণ করছেন অত্র কলেজের অধ্যক্ষ প্রফেসর বিমল কান্তি পাল</p>
                   </a>
               </div>
           </div>
       </div>
    </div>
 </div>
@endsection