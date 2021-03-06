@extends('layouts.admin')

@section('content')
    <div class="giftsPanel">
        <button type="button" class="btn btn-success btn-circle btn-lg insBtn" data-toggle="modal" data-target="#updateModal" onclick="newGift()">
            +
        </button>
        <div class="row">
            @foreach ($gifts as $gift)
                <div class="col-lg-3 col-sm-4 col-xl-2 col-md-3" style="padding: 5px">
                    <div class="giftItem">
                        <div class="imgCont">
                            <img src="{{$gift["imagePath"]}}">
                        </div>
                        <h3>{{$gift["name"]}}</h3>
                        <p>{{$gift["description"]}}</p>
                        <div>
                            <div>
                                <label><b>Price: </b></label>
                                <label>{{$gift["price"]}}</label>
                            </div>
                            <div>
                                <label><b>Count: </b></label>
                                <label>{{$gift["count"]}}</label>
                            </div>
                        </div>
                        <div>
                        <button type="button" class="btn btn-primary" id="updBt" onclick="updateModelFunc('{{$gift['id']}}', '{{$gift['name']}}', '{{$gift['description']}}', '{{$gift['imagePath']}}', '{{$gift['price']}}', '{{$gift['count']}}')" data-toggle="modal" data-target="#updateModal">Update</button>
                            <button type="button" class="btn btn-danger btn-confirm" data-id="{{$gift["id"]}}" data-name="{{$gift["name"]}}">Delete</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="mi-modal">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header contMod">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title titMod" id="myModalLabel"></h4>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-primary" id="modal-btn-yes">Yes</button>
                         <button type="button" class="btn btn-default" id="modal-btn-no">No</button>
                     </div>
                 </div>
             </div>
        </div>
        {{-- <div class="dropdown-menu dropdown-menu-sm" id="context-menu">
          <a class="dropdown-item" href="#">Add new Gift</a>
        </div> --}}

        <div class="modal fade" id="updateModal" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update gift</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {!! Form::open(array('url' => '/admin/gifts/updateAddGift', 'method' => 'post', 'enctype' => 'multipart/form-data', 'id' => 'form')) !!}
                        <div class="modal-body">
                            <div class="imgContChangePic">
                                <img id='image'>
                            </div>
                            <div class="custom-file">
                                {!! Form::label('image', 'Choose file...', ['class' => 'custom-file-label', 'id' => 'fileInputLbl']) !!}
                                {!! Form::file('imagePath', ['class' => 'custom-file-input', 'id' => 'imagePathId', 'onchange' => 'changeLbl(this)']) !!}
                                <span id="spanHint">(If you do not select an image, it will be taken by default)</span>
                            </div>
                            <hr>
                            <div class="form-group">
                                {!! Form::label('name', 'Name: ') !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'giftName', 'required' => 'true']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('description', 'Description: ') !!}
                                {!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'giftDescription', 'required' => 'true']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('price', 'Price: ') !!}
                                {!! Form::number('price', null, ['class' => 'form-control', 'id' =>'giftPrice', 'required' => 'true', 'min' => 1, 'max' => 100]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('count', 'Count: ') !!}
                                {!! Form::number('count', null, ['class' => 'form-control', 'id' => 'giftCount', 'required' => 'true', 'min' => 1, 'max' => 10]) !!}
                            </div>
                        </div>
                        <div class="modal-footer">
                            {!! Form::hidden('id', null, ['id' => 'giftId']) !!}
                            {!! Form::submit('Update', ['class' => 'btn btn-primary', 'name' => 'submitButton', 'id' => 'submitBtnUpdate', 'value' => 'update']) !!}
                            {!! Form::submit('Add', ['class' => 'btn btn-primary', 'name' => 'submitButton', 'id' => 'submitBtnAdd', 'value' => 'add']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script>
        function newGift() {
            document.getElementById('spanHint').style.visibility = 'visible';

            document.getElementById('image').src = '';
            document.getElementById('fileInputLbl').innerText = 'Choose file...';
            document.getElementById('imagePathId').src = '';
            document.getElementById('imagePathId').value = '';

            document.getElementById('giftId').value = '';
            document.getElementById('giftName').value = '';
            document.getElementById('giftDescription').value = '';
            document.getElementById('giftPrice').value = 0;
            document.getElementById('giftCount').value = 0;
            document.getElementById('giftId').value = 0;

            document.getElementById('submitBtnUpdate').style.display = 'none';
            document.getElementById('submitBtnAdd').style.display = 'inline-block';
        }

        var modalConfirm = function(callback){
            let id = 0;
            $(".btn-confirm").on("click", function(){
                $("#mi-modal").modal('show');
                $('#myModalLabel').text("Do you want to delete gift " + $(this).data("name") + "?");
                id = $(this).data("id");
            });

            $("#modal-btn-yes").on("click", function(){
                callback(true, id);
                $("#mi-modal").modal('hide');
            });

            $("#modal-btn-no").on("click", function(){
                callback(false);
                $("#mi-modal").modal('hide');
            });
        };

        modalConfirm(function(confirm, id){
            if(confirm) {
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
        });

        function updateModelFunc(id, name, description, imagePath, price, count) {
            document.getElementById('spanHint').style.visibility = 'hidden';
            document.getElementById('giftId').value = id;
            document.getElementById('image').src = imagePath;
            document.getElementById('imagePathId').src = imagePath;
            document.getElementById('imagePathId').value = '';
            document.getElementById('fileInputLbl').innerText = imagePath.substr(imagePath.lastIndexOf('/') + 1);
            document.getElementById('giftName').value = name;
            document.getElementById('giftDescription').value = description;
            document.getElementById('giftPrice').value = price;
            document.getElementById('giftCount').value = count;

            document.getElementById('submitBtnUpdate').style.display = 'inline-block';
            document.getElementById('submitBtnAdd').style.display = 'none';
        }

        function changeLbl(obj) {
            document.getElementById('fileInputLbl').innerText = obj.value.substr(obj.value.lastIndexOf('\\') + 1);

            let data = new FormData(document.forms[0]);
            //data.append("picPath", obj.value);

            fetch("/admin/gifts/changePic", {
                body: data,
                method: 'post',
                headers: {
                    'Accept': 'application/json'
                },
                contentType: false,
                mimeType: "multipart/form-data",
                processData: false
            }).then(function (response) {
                if (response.status == 200) {
                    return response.json();
                }
            }).then(json => {
                document.getElementById('image').src = json;
            });
        }

        // $('#divId').on('contextmenu', function(e) {
        //     var top = e.pageY;
        //     var left = e.pageX;
        //     $("#context-menu").css({
        //         display: "block",
        //         top: top,
        //         left: left
        //     }).addClass("show");
        //         return false;
        //     }).on("click", function() {
        //         $("#context-menu").removeClass("show").hide();
        //     });

        //     $("#context-menu a").on("click", function() {
        //         $(this).parent().removeClass("show").hide();
        // });
    </script>
@endsection
