@extends('frontend.layouts.master')

@section('content')

<section class="page-title" style="background-image: url({{asset('frontend-assets/images/background/3.jpg')}});">
    <div class="auto-container">
        <ul class="bread-crumb">
            <li><a href="index.html">Home</a></li>
            <li class="active">Features</li>
            <li class="active">Faq</li>
        </ul>
        <h1>Faq</h1>
    </div>
</section>
<div class="faqs-section">
    <div class="auto-container">
        <div class="row clearfix">
            <!--Content Side-->
            <div class="content-side col-lg-12 col-md-8 col-sm-12 col-xs-12">

                <!--Question Block-->
               @foreach (CityClass::faqs() as $faq)
                    <div class="question-block">
                        <h3>Q. {{$faq->question}}</h3>
                        <div class="text">{{ $faq->answer}}</div>

                    </div>
               @endforeach




            </div>
            <!--Content Side-->


        </div>
    </div>
</div>

@endsection

