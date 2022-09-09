<!-- Main Header-->
<header class="main-header header-style-three">

  <!--Header-Upper-->
  <div class="header-upper">
    <div class="auto-container">
      <div class="clearfix">

        <div class="pull-left logo-outer">
          <div class="logo"><a href="{{url('/')}}"><img src="{{asset('frontend-assets/images/logo1.png')}}" alt="" title="Cell City"></a></div>
        </div>

        <div class="pull-right menu-outer clearfix">

          <div class="nav-outer clearfix">
            <!-- Main Menu -->
            <nav class="main-menu">
              <div class="navbar-header">
                <!-- Toggle Button -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              </div>

              <div class="navbar-collapse collapse clearfix">
                <ul class="navigation clearfix">
                  <li class="repair"><a href="{{route('repair.index')}}">Phone Repair</a>
                    {{-- <ul class="repair-dropdown">
                      <li><a href="">Screen</a></li>
                      <li><a href="">Battery</a></li>
                      <li><a href="">MIC</a></li>
                      <li><a href="">Receiver</a></li>
                      <li><a href="">Charging Jack</a></li>
                      <li><a href="">Speaker</a></li>
                      <li><a href="">Proximity Sensor</a></li>
                      <li><a href="">Aux Jack</a></li>
                    </ul> --}}
                  </li>
                  <li class=""><a href="{{url('buy-phone')}}">Buy Phones</a>
                  </li>
                  <li><a href="{{url('buy-accessories')}}">Buy Accessories</a></li>
                  <li><a href="{{url('pay-bills')}}">Pay Bills</a></li>
                  <li><a href="{{url('contact-us')}}">Contact Us</a></li>


                  @if(Auth::guard('web')->check())
                   <li><a href="{{url('profile')}}">My Profile</a> </li>
                   @php
                      $userID = Auth::user()->id;
                     $items=\Cart::session($userID)->getContent()
                   @endphp
                   <li>
                       {{-- <span class="badge  bagde->success">{{$items->count()}}</span> --}}
                       <a href="{{url('view-cart')}}"><i class="fa fa-cart-plus"></i> Cart</a>
                    </li>

                  @else
                  <li>
                    {{-- <span class="badge  bagde->success">{{$items->count()}}</span> --}}
                    <a href="{{url('view-cart')}}"><i class="fa fa-cart-plus"></i> Cart</a>
                 </li>
                   <li class="dropdown"><a href="#">Sign In</a>
                    <ul>
                      <li><a href="{{url('signin')}}">Login as a customer ?</a></li>
                      <li><a href="{{url('tech/login')}}">Login as a technician ?</a></li>
                    </ul>
                  </li>

                  @endif

                </ul>
              </div>
            </nav><!-- Main Menu End-->



          </div>

        </div>

      </div>
    </div>
  </div>


  <!--Sticky Header-->
  <div class="sticky-header">
    <div class="auto-container clearfix">
      <!--Logo-->
      <div class="logo pull-left">
        <a href="{{url('/')}}" class="img-responsive"><img src="{{asset('frontend-assets/images/logo1.png')}}" alt="Cell City"></a>
      </div>

      <!--Right Col-->
      <div class="right-col pull-right">
        <!-- Main Menu -->
        <nav class="main-menu" style="padding-right: 150px">
          <div class="navbar-header">
            <!-- Toggle Button -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>

          <div class="navbar-collapse collapse clearfix">
            <ul class="navigation clearfix">
              <li class="repair"><a href="{{route('repair.index')}}">Phone Repair</a>
                {{-- <ul class="repair-dropdown">>
                  <li><a href="">Screen</a></li>
                  <li><a href="">Battery</a></li>
                  <li><a href="">MIC</a></li>
                  <li><a href="">Receiver</a></li>
                  <li><a href="">Charging Jack</a></li>
                  <li><a href="">Speaker</a></li>
                  <li><a href="">Proximity Sensor</a></li>
                  <li><a href="">Aux Jack</a></li>
                </ul> --}}
              </li>
              <li class=""><a href="#">Buy Phones</a>
              </li>
              <li><a href="{{url('buy-accessories')}}">Buy Accessories</a></li>
              <li><a href="{{url('pay-bills')}}">Pay Bills</a></li>
              <li><a href="{{url('contact-us')}}">Contact Us</a></li>
                 @if(Auth::guard('web')->check())
                   <li><a href="{{url('profile')}}">My Profile</a> </li>
                   <li>
                    {{-- <span class="badge  bagde->success">{{$items->count()}}</span> --}}
                    <a href="{{url('view-cart')}}"><i class="fa fa-cart-plus"></i>Cart</a> </li>

                  @else
                  <li>
                    {{-- <span class="badge  bagde->success">{{$items->count()}}</span> --}}
                    <a href="{{url('view-cart')}}"><i class="fa fa-cart-plus"></i>Cart</a> </li>
                   <li class="dropdown"><a href="#">Sign In</a>
                    <ul>
                      <li><a href="{{url('signin')}}">Login as a customer ?</a></li>
                      <li><a href="{{url('tech/login')}}">Login as a technician ?</a></li>
                    </ul>
                  </li>

                  @endif
            </ul>
          </div>
        </nav><!-- Main Menu End-->

      </div>
    </div>
  </div>
  <!--End Bounce In Header-->
</header>
