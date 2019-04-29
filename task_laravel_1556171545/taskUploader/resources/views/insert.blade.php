@extends('index')

@section('insertContent')
    <div class='insertWrap' id="modalDivId" onClick='closeMod(this)'>
        <form class='insertContainer' method="POST" action="tasks/writeToDb">
            <h3>Add new task</h3>

            <input type='text' placeholder="Task name" required>

            <div class="radioBut">
                <div>
                    <input type="radio" value="file" name="taskContent" id="file" checked onClick="changeInput()">
                    <label for="file">File</label>
                </div>
                <div>
                    <input type="radio" value="text" name="taskContent" id="text" onClick="changeInput()">
                    <label for="text">Text</label>
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
        var fileElem = document.getElementById('fileInput');
        var textElem = document.getElementById('textInput');

        var radBtns = new Array();
        window.onload=function() {
            radBtns = document.getElementsByName('taskContent');

            fileElem.style.display = 'inline';
            textElem.style.display = 'none';
        }

        function changeInput() {
            for(var i=0; i < radBtns.length; i++) {
                if(radBtns[i].checked) {
                    fileElem.style.display = 'none';
                    fileElem.required = false;
                    textElem.style.display = 'inline';
                    textElem.required = true;
                } else {
                    fileElem.style.display = 'inline';
                    fileElem.required = true;
                    textElem.style.display = 'none';
                    textElem.required = false;
                }
            }
        }

        function closeMod(event) {
            console.log(event.id);
        }

    </script>
@endsection
