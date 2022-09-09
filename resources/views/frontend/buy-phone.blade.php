@extends('frontend.layouts.master')
<link rel="stylesheet" type="text/css" href="{{asset('frontend-assets/css/custom.css')}}">
<style>
#slider-container{
    width:260px;
    margin:10px;
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
.content {
  width: 50%;
  margin: 0 auto;
  margin-top: 5%;
  background-color: #e9e9e9;
  border-left: 8px solid black;
  padding: 20px;
}
.content h3 {
  font-weight:bold;
  margin-bottom: 24px;
}
.content p {
  margin-bottom: 12px;
}
#show-more, #show-less { 
  color: grey;
}
#show-more a, #show-less a{
  cursor: pointer;
  text-decoration:underline;
  color: auto;
}
@media(min-width:768px){
  .shop-item .inner-box {
    height: 380px;
  }
  .shop-item .inner-box a{
    position: relative;
  }
  .shop-item .inner-box a i{
    position: absolute;
    z-index: 9999;
    top: -10px;
    left: -18px;
  }
  #imagess{
    width: 150px;
    height: 150px;
    margin: auto;
}
}
@media(max-width:767px){
  .inner-box a{
    display: flex;
    position: relative;
  }
  .inner-box a i{
    position: absolute;
    z-index: 9999;
    top: -4px;
    left: 10px;
  }
  .shop-item .inner-box .image-box img{
    height: auto;
    
  }
})

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
    	<!--Sort By-->
      <h3 class="_3n9_eRVa OCgW6kA95RgHDgyrkt-3F">Buy Phones</h3>
      <div data-test="carrier-filters" class="_37xvF8QgM_NvGXx3HcYuJ2">
        <h3 class="_2B3yYCfeT_icE3-czlIZpA _24G233rJGINfRvQy6b013n fp6kZqTX1H1PmSmQgEG_U _6d15qX6LWY1Hi6Z98JjWP">I need a phone that works with ...</h3>
        <div class="a-cell row" data-v-2b8789a2="">
          <div class="a-cell xs-12 md-9 _114juaGTKcgQcFQKoPzirv" data-v-2b8789a2="">

            @forelse (CityClass::phoneServices() as $phoneservice)
            <label data-qa="checkbox-label" data-test="checkbox" class="_2dZyu6FGSL9sjsXTxboSwL _3FFHvPz39UA03ZA4Mv13pX" data-v-2b8789a2="">
              <input data-test="input" name="service" type="checkbox" class="_2X8Raljpwo5umcD_HYzefT getPhoneService" value="{{$phoneservice->id}}" onclick="phoneService()">
              <span data-test="checkbox-span" class="_2Q2hhB3NvM2sAldZj6fGXU"></span>
              <span class="L5UAN0lD0YKf94yOvozYH">
                <div class="_2QOueHT- HWdZT4KgOk8JhBI9OzX9g"><!---->
                    <img src="{{asset('storage/service/'.$phoneservice->image)}}" alt="#" loading="lazy" class="wrAXteFB">
                </div>
              </span>
            </label>
            @empty
                    Ops No data.....
            @endforelse

          </div>
          <div class="a-cell xs-12 md-3" data-v-2b8789a2="">
            <div class="axop9d4ghf_ZiU7FQc-M8 baseselect-wrapper _2u25sfWmf6NUCbJ_StTs_r" data-v-2b8789a2=""><!---->
              <select id="simlock" data-formgroup-element="" onchange="getUnlocked(this)" data-test="simlock" name="simlock" class="_3Iq8JGYZpyTj97wvi5Wyu7 eUlOsp7XbB9G1L8SEMMpU baseselect-field">
                <option value="">Select Locked or Unlocked</option>
                <option value="Locked">Locked Only</option>
                <option value="Unlocked">Unlocked only </option>
              </select>
              <label data-test="baseselect-label" for="simlock" class="PSXfa64BhcchUXTYm8jxr _2Y-fYnDKPqxkYV__KtgvWD baseselect-label">
                {{-- <span class="_1rmkAs0zRQWqTLR2midRVa baseselect-label-content">Locked or Unlocked</span> --}}
              </label>
              <div class="_3CTJYWu3hsWyWna_ZcsF5I">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 443.9 476.5" data-test="baseselect-icon" class="-S5BM_soVHE3yxeKelL2Q _1-GUUYIHoGjHHKudYw6-sr"><path d="M220.2 355.7c-3.1 0-6.1-1.2-8.5-3.5L9.1 149.6c-4.7-4.7-4.7-12.3 0-17 4.7-4.7 12.3-4.7 17 0l194.1 194.1 197-197c4.7-4.7 12.3-4.7 17 0 4.7 4.7 4.7 12.3 0 17L228.7 352.2c-2.4 2.3-5.4 3.5-8.5 3.5z"></path></svg>
              </div>
            </div>
          </div>
        </div>
      </div>

        <!-- <div class="items-sorting">
            <div class="row clearfix">
                <div class="results-column col-md-6 col-sm-6 col-xs-12">
                    <h4>Showing 1–8 of 23 results</h4>
                </div>
                <div class="select-column pull-right col-md-3 col-sm-4 col-xs-12">
                    <div class="form-group">
                        <select name="sort-by">
                            <option>Default Sorting</option>
                            <option>By Order</option>
                            <option>By Price</option>
                        </select>
                    </div>
                </div>
            </div>
        </div> -->

    	<div class="row clearfix">
        <div class="col-md-3 sidebar-filter">
          <ul class="_1PyjTAdMUxZV6zOWToeiGU">
            <li class="_2LiMhAnX4MDtEL5YEDIdLy">
              <span class="_2RGsPtNo">Price</span>

                <div id="slider-container"></div>

                    <p>
                    <label for="amount">Price range:</label>
                    <input type="text" id="amount" style="border: 0; color: #00bfa5; font-weight: bold;" />
                    </p>
                    <div id="slider-range"></div>



             </li>

            <li class="_2LiMhAnX4MDtEL5YEDIdLy">
              <h3 class="_2RGsPtNo">Brand</h3>
              <ul data-test="filters-facet" class="_26WV8o_nAH1VuLftdiS-6t">
                {{-- <li class="_33pDOgQ80LhcEmJTGXNM3U">
                  <div>
                    <input id="brand-reset" type="checkbox" name="brand_name" data-test="facet-reset" class="_3wvnh-Qn">
                    <label for="brand-reset" class="_33K8eTZu">
                      <div class="_3S4CObWg">
                        <div class="_2OVE0h6V"></div>
                        <div class="_3xAYCg9N">
                          <svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg>
                        </div>
                      </div>
                      <div class="TRSMTVTh">
                        <span class="_28IelIKC">
                          <span class="_28IelIKC">All</span>
                        </span>
                      </div> <!----> <!---->
                    </label>
                  </div>
                </li> --}}
                @foreach (CityClass::brands() as $brand)

                <li data-test="facet-item" class="_33pDOgQ80LhcEmJTGXNM3U">
                  <div>
                    <input id="brand-{{ $brand->id }}" type="checkbox" name="brand_name" data-test="facet- {{ucwords($brand->brand_name) }}" class="_3wvnh-Qn getBrandId" value="{{ $brand->id }}" onclick="getBrand({{ $brand->id }})">
                    <label for="brand-{{ $brand->id }}" class="_33K8eTZu">
                      <div class="_3S4CObWg">
                        <div class="_2OVE0h6V"></div>
                        <div class="_3xAYCg9N">
                          <svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg>
                        </div>
                      </div>
                      <div class="TRSMTVTh">
                        <span class="_28IelIKC">
                          <span class="_28IelIKC _1LYyf7lOuywpdBWUdNvl1k">{{ucwords($brand->brand_name) }}</span><span></span>
                        </span>
                      </div>
                    </label>
                  </div>
                </li>
                @endforeach

                {{-- <span class="_3JZtHpVH kdWBx8BsOXOeHlX8MCQf_">
                  <button data-test="facet-toggler" class="_3wCdvNLg s1Zi9DG5">See more</button>
                </span> --}}
              </ul>
            </li>
              <li class="_2LiMhAnX4MDtEL5YEDIdLy"><h3 class="_2RGsPtNo">
                  Model
                </h3>
               <ul data-test="filters-facet" class="_26WV8o_nAH1VuLftdiS-6t" id="modelsss"  style="height: 213px;
                  overflow: hidden; ">
                    {{-- <li class="_33pDOgQ80LhcEmJTGXNM3U"><div><input id="model-reset" type="checkbox" checked="checked" data-test="facet-reset" class="_3wvnh-Qn"> <label for="model-reset" class="_33K8eTZu"><div class="_3S4CObWg"><div class="_2OVE0h6V"></div> <div class="_3xAYCg9N"><svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg></div></div> <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC">
                    All
                  </span></span></div> <!----> <!----></label></div></li> --}}

                  @foreach (CityClass::allModels() as $models)


                  <li data-test="facet-item" class="_33pDOgQ80LhcEmJTGXNM3U">

                          <input id="{{ $models->id }}" type="checkbox" name="models_name" data-test="facet-{{ $models->brand->brand_name ?? '' }}  {{ $models->model_name ?? ''}}" class="_3wvnh-Qn  getModelId"  value="{{ $models->id }}" onclick="getModels({{ $models->id }})">
                           <label for="{{{ $models->id }}}" class="_33K8eTZu">
                            <div class="_3S4CObWg">
                               <div class="_2OVE0h6V"></div>
                               <div class="_3xAYCg9N">
                                   <svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg>
                                    </div>
                                </div>
                                    <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC _1LYyf7lOuywpdBWUdNvl1k">
                                        {{ ucwords($models->brand->brand_name) ?? '' }}  {{ ucwords($models->model_name) ?? ''}}
                                    </span>
                                    </span>
                                </div> <!----> <!---->
                            </label>

                    </li>
                    @endforeach


                  
            </ul>
                 <span class="_3JZtHpVH kdWBx8BsOXOeHlX8MCQf_">
                      <button data-test="facet-toggler" class="_3wCdvNLg s1Zi9DG5" id="seeMore" onclick="seeMore()">
                       see more
                  </button>
                </span>
                 <span class="_3JZtHpVH kdWBx8BsOXOeHlX8MCQf_" id="seeLess" style="display:none" onclick="seeLess()">
                      <button data-test="facet-toggler" class="_3wCdvNLg s1Zi9DG5">
                       see less
                  </button>
                </span>
            </li>

              <li class="_2LiMhAnX4MDtEL5YEDIdLy"><h3 class="_2RGsPtNo">
                  New & Used
                </h3> <ul data-test="filters-facet" class="_26WV8o_nAH1VuLftdiS-6t">
                  {{-- <li class="_33pDOgQ80LhcEmJTGXNM3U"><div><input id="backbox_grades_list-reset" type="checkbox" checked="checked" data-test="facet-reset" class="_3wvnh-Qn"> <label for="backbox_grades_list-reset" class="_33K8eTZu"><div class="_3S4CObWg"><div class="_2OVE0h6V"></div> <div class="_3xAYCg9N"><svg aria-hidden="true" fill="currentType" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg></div></div> <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC">
                    All
                  </span></span></div> <!----> <!----></label></div></li> --}}


                  <li data-test="facet-item" class="_33pDOgQ80LhcEmJTGXNM3U"><div>
                      <input id="backbox_grades_list-10 new" name="type"  type="checkbox" value="new"  data-test="facet-new" class="_3wvnh-Qn gettype" onclick="getNewOld()" >
                       <label for="backbox_grades_list-10 new" class="_33K8eTZu"><div class="_3S4CObWg"><div class="_2OVE0h6V"></div> <div class="_3xAYCg9N"><svg aria-hidden="true" fill="currentType" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg></div></div> <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC _1LYyf7lOuywpdBWUdNvl1k">
                    New
                  </span> <!----></span></div> <!----> <!----></label></div></li>
                  <li data-test="facet-item" class="_33pDOgQ80LhcEmJTGXNM3U"><div>
                      <input id="backbox_grades_list-11 old"  name="type" type="checkbox"  value="old" data-test="facet-old" class="_3wvnh-Qn gettype" onclick="getNewOld()">
                      <label for="backbox_grades_list-11 old" class="_33K8eTZu"><div class="_3S4CObWg"><div class="_2OVE0h6V"></div> <div class="_3xAYCg9N"><svg aria-hidden="true" fill="currentType" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg></div></div> <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC _1LYyf7lOuywpdBWUdNvl1k">
                    Used
                  </span> <!----></span></div> <!----> <!----></label></div></li>

                </ul></li>


              <li class="_2LiMhAnX4MDtEL5YEDIdLy" id="showConditions"><h3 class="_2RGsPtNo">
                  Condition
                </h3> <ul data-test="filters-facet" class="_26WV8o_nAH1VuLftdiS-6t">
                  {{-- <li class="_33pDOgQ80LhcEmJTGXNM3U"><div><input id="backbox_grades_list-reset" type="checkbox" checked="checked" data-test="facet-reset" class="_3wvnh-Qn"> <label for="backbox_grades_list-reset" class="_33K8eTZu"><div class="_3S4CObWg"><div class="_2OVE0h6V"></div> <div class="_3xAYCg9N"><svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg></div></div> <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC">
                    All
                  </span></span></div> <!----> <!----></label></div></li> --}}


                  <li data-test="facet-item" class="_33pDOgQ80LhcEmJTGXNM3U"><div>
                      <input id="backbox_grades_list-10 Excellent" name="condition"  type="checkbox" value="excellent"  data-test="facet-Excellent" class="_3wvnh-Qn getCondition" onclick="getCondition()" >
                       <label for="backbox_grades_list-10 Excellent" class="_33K8eTZu"><div class="_3S4CObWg"><div class="_2OVE0h6V"></div> <div class="_3xAYCg9N"><svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg></div></div> <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC _1LYyf7lOuywpdBWUdNvl1k">
                    Excellent
                  </span> <!----></span></div> <!----> <!----></label></div></li>
                  <li data-test="facet-item" class="_33pDOgQ80LhcEmJTGXNM3U"><div>
                      <input id="backbox_grades_list-11 Good"  name="condition" type="checkbox"  value="good" data-test="facet-Good" class="_3wvnh-Qn getCondition" onclick="getCondition()">
                      <label for="backbox_grades_list-11 Good" class="_33K8eTZu"><div class="_3S4CObWg"><div class="_2OVE0h6V"></div> <div class="_3xAYCg9N"><svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg></div></div> <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC _1LYyf7lOuywpdBWUdNvl1k">
                    Good
                  </span> <!----></span></div> <!----> <!----></label></div></li>
                  <li data-test="facet-item" class="_33pDOgQ80LhcEmJTGXNM3U"><div>
                      <input id="backbox_grades_list-12 Fair" name="condition"  type="checkbox" value="fair"  data-test="facet-Fair" class="_3wvnh-Qn getCondition" onclick="getCondition()">
                      <label for="backbox_grades_list-12 Fair" class="_33K8eTZu"><div class="_3S4CObWg"><div class="_2OVE0h6V"></div> <div class="_3xAYCg9N"><svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg></div></div> <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC _1LYyf7lOuywpdBWUdNvl1k">
                    Fair
                  </span> <!----></span></div> <!----> <!----></label></div></li>
                  <!---->
                </ul></li>



                  <li class="_2LiMhAnX4MDtEL5YEDIdLy"><h3 class="_2RGsPtNo">
                  Phone Services Provider
                </h3> <ul data-test="filters-facet" class="_26WV8o_nAH1VuLftdiS-6t">
                  {{-- <li class="_33pDOgQ80LhcEmJTGXNM3U"><div><input id="compatible_carriers_facet-reset" type="checkbox" checked="checked" data-test="facet-reset" class="_3wvnh-Qn"> <label for="compatible_carriers_facet-reset" class="_33K8eTZu"><div class="_3S4CObWg"><div class="_2OVE0h6V"></div> <div class="_3xAYCg9N"><svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg></div></div> <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC">
                    All
                  </span></span></div> <!----> <!----></label></div></li> --}}
                  @forelse (CityClass::phoneServices() as $phoneservice)
                  <li data-test="facet-item" class="_33pDOgQ80LhcEmJTGXNM3U"><div>
                      <input id="{{$phoneservice->id}}" name="service" type="checkbox" data-test="facet-{{$phoneservice->service_name}}" class="_3wvnh-Qn getPhoneService" value="{{$phoneservice->id}}" onclick="phoneService()">
                       <label for="{{$phoneservice->id}}" class="_33K8eTZu"><div class="_3S4CObWg"><div class="_2OVE0h6V"></div> <div class="_3xAYCg9N"><svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg></div></div> <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC _1LYyf7lOuywpdBWUdNvl1k">
                     {{$phoneservice->service_name}}
                  </span> </span></div> <!----> <!----></label></div></li>
                  @empty

                  @endforelse


                {{-- <span class="_3JZtHpVH kdWBx8BsOXOeHlX8MCQf_"><button data-test="facet-toggler" class="_3wCdvNLg s1Zi9DG5">
                See more
              </button></span> --}}
            </ul></li>

              <li class="_2LiMhAnX4MDtEL5YEDIdLy"><h3 class="_2RGsPtNo">
                  Locked or Unlocked
                </h3> <ul data-test="filters-facet" class="_26WV8o_nAH1VuLftdiS-6t">
                  {{-- <li class="_33pDOgQ80LhcEmJTGXNM3U"><div><input id="sim_lock_state-reset" type="checkbox" checked="checked" data-test="facet-reset" class="_3wvnh-Qn"> <label for="sim_lock_state-reset" class="_33K8eTZu"><div class="_3S4CObWg"><div class="_2OVE0h6V"></div> <div class="_3xAYCg9N"><svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg></div></div> <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC">
                    All
                  </span></span></div> <!----> <!----></label></div></li> --}}
                   <li data-test="facet-item" class="_33pDOgQ80LhcEmJTGXNM3U"><div>
                       <input id="sim_lock_state-Locked" type="checkbox" data-test="facet-Locked" class="_3wvnh-Qn getLocked" value="Locked" onclick="getLocked()">
                       <label for="sim_lock_state-Locked" class="_33K8eTZu"><div class="_3S4CObWg"><div class="_2OVE0h6V"></div> <div class="_3xAYCg9N"><svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg></div></div> <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC _1LYyf7lOuywpdBWUdNvl1k">
                    Locked only
                  </span> </span></div> <!----> <!----></label></div></li>
                  <li data-test="facet-item" class="_33pDOgQ80LhcEmJTGXNM3U"><div>
                      <input id="sim_lock_state-Unlocked only" type="checkbox" data-test="facet-Unlocked" class="_3wvnh-Qn getLocked" value="Unlocked" onclick="getLocked()">
                      <label for="sim_lock_state-Unlocked only" class="_33K8eTZu"><div class="_3S4CObWg"><div class="_2OVE0h6V"></div> <div class="_3xAYCg9N"><svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg></div></div> <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC _1LYyf7lOuywpdBWUdNvl1k">
                    Unlocked only
                  </span> </span></div> <!----> <!----></label></div></li> <!----></ul></li>

                <li class="_2LiMhAnX4MDtEL5YEDIdLy items">
                  <h3 class="_2RGsPtNo">
                  Storage (GB)
                </h3> <ul data-test="filters-facet" class="_26WV8o_nAH1VuLftdiS-6t">
                  {{-- <li class="_33pDOgQ80LhcEmJTGXNM3U"><div><input id="storage-reset" type="checkbox" checked="checked" data-test="facet-reset" class="_3wvnh-Qn"> <label for="storage-reset" class="_33K8eTZu"><div class="_3S4CObWg"><div class="_2OVE0h6V"></div> <div class="_3xAYCg9N"><svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg></div></div> <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC">
                    All
                  </span></span></div> <!----> <!----></label></div></li> --}}
                  <li data-test="facet-item" class="_33pDOgQ80LhcEmJTGXNM3U"><div>
                      <input id="storage-2000 2 GB" type="checkbox" data-test="facet-1 GB" class="_3wvnh-Qn getStorage" value="2 GB" onclick="getStorage()">
                        <label for="storage-2000 2 GB" class="_33K8eTZu"><div class="_3S4CObWg"><div class="_2OVE0h6V"></div> <div class="_3xAYCg9N"><svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg></div></div> <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC _1LYyf7lOuywpdBWUdNvl1k">
                     2 GB
                  </span> </span></div> <!----> <!----></label></div></li>

                  <li data-test="facet-item" class="_33pDOgQ80LhcEmJTGXNM3U"><div>
                      <input id="storage-4000 4 GB" type="checkbox" data-test="facet-4 GB" class="_3wvnh-Qn getStorage" value="4 GB" onclick="getStorage()">
                         <label for="storage-4000 4 GB" class="_33K8eTZu"><div class="_3S4CObWg"><div class="_2OVE0h6V"></div> <div class="_3xAYCg9N"><svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg></div></div> <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC _1LYyf7lOuywpdBWUdNvl1k">
                    4 GB
                  </span> </span></div> <!----> <!----></label></div></li>

                  <li data-test="facet-item" class="_33pDOgQ80LhcEmJTGXNM3U"><div>
                      <input id="storage-8000 8 GB" type="checkbox" data-test="facet-8 GB" class="_3wvnh-Qn getStorage" value="8 GB" onclick="getStorage()">
                        <label for="storage-8000 8 GB" class="_33K8eTZu"><div class="_3S4CObWg"><div class="_2OVE0h6V"></div> <div class="_3xAYCg9N"><svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg></div></div> <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC _1LYyf7lOuywpdBWUdNvl1k">
                    8 GB
                  </span> </span></div> <!----> <!----></label></div></li>
            
                  <li data-test="facet-item" class="_33pDOgQ80LhcEmJTGXNM3U"><div>
                      <input id="storage-16000 16 GB" type="checkbox" data-test="facet-16 GB" class="_3wvnh-Qn  getStorage" value="16 GB" onclick="getStorage()">
                        <label for="storage-16000 16 GB" class="_33K8eTZu"><div class="_3S4CObWg"><div class="_2OVE0h6V"></div> <div class="_3xAYCg9N"><svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg></div></div> <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC _1LYyf7lOuywpdBWUdNvl1k">
                    16 GB
                  </span> </span></div> <!----> <!----></label></div></li>

                  <div id="show-more" class="_3JZtHpVH kdWBx8BsOXOeHlX8MCQf_">
                    <a href="javascript:void(0)" data-test="facet-toggler" class="_3wCdvNLg s1Zi9DG5" >see more</a>
                  </div>
                  <div id="show-more-content">


                  <li data-test="facet-item" class="_33pDOgQ80LhcEmJTGXNM3U"><div>
                      <input id="storage-32000 32 GB" type="checkbox" data-test="facet-32 GB" class="_3wvnh-Qn  getStorage" value="32 GB" onclick="getStorage()">
                         <label for="storage-32000 32 GB" class="_33K8eTZu"><div class="_3S4CObWg"><div class="_2OVE0h6V"></div> <div class="_3xAYCg9N"><svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg></div></div> <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC _1LYyf7lOuywpdBWUdNvl1k">
                    32 GB
                  </span></span></div> <!----> <!----></label></div></li>

                  <li data-test="facet-item" class="_33pDOgQ80LhcEmJTGXNM3U"><div>
                      <input id="storage-64000 64 GB" type="checkbox" data-test="facet-62 GB" class="_3wvnh-Qn  getStorage" value="64 GB" onclick="getStorage()" >
                         <label for="storage-64000 64 GB" class="_33K8eTZu"><div class="_3S4CObWg"><div class="_2OVE0h6V"></div> <div class="_3xAYCg9N"><svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg></div></div> <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC _1LYyf7lOuywpdBWUdNvl1k">
                    64 GB
                  </span> </span></div> <!----> <!----></label></div></li>
                  <li data-test="facet-item" class="_33pDOgQ80LhcEmJTGXNM3U"><div>
                    <input id="storage-128000 128 GB" type="checkbox" data-test="facet-128 GB" class="_3wvnh-Qn  getStorage" value="128 GB" onclick="getStorage()" >
                       <label for="storage-128000 128 GB" class="_33K8eTZu"><div class="_3S4CObWg"><div class="_2OVE0h6V"></div> <div class="_3xAYCg9N"><svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg></div></div> <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC _1LYyf7lOuywpdBWUdNvl1k">
                  128 GB
                </span> </span></div> <!----> <!----></label></div></li>
                <li data-test="facet-item" class="_33pDOgQ80LhcEmJTGXNM3U"><div>
                    <input id="storage-256000 256 GB" type="checkbox" data-test="facet-256 GB" class="_3wvnh-Qn  getStorage" value="256 GB" onclick="getStorage()" >
                       <label for="storage-256000 256 GB" class="_33K8eTZu"><div class="_3S4CObWg"><div class="_2OVE0h6V"></div> <div class="_3xAYCg9N"><svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg></div></div> <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC _1LYyf7lOuywpdBWUdNvl1k">
                  256 GB
                </span> </span></div> <!----> <!----></label></div></li>
                <div>

                <div id="show-less" class="_3JZtHpVH kdWBx8BsOXOeHlX8MCQf_">
                  <a href="javascript:void(0)" data-test="facet-toggler" class="_3wCdvNLg s1Zi9DG5" >
                    see less</a></div>
{{--
                   <span class="_3JZtHpVH kdWBx8BsOXOeHlX8MCQf_"><button data-test="facet-toggler" class="_3wCdvNLg s1Zi9DG5">
                See more
              </button></span> --}}
            </ul></li>
              </ul>
        </div>
        <div class="col-md-9">
          <div class="row" id="filter">
            <!--Shop Item--><!--Shop Item-->
             @foreach ($products as $product)
                @php
                $color = App\Models\ProductColor::where('product_id',$product->id)->first();
                $storage = App\Models\ProductStorage::where('color_id',$color->id)->first();
                $model = App\Models\Pmodel::where('id',$product->model_id)->first();
                $images = App\Models\ProductImage::where('product_id',$product->id)->first();
                // dd($images);
                $condition = App\Models\ProductCondition::where('storage_id',$storage->id)->first();
                @endphp

                
            <div class="shop-item col-md-4 col-sm-6 col-xs-12">
            
              <div class="inner-box">
                  @if (Auth::user())

                     @if (CityClass::checkWishlist($product->id) == "1")
                     <a href="#" onclick="undoWishlist({{$product->id}})"><i class="fa fa-heart" style="font-size: 30px;color:#ff0707"></i></a>
                     @else
                     <a href="#" onclick="wishlist({{$product->id}})"><i class="fa fa-heart" style="font-size: 30px;color:#adadad"></i></a>
                     @endif
                   @else
                   <a href="#" onclick="wishlist({{$product->id}})"><i class="fa fa-heart" style="font-size: 30px;color:#adadad"></i></a>
                  @endif

                  <a href="{{ route('product.details',$product->id) }}" class="colored">

                  <figure class="image-box">

                 <img src="{{asset('storage/images/products/'.$images->image ?? '' )}}" alt="" id="imagess"  />

                </figure>
                  <!--Lower Content-->
                  <div class="lower-content">
                    <h4><strong>{{ $model->brand->brand_name ?? ''}}  {{ $model->model_name ?? ''}}</strong></h4>
                    <div> <span>{{ $storage->storage  ?? ''}} - {{$color->color_name ?? ''}} - {{ $product->locked ?? '' }}</span> </div>
                      <span>
                      Warranty: {{ $product->warranty ?? '' }}
                      </span>
                      <div class="brand-imgs">
                          @forelse ($product->service as $service)
                          <div class="brand">
                            <img src="{{asset('storage/service/'.$service->image)}}">
                          </div>
                          @empty
                          <div></div>
                          @endforelse
                        </div>
                      <div>Starting from</div>
                      @if($product->type == 'new')
                      
                      <div class="price">
                      <strong>${{ $condition->price ?? '' }}</strong></div>
                     @else
                     <div class="price">
                       @if($condition->price == $condition->orig_price)
                      <strong>${{ $condition->price ?? '' }}</strong> </del>

                       @else 
                       <strong>${{ $condition->price ?? '' }}</strong> <del>${{ $condition->orig_price ?? ''}}</del>
                      @endif
                       </div>
                      @endif
                      <!-- <a href="" class="cart-btn theme-btn btn-style-two">Add to cart</a> -->
                  </div>
                  </a>  
                </div>
               
            </div>
            
            @endforeach


          </div>
          <div class="text-center">
        	<!-- Styled Pagination -->
            <div class="styled-pagination">
                {{ $products->links('vendor.pagination.custom') }}
            </div>
        </div>
        </div>
      </div>



    </div>
