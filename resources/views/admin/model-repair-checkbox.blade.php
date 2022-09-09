

 <input type="hidden" name="pmodelName" id="pmodelName" value="{{$model->model_name}}">
@forelse ($RepairTypes as $repair)
<div class="col-md-10">
    <div class="">
    <label class="custom_check" onchange="custom_check('{{$repair->id}}','{{$repair->repair_type}}','{{$repair->price}}')">

         {{-- <input class="" name="repair_type[]" type="checkbox" value="{{$repair->id}}" id="{{$repair->id}}"> --}}
         <input type="checkbox" id="check{{$repair->id}}" name="repair_type[]" value="{{$repair->id}}">
         <label class="form-check-label" for="{{$repair->id}}">
            {{$repair->repair_type}} {{$repair->price}}
        </label>

    </label>

    </div>
</div>

@empty
<span>Oops No Repair Product Available !</span>
@endforelse

