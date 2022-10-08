@if($data)
<div class="col-12">
    <div class="single" style="text-align: center">
        <div class="row">
            <div class="col-12">
                <div class="profile mt-4">
                    <img src="{{asset('public/Backend/Images')}}/familyMember/{{$data->family_member_image}}" alt="">
                </div>
            </div>
            <div class="col-12 mt-4">
                <span>Registration Id : </span> <b>{{$data->family_member_id}}</b>
            </div>
            <div class="col-3 mt-4">
                <span>Name : </span> <b>{{$data->family_member_name}}</b>
            </div>
            <div class="col-3 mt-4">
                <span>Reference : </span> <b>{{$data->name}}</b>
            </div>
            <div class="col-3 mt-4">
                <span>Last Class : </span> <b>{{$data->last_class}}</b>
            </div>
            <div class="col-3 mt-4">
                <span>Session : </span> <b>{{$data->session}}</b>
            </div>
        </div>
    </div>
</div>
@endif