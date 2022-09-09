@extends('admin.layouts.master')

@section('title') Product Condition @endsection

@section('content')
   @component('admin.common-components.breadcrumb')
         @slot('title')  @endslot
         @slot('li_1')  @endslot
         @slot('li_2')@endslot
     @endcomponent





    <div class="row">
    <div class="col-md-12">
        @if(Session::has('message'))
        <div class="col-12">
            {!!Session::get('message')!!}
        </div>
        @endif
        <div class="card">
            <div class="card-body">
                <form action="{{url('admin/product-storeCondition')}}"  method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                        <h1>Product Condition</h1>
                        <!-- One "tab" for each step in the form: -->

                         <div class="tab" id="moreAdd">

                            <div class="form-group row" id="field_wrapper2">

                                <div class="col-md-12">
                                    @foreach ($colors as $key0=>  $color)
                                    <input type="hidden" name="product_id"  id="product_id" value="{{$color->product_id}}">
                                       <div class="col-md-12">



                                    @php
                                    $storages = $color->productStorage;
                                    // print_r($storages->count()); die;
                                    @endphp




                              @foreach ($storages as $key1=>$storage)

                                <div class="addstorage" id="{{$storage->id}}">
                                <span class=""><b><h2>{{$storage->storage}}  {{$color->color_name}}</h2></b></span>
                               <input type="hidden" name="storage_id[0][]" id="storage_id" value="{{ $storage->id}}">
                                @php
                                $conditions=App\Models\ProductCondition::where('storage_id',$storage->id)->get();
                                @endphp

                                <div class="add_condition">
                                 <div class="addCondition">
                                    <div class="row" id="add_condition{{ $key0 }}{{$key1}}">
                                        @foreach($conditions as $key=>$condition)
                                    <div class="input-group">

                                        <input type="hidden" name="condition_id[{{ $key1 }}][]" value={{$condition->id}}>
                                    <div class="col-md-3">
                                        <label for="example-text-input" class="col-form-label">Condition</label>
                                        <select class="form-control"  name="condition[{{ $key1 }}][]" id="condition">
                                                <option selected>Select Any One</option>
                                                <option value="fair" {{$condition->condition == "fair" ? 'selected' : ''}}>fair</option>
                                                <option value="good" {{$condition->condition == "good"  ? 'selected': ''}}>good</option>
                                                <option value="excellent" {{$condition->condition == "excellent" ?  'selected' : ''}}>excellent</option>

                                            </select>

                                    </div>
                                    <div class="col-md-3">
                                        <label for="example-text-input" class="col-form-label">Price</label>
                                        <input class="form-control"  name="price[{{ $key1 }}][]" type="number" placeholder="Enter mobile Price"  value="{{$condition->price}}"  id="example-text-input">
                                        <span class="text-danger">{{ $errors->first('price') }}</span>
                                    </div>


                                    <div class="col-md-3">
                                        <label for="example-text-input" class="col-form-label">Quantity</label>
                                        <input class="form-control"  name="quantity[{{ $key1 }}][]" type="number" placeholder="Enter mobile Quantity"  value="{{$condition->quantity}}" @if(old('quantity')) value="{{ old('quantity') }}" @endif  id="example-text-input">
                                        <span class="text-danger">{{ $errors->first('quantity') }}</span>
                                    </div>
                                    <div class="col-md-3" style="text-align: center;">
                                     @if($loop->index+1 == 1)
                                         <a href="javascript:void(0)" class="btn btn-success addMoreCondition" style="margin-top: 36px;"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add Condition </a>
                                         <a href="{{url('admin/productCondtion-delete',[$storage->id,$condition->id])}}" class="btn btn-danger " style="margin-top: 36px;"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Remove</a>
                                     @else

                                    <a href="{{url('admin/productCondtion-delete',[$storage->id,$condition->id])}}" class="btn btn-secondary " style="margin-top: 36px;"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Remove Condition</a>
                                    @endif
                                    </div>

                                    </div>
                                    @endforeach
                                    </div>
                                    </div>

                                    </div>

                        </div>
                        @endforeach
                     @endforeach

                                <hr>

                            </div>
                        </div>
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

    $(document).ready(function(){
        //group add limit
        var maxField2 = 4; //Input fields increment limitation
        var addButton2 = $('#add_button2'); //Add button selector
        var wrapper2 = $('#field_wrapper2');
        //Input field wrapper
         var x=0;



//    condition section

    $(document).on('click','.addMoreCondition',function(e){
		// alert('asdasd');

        console.log($(e.target).closest('.add_condition').children()[0]);

      var conditionid= $(e.target).closest('.addCondition').children()[0].id;
      console.log(conditionid);

      var storeindex = conditionid.slice(13,14);
      var storeindex2 = conditionid.slice(14,15);
       alert(storeindex);
        x++;
        // console.log(
         var storageid= $(e.target).closest('.addstorage').find('input').val();




        var  maxField=5;
		var childern =	$(e.target).closest('.add_condition').find('#'+storeindex).children().length;
        //   alert(storeindex);
			if(x < maxField ){
                // alert(childern);
				var fieldHTML = ' <div class="remove_condition"><div class="row" id="add_condition'+x+'"><div class="input-group">'+
                                           ' <div class="col-md-3">'+
                                           '<input type="hidden" name="storage2_id['+storeindex+']['+storeindex2+'][]" value="'+storageid+'">'+
                                           ' <label for="example-text-input" class="col-form-label">Condition</label>'+
                                           ' <select class="form-control"  name="condition2['+storeindex+']['+storeindex2+'][]" id="condition">'+
                                                  '  <option selected>Select Any One</option>'+
                                                  '  <option value="fair">fair</option>'+
                                                  '  <option value="good">good</option>'+
                                                  '  <option value="excellent">excellent</option>'+
                                               ' </select> '+
                                       ' </div>'+
                                       ' <div class="col-md-3">'+
                                           ' <label for="example-text-input" class="col-form-label">Price</label>'+
                                           ' <input class="form-control"  name="price2['+storeindex+']['+storeindex2+'][]" type="number" placeholder="Enter mobile Price"  @if(old('price')) value="{{ old('price') }}" @endif  id="example-text-input">'+
                                           ' <span class="text-danger">{{ $errors->first('price') }}</span>'+
                                       ' </div>    <div class="col-md-3">'+
                                           ' <label for="example-text-input" class="col-form-label">Quantity</label>'+
                                           ' <input class="form-control"  name="quantity2['+storeindex+']['+storeindex2+'][]" type="number" placeholder="Enter mobile Quantity"  @if(old('quantity')) value="{{ old('quantity') }}" @endif  id="example-text-input">'+
                                          '  <span class="text-danger">{{ $errors->first('quantity') }}</span>'+
                                       ' </div>'+
                                        '<div  class="col-md-3" style="text-align:center"> '+
                                           ' <a href="javascript:void(0)" class="btn btn-secondary removeCondition" style="margin-top: 36px;"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Remove Condition#'+x+'</a>'+
                                       ' </div>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>';
				//$('#field_wrapper_size'+z).append(fieldHTML); //Add field html
				$(e.target).closest('.addCondition').find('#'+conditionid).append(fieldHTML);
			}
	});


     $(document).on('click', '.removeCondition', function(e){
            e.preventDefault();
         console.log($(this).parents('.remove_condition'));

         $(this).parents('.remove_condition').remove(); //Remove field html
            x--; //Decrement field counter
        });




});

    </script>




@endsection

