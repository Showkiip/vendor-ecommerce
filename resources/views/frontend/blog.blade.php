@extends('frontend.layouts.master')

@section('content')
<!--Page Title-->
<section class="page-title" style="background-image: url({{asset('frontend-assets/images/background/3.jpg')}});">
	<div class="auto-container">
		<ul class="bread-crumb">
			<li><a href="index-2.html">Home</a></li>
			<li class="active">Blog</li>
		</ul>
		<h1>blog</h1>
	</div>
</section>
<!--End Page Title-->

<!--Blog-->
<div class="sidebar-page-container">
    <div class="auto-container">
        <div class="row clearfix">
            <!--Content Side-->
            <div class="content-side col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!--Blog Section / Classic View-->
                <section class="blog-news-section classic-view blog-detail">

                    <!--BLog News Column-->
                    <div class="news-block style-two">
                        <div class="inner-box">
                            <!--Image Box-->
                            <div class="image-box" style="width: 75%;margin: 0 145px;height: 500px;overflow: hidden;">
                                <img src="{{asset($blog->image)}}" alt="">
                            </div>
                            <!--Lower Content-->
                            <div class="lower-content">
                                <h3><a href="blog-single.html">{{ $blog->title }} </a></h3>
                                <ul class="list">
                                    <li><span class="icon flaticon-avatar"></span> Posted by <span class="posted">Andriana</span></li>
                                    <li><span class="icon flaticon-business"></span> {{$blog->created_at->format('d F Y')}} </li>
                                </ul>
                                <div class="text">
                                    <p>{{ $blog->desc}}</p>
                                </div>
                              


                            </div>

                        </div>
                    </div>

                </section>




            </div>
            <!--Content Side-->

        </div>
    </div>
</div>



@endsection
@section('script')


@endsection
