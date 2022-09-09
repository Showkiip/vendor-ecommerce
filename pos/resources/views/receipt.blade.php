<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    
    table {
    border:solid #000 !important;
    border-width:1px 0 0 1px !important;
}
th, td {
    border:solid #000 !important;
    border-width:0 1px 1px 0 !important;
}
        #invoice-POS{
            box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
            padding:2mm;
            margin: auto;
            width: 80mm;
            background: #FFF;
            color: black;
            height:fit-content;

        }
        @media print {
            body{
                height: fit-content;
            }
           #invoice-POS {
            width: 80mm;
            height:fit-content !important;
            position:absolute;
            display: block;
           }
        }
        @page{
          size: fit-content !important;
          /*margin: 2mm;*/
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
            line-height: 2em;
        }
        p{
            font-size: .7em;
            color: #666;
            line-height: 1.2em;
        }

        #top, #mid,#bot{ /* Targets all id with 'col-' */
            border-bottom: 1px solid #EEE;
        }

        #top{min-height: 100px;}
        #mid{min-height: 80px;}
        #bot{ min-height: 50px;}

        #top .logo{
           float: center;
            height: 80px;
            width: 200px;
            /*margin:2px;*/
            /*padding:2px;*/
            
        }
        .clientlogo{
         
            height: 80px;
            width: 80px;
    
      
            border-radius: 50px;
        }
        .info, h2{
            display: block;
            text-align: center;
            margin-left: 0;
            color:black;
        }
        p{
            color:black;
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
            font-size: 1em;
            background: #EEE;
            border:1px solid;
        }
        .service{border-bottom: 1px solid #EEE;}
        .item{width: 24mm;}
        .itemtext{font-size: 1em;}

        /*#legalcopy{*/
        /*    margin-top: 5mm;*/
        /*}*/

hr {
 border-top: 2px dashed red;
}

.infos
{
     text-align: center;
     
}
    </style>
</head>
<body>

<div id="invoice-POS">

    <!--<center id="top">-->
        <div class="logo" style="margin: 10px;margin-top: -15px;"> 
            <img src="assets/images/asd.png" height="120" width="250"> 
        </div>
        <div class="info">
            <h1>The Aroma Bakers</h1>
        </div>
    <!--End Info-->

    <div id="mid">
        <div >
            <p class="infos">
              <strong>Bahria Safari Valley Safari Valley Commercial Block Bahria Safari Valley, Rawalpindi, Punjab</strong>
           </p>
         <p><strong> Date: </strong> &nbsp &nbsp &nbsp &nbsp &nbsp  {{$created_at->format('d-M-y')}} &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp{{$created_at->format('H:s A')}}<br>
            <strong>Counter: </strong> &nbsp &nbsp {{Auth::user()->name}} <br><strong>Phone: </strong> &nbsp &nbsp &nbsp &nbsp 0330 8262222</p>
            
            
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

                <tr class="tabletitle">
                    
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
                   
                    <td colspan="4" class="footerText"><b>Net Total</b></td>
                    <td class="payment"><h2>{{ceil($total)}}</h2></td>
                </tr>
                
                <?php $receive = session('receive')?>
                 <tr class="tabletitle">
                
                    <td colspan="4" class="footerText"><b>Cash Paid</b></td>
                    <td class="footerText" style="padding-top: px;"><h2>{{ $receive}}</h2></td>
                </tr>
                <tr class="tabletitle">
                    
                    <td colspan="4"class="footerText"><b>Return Amount</b></td>
                    <td class="payment"><h2>{{ $receive - ceil($total)}}</h2></td>
                </tr>
                </tfoot>

            </table>
        </div><!--End Table-->

        <div id="legalcopy" >
            <p class="legal"><strong>Thank you for your business!</strong> Payment is expected within 31 days; please process this invoice within that time. There will be a 5% interest charge per month on late invoices.
            </p>
            <hr>
            <p style="text-align:center"><strong>Powered By &nbsp &nbsp<i class="fa fa-bolt" style="font-size:20px"></i> &nbsp &nbsp  Cplus Soft<br>
           0314 5024273 | 0308 4029705<br>
           w w w . c p l u s o f t . c o m</strong></p>
           
          
     <?php \Cart::clear(); ?>
    </div>
    <!--End InvoiceBot-->
</div>
<!--End Invoice-->
   
   
{{--<script>--}}


{{--    // function printdiv() {--}}
{{--    //     var headstr = "<html><head><title>Booking Details</title></head><body>";--}}
{{--    //     var footstr = "</body>";--}}
{{--    //     var newstr = document.getElementById('invoice-POS').innerHTML;--}}
{{--    //     var oldstr = document.body.innerHTML;--}}
{{--    //     document.body.innerHTML = headstr+newstr+footstr;--}}
{{--    //     window.print();--}}
{{--    //     document.body.innerHTML = oldstr;--}}
{{--    //     return false;--}}
{{--    // }--}}

{{--</script>--}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    // window.print();

// var msg = document.getElementById('cancel');

document.body.addEventListener('keypress', function(e) {
  if (e.key == "Escape") {
   
  }
});

$(document).on('keyup', function(e) {

  if (e.key == "Escape") window.location.href ="/dashboard";
});
 
 
    
</script>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
    </script>
    
<script>
document.onkeypress=function(event){
     if (event.keyCode === 	32) {
  event.preventDefault();
//   document.getElementById("myBtn").click();
     window.print();
  }
}

</script>


</body>
</html>
