@extends('frontend.layouts.master')
<link rel="stylesheet" type="text/css" href="{{asset('frontend-assets/css/custom.css')}}">
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
<section class="bills-section bills-page">
	<div class="auto-container">
    	<!--Sort By-->         
      <div class="sec-title-one">
        <h2>CHOOSE A CARRIER</h2>
      </div>         
    	<div class="row clearfix">
        <div class="col-xs-6 col-sm-4 col-md-3">
          <div class="bill-box">
            <img src="{{asset('frontend-assets/images/payBills/simplemobile.png')}}">
          </div>
        </div>
        <div class="col-xs-6 col-sm-4 col-md-3">
          <div class="bill-box">
            <img src="{{asset('frontend-assets/images/payBills/lyca.png')}}">
          </div>
        </div>
        <div class="col-xs-6 col-sm-4 col-md-3">
          <div class="bill-box">
            <img src="{{asset('frontend-assets/images/payBills/ultra.png')}}">
          </div>
        </div>
        <div class="col-xs-6 col-sm-4 col-md-3">
          <div class="bill-box">
            <img src="{{asset('frontend-assets/images/payBills/t-mob.png')}}">
          </div>
        </div>
        <div class="col-xs-6 col-sm-4 col-md-3">
          <div class="bill-box">
            <img src="{{asset('frontend-assets/images/payBills/simplemobile.png')}}">
          </div>
        </div>
        <div class="col-xs-6 col-sm-4 col-md-3">
          <div class="bill-box">
            <img src="{{asset('frontend-assets/images/payBills/lyca.png')}}">
          </div>
        </div>
        <div class="col-xs-6 col-sm-4 col-md-3">
          <div class="bill-box">
            <img src="{{asset('frontend-assets/images/payBills/ultra.png')}}">
          </div>
        </div>
        <div class="col-xs-6 col-sm-4 col-md-3">
          <div class="bill-box">
            <img src="{{asset('frontend-assets/images/payBills/t-mob.png')}}">
          </div>
        </div>
        <div class="col-xs-6 col-sm-4 col-md-3">
          <div class="bill-box">
            <img src="{{asset('frontend-assets/images/payBills/simplemobile.png')}}">
          </div>
        </div>
        <div class="col-xs-6 col-sm-4 col-md-3">
          <div class="bill-box">
            <img src="{{asset('frontend-assets/images/payBills/lyca.png')}}">
          </div>
        </div>
        <div class="col-xs-6 col-sm-4 col-md-3">
          <div class="bill-box">
            <img src="{{asset('frontend-assets/images/payBills/ultra.png')}}">
          </div>
        </div>
        <div class="col-xs-6 col-sm-4 col-md-3">
          <div class="bill-box">
            <img src="{{asset('frontend-assets/images/payBills/t-mob.png')}}">
          </div>
        </div>
      </div> 
      <div class="row clearfix" style="margin-top: 2em; margin-bottom: 2em;">
        <div class="col-md-12">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <br>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <br>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
      </div>
    </div>
</section>
@endsection
@section('script')

    
@endsection