@if($type == 'family')
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Registration ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Download</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$data->family_member_id}}</td>
            <td>{{$data->family_member_name}}</td>
            <td>
                <img src="{{asset('public/Backend/images')}}/FamilyMember/{{$data->family_member_image}}" alt="" class="img-fluid" style="height: 80px;width:80px;">
            </td>
            <td>
                <a href="{{asset('public/Backend/images')}}/FamilyMember/{{$data->family_member_image}}" class="btn btn-info btn-sm" download="{{$data->family_member_id}}.jpg">Download</a>
            </td>
        </tr>
    </tbody>
</table>
@else
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Registration ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Download</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$data->registration_id}}</td>
            <td>{{$data->name}}</td>
            <td>
                <img src="{{asset('public/Backend/images')}}/StudentImage/{{$data->image}}" alt="" class="img-fluid" style="height: 80px;width:80px;">
            </td>
            <td>
                <a href="{{asset('public/Backend/images')}}/StudentImage/{{$data->image}}" class="btn btn-info btn-sm" download="{{$data->registration_id}}.jpg">Download</a>
            </td>
        </tr>
    </tbody>
</table>
@endif