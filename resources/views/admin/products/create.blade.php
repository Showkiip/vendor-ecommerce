@extends('admin.layouts.master')

@section('title') Product @endsection

@section('content')
   @component('admin.common-components.breadcrumb')
         @slot('title')  @endslot
         @slot('li_1')  @endslot
         @slot('li_2')@endslot
     @endcomponent

 <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.6/css/bootstrap-colorpicker.css" rel="stylesheet">


 <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">

  <style>


        #regForm {
          /* background-color: #ffffff;
          margin: 20px ;
          padding: 40px;
          width: 100%;
          min-width: 300px; */
        }

        h1 {
          text-align: center;
        }

        input {
          padding: 10px;
          width: 100%;
          font-size: 17px;
          font-family: Raleway;
          border: 1px solid #aaaaaa;
        }

        /* Mark input boxes that gets an error on validation: */
        input.invalid {
          background-color: #ffdddd;
        }

        /* Hide all steps by default: */
        .tab {
          display: none;
        }

        button {
          background-color: #04AA6D;
          color: #ffffff;
          border: none;
          padding: 10px 20px;
          font-size: 17px;
          font-family: Raleway;
          cursor: pointer;
        }

        button:hover {
          opacity: 0.8;
        }

        #prevBtn {
          background-color: #bbbbbb;
        }

        /* Make circles that indicate the steps of the form: */
        .step {
          height: 15px;
          width: 15px;
          margin: 0 2px;
          background-color: #bbbbbb;
          border: none;
          border-radius: 50%;
          display: inline-block;
          opacity: 0.5;
        }

        .step.active {
          opacity: 1;
        }

        /* Mark the steps that are finished and valid: */
        .step.finish {
          background-color: #04AA6D;
        }
        </style>

    <div class="row">
    <div class="col-12">
        @if(Session::has('message2'))
        <div class="col-12">
            {!!Session::get('message2')!!}
        </div>
        @endif @if(Session::has('message'))
        <div class="col-12">
            {!!Session::get('message')!!}
        </div>
        @endif
        <div class="card">
            <div class="card-body">
                <form action="{{url('admin/product')}}" id="regForm" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                        <h1>Product information</h1>
                        <!-- One "tab" for each step in the form: -->
                        <div class="tab">

                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label">Brands</label>
                            <div class="col-md-10">
                                <select class="form-control selectpic"  name="brand" id="brand" onchange="getModel(this)">
                                    <option selected="">Select Brand</option>
                                    @foreach(CityClass::brands() as $brand)
                                        <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="form-group row" id="showModels">
                            <label for="example-text-input" class="col-md-2 col-form-label">Models</label>
                        <div class="col-md-10">
                            <select class="form-control selectpic"  name="model_Id"  required>
                                <option selected="">Select Model</option>
                            </select>
                        </div>
                    </div>

                            <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Memory</label>
                            <div class="col-md-10">
                                <select class="form-control selectpic"  name="memory" id="memory">
                                    <option selected>Select Memory</option>
                                    @foreach(CityClass::Storages() as $store)
                                    <option value="{{$store->storage}}">{{$store->storage}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Locked Or UnLocked</label>
                            <div class="col-md-10">
                                <select class="form-control selectpic"  name="locked" id="locked">
                                    <option selected>Select Any One</option>
                                    <option value="Locked">Locked</option>
                                    <option value="Unlocked">UnLocked</option>

                                </select>
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Category</label>
                            <div class="col-md-10">
                                <select class="form-control selectpic"  name="category" id="category">
                                    <option selected>Select Any One</option>
                                    <option value="phone">Phone</option>
                                    <option value="accessory">Accessory</option>

                                </select>
                            </div>
                        </div> -->
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Type</label>
                            <div class="col-md-10">
                                <select class="form-control selectpic" onchange="productType(this)"  name="type" id="type">
                                    <option selected>Select Any One</option>
                                    <option value="new">New</option>
                                    <option value="old">Used</option>

                                </select>
                            </div>
                        </div>
                     <!--    <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">OS</label>
                            <div class="col-md-10">
                                <select class="form-control selectpic"  name="OS" id="OS">
                                    <option selected>Select Any One</option>
                                    <option value="andriod phone">Andriod Phone</option>
                                    <option value="window phone">Window Phone</option>
                                    <option value="apple phone">Apple Phone</option>
                                    <option value="all smartphone">All Smartphone</option>

                                </select>
                            </div>
                        </div>
 -->
                       <!--  <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Warranty</label>
                            <div class="col-md-10">
                                <input class="form-control"  name="warranty" type="text" placeholder="Enter mobile warranty"  @if(old('warranty')) value="{{ old('warranty') }}" @endif  id="example-text-input">
                                <span class="text-danger">{{ $errors->first('warranty') }}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Screen Size</label>
                            <div class="col-md-10">
                                <input class="form-control"  name="screen_size" type="text" placeholder="Enter mobile screen size"  @if(old('screen_size')) value="{{ old('screen_size') }}" @endif  id="example-text-input">
                                <span class="text-danger">{{ $errors->first('screen_size') }}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Screen Type</label>
                            <div class="col-md-10">
                                <input class="form-control"  name="screen_type" type="text" placeholder="Enter mobile screen type"  @if(old('screen_type')) value="{{ old('screen_type') }}" @endif  id="example-text-input">
                                <span class="text-danger">{{ $errors->first('screen_type') }}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Megapixel</label>
                            <div class="col-md-10">
                                <input class="form-control"  name="megapixel" type="text" placeholder="Enter mobile megapixel"  @if(old('megapixel')) value="{{ old('megapixel') }}" @endif  id="example-text-input">
                                <span class="text-danger">{{ $errors->first('megapixel') }}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Network</label>
                            <div class="col-md-10">
                                <select class="form-control selectpic"  name="network" id="network">
                                    <option selected>Select Any One</option>
                                    <option value="2">GSM</option>
                                    <option value="3">GSM/CDMA</option>
                                    <option value="4">GSM/CDMA + Lite</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Sim Card Format</label>
                            <div class="col-md-10">
                                <select class="form-control selectpic"  name="sim_card_format" id="sim_card_format">
                                    <option selected>Select Any One</option>
                                    <option value="nano">Nano</option>
                                    <option value="mini">Mini</option>
                                    <option value="micro">Micro</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Resolution</label>
                            <div class="col-md-10">
                                <select class="form-control selectpic"  name="resolution" id="resolution">
                                    <option selected>Select Any One</option>
                                    <option value="828 x 1792">828 x 1792</option>
                                    <option value="1125 x 2436">1125 x 2436	</option>
                                    <option value="1242 x 2688">1242 x 2688	</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Double Sim</label>
                            <div class="col-md-10">
                                <select class="form-control selectpic"  name="double_sim" id="double_sim">
                                    <option selected>Select Any One</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>

                                </select>
                            </div>
                        </div> -->
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Release Year</label>
                            <div class="col-md-10">
                                <input class="form-control"  name="release_year" type="date" placeholder="Enter mobile release year"  @if(old('release_year')) value="{{ old('release_year') }}" @endif  id="example-text-input">
                                <span class="text-danger">{{ $errors->first('release_year') }}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Phone Service Provider</label>
                            <div class="col-md-10">
                                <div data-test="carrier-filters" class="_37xvF8QgM_NvGXx3HcYuJ2">
                                    <div class="a-cell row" data-v-2b8789a2="">
                                      <div class="a-cell xs-12 md-9 _114juaGTKcgQcFQKoPzirv" data-v-2b8789a2="">
                                            @forelse (CityClass::phoneServices() as $phoneservice)
                                                <label data-qa="0  AT&amp;T-checkbox-label" data-test="checkbox-AT&amp;T" class="_2dZyu6FGSL9sjsXTxboSwL _3FFHvPz39UA03ZA4Mv13pX" data-v-2b8789a2="">
                                                    <input  name="phone_service[]" type="checkbox" class="_2X8Raljpwo5umcD_HYzefT" value="{{$phoneservice->id}}">
                                                    <span data-test="checkbox-span" class="_2Q2hhB3NvM2sAldZj6fGXU"></span>
                                                    <span class="L5UAN0lD0YKf94yOvozYH">
                                                    <div class="_2QOueHT- HWdZT4KgOk8JhBI9OzX9g">
                                                        <img src="{{asset('storage/service/'.$phoneservice->image)}}" alt="AT&amp;T" loading="lazy" class="wrAXteFB">
                                                    </div>
                                                    </span>
                                                </label>
                                                @empty

                                            @endforelse


                                      </div>

                                    </div>
                                  </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Desciption</label>
                        <div class="col-md-10">
                            <textarea class="form-control"  name="desc" type="text" placeholder="Write Something about mobile"  cols="20" rows="5"></textarea>

                            <span class="text-danger">{{ $errors->first('price') }}</span>
                        </div>
                        </div>
                    </div>
                        <div class="tab" id="moreAdd">Color and Image

                            <div class="form-group row" id="field_wrapper2">
                                  <input type="hidden" name="product_id"  id="product_id" value="product_id">
                                <div class="col-md-12">
                                    <div class="col-md-12" style="text-align: right">
                                        {{-- <input type="submit" name="loginBtn" id="loginBtn" value="Login" /> --}}

                                        {{-- <input type="button" name="save" class="btn btn-primary" value="Save to database" id="butsave"> --}}
                                        <button type="button" id="NextSubmitBtn" class="btn btn-primary">Add More Color</button>
                                        <a href="{{url('admin/product/create')}}" id="backBtn" class="btn btn-warning">Back</a>
                                        <button type="button" id="SubmitBtnColor" class="btn btn-success"  style="display:none">Add More & More Color</button>
                                        </div>
                                    <div class="row">

                                        <div class="col-md-6">
                                        <label for="example-text-input" class=" col-form-label">Color Name</label>
                                        <input class="form-control"  name="color_name[]" type="text" placeholder="Enter mobile color name"  @if(old('color_name')) value="{{ old('color_name') }}" @endif  id="example-text-input">
                                        <span class="text-danger">{{ $errors->first('color_name') }}</span>

                                    </div>
                                    <div class="col-md-6">
                                        <label for="example-text-input" class="col-form-label">Image</label>
                                        <input class="form-control" name="image[]"  multiple type="file"   @if(old('image'))  @endif  id="image-input">
                                        <span class="text-danger">{{ $errors->first('image') }}</span>

                                    </div>
    {{--
                                    <div class="col-md-2" style="text-align: center;">
                                        <a href="javascript:void(0)" class="btn btn-success" style="margin-top: 36px;" id="add_button2"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add</a>
                                    </div> --}}
                                </div>
                                <hr>

                                <div class="addstorage" id="addstorage">
                                    <div class="add_storage">
                                        <input type="hidden" id="addMoreStorages" name="addMoreStorage0" value="0">
                                    <div class="row">
                                    <div class="input-group" >


                                    <div class="col-md-8">
                                        <label for="example-text-input" class="col-form-label">Storage</label>
                                        <select class="form-control" name="storage[0][]" >
                                            <option selected>Select Memory</option>
                                            @foreach(CityClass::Storages() as $store)
                                            <option value="{{$store->storage}}">{{$store->storage}}</option>
                                            @endforeach

                                        </select>

                                        </div>
                                        <div class="col-md-4" style="text-align: center;">
                                            <a href="javascript:void(0)" class="btn btn-info addMoreStorage" style="margin-top: 36px;"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add Storage # 0</a>
                                        </div>

                                    </div>
                                </div>


                            <hr>
                                <div class="add_condition ">
                                 <input type="hidden" value="0">
                                    <div class="row" id="add_condition0">
                                    <div class="input-group">

                                    <div class="col-md-3" id="conditionPart">
                                        <label for="example-text-input" class="col-form-label">Condition</label>
                                        <select class="form-control"  name="condition[0][]" id="condition0">
                                                <option value="0" selected>Select Any One</option>
                                                <option value="fair">fair</option>
                                                <option value="good">good</option>
                                                <option value="excellent">excellent</option>

                                            </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="example-text-input" class="col-form-label">Original Price</label>
                                        <input class="form-control"  name="orig_price[0][]" type="number" placeholder="Enter mobile Price"  @if(old('orig_price')) value="{{ old('orig_price') }}" @endif  id="example-text-input">
                                        <span class="text-danger">{{ $errors->first('orig_price') }}</span>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="example-text-input" class="col-form-label">Price</label>
                                        <input class="form-control"  name="price[0][]" type="number" placeholder="Enter mobile Price"  @if(old('price')) value="{{ old('price') }}" @endif  id="example-text-input">
                                        <span class="text-danger">{{ $errors->first('price') }}</span>
                                    </div>
                                <input type="hidden" name="addMoreCondition0" value="0" id="addMoreCondition0">

                                    <div class="col-md-2">
                                        <label for="example-text-input" class="col-form-label">Quantity</label>
                                        <input class="form-control"  name="quantity[0][]" type="number" placeholder="Enter mobile Quantity"  @if(old('quantity')) value="{{ old('quantity') }}" @endif  id="example-text-input">
                                        <span class="text-danger">{{ $errors->first('quantity') }}</span>
                                    </div>
                                    <div class="col-md-3" style="text-align: center;" id="conditionButton">
                                        <a href="javascript:void(0)" class="btn btn-success addMoreCondition" style="margin-top: 36px;" ><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add Condition # 1</a>
                                    </div>
                                    </div>
                                </div>


                                    </div>


                                <hr>
                            </div>
                        </div>

                            </div>
                        </div>
                          </div>
                        </div>
                          </div>
                        <div style="overflow:auto;">
                            <div style="float:right;">
                            <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>

                            <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>


                            </div>
                        </div>
                        <!-- Circles which indicates the steps of the form: -->
                        <div style="text-align:center;margin-top:40px;">
                            <span class="step"></span>
                            {{-- <span class="step"></span> --}}
                            {{-- <span class="step"></span> --}}
                            <span class="step"></span>
                        </div>
            </form>
            </div>
        </div>
    </div> <!-- end col -->

    </div>


@endsection
 @section('script')



{{-- nested add field storage --}}
<script type="text/javascript">
	var conditionType = '';
			function productType(type){
				console.log(type.value);
				if(type.value == 'new'){
					 conditionType = type.value;
					$('#conditionPart').hide();
					$('#conditionButton').hide();
					$('.addStorage').html('');
					$('.addCondition').html('');
				}else{
					conditionType = type.value;
					$('#conditionPart').show();
					$('#conditionButton').show();
					$('.addStorage').html('');
					$('.addCondition').html('');
				}
			}

    $(document).ready(function(){
        //group add limit
        // var maxField2 = 4; //Input fields increment limitation
        var addButton2 = $('#add_button2'); //Add button selector
        var wrapper2 = $('#field_wrapper2');
        //Input field wrapper
         var x=0;
         var y=0;
         var z=0;
         var conID = 0;
         var conditionUp = 0;


    $(document).on('click','.addMoreStorage',function(e){
		// alert(product);

        var storageid= $(e.target).closest('.add_storage').children()[0].value;
        console.log(storageid);
        var  maxField=6;
        conID = 0;
                // alert(childern);
			if(storageid < maxField){
                storageid++;
                y = storageid;
                conditionUp ++;

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
            //   var buttonData= '';
            //         if(conditionType == 'old'){
            //            contentData='<div class="col-md-3" style="text-align:center"> '+
            //                               ' <a href="javascript:void(0)" class="btn btn-warning addMoreCondition" style="margin-top: 36px;"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add Condition # '+y+'</a>'+
            //                           ' </div>';
            //           }
                      

                // alert(childern);
				var fieldHTML = '<div class="add_storage addStorage"><div class="row " id="add_storage'+y+'"><div class="input-group">'+
                                        '<div class="col-md-8">'+
                                        '<label for="example-text-input" class="col-form-label">Storage</label>'+
                                        '<select class="form-control" name="storage[0][]" >'+
                                            '<option selected>Select Memory</option>'+
                                             ' @foreach(CityClass::Storages() as $store)'+
                                      '<option value="{{$store->storage}}">{{$store->storage}}</option>'+
                                            '@endforeach'+
                                        '</select>'+

                                        '</div>'+
                                        '<div class="col-md-4" style="text-align: center;"> '+
                                        '  <a href="javascript:void(0)" class="btn btn-danger remove_storage" style="margin-top: 36px;" id="add_button2"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Remove Storage # '+y+'</a>'+
                                        ' </div>'+

                                        '<div class="add_condition addCondition"><input type="hidden" value="'+conditionUp+'">'+
                                          '<div class="row" id="add_condition'+y+'">'+
                                           '<div class="input-group">'+
                                          contentData+
                                      ' <div class="col-md-2">'+
                                          ' <label for="example-text-input" class="col-form-label">Orignal Price</label>'+
                                          ' <input class="form-control"  name="orig_price['+y+'][]" type="number" placeholder="Enter mobile orig_price"  @if(old('orig_price')) value="{{ old('orig_price') }}" @endif  id="example-text-input">'+
                                          ' <span class="text-danger">{{ $errors->first('orig_price') }}</span>'+
                                      ' </div>'+
                                      ' <div class="col-md-2">'+
                                          ' <label for="example-text-input" class="col-form-label">Price</label>'+
                                          ' <input class="form-control"  name="price['+y+'][]" type="number" placeholder="Enter mobile Price"  @if(old('price')) value="{{ old('price') }}" @endif  id="example-text-input">'+
                                          ' <span class="text-danger">{{ $errors->first('price') }}</span>'+
                                      ' </div>'+
                                      '<div class="col-md-2">'+
                                          ' <label for="example-text-input" class="col-form-label">Quantity</label>'+
                                          ' <input class="form-control"  name="quantity['+y+'][]" type="number" placeholder="Enter mobile Quantity"  @if(old('quantity')) value="{{ old('quantity') }}" @endif  id="example-text-input">'+
                                         '  <span class="text-danger">{{ $errors->first('quantity') }}</span>'+
                                      ' </div>'+
                                       '<div class="col-md-3" style="text-align:center"> '+
                                          ' <a href="javascript:void(0)" class="btn btn-warning addMoreCondition" style="margin-top: 36px;"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add Condition # '+y+'</a>'+
                                      ' </div>'+
                                      ' </div>'+
                                      ' </div>'+
                                      ' </div>'+
                                       '</div>';
				//$('#field_wrapper_size'+z).append(fieldHTML); //Add field html
				$('#addstorage').append(fieldHTML);

                $(e.target).closest('.add_storage').children()[0].value = storageid;
			}
	});

     $(document).on('click', '.remove_storage', function(e){

            e.preventDefault();
         console.log($(this).parents('.removeStorage'));
         var storageid= $('#addMoreStorages').val();
         console.log(storageid);
        storageid--;
        $('#addMoreStorages').val(storageid);
        console.log($('#addMoreStorages').val());
         $(this).parents('.add_storage').remove(); //Remove field html

        });


//    condition section

    $(document).on('click','.addMoreCondition',function(e){
		// alert(product);



        var conditionid= $(e.target).closest('.add_condition').children()[0].value;
         console.log(conditionid);
        var  maxField=6;
		// var childern =	$(e.target).closest('.add_condition').find('#'+storeindex).children().length;
        //   alert(storeindex);
			if(conditionid < maxField ){

                
                conID = conditionid;
                conID++;
                // alert(childern);

              var contentData= '';
                    if(conditionType == 'old'){
                       contentData= ' <div class="col-md-3">'+
                                       ' <label for="example-text-input" class="col-form-label">Condition</label>'+
                                       ' <select class="form-control"  name="condition['+conditionid+'][]" id="condition">'+
                                              '  <option selected>Select Any One</option>'+
                                              '  <option value="fair">fair</option>'+
                                              '  <option value="good">good</option>'+
                                              '  <option value="excellent">excellent</option>'+
                                           ' </select> '+
                                   ' </div>';
                      }

				var fieldHTML = '<div class="row remove_condition addCondition" id="add_condition'+conditionid+'"><div class="input-group">'+
                                      contentData+
                                       ' <div class="col-md-2">'+
                                           ' <label for="example-text-input" class="col-form-label">Orignal Price</label>'+
                                           ' <input class="form-control"  name="orig_price['+conditionid+'][]" type="number" placeholder="Enter mobile orig_price"  @if(old('orig_price')) value="{{ old('orig_price') }}" @endif  id="example-text-input">'+
                                           ' <span class="text-danger">{{ $errors->first('orig_price') }}</span>'+
                                       ' </div>'+
                                       ' <div class="col-md-2">'+
                                           ' <label for="example-text-input" class="col-form-label">Price</label>'+
                                           ' <input class="form-control"  name="price['+conditionid+'][]" type="number" placeholder="Enter mobile Price"  @if(old('price')) value="{{ old('price') }}" @endif  id="example-text-input">'+
                                           ' <span class="text-danger">{{ $errors->first('price') }}</span>'+
                                       ' </div>'+
                                       '<div class="col-md-2">'+
                                           ' <label for="example-text-input" class="col-form-label">Quantity</label>'+
                                           ' <input class="form-control"  name="quantity['+conditionid+'][]" type="number" placeholder="Enter mobile Quantity"  @if(old('quantity')) value="{{ old('quantity') }}" @endif  id="example-text-input">'+
                                          '  <span class="text-danger">{{ $errors->first('quantity') }}</span>'+
                                       ' </div>'+
                                        '<div  class="col-md-3" style="text-align:center"> '+
                                           ' <a href="javascript:void(0)" class="btn btn-secondary removeCondition" style="margin-top: 36px;"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Remove Condition#'+conID+'</a>'+
                                       ' </div>'+
                                        '</div>'+
                                        '</div>';
				//$('#field_wrapper_size'+z).append(fieldHTML); //Add field html
                console.log((e.target).closest('.row'));
				$(e.target).closest('.add_condition').append(fieldHTML);
                $(e.target).closest('.add_condition').children()[0].value = conditionid;
			}
	});


     $(document).on('click', '.removeCondition', function(e){
            e.preventDefault();
            // console.log((e.target).closest('.add_condition').children()[0]);
         var conditionid =$(this).parents('.add_condition').children()[0].value;
         console.log(conditionid);
         conditionid--;

        $(this).parents('.add_condition').children()[0].value = conditionid
        console.log($(this).parents('.add_condition').children()[0].value);

         $(this).parents('.remove_condition').remove(); //Remove field html
        //  conID--; //Decrement field counter
        });




});

    </script>

<script>
    $(document).ready(function(){
        $("#NextSubmitBtn").click(function(event){
            event.preventDefault();


            var formData = new FormData(this.form);
                let TotalImages = $('#image-input')[0].files.length; //Total Images
                let images = $('#image-input')[0];
                for (let i = 0; i < TotalImages; i++) {
                formData.append('images', images.files[i]);
                }
                formData.append('TotalImages', TotalImages);


            $.ajax({
            type: "POST",
            url: "{{url('admin/store-product')}}",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: formData,
            processData: false,
            contentType: false,
            success: function(response)
            {
                  console.log(response);

                    $("#regForm")[0].reset();

                  $("#product_id").val(response.id);
                  $("#SubmitBtnColor").show();
                  $("#NextSubmitBtn").hide();
                  $("#prevBtn").hide();
                  $("#nextBtn").hide();
                //   alert('asdsa');
            }
       });
        });
    });


      $(document).ready(function(){
        $("#SubmitBtnColor").click(function(event){
            event.preventDefault();

              var formData = new FormData(this.form);
                let TotalImages = $('#image-input')[0].files.length; //Total Images
                let images = $('#image-input')[0];
                for (let i = 0; i < TotalImages; i++) {
                formData.append('images', images.files[i]);
                }
                formData.append('TotalImages', TotalImages);

            $.ajax({
            type: "POST",
            url: "{{url('admin/store-more-product')}}",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: formData,
            processData: false,
            contentType: false,
            success: function(response)
            {
                  console.log(response);
                  $("#regForm")[0].reset();
                  $("#product_id").val(response);
                  $("#SubmitBtnColor").show();
                  $("#NextSubmitBtn").hide();
                  $("#prevBtn").hide();
                  $("#nextBtn").hide();
                  alert('Successfully Added Products...');

                //   alert('asdsa');
            }
       });
        });
    });
    </script>


<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(150);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>


 <script type="text/javascript">
    $(function() {
  $('.selectpic').select2();
});

function getModel(event)
{


    var brand = $(event).val().split(',');
    var id = brand[0];


    $('#model-repair').hide();
    //    var id =$(event).val();
  $.ajax({
        url: "{{url('admin/product/getModels')}}/"+id,
        type:"get",
        success:function(response){
          console.log(response);
          $('#showModels').html(response);
          $('#exampleModal'+id).modal('show');
        },

       });

}


</script>




  <script>
  var currentTab = 0; // Current tab is set to be the first tab (0)
  showTab(currentTab); // Display the current tab

  function showTab(n) {
    // This function will display the specified tab of the form...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    //... and fix the Previous/Next buttons:
    if (n == 0) {
      document.getElementById("prevBtn").style.display = "none";
      document.getElementById("NextSubmitBtn").style.display = "none";
    } else {
      document.getElementById("prevBtn").style.display = "inline";
      document.getElementById("NextSubmitBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
      document.getElementById("nextBtn").innerHTML = "Submit";
    }
     else {
      document.getElementById("nextBtn").innerHTML = "Next";
    }
    //... and run a function that will display the correct step indicator:
    fixStepIndicator(n)
  }

  function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    // if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form...
    if (currentTab >= x.length) {
      // ... the form gets submitted:
      document.getElementById("regForm").submit();
      return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
  }

  function validateForm() {
    // This function deals with validation of the form fields
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
      // If a field is empty...
      console.log(y[i].name);
      if (y[i].value == "") {
        // add an "invalid" class to the field:
        y[i].className += " invalid";
        // and set the current valid status to false
        valid = false;
      }
    }
    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
      document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid; // return the valid status
  }

  function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
      x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class on the current step:
    x[n].className += " active";
  }
  </script>


@endsection

