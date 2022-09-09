@extends('frontend.layouts.master')
<link rel="stylesheet" type="text/css" href="{{asset('frontend-assets/css/custom.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend-assets/css/repair.css')}}">
<style>
  /*.panel-heading a.collapsed .fa-chevron-down:before {
    -webkit-transform: rotate(180deg);
    -moz-transform: rotate(180deg);
    transform: rotate(180deg);
  } */

  .panel-heading  a:before {
   font-family: 'Glyphicons Halflings';
   content: "\e114";
   float: right;
   transition: all 0.5s;
   flex: 0 0 auto;
   color: rgba(0, 0, 0, 0.54);
   padding: 0px;
   overflow: visible;
   font-size: 1.5rem;
   text-align: center;
   transition: background-color 150ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
   border-radius: 50%;
  }
  .panel-heading.active a:before {
    -webkit-transform: rotate(180deg);
    -moz-transform: rotate(180deg);
    transform: rotate(180deg);
  }
  .testimonial-block-two {
    margin: 0 10px 0 0 !important;
  }
  .base-sm {
    width:300px;
  }
  .mt{
margin-left:50px;  }

.linee{
  margin-bottom: 20px;
    margin-top: 20px;
    padding-left: 30px;
}
/* 
.pad-b16 {
    padding-bottom: 16px;
}
.font-medium {
    font-weight: 500;
}
.font16-12 {
    font-size: calc(0.75rem + (16 - 12) * ((100vw - 320px) / (1920 - 320)));
    line-height: calc(0.875rem + (24 - 14) * ((100vw - 320px) / (1920 - 320)));
} */
</style>
@section('content')
<!--Page Title-->
<!-- <section class="page-title" style="background-image: url(frontend-assets/images/background/3.jpg);">
	<div class="auto-container">
    	<ul class="bread-crumb">
            <li><a href="index-2.html">Home</a></li>
            <li class="active">Shop</li>
        </ul>
    	<h1>Shop</h1>
    </div>
</section> -->
<!--End Page Title-->

