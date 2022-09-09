          @foreach($models as $model)

          <div class="col-md-2 col-xs-6">
            <div class="single-answer-component-wrapper model">
              <div class="col-md-2">
              <div class="fade-on-mount normal-elemnt-active">
                <button class="answer-content sized" onclick="getrepairTypes('{{$model->id}}','{{$model->model_name}}')" style=" text-align: center;">
                  <label for="{{$model->model_name}}">{{$model->model_name}}</label></button>
                <!-- <input type="radio" id="{{$model->model_name}}"  name="phone_model" class="hidden"> -->
              </div>
              </div>
            </div>
          </div>

          @endforeach
