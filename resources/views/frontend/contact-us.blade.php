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
</style>
@endsection
@section('content')
<!--Page Title-->
<section class="page-title" style="background-image: url(frontend-assets/images/background/3.jpg);">
	<div class="auto-container">
		<ul class="bread-crumb">
			<li><a href="index-2.html">Home</a></li>
			<li class="active">Contact</li>
		</ul>
		<h1>Contact</h1>
	</div>
</section>
<!--End Page Title-->

<!--Contact-->
<div class="contact-section">
	<div class="auto-container">
		<!--Contact Info Section-->
		<div class="contact-info-section">

			<!--Sec Title One-->
            @if(Session::has('message'))
            <div class="col-12">
                {!!Session::get('message')!!}
            </div>
            @endif
			<div class="sec-title-one">
				<h2>SEND US MESSAGE</h2>
				<div class="text">Overcome faithful endless salvation enlightenment salvation overcome pious merciful<br>ascetic madness holiest joy passion zarathustra suicide overcome snare.</div>
			</div>

			<div class="row clearfix">

				<!--Default Info Box-->
				<div class="default-info-box contact-info-box col-md-4 col-sm-6 col-xs-12">
					<div class="inner-box wow fadeIn" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="icon-box">
							<span class="icon flaticon-pin-1"></span>
						</div>
						<h3>Address</h3>
						<div class="text">123 Western Street, Sydney, Australia</div>
					</div>
				</div>

				<!--Default Info Box-->
				<div class="default-info-box contact-info-box col-md-4 col-sm-6 col-xs-12">
					<div class="inner-box wow fadeIn" data-wow-delay="300ms" data-wow-duration="1500ms">
						<div class="icon-box">
							<span class="icon flaticon-technology"></span>
						</div>
						<h3>Phone Number</h3>
						<div class="text">+ 456 789 0321</div>
					</div>
				</div>

				<!--Default Info Box-->
				<div class="default-info-box contact-info-box col-md-4 col-sm-6 col-xs-12">
					<div class="inner-box wow fadeIn" data-wow-delay="600ms" data-wow-duration="1500ms">
						<div class="icon-box">
							<span class="icon flaticon-clock"></span>
						</div>
						<h3>Opening Hours</h3>
						<div class="text">All Days: 9am to 6pm</div>
					</div>
				</div>

			</div>
		</div>

		<!--Contact Form-->
		<div class="contact-form default-form">
			<form  method="post"  action="{{ url('send-message')}}">
                @csrf
				<div class="row clearfix">
					<div class="form-group icon-group col-md-6 col-sm-12 col-xs-12">
						<div class="group-inner">
							<label class="icon-label" for="field-one"><span class="flaticon-avatar"></span></label>
							<input id="field-one" type="text" name="username" value="" placeholder="Your Name *" required>
						</div>
					</div>

					<div class="form-group icon-group col-md-6 col-sm-12 col-xs-12">
						<div class="group-inner">
							<label class="icon-label" for="field-two"><span class="flaticon-envelope"></span></label>
							<input id="field-two" type="email" name="email" value="" placeholder="Email" required>
						</div>
					</div>

					<div class="form-group icon-group col-md-6 col-sm-12 col-xs-12">
						<div class="group-inner">
							<label class="icon-label" for="field-two"><span class="flaticon-mobile"></span></label>
							<input id="field-two" type="number" name="phone_number" value="" placeholder="Phone Number" required>
						</div>
					</div>

					<div class="form-group icon-group col-md-6 col-sm-12 col-xs-12">
						<div class="group-inner">
							<label class="icon-label" for="field-two"><span class="flaticon-file"></span></label>
							<input id="field-two" type="number" name="order_number" value="" placeholder="Order Number" required>
						</div>
					</div>

					<div class="form-group icon-group col-md-12 col-sm-12 col-xs-12">
						<div class="group-inner">
							<label class="icon-label" for="field-two"><span class="flaticon-file"></span></label>
							<input id="field-two" type="text" name="subject" value="" placeholder="Subject" required>
						</div>
					</div>

					<div class="form-group icon-group col-md-12 col-sm-12 col-xs-12">
						<div class="group-inner">
							<label class="textarea-label icon-label" for="field-three"><span class="fa fa-pencil"></span></label>
							<textarea id="field-three" name="message" placeholder="Enter your message *"></textarea>
						</div>
					</div>
					<div class="form-group text-center col-md-12 col-sm-12 col-xs-12">
						<button type="submit" class="theme-btn btn-style-three">SUBMIT</button>
					</div>
				</div>
			</form>
		</div>

	</div>
</div>
@endsection
@section('script')


@endsection
