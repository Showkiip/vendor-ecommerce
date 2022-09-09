@extends('admin.layouts.master')

@section('title') Product Color @endsection

@section('content')
@component('admin.common-components.breadcrumb')
@slot('title') @endslot
@slot('li_1') @endslot
@slot('li_2')@endslot
@endcomponent





<div class="row">
<div class="col-md-12">
    @if (Session::has('message'))
        <div class="col-12">
            {!! Session::get('message') !!}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <form action="{{ url('admin/productColor-store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <h1>Product Color & Image</h1>

                <div class="tab" id="">Color and Image


                    <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="type" id="types" value="{{ $product->type }}">
                    @php
                        $count = $colors->count();
                        //   dd($count);
                    @endphp

                        {{-- @dd($colors); --}}
                    @foreach ($colors as $key0 => $color)
                        @php
                            $images = App\Models\ProductImage::where('color_id', $color->id)->first();
                            $storage = App\Models\ProductStorage::where('color_id', $color->id)->get();

                        @endphp
                        <div class="addColor{{ $key0 }}">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="example-text-input" class=" col-form-label">Color
                                                Name</label>
                                            <input class="form-control" name="color_name[]"
                                                type="text" placeholder="Enter mobile color name"
                                                value="{{ $color->color_name }}" id="example-text-input">
                                            <span class="text-danger">{{ $errors->first('color_name') }}</span>
                                            <input type="hidden" name="color_ids[]"
                                                value="{{ $color->id }}">
                                            <input type="hidden" name="image_id[{{ $key0 }}][]">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="example-text-input" class="col-form-label">Image</label>
                                            <input class="form-control" name="image[{{ $key0 }}][]"
                                                multiple type="file" @if (old('image'))  @endif id="image-input">
                                            <span class="text-danger">{{ $errors->first('image') }}</span>

                                        </div>
                                        <div class="col-md-4" style="text-align: center;">
                                            @if ($loop->index + 1 == 1)
                                                <a href="javascript:void(0)" class="btn btn-primary addMoreColor"
                                                    id="addMoreColor" style="margin-top: 36px;"><span
                                                        class="glyphicon glyphicon glyphicon-plus"
                                                        aria-hidden="true"></span> Add Color</a>
                                                {{-- <a href="{{url('admin/productStorage-delete',$storag->id)}}" class="btn btn-danger " style="margin-top: 36px;"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Remove</a> --}}
                                            @else
                                                <a href="{{ route('admin.remove.color', $color->id) }}"
                                                    class="btn btn-success " style="margin-top: 36px;"><span
                                                        class="glyphicon glyphicon glyphicon-plus"
                                                        aria-hidden="true"></span> Remove Color</a>
                                                <a href="javascript:void(0)" class="btn btn-info addMoreStorage"
                                                    style="margin-top: 36px;"><span
                                                        class="glyphicon glyphicon glyphicon-plus"
                                                        aria-hidden="true"></span> Add Storage</a>
                                            @endif
                                        </div>
                                    </div>
                                    @php
                                        $storageCount = $storage->count();
                                        //    dd($storageCount);
                                    @endphp

                                    @foreach ($storage as $key => $storag)
                                        @php
                                            $condition = App\Models\ProductCondition::where('storage_id', $storag->id)->get();
                                        @endphp

                                        <div class="addstorage{{ $key0 . $key }}">
                                            <div class="add_storage" id="addstorage{{ $key }}">
                                                <div>
                                                    <div class="row">

                                                        <div class="input-group">
                                                            <input type="hidden" name="storage_count"
                                                                value="{{ $storageCount }}">
                                                            <input type="hidden" name="color_id"
                                                                value="{{ $key0 }}">
                                                            <input type="hidden" name="addMoreStorage0" value="0"
                                                                id="addMoreStorage0">
                                                            <input type="hidden"
                                                                name="storageID[{{ $key0 }}][]"
                                                                value="{{ $storag->id }}">

                                                            <div class="col-md-8">
                                                                <label for="example-text-input"
                                                                    class="col-form-label">Storage</label>
                                                                <select class="form-control"
                                                                    name="storage[{{ $key0 }}][]">
                                                                    <option selected>Select Memory</option>
                                                                    <option value="256 GB"
                                                                        {{ $storag->storage == '256 GB' ? 'selected' : '' }}>
                                                                        256 GB</option>
                                                                    <option value="128 GB"
                                                                        {{ $storag->storage == '128 GB' ? 'selected' : '' }}>
                                                                        128 GB</option>
                                                                    <option value="64 GB"
                                                                        {{ $storag->storage == '64 GB' ? 'selected' : '' }}>
                                                                        64 GB</option>
                                                                    <option value="32 GB"
                                                                        {{ $storag->storage == '32 GB' ? 'selected' : '' }}>
                                                                        32 GB</option>
                                                                    <option value="16 GB"
                                                                        {{ $storag->storage == '16 GB' ? 'selected' : '' }}>
                                                                        16 GB</option>
                                                                    <option value="8 GB"
                                                                        {{ $storag->storage == '8 GB' ? 'selected' : '' }}>
                                                                        8 GB</option>

                                                                </select>

                                                            </div>
                                                            <div class="col-md-4" style="text-align: center;">
                                                                @if ($loop->index + 1 == 1)
                                                                    <a href="javascript:void(0)"
                                                                        class="btn btn-info addMoreStorage"
                                                                        style="margin-top: 36px;"><span
                                                                            class="glyphicon glyphicon glyphicon-plus"
                                                                            aria-hidden="true"></span> Add
                                                                        Storage</a>
                                                                    <a href="{{ url('admin/productStorage-delete', $storag->id) }}"
                                                                        class="btn btn-danger "
                                                                        style="margin-top: 36px;"><span
                                                                            class="glyphicon glyphicon glyphicon-plus"
                                                                            aria-hidden="true"></span> Remove</a>
                                                                @else
                                                                    <a href="{{ url('admin/productStorage-delete', $storag->id) }}"
                                                                        class="btn btn-danger "
                                                                        style="margin-top: 36px;"><span
                                                                            class="glyphicon glyphicon glyphicon-plus"
                                                                            aria-hidden="true"></span> Remove
                                                                        Storage</a>
                                                                @endif
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>

                                                @foreach ($condition as $key2 => $condit)
                                                    <div class="addcondition{{ $key0 . $key . $key2 }}">
                                                        <div class="add_condition">
                                                            <div class="row"
                                                                id="add_condition{{ $key2 }}">
                                                                <div class="input-group">
                                                                <input type="hidden" name="condition_count"
                                                                            value="{{ $condition->count() }}">
                                                                        <input type="hidden" name="colr_id"
                                                                            value="{{ $key0 }}">
                                                                        <input type="hidden" name="stora_id"
                                                                            value="{{ $key }}">

                                                                        <input type="hidden"
                                                                            name="conditionID[{{ $key0 }}][{{ $key }}][{{ $key2 }}]"
                                                                            value="{{ $condit->id }}">
                                                                      @if($product->type == 'old')      
                                                                    <div class="col-md-3">
                                                                       
                                                                        <label for="example-text-input"
                                                                            class="col-form-label">Condition</label>
                                                                        <select class="form-control"
                                                                            name="condition[{{ $key0 }}][{{ $key }}][]"
                                                                            id="condition">
                                                                            <option selected>Select Any One</option>
                                                                            <option value="fair"
                                                                                {{ $condit->condition == 'fair' ? 'selected' : '' }}>
                                                                                fair</option>
                                                                            <option value="good"
                                                                                {{ $condit->condition == 'good' ? 'selected' : '' }}>
                                                                                good</option>
                                                                            <option value="excellent"
                                                                                {{ $condit->condition == 'excellent' ? 'selected' : '' }}>
                                                                                excellent</option>

                                                                        </select>

                                                                    </div>
                                                                 
                                                                    @endif
                                                                    <div class="col-md-2">
                                                                        <label for="example-text-input"
                                                                            class="col-form-label">Original Price</label>
                                                                        <input class="form-control"
                                                                            name="orig_price[{{ $key0 }}][{{ $key }}][]"
                                                                            type="number"
                                                                            placeholder="Enter mobile orig_price"
                                                                            value="{{ $condit->orig_price ?? '' }}"
                                                                            id="example-text-input">
                                                                        <span
                                                                            class="text-danger">{{ $errors->first('orig_price') }}</span>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <label for="example-text-input"
                                                                            class="col-form-label">Price</label>
                                                                        <input class="form-control"
                                                                            name="price[{{ $key0 }}][{{ $key }}][]"
                                                                            type="number"
                                                                            placeholder="Enter mobile Price"
                                                                            value="{{ $condit->price }}"
                                                                            id="example-text-input">
                                                                        <span
                                                                            class="text-danger">{{ $errors->first('price') }}</span>
                                                                    </div>
                                                                    <input type="hidden" name="addMoreCondition0"
                                                                        value="0" id="addMoreCondition0">

                                                                    <div class="col-md-2">
                                                                        <label for="example-text-input"
                                                                            class="col-form-label">Quantity</label>
                                                                        <input class="form-control"
                                                                            name="quantity[{{ $key0 }}][{{ $key }}][]"
                                                                            type="number"
                                                                            placeholder="Enter mobile Quantity"
                                                                            value="{{ $condit->quantity }}"
                                                                            id="example-text-input">
                                                                        <span
                                                                            class="text-danger">{{ $errors->first('quantity') }}</span>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-3"
                                                                        style="text-align: center;">
                                                                        @if($product->type == 'old')
                                                                        @if ($loop->index + 1 == 1)
                                                                            <a href="javascript:void(0)"
                                                                                class="btn btn-success addMoreCondition"
                                                                                id="addMoreCondition"
                                                                                style="margin-top: 36px;"><span
                                                                                    class="glyphicon glyphicon glyphicon-plus"
                                                                                    aria-hidden="true"></span> Add
                                                                                Condition</a>
                                                                            <a href="{{ route('admin.condition.remove', $condit->id) }}"
                                                                                class="btn btn-danger "
                                                                                style="margin-top: 36px;"><span
                                                                                    class="glyphicon glyphicon glyphicon-plus"
                                                                                    aria-hidden="true"></span>
                                                                                Remove</a>

                                                                        @else

                                                                            <a href="{{ route('admin.condition.remove', $condit->id) }}"
                                                                                class="btn btn-secondary "
                                                                                style="margin-top: 36px;"><span
                                                                                    class="glyphicon glyphicon glyphicon-plus"
                                                                                    aria-hidden="true"></span>
                                                                                Remove Condition</a>
                                                                        @endif
                                                                        @else
                                                                        <a href="{{ route('admin.condition.remove', $condit->id) }}"
                                                                                class="btn btn-secondary "
                                                                                style="margin-top: 36px;"><span
                                                                                    class="glyphicon glyphicon glyphicon-plus"
                                                                                    aria-hidden="true"></span>
                                                                         
                                                                                    Remove Condition</a>
                                                                                    @endif
                                                                                    </div>
                                                                        
                                                                    
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                @endforeach
                                                <hr>



                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-primary">submit</button>
            </form>
        </div>
    </div>
