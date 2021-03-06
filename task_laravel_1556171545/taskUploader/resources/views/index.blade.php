@extends('shared.layout')

@section('content')
    <div class='indexWrap'>
        @if(isset($info))
            <h5>{{$info}}</h5>
        @endif
        <h1>Tasks!</h1>
        <div class='tasksContainer'>
            @if(isset($tasks) && count($tasks) != 0)
                <table class="table table-striped">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Link</th>
                    </tr>

                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{$task->title}}</td>
                            <td>{{$task->created_at}}</td>
                            <td><a href="{{$task->link}}" download>{{$task->link}}</a></td>
                        </tr>
                    @endforeach

                </table>
            @endif

            {{-- <div>
                <a href='/tasks/create'>+</a>
            </div> --}}

            <button type="button" class="btn btn-success btn-xl" data-toggle="modal" data-target="#modelId">
                +
            </button>

            <div class="modal insertWrap" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <form class='insertContainer' method="POST" action="/tasks/insert" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h3 class="modal-title">Add new task</h3>
                            </div>

                            <div class="modal-body">
                                <input type='text' class="form-control" placeholder="Task name" name='taskName' files=true required>
                                <!-- <div class="invalid-feedback">
                                    Task name is required.
                                </div> -->

                                <div class="radioBut">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" value="file" class='custom-control-input' name="taskType" id="file" checked onClick="changeInput()">
                                        <label for="file" class="custom-control-label">File</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" value="text" class='custom-control-input' name="taskType" id="text" onClick="changeInput()">
                                        <label for="text" class="custom-control-label">Text</label>
                                    </div>
                                </div>

                                <div class='taskContentContainer'>
                                    <div class="custom-file" id='fileDiv'>
                                        <input name='taskContentImage[]' type="file" class="custom-file-input" id='fileInput' onchange='changeLbl(this)'>
                                        <label class="custom-file-label" id='fileInputLbl'>Choose file...</label>
                                    </div>

                                    <div class="form-group" id='textDiv'>
                                        <label for="textInput">Code:</label>
                                        <textarea name='taskContentText' class="form-control" id="textInput" value=''></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


{{-- @yield('insertContent') --}}

@section('scripts')

    <script>
        var fileElem = "";
        var textElem = "";
        var fileDiv = "";
        var textDiv = "";
        var radBtns = new Array();

        window.onload = function() {
            radBtns = document.getElementsByName('taskType');
            fileElem = document.getElementById('fileInput');
            textElem = document.getElementById('textInput');
            fileDiv = document.getElementById('fileDiv');
            textDiv = document.getElementById('textDiv');

            fileDiv.style.display = 'inline';
            fileElem.setAttribute("required", "");
            textDiv.style.display = 'none';
            textElem.removeAttribute("required");

            obj = document.getElementById('fileInput');
            if (obj.value != '')
                changeLbl(obj);
        }

        function changeInput() {
            for (var i = 0; i < radBtns.length; i++) {
                if (radBtns[i].checked) {
                    fileDiv.style.display = 'none';
                    fileElem.removeAttribute("required");
                    textDiv.style.display = 'inline';
                    textElem.setAttribute("required", "");
                } else {
                    fileDiv.style.display = 'inline';
                    fileElem.setAttribute("required", "");
                    textDiv.style.display = 'none';
                    textElem.removeAttribute("required");
                }
            }
        }

        function changeLbl(obj) {
            document.getElementById('fileInputLbl').innerText = obj.value.substr(obj.value.lastIndexOf('\\') + 1);
        }

    </script>
@endsection
