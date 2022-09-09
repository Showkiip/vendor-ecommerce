@extends('frontend.layouts.master')
<link rel="stylesheet" type="text/css" href="{{asset('frontend-assets/css/custom.css')}}">
<style>
  ._3Iq8JGYZpyTj97wvi5Wyu7
  {
    opacity: none;
  }
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
.imagess{
    width: 150px;  height: 150px;margin: auto;
  }
  @media(min-width:768px){
  .shop-item .inner-box {
    height: 350px;
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
  .imagess{
    width: 150px;  height: 150px;margin: auto;
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
      <h3 class="_3n9_eRVa OCgW6kA95RgHDgyrkt-3F">Buy Accessories</h3>

        <form name="contactUsForm" id="contactUsForm" method="post" action="javascript:void(0)">
            @csrf
      <div data-test="carrier-filters" class="_37xvF8QgM_NvGXx3HcYuJ2">
        <div class="a-cell row" data-v-2b8789a2="">

          <div class="a-cell xs-12 md-3" data-v-2b8789a2="">
            <div class="axop9d4ghf_ZiU7FQc-M8 baseselect-wrapper _2u25sfWmf6NUCbJ_StTs_r" data-v-2b8789a2=""><!---->
                <select id="brand_id" onchange="getBrand(this)" name="brand_id" class="_3Iq8JGYZpyTj97wvi5Wyu7 eUlOsp7XbB9G1L8SEMMpU baseselect-field">
                    <option selected value="">Select Brand....</option>
                    @foreach (CityClass::brands() as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                    @endforeach
                  </select>

              <label data-test="baseselect-label" class="PSXfa64BhcchUXTYm8jxr _2Y-fYnDKPqxkYV__KtgvWD baseselect-label">
               
              </label>
              <div class="_3CTJYWu3hsWyWna_ZcsF5I">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 443.9 476.5" data-test="baseselect-icon" class="-S5BM_soVHE3yxeKelL2Q _1-GUUYIHoGjHHKudYw6-sr"><path d="M220.2 355.7c-3.1 0-6.1-1.2-8.5-3.5L9.1 149.6c-4.7-4.7-4.7-12.3 0-17 4.7-4.7 12.3-4.7 17 0l194.1 194.1 197-197c4.7-4.7 12.3-4.7 17 0 4.7 4.7 4.7 12.3 0 17L228.7 352.2c-2.4 2.3-5.4 3.5-8.5 3.5z"></path></svg>
              </div>
            </div>
          </div>
          <div class="a-cell xs-12 md-3" data-v-2b8789a2="">
            <div id="showModel" class="axop9d4ghf_ZiU7FQc-M8 baseselect-wrapper _2u25sfWmf6NUCbJ_StTs_r" data-v-2b8789a2="" ><!---->
                <select id="simlock" onchange="getModel(this)" name="model_id" class="_3Iq8JGYZpyTj97wvi5Wyu7 eUlOsp7XbB9G1L8SEMMpU baseselect-field">
                    <option selected value="">Select Model ....</option>

                  </select>

              <label data-test="baseselect-label" class="PSXfa64BhcchUXTYm8jxr _2Y-fYnDKPqxkYV__KtgvWD baseselect-label">
                {{-- <span class="_1rmkAs0zRQWqTLR2midRVa baseselect-label-content">Best Selling</span> --}}
              </label>
              <div class="_3CTJYWu3hsWyWna_ZcsF5I">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 443.9 476.5" data-test="baseselect-icon" class="-S5BM_soVHE3yxeKelL2Q _1-GUUYIHoGjHHKudYw6-sr"><path d="M220.2 355.7c-3.1 0-6.1-1.2-8.5-3.5L9.1 149.6c-4.7-4.7-4.7-12.3 0-17 4.7-4.7 12.3-4.7 17 0l194.1 194.1 197-197c4.7-4.7 12.3-4.7 17 0 4.7 4.7 4.7 12.3 0 17L228.7 352.2c-2.4 2.3-5.4 3.5-8.5 3.5z"></path></svg>
              </div>
            </div>
          </div>
          <div class="a-cell xs-12 md-3" data-v-2b8789a2="">
            <div id="showCategory" class="axop9d4ghf_ZiU7FQc-M8 baseselect-wrapper _2u25sfWmf6NUCbJ_StTs_r" data-v-2b8789a2=""><!---->
                <select id="simlock" name="category_id" class="_3Iq8JGYZpyTj97wvi5Wyu7 eUlOsp7XbB9G1L8SEMMpU baseselect-field">
                    <option selected>Select Category ....</option>

                  </select>

              <label data-test="baseselect-label" class="PSXfa64BhcchUXTYm8jxr _2Y-fYnDKPqxkYV__KtgvWD baseselect-label">
                {{-- <span class="_1rmkAs0zRQWqTLR2midRVa baseselect-label-content">Best Selling</span> --}}
              </label>
              <div class="_3CTJYWu3hsWyWna_ZcsF5I">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 443.9 476.5" data-test="baseselect-icon" class="-S5BM_soVHE3yxeKelL2Q _1-GUUYIHoGjHHKudYw6-sr"><path d="M220.2 355.7c-3.1 0-6.1-1.2-8.5-3.5L9.1 149.6c-4.7-4.7-4.7-12.3 0-17 4.7-4.7 12.3-4.7 17 0l194.1 194.1 197-197c4.7-4.7 12.3-4.7 17 0 4.7 4.7 4.7 12.3 0 17L228.7 352.2c-2.4 2.3-5.4 3.5-8.5 3.5z"></path></svg>
              </div>
            </div>
          </div>
          <div class="a-cell xs-12 md-3" data-v-2b8789a2="">
            <div class="axop9d4ghf_ZiU7FQc-M8 baseselect-wrapper _2u25sfWmf6NUCbJ_StTs_r" data-v-2b8789a2=""><!---->
                <button  type="submit" class="btn btn-primary btn-sm" id="submit">Search</button>
                 <button  type="button" class="btn btn-default btn-sm" style="display: none;margin-left: 3px" id="submitclear">Clear</button>
            </div>
          </div>
        </div>
      </div>

     </form>
      <div class="items-sorting">
            <div class="row clearfix">
                <div class="results-column col-md-6 col-sm-6 col-xs-12">
                    <h4>Sorting</h4>
                </div>
                <div class="select-column pull-right col-md-3 col-sm-4 col-xs-12">
                    <div class="form-group">
                        <select id="simlock" onchange="sortList(this)" name="sort" class="_3Iq8JGYZpyTj97wvi5Wyu7 eUlOsp7XbB9G1L8SEMMpU baseselect-field">
                            <option selected>Select Any Option....</option>
                            <option value="az">Alphabetical,A-Z</option>
                            <option value="za">Alphabetical,Z-A</option>
                            <option value="hl">Price,high to low</option>
                            <option value="lh">Price,low to high</option>
                            <option value="no">Date,new to old</option>
                            <option value="on">Date,old to new</option>

                          </select>
                    </div>
                </div>
            </div>
        </div>

    	<div class="row clearfix">
        <div class="col-md-3 sidebar-filter">
          <ul class="_1PyjTAdMUxZV6zOWToeiGU">
            <li class="_2LiMhAnX4MDtEL5YEDIdLy">
                <span class="_2RGsPtNo">Price</span>
                  <div id="slider-container"></div>
                      <p>
                        <label for="amount">Price range:</label>
                        <br>
                        <input type="text" id="amount" style="border: 0; color: #00bfa5; font-weight: bold;" />
                      </p>

                      <div id="slider-range"></div>
                   </li>

            <li class="_2LiMhAnX4MDtEL5YEDIdLy">
              <h3 class="_2RGsPtNo">Category</h3>
              <ul data-test="filters-facet" class="_26WV8o_nAH1VuLftdiS-6t">
                @foreach (CityClass::accessCategory() as $category)
                <li data-test="facet-item" class="_33pDOgQ80LhcEmJTGXNM3U"><div>
                    <input id="{{$category->id}}" name="category" type="checkbox" data-test="facet-{{$category->category}}" class="_3wvnh-Qn getCategory" value="{{$category->id}}" onclick="getCategories()">
                     <label for="{{$category->id}}" class="_33K8eTZu"><div class="_3S4CObWg"><div class="_2OVE0h6V"></div> <div class="_3xAYCg9N"><svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg></div></div> <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC _1LYyf7lOuywpdBWUdNvl1k">
                   {{$category->category}}
                </span> </span></div> <!----> <!----></label></div></li>
                @endforeach

              </ul>
            </li>


        </div>
        <div class="col-md-9">
          <div class="row" id="filter">

            <!--Shop Item-->
            @foreach (CityClass::accessory() as $accessory)
             @php
                 $model = App\Models\Pmodel::where('id',$accessory->model_id)->first();
                 $imag = App\Models\AccessoryImage::where('accessory_id',$accessory->id)->first();
             @endphp
            <div class="shop-item col-md-4 col-sm-6 col-xs-12">
                <div class="inner-box">
                    @if (Auth::user())

                    @if (CityClass::accessWishlist($accessory->id) == "1")
                    <a href="#" onclick="undoWishlist({{$accessory->id}})"><i class="fa fa-heart" style="font-size: 30px;color:#ff0707"></i></a>
                    @else
                    <a href="#" onclick="wishlist({{$accessory->id}})"><i class="fa fa-heart" style="font-size: 30px;color:#adadad"></i></a>
                    @endif
                  @else
                  <a href="#" onclick="wishlist({{$accessory->id}})"><i class="fa fa-heart" style="font-size: 30px;color:#adadad"></i></a>
                 @endif
                 <a href="{{route('accessory.single',$accessory->id)}}" class="colored">
                    <figure class="image-box">
                       <img src="{{asset('/storage/accessories/images/'.$imag->images)}}" alt="" class="imagess"/>
                      </figure>
                      <!--Lower Content-->
                      <div class="lower-content">
                        <h5> <strong>{{ $model->brand->brand_name }} {{ $model->model_name }}</strong></h5>
                        <div> <span>{{ $accessory->category_id }} - {{ $accessory->name }}</span> </div>
                          <span>
                          {{-- Warranty: 12 months --}}
                          </span>
                          <div>Starting from</div>
                          <div class="price">
                          <strong>${{ $accessory->sell_price }}.00</strong> <del>${{ $accessory->orig_price }}.00</del></div>
                          <!-- <a href="{{url('single')}}" class="cart-btn theme-btn btn-style-two">Add to cart</a> -->
                      </div>
                      </a>
                  </div>
              </div>
            @endforeach



          </div>
        </div>
      </div>

        <div class="text-center">
        	<!-- Styled Pagination -->
            <div class="styled-pagination">
                <ul>
                    <li>{{ CityClass::accessory()->links('vendor.pagination.custom') }}</li>

                </ul>
            </div>
        </div>

    </div>
</section>
@endsection
@section('script')

<script>
    function getCategories()
       {

             var  getCategory = [];
                $(".getCategory").each(function(){
                    if($(this).is(":checked")){
                        getCategory.push($(this).val());
                    }
                });

                var getCategory = getCategory.toString();
                        console.log(getCategory);
                $.ajax({
                    url: "{{url('getcategory')}}",
                    type:"get",
                    dataType:"html",
                    data:{getCategory:getCategory},

                    success:function(response){
                    console.log(response);
                    $('#filter').html(response);
                    //   $('#exampleModal'+id).modal('show');
                    },

                });

       }



    function getBrand(event){

           var id = $(event).val();
        //    alert(id);
       $.ajax({
        url: "{{url('getAccessoryFilter')}}/"+id,
        type:"get",

        success:function(response){

            console.log(response);
          $('#showModel').html(response);

        },


       });

      }

      function getModel(event){

        var id = $(event).val();
        //    alert(id);
       $.ajax({
        url: "{{url('getAccessoryModel')}}/"+id,
        type:"get",

        success:function(response){

            console.log(response);
          $('#showCategory').html(response);

        },


       });



      }

      $('#submitclear').click(function(){
        var _token = $('input[name="_token"]').val();
       $('#submitclear').hide();
        var category_id = '';
        var model_id = '';
        var brand_id ='';
         $.ajax({
        url: "{{ route('search.accessory') }}",
        type: "POST",
        data: {_token:_token,brand_id:brand_id,
            model_id:model_id,
            category_id:category_id
        },
        success: function( response ) {
            console.log(response);
        $('#filter').html(response);

        document.getElementById("contactUsForm").reset();
        }
        });
      })

      $('#contactUsForm').on('submit',function(e){
        e.preventDefault();
        $('#submitclear').show();
        var _token = $('input[name="_token"]').val();

        var category_id = $("#category_id").val();
        var model_id = $("#model_id").val();
        var brand_id = $("#brand_id").val();

        $('#submit').html('Please Wait...');
        $("#submit"). attr("disabled", true);
        $.ajax({
        url: "{{ route('search.accessory') }}",
        type: "POST",
        data: {_token:_token,brand_id:brand_id,
            model_id:model_id,
            category_id:category_id
        },
        success: function( response ) {
            console.log(response);
        $('#filter').html(response);

        $('#submit').html('Search');
        $("#submit"). attr("disabled", false);
        document.getElementById("contactUsForm").reset();
        }
        });

        });


      function wishlist(id)
      {
        //   alert(colorID);
        @if (!Auth::user())
          window.location.href = "../signin";
        @else
        $.ajax({
            type:"get",
            url: "{{ url('accessory-wishlist') }}/"+id,

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
            url: "{{ url('undo-access-wishlist') }}/"+id,

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
                url: "{{url('getPriceFilter')}}",
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

 function sortList(event)
 {
     var sort = $(event).val();
    //    alert(sort);
    //  if(sort == 'az')
    //  {
        $.ajax({
                url: "{{url('getSortList')}}",
                type:"get",
                dataType:"html",
                data:{sort:sort},
                success:function(response){
                console.log(response);
                $('#filter').html(response);
                //   $('#exampleModal'+id).modal('show');
                },

            });
    //  }
 }

    </script>
@endsection
