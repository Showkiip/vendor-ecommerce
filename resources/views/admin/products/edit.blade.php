@extends('admin.layouts.master')

@section('title') Product @endsection

@section('content')
   @component('admin.common-components.breadcrumb')
         @slot('title') Product Add  @endslot
         @slot('li_1')  @endslot
         @slot('li_2')@endslot
     @endcomponent
                        <div class="row">
                            <div class="col-12">
                                @if(Session::has('message'))
                                <div class="col-12">
                                    {!!Session::get('message')!!}
                                </div>
                                @endif
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{url('admin/product',$product->id)}}" method="post" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            @method('PUT')
                                            {{-- <div class="form-group row">
                                                <label for="example-text-input" class="col-md-2 col-form-label">Image</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" name="image[]" onchange="readURL(this);" type="file" placeholder="Enter Brand Name" multiple  @if(old('image'))  @endif  id="example-text-input">
                                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                                    @foreach ($images as $image)
                                                    <img id="blah" src="{{asset($image->image)}}" alt="your image" width="150px" height="150px"/>
                                                    @endforeach
                                                </div>
                                            </div> --}}
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-md-2 col-form-label">Brands</label>
                                            <div class="col-md-10">
                                                @php
                                                    $model = App\Models\Pmodel::where('id',$product->model_id)->first();
                                                @endphp
                                                <select class="form-control selectpic" name="brand" id="brand" onchange="getModel(this)">
                                                    <option selected="">Select Brand</option>
                                                    @foreach(CityClass::brands() as $brand)
                                                     <option value="{{$brand->id}}"{{ $brand->id == $model->brand_Id  ? 'selected' : '' }}>{{$brand->brand_name}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                        <div class="form-group row" id="showModels">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Models</label>
                                        <div class="col-md-10">
                                            <select class="form-control selectpic" name="model_Id"  required="" onchange="getRepair(this)">
                                                <option selected="">Select Model</option>
                                                <option value="{{ $model->id }}" {{ $model->id == $product->model_id ? 'selected':''}}>{{ $model->model_name }}</option>
                                            </select>
                                        </div>
                                    </div>


                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">memory</label>
                                            <div class="col-md-10">
                                                <select class="form-control selectpic" name="memory" id="memory">
                                                    <option selected="">Select Memory</option>
                                                    <option value="64 GB" {{ $product->memory == '64 GB' ? 'selected':'' }}>64 GB</option>
                                                    <option value="32 GB" {{ $product->memory == '32 GB' ? 'selected':'' }}>32 GB</option>
                                                    <option value="16 GB" {{ $product->memory == '16 GB' ? 'selected':'' }}>16 GB</option>
                                                    <option value="8 GB" {{ $product->memory == '8 GB' ? 'selected':'' }}>8 GB</option>
                                                    <option value="6 GB" {{ $product->memory == '6 GB' ? 'selected':'' }}>6 GB</option>
                                                    <option value="4 GB" {{ $product->memory == '4 GB' ? 'selected':'' }}>4 GB</option>
                                                    <option value="2 GB" {{ $product->memory == '2 GB' ? 'selected':'' }}>2 GB</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Locked Or UnLocked</label>
                                            <div class="col-md-10">
                                                <select class="form-control selectpic" name="locked" id="locked">
                                                    <option selected="">Select Any One</option>
                                                    <option value="Locked" {{ $product->locked == 'Locked' ? 'selected':'' }}>Locked</option>
                                                    <option value="Unlocked" {{ $product->locked == 'Unlocked' ? 'selected':'' }}>UnLocked</option>

                                                </select>
                                            </div>
                                        </div>
                                        <!-- <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Category</label>
                                            <div class="col-md-10">
                                                <select class="form-control selectpic" name="category" id="category">
                                                    <option selected="">Select Any One</option>
                                                    <option value="phone" {{ $product->category == 'phone' ? 'selected':'' }}>Phone</option>
                                                    <option value="accessory" {{ $product->category == 'accessory' ? 'selected':'' }}>Accessory</option>

                                                </select>
                                            </div>
                                        </div> -->
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Type</label>
                                            <div class="col-md-10">
                                                <select class="form-control selectpic" name="type" id="type">
                                                    <option selected="">Select Any One</option>
                                                    <option value="new" {{ $product->type == 'new' ? 'selected':'' }}>New</option>
                                                    <option value="old" {{ $product->type == 'old' ? 'selected':'' }}>Used</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">OS</label>
                                            <div class="col-md-10">
                                                <select class="form-control selectpic" name="OS" id="OS">
                                                    <option selected="">Select Any One</option>
                                                    <option value="andriod phone" {{ $product->OS == 'andriod phone' ? 'selected':'' }}>Andriod Phone</option>
                                                    <option value="window phone" {{ $product->OS == 'window phone' ? 'selected':'' }}>Window Phone</option>
                                                    <option value="apple phone" {{ $product->OS == 'apple phone' ? 'selected':'' }}>Apple Phone</option>
                                                    <option value="all smartphone" {{ $product->OS == 'all smartphone' ? 'selected':'' }}>All Smartphone</option>

                                                </select>
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Warranty</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="warranty" type="text" placeholder="Enter mobile warranty"   value="{{ $product->warranty }}"  id="example-text-input">
                                                <span class="text-danger">{{ $errors->first('warranty') }}</span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">megapixel</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="megapixel" type="text" placeholder="Enter mobile camememoryp"  @if(old('megapixel')) @endif value="{{ $product->megapixel }}" id="example-text-input">
                                                <span class="text-danger">{{ $errors->first('megapixel') }}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">LCD(Display)</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="screen_type" type="text" placeholder="Enter mobile display"  @if(old('display'))  }}" @endif value="{{ $product->screen_type }}" id="example-text-input">
                                                <span class="text-danger">{{ $errors->first('screen_type') }}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Screen Size</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="screen_size" type="text" placeholder="Enter mobile display"  @if(old('display'))  }}" @endif value="{{ $product->screen_size }}" id="example-text-input">
                                                <span class="text-danger">{{ $errors->first('screen_size') }}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Network</label>
                                            <div class="col-md-10">
                                                <select class="form-control selectpic"  name="network" id="network">
                                                    <option selected>Select Any One</option>
                                                    <option value="2" {{ $product->network == '2' ? 'selected':'' }}>GSM</option>
                                                    <option value="3" {{ $product->network == '3' ? 'selected':'' }}>GSM/CDMA</option>
                                                    <option value="4" {{ $product->network == '4' ? 'selected':'' }}>GSM/CDMA + Lite</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Sim Card Format</label>
                                            <div class="col-md-10">
                                                <select class="form-control selectpic"  name="sim_card_format" id="sim_card_format">
                                                    <option selected>Select Any One</option>
                                                    <option value="nano" {{ $product->sim_card_format == 'nano' ? 'selected':'' }}>Nano</option>
                                                    <option value="mini" {{ $product->sim_card_format == 'mini' ? 'selected':'' }}>Mini</option>
                                                    <option value="micro" {{ $product->sim_card_format == 'micro' ? 'selected':'' }}>Micro</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Resolution</label>
                                            <div class="col-md-10">
                                                <select class="form-control selectpic"  name="resolution" id="resolution">
                                                    <option selected>Select Any One</option>
                                                    <option value="828 x 1792" {{ $product->resolution == '828 x 1792' ? 'selected':'' }} >828 x 1792</option>
                                                    <option value="1125 x 2436" {{ $product->resolution == '1125 x 2436' ? 'selected':'' }}>1125 x 2436	</option>
                                                    <option value="1242 x 2688" {{ $product->resolution == '1242 x 2688' ? 'selected':'' }}>1242 x 2688	</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Double Sim</label>
                                            <div class="col-md-10">
                                                <select class="form-control selectpic"  name="double_sim" id="double_sim">
                                                    <option selected>Select Any One</option>
                                                    <option value="Yes" {{ $product->double_sim == 'Yes' ? 'selected':'' }}>Yes</option>
                                                    <option value="No" {{ $product->double_sim == 'No' ? 'selected':'' }}>No</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Release Year</label>
                                            <div class="col-md-10">
                                                <input class="form-control"  name="release_year" type="date" placeholder="Enter mobile release year"   value="{{ $product->release_year}}"   id="example-text-input">
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
                                                                    <input  name="phone_service[]" type="checkbox" class="_2X8Raljpwo5umcD_HYzefT" value="{{$phoneservice->id}}" @if($product->service) @if(in_array($phoneservice->id,$product->service->pluck('id')->toArray())) checked @endif @endif>

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
                                            <label for="example-text-input" class="col-md-2 col-form-label">Description</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" name="desc" type="text" placeholder="Enter Brand Name"  @if(old('desc')) @endif  id="example-text-input">{{ $product->desc }}</textarea>
                                                <span class="text-danger">{{ $errors->first('desc') }}</span>
                                            </div>
                                        </div>


                                        <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                                        <a href="{{url('admin/product-color',$product->id) }}" class="btn btn-success" title="View More">Edit Condition</a>
                                    </div>

                                   </form>

                                    </div>
                                </div>
                            </div> <!-- end col -->

                        </div>
                        <!-- end row -->

                        <!-- end row -->
@endsection
@section('script')

<script type="text/javascript">
    $(function() {
  $('.selectpic').select2();
});

function getModel(event)
{

    // alert($(event).val());
    $("#priceDetails").empty();
    $("#PmodelName").empty();
    $("#totalCost").empty();

    var brand = $(event).val().split(',');
    var id = brand[0];
    var  brandName = brand[1];
    // alert(brand[0]);

    // $('#brand_name').html('<h5>Brand Name :<b>'+brandName+'</b></h5>');
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







// $(function(){
//     var dtToday = new Date();

//     var month = dtToday.getMonth() + 1;
//     var day = dtToday.getDate();
//     var year = dtToday.getFullYear();
//     if(month < 10)
//         month = '0' + month.toString();
//     if(day < 10)
//         day = '0' + day.toString();

//     var maxDate = year + '-' + month + '-' + day;

//     // or instead:
//     // var maxDate = dtToday.toISOString().substr(0, 10);
//     // alert(maxDate);
//     $('#txtDate').attr('min', maxDate);
// });


/// Cart

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
@endsection
