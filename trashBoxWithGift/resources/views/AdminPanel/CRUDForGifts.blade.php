@extends('layouts.admin')

@section('content')
    <div class="giftsPanel" id="divId">
    <!-- <button type="button" class="btn btn-success btn-circle btn-lg sticky-bottom">
        <i class="glyphicon glyphicon-link"></i>
    </button> -->
        <div class="row">
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
                            <button type="button" class="btn btn-primary" id="updBt" onclick="updateModelFunc({{$gift}})" data-toggle="modal" data-target="#updateModal">Update</button>
                            <button type="button" class="btn btn-danger" onclick="deleteGift('{{$gift->id}}', '{{$gift->name}}')">Delete</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="dropdown-menu dropdown-menu-sm" id="context-menu">
          <a class="dropdown-item" href="#">Add new Gift</a>
        </div>

        <div class="modal fade" id="updateModal" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update gift</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {!! Form::open(array('route' => '/admin/gifts/updateGift', 'method' => 'post')) !!}
                        <div class="modal-body">
                            <div class="custom-file">
                                {!! Form::label('image', 'Choose file...', ['class' => 'custom-file-label', 'id' => 'fileInputLbl']) !!}
                                {!! Form::file('image', ['class' => 'custom-file-input', 'id' => 'imagePath', 'onchange' => 'changeLbl(this)'], 'asset({{$gift->imagePath}})') !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('name', 'Name: ') !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'giftName']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('description', 'Description: ') !!}
                                {!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'giftDescription']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('price', 'Price: ') !!}
                                {!! Form::number('price', null, ['class' => 'form-control', 'id' =>'giftPrice']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('count', 'Count: ') !!}
                                {!! Form::number('count', null, ['class' => 'form-control', 'id' => 'giftCount']) !!}
                            </div>
                        </div>
                        <div class="modal-footer">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
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

        function updateModelFunc(gift) {
            obj = document.getElementById('imagePath');
            console.log(obj);
            // obj.setAttribute("value", gift.imagePath);
            // changeLbl(obj);
            document.getElementById('giftName').value = gift.name;
            document.getElementById('giftDescription').value = gift.description;
            document.getElementById('giftPrice').value = gift.price;
            document.getElementById('giftCount').value = gift.count;
        }

        function changeLbl(obj) {
            document.getElementById('fileInputLbl').innerText = obj.value.substr(obj.value.lastIndexOf('\\') + 1);
        }

        $('#divId').on('contextmenu', function(e) {
            var top = e.pageY;
            var left = e.pageX;
            $("#context-menu").css({
                display: "block",
                top: top,
                left: left
            }).addClass("show");
                return false;
            }).on("click", function() {
                $("#context-menu").removeClass("show").hide();
            });

            $("#context-menu a").on("click", function() {
                $(this).parent().removeClass("show").hide();
        });
    </script>
@endsection
