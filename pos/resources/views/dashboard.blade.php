<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->


<!-- Mirrored from kundol.themes-coder.net/admin-demo/pos.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Mar 2021 08:18:32 GMT -->

<head>
    <meta charset="utf-8" />
    <title>POS</title>
    <meta name="description" content="Updates and statistics" />
    <!--begin::Fonts-->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" /> -->
    <!--end::Fonts-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{asset('assets/css/stylec619.css?v=1.0')}}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('js/onscan.min.js') }}">
    </script>

    <!--end::Global Theme Styles-->
    <link href="{{asset('assets/api/pace/pace-theme-flat-top.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/api/mcustomscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"
        type="text/css" />

    <link href="../../cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="../../unpkg.com/multiple-select%401.5.2/dist/multiple-select.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />


    <link rel="shortcut icon" href="assets/media/logos/favicon.html" />
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="tc_body" class="header-fixed header-mobile-fixed subheader-enabled aside-enabled aside-fixed">
    <!-- Paste this code after body tag -->
    <div class="se-pre-con">
        <div class="pre-loader">
            <img class="img-fluid" src="assets/images/loadergif.gif" alt="loading">
        </div>
    </div>
    <!-- pos header -->

    <header class="pos-header bg-white">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="greeting-text">
                        <a href="{{url('/')}}"><h3 class="card-label mb-0 font-weight-bold text-primary">AROOMA
                        </h3></a>
                        <h3 class="card-label mb-0 ">
                            {{ auth()->user()->name }}
                         
                        </h3>
                    </div>
                    
                </div>
                
                
                <div class="col-xl-4 col-lg-5 col-md-6  clock-main">
                    <div class="clock">
                        <div class="datetime-content">
                            <ul>
                                <li id="hours"></li>
                                <li id="point1">:</li>
                                <li id="min"></li>
                                <li id="point">:</li>
                                <li id="sec"></li>
                            </ul>
                        </div>
                        <div class="datetime-content">
                            <div id="Date" class=""></div>
                        </div>

                    </div>

                </div>
                <div class="col-xl-4 col-lg-3 col-md-12  order-lg-last order-second">
                    <div class="topbar justify-content-end">
                        <div class="dropdown">
                            <div id="id2" class="topbar-item " onclick="pro_returnModal()">
                                {{-- data-toggle="" data-display=""> --}}
                                <div class="btn btn-icon w-auto h-auto btn-clean d-flex align-items-center py-0 mr-3">
                                    <span class="symbol symbol-35 symbol-light-success">
                                        <span class="symbol-label bg-primary  font-size-h5 " style="color: white">
                                            R
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown mega-dropdown">
                            <div id="id2" class="topbar-item " data-toggle="dropdown" data-display="static">
                                <div class="btn btn-icon w-auto h-auto btn-clean d-flex align-items-center py-0 mr-3">

                                    <span class="symbol symbol-35 symbol-light-success">
                                        <span class="symbol-label bg-primary  font-size-h5 ">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                                                fill="#fff" class="bi bi-calculator-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm2 .5v2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-7a.5.5 0 0 0-.5.5zm0 4v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5zM4.5 9a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM4 12.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5zM7.5 6a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM7 9.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5zm.5 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM10 6.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5zm.5 2.5a.5.5 0 0 0-.5.5v4a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 0-.5-.5h-1z" />
                                            </svg>
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <div class="dropdown-menu dropdown-menu-right calu" style="min-width: 248px;">
                                <div class="calculator">
                                    <div class="input" id="input"></div>
                                    <div class="buttons">
                                        <div class="operators">
                                            <div>+</div>
                                            <div>-</div>
                                            <div>&times;</div>
                                            <div>&divide;</div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="leftPanel">
                                                <div class="numbers">
                                                    <div>7</div>
                                                    <div>8</div>
                                                    <div>9</div>
                                                </div>
                                                <div class="numbers">
                                                    <div>4</div>
                                                    <div>5</div>
                                                    <div>6</div>
                                                </div>
                                                <div class="numbers">
                                                    <div>1</div>
                                                    <div>2</div>
                                                    <div>3</div>
                                                </div>
                                                <div class="numbers">
                                                    <div>0</div>
                                                    <div>.</div>
                                                    <div id="clear">C</div>
                                                </div>
                                            </div>
                                            <div class="equal" id="result">=</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="topbar-item folder-data" id="divid2">
                            <div class="btn btn-icon  w-auto h-auto btn-clean d-flex align-items-center py-0 mr-3"
                                onclick="draftshow()">
                                <span class="badge badge-pill badge-primary">{{$draftcount}}</span>
                                <span class="symbol symbol-35  symbol-light-success">
                                    <span class="symbol-label bg-warning font-size-h5 ">
                                        <svg width="20px" height="20px" xmlns="http://www.w3.org/2000/svg" fill="#ffff"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3zm-8.322.12C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139z">
                                            </path>
                                        </svg>
                                    </span>
                                </span>
                            </div>
                        </div>
                        <div class="dropdown">
                            <div class="topbar-item" data-toggle="dropdown" data-display="static">
                                <div class="btn btn-icon w-auto h-auto btn-clean d-flex align-items-center py-0">

                                    <span class="symbol symbol-35 symbol-light-success">
                                        <span class="symbol-label font-size-h5 ">
                                            <svg width="20px" height="20px" viewBox="0 0 16 16"
                                                class="bi bi-person-fill" fill="currentColor"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z">
                                                </path>
                                            </svg>
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <div class="dropdown-menu dropdown-menu-right" style="min-width: 150px;">
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
                    </div>

                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="card-body">
            <div class="form-group row mb-0">
                <div class="col-md-12">
                    <label>
                        <h5>Barcode</h5>
                    </label>
                    <fieldset class="form-groupd-flex barcodeselection">
                        <input type="number" autocomplete="off" onchange="barcodeaddToCarts()" autofocus
                            style="height: 50px; font-size:20px" class="form-control border-dark" name="barcode"
                            id="inputbarcode">
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
    <div class="contentPOS">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-4 order-xl-first order-last">
                    <div class="card card-custom gutter-b bg-white border-0">
                        <div class="card-body">
                            <div class="d-flex justify-content-between colorfull-select">
                                <div class="selectmain">
                                    <select class="arabic-select w-150px bag-primary" name="category" id="category">
                                        <option value="">select category</option>
                                        @foreach($categories as $cate)
                                        <option value="{{$cate->id}}">{{$cate->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="product-items">
                            <div class="row" id="subcategory">


                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-8 col-md-8">
                    <div>

                        <div class="card card-custom gutter-b bg-white border-0 table-contentpos" id="divid">
                            <h4 class="mt-1 ml-2">Selected Product</h4>
                            <hr>

                            <div class="table-datapos">
                                <div class="table-responsive" id="printableTable">
                                    <table id="orderTable" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Discount</th>
                                                <th>Subtotal</th>
                                                <th class=" text-right no-sort"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $cartCollection = \Cart::getContent();
                                            $total=0;
                                            $distotal=0;
                                            @endphp

                                            @foreach($cartCollection as $item)
                                            @php

                                            $distotal = $distotal + ($item->price*$item->quantity);
                                            $total = round($total + ($item->price - ($item->price*$item->discount)/100)*
                                            $item->quantity);
                                            @endphp

                                            <tr>

                                                <td>{{ $item->name }}</td>
                                                <td>
                                                    <input type="number" onfocus="removeval({{ $item->id }})"
                                                        onblur="recal({{ $item->id }})"
                                                        class="form-control border-dark w-100px"
                                                        id="change{{ $item->id }}" value="{{ $item->quantity }}"
                                                        MIN="1" />
                                                </td>
                                                <td>{{ $item->price }}</td>
                                                <td>{{ $item->discount }}%</td>
                                                @php
                                                if( $item->discount>0 )
                                                {
                                                $discount = ($item->price*$item->discount)/100;
                                                echo '<td>'.round(($item->price - $discount)*$item->quantity).'</td>';
                                                }
                                                else
                                                echo '<td>'. round(($item->price-$item->discount)*$item->quantity) .'
                                                </td>';

                                                @endphp
                                                <td>
                                                    <div class="card-toolbar text-right">
                                                        <form method="post">
                                                            @csrf
                                                            <input type="hidden" value="" name="id">
                                                            <a class=" btn" type="submit" title="Delete"
                                                                onclick="dlt({{ $item->id }})"><i
                                                                    class="fas fa-trash-alt"></i></a>
                                                            {{-- confirm-delete --}}
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group row mb-0">
                                    <div class="col-md-12 btn-submit d-flex justify-content-end">


                                        <button onclick="clearcart()" class="btn btn-danger confirm-delete mr-2 "
                                            title="Delete">
                                            <i class="fas fa-trash-alt mr-2"></i>
                                            {{-- confirm-delete --}}
                                            Suspand/Cancel
                                        </button>

                                        <button onclick="draftcart({{ Auth::id() }})" class="btn btn-secondary white">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                class="bi bi-folder-fill svg-sm mr-2" viewBox="0 0 16 16">
                                                <path
                                                    d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3zm-8.322.12C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139z" />
                                            </svg>
                                            Draft Order
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-4">
                    <div class="card card-custom gutter-b bg-white border-0">
                        <div class="card-body">
                            <div class="shop-profile">
                                <div class="media">
                                    <div
                                        class="bg-primary w-100px h-100px d-flex justify-content-center align-items-center">
                                        <h2 class="mb-0 white">K</h2>
                                    </div>
                                    <div class="media-body ml-3">
                                        <h3 class="title font-weight-bold">The Arooma</h3>
                                        <p class="phoonenumber">
                                            +92 (305) 1387510
                                        </p>
                                        <p class="adddress">
                                            Phase 8, Bheria Town
                                        </p>
                                        <p class="countryname">Islamabad,Pakistan</p>
                                    </div>
                                </div>
                            </div>
                            <div class="resulttable-pos" id="divid1">
                                <table class="table right-table">
                                    @php
                                    $cartCollection = \Cart::getContent();
                                    @endphp
                                    <tbody>
                                        <tr class="d-flex align-items-center justify-content-between">
                                            <th class="border-0 font-size-h5 mb-0 font-size-bold text-dark">
                                                Total Items
                                            </th>
                                            <td class="border-0 justify-content-end d-flex text-dark font-size-base">

                                                {{ $cartCollection->count() }}
                                            </td>

                                        </tr>
                                        <tr class="d-flex align-items-center justify-content-between">
                                            <th class="border-0 font-size-h5 mb-0 font-size-bold text-dark">
                                                Subtotal
                                            </th>
                                            <td class="border-0 justify-content-end d-flex text-dark font-size-base">
                                                {{ $distotal }}</td>

                                        </tr>
                                        <tr class="d-flex align-items-center justify-content-between">
                                            <th class="border-0 ">
                                                <div
                                                    class="d-flex align-items-center font-size-h5 mb-0 font-size-bold text-dark">
                                                    DISCOUNT(each item)
                                                    {{-- <span class="badge badge-secondary white rounded-circle ml-2"
                                                        data-toggle="modal" data-target="#discountpop">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="svg-sm"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                                                            id="Layer_31" x="0px" y="0px" width="512px" height="512px"
                                                            viewBox="0 0 512 512" enable-background="new 0 0 512 512"
                                                            xml:space="preserve">
                                                            <g>
                                                                <rect x="234.362" y="128" width="43.263" height="256">
                                                                </rect>
                                                                <rect x="128" y="234.375" width="256" height="43.25">
                                                                </rect>
                                                            </g>
                                                        </svg>
                                                    </span> --}}

                                                </div>
                                            </th>
                                            <td
                                                class="border-0 justify-content-end d-flex text-dark font-size-base font-size-bold">
                                                %
                                            </td>
                                        </tr>
                                        <tr class="d-flex align-items-center justify-content-between item-price">
                                            <th class="border-0 font-size-h2 mb-0 font-size-bold text-primary">
                                                GRAND TOTAL:
                                            </th>
                                            <td class="border-0 justify-content-end d-flex text-primary font-size-h2"
                                                id="total">
                                                {{ $total }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-end align-items-center flex-column buttons-cash">
                                <div>
                                    <a onclick="paywithcash()" class="btn btn-primary white mb-5" data-toggle="modal"
                                        data-target="#payment-popup">
                                        <i class="fas fa-money-bill-wave mr-2"></i>
                                        Pay With Cash
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form>
        @csrf
        <div class="modal fade text-left" id="payment-popup" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel11" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable  modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel11">Payment</h3>
                        <button type="button"
                            class="close rounded-pill btn btn-sm btn-icon btn-light btn-hover-primary m-0"
                            data-dismiss="modal" aria-label="Close">
                            <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table right-table">
                            <tbody>
                                <tr class="d-flex align-items-center justify-content-between">
                                    <th class="border-0 px-0 font-size-lg mb-0 font-size-bold text-primary">

                                        Total Amount to Pay :

                                    </th>
                                    <td id="totalmodal"
                                        class="border-0 justify-content-end d-flex text-primary font-size-lg font-size-bold px-0 font-size-lg mb-0 font-size-bold text-primary">0
                                    </td>
                                </tr>
                                <tr class="d-flex align-items-center justify-content-between">
                                    <th class="border-0 px-0 font-size-lg mb-0 font-size-bold text-primary">

                                        Payment Mode :

                                    </th>
                                    <td
                                        class="border-0 justify-content-end d-flex text-primary font-size-lg font-size-bold px-0 font-size-lg mb-0 font-size-bold text-primary">

                                        Cash

                                    </td>

                                </tr>
                            </tbody>
                        </table>


                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="text-body">Received Amount</label>
                                <fieldset class="form-group mb-3">
                                    <input type="number" name="number" 
                                        id="receive" class="form-control" placeholder="Enter Amount" required >
                                </fieldset>
                                <div class="p-3 bg-light-dark d-flex justify-content-between border-bottom">
                                    <h5 class="font-size-bold mb-0">Amount to Return :</h5>
                                    <h5 class="font-size-bold mb-0" id="change12" ><input type="hidden" id="change12"></h5>

                                </div>
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <div class="col-md-12">
                                <label class="text-body">Note (If any)</label>
                                <fieldset class="form-label-group ">
                                    <textarea class="form-control fixed-size" id="horizontalTextarea" rows="5"
                                        placeholder="Enter Note"></textarea>

                                </fieldset>
                            </div>
                        </div> --}}
                        <div class="form-group row justify-content-end mb-0">
                            <div class="col-md-6  text-right">
                                <input type="button" value="Checkout" onclick="checkout()" class="btn btn-primary">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>

    <form>
        @csrf
        <div class="modal fade text-left" id="return_id" tabindex="-1" role="dialog" aria-labelledby="myModalLabel11"
            style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable  modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel11">Arooma ID</h3>
                        <button type="button"
                            class="close rounded-pill btn btn-sm btn-icon btn-light btn-hover-primary m-0"
                            data-dismiss="modal" aria-label="Close">
                            <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="text-body">Unique ID</label>
                                <fieldset class="form-group mb-3">
                                    <input type="text" name="number" autofocus autocomplete="off"
                                        {{-- onkeyup="calc()" --}} id="retrun_idinput" class="form-control"
                                        placeholder="Enter Amount" required>
                                </fieldset>
                            </div>
                        </div>
                        <div class="form-group row justify-content-end mb-0">
                            <div class="col-md-6  text-right">
                                <input type="button" value="Check" onclick="pro_return()" class="btn btn-primary">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>





    <div class="modal fade text-left" id="shippingpop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel12"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable  modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel12">Add Shipping Address</h3>
                    <button type="button" class="close rounded-pill btn btn-sm btn-icon btn-light btn-hover-primary m-0"
                        data-dismiss="modal" aria-label="Close">
                        <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z">
                            </path>
                        </svg>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label class="text-body">Country</label>
                                <fieldset class="form-group mb-3">
                                    <select
                                        class="js-example-basic-single js-states form-control bg-transparent  p-0 border-0"
                                        name="state">
                                        <option value="AL">USA</option>

                                        <option value="WY">UK</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <label class="text-body">State</label>
                                <fieldset class="form-group mb-3">
                                    <input type="text" name="text" class="form-control" placeholder="Enter State ">
                                </fieldset>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label class="text-body">City</label>
                                <fieldset class="form-group mb-3">
                                    <select
                                        class="js-example-basic-single js-states form-control bg-transparent p-0 border-0"
                                        name="state">
                                        <option value="AL">Bahreen</option>

                                        <option value="WY">Dubai</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <label class="text-body">Postal Code</label>
                                <fieldset class="form-group mb-3">
                                    <input type="number" name="text" class="form-control"
                                        placeholder="Enter Postal code">
                                </fieldset>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label class="text-body">Address</label>
                                <fieldset class="form-group mb-3">
                                    <input type="text" name="text" class="form-control" placeholder="Enter Address">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <label class="text-body">Phone Number</label>
                                <fieldset class="form-group mb-3">
                                    <input type="number" name="text" class="form-control"
                                        placeholder="Enter Phone Number">
                                </fieldset>
                            </div>
                        </div>
                        <div class="form-group row justify-content-end mb-0">
                            <div class="col-md-6  text-right">
                                <a href="#" class="btn btn-primary">Add Address</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade text-left" id="choosecustomer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel13"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel13">Add Customer</h3>
                    <button type="button" class="close rounded-pill btn btn-sm btn-icon btn-light btn-hover-primary m-0"
                        data-dismiss="modal" aria-label="Close">
                        <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z">
                            </path>
                        </svg>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label class="text-body">Customer Group</label>
                                <fieldset class="form-group mb-3">
                                    <select
                                        class="js-example-basic-single js-states form-control bg-transparent p-0 border-0"
                                        name="state">
                                        <option value="AL">General</option>

                                        <option value="WY">Partial</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <label class="text-body">Customer Name</label>
                                <fieldset class="form-group mb-3">
                                    <input type="text" name="text" class="form-control"
                                        placeholder="Enter Customer Name">
                                </fieldset>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label class="text-body">Company Name</label>
                                <fieldset class="form-group mb-3">
                                    <input type="text" name="text" class="form-control"
                                        placeholder="Enter Company Name">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <label class="text-body">Tax Number</label>
                                <fieldset class="form-group mb-3">
                                    <input type="text" name="text" class="form-control" placeholder="Enter Tax">
                                </fieldset>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label class="text-body">Email</label>
                                <fieldset class="form-group mb-3">
                                    <input type="email" name="text" class="form-control" placeholder="Enter Mail">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <label class="text-body">Phone Number</label>
                                <fieldset class="form-group mb-3">
                                    <input type="email" name="text" class="form-control"
                                        placeholder="Enter Phone Number">
                                </fieldset>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label class="text-body">Country</label>
                                <fieldset class="form-group mb-3">
                                    <select
                                        class="js-example-basic-single js-states form-control bg-transparent p-0 border-0"
                                        name="state">
                                        <option value="AL">USA</option>

                                        <option value="WY">UK</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <label class="text-body">State</label>
                                <fieldset class="form-group mb-3">
                                    <input type="text" name="text" class="form-control" placeholder="Enter State">
                                </fieldset>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label class="text-body">City</label>
                                <fieldset class="form-group mb-3">
                                    <select
                                        class="js-example-basic-single js-states form-control bg-transparent p-0 border-0"
                                        name="state">
                                        <option value="AL">Dubai</option>

                                        <option value="WY">Bahreen</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <label class="text-body">Postal Code</label>
                                <fieldset class="form-group mb-3">
                                    <input type="text" name="text" class="form-control" placeholder="Enter Postal Code">
                                </fieldset>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <div class="col-md-6">
                                <label class="text-body">Address</label>
                                <fieldset class="form-group mb-3">
                                    <input type="text" name="text" class="form-control " placeholder="Enter Address">
                                </fieldset>
                            </div>
                        </div>
                        <div class="form-group row justify-content-end mb-0">
                            <div class="col-md-6  text-right">
                                <a href="#" class="btn btn-primary">Add Customer</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade text-left" id="folderpop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel14"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel14">Draft Orders</h3>
                    <button type="button" class="close rounded-pill btn btn-sm btn-icon btn-light btn-hover-primary m-0"
                        data-dismiss="modal" aria-label="Close">
                        <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z">
                            </path>
                        </svg>
                    </button>
                </div>

                <div class="modal-body pos-ordermain">
                    <div class="row" id="iddraft"></div>
                </div>

                <div class="modal-footer border-0">
                    <div class="row">
                        {{-- <div class="col-12">
                            <a href="#" class="btn btn-primary">Submit</a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade text-left" id="discountpop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel122"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable  modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel122">Add Discount</h3>
                    <button type="button" class="close rounded-pill btn btn-sm btn-icon btn-light btn-hover-primary m-0"
                        data-dismiss="modal" aria-label="Close">
                        <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z">
                            </path>
                        </svg>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <label class="text-body">Discount</label>
                            <fieldset class="form-group mb-3 d-flex">
                                <input type="text" name="text" class="form-control bg-white"
                                    placeholder="Enter Discount">
                                <a href="javascript:void(0)"
                                    class="btn-secondary btn ml-2 white pt-1 pb-1 d-flex align-items-center justify-content-center">Apply</a>
                            </fieldset>
                            <div class="p-3 bg-light-dark d-flex justify-content-between border-bottom">
                                <h5 class="font-size-bold mb-0">Discount Applied of:</h5>
                                <h5 class="font-size-bold mb-0">$20</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--<div class="modal fade text-left" id="shippingcost" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1444"-->
    <!--    style="display: none;" aria-hidden="true">-->
    <!--    <div class="modal-dialog modal-dialog-scrollable  modal-dialog-centered modal-lg" role="document">-->
    <!--        <div class="modal-content">-->
    <!--            <div class="modal-header">-->
    <!--                <h3 class="modal-title" id="myModalLabel1444">Add Shipping Cost</h3>-->
    <!--                <button type="button" class="close rounded-pill btn btn-sm btn-icon btn-light btn-hover-primary m-0"-->
    <!--                    data-dismiss="modal" aria-label="Close">-->
    <!--                    <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor"-->
    <!--                        xmlns="http://www.w3.org/2000/svg">-->
    <!--                        <path fill-rule="evenodd"-->
    <!--                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z">-->
    <!--                        </path>-->
    <!--                    </svg>-->
    <!--                </button>-->
    <!--            </div>-->
    <!--            <div class="modal-body">-->
    <!--                <form>-->
    <!--                    <div class="form-group row">-->
    <!--                        <div class="col-md-6">-->
    <!--                            <label class="text-body">Customer</label>-->
    <!--                            <fieldset class="form-group mb-3">-->
    <!--                                <input type="text" name="text" class="form-control" placeholder="Enter Customer "-->
    <!--                                    value="David Jones" disabled>-->
    <!--                            </fieldset>-->
    <!--                        </div>-->
    <!--                        <div class="col-md-6">-->
    <!--                            <label class="text-body">Shipping Address</label>-->
    <!--                            <fieldset class="form-group mb-3">-->
    <!--                                <select-->
    <!--                                    class="js-example-basic-single js-states form-control bg-transparent p-0 border-0"-->
    <!--                                    name="state">-->
    <!--                                    <option value="AL">928 Johnsaon Dr Columbo,MD 21044</option>-->

    <!--                                    <option value="WY">933 Johnsaon Dr Columbo,MD 21044</option>-->
    <!--                                </select>-->
    <!--                            </fieldset>-->
    <!--                        </div>-->

    <!--                    </div>-->
    <!--                    <div class="form-group row">-->
    <!--                        <div class="col-md-6">-->
    <!--                            <label class="text-body">Shipping Charges</label>-->
    <!--                            <fieldset class="form-group mb-3">-->
    <!--                                <input type="number" name="text" class="form-control"-->
    <!--                                    placeholder="Enter Shipping Charges">-->
    <!--                            </fieldset>-->
    <!--                        </div>-->
    <!--                        <div class="col-md-6">-->
    <!--                            <label class="text-body">Shipping Status</label>-->
    <!--                            <fieldset class="form-group mb-3">-->
    <!--                                <select-->
    <!--                                    class="js-example-basic-single js-states form-control bg-transparent p-0 border-0"-->
    <!--                                    name="state">-->
    <!--                                    <option value="AL">Packed</option>-->

    <!--                                    <option value="WY">Open</option>-->
    <!--                                </select>-->
    <!--                            </fieldset>-->
    <!--                        </div>-->

    <!--                    </div>-->
    <!--                    <div class="form-group row">-->
    <!--                        <div class="col-md-12">-->
    <!--                            <label class="text-body">Shipping Charges</label>-->
    <!--                            <fieldset class="form-label-group ">-->
    <!--                                <textarea class="form-control fixed-size" rows="5"-->
    <!--                                    placeholder="Textarea"></textarea>-->

    <!--                            </fieldset>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="form-group row justify-content-end mb-0">-->
    <!--                        <div class="col-md-6  text-right">-->
    <!--                            <a href="#" class="btn btn-primary">Update Order</a>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </form>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->

    <!--<ul class="sticky-toolbar nav flex-column bg-primary">-->

    <!--    <li class="nav-item" id="kt_demo_panel_toggle" data-toggle="tooltip" title="" data-placement="right"-->
    <!--        data-original-title="Check out more demos">-->
    <!--        <a class="btn btn-sm btn-icon text-white" href="#">-->
    <!--            <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-gear fa-spin" fill="currentColor"-->
    <!--                xmlns="http://www.w3.org/2000/svg">-->
    <!--                <path fill-rule="evenodd"-->
    <!--                    d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z">-->
    <!--                </path>-->
    <!--                <path fill-rule="evenodd"-->
    <!--                    d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z">-->
    <!--                </path>-->
    <!--            </svg>-->
    <!--        </a>-->
    <!--    </li>-->
    <!--</ul>-->
    <!--<div id="kt_color_panel" class="offcanvas offcanvas-right kt-color-panel p-5">-->
    <!--    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-3">-->
    <!--        <h4 class="font-size-h4 font-weight-bold m-0">Theme Config-->
    <!--        </h4>-->
    <!--        <a href="#" class="btn btn-sm btn-icon btn-light btn-hover-primary" id="kt_color_panel_close">-->
    <!--            <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor"-->
    <!--                xmlns="http://www.w3.org/2000/svg">-->
    <!--                <path fill-rule="evenodd"-->
    <!--                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />-->
    <!--            </svg>-->
    <!--        </a>-->
    <!--    </div>-->
    <!--    <hr>-->
    <!--    <div class="offcanvas-content">-->
            <!-- Theme options starts -->
    <!--        <div id="customizer-theme-layout" class="customizer-theme-layout">-->

    <!--            <h5 class="mt-1">Theme Layout</h5>-->
    <!--            <div class="theme-layout">-->
    <!--                <div class="d-flex justify-content-start">-->
    <!--                    <div class="my-3">-->
    <!--                        <div class="btn-group btn-group-toggle">-->
    <!--                            <label class="btn btn-primary p-2 active">-->
    <!--                                <input type="radio" name="layoutOptions" value="false" id="radio-light" checked="">-->
    <!--                                Light-->
    <!--                            </label>-->
    <!--                            <label class="btn btn-primary p-2">-->
    <!--                                <input type="radio" name="layoutOptions" value="false" id="radio-dark"> Dark-->
    <!--                            </label>-->

    <!--                        </div>-->

    <!--                    </div>-->

    <!--                </div>-->
    <!--            </div>-->
    <!--            <hr>-->
    <!--            <h5 class="mt-1">RTL Layout</h5>-->
    <!--            <div class="rtl-layout">-->
    <!--                <div class="d-flex justify-content-start">-->
    <!--                    <div class="my-3 btn-rtl">-->
    <!--                        <div class="toggle">-->
    <!--                            <span class="circle"></span>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <hr>-->

            <!-- Theme options starts -->
    <!--        <div id="customizer-theme-colors" class="customizer-theme-colors">-->
    <!--            <h5>Theme Colors</h5>-->
    <!--            <ul class="list-inline unstyled-list d-flex">-->
    <!--                <li class="color-box mr-2">-->
    <!--                    <div id="color-theme-default" class="d-flex rounded w-20px h-20px"-->
    <!--                        style="background-color: #ae69f5d9;">-->
    <!--                    </div>-->
    <!--                </li>-->
    <!--                <li class="color-box mr-2">-->
    <!--                    <div id="color-theme-blue" class="d-flex rounded w-20px h-20px" style="background-color: blue;">-->
    <!--                    </div>-->
    <!--                </li>-->
    <!--                <li class="color-box mr-2">-->
    <!--                    <div id="color-theme-red" class="d-flex rounded w-20px h-20px" style="background-color: red;">-->
    <!--                    </div>-->
    <!--                </li>-->
    <!--                <li class="color-box mr-2">-->
    <!--                    <div id="color-theme-green" class="d-flex rounded w-20px h-20px"-->
    <!--                        style="background-color: green;">-->
    <!--                    </div>-->
    <!--                </li>-->
    <!--                <li class="color-box mr-2">-->
    <!--                    <div id="color-theme-yellow" class="d-flex rounded w-20px h-20px"-->
    <!--                        style="background-color: #ffc107;">-->
    <!--                    </div>-->
    <!--                </li>-->
    <!--                <li class="color-box mr-2">-->
    <!--                    <div id="color-theme-navy-blue" class="d-flex rounded w-20px h-20px"-->
    <!--                        style="background-color: #000080;">-->
    <!--                    </div>-->
    <!--                </li>-->

    <!--            </ul>-->
    <!--            <hr>-->
    <!--        </div>-->


    <!--    </div>-->
    <!--</div>-->


    <script src="{{ asset('assets/js/plugin.bundle.min.js') }}">
    </script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    {{-- <script src="{{ asset('../../cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('../../unpkg.com/multiple-select%401.5.2/dist/multiple-select.min.js') }}"></script> --}}
    <script src="{{ asset('assets/js/sweetalert.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert1.js') }}"></script>
    <script src="{{ asset('assets/js/script.bundle.js') }}"></script>
    <script>
        jQuery(function() {
			jQuery('.arabic-select').multipleSelect({
		  filter: true,
		  filterAcceptOnEnter: true
		})
	  });
	  jQuery(function() {
			jQuery('.js-example-basic-single').multipleSelect({
		  filter: true,
		  filterAcceptOnEnter: true
		})
	  });
	  jQuery(document).ready(function() {
		jQuery('#orderTable').DataTable({

			"info":     false,
			"paging":   false,
			"searching": false,

		"columnDefs": [ {
		  "targets"  : 'no-sort',
		  "orderable": false,
		}]
		});
	} );



    function barcodeaddToCarts(){
    var _token = $('input[name="_token"]').val();
    var barcode = $('#inputbarcode').val();
    $.ajax({
    type:"post",
    url: "{{ route('pos.add-cart') }}",
    data:{barcode: barcode, _token: _token},
    success: function(user)
    {
    $("#inputbarcode").val("");
    // $("#inputbarcode").focus();
       $("#divid").load(" #divid");
       $("#divid1").load(" #divid1");
        // window.location.reload()
    },error:function(error){
    console.log(error);
    }
    });
    }

    function addToCart(item){
        //alert(item);
    var _token = $('input[name="_token"]').val();
    $.ajax({
    type:"post",
    url: "{{ route('pos.add-cart') }}",
    data:{product: item, _token: _token},
    success: function(user)
    {
       $("#divid").load(" #divid");
       $("#divid1").load(" #divid1");

        $('#inputbarcode').focus();
    },error:function(error){
    console.log(error);
    }
    });
    }
    function removeval(id){
        // $('#change'+id).on('focus',function() {
        $("#change"+id).removeVal('value');
    // });
    }
    function dlt(item){
    var _token = $('input[name="_token"]').val();
    $.ajax({
    type:"post",
    url: "{{ route('cart.remove') }}",
    data:{id: item, _token: _token},
    success: function(user)
    {
    $("#divid").load(" #divid");
       $("#divid1").load(" #divid1");
    },error:function(error){
    console.log(error);
    }
    });
    }

    function recal(pid){
    var _token = $('input[name="_token"]').val();
    var id =pid;
    var value = $('#change'+id).val();
    $.ajax({
    type:"post",
    url: "{{ route('cart.update') }}",
    data:{id: pid, quantity:value, _token: _token},
    success: function(user)
    {
    $("#divid").load(" #divid");
       $("#divid1").load(" #divid1");
    },error:function(error){
    console.log(error);
    }
    });
    }
    function clearcart(){
    var _token = $('input[name="_token"]').val();
    $.ajax({
    type:"post",
    url: "{{ route('cart.clear') }}",
    data:{_token: _token},
    success: function()
    {
        $("#divid").load(" #divid");
       $("#divid1").load(" #divid1");

    },
    error:function(error){
        console.log(error);
    }
    });
    }

    function draftcart(id){
    var _token = $('input[name="_token"]').val();
    $.ajax({
    type:"post",
    url: "{{ route('cart.draft') }}",
    data:{id:id,_token: _token},
    success: function(data)
    {
       $("#divid").load(" #divid");
       $("#divid1").load(" #divid1");
       $("#divid2").load(" #divid2");
    },
    error:function(error){
    console.log(error);
    }
    });
    }


    function draftshow(){
    var _token = $('input[name="_token"]').val();
    $.ajax({
    type:"post",
    url: "{{ route('draft.show') }}",
    data:{barcode: barcode, _token: _token},
    success: function(user)
    {
    $("#divid").load(" #divid");
       $("#divid1").load(" #divid1");
       $("#divid2").load(" #divid2");

    window.location.reload()
    },error:function(error){
    console.log(error);
    }
    });

    }


    function draftshow(){
    var _token = $('input[name="_token"]').val();
    $.ajax({
    type:"post",
    url: "{{ route('draft.show') }}",
    data:{_token: _token},
    success: function(draft)
    {
    $('#iddraft').html(draft);
    jQuery('#folderpop').modal('show');
    },
    error:function(error){
    alert('Error Call 03051387510')
    }
    });
    }

    function draftdlt(id){
    var _token = $('input[name="_token"]').val();
    $.ajax({
    type:"post",
    url: "{{ route('draft.dlt') }}",
    data:{id:id, _token: _token},
    success: function(dlt)
    {

        $("#divid2").load(" #divid2");
        draftshow()
    }});
    }

    function draftedit(id){
    var _token = $('input[name="_token"]').val();
    $.ajax({
    type:"post",
    url: "{{ route('draft.edit') }}",
    data:{id:id, _token: _token},
    success: function(draft)
    {
    jQuery('#folderpop').modal('hide');
       $("#divid").load(" #divid");
       $("#divid1").load(" #divid1");
       $("#divid2").load(" #divid2");
    }});
    }


    function paywithcash(){
    var total = $('#total').text();
    var receive = $('#receive').val();
    var change = receive - total;
    $('#totalmodal').text(total);
    jQuery('#payment-popup').modal('show');
    }


    // $('#receive').keyup(function(){ // run anytime the value changes
    // function calc(){
    // var firstValue = Number($('#receive').val()); // get value of field
    // var secondValue = Number($('#totalmodal').text()); // convert it to a float
    // if(firstValue => secondValue){
    //     var totals = Math.round(firstValue - secondValue);
    //     $('#change12').html(totals); // add them and output it
    // }
    // else
    // {
    //     alert('price mismatch');
    // }
    // }
    
    $(function() {
    $("#receive").on("keyup", sum);
	function sum() {
	    var firstValue = parseInt($("#receive").val());
	    var secondValue  =  parseInt($("#totalmodal").text());
	   // alert(firstValue);
       
          var totals = Math.round(firstValue - secondValue);
      	   var totals= $("#change12").html(totals);
    
       
     
	}
});
// });

    function checkout(){
    var _token = $('input[name="_token"]').val();
    var checkoutrec = $('#receive').val();
    $.ajax({
    type:"post",
    url: "{{ route('checkout') }}",
    data:{receive:checkoutrec, _token: _token},
    success: function(user)
    {
    jQuery('#payment-popup').modal('hide');
    if(user){
        
      alert(user);
      var message = user.data.message;
    }
    $("#divid").load(" #divid");
       $("#divid1").load(" #divid1");

     location.href = '{{ route('generateReceipt') }}';
    },error:function(error){
    console.log(error);
    }
    });
    }
    function pro_returnModal(){
    jQuery('#return_id').modal('show');
    }

    function pro_return(){
    var _token = $('input[name="_token"]').val();
    var barcode = $('#inputbarcode').val();
    var id = $('#retrun_idinput').val();
    $.ajax({
    type:"post",
    url: "{{ route('pos.add-returncart') }}",
    data:{id:id, barcode: barcode, _token: _token},
    success: function(user)
    {
    jQuery('#return_id').modal('hide');
    if(user)
    alert(user)
        // console.log(user);
    $("#divid").load(" #divid");
       $("#divid1").load(" #divid1");
    $("#inputbarcode").focus(" #inputbarcode");
    // window.location.reload()
    },error:function(error){
    console.log(error);
    }
    });
    }

    </script>

    <script>
        $(document).ready(function () {
    $('#category').on('change',function(e)
     {
        var _token = $('input[name="_token"]').val();
        var cat_id = e.target.value;
    $.ajax({
    type:"POST",
    url:"{{ route('category.sub') }}",
    data: { cat_id: cat_id,_token:_token },
    success:function (data) {
        $('#subcategory').html(data);
    }
    });
    });
    });


    </script>

    <!-- Press Enter Key To show Modal -->
    <script>
        $(document).on('keypress',function(e) {
    if(e.which == 32) { //Enter key code
    var total = $('#total').text();
    var receive = $('#receive').val();
    var change = receive - total;
    $('#totalmodal').text(total);
    jQuery('#payment-popup').modal('show');
    }
 });

    </script>
    <script>
        var form = document.querySelector('form');
    var aramaAlani1 = document.getElementById("inputbarcode");

    $( document ).on( 'keydown', function ( e ) {
      if ( e.keyCode === 27 ) { //ESC key code
        //form.reset();
        aramaAlani1.value = '';
        aramaAlani1.focus();
        //aramaAlani.scrollIntoView();
        //document.forms[ 'id_arama' ].elements[ _element ].focus();
        //document.getElementById("id_search").focus();
      }
    });
    </script>
    <script>
        var form = document.querySelector('form');
        var aramaAlani = document.getElementById("receive");

        $( document ).on( 'keydown', function ( e ) {

          if ( e.keyCode === 16 ) { //shift key code
            //form.reset();
            aramaAlani.value = '';
            aramaAlani.focus();
            //aramaAlani.scrollIntoView();
            //document.forms[ 'id_arama' ].elements[ _element ].focus();
            //document.getElementById("id_search").focus();
          }
        });
    </script>
     <script>
     
        // var input = document.getElementById("inputbarcode");
        // input.addEventListener("keyup", function(event) {
        // if (event.keyCode === 72) {
        
        //  input.value = '';
        // input.focus();
        // }
        // }
         $('#inputbarcode').keydown(function (e) {
          if (e.which === 16) {
        $(this).('#inputbarcode').focus();

        //OR
        //$(this).closest('td').next().next().find('.inputs').focus()
    }
 });

        var form = document.querySelector('inputbarcode');
        var aramaAlani = document.getElementById("inputbarcode");

        $( document ).on( 'keydown', function ( e ) {

          if ( e.keyCode === 72 ) { //shift key code
            //form.reset();
            aramaAlani.value = '';
            aramaAlani.focus();
            //aramaAlani.scrollIntoView();
            //document.forms[ 'id_arama' ].elements[ _element ].focus();
            //document.getElementById("id_search").focus();
          }
        });
    </script>
    
    <script>
        var form = document.querySelector('form');
            var aramaAlani = document.getElementById("change12");
                 
            $( document ).on( 'keydown', function ( e ) {

              if ( e.keyCode === 18 ) { //alt key code
                   
                    checkout();
                 
              }
            });
    </script> 
    
     <script>
        var form = document.querySelector('form');
            var aramaAlani = document.getElementById("receive");

            $( document ).on( 'keydown', function ( e ) {

              if ( e.keyCode === 68 ) { //D key code
                draftcart({{ Auth::id() }});
              }
            });
            
            var form = document.querySelector('form');
            var aramaAlani = document.getElementById("receive");

            $( document ).on( 'keydown', function ( e ) {

              if ( e.keyCode === 	83 ) { //S key code
               draftshow();
              }
            });
    </script> 
    
  
</body>
<!--end::Body-->

</html>
