@extends('frontend.layouts.master')
@section('styling')
<style>
	.header-style-three .main-menu .navigation > li > a {
    padding: 15px 0px;
    padding-right: 0px;
    font-size: 14px;
    font-weight: 700;
    color: #fff;
    line-height: 20px;
}
.colored{
  font-family: 'Catamaran', sans-serif;
    font-size: 15px;
    color: #333;
    line-height: 1.8em;
    font-weight: inherit;
    /* background: #ffffff;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center top; */
    /* -webkit-font-smoothing: antialiased; */
}

</style>
@endsection
@section('content')
<!--Main Slider-->
<section class="main-slider">

    <div class="tp-banner-container">
        <div class="tp-banner">
            <ul>

                <li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-thumb="{{asset('frontend-assets/images/main-slider/2.jpg')}}"  data-saveperformance="off"  data-title="Awesome Title Here">
                <img src="{{asset('frontend-assets/images/main-slider/2.jpg')}}"  alt=""  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">

                <!--Overlay-->
                <div class="overlay-style-one"></div>

                <div class="tp-caption sfl sfb tp-resizeme"
                data-x="left" data-hoffset="15"
                data-y="center" data-voffset="-50"
                data-speed="1500"
                data-start="0"
                data-easing="easeOutExpo"
                data-splitin="none"
                data-splitout="none"
                data-elementdelay="0.01"
                data-endelementdelay="0.3"
                data-endspeed="1200"
                data-endeasing="Power4.easeIn">
                <div class="slider-logo">
                	<!-- <img src="{{asset('frontend-assets/images/logo1.png')}}" alt="" title="Cell City"> -->
                </div>
                <h2>Repair <span>your</span><br>Mobile Phone</h2></div>

                <!-- <div class="tp-caption sfl sfb tp-resizeme"
                data-x="left" data-hoffset="15"
                data-y="center" data-voffset="50"
                data-speed="1500"
                data-start="500"
                data-easing="easeOutExpo"
                data-splitin="none"
                data-splitout="none"
                data-elementdelay="0.01"
                data-endelementdelay="0.3"
                data-endspeed="1200"
                data-endeasing="Power4.easeIn"><div class="text">We offer repair many different types of devices including smartphones,<br> tablets etc...</div></div> --><br>

                <div class="tp-caption sfl sfb tp-resizeme"
                data-x="left" data-hoffset="15"
                data-y="center" data-voffset="130"
                data-speed="1500"
                data-start="1000"
                data-easing="easeOutExpo"
                data-splitin="none"
                data-splitout="none"
                data-elementdelay="0.01"
                data-endelementdelay="0.3"
                data-endspeed="1200"
                data-endeasing="Power4.easeIn"><a href="{{url('repair')}}" class="theme-btn btn-style-one">Repair Device</a></div>

                </li>

                <li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-thumb="{{asset('frontend-assets/images/main-slider/4.jpg')}}"  data-saveperformance="off"  data-title="Awesome Title Here">
                <img src="{{asset('frontend-assets/images/main-slider/4.jpg')}}"  alt=""  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">

                <!--Overlay-->
                <div class="overlay-style-two"></div>

                <div class="tp-caption sft sfb tp-resizeme"
                data-x="left" data-hoffset="15"
                data-y="center" data-voffset="-50"
                data-speed="1500"
                data-start="0"
                data-easing="easeOutExpo"
                data-splitin="none"
                data-splitout="none"
                data-elementdelay="0.01"
                data-endelementdelay="0.3"
                data-endspeed="1200"
                data-endeasing="Power4.easeIn">
                <div class="slider-logo">
                	<!-- <img src="{{asset('frontend-assets/images/logo1.png')}}" alt="" title="Cell City"> -->
                </div>
                <h2 class="text-uppercase">Buy <span> Mobile Phone </span><br>of your Choice</h2></div>
                <br>
                <!-- <div class="tp-caption sfb sfb tp-resizeme"
                data-x="left" data-hoffset="15"
                data-y="center" data-voffset="30"
                data-speed="1500"
                data-start="500"
                data-easing="easeOutExpo"
                data-splitin="none"
                data-splitout="none"
                data-elementdelay="0.01"
                data-endelementdelay="0.3"
                data-endspeed="1200"
                data-endeasing="Power4.easeIn"><div class="text text-left">Lorem ipsum dolor sit amet, consectetur adipisicing elit,<br> sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim <br></div></div> -->
                <br><br><br>
                <div class="tp-caption sfb sfb tp-resizeme"
                data-x="left" data-hoffset="15"
                data-y="center" data-voffset="100"
                data-speed="1500"
                data-start="1000"
                data-easing="easeOutExpo"
                data-splitin="none"
                data-splitout="none"
                data-elementdelay="0.01"
                data-endelementdelay="0.3"
                data-endspeed="1200"
                data-endeasing="Power4.easeIn"><a href="{{url('buy-phone')}}" class="theme-btn btn-style-one">Buy Phone</a></div>

                </li>

                <li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-thumb="{{asset('frontend-assets/images/main-slider/6.png')}}"  data-saveperformance="off"  data-title="Awesome Title Here">
                <img src="{{asset('frontend-assets/images/main-slider/6.png')}}"  alt=""  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">

                <div class="tp-caption sfr sfb tp-resizeme"
                data-x="left" data-hoffset="-15"
                data-y="center" data-voffset="-50"
                data-speed="1500"
                data-start="0"
                data-easing="easeOutExpo"
                data-splitin="none"
                data-splitout="none"
                data-elementdelay="0.01"
                data-endelementdelay="0.3"
                data-endspeed="1200"
                data-endeasing="Power4.easeIn">
                <div class="slider-logo">
                	<!-- <img src="{{asset('frontend-assets/images/logo1.png')}}" alt="" title="Cell City"> -->
                </div>
                <h2 class="computer-problem">Pay Your<br><span>Bills</span> </h2></div>

                <!-- <div class="tp-caption sfr sfb tp-resizeme"
                data-x="left" data-hoffset="-15"
                data-y="center" data-voffset="50"
                data-speed="1500"
                data-start="500"
                data-easing="easeOutExpo"
                data-splitin="none"
                data-splitout="none"
                data-elementdelay="0.01"
                data-endelementdelay="0.3"
                data-endspeed="1200"
                data-endeasing="Power4.easeIn"><div class="offer text-left">Lorem ipsum dolor sit amet, consectetur adipisicing elit, <br> sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</div></div> -->
                <br>
                <div class="tp-caption sfr sfb tp-resizeme"
                data-x="left" data-hoffset="-15"
                data-y="center" data-voffset="130"
                data-speed="1500"
                data-start="1000"
                data-easing="easeOutExpo"
                data-splitin="none"
                data-splitout="none"
                data-elementdelay="0.01"
                data-endelementdelay="0.3"
                data-endspeed="1200"
                data-endeasing="Power4.easeIn">
                <!-- <a href="#" class="theme-btn btn-style-two">GET A QUOTE</a> &ensp;&ensp; -->
                 <a href="#" class="theme-btn btn-style-one">Pay Bills</a></div>


                </li>
            </ul>

        	<div class="tp-bannertimer"></div>
        </div>
    </div>
