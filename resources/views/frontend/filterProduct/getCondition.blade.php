
@forelse ($products as $product)
@php
// $color = App\Models\ProductColor::where('product_id',$product->id)->first();
// $storage = App\Models\ProductStorage::where('color_id',$color->id)->first();
$model = App\Models\Pmodel::where('id',$product->model_id)->first();
$image = App\Models\ProductImage::where('color_id',$product->color_id)->first();
// $condition = App\Models\ProductCondition::where('storage_id',$storage->id)->first();
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
@empty
<div class="text-center"><b>Oops! No Product In Stock</b></div>
@endforelse