</div>

</div>


@endsection
@section('script')

<script type="text/javascript">


</script>



{{-- nested add field storage --}}
<script type="text/javascript">
var x = 0;
var y = 1;
var z = 1;


$(document).ready(function() {
    //color

    var addButton2 = $('#addMoreColor'); //Add button selector

    var colorCount = '{{ $count }}';

    x = colorCount - 1;

    $(document).on('click', '.addMoreColor', function(e) {
        // alert('asdasd');
        y = 1;
        z = 1;
        var conditionType = '';

        // console.log(x);
        var conditionType = $("#types").val();
        var contentData= 'null';
                    if(conditionType == 'old'){
                       contentData=' <label for="example-text-input" class="col-form-label">Condition</label>'+
                      ' <select class="form-control"  name="condition[][][]" id="condition">'+
                             '  <option selected>Select Any One</option>'+
                             '  <option value="fair">fair</option>'+
                             '  <option value="good">good</option>'+
                             '  <option value="excellent">excellent</option>'+
                          ' </select> ';
                      }

                      var buttonData= '';
                    if(conditionType == 'old'){
                        buttonData='<a href="javascript:void(0)" class="btn btn-warning MoreCondition" style="margin-top: 36px;"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add Condition # '+y+'</a>';
                      }

        var maxField = 3;

        if (x < maxField) {
            // alert(childern);
            var fieldHTML2 =
                '<div class="form-group row" id="removeColor"><div class="col-md-12"><div class="row"><div class="col-md-4">' +
                '<label for="example-text-input" class=" col-form-label">Color Name</label>' +
                '<input class="form-control"  name="color_name[]" type="text" placeholder="Enter mobile color name" id="example-text-input">' +
                ' </div>' +
                ' <div class="col-md-4">' +
                ' <input type="hidden" name="color_ids[]" value="null">' +
                '<input type="hidden" name="image_id[]" value="null">' +
                ' <label for="example-text-input" class="col-form-label">Image</label>' +
                '<input class="form-control" name="image[][]"  multiple type="file"   @if (old('image'))  @endif  id="image-input">' +
                ' </div>' +
                ' <div class="col-md-4" style="text-align: center;">' +
                '<a href="javascript:void(0)" class="btn btn-success  removeColor" style="margin-top: 36px;"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Remove Color</a>' +
                ' <a href="javascript:void(0)" class="btn btn-info addMoreStorage" style="margin-top: 36px;"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add Storage # 1</a>' +
                '</div>' +
                '</div>' +
                '<hr>' +
                '<div class="addstorageadd">' +
                ' <div class="add_storage' + x + '">' +
                '<div class="row">' +
                '<div class="input-group" >' +
                ' <input type="hidden" name="storage_count"  value="">' +
                ' <input type="hidden" name="storage_id" value="">' +
                '<input type="hidden" name="addMoreStorage0" value="0" id="addMoreStorage0">' +
                '<input type="hidden" name="storageID[][]" value="null">' +
                '<div class="col-md-8">' +
                '<label for="example-text-input" class="col-form-label">Storage</label>' +
                '<select class="form-control" name="storage[][]" >' +
                ' <option selected>Select Memory</option>' +
                '<option value="256 GB">256 GB</option>' +
                '<option value="128 GB">128 GB</option>' +
                '<option value="64 GB">64 GB</option>' +
                ' <option value="32 GB">32 GB</option>' +
                '<option value="16 GB">16 GB</option>' +
                '<option value="8 GB">8 GB</option>' +

                '</select>' +
                '</div>' +
                ' <div class="col-md-4" style="text-align: center;">' +
                '<a href="javascript:void(0)" class="btn btn-info MoreStorage" style="margin-top: 36px;"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add Storage</a>' +

                ' </div>' +
                '</div>' +
                '</div>' +

                '<div class="addconditionadd">' +
                '<div class="add_condition' + x + '">' +
                '<div class="row">' +
                '<div class="input-group">' +
                ' <div class="col-md-3">'+
                 contentData+
                  ' </div>'+
                '<div class="col-md-2">' +
                '<label for="example-text-input" class="col-form-label">Original Price</label>' +
                '<input class="form-control"  name="orig_price[][][]" type="number" placeholder="Enter mobile orig_price" id="example-text-input">' +

                '</div>' +
                '<div class="col-md-2">' +
                '<label for="example-text-input" class="col-form-label">Price</label>' +
                '<input class="form-control"  name="price[][][]" type="number" placeholder="Enter mobile Price" id="example-text-input">' +

                '</div>' +
                '<input type="hidden" name="addMoreCondition0" value="0" id="addMoreCondition0">' +

                '<div class="col-md-2">' +
                '<label for="example-text-input" class="col-form-label">Quantity</label>' +
                '<input class="form-control"  name="quantity[][][]" type="number" placeholder="Enter mobile Quantity"   id="example-text-input">' +
                '<input type="hidden" name="conditionID[][][]" value="null">' +
                '</div>' +
                '<div class="col-md-3" style="text-align: center;">' +
                buttonData+
                '</div>' +
                '</div>' +
                ' </div>' +
                '</div>' +
                '</div>' +
                '<hr>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>';

            console.log(x);
            $('.addColor' + x).append(fieldHTML2);
            x++;
        }
    });


    $(document).on('click', '.removeColor', function(e) {
        e.preventDefault();
        console.log($("#removeColor"));

        $("#removeColor").remove(); //Remove field html
        x--; //Decrement field counter
    });




});
</script>