</section>
<!--Repair Section-->
    <section class="repair-section box-section">
    	<div class="auto-container">

        	<!--Sec Title One-->
            <!-- <div class="sec-title-one">
                <h2>WE ARE CELL CITY PHONE REPAIR</h2>
                <div class="text">Overcome faithful endless salvation enlightenment salvation overcome pious merciful<br>ascetic madness holiest joy passion zarathustra suicide overcome snare.</div>
            </div> -->

        	<div class="row clearfix">

                <!--Services Block-->
                <div class="services-block col-md-3 col-sm-4 col-xs-4">
                	<div class="inner-box wow fadeIn" data-wow-delay="0ms" data-wow-duration="1500ms">
                    	<!--Icon Box-->
                    	<a href="{{url('repair')}}">
                    		<div class="icon-box">
	                      	<span class="icon flaticon-mobile"  style="color:#00bfa5"></span>
	                      </div>
	                      <h3>Phone Repairs</h3>
                    	</a>
                    </div>
                </div>

                <!--Services Block-->
                <div class="services-block col-md-3 col-sm-4 col-xs-4">
                	<div class="inner-box wow fadeIn" data-wow-delay="300ms" data-wow-duration="1500ms">
                    	<!-- <div class="big-letter">Q</div> -->
                    	<!--Icon Box-->
                    	<a href="{{url('buy-phone')}}">
                  			<div class="icon-box">
                  		    <span class="icon flaticon-technology-2"   style="color:#00bfa5"></span>
                  		  </div>
                  		  <h3>Buy Phones</h3>
                    	</a>
                    </div>
                </div>

                <!--Services Block-->
                <div class="services-block col-md-3 col-sm-4 col-xs-4">
                	<div class="inner-box wow fadeIn" data-wow-delay="600ms" data-wow-duration="1500ms">
                    	<!-- <div class="big-letter">C</div> -->
                    	<!--Icon Box-->
                    	<a href="{{ url('pay-bills') }}">
                    			<div class="icon-box">
                    		    <span class="icon flaticon-technology-1" style="color:#00bfa5"></span>
                    		  </div>
                    		  <h3>Pay Bills</h3>
                    	</a>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--Services Style Two-->
    <!--Shop Section-->
    <section class="shop-section">
    	<div class="auto-container">
        	<!--Section Title One-->
            <div class="sec-title-one">
                <h2>OUR SHOP</h2>
                <div class="text"> We have a phone for everyone</div>
            </div>

        	<div class="row clearfix">

            	<!--Shop Item-->
                @php
                    $products = App\Models\Product::paginate(4);
                  
                @endphp
                @foreach ($products as $product)
                @php
                $color = App\Models\ProductColor::where('product_id',$product->id)->first();
                $storage = App\Models\ProductStorage::where('color_id',$color->id)->first();
                $model = App\Models\Pmodel::where('id',$product->model_id)->first();
                $image = App\Models\ProductImage::where('product_id',$product->id)->first();
                $condition = App\Models\ProductCondition::where('storage_id',$storage->id)->first();
                @endphp
                 <a href="{{ route('product.details',$product->id) }}" class="colored">
                <div class="shop-item col-md-3 col-sm-6 col-xs-12">
                	<div class="inner-box wow fadeIn" data-wow-delay="0ms" data-wow-duration="1500ms">

                    	<figure class="image-box">
                        <img src="{{asset('storage/images/products/'.$image->image ?? '')}}" alt="" />
                        </figure>
                        <!--Lower Content-->

                        <div class="lower-content">
                        	<h4>{{ $model->brand->brand_name  ?? '' }}  {{ $model->model_name ?? '' }}</h4>
                        	<div> <span>{{ $product->memory ?? ''}} - {{$color->color_name ?? ''}} - {{ $product->locked ?? ''}}</span> </div>
		                        <span>
		                        Warranty: {{ $product->warranty ?? ''}}
		                        </span>
		                        <div>Starting from</div>
                            <div class="price">
                            <strong>${{ $condition->price ?? '' }}.00</strong> <del>$950.00</del></div>
                        </div>
                   
                    </div>
                </div>
 </a>
                @endforeach

            </div>
            {{ $products->links('vendor.pagination.custom') }}
        </div>
    </section>
    <!--Testimonial Style Two-->
    <section class="testimonial-style-two">
    	<div class="auto-container">
        	<!--Section Title One-->
        	<div class="sec-title-one">
            	<h2>WHAT OUR CUSTOMERS SAID</h2>
                <div class="text"></div>
            </div>

        	<div class="testimonial-carousel">
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
        </div>
    </section>
    <!-- Blog Section / Style Two -->
    <section class="blog-section">
    	<div class="auto-container">

        	<div class="sec-title-one">
                <h2>OUR BLOG</h2>
                <div class="text"></div>
            </div>

        	<div class="row clearfix blogs-carousel">
            	<!--News Block-->
                @foreach (CityClass::allBlog() as $blog )


            	<div class="news-block style-two col-md-12 col-sm-12 col-xs-12">
                	<div class="inner-box">
                    	<!--Image Box-->
                    	<div class="image-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                    		<a href="{{route('blog.single',$blog->id)}}">
                                <img src="{{asset($blog->image)}}" style="max-height: 165px;" /></a>
                   		</div>
                        <!--Lower Content-->
                        <div class="lower-content">
                        	<h3><a href="{{route('blog.single',$blog->id)}}">{{$blog->title}}</a></h3>
                          <div class="text">{{ \Illuminate\Support\Str::limit($blog->desc, 200, $end='...') }}</div>
                          <ul class="list">
                              <li><span class="icon flaticon-business"></span> {{$blog->created_at->format('d F Y')}}</li>
                          </ul>
                        </div>
                    </div>
                </div>

                @endforeach

            </div>
        </div>
    </section>

    {{-- <section class="repair-section paybill-section">
    	<div class="auto-container">

        	<!--Sec Title One-->
            <div class="sec-title-one">
                <h2>CITIES WHERE SERVICE IS AVAILABLE:</h2>
                <!-- <div class="text">Overcome faithful endless salvation enlightenment salvation overcome pious merciful<br>ascetic madness holiest joy passion zarathustra suicide overcome snare.</div> -->
            </div>

        	<div class="row clearfix states-container">
        		<div class="overline"></div>
            <div class="col-md-2 col-xs-12">
            	<div class="state-item">
            		<input type="checkbox" class="state-checker" id="state-0">
	            	<label class="state-title" for="state-0">Arizona
	            		<img class="arrow-toggle" src="https://d7gh5vrfihrl.cloudfront.net/website/arrow.svg">
	            	</label>
	            	<div class="cities-wrapper">
	            		<a class="city-link" href="">Phoenix</a>
	            	</div>
	            </div>
	            <div class="state-item">
	            	<input type="checkbox" class="state-checker" id="state-1">
	            	<label class="state-title" for="state-1">California<img class="arrow-toggle" src="https://d7gh5vrfihrl.cloudfront.net/website/arrow.svg"></label>
	            	<div class="cities-wrapper">
	            		<a class="city-link" href="">Los Angeles</a>
	            	</div>
	            </div>
	            <div class="state-item">
	            	<input type="checkbox" class="state-checker" id="state-2">
	            	<label class="state-title" for="state-2">Colorado<img class="arrow-toggle" src="https://d7gh5vrfihrl.cloudfront.net/website/arrow.svg"></label>
	            	<div class="cities-wrapper">
	            		<a class="city-link" href="">Denver</a>
	            	</div>
	            </div>
            </div>
            <div class="col-md-2 col-xs-12">
            	<div class="state-item">
            		<input type="checkbox" class="state-checker" id="state-3">
            		<label class="state-title" for="state-3">Florida<img class="arrow-toggle" src="https://d7gh5vrfihrl.cloudfront.net/website/arrow.svg"></label>
            		<div class="cities-wrapper">
            			<a class="city-link" href="">Miami</a>
            			<a class="city-link" href="">Orlando</a>
            			<a class="city-link" href="">Tampa</a>
            		</div>
            	</div>
            	<div class="state-item">
            		<input type="checkbox" class="state-checker" id="state-4">
            		<label class="state-title" for="state-4">Georgia<img class="arrow-toggle" src="https://d7gh5vrfihrl.cloudfront.net/website/arrow.svg"></label>
            		<div class="cities-wrapper">
            			<a class="city-link" href="">Atlanta</a>
            		</div>
            	</div>
            </div>
            <div class="col-md-2 col-xs-12">
            	<div class="state-item">
            		<input type="checkbox" class="state-checker" id="state-5">
            		<label class="state-title" for="state-5">Illinois<img class="arrow-toggle" src="https://d7gh5vrfihrl.cloudfront.net/website/arrow.svg"></label>
            		<div class="cities-wrapper">
            			<a class="city-link" href="">Chicago</a>
            		</div>
            	</div>
            	<div class="state-item">
            		<input type="checkbox" class="state-checker" id="state-6">
            		<label class="state-title" for="state-6">Massachusetts<img class="arrow-toggle" src="https://d7gh5vrfihrl.cloudfront.net/website/arrow.svg"></label>
            		<div class="cities-wrapper">
            			<a class="city-link" href="">Boston</a>
            		</div>
            	</div>
            	<div class="state-item">
            		<input type="checkbox" class="state-checker" id="state-7">
            		<label class="state-title" for="state-7">Nevada<img class="arrow-toggle" src="https://d7gh5vrfihrl.cloudfront.net/website/arrow.svg"></label>
            		<div class="cities-wrapper">
            			<a class="city-link" href="">Las Vegas</a>
            		</div>
            	</div>
            </div>
            <div class="col-md-2 col-xs-12">
            	<div class="state-item">
            		<input type="checkbox" class="state-checker" id="state-8">
            		<label class="state-title" for="state-8">New York<img class="arrow-toggle" src="https://d7gh5vrfihrl.cloudfront.net/website/arrow.svg"></label>
            		<div class="cities-wrapper">
            			<a class="city-link" href="">New York City</a>
            		</div>
            	</div>
            	<div class="state-item">
            		<input type="checkbox" class="state-checker" id="state-9">
            		<label class="state-title" for="state-9">North Carolina<img class="arrow-toggle" src="https://d7gh5vrfihrl.cloudfront.net/website/arrow.svg"></label>
            		<div class="cities-wrapper">
            			<a class="city-link" href="">Charlotte</a>
            		</div>
            	</div>
            	<div class="state-item">
            		<input type="checkbox" class="state-checker" id="state-10">
            		<label class="state-title" for="state-10">Pennsylvania<img class="arrow-toggle" src="https://d7gh5vrfihrl.cloudfront.net/website/arrow.svg"></label>
            		<div class="cities-wrapper">
            			<a class="city-link" href="">Philadelphia</a>
            		</div>
            	</div>
            </div>
            <div class="col-md-2 col-xs-12">
            	<div class="state-item">
            		<input type="checkbox" class="state-checker" id="state-11">
            		<label class="state-title" for="state-11">Texas<img class="arrow-toggle" src="https://d7gh5vrfihrl.cloudfront.net/website/arrow.svg"></label>
            		<div class="cities-wrapper">
            			<a class="city-link" href="">Austin</a>
            			<a class="city-link" href="">Dallas</a>
            			<a class="city-link" href="">Houston</a>
            			<a class="city-link" href="">San Antonio</a>
            		</div>
            	</div>
            	<div class="state-item">
            		<input type="checkbox" class="state-checker" id="state-12">
            		<label class="state-title" for="state-12">Washington D.C.<img class="arrow-toggle" src="https://d7gh5vrfihrl.cloudfront.net/website/arrow.svg"></label>
            		<div class="cities-wrapper">
            			<a class="city-link" href="">Washington, D.C.</a>
            		</div>
            	</div>
            </div>
          </div>
        </div>
    </section> --}}

@endsection
@section('script')


@endsection
