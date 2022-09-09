@extends('frontend.layouts.master')
<link rel="stylesheet" type="text/css" href="{{asset('frontend-assets/css/custom.css')}}">
<style>
	.order-row{
		margin-top: 6rem;
		margin-bottom: 6rem;
		display: flex;
	}
	.order-box{
		box-shadow: 1px 1px 6px 2px #00bfa5;
	    height: 300px;
	    border-radius: 14px;
	    display: flex;
	    align-items: center;
	    justify-content: center;
	}
	.order-box h2{
		line-height: 2;
		text-align: center;
	}
	.check-circle{
		width: 50px;
	    height: 50px;
	    background: #00bfa5;
	    border-radius: 50%;
	    padding: 15px;
	    color: #fff;
	}
</style>
@section('content')
<div class="container">
	<div class="row justify-content-center order-row">
		<div class="col-md-6">
			<div class="order-box">
				<h2>
					<span class="check-circle"><i class="fa fa-check"></i></span>
				 <br> Thanks for subcribing</h2>
			</div>
		</div>
	</div>
</div>
@endsection
