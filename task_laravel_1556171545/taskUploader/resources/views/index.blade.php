@extends('shared.layout')

@section('content')
    <div class='indexWrap'>
        <h1>Tasks!</h1>
        <div class='tasksContainer'>
            @if(isset($tasks) && count($tasks) != 0)
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Link</th>
                    </tr>

                    @foreach ($tasks as $task)
                        <tr>
                            <td>$task->title</td>
                            <td>$task->createDateTime</td>
                            <td>$task->link</td>
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
                <form class='insertContainer' method="POST" action="/tasks">
                    @csrf
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h3 class="modal-title">Add new task</h3>
                            </div>

                            <div class="modal-body">
                                <input type='text' class="form-control" placeholder="Task name" name='taskName' required>
                                <!-- <div class="invalid-feedback">
                                    Task name is required.
                                </div> -->

                                <div class="radioBut">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" value="file"  class='custom-control-input' name="taskContent" id="file" checked onClick="changeInput()">
                                        <label for="file" class="custom-control-label">File</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" value="text"  class='custom-control-input' name="taskContent" id="text" onClick="changeInput()">
                                        <label for="text" class="custom-control-label">Text</label>
                                    </div>
                                </div>

                                <div class='taskContentContainer'>
                                    <input id='fileInput' type='file'>

                                    <div class="md-form">
                                        <label for="textInput">Material textarea</label>
                                        <textarea id="textInput" class="md-textarea form-control" rows="3"></textarea>
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
        var radBtns = new Array();

        window.onload = function() {
            radBtns = document.getElementsByName('taskContent');
            fileElem = document.getElementById('fileInput');
            textElem = document.getElementById('textInput');

            fileElem.style.display = 'inline';
            fileElem.setAttribute("required", "");
            textElem.style.display = 'none';
            textElem.removeAttribute("required");
        }

        function changeInput() {
            for(var i = 0; i < radBtns.length; i++) {
                if(radBtns[i].checked) {
                    fileElem.style.display = 'none';
                    fileElem.removeAttribute("required");
                    textElem.style.display = 'inline';
                    textElem.setAttribute("required", "");
                } else {
                    fileElem.style.display = 'inline';
                    fileElem.setAttribute("required", "");
                    textElem.style.display = 'none';
                    textElem.removeAttribute("required");
                }
            }
        }

    </script>
@endsection
