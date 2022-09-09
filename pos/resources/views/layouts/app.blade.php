<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="description" content="Updates and statistics" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!--begin::Fonts-->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" /> -->
    <!--end::Fonts-->

    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{asset('assets/css/stylec619.css?v=1.0')}}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->

    <link href="{{asset('assets/api/pace/pace-theme-flat-top.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/api/mcustomscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"
        type="text/css" />
    <link href="{{asset('assets/api/datatable/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.html')}}" />
    @yield('css')
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="tc_body" class="header-fixed header-mobile-fixed subheader-enabled aside-enabled aside-fixed">
    <!-- Paste this code after body tag -->
    <div class="se-pre-con">
        <div class="pre-loader">
            <img class="img-fluid" src="{{asset('assets/images/loadergif.gif')}}" alt="loading">
        </div>
    </div>
    <!--begin::Header Mobile-->
    <div id="tc_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
        <!--begin::Logo-->
        <a href="index.html" class="brand-logo">

            {{-- <span class="brand-text"><img style="height: 25px;" alt="Logo"
                    src="{{asset('assets/images/misc/logo.png')}}" /></span> --}}

        </a>
        <!--end::Logo-->
        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
            @role('SuperAdmin|Cashier')
            <div class="posicon">
                <a href="{{ route('dashboard') }}"
                    class="btn btn-primary d-flex align-items-center justify-content-center white mr-2">POS</a>
            </div>
            @endrole
            <button class="btn p-0" id="tc_aside_mobile_toggle">
                <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-justify-right" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M6 12.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-4-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                </svg>
            </button>

            <button class="btn p-0 ml-2" id="tc_header_mobile_topbar_toggle">
                <span class="svg-icon svg-icon-xl">

                    <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-person-fill" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                    </svg>

                </span>
            </button>

        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Header Mobile-->
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">
            <div>
                <div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="tc_aside">
                    <!--begin::Brand-->
                    <div class="brand flex-column-auto" id="tc_brand">
                        <!--begin::Logo-->
                        <a href="#" class="brand-logo">
                            <img class="brand-image" style="height: 25px;" alt="Logo"
                                src="{{asset('assets/images/misc/k.png')}}" />
                            <span class="brand-text">
                                <h2 style="height: 25px;">AROMA</h2>
                                {{-- <img style="height: 25px;" alt="Logo"
                                    src="{{asset('assets/images/misc/logo.png')}}" /> --}}
                            </span>
                        </a>
                        <!--end::Logo-->
                    </div>
                    <!--end::Brand-->
                    <!--begin::Aside Menu-->
                    <div class="aside-menu-wrapper flex-column-fluid overflow-auto h-100" id="tc_aside_menu_wrapper">
                        <!--begin::Menu Container-->
                        <div id="tc_aside_menu" class="aside-menu  mb-5" data-menu-vertical="1" data-menu-scroll="1"
                            data-menu-dropdown-timeout="500">
                            <!--begin::Menu Nav-->
                            <div id="accordion">
                                @include('admin.partials.sidebar')
                            </div>

                            <!--end::Menu Nav-->
                        </div>
                        <!--end::Menu Container-->
                    </div>
                    <!--end::Aside Menu-->
                </div>
            </div>
            <!--begin::Aside-->

            <div class="aside-overlay"></div>
            <!--end::Aside-->
            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="tc_wrapper">
                <!--begin::Header-->
                <div id="tc_header" class="header header-fixed">
                    <!--begin::Container-->
                    <div class="container-fluid d-flex align-items-stretch justify-content-between">
                        <!--begin::Header Menu Wrapper-->
                        <div class="header-menu-wrapper header-menu-wrapper-left" id="tc_header_menu_wrapper">
                            <!--begin::Header Menu-->
                            <div id="tc_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                                <!--begin::Header Nav-->
                                <ul class="menu-nav">

                                    <li class="menu-item menu-item-open menu-item-here menu-item-submenu menu-item-rel menu-item-open menu-item-here menu-item-active p-0"
                                        data-menu-toggle="click" aria-haspopup="true">
                                        <!--begin::Toggle-->
                                        <div class="btn  btn-clean btn-dropdown mr-0 p-0" id="tc_aside_toggle">
                                            <span class="svg-icon svg-icon-xl svg-icon-primary">

                                                <svg width="24px" height="24px" viewBox="0 0 16 16" class="bi bi-list"
                                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                                                </svg>
                                            </span>
                                        </div>
                                        <!--end::Toolbar-->
                                    </li>

                                </ul>
                                <!--end::Header Nav-->
                            </div>
                            <!--end::Header Menu-->
                        </div>
                        <!--end::Header Menu Wrapper-->
                        <!--begin::Topbar-->
                        <div class="topbar">
                            @role('SuperAdmin|Cashier')
                            <div class="posicon d-lg-block d-none">
                                <a href="{{ route('dashboard') }}" class="btn btn-primary white mr-2">POS</a>
                            </div>
                            @endrole
                            <div class="topbar-item">
                                <div class="quick-search quick-search-inline ml-20 mr-1 w-300px"
                                    id="kt_quick_search_inline">
                                    <!--begin::Form-->
                                    <!--<form method="get" class="quick-search-form">-->
                                    <!--    <div class="input-group rounded bg-light">-->
                                    <!--        <div class="input-group-prepend">-->
                                    <!--            <span class="input-group-text">-->
                                    <!--                <span class="svg-icon svg-icon-lg">-->
                                    <!--                    <svg width="20px" height="20px" viewBox="0 0 16 16"-->
                                    <!--                        class="bi bi-search" fill="currentColor"-->
                                    <!--                        xmlns="http://www.w3.org/2000/svg">-->
                                    <!--                        <path fill-rule="evenodd"-->
                                    <!--                            d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z" />-->
                                    <!--                        <path fill-rule="evenodd"-->
                                    <!--                            d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />-->
                                    <!--                    </svg>-->
                                    <!--                </span>-->
                                    <!--            </span>-->
                                    <!--        </div>-->
                                    <!--        <input type="text" class="form-control h-45px" placeholder="Search...">-->

                                    <!--    </div>-->
                                    <!--</form>-->
                                    <!--end::Form-->
                                    <!--begin::Search Toggle-->
                                    <div id="kt_quick_search_toggle" data-toggle="dropdown" data-offset="0px,1px"></div>
                                    <!--end::Search Toggle-->
                                    <!--begin::Dropdown-->
                                    <div
                                        class="dropdown-menu dropdown-menu-left dropdown-menu-lg dropdown-menu-anim-up">
                                        <div class="quick-search-wrapper scroll ps" data-scroll="true" data-height="350"
                                            data-mobile-height="200" style="height: 350px; overflow: hidden;">
                                            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;">
                                                </div>
                                            </div>
                                            <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Dropdown-->
                                </div>
                            </div>
                            <!--begin::Languages-->
                            <!--<div class="dropdown">-->

                            <!--    <div class="topbar-item" data-toggle="dropdown" data-display="static">-->
                            <!--        <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">-->
                            <!--            <img class="h-20px w-20px rounded-sm"-->
                            <!--                src="{{asset('assets/images/svg/flags/pakistani1.svg')}}" alt="" />-->
                            <!--        </div>-->
                            <!--    </div>-->

                            <!--    <div class="dropdown-menu dropdown-menu-right">-->
                            <!--        <a href="#" class="dropdown-item">-->
                            <!--            <span class="symbol symbol-20 mr-3">-->
                            <!--                <img class="h-20px w-20px rounded-sm"-->
                            <!--                    src="{{asset('assets/images/svg/flags/pakistani1.svg')}}"-->
                            <!--                    alt="" />-->
                            <!--            </span>-->
                            <!--            English-->
                            <!--        </a>-->

                            <!--    </div>-->

                            <!--</div>-->
                            <!--end::Languages-->


                            <!--begin::Quick Actions-->
                            <div class="dropdown">

                                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                                    <div id="kt_open_fullscreen" class="btn btn-icon btn-clean btn-dropdown mr-1"
                                        title="fullscreen" onclick="openFullscreen();">
                                        <span class="svg-icon svg-icon-xl svg-icon-primary">

                                            <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-fullscreen"
                                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M1.5 1a.5.5 0 0 0-.5.5v4a.5.5 0 0 1-1 0v-4A1.5 1.5 0 0 1 1.5 0h4a.5.5 0 0 1 0 1h-4zM10 .5a.5.5 0 0 1 .5-.5h4A1.5 1.5 0 0 1 16 1.5v4a.5.5 0 0 1-1 0v-4a.5.5 0 0 0-.5-.5h-4a.5.5 0 0 1-.5-.5zM.5 10a.5.5 0 0 1 .5.5v4a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 0 14.5v-4a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v4a1.5 1.5 0 0 1-1.5 1.5h-4a.5.5 0 0 1 0-1h4a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 1 .5-.5z" />
                                            </svg>



                                        </span>

                                    </div>

                                    <div id="kt_close_fullscreen" class="btn btn-icon btn-clean btn-dropdown mr-1"
                                        onclick="closeFullscreen();" style="display: none;">
                                        <span class="svg-icon svg-icon-xl svg-icon-primary">
                                            <svg width="20px" height="20px" viewBox="0 0 16 16"
                                                class="bi bi-fullscreen-exit" fill="currentColor"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M5.5 0a.5.5 0 0 1 .5.5v4A1.5 1.5 0 0 1 4.5 6h-4a.5.5 0 0 1 0-1h4a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 1 .5-.5zm5 0a.5.5 0 0 1 .5.5v4a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 10 4.5v-4a.5.5 0 0 1 .5-.5zM0 10.5a.5.5 0 0 1 .5-.5h4A1.5 1.5 0 0 1 6 11.5v4a.5.5 0 0 1-1 0v-4a.5.5 0 0 0-.5-.5h-4a.5.5 0 0 1-.5-.5zm10 1a1.5 1.5 0 0 1 1.5-1.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 0-.5.5v4a.5.5 0 0 1-1 0v-4z" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>



                            </div>
                            <!--end::Quick Actions-->



                            <!--begin::Quick panel-->
                            <!-- <div class="topbar-item">
                                <div class="btn btn-icon btn-clean  mr-1" id="tc_quick_panel_toggle">
                                    <span class="svg-icon svg-icon-xl svg-icon-primary">

                                        <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-people"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1h7.956a.274.274 0 0 0 .014-.002l.008-.002c-.002-.264-.167-1.03-.76-1.72C13.688 10.629 12.718 10 11 10c-1.717 0-2.687.63-3.24 1.276-.593.69-.759 1.457-.76 1.72a1.05 1.05 0 0 0 .022.004zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10c-1.668.02-2.615.64-3.16 1.276C1.163 11.97 1 12.739 1 13h3c0-1.045.323-2.086.92-3zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
                                        </svg>
                                    </span>
                                    <span class="badge badge-pill badge-secondary">5</span>
                                </div>
                            </div> -->
                            <!--end::Quick panel-->


                            <!--begin::Notifications-->
                            <!-- <div class="dropdown">

                                <div class="topbar-item" data-toggle="dropdown" data-display="static">
                                    <div class="btn btn-icon btn-clean btn-dropdown mr-1">
                                        <div class="svg-icon svg-icon-xl svg-icon-primary" title="Notification">

                                            <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-bell"
                                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2z" />
                                                <path fill-rule="evenodd"
                                                    d="M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
                                            </svg>
                                            <div class="lds-ripple">
                                                <div></div>
                                                <div></div>
                                            </div>
                                        </div>
                                        <span class="badge badge-pill badge-primary">5</span>
                                    </div>
                                </div>

                                <div class="dropdown-menu p-0 m-0 dropdown-menu-right w-300px">
                                    <form>

                                        <div class="d-flex flex-column p-3 border-bottom rounded-top">

                                            <h4
                                                class="d-flex justify-content-between align-items-center mb-0 rounded-top">
                                                <span class="font-size-h5 ">Notifications</span>
                                                <a href="#" class="btn btn-sm btn-primary-hover py-1 px-2">
                                                    Clear
                                                </a>
                                            </h4>

                                        </div>

                                        <div class="nav nav-hover scrollbar-1 ">

                                            <a href="#" class="nav-item border-bottom">
                                                <div class="nav-link">
                                                    <div class="nav-icon mr-3">
                                                        <i class="fas fa-cog text-primary"></i>
                                                    </div>
                                                    <div class="nav-text">
                                                        <div class="font-weight-bold">New report has been received</div>
                                                        <div class="text-muted">23 hrs ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="nav-item border-bottom">
                                                <div class="nav-link">
                                                    <div class="nav-icon mr-3">
                                                        <i class="fas fa-archive text-secondary"></i>
                                                    </div>
                                                    <div class="nav-text">
                                                        <div class="font-weight-bold">New report has been received</div>
                                                        <div class="text-muted">23 hrs ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="nav-item border-bottom">
                                                <div class="nav-link">
                                                    <div class="nav-icon mr-3">
                                                        <i class="fas fa-plane text-success"></i>
                                                    </div>
                                                    <div class="nav-text">
                                                        <div class="font-weight-bold">New report has been received</div>
                                                        <div class="text-muted">23 hrs ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="nav-item border-bottom">
                                                <div class="nav-link">
                                                    <div class="nav-icon mr-3">
                                                        <i class="fas fa-plane text-success"></i>
                                                    </div>
                                                    <div class="nav-text">
                                                        <div class="font-weight-bold">New report has been received</div>
                                                        <div class="text-muted">23 hrs ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="nav-item border-bottom">
                                                <div class="nav-link">
                                                    <div class="nav-icon mr-3">
                                                        <i class="fas fa-plane text-success"></i>
                                                    </div>
                                                    <div class="nav-text">
                                                        <div class="font-weight-bold">New report has been received</div>
                                                        <div class="text-muted">23 hrs ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="nav-item border-bottom">
                                                <div class="nav-link">
                                                    <div class="nav-icon mr-3">
                                                        <i class="fas fa-plane text-success"></i>
                                                    </div>
                                                    <div class="nav-text">
                                                        <div class="font-weight-bold">New report has been received</div>
                                                        <div class="text-muted">23 hrs ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="nav-item border-bottom">
                                                <div class="nav-link">
                                                    <div class="nav-icon mr-3">
                                                        <i class="fas fa-plane text-success"></i>
                                                    </div>
                                                    <div class="nav-text">
                                                        <div class="font-weight-bold">New report has been received</div>
                                                        <div class="text-muted">23 hrs ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="nav-item border-bottom">
                                                <div class="nav-link">
                                                    <div class="nav-icon mr-3">
                                                        <i class="fas fa-plane text-success"></i>
                                                    </div>
                                                    <div class="nav-text">
                                                        <div class="font-weight-bold">New report has been received</div>
                                                        <div class="text-muted">23 hrs ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="nav-item border-bottom">
                                                <div class="nav-link">
                                                    <div class="nav-icon mr-3">
                                                        <i class="fas fa-daimond text-success"></i>
                                                    </div>
                                                    <div class="nav-text">
                                                        <div class="font-weight-bold">New report has been received</div>
                                                        <div class="text-muted">23 hrs ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="d-flex flex-column p-3 rounded-top">

                                            <h4 class="d-flex justify-content-center mb-0  rounded-top">
                                                <a href="#" class="font-size-base text-primary">View All</a>

                                            </h4>

                                        </div>

                                    </form>
                                </div>

                            </div> -->
                            <!--end::Notifications-->



                            <!--begin::user-->
                            <div class="dropdown">

                                <div class="topbar-item" data-toggle="dropdown" data-display="static">
                                    <div class="btn btn-icon w-auto btn-clean d-flex align-items-center pr-1 pl-3">
                                        <span class="text-dark-50 font-size-base d-none d-xl-inline mr-3">{{Auth::user()->name}}</span>
                                        <span class="symbol symbol-35 symbol-light-success">
                                            <span class="symbol-label font-size-h5 ">
                                                <svg width="20px" height="20px" viewBox="0 0 16 16"
                                                    class="bi bi-person-fill" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                                </svg>
                                            </span>
                                        </span>
                                    </div>
                                </div>

                                <div class="dropdown-menu dropdown-menu-right" style="min-width: 150px;">

                                    <!--<a href="#" class="dropdown-item">-->
                                    <!--    <span class="svg-icon svg-icon-xl svg-icon-primary mr-2">-->
                                    <!--        <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"-->
                                    <!--            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"-->
                                    <!--            stroke-linecap="round" stroke-linejoin="round"-->
                                    <!--            class="feather feather-user">-->
                                    <!--            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>-->
                                    <!--            <circle cx="12" cy="7" r="4"></circle>-->
                                    <!--        </svg>-->
                                    <!--    </span>-->
                                    <!--    Edit Profile-->
                                    <!--</a>-->

                                    <a href="{{route('logout') }}" class="dropdown-item">
                                        <span class="svg-icon svg-icon-xl svg-icon-primary mr-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-power">
                                                <path d="M18.36 6.64a9 9 0 1 1-12.73 0"></path>
                                                <line x1="12" y1="2" x2="12" y2="12"></line>
                                            </svg>
                                        </span>
                                        Logout
                                    </a>
                                </div>

                            </div>
                            <!--end::user-->
                        </div>
                        <!--end::Topbar-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Header-->
                <!--begin::Content-->
                @yield('content')


                <!--<div class="footer bg-white py-4 d-flex flex-lg-column" id="tc_footer">-->

                <!--    <div-->
                <!--        class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">-->

                <!--        <div class="text-dark order-2 order-md-1">-->
                <!--            <span class="text-muted font-weight-bold mr-2">2020©</span>-->
                <!--            <a href="#" target="_blank" class="text-dark-75 text-hover-primary">Cplus Soft</a>-->
                <!--        </div>-->

                <!--        <div class="nav nav-dark">-->
                <!--            <a href="#" target="_blank" class="nav-link pl-0 pr-5">About</a>-->
                <!--            <a href="#c" target="_blank" class="nav-link pl-0 pr-5">Team</a>-->
                <!--            <a href="#" target="_blank" class="nav-link pl-0 pr-0">Contact</a>-->
                <!--        </div>-->

                <!--    </div>-->

                <!--</div>-->
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Main-->



    <!--<ul class="sticky-toolbar nav flex-column bg-primary" title="Setting">-->

    <!--    <li class="nav-item" id="kt_demo_panel_toggle" data-toggle="tooltip" title="" data-placement="right"-->
    <!--        data-original-title="Check out more demos">-->
    <!--        <a class="btn btn-sm btn-icon text-white" href="#">-->
    <!--            <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-gear fa-spin" fill="currentColor"-->
    <!--                xmlns="http://www.w3.org/2000/svg">-->
    <!--                <path fill-rule="evenodd"-->
    <!--                    d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z" />-->
    <!--                <path fill-rule="evenodd"-->
    <!--                    d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z" />-->
    <!--            </svg>-->
    <!--        </a>-->
    <!--    </li>-->
    <!--</ul>-->




    <div id="kt_color_panel" class="offcanvas offcanvas-right kt-color-panel p-5">
        <div class="offcanvas-header d-flex align-items-center justify-content-between pb-3">
            <h4 class="font-size-h4 font-weight-bold m-0">Theme Config
            </h4>
            <a href="#" class="btn btn-sm btn-icon btn-light btn-hover-primary" id="kt_color_panel_close">
                <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                </svg>
            </a>
        </div>
        <hr>
        <div class="offcanvas-content">
            <!-- Theme options starts -->
            <div id="customizer-theme-layout" class="customizer-theme-layout">

                <h5 class="mt-1">Theme Layout</h5>
                <div class="theme-layout">
                    <div class="d-flex justify-content-start">
                        <div class="my-3">
                            <div class="btn-group btn-group-toggle">
                                <label class="btn btn-primary p-2 active">
                                    <input type="radio" name="layoutOptions" value="false" id="radio-light" checked="">
                                    Light
                                </label>
                                <label class="btn btn-primary p-2">
                                    <input type="radio" name="layoutOptions" value="false" id="radio-dark"> Dark
                                </label>

                            </div>

                        </div>

                    </div>
                </div>
                <hr>
                <h5 class="mt-1">RTL Layout</h5>
                <div class="rtl-layout">
                    <div class="d-flex justify-content-start">
                        <div class="my-3 btn-rtl">
                            <div class="toggle">
                                <span class="circle"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>

            <!-- Theme options starts -->
            <div id="customizer-theme-colors" class="customizer-theme-colors">
                <h5>Theme Colors</h5>
                <!-- <input id="ColorPicker1" class="colorpicker-theme" type="color" value="#ae69f5" name="Background"> -->
                <ul class="list-inline unstyled-list d-flex">
                    <li class="color-box mr-2">
                        <div id="color-theme-default" class="d-flex rounded w-20px h-20px"
                            style="background-color: #ae69f5d9;">
                        </div>
                    </li>
                    <li class="color-box mr-2">
                        <div id="color-theme-blue" class="d-flex rounded w-20px h-20px" style="background-color: blue;">
                        </div>
                    </li>
                    <li class="color-box mr-2">
                        <div id="color-theme-red" class="d-flex rounded w-20px h-20px" style="background-color: red;">
                        </div>
                    </li>
                    <li class="color-box mr-2">
                        <div id="color-theme-green" class="d-flex rounded w-20px h-20px"
                            style="background-color: green;">
                        </div>
                    </li>
                    <li class="color-box mr-2">
                        <div id="color-theme-yellow" class="d-flex rounded w-20px h-20px"
                            style="background-color: #ffc107;">
                        </div>
                    </li>
                    <li class="color-box mr-2">
                        <div id="color-theme-navy-blue" class="d-flex rounded w-20px h-20px"
                            style="background-color: #000080;">
                        </div>
                    </li>

                </ul>
                <hr>
            </div>


        </div>
    </div>
    <script src="{{asset('assets/js/plugin.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/api/jqueryvalidate/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/api/apexcharts/apexcharts.js')}}"></script>
    <script src="{{asset('assets/api/apexcharts/scriptcharts.js')}}"></script>
    <script src="{{asset('assets/api/pace/pace.js')}}"></script>
    <script src="{{asset('assets/api/mcustomscrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('assets/api/quill/quill.min.js')}}"></script>
    <script src="{{asset('assets/api/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/script.bundle.js')}}"></script>

    @yield('script')

</body>
<!--end::Body-->

</html>
