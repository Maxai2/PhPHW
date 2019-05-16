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
                            <button type="button" class="btn btn-danger" onclick="deleteUser($user->id, $user->name)">Delete</button>
                            <label class="switch">
                                {{-- {{(bool)$user->block}}
                                {!! Form::checkbox('text', $user->block , (bool)$user->block, ['onchange' => "blockUser(this, $user->id)"]) !!} --}}
                                <input type="checkbox" onchange="blockUser(this, {{$user->id}})" {{$user->block == 1 ? 'checked=checked' : ''}}>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                </div>
            @endforeach
       </div>
    </div>
@endsection

@section('scripts')
    <script>
        function deleteUser(id, name) {
            confirm("Do you want to delete user " + name + '?');
        }

        function blockUser(inp, id) {
            $data = new FormData();
            $data.append("id", id);
            $data.append("state", inp.checked);

            fetch("/admin/users/block", {
                body: $data,
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