<script type="text/javascript">
$(document).ready(function() {

    var addButton2 = $('#add_button2'); //Add button selector
    var wrapper2 = $('#field_wrapper2');
    //Input field wrapper
    var x = 0;
    var y = 0;
    var z = 0;
    var c = 0;
    var storageindex = 0;

    var storageCount = '{{ $storageCount }}';
    $(document).on('click', '.addMoreStorage', function(e) {

        storageindex = $(e.target).closest('.add_storage').children().find('input')[0].value;
        colorindex = $(e.target).closest('.add_storage').children().find('input')[1].value;
        console.log(colorindex);
        console.log(storageindex);
        var appendkey = storageindex - 1;
        // console.log(appendkey);
        // var storageindex = y;
        var maxField = 3;
        // var childern = $(e.target).find('#' + storageindex).children().length;
        //  alert(childern);

        var conditionType = $("#types").val();
        var contentData= '';
                    if(conditionType == 'old'){
                       contentData=' <div class="col-md-3">'+
                      ' <label for="example-text-input" class="col-form-label">Condition</label>'+
                      ' <select class="form-control"  name="condition['+y+'][]" id="condition">'+
                             '  <option selected>Select Any One</option>'+
                             '  <option value="fair">fair</option>'+
                             '  <option value="good">good</option>'+
                             '  <option value="excellent">excellent</option>'+
                          ' </select> '+
                  ' </div>';
                      }

                      var buttonData= '';
                    if(conditionType == 'old'){
                        buttonData='<div class="col-md-3" style="text-align:center"> ' +
                ' <a href="javascript:void(0)" class="btn btn-warning MoreAddCondition" style="margin-top: 36px;"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add Condition # </a>' +
                ' </div>';
                      }

        if (appendkey < maxField) {
            // alert(childern);
            var fieldHTML = '<div class="add_storage"> <div class="row " id="add_storage' +
                storageindex +
                '"><div class="input-group">' +
                '<div class="col-md-8">' +
                '<input type="hidden" name="storageID[' + colorindex + ']['+storageindex+']" value="null">' +
                '<label for="example-text-input" class="col-form-label">Storage</label>' +
                '<select class="form-control" name="storage[' + colorindex + ']['+storageindex+']" >' +
                '<option selected>Select Memory</option>' +
                '<option value="256 GB">256 GB</option>' +
                '<option value="128 GB">128 GB</option>' +
                '<option value="64 GB">64 GB</option>' +
                '<option value="32 GB">32 GB</option>' +
                '<option value="16 GB">16 GB</option>' +
                '<option value="8 GB">8 GB</option>' +
                '</select>' +

                '</div>' +
                '<div class="col-md-4" style="text-align: center;"> ' +
                '  <a href="javascript:void(0)" class="btn btn-danger remove_storage" style="margin-top: 36px;" id="add_button2"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Remove Storage </a>' +
                ' </div>' +

                '<div class="addConditionsss">' +
                '<div class="row" >' +
                '<div class="input-group">' +
                '<input type="hidden" name="colorIn" value="' + colorindex + '">' +
                '<input type="hidden" name="apendStorg" value="' + storageindex + '">' +
                '<input type="hidden" name="conditionID[' + colorindex + '][' + storageindex +
                '][]" value="null">' +
                contentData+
                ' <div class="col-md-2">' +
                ' <label for="example-text-input" class="col-form-label">Original Price</label>' +
                ' <input class="form-control"  name="orig_price[' + colorindex + '][' + storageindex +
                '][]" type="number" placeholder="Enter mobile orig_price"  @if (old('orig_price')) value="{{ old('orig_price') }}" @endif  id="example-text-input">' +
                ' <span class="text-danger">{{ $errors->first('orig_price') }}</span>' +
                ' </div>'+
                ' <div class="col-md-2">' +
                ' <label for="example-text-input" class="col-form-label">Price</label>' +
                ' <input class="form-control"  name="price[' + colorindex + '][' + storageindex +
                '][]" type="number" placeholder="Enter mobile Price"  @if (old('price')) value="{{ old('price') }}" @endif  id="example-text-input">' +
                ' <span class="text-danger">{{ $errors->first('price') }}</span>' +
                ' </div>'+
                '<div class="col-md-2">' +
                ' <label for="example-text-input" class="col-form-label">Quantity</label>' +
                ' <input class="form-control"  name="quantity[' + colorindex + '][' + storageindex +
                '][]" type="number" placeholder="Enter mobile Quantity"   id="example-text-input">' +
                '  <span class="text-danger">{{ $errors->first('quantity') }}</span>' +
                ' </div>' +
                buttonData+
                ' </div>' +
                ' </div>' +
                ' </div>' +
                '</div>';

            $('.addstorage' + colorindex + appendkey).append(fieldHTML);
            // storageindex++;
            // console.log(storageindex);
        }
    });

    $(document).on('click', '.remove_storage', function(e) {

        e.preventDefault();
        console.log($(this).parents('.removeStorage'));

        $(this).parents('.add_storage').remove(); //Remove field html
        y--; //Decrement field counter
    });


    //    condition section

    $(document).on('click', '.addMoreCondition', function(e) {
        //  alert('asdsad');

        condindex = $(e.target).closest('.add_condition').children().find('input')[0].value;
       
        colorindex = $(e.target).closest('.add_condition').children().find('input')[1].value;
        storindex = $(e.target).closest('.add_condition').children().find('input')[2].value;

        var appendkey = condindex - 1;

        var conditionType = $("#types").val();
        var contentData= '';
                    if(conditionType == 'old'){
                       contentData=' <div class="col-md-3">'+
                      ' <label for="example-text-input" class="col-form-label">Condition</label>'+
                      ' <select class="form-control"  name="condition[' + colorindex +
                         '][' + storindex +'][]" id="condition">'+
                             '  <option selected>Select Any One</option>'+
                             '  <option value="fair">fair</option>'+
                             '  <option value="good">good</option>'+
                             '  <option value="excellent">excellent</option>'+
                          ' </select> '+
                  ' </div>';
                      }
    

        var maxField = 3;
        // var childern = $(e.target).closest('.add_condition').find('#' + storeindex).children()
        //     .length;
        //   alert(storeindex);
        if (storindex < maxField) {
            // alert(childern);
            var fieldHTML = ' <div class="remove_condition"><div class="row" id="add_condition' +
                storindex + '"><div class="input-group">' +
                contentData+
                '<input type="hidden" name="conditionID[' + colorindex + '][' + storindex +
                '][]" value="null">' +
                ' <div class="col-md-2">' +
                ' <label for="example-text-input" class="col-form-label">Original Price</label>' +
                ' <input class="form-control"  name="orig_price[' + colorindex +
                '][' + storindex +
                '][]" type="number" placeholder="Enter mobile Price"  @if (old('price')) value="{{ old('price') }}" @endif  id="example-text-input">' +
                ' <span class="text-danger">{{ $errors->first('price') }}</span>' +
                ' </div>'+
                ' <div class="col-md-2">' +
                ' <label for="example-text-input" class="col-form-label">Price</label>' +
                ' <input class="form-control"  name="price[' + colorindex +
                '][' + storindex +
                '][]" type="number" placeholder="Enter mobile Price"  @if (old('price')) value="{{ old('price') }}" @endif  id="example-text-input">' +
                ' <span class="text-danger">{{ $errors->first('price') }}</span>' +
                ' </div>'+
                '<div class="col-md-2">' +
                ' <label for="example-text-input" class="col-form-label">Quantity</label>' +
                ' <input class="form-control"  name="quantity[' + colorindex +
                '][' + storindex +
                '][]" type="number" placeholder="Enter mobile Quantity"  @if (old('quantity')) value="{{ old('quantity') }}" @endif  id="example-text-input">' +
                '  <span class="text-danger">{{ $errors->first('quantity') }}</span>' +
                ' </div>' +
                '<div  class="col-md-3" style="text-align:center"> ' +
                ' <a href="javascript:void(0)" class="btn btn-secondary removeCondition" style="margin-top: 36px;"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Remove Condition#' +
                condindex + '</a>' +
                ' </div>' +
                '</div>' +
                '</div>' +
                '</div>';
            //$('#field_wrapper_size'+z).append(fieldHTML); //Add field html
            // $(e.target).closest('.form-group').find('#' + conditionid).append(fieldHTML);
            $('.addcondition' + colorindex + storindex + appendkey).append(fieldHTML);
        }
    });


    $(document).on('click', '.removeCondition', function(e) {
        e.preventDefault();
        console.log($(this).parents('.remove_condition'));

        $(this).parents('.remove_condition').remove(); //Remove field html
        y--; //Decrement field counter
    });


    //////////More Condition releated to storag

    $(document).on('click', '.MoreStorage', function(e) {
        // alert("asdas");

        var maxField = 3;

        var conditionType = $("#types").val();
        var contentData= '';
                    if(conditionType == 'old'){
                       contentData=' <div class="col-md-3">'+
                      ' <label for="example-text-input" class="col-form-label">Condition</label>'+
                      ' <select class="form-control"  name="condition['+y+'][]" id="condition">'+
                             '  <option selected>Select Any One</option>'+
                             '  <option value="fair">fair</option>'+
                             '  <option value="good">good</option>'+
                             '  <option value="excellent">excellent</option>'+
                          ' </select> '+
                  ' </div>';
                      }

                      var buttonData= '';
                    if(conditionType == 'old'){
                        buttonData='<a href="javascript:void(0)" class="btn btn-warning MoreConditionAdd" style="margin-top: 36px;"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add Condition</a>';
                      }
            // alert(childern);
            var fieldHTML = '<div class="row remove_storage"><div class="input-group">' +
                '<div class="col-md-8">' +
                '<label for="example-text-input" class="col-form-label">Storage</label>' +
                '<select class="form-control" name="storage[' + x + '][' + y + ']" >' +
                '<option selected>Select Memory</option>' +
                '<option value="256 GB">256 GB</option>' +
                '<option value="128 GB">128 GB</option>' +
                '<option value="64 GB">64 GB</option>' +
                '<option value="32 GB">32 GB</option>' +
                '<option value="16 GB">16 GB</option>' +
                '<option value="8 GB">8 GB</option>' +
                '</select>' +
                '<input type="hidden" name="storageID[' + x + '][' + y + ']" value="null">' +
                '</div>' +
                '<div class="col-md-4" style="text-align: center;"> ' +
                '  <a href="javascript:void(0)" class="btn btn-danger removeStorage" style="margin-top: 36px;" id="add_button2"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Remove Storage #</a>' +
                ' </div>' +
                '<input type="hidden" name="conditionID[' + x + '][' + y + '][]" value="null">' +
                '<div class="add_conditionmoressss">' +
                '<div class="row add_conditionmore'+x+'" id="add_condition' + y + '">' +
                '<div class="input-group">' +
                contentData+
                ' <div class="col-md-2">' +
                ' <label for="example-text-input" class="col-form-label">Original Price</label>' +
                ' <input class="form-control"  name="orig_price[' + x + '][' + y +
                '][]" type="number" placeholder="Enter mobile orig_price"  @if (old('orig_price')) value="{{ old('orig_price') }}" @endif  id="example-text-input">' +
                ' <span class="text-danger">{{ $errors->first('orig_price') }}</span>' +
                ' </div>'+
                ' <div class="col-md-2">' +
                ' <label for="example-text-input" class="col-form-label">Price</label>' +
                ' <input class="form-control"  name="price[' + x + '][' + y +
                '][]" type="number" placeholder="Enter mobile Price"  @if (old('price')) value="{{ old('price') }}" @endif  id="example-text-input">' +
                ' <span class="text-danger">{{ $errors->first('price') }}</span>' +
                ' </div>'+
                '<div class="col-md-2">' +
                ' <label for="example-text-input" class="col-form-label">Quantity</label>' +
                ' <input class="form-control"  name="quantity[' + x + '][' + y +
                '][]" type="number" placeholder="Enter mobile Quantity"  @if (old('quantity')) value="{{ old('quantity') }}" @endif  id="example-text-input">' +
                '  <span class="text-danger">{{ $errors->first('quantity') }}</span>' +
                ' </div>' +
                '<div class="col-md-3" style="text-align:center"> ' +
                buttonData+
                
                ' </div>' +
                ' </div>' +
                ' </div>' +
                '</div>';
            //$('#field_wrapper_size'+z).append(fieldHTML); //Add field html

            $(this).parents('.addstorageadd').append(fieldHTML);
            // $('.addstorage'+x).append(fieldHTML);
            y++;

    });

    $(document).on('click', '.removeStorage', function(e) {

        e.preventDefault();
        console.log($(this).parents('.remove_storage'));

        $(this).parents('.remove_storage').remove(); //Remove field html
        y--;
        // console.log(y--);
    });
    var conditionType = $("#types").val();
        var contentData= '';
                    if(conditionType == 'old'){
                       contentData=' <div class="col-md-3">'+
                      ' <label for="example-text-input" class="col-form-label">Condition</label>'+
                      ' <select class="form-control"  name="condition['+y+'][]" id="condition">'+
                             '  <option selected>Select Any One</option>'+
                             '  <option value="fair">fair</option>'+
                             '  <option value="good">good</option>'+
                             '  <option value="excellent">excellent</option>'+
                          ' </select> '+
                  ' </div>';
                      }

                    

    $(document).on('click', '.MoreCondition', function(e) {


        var maxField = 3;
        // var childern =	$(e.target).closest('.add_condition').find('#'+storeindex).children().length;


            // alert(childern);
            var fieldHTML = ' <div class="remove_condition"><div class="row" id="add_condition' +
                z + '"><div class="input-group">' +
                contentData+
                '<input type="hidden" name="conditionID[' + x + '][' + y + '][' + z +
                ']" value="null">' +
                ' <div class="col-md-2">' +
                ' <label for="example-text-input" class="col-form-label">Original Price</label>' +
                ' <input class="form-control"  name="orig_price[' + x + '][' + y + '][' + z +
                ']" type="number" placeholder="Enter mobile orig_price"  @if (old('orig_price')) value="{{ old('orig_price') }}" @endif  id="example-text-input">' +
                ' <span class="text-danger">{{ $errors->first('orig_price') }}</span>' +
                ' </div>'+
                ' <div class="col-md-2">' +
                ' <label for="example-text-input" class="col-form-label">Price</label>' +
                ' <input class="form-control"  name="price[' + x + '][' + y + '][' + z +
                ']" type="number" placeholder="Enter mobile Price"  @if (old('price')) value="{{ old('price') }}" @endif  id="example-text-input">' +
                ' <span class="text-danger">{{ $errors->first('price') }}</span>' +
                ' </div>'+
                '<div class="col-md-2">' +
                ' <label for="example-text-input" class="col-form-label">Quantity</label>' +
                ' <input class="form-control"  name="quantity[' + x + '][' + y + '][' + z +
                ']" type="number" placeholder="Enter mobile Quantity"  @if (old('quantity')) value="{{ old('quantity') }}" @endif  id="example-text-input">' +
                '  <span class="text-danger">{{ $errors->first('quantity') }}</span>' +
                ' </div>' +
                '<div  class="col-md-3" style="text-align:center"> ' +
                ' <a href="javascript:void(0)" class="btn btn-secondary removeCondition" style="margin-top: 36px;"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Remove Condition#' +
                z + '</a>' +
                ' </div>' +
                '</div>' +
                '</div>' +
                '</div>';
            //$('#field_wrapper_size'+z).append(fieldHTML); //Add field html

            $(this).parents('.addconditionadd').append(fieldHTML);
            z++;

    });


    $(document).on('click', '.removeCondition', function(e) {
        e.preventDefault();
        console.log($(this).parents('.remove_condition'));

        $(this).parents('.remove_condition').remove();
              //Remove field html
        z--; //Decrement field counter
    });




    $(document).on('click', '.MoreAddCondition', function(e) {

        // alert('ddd');
        var maxField = 3;
        // var childern =	$(e.target).closest('.add_condition').find('#'+storeindex).children().length;
        var conditionType = $("#types").val();
        var contentData= '';
                    if(conditionType == 'old'){
                       contentData=' <div class="col-md-3">'+
                      ' <label for="example-text-input" class="col-form-label">Condition</label>'+
                      ' <select class="form-control"  name="condition['+y+'][]" id="condition">'+
                             '  <option selected>Select Any One</option>'+
                             '  <option value="fair">fair</option>'+
                             '  <option value="good">good</option>'+
                             '  <option value="excellent">excellent</option>'+
                          ' </select> '+
                  ' </div>';
                      }
                      var buttonData= '';
                    if(conditionType == 'old'){
                       contentData='<a href="javascript:void(0)" class="btn btn-warning addMoreCondition" style="margin-top: 36px;"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add Condition # '+y+'</a>';
                      }


            // alert(childern);
            var fieldHTML = ' <div class="remove_condition"><div class="row" id="add_condition' +
                z + '"><div class="input-group">' +
                contentData+
                '<input type="hidden" name="conditionID[' + x + '][' + y + '][' + z +
                ']" value="null">' +
                ' <div class="col-md-2">' +
                ' <label for="example-text-input" class="col-form-label">Original Price</label>' +
                ' <input class="form-control"  name="orig_price[' + x + '][' + y + '][' + z +
                ']" type="number" placeholder="Enter mobile orig_price"  @if (old('orig_price')) value="{{ old('orig_price') }}" @endif  id="example-text-input">' +
                ' <span class="text-danger">{{ $errors->first('orig_price') }}</span>' +
                ' </div>'+
                ' <div class="col-md-2">' +
                ' <label for="example-text-input" class="col-form-label">Price</label>' +
                ' <input class="form-control"  name="price[' + x + '][' + y + '][' + z +
                ']" type="number" placeholder="Enter mobile Price"  @if (old('price')) value="{{ old('price') }}" @endif  id="example-text-input">' +
                ' <span class="text-danger">{{ $errors->first('price') }}</span>' +
                ' </div>'+
                '<div class="col-md-2">' +
                ' <label for="example-text-input" class="col-form-label">Quantity</label>' +
                ' <input class="form-control"  name="quantity[' + x + '][' + y + '][' + z +
                ']" type="number" placeholder="Enter mobile Quantity"  @if (old('quantity')) value="{{ old('quantity') }}" @endif  id="example-text-input">' +
                '  <span class="text-danger">{{ $errors->first('quantity') }}</span>' +
                ' </div>' +
                '<div  class="col-md-3" style="text-align:center"> ' +
                ' <a href="javascript:void(0)" class="btn btn-secondary removeCondition" style="margin-top: 36px;"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Remove Condition#' +
                z + '</a>' +
                ' </div>' +
                '</div>' +
                '</div>' +
                '</div>';
            //$('#field_wrapper_size'+z).append(fieldHTML); //Add field html
            console.log($(this).parents('.addConditionsss '));
            $(this).parents('.addConditionsss ').append(fieldHTML);
            z++;

    });


    $(document).on('click', '.removeCondition', function(e) {
        e.preventDefault();
        console.log($(this).parents('.remove_condition'));

        $(this).parents('.remove_condition').remove(); //Remove field html
        z--; //Decrement field counter
    });

    $(document).on('click', '.MoreConditionAdd', function(e) {

        // alert('ddd');
        var maxField = 3;
        // var childern =	$(e.target).closest('.add_condition').find('#'+storeindex).children().length;

        var conditionType = $("#types").val();
        var contentData= '';
                    if(conditionType == 'old'){
                       contentData=' <div class="col-md-3">'+
                      ' <label for="example-text-input" class="col-form-label">Condition</label>'+
                      ' <select class="form-control"  name="condition['+y+'][]" id="condition">'+
                             '  <option selected>Select Any One</option>'+
                             '  <option value="fair">fair</option>'+
                             '  <option value="good">good</option>'+
                             '  <option value="excellent">excellent</option>'+
                          ' </select> '+
                  ' </div>';
                      }
  var buttonData= '';
                    if(conditionType == 'old'){
                       contentData='<a href="javascript:void(0)" class="btn btn-warning addMoreCondition" style="margin-top: 36px;"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add Condition # '+y+'</a>';
                      }

            // alert(childern);
            var fieldHTML = ' <div class="remove_conditionsss"><div class="row" id="add_condition' +
                z + '"><div class="input-group">' +
                contentData+
                '<input type="hidden" name="conditionID[' + x + '][' + y + '][' + z +
                ']" value="null">' +
                ' <div class="col-md-2">' +
                ' <label for="example-text-input" class="col-form-label">Original Price</label>' +
                ' <input class="form-control"  name="orig_price[' + x + '][' + y + '][' + z +
                ']" type="number" placeholder="Enter mobile orig_price"  @if (old('orig_price')) value="{{ old('orig_price') }}" @endif  id="example-text-input">' +
                ' <span class="text-danger">{{ $errors->first('orig_price') }}</span>' +
                ' </div>'+
                ' <div class="col-md-2">' +
                ' <label for="example-text-input" class="col-form-label">Price</label>' +
                ' <input class="form-control"  name="price[' + x + '][' + y + '][' + z +
                ']" type="number" placeholder="Enter mobile Price"  @if (old('price')) value="{{ old('price') }}" @endif  id="example-text-input">' +
                ' <span class="text-danger">{{ $errors->first('price') }}</span>' +
                ' </div>'+
                '<div class="col-md-2">' +
                ' <label for="example-text-input" class="col-form-label">Quantity</label>' +
                ' <input class="form-control"  name="quantity[' + x + '][' + y + '][' + z +
                ']" type="number" placeholder="Enter mobile Quantity"  @if (old('quantity')) value="{{ old('quantity') }}" @endif  id="example-text-input">' +
                '  <span class="text-danger">{{ $errors->first('quantity') }}</span>' +
                ' </div>' +
                '<div  class="col-md-3" style="text-align:center"> ' +
                ' <a href="javascript:void(0)" class="btn btn-secondary removeConditionss" style="margin-top: 36px;"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Remove Condition#' +
                z + '</a>' +
                ' </div>' +
                '</div>' +
                '</div>' +
                '</div>';
            //$('#field_wrapper_size'+z).append(fieldHTML); //Add field html
            console.log($('.add_conditionmore '));
            $('.add_conditionmore'+x).append(fieldHTML);
            z++;

    });


    $(document).on('click', '.removeConditionss', function(e) {
        e.preventDefault();
        console.log($(this).parents('.remove_conditionsss'));

        $(this).parents('.remove_conditionsss').remove(); //Remove field html
        z--; //Decrement field counter
    });



});
</script>



@endsection
