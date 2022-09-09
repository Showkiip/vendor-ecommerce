


<select class="form-control selectpic" name="model_id" required="" >
    <option value="null" selected="">Select Model</option>
    @foreach($models as $model)
     <option value="{{$model->id}}">{{$model->model_name}}</option>
    @endforeach
</select>



<script>
       $(function() {
  $('.selectpic').select2();
});

</script>
