@extends('layouts.admin')

@section('content')
    <div class="giftsPanel">
        <div class="row ">
            @foreach ($gifts as $gift)
                <div class="col-lg-3 col-sm-4 col-xl-2 col-md-3" style="padding: 5px">
                    <div class="giftItem">
                        <div class="imgCont">
                            <img src="{{asset($gift->imagePath)}}">
                        </div>
                        <h3>{{$gift->name}}</h3>
                        <p>{{$gift->description}}</p>
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
                            <button type="button" class="btn btn-primary">Update</button>
                            <button type="button" class="btn btn-danger" onclick="deleteGift('{{$gift->id}}', '{{$gift->name}}')">Delete</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function deleteGift(id, name) {
            let res = confirm("Do you want to delete gift " + name + '?');

            if (res) {
                let data = new FormData();
                data.append("id", id);

                fetch("/admin/gifts/deleteGift", {
                    body: data,
                    method: 'post',
                    headers: {
                        'Accept': 'application/json'
                    }
                }).then(function (response) {
                    if (response.status == 200) {
                        location.reload();
                    }
                });
            }
        }
    </script>
@endsection
