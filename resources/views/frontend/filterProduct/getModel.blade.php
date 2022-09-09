

@forelse ($models as $model)
<li data-test="facet-item" class="_33pDOgQ80LhcEmJTGXNM3U">

    <input id="{{ $model->id }}" type="checkbox" name="models_name" data-test="facet-{{ $model->brand->brand_name ?? '' }}  {{ $model->model_name ?? ''}}" class="_3wvnh-Qn  getModelId"  value="{{ $model->id }}" onclick="getModels({{ $model->id }})">
     <label for="{{{ $model->id }}}" class="_33K8eTZu">
      <div class="_3S4CObWg">
         <div class="_2OVE0h6V"></div>
         <div class="_3xAYCg9N">
             <svg aria-hidden="true" fill="currentColor" height="20" viewBox="0 0 40 40" width="20" xmlns="http://www.w3.org/2000/svg">
              <path d="M18.43 25a1 1 0 01-.71-.29l-5.84-5.84a1 1 0 010-1.41 1 1 0 0 1 1.42 0l5.13 5.13 8.23-8.24a1 1 0 011.42 0 1 1 0 0 1 0 1.41l-8.95 9a1 1 0 01-.7.24z"></path> <!----></svg>
              </div>
          </div>
              <div class="TRSMTVTh"><span class="_28IelIKC"><span class="_28IelIKC _1LYyf7lOuywpdBWUdNvl1k">
                  {{ ucwords($model->brand->brand_name) ?? '' }}  {{ ucwords($model->model_name) ?? ''}}
              </span>
              </span>
          </div> <!----> <!---->
      </label>

</li>
@empty
    Oop no Brand Model Yet!
@endforelse

