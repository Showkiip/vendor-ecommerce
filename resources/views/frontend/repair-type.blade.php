          @foreach($RepairTypes as $type)
          <input type="hidden" name="model_Id" form="repairType" value="{{$type->model_Id}}">
          <div>
            <div class="fade-on-mount normal-elemnt-active">
              <div class="col-md-6 repair">
              <div class="multiple-answer-component-wrapper" id="col{{$type->id}}">
                <label class="custom_check" onchange="custom_check('{{$type->id}}','{{$type->repair_type}}','{{$type->price}}')">
                <img src="{{asset('frontend-assets/images/repair/'.$type->repair_image)}}" class="image">
                  <div class="selection-inidicator" style="display:none">
                    <input type="checkbox" form="repairType" id="check{{$type->id}}" name="repair_type[]" value="{{$type->id}}" >
                    <span class="checkmark"></span>
                  </div>
                  <div class="answer-content">{{$type->repair_type}}<span class="price"> (${{$type->price}})</span></div>
                </label>
              </div>
              </div>
            
            </div>
          </div>

 @endforeach
