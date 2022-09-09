@forelse ($products as $product)
@php
$color = App\Models\ProductColor::where('product_id',$product->id)->first();
$storage = App\Models\ProductStorage::where('color_id',$color->id)->first();
$model = App\Models\Pmodel::where('id',$product->model_id)->first();
$image = App\Models\ProductImage::where('product_id',$product->id)->first();
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
  <figure class="image-box">
    <a href="{{ route('product.details',$product->id) }}"><img src="{{asset('storage/images/products/'.$image->image ?? '' )}}" alt="" id="imagess"/></a>
  </figure>
  <!--Lower Content-->
  <div class="lower-content">
    <h3><a href="">{{ $model->brand->brand_name }}  {{ $model->model_name }} </a></h3>
    <div> <span>{{ $storage->storage }} -{{$color->color_name}} - {{ $product->locked }}</span> </div>
      <span>
      Warranty: {{ $product->warranty }}
      </span>

        <div class="brand-imgs">
            <div class="brand">
              <img src="{{asset('frontend-assets/images/tmobile.svg')}}">
            </div>
            <div class="brand">
              <img src="{{asset('frontend-assets/images/att.svg')}}">
            </div>
            <div class="brand">
              <img src="{{asset('frontend-assets/images/verizon.svg')}}">
            </div>
          </div>
      <div>Starting from</div>
      <div class="price">
      <strong>${{ $condition->price ?? '' }}.00</strong> <del>${{ $product->origi_price ?? ''}}</del></div>
      <!-- <a href="" class="cart-btn theme-btn btn-style-two">Add to cart</a> -->
  </div>
</div>
</div>
@empty
<div class="text-center"><b>Oops! No Product In Stock</b></div>
@endforelse
