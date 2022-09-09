
<select id="category_id"  name="category_id" class="_3Iq8JGYZpyTj97wvi5Wyu7 eUlOsp7XbB9G1L8SEMMpU baseselect-field">
    <option selected value="">Select Category ....</option>
    @forelse (CityClass::accessCategory() as $category)
    <option value="{{$category->id}}">{{$category->category}}</option>
    @endforeach
  </select>
  <label data-test="baseselect-label" class="PSXfa64BhcchUXTYm8jxr _2Y-fYnDKPqxkYV__KtgvWD baseselect-label">
    {{-- <span class="_1rmkAs0zRQWqTLR2midRVa baseselect-label-content">Best Selling</span> --}}
  </label>
  <div class="_3CTJYWu3hsWyWna_ZcsF5I">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 443.9 476.5" data-test="baseselect-icon" class="-S5BM_soVHE3yxeKelL2Q _1-GUUYIHoGjHHKudYw6-sr"><path d="M220.2 355.7c-3.1 0-6.1-1.2-8.5-3.5L9.1 149.6c-4.7-4.7-4.7-12.3 0-17 4.7-4.7 12.3-4.7 17 0l194.1 194.1 197-197c4.7-4.7 12.3-4.7 17 0 4.7 4.7 4.7 12.3 0 17L228.7 352.2c-2.4 2.3-5.4 3.5-8.5 3.5z"></path></svg>
  </div>

