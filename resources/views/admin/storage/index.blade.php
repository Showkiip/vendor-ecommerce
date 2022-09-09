@extends('admin.layouts.master')

@section('title') Product Storage @endsection

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
                <form action="{{url('admin/productStorage-store')}}"  method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                        <h1>Product Storage</h1>
                        <!-- One "tab" for each step in the form: -->

                         <div class="tab" id="moreAdd">

                            <div class="form-group row" id="field_wrapper2">
                                <div class="col-md-12">
                            @foreach ($colors as  $color)

                            <span class=""><b><h2>{{$color->color_name}}</h2></b></span>
                            @php
                            $storages = $color->productStorage;
                            @endphp
                              <div class="addstorage" id="addstorage">

                              @foreach ($storages as $storage)
                              <div class="add_storage">
                                    <div id="add_storage{{ $color->id }}">
                                    <div class="row">
                                    <div class="input-group">
                                    <div class="col-md-8">
                                        <label for="example-text-input" class="col-form-label">Storage</label>
                                        <select class="form-control" name="storage[0][]" >
                                            <option selected>Select Memory</option>
                                            <option value="256 GB" {{ $storage->storage == "256 GB" ? 'selected' : ''}}>256 GB</option>
                                            <option value="128 GB"{{ $storage->storage == "128 GB" ? 'selected' : ''}}>128 GB</option>

                                            <option value="64 GB"{{ $storage->storage == "64 GB" ? 'selected' : ''}}>64 GB</option>
                                            <option value="32 GB"{{ $storage->storage == "32 GB" ? 'selected' : ''}}>32 GB</option>
                                            <option value="16 GB"{{ $storage->storage == "16 GB" ? 'selected' : ''}}>16 GB</option>
                                            <option value="8 GB"{{ $storage->storage == "8 GB" ? 'selected' : ''}}>8 GB</option>

                                        </select>

                                        </div>
                                        <div class="col-md-4" style="text-align: center;">
                                            @if($loop->index+1 == 1)
                                            <a href="javascript:void(0)" class="btn btn-info addMoreStorage" style="margin-top: 36px;"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add Storage # 1</a>
                                            <a href="{{url('admin/productStorage-delete',$storage->id)}}" class="btn btn-danger " style="margin-top: 36px;"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Remove</a>
                                        @else

                                       <a href="{{url('admin/productStorage-delete',$storage->id)}}" class="btn btn-secondary " style="margin-top: 36px;"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Remove Condition</a>
                                       @endif

                                        </div>

                                    </div>
                                </div>
                            </div>



                        </div>
                         @endforeach
                         <hr>

                    </div>
                      @endforeach

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


{{-- nested add field storage --}}
<script type="text/javascript">

$(document).ready(function(){
        //group add limit
        var maxField2 = 4; //Input fields increment limitation
        var addButton2 = $('#add_button2'); //Add button selector
        var wrapper2 = $('#field_wrapper2');
        //Input field wrapper
         var x=0;
         var y=0;
         var z=0;

    $(document).on('click','.addMoreStorage',function(e){
		// alert(product);
      y++;
        console.log($(e.target).closest('.add_storage').children()[0]);

      var storageid= $(e.target).closest('.add_storage').children()[0].id;
       console.log(storageid);

      var storageindex  = storageid.slice(11,12);
      console.log(storageindex);
        var  maxField=3;
// x++;
		var childern =	$(e.target).find('#'+storageindex).children().length;
            //  alert(childern);
			if(y < maxField){
                // alert(childern);
				var fieldHTML = '<div class="add_storage"> <div class="row" id="add_storage'+y+'"><div class="input-group">'+
                                        '<div class="col-md-8">'+
                                        '<label for="example-text-input" class="col-form-label">Storage</label>'+
                                        '<select class="form-control" name="storage[0][]" >'+
                                            '<option selected>Select Memory</option>'+
                                            '<option value="256 GB">256 GB</option>'+
                                            '<option value="128 GB">128 GB</option>'+
                                            '<option value="64 GB">64 GB</option>'+
                                            '<option value="32 GB">32 GB</option>'+
                                            '<option value="16 GB">16 GB</option>'+
                                            '<option value="8 GB">8 GB</option>'+
                                        '</select>'+

                                        '</div>'+
                                        '<div class="col-md-4" style="text-align: center;"> '+
                                        '  <a href="javascript:void(0)" class="btn btn-danger remove_storage" style="margin-top: 36px;" id="add_button2"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Remove Storage # '+storageindex+'</a>'+
                                        ' </div>'+

                                      ' </div>'+
                                      ' </div>'+
                                       '</div>';
				//$('#field_wrapper_size'+z).append(fieldHTML); //Add field html
				$('#addstorage').append(fieldHTML);
			}
	});

     $(document).on('click', '.remove_storage', function(e){

            e.preventDefault();
         console.log($(this).parents('.removeStorage'));

         $(this).parents('.add_storage').remove(); //Remove field html
            y--; //Decrement field counter
        });
    });
</script>


@endsection