</section>
@endsection
@section('script')

<script>


    function getBrand(id){
        //   alert('asdasd');
        var id = id;
       var  brand = [];

       $(".getCondition").each(function(){
        if($(this).is(":checked")){
            $('.getCondition').prop('checked', false);
        }
       });
      ;
       $(".getStorage").each(function(){
                if($(this).is(":checked")){
                    $('.getStorage').prop('checked', false);
                }
            });

       $(".getBrandId").each(function(){
        if($(this).is(":checked")){
            brand.push($(this).val());
        }
       });

       $('input:checkbox[name=models_name]').each(function()
            {
                if($(this).is(':checked'))
                $('.getModelId').prop('checked', false);
            //    console.log(selectedBrand);
            });

       var getbrand = brand.toString();
            // console.log(getbrand);
       $.ajax({
        url: "{{url('getBrandFilter')}}",
        type:"get",
        dataType: "json",
        data:"brand=" + brand,

        success:function(response){
          console.log(response);
             var mode= JSON.stringify(response)
            var brnd = JSON.parse(mode);
            console.log(brnd);
          $('#modelsss').html(response.models);
          $('#filter').html(response.brands);

        //   $('#exampleModal'+id).modal('show');
        },


       });

      }

      function getModels(id){
        //   alert('asdasd');
        // var id = id;

        $(".getCondition").each(function(){
        if($(this).is(":checked")){
            $('.getCondition').prop('checked', false);
        }
       });
  
         $(".getStorage").each(function(){
                if($(this).is(":checked")){
                    $('.getStorage').prop('checked', false);
                }
            });
         var selectedModel =[];
        $('input:checkbox[name=models_name]').each(function()
            {
                if($(this).is(':checked'))
                selectedModel.push($(this).val());
            //    console.log(selectedBrand);
            });

            var selectedModel = selectedModel.toString();
        // console.log($('input[name="brand_name"]:checked').serialize());

        var  models = [];
       $(".getModelId").each(function(){
        if($(this).is(":checked")){
            models.push($(this).val());
        }
       });

       var getmodels = models.toString();
            // console.log(getmodels);
       $.ajax({
        url: "{{url('getBrandFilter')}}",
        type:"get",
        dataType:"html",
        data:{model:getmodels,selectedModel:selectedModel},

        success:function(response){

          if(response) {
            try {
                $('#filter').html(JSON.parse(response).brands);
            } catch(e) {
              $('#filter').html(response);
            }
        }
          
        },


       });

      }

      function getCondition(){

        var selectedModel =[];
        $('input:checkbox[name=models_name]').each(function()
            {
                if($(this).is(':checked'))
                selectedModel.push($(this).val());
            //    console.log(selectedBrand);
            });

            var selectedModel = selectedModel.toString();
          console.log(selectedModel);


        var  getCondition = [];
       $(".getCondition").each(function(){
        if($(this).is(":checked")){
          getCondition.push($(this).val());
        }
       });

       var getCondition = getCondition.toString();
            console.log(getCondition);
       $.ajax({
        url: "{{url('getBrandFilter')}}",
        type:"get",
        dataType:"html",
        data:{getCondition:getCondition,selectedModel:selectedModel},

        success:function(response){
           if(response) {
            try {
                $('#filter').html(JSON.parse(response).brands);
            } catch(e) {
              $('#filter').html(response);
            }
        }
        },

       });

      }
      function getNewOld(){


        
        var selectedModel =[];
        $('input:checkbox[name=models_name]').each(function()
            {
                if($(this).is(':checked'))
                selectedModel.push($(this).val());
            //    console.log(selectedBrand);
            });

            var selectedModel = selectedModel.toString();
          console.log(selectedModel);


        var  gettype = [];
       $(".gettype").each(function(){
        if($(this).is(":checked")){
            gettype.push($(this).val());
        }
       });

       if(gettype == 'new')
       {
        $("#showConditions").hide();
       }
       else
       {
        $("#showConditions").show();
       }

       var gettype = gettype.toString();
            console.log(getCondition);

       $.ajax({
        url: "{{url('getBrandFilter')}}",
        type:"get",
        dataType:"html",
        data:{gettype:gettype,selectedModel:selectedModel},

        success:function(response){
            if(response) {
            try {
                $('#filter').html(JSON.parse(response).brands);
            } catch(e) {
              $('#filter').html(response);
            }
        }
        },

       });

      }
      function getStorage()
        {
            var selectedModel =[];
            $('input:checkbox[name=models_name]').each(function()
                {
                    if($(this).is(':checked'))
                    selectedModel.push($(this).val());
                //    console.log(selectedBrand);
                });

            var selectedModel = selectedModel.toString();
            

          console.log(selectedModel);
            var getStorage= [];
            $(".getStorage").each(function(){
                if($(this).is(":checked")){
                    getStorage.push($(this).val());
                }
            });

            var getStorage = getStorage.toString();
                    console.log(getStorage);
            $.ajax({
                url: "{{url('getBrandFilter')}}",
                type:"get",
                dataType:"html",
                data:{getStorage:getStorage,selectedModel:selectedModel},

                success:function(response){
                console.log(response);
                  if(response) {
                  try {
                      $('#filter').html(JSON.parse(response).brands);
                  } catch(e) {
                    $('#filter').html(response);
                  }
              }
                },

            });
        }

        function getLocked()
        {

            var selectedModel =[];
            $('input:checkbox[name=models_name]').each(function()
                {
                    if($(this).is(':checked'))
                    selectedModel.push($(this).val());
                //    console.log(selectedBrand);
                });

            var selectedModel = selectedModel.toString();

          console.log(selectedModel);
            var getLocked= [];
            $(".getLocked").each(function(){
                if($(this).is(":checked")){
                    getLocked.push($(this).val());
                }
            });

            var getLocked = getLocked.toString();
                    console.log(getLocked);
            $.ajax({
                url: "{{url('getBrandFilter')}}",
                type:"get",
                dataType:"html",
                data:{getLocked:getLocked,selectedModel:selectedModel},
                success:function(response){
                  if(response) {
                    try {
                        $('#filter').html(JSON.parse(response).brands);
                    } catch(e) {
                      $('#filter').html(response);
                    }
                }
                },

            });
        }

        function getUnlocked(event)
        {
              var getLocked = $(event).val();

              var selectedModel =[];
            $('input:checkbox[name=models_name]').each(function()
                {
                    if($(this).is(':checked'))
                    selectedModel.push($(this).val());
                //    console.log(selectedBrand);
                });

            var selectedModel = selectedModel.toString();

              $.ajax({
                url: "{{url('getBrandFilter')}}",
                type:"get",
                dataType:"html",
                data:{getLocked:getLocked,selectedModel:selectedModel},
                success:function(response){
                  if(response) {
                  try {
                      $('#filter').html(JSON.parse(response).brands);
                  } catch(e) {
                    $('#filter').html(response);
                  }
              }
                },

            });

        }

       function phoneService()
       {
                    var selectedModel =[];
                    $('input:checkbox[name=models_name]').each(function()
                        {
                            if($(this).is(':checked'))
                            selectedModel.push($(this).val());
                        //    console.log(selectedBrand);
                        });

                        var selectedModel = selectedModel.toString();
                    console.log(selectedModel);


                    var  phoneService = [];
                $(".getPhoneService").each(function(){
                    if($(this).is(":checked")){
                        phoneService.push($(this).val());
                    }
                });

                var phoneService = phoneService.toString();
                        console.log(phoneService);
                $.ajax({
                    url: "{{url('getBrandFilter')}}",
                    type:"get",
                    dataType:"html",
                    data:{phoneService:phoneService,selectedModel:selectedModel},

                    success:function(response){
                      if(response) {
                      try {
                          $('#filter').html(JSON.parse(response).brands);
                      } catch(e) {
                        $('#filter').html(response);
                      }
                  }
                    },

                });

       }

      function wishlist(productID)
      {
        //   alert(colorID);
        @if (!Auth::user())
          window.location.href = "../signin";
        @else
        $.ajax({
            type:"get",
            url: "{{ url('add-wishlist') }}/"+productID,

            success:function(wishlist)
            {
               window.location.reload();
               alert('Successfully add into your wishlist !');

            },error:function(error){
               console.log(error);
            }

            });
        @endif

      }

    function undoWishlist(id)
    {
        @if (!Auth::user())
          window.location.href = "../signin";
        @else
        $.ajax({
            type:"get",
            url: "{{ url('undo-wishlist') }}/"+id,

            success:function(wishlist)
            {
               window.location.reload();
            //    alert('Successfully Re into your wishlist !');

            },error:function(error){
               console.log(error);
            }

            });
        @endif
    }


