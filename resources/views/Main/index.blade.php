@extends((( Request::ajax()) ? 'layouts.ajax' : 'layouts.default' ))
@section('content')
<div class="page-content page-container" id="page-content" dir="{{sizeof($data['users'])}}">
    <div class="padding">
        <div class="row">
            <div class="col-sm-6">

                <div class="list list-row block">
                    @foreach($data['users'] as $user)
                    <div class="list-item" data-id="{{$user['id']}}">
                        <div><a href="#" data-abc="true"><span class="w-48 avatar gd-warning">
                                    @if($user['photo'] == 'photo.jpg')
                                        {{$user['name'][0]}}
                                    @else
                                        <img src="{{$user['photo']}}" alt="{{$user['name'][0]}}">
                                    @endif
                                </span></a></div>
                        <div class="flex">
                            <a href="#" class="item-author text-color" data-abc="true">{{$user['name']}}</a>
                            <div class="item-except text-muted text-sm h-1x">Phone: {{$user['phone']}} Position_id: {{$user['position_id']}} Position: {{$user['position']}}</div>
                        </div>
                        <div class="no-wrap">
                            <div class="item-date text-muted text-sm d-none d-md-block">{{$user['email']}}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <button onclick="morePagination()">MORE</button>
            </div>

        </div>
    </div>
</div>
@endsection
