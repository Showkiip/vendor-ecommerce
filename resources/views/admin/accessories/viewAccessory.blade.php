
<div class="table-responsive">
    <table class="table table-centered table-nowrap">
        <thead>
            <tr>
            <th>images</th>
            <th>description</th>
            </tr>
        </thead>
        <tbody  style="display: flex">

            @foreach ($images as $img)
            <tr>

                <td> <img src="{{  asset('/storage/accessories/images/'.$img->images)}} " width="60px" height="60px">  </td>

               </tr>
            @endforeach

            <td>{{ $accessory->description }}</td>

        </tbody>
    </table>
</div>
