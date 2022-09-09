<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="description" content="Cell City">
    <meta name="author" content="Cell City">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="keywords" content="cellCity">
    <title>Cell City</title>

    <link rel='stylesheet' href="{{ asset('frontend-assets/css/bootstrap.css') }}" media='' />
    <link rel='stylesheet' href="{{ asset('frontend-assets/css/revolution-slider.css') }}" media='' />
    <link rel='stylesheet' href="{{ asset('frontend-assets/css/style.css') }}" media='' />
    <link rel='stylesheet' href="{{ asset('frontend-assets/css/responsive.css') }}" media='' />

    <link href="{{ asset('admin-assets/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin-assets/datatable/jquery.dataTables.min.css') }}" rel="stylesheet" />
    <link rel='stylesheet' href="{{ asset('frontend-assets/css/jquery-ui.css') }}" />
    {{-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> --}}

    @yield('styling')
    
    
</head>

<body onload="myFunction()">
    <div class="page-wrapper">
        @include('frontend.includes.header')
        <!-- Main Content-->
        @yield('content')

        <!-- End Page -->
        @include('frontend.includes.footer')
    </div>
    <!--Scroll to top-->
    {{-- <div class="scroll-to-top scroll-to-target" data-target=".main-header"><span class="icon fa fa-long-arrow-up"></span>
</div> --}}

    <!--Search Popup-->
    <div id="search-popup" class="search-popup">
        <div class="close-search theme-btn"><span class="flaticon-unchecked"></span></div>
        <div class="popup-inner">

            <div class="search-form">
                <form method="post" action="">
                    <div class="form-group">
                        <fieldset>
                            <input type="search" class="form-control" name="search-input" value=""
                                placeholder="Search Here" required>
                            <input type="submit" value="Search" class="theme-btn">
                        </fieldset>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('frontend-assets/js/jquery.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/revolution.min.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/jquery.fancybox.pack.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/owl.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/slick.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/jquery.bootstrap-touchspin.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/wow.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/script.js') }}"></script>
    {{-- //datatable --}}
    <script src="{{ asset('admin-assets/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-assets/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/datatable.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/61418e5725797d7a89ff06e7/1ffk18210';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    
    
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-K2W6Y2NFFP"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-K2W6Y2NFFP');
</script>

    <!--End of Tawk.to Script-->
    @yield('script')
</body>

</html>
