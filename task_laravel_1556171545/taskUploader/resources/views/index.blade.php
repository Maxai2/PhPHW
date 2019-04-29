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

            <div>
                <a href='/tasks/insert'>+</a>
            </div>
        </div>
    </div>
@endsection

@yield('insertContent')

<!-- @section('scripts')
@endsection -->