<!--Shop Section-->
<section class="shop-section shop-page">
	<div class="auto-container">
    <section class="jss77 frame-size translate-down translate-up">
      <div class="layout horizontal vertical-mob center center-justified-mob base-bg jss78"><div class="layout vertical flwidth-mob center-mob flex-4 flex-none-mob">
        <h1 class="font45-22 font-medium text-center-mob mar-b20 mar-t20 jss80">Repair your phone at doorstep</h1>
        <div class="web-view">
          <ul class="layout horizontal center initial-mob wrap flex-no-wrap-mob pad0 mar0 jss79">
            <li class="mar-r20 mar-r0-mob layout horizontal  center">
              <i class="mar-r10 jss76"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="10" viewBox="0 0 10.259 7.151"><path d="M75.14 245.721l-4.983 4.979-2.542-2.542a.8.8 0 0 0-1.133 1.133l3.108 3.108a.8.8 0 0 0 1.133 0l5.549-5.549a.8.8 0 0 0-1.133-1.133zm0 0" fill="#2bc9af" transform="translate(-66.248 -245.486)"></path></svg></i><span class="font16-12">Trained Professionals</span>
            </li>
            <li class="mar-r20 mar-r0-mob layout horizontal  center">
              <i class="mar-r10 jss76"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="10" viewBox="0 0 10.259 7.151"><path d="M75.14 245.721l-4.983 4.979-2.542-2.542a.8.8 0 0 0-1.133 1.133l3.108 3.108a.8.8 0 0 0 1.133 0l5.549-5.549a.8.8 0 0 0-1.133-1.133zm0 0" fill="#2bc9af" transform="translate(-66.248 -245.486)"></path></svg></i><span class="font16-12">Doorstep Service</span>
            </li>
            <li class="mar-r20 mar-r0-mob layout horizontal  center">
              <i class="mar-r10 jss76"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="10" viewBox="0 0 10.259 7.151"><path d="M75.14 245.721l-4.983 4.979-2.542-2.542a.8.8 0 0 0-1.133 1.133l3.108 3.108a.8.8 0 0 0 1.133 0l5.549-5.549a.8.8 0 0 0-1.133-1.133zm0 0" fill="#2bc9af" transform="translate(-66.248 -245.486)"></path></svg></i><span class="font16-12">30-days limited warranty</span>
            </li>
          </ul>
        </div>
        <div class="jsx-4182953111 jsx-3431082034 flwidth layout vertical list-search">

            <label class="layout horizontal center pad10 flwidth drill-search card-shadow radius-10">
              <input type="text" placeholder="Enter Zip Code" id="zipcode" class="form-control zipcode">

              <button type="button" onclick="checkZip()" class="search-icon btn submit-btn">
                Submit
              </button>
            </label>
            <span id="msgZip" style="display:none;color:#00bfa5"> SORRY! We do not cover that area... yet! </span>

          <div id="pd_list_search_container" class="jsx-4182953111 jsx-3431082034 flwidth list-container card radius-6 hide">
            <ul id="pd_list_search_ul" class="jsx-4182953111 jsx-3431082034 layout vertical"></ul>
          </div>
        </div>

       
      </div>
      <div class="flex-3 flex-none-mob flwidth-mob jss75 jss81"></div>
    </div>
  </section>
  <div class="pad-b50-30">
    <section class="frame-size mar-b25">
      <div class="jss91">
        <ul class="layout horizontal vertical-mob pad-lr-16-mob pad0 mar0">
          <li class="layout horizontal center-center flex-1 flex-none-mob jss92">
            <div class="layout vertical horizontal-mob center flheight center-justified-mob  flwidth-mob">
              <i class="mar-b20 mar-b10-mob jss90">
                <img class="img-resp" alt="Check Price" src="{{asset('frontend-assets/images/repair/repair-icon1.png')}}">
              </i>
              <div class="layout vertical center flex-1-mob  flwidth-mob">
                <div class="layout horizontal center flwidth mar-b20 mar-b10-mob jss94">
                  <span class="layout horizontal center-center font20-14 font-medium rounded primary-bg jss93">1</span>
                  <div>
                    <span class="font22-14 font-medium tc-primary text-center">Check Price</span>
                  </div>
                </div>
                <p class="font16-12 tc-secondary jss94">Tell us which phone has to be repaired. Get the best pricing.</p>
              </div>
            </div>
          </li>
          <li class="layout horizontal center-center flex-1 flex-none-mob jss92">
            <div class="layout vertical horizontal-mob center flheight center-justified-mob  flwidth-mob">
              <i class="mar-b20 mar-b10-mob jss90">
                <img class="img-resp" alt="Schedule Service" src="{{asset('frontend-assets/images/repair/repair-icon2.png')}}">
              </i>
              <div class="layout vertical center flex-1-mob">
                <div class="layout horizontal center flwidth mar-b20 mar-b10-mob jss94">
                  <span class="layout horizontal center-center font20-14 font-medium rounded primary-bg jss93">2</span>
                  <div>
                    <span class="font22-14 font-medium tc-primary text-center">Schedule Service</span>
                  </div>
                </div>
                <p class="font16-12 tc-secondary jss94">Book an appointment at your home or work at a time that best suits your convenience</p>
              </div>
            </div>
          </li>
          <li class="layout horizontal center-center flex-1 flex-none-mob jss92">
            <div class="layout vertical horizontal-mob center flheight center-justified-mob  flwidth-mob">
              <i class="mar-b20 mar-b10-mob jss90">
                <img class="img-resp" alt="Get Repaired" src="{{asset('frontend-assets/images/repair/repair-icon3.png')}}">
              </i>
              <div class="layout vertical center flex-1-mob">
                <div class="layout horizontal center flwidth mar-b20 mar-b10-mob jss94">
                  <span class="layout horizontal center-center font20-14 font-medium rounded primary-bg jss93">3</span>
                  <div>
                    <span class="font22-14 font-medium tc-primary text-center">Get Repaired</span>
                  </div>
                </div>
                <p class="font16-12 tc-secondary jss94">Our super-skilled technician will be there and make it as good as new.</p>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </section>
  </div>
  <!-- <div class="frame-size jss174">
    <div class="layout vertical">
      <section class="jsx-146361224 jsx-2802770802 slider-list">
        <div class="jsx-146361224 jsx-2802770802 layout horizontal justified center">
          <div class="jss96 jss180 layout vertical">
            <h2 class="jss95 jss179 font27-18 center mar0 font-medium left-align">Services Available</h2>
          </div>
          <div class="jsx-146361224 jsx-2802770802 slider-view-more"></div>
        </div>
        <div class="jsx-146361224 jsx-2802770802 layout horizontal center-center  slider-list-slider">
        
          <i class="jsx-146361224 jsx-2802770802 cursor slide-next web-view fa fa-chevron-left" id="arrowL" style="display: none;"></i>
          <div id="AvailableContainer" class="jsx-146361224 jsx-2802770802 layout horizontal center scroll-horizon slider-wrap post-slider-wrap">
            <ul id="Services Availablelist" class="jsx-146361224 jsx-2802770802 layout horizontal center-justified list-none pad0 box-pad">
              <li class="mar-r20  pad-tb16 layout horizontal jss175">
                <a class="layout vertical card-shadow radius-10 pad16 flwidth flheight around-justified jss176" href="/screen-repair">
                  <span class="layout horizontal start center-justified  flex-1 jss177">
                    <img class="flheight" alt="SCREEN" src="{{asset('frontend-assets/images/repair/screen.png')}}">
                  </span>
                  <span class="layout horizontal center-center font12-10 text-center tc-primary line-clamp-3 jss178">SCREEN</span>
                </a>
              </li>

              <li class="mar-r20  pad-tb16 layout horizontal jss175">
                <a class="layout vertical card-shadow radius-10 pad16 flwidth flheight around-justified jss176" href="/screen-repair">
                  <span class="layout horizontal start center-justified  flex-1 jss177">
                    <img class="flheight" alt="SCREEN" src="{{asset('frontend-assets/images/repair/frontend.png')}}">
                  </span>
                  <span class="layout horizontal center-center font12-10 text-center tc-primary line-clamp-3 jss178">Front or Rear Camera</span>
                </a>
              </li>
            
              <li class="mar-r20  pad-tb16 layout horizontal jss175">
                <a class="layout vertical card-shadow radius-10 pad16 flwidth flheight around-justified jss176" href="/screen-repair">
                  <span class="layout horizontal start center-justified  flex-1 jss177">
                    <img class="flheight" alt="SCREEN" src="{{asset('frontend-assets/images/repair/screen.png')}}">
                  </span>
                  <span class="layout horizontal center-center font12-10 text-center tc-primary line-clamp-3 jss178">Data Recovery</span>
                </a>
              </li>
              <li class="mar-r20  pad-tb16 layout horizontal jss175">
                <a class="layout vertical card-shadow radius-10 pad16 flwidth flheight around-justified jss176" href="/battery-repair">
                  <span class="layout horizontal start center-justified  flex-1 jss177">
                    <img class="flheight" alt="BATTERY" src="{{asset('frontend-assets/images/repair/battery.png')}}">
                  </span>
                  <span class="layout horizontal center-center font12-10 text-center tc-primary line-clamp-3 jss178">BATTERY</span>
                </a>
              </li>
              <li class="mar-r20  pad-tb16 layout horizontal jss175">
                <a class="layout vertical card-shadow radius-10 pad16 flwidth flheight around-justified jss176" href="/mic-repair">
                  <span class="layout horizontal start center-justified  flex-1 jss177">
                    <img class="flheight" alt="MIC" src="{{asset('frontend-assets/images/repair/mic.png')}}">
                  </span>
                  <span class="layout horizontal center-center font12-10 text-center tc-primary line-clamp-3 jss178">MIC</span>
                </a>
              </li>
              <li class="mar-r20  pad-tb16 layout horizontal jss175">
                <a class="layout vertical card-shadow radius-10 pad16 flwidth flheight around-justified jss176" href="/receiver-repair">
                  <span class="layout horizontal start center-justified  flex-1 jss177">
                    <img class="flheight" alt="RECEIVER" src="{{asset('frontend-assets/images/repair/receiver.png')}}">
                  </span>
                  <span class="layout horizontal center-center font12-10 text-center tc-primary line-clamp-3 jss178">RECEIVER</span>
                </a>
              </li>
              <li class="mar-r20  pad-tb16 layout horizontal jss175">
                <a class="layout vertical card-shadow radius-10 pad16 flwidth flheight around-justified jss176" href="/charging-jack-repair">
                  <span class="layout horizontal start center-justified  flex-1 jss177">
                    <img class="flheight" alt="CHARGING JACK" src="{{asset('frontend-assets/images/repair/jack.png')}}">
                  </span>
                  <span class="layout horizontal center-center font12-10 text-center tc-primary line-clamp-3 jss178">CHARGING JACK</span>
                </a>
              </li>
              <li class="mar-r20  pad-tb16 layout horizontal jss175">
                <a class="layout vertical card-shadow radius-10 pad16 flwidth flheight around-justified jss176" href="/speaker-repair">
                  <span class="layout horizontal start center-justified  flex-1 jss177">
                    <img class="flheight" alt="SPEAKER" src="{{asset('frontend-assets/images/repair/speaker.png')}}">
                  </span>
                  <span class="layout horizontal center-center font12-10 text-center tc-primary line-clamp-3 jss178">SPEAKER</span>
                </a>
              </li>
              <li class="mar-r20  pad-tb16 layout horizontal jss175">
                <a class="layout vertical card-shadow radius-10 pad16 flwidth flheight around-justified jss176" href="/proximity-sensor-repair">
                  <span class="layout horizontal start center-justified  flex-1 jss177">
                    <img class="flheight" alt="PROXIMITY SENSOR" src="{{asset('frontend-assets/images/repair/sensor.png')}}">
                  </span>
                  <span class="layout horizontal center-center font12-10 text-center tc-primary line-clamp-3 jss178">PROXIMITY SENSOR</span>
                </a>
              </li>
              <li class="mar-r20  pad-tb16 layout horizontal jss175">
                <a class="layout vertical card-shadow radius-10 pad16 flwidth flheight around-justified jss176" href="/aux-jack-repair">
                  <span class="layout horizontal start center-justified  flex-1 jss177">
                    <img class="flheight jss58 flwidth flheight" alt="AUX JACK" srcset="{{asset('frontend-assets/images/repair/auxJack.png')}}" src="{{asset('frontend-assets/images/repair/auxJack.png')}}">
                  </span>
                  <span class="layout horizontal center-center font12-10 text-center tc-primary line-clamp-3 jss178">AUX JACK</span>
                </a>
              </li>
            </ul>
          </div>
          <i class="jsx-146361224 jsx-2802770802 cursor slide-next web-view fa fa-chevron-right" id="arrowR">
            
          </i>
        </div>
      </section>
    </div>
  </div> -->
  <div class="mar-b40 mar-t20">
    <section class="jss181">
      <div class="frame-size">
        <div class="pad-t16">
          <div class="jss96 jss187 layout vertical">
            <h2 class="jss95 jss186 font27-18 center mar0 font-medium left-align">Why Us</h2>
          </div>
        </div>
        <div class="layout vertical center card-header pad-t20 jss182">
          <ul class="layout horizontal wrap pad0 mar-b20 flwidth">
            <li class="layout horizontal vertical-mob jss183">
              <div class="layout horizontal center-center flwidth jss184">
                <img class="img-resp" alt="Premium Repair" src="{{asset('frontend-assets/images/repair/whyus-1.png')}}">
              </div>
              <div class="layout vertical flwidth jss185">
                <span class="font-medium font22-14">Premium Repair</span>
                <span class="font-medium font14-12 mar-t4 tc-secondary">Top quality certified parts</span>
              </div>
            </li>
            <li class="layout horizontal vertical-mob jss183">
              <div class="layout horizontal center-center flwidth jss184">
                <img class="img-resp" alt="Instant Mobile Repair" src="{{asset('frontend-assets/images/repair/whyus-2.png')}}">
              </div>
              <div class="layout vertical flwidth jss185">
                <span class="font-medium font22-14">Instant Mobile Repair</span>
                <span class="font-medium font14-12 mar-t4 tc-secondary">Mobile Repair on the Spot in Cashify Store or at Home/Office</span>
              </div>
            </li>

            <li class="layout horizontal vertical-mob jss183">
              <div class="layout horizontal center-center flwidth jss184">
                <img class="img-resp" alt="6 Months Warranty" src="{{asset('frontend-assets/images/repair/whyus-4.png')}}">
              </div>
              <div class="layout vertical flwidth jss185">
                <span class="font-medium font22-14">30 days limited warranty</span>
                <span class="font-medium font14-12 mar-t4 tc-secondary">Hassle free 30 days limited warranty on parts replaced</span>
              </div>
            </li>
            <li class="layout horizontal vertical-mob jss183">
              <div class="layout horizontal center-center flwidth jss184">
                <img class="img-resp" alt="Skilled Technicians" src="{{asset('frontend-assets/images/repair/whyus-5.png')}}">
              </div>
              <div class="layout vertical flwidth jss185">
                <span class="font-medium font22-14">Skilled Technicians</span>
                <span class="font-medium font14-12 mar-t4 tc-secondary">Trained &amp; Qualified Professionals</span>
              </div>
            </li>
            <li class="layout horizontal vertical-mob jss183">
              <div class="layout horizontal center-center flwidth jss184">
                <img class="img-resp" alt="Guaranteed Safety" src="{{asset('frontend-assets/images/repair/whyus-6.png')}}">
              </div>
              <div class="layout vertical flwidth jss185">
                <span class="font-medium font22-14">Guaranteed Safety</span>
                <span class="font-medium font14-12 mar-t4 tc-secondary">Total Device &amp; Data Security</span>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </section>
  </div>
    <!-- FAQ -->
  <div class="frame-size mar-b40 mar-t20">
    <div class="jss96 jss100 layout vertical">
      <h2 class="jss95 jss99 font27-18 center mar0 font-medium left-align">FAQs</h2>
    </div>
    <div class="mar-b8">
      <section class="card-shadow radius-10 jss101">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            @foreach (CityClass::faqs() as $faq)
            <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading{{$faq->id}}">
              <h4 class="panel-title">
                <a role="button" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$faq->id}}" aria-expanded="false" aria-controls="collapse{{$faq->id}}">
                  {{ $faq->question }}
                </a>
              </h4>
            </div>
            <div id="collapse{{$faq->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$faq->id}}">
              <div class="panel-body">

                {{ $faq->answer }}

              </div>
            </div>
          </div>
        @endforeach
          {{-- <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingTwo">
              <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Collapsible Group Item #2
                </a>
              </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
              <div class="panel-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingThree">
              <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Collapsible Group Item #3
                </a>
              </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
              <div class="panel-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
              </div>
            </div>
          </div> --}}
        </div>
      </section>
    </div>
  </div>
  <!--Testimonial Style Two-->
  <section class="testimonial-style-two mar-t20 pad-t16">
    <!--Section Title One-->
    <div class="jsx-146361224 jsx-2802770802 layout horizontal justified center">
      <div class="jss96 jss115 layout vertical">
        <h2 class="jss95 jss114 font27-18 center mar0 font-medium left-align">Customer Stories</h2>
      </div>
      <!-- <div class="jsx-146361224 jsx-2802770802 slider-view-more"></div> -->
    </div>

    <div class="testimonial-carousel pad-tb16">
      <div class="testimonial-carousel-two">

        <!--Testimonial Block-->
        <div class="testimonial-block-two">
          <div class="inner-box">
            <!--Image Box-->
            <div class="head-section">
              <figure class="image-box">
                <img src="{{asset('frontend-assets/images/resource/testimonial-1.jpg')}}" alt="" />
              </figure>
              <div class="name-and-skill">
                <div class="name">John</div>
                <div class="skill">Technician</div>
              </div>
            </div>
            <div class="text">Hope ultimate truth insofar god salvation god. The Truth revaluation insofar suicide inexpedient gains ultimate. Joy faith convictions victorious passion ocean.</div>
            <!--Designation-->
            <div class="reviwer-section soft-body-text"><div class="reviwer">Adrienne | Los Angeles, CA</div><img class="b-lazy b-loaded" src="https://d7gh5vrfihrl.cloudfront.net/website/badges/stars.svg"></div>
          </div>
        </div>

        <!--Testimonial Block-->
        <div class="testimonial-block-two">
          <div class="inner-box">
            <!--Image Box-->
            <div class="head-section">
              <figure class="image-box">
                <img src="{{asset('frontend-assets/images/resource/testimonial-2.jpg')}}" alt="" />
              </figure>
              <div class="name-and-skill">
                <div class="name">John</div>
                <div class="skill">Technician</div>
              </div>
            </div>
            <div class="text">Hope ultimate truth insofar god salvation god. The Truth revaluation insofar suicide inexpedient gains ultimate. Joy faith convictions victorious passion ocean.</div>
            <!--Designation-->
            <div class="reviwer-section soft-body-text"><div class="reviwer">Adrienne | Los Angeles, CA</div><img class="b-lazy b-loaded" src="https://d7gh5vrfihrl.cloudfront.net/website/badges/stars.svg"></div>
          </div>
        </div>

        <!--Testimonial Block-->
        <div class="testimonial-block-two">
          <div class="inner-box">
            <!--Image Box-->
            <div class="head-section">
              <figure class="image-box">
                <img src="{{asset('frontend-assets/images/resource/testimonial-1.jpg')}}" alt="" />
              </figure>
              <div class="name-and-skill">
                <div class="name">John</div>
                <div class="skill">Technician</div>
              </div>
            </div>
            <div class="text">Hope ultimate truth insofar god salvation god. The Truth revaluation insofar suicide inexpedient gains ultimate. Joy faith convictions victorious passion ocean.</div>
            <!--Designation-->
            <div class="reviwer-section soft-body-text"><div class="reviwer">Adrienne | Los Angeles, CA</div><img class="b-lazy b-loaded" src="https://d7gh5vrfihrl.cloudfront.net/website/badges/stars.svg"></div>
          </div>
        </div>

        <!--Testimonial Block-->
        <div class="testimonial-block-two">
          <div class="inner-box">
            <!--Image Box-->
            <div class="head-section">
              <figure class="image-box">
                <img src="{{asset('frontend-assets/images/resource/testimonial-2.jpg')}}" alt="" />
              </figure>
              <div class="name-and-skill">
                <div class="name">John</div>
                <div class="skill">Technician</div>
              </div>
            </div>
            <div class="text">Hope ultimate truth insofar god salvation god. The Truth revaluation insofar suicide inexpedient gains ultimate. Joy faith convictions victorious passion ocean.</div>
            <!--Designation-->
            <div class="reviwer-section soft-body-text"><div class="reviwer">Adrienne | Los Angeles, CA</div><img class="b-lazy b-loaded" src="https://d7gh5vrfihrl.cloudfront.net/website/badges/stars.svg"></div>
          </div>
        </div>

        <!--Testimonial Block-->
        <div class="testimonial-block-two">
          <div class="inner-box">
            <!--Image Box-->
            <div class="head-section">
              <figure class="image-box">
                <img src="{{asset('frontend-assets/images/resource/testimonial-1.jpg')}}" alt="" />
              </figure>
              <div class="name-and-skill">
                <div class="name">John</div>
                <div class="skill">Technician</div>
              </div>
            </div>
            <div class="text">Hope ultimate truth insofar god salvation god. The Truth revaluation insofar suicide inexpedient gains ultimate. Joy faith convictions victorious passion ocean.</div>
            <!--Designation-->
            <div class="reviwer-section soft-body-text"><div class="reviwer">Adrienne | Los Angeles, CA</div><img class="b-lazy b-loaded" src="https://d7gh5vrfihrl.cloudfront.net/website/badges/stars.svg"></div>
          </div>
        </div>

        <!--Testimonial Block-->
        <div class="testimonial-block-two">
          <div class="inner-box">
            <!--Image Box-->
            <div class="head-section">
              <figure class="image-box">
                <img src="{{asset('frontend-assets/images/resource/testimonial-2.jpg')}}" alt="" />
              </figure>
              <div class="name-and-skill">
                <div class="name">John</div>
                <div class="skill">Technician</div>
              </div>
            </div>
            <div class="text">Hope ultimate truth insofar god salvation god. The Truth revaluation insofar suicide inexpedient gains ultimate. Joy faith convictions victorious passion ocean.</div>
            <!--Designation-->
            <div class="reviwer-section soft-body-text"><div class="reviwer">Adrienne | Los Angeles, CA</div><img class="b-lazy b-loaded" src="https://d7gh5vrfihrl.cloudfront.net/website/badges/stars.svg"></div>
          </div>
        </div>

      </div>
    </div>
  </section>
  </div>
