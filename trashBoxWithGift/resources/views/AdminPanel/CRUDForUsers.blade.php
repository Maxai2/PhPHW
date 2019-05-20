@extends('layouts.admin')

@section('content')
    <div class="usersPanel">
       <div class="row">
            @foreach ($users as $user)
                <div class="col-lg-3 col-sm-4 col-xl-2 col-md-3" style="padding: 5px">
                    <div class="userItem ">
                        <div class="cont">
                            <img src="{{ asset($user->avatarPath) }}">
                            <span>{{ $user->name }}</span>
                        </div>
                        <div class="cont">
                            <label><b>Email: </b></label>
                            <label>{{ $user->email }}</label>
                        </div>
                        <div class="cont">
                            <label><b>Phone: </b></label>
                            <label>{{ $user->phone }}</label>
                        </div>
                        <div class="cont">
                        <button type="button" {{$user->name == 'admin' ? 'disabled' : ''}} data-id="{{$user->id}}" data-name="{{$user->name}}" class="btn btn-danger btn-confirm" >Delete</button>
                            <label class="switch">
                                {{-- {{(bool)$user->block}}
                                {!! Form::checkbox('text', $user->block , (bool)$user->block, ['onchange' => "blockUser(this, $user->id)"]) !!} --}}
                                <input type="checkbox" {{$user->name == 'admin' ? 'disabled' : ''}} onchange="blockUser(this, {{$user->id}})" {{$user->block == 1 ? 'checked=checked' : ''}}>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                </div>
            @endforeach
       </div>
       <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="mi-modal">
           <div class="modal-dialog modal-md">
               <div class="modal-content">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                       <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="modal-btn-yes">Yes</button>
                        <button type="button" class="btn btn-default" id="modal-btn-no">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var modalConfirm = function(callback){
            let id = 0;
            $(".btn-confirm").on("click", function(){
                $("#mi-modal").modal('show');
                $('#myModalLabel').text("Do you want to delete user " + $(this).data("name") + "?");
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

                fetch("/admin/users/deleteUser", {
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

        function blockUser(inp, id) {
            let data = new FormData();
            data.append("id", id);
            data.append("state", inp.checked);

            fetch("/admin/users/blockUser", {
                body: data,
                method: 'post',
                headers: {
                    'Accept': 'application/json'
                }
            }).then(function (response) {
                if (response.status != 200) {
                    inp.checked = false;
                }
            });
        }
    </script>
@endsection
