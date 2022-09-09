
<div class="table-responsive">
    <h2> Product </h2>
    <table class="table table-centered table-nowrap">
        <thead>
            <tr>
            <th>Brand Name</th>
            <th>Color</th>
            <th>Condition</th>
            <th>Storage</th>
            <th>Quantity</th>
            <th>payment_method</th>
            <th >Price</th>
            <th> Grand Price</th>
            </tr>
        </thead>
        <tbody>
            @forelse($productOrder as $order)
            @php
            $orderSale = App\Models\OrderSale::where('id',$order->orderSales_id)->first();
        @endphp
            <tr>

                <td>{{$order->brand_name}}  {{$order->model_name}} </td>
                <td>{{$order->color}}</td>
                <td>{{$order->condition}}  </td>
                <td>{{$order->storage}}</td>
                <td>{{$order->quantity}}</td>
                <td>{{$order->payment_method}}</td>
                <td>{{$order->price}}</td>
                <td>{{$order->grand_price}}</td>
                <td>
                @if ($orderSale->status == 2)
                <a href="#" onclick="productReview({{ $order->id }})" class="btn btn->primray">Review</a>
            @endif
                </td>

            </tr>
            @empty
             <tr>
                <td colspan="6" class="text-center"> Nothing</td>
             </tr>
         @endforelse
        </tbody>
    </table>

    <h2> Accessory </h2>
    <table class="table table-centered table-nowrap">
        <thead>
            <tr>
            <th>Brand Name</th>
            <th>Category</th>
            <th>Name</th>

            <th>Quantity</th>
            <th>Payment Method</th>
            <th >Price</th>
            <th> Grand Price</th>
            </tr>
        </thead>
        <tbody>
            @forelse($accessoryOrder as $order)
                @php
                    $orderSale = App\Models\OrderSale::where('id',$order->orderSales_id)->first();
                @endphp
            <tr>

                <td>{{$order->brand_name}}  {{$order->model_name}} </td>
                <td>{{$order->access_category}}</td>
                <td>{{$order->access_name}}  </td>

                <td>{{$order->quantity}}</td>
                <td>{{$order->payment_method}}</td>
                <td>{{$order->price}}</td>
                <td>{{$order->grand_price}}</td>

                <td>
                    @if ($orderSale->status == 2)
                        <a href="#" onclick="accessoryReview({{$order->id}})" class="btn btn->primray">Review</a>
                    @endif

                </td>

            </tr>
            @empty
            <tr>
               <td colspan="6" class="text-center"> Nothing</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
