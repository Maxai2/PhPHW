@extends('index')

@section('insertContent')
    <div class='insertWrap' id="modalDivId" onClick='closeMod(event)'>
        <form class='insertContainer' method="POST" action="/tasks">
            <h3>Add new task</h3>

            <input type='text' placeholder="Task name" required>

            <div class="radioBut">
                <div class="custom-control custom-radio">
                    <input type="radio" value="file" class='custom-control-input' name="taskContent" id="file" checked onClick="changeInput()">
                    <label for="file" class="custom-control-label">File</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" value="text" class='custom-control-input' name="taskContent" id="text" onClick="changeInput()">
                    <label for="text" class="custom-control-label">Text</label>
                </div>
            </div>

            <div class='taskContentContainer'>
                <input id='fileInput' type='file'>
                <textarea id='textInput'></textarea>
            </div>

            <input type='submit' value="Add">
        </form>
    </div>
@endsection

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

        function closeMod(event) {
            if (event.target.id == 'modalDivId')
                location.replace('../tasks');
        }

    </script>
@endsection
