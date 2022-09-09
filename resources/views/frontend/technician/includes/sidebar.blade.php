<div class="sidebar" data-color="#072f44" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="{{url('/')}}" class="simple-text logo-mini" style="width: 80%; float: none;">
          <div class="logo-image-small">
            <img src="{{asset('frontend-assets/images/logo1.png')}}" alt="Logo">
          </div>
        </a>
        <!-- <a href="{{url('/')}}" class="simple-text logo-normal"> -->
          <!-- Cell City -->
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        <!-- </a> -->
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active ">
            <a href="">
              <i class="nc-icon nc-bank"></i>
              <p>technician</p>
            </a>
          </li>

          <li>
            <a href="{{url('tech/orders')}}">
              <i class="nc-icon nc-bell-55"></i>
              <p>Orders</p>
            </a>
          </li>



          <!-- <li>


            <a  data-toggle="collapse" href="#manageQuote"  role="button" aria-expanded="false" aria-controls="manageQuote">
              <i class="nc-icon nc-pin-3"></i>
              <p>Manage Quotes</p>
            </a>
            <ul class="collapse" id="manageQuote">
              <li><a href="{{url('technician/quotes')}}">New cases</a></li>
            </ul>
          </li>

          <li>
            <a class="" data-toggle="collapse" href="#customer" role="button" aria-expanded="false" aria-controls="customer">
              <i class="nc-icon nc-diamond"></i>
              <p>Customer</p>
            </a>
            <ul class="collapse" id="customer">
              <li><a href="">Active</a></li>
              <li><a href="">Archieved</a></li>
              <li><a href="">Completed</a></li>
            </ul>
          </li>
          <li>
            <a class="" data-toggle="collapse" href="#blog" role="button" aria-expanded="false" aria-controls="customer">
              <i class="nc-icon nc-diamond"></i>
              <p>Blogs</p>
            </a>
            <ul class="collapse" id="blog">
              <li><a href="{{url('/technician/blogs')}}">Blogs</a></li>
            </ul>
          </li>
          <li>
            <a href="#manageUsers"  data-toggle="collapse"  role="button" aria-expanded="false" aria-controls="manageUsers">
              <i class="nc-icon nc-single-02"></i>
              <p>User Management</p>
            </a>
            <ul class="collapse" id="manageUsers">
              <li><a href="{{url('technician/user_management')}}">Add New User </a></li>
            </ul>
          </li>
          <li>
            <a class="" data-toggle="collapse" href="#accounts" role="button" aria-expanded="false" aria-controls="accounts">
              <i class="nc-icon nc-bell-55"></i>
              <p>Account</p>
            </a>
            <ul class="collapse" id="accounts">
              <li><a href="{{url('')}}">Sales</a></li>
              <li><a href="{{url('')}}">Invoice</a></li>
              <li><a href="{{url('')}}">Refund Cases</a></li>
            </ul>
          </li>
          <li>
            <a href="{{url('technician/user')}}">
              <i class="nc-icon nc-single-02"></i>
              <p>Profile Management</p>
            </a>
          </li> -->
          <!-- <li>
            <a href="{{url('technician/tables')}}">
              <i class="nc-icon nc-tile-56"></i>
              <p>Blogs</p>
            </a>
          </li> -->
          <!-- <li>
            <a class="" data-toggle="collapse" href="#messages" role="button" aria-expanded="false" aria-controls="messages">
              <i class="nc-icon nc-caps-small"></i>
              <p>Messages</p>
            </a>
            <ul class="collapse" id="messages">
              <li><a href="{{url('')}}">Expert Mesages</a></li>
              <li><a href="{{url('')}}">Customer Messages</a></li>
            </ul>
          </li> -->

          <li>
            <a href="{{ url('tech/paymeny-order') }}">
              <i class="nc-icon nc-single-02"></i>
              <p>Payments</p>
            </a>
          </li>
          <li>
            <a href="{{url('technician/help-menu')}}">
              <i class="nc-icon nc-single-02"></i>
              <p>Help Menu</p>
            </a>
          </li>
             <li>
            <a href="{{url('tech/logout')}}">
              <i class="nc-icon nc-bell-55"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
