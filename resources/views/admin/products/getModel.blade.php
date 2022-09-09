
<label for="example-text-input" class="col-md-2 col-form-label">Models</label>
<div class="col-md-10">
<select class="form-control selectpic" name="model_id" required="" >
    <option value="null" selected="">Select Model</option>
    @foreach($pmodels as $model)
     <option value="{{$model->id}}">{{$model->model_name}}</option>
    @endforeach
</select>
</div>


<script>
       $(function() {
  $('.selectpic').select2();
});

</script>
