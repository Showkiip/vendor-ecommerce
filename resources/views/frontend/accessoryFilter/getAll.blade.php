

  @forelse ($accessories as $accessory)
  @php
      $model = App\Models\Pmodel::where('id',$accessory->model_id)->first();
      $imag = App\Models\AccessoryImage::where('accessory_id',$accessory->id)->first();
  @endphp
 <div class="shop-item col-md-4 col-sm-6 col-xs-12">
     <div class="inner-box h-100">
         @if (Auth::user())

         @if (CityClass::accessWishlist($accessory->id) == "1")
         <a href="#" onclick="undoWishlist({{$accessory->id}})"><i class="fa fa-heart" style="font-size: 30px;color:#ff0707"></i></a>
         @else
         <a href="#" onclick="wishlist({{$accessory->id}})"><i class="fa fa-heart" style="font-size: 30px;color:#adadad"></i></a>
         @endif
       @else
       <a href="#" onclick="wishlist({{$accessory->id}})"><i class="fa fa-heart" style="font-size: 30px;color:#adadad"></i></a>
      @endif
         <figure class="image-box">
             <a href="{{route('accessory.single',$accessory->id)}}"><img src="{{asset('/storage/accessories/images/'.$imag->images)}}" alt="" class="imagess" /></a>
           </figure>
           <!--Lower Content-->
           <div class="lower-content">
             <h3><a href="">{{ $model->brand->brand_name }} {{ $model->model_name }}</a></h3>
             <div> <span>{{ $accessory->category_id }} - {{ $accessory->name }}</span> </div>
               <span>
               {{-- Warranty: 12 months --}}
               </span>
               <div>Starting from</div>
               <div class="price">
               <strong>${{ $accessory->sell_price }}.00</strong> <del>${{ $accessory->orig_price }}.00</del></div>
               <!-- <a href="{{url('single')}}" class="cart-btn theme-btn btn-style-two">Add to cart</a> -->
           </div>
       </div>
   </div>
   @empty
   <div><h3 class="text-center"><strong>No products match the current search.</strong></h3></div>
 @endforelse
