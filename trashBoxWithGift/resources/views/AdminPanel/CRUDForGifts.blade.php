@extends('layouts.admin')

@section('content')
    <div class="giftsPanel">
        <div class="row">
            @foreach ($gifts as $gift)
                <div class="col-lg-3 col-sm-4 col-xl-2 col-md-3" style="padding: 5px">
                    <div class="giftItem">
                        <img src="{{asset($gift->imagePath)}}">
                        <h3>{{$gift->name}}</h3>
                        <pre>{{$gift->description}}</pre>
                        <div>
                            <div>
                                <label><b>Price: </b></label>
                                <label>{{$gift->price}}</label>
                            </div>
                            <div>
                                <label><b>Count: </b></label>
                                <label>{{$gift->count}}</label>
                            </div>
                        </div>
                        <div>
                            <button>Update</button>
                            <button>Delete</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