</section>
@endsection
@section('script')
<script>
function checkZip(){

  let zipcode= $('#zipcode').val();
  let _token   = $('meta[name="csrf-token"]').attr('content');

      $.ajax({
        url: "{{url('/checkZipcode')}}",
        type:"POST",
        data:{
          zipcode:zipcode,
          _token: _token
        },
        success:function(response){

          if(response.status == 0) {
            $('#msgZip').show();
          }else{
            window.location.href = "{{url('repair-step')}}/"+zipcode;
          }
        },
       });
}

  $('.panel-collapse').on('show.bs.collapse', function () {
     $(this).siblings('.panel-heading').addClass('active');
   });

   $('.panel-collapse').on('hide.bs.collapse', function () {
     $(this).siblings('.panel-heading').removeClass('active');
   });
   $('#arrowR').click(function(){
      var pos = $('#AvailableContainer').scrollLeft() + 600;

      $('#AvailableContainer').scrollLeft(pos);
      $('#arrowL').show();
      $(this).hide();
      // $('#AvailableContainer').animate({'left':'-=300px'});

     });

     $('#arrowL').click(function(){

        var pos = $('#AvailableContainer').scrollLeft() - 600;
        $('#AvailableContainer').scrollLeft(pos);
        $('#arrowR').show();
        $(this).hide();

     });
</script>

@endsection