</script>

<script>
    $(function() {
        $('#slider-container').slider({
            range: true,
            min: 0,
            max: 1000,
            values: [0, 1000],
            slide: function(event, ui) {
                $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
                var mi = ui.values[ 0 ];
                var mx = ui.values[ 1 ];
                filterSystem(mi, mx);

            }
        });

      $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
      " - $" + $( "#slider-range" ).slider( "values", 1 ) );

  });

function filterSystem(minPrice, maxPrice) {
    console.log(minPrice, maxPrice);

            $.ajax({
                url: "{{url('getBrandFilter')}}",
                type:"get",
                dataType:"html",
                data:{minPrice:minPrice,maxPrice:maxPrice},
                success:function(response){
                console.log(response);
                $('#filter').html(response);
                //   $('#exampleModal'+id).modal('show');
                },

            });

	$("#computers div.system").hide().filter(function() {

		var price = parseInt($(this).data("price"), 10);

        return price >= minPrice && price <= maxPrice;

	}).show();
}


</script>

<script>
$('#show-more-content').hide();

$('#show-more').click(function(){
	$('#show-more-content').show(300);
	$('#show-less').show();
	$('#show-more').hide();
});

$('#show-less').click(function(){
	$('#show-more-content').hide(150);
	$('#show-more').show();
	$(this).hide();
});

function seeMore()
{
   $("#seeLess").show();
   $("#seeMore").hide();
   $("#modelsss").css('height','auto');
}
function seeLess()
{
   $("#seeLess").hide();
   $("#seeMore").show();
   $("#modelsss").css('height','213px');
}
</script>
@endsection
