<html>
<head>
    <style>
    
    table {
    border:solid #000 !important;
    border-width:1px 0 0 1px !important;
}
th, td {
    border:solid #000 !important;
    border-width:0 1px 1px 0 !important;
}
         #invoice-POS {
            width: 80mm;
            height:fit-content !important;
            position:absolute;
            display: block;
           }
             @page{
          size: fit-content !important;
          margin: 2mm;
        }
        }
        ::selection {background: #f31544; color: #FFF;}
        ::moz-selection {background: #f31544; color: #FFF;}
        h1{
            font-size: 1.5em;
            color: #222;
        }
        h2{font-size: .9em;}
        h3{
            font-size: 1.2em;
            font-weight: 300;
            /*line-height: 2em;*/
        }
        p{
            font-size: .7em;
            color: #666;
            /*line-height: 1.2em;*/
        }

        #top, #mid,#bot{ /* Targets all id with 'col-' */
            border-bottom: 1px solid #EEE;
        }

        /*#top{min-height: 100px;}*/
        #mid{min-height: 80px;}
        #bot{ min-height: 50px;}

        #top .logo{
        //float: left;
            height: 60px;
            width: 60px;
            /*background: url(http://michaeltruong.ca/images/logo1.png) no-repeat;*/
            background-size: 60px 60px;
        }
        .clientlogo{
            float: left;
            height: 60px;
            width: 60px;
            background: url(http://michaeltruong.ca/images/client.jpg) no-repeat;
            background-size: 60px 60px;
            border-radius: 50px;
        }
        .info, h2{
            display: block;
            text-align: center;
            margin-left: 0;
        }
        .title{
            float: right;
        }
        .title p{text-align: right;}
        table{
            width: 100%;
            border-collapse: collapse;
        }
        td{
        //padding: 5px 0 5px 15px;
        //border: 1px solid #EEE
        }
        .tabletitle{
        //padding: 5px;
            font-size: .5em;
            background: #EEE;
            border:1px solid;
        }
        .service{border-bottom: 1px solid #EEE;}
        .item{width: 24mm;}
        .itemtext{font-size: .5em;}

        #legalcopy{
            margin-top: 5mm;
        }



    </style>
</head>
<body>

<div id="invoice-POS">
         
          <div class="logo">
            <img src="assets/images/asd.png" height="80" width="80">
        </div>
    <!--<center id="top">-->
      
        <div class="info">
            <h2>The Aroma Bakers</h2>
        </div>
    <!--End Info-->

    <div id="mid">
        <div >
            <p class="info">
               STRN 07021170403055</br>
               Phase 8 Bahria Town </br>
               Bahria height 3 Shop No 2.B
            </p>
            <p><b>Date: </b> {{$created_at->format('d-M-y')}} {{$created_at->format('H:s')}}    N0:140</p>
            <p><b>Counter: </b> {{Auth::user()->name}}</p>
            
        </div>
    </div><!--End Invoice Mid-->

    <div id="bot">

        <div id="table">
            <table class="table-bordered">
                <thead>
                <tr class="tabletitle">
                
                    <td colspan="2" class=""><h2>Name</h2></td>
                    <td class=""><h2>Quantity</h2></td>
                    <td class=""><h2>Price</h2></td>
                    <td class=""><h2>Discount</h2></td>
                </tr>
                </thead>
                <tbody>
                <?php $total = 0; ?>
                @foreach($cartCollection as $item)

                <tr class="service">
                    
                    <td colspan="2" class="tableitem"><p class="itemtext">{{ $item->name }}</p></td>
                    <td class="tableitem"><p class="itemtext">{{ $item->quantity }}</p></td>
                    <td class="tableitem"><p class="itemtext">{{ $item->price }}</p></td>
                    <td class="tableitem"><p class="itemtext">{{ $item->discount }}%</p></td>
                    </tr>
                    <tr>
                    <?php
                    $subTotal = $item->price*$item->quantity -  $item->discount/100*($item->price*$item->quantity);
                    $total = $total + $subTotal;
                    ?>
                </tr>
                </tbody>
              @endforeach
                 <tfoot>
                <tr class="tabletitle">
                   
                    <td colspan="4" >Net Total</td>
                    <td><h2>{{ceil($total)}}</h2></td>
                </tr>
                
                <?php $receive = session('receive')?>
                 <tr class="tabletitle">
                
                    <td colspan="4">Cash Paid</td>
                    <td class="footerText" style="padding-top: px;"><h2>{{ $receive}}</h2></td>
                </tr>
                <tr class="tabletitle">
                    
                    <td colspan="4">Balance</td>
                    <td><h2>{{ $receive - ceil($total)}}</h2></td>
                </tr>
                </tfoot>

            </table>
        </div><!--End Table-->

        <div id="legalcopy" >
            <p class="legal"><strong>Thank you for your business!</strong> Payment is expected within 31 days; please process this invoice within that time. There will be a 5% interest charge per month on late invoices.
            </p>
        </div>

    </div>
    <!--End InvoiceBot-->
</div>
<!--End Invoice-->
    
   



</body>
</html>
