@if($data)
<div class="col-12">
    <div class="single" style="text-align: center">
        <div class="row">
            <div class="col-12">
                <div class="profile mt-4">
                    <img src="{{asset('public/Backend/Images')}}/studentImage/{{$data->image}}" alt="">
                </div>
            </div>
            <div class="col-12 mt-4">
                <span>Registration Id : </span> <b>{{$data->registration_id}}</b>
            </div>
            <div class="col-3 mt-4">
                <span>Name : </span> <b>{{$data->name}}</b>
            </div>
            <div class="col-3 mt-4">
                <span>Total Member : </span> <b>{{$data->total_member}}</b>
            </div>
            <div class="col-3 mt-4">
                <span>Total Ammount : </span> <b>{{$data->total_ammount}}</b>
            </div>
            <div class="col-3 mt-4">
                <span>Status : </span> <b><div class="badge badge-success">Paid</div></b>
            </div>
        </div>
    </div>
</div>
@endif