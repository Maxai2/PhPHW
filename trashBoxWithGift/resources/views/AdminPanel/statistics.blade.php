@extends('layouts.admin')

@section('content')
    <div class="staticDiv">
        <div class="total container">
            <h2>Total garbage collected: <strong>{{$totTrashCount}}</strong></h2>
            <h2>Total number of purchases in the store: <strong>{{$totNumGift}}</strong></h2>
        </div>
        <div class="topDiv container">
            <div class="tabCont">
                <h4>Top of garbage collecters</h4>
                <table id="topGB" class="table table-striped table-bordered table-hover table-sm">
                    <tr>
                        <th scope="col" class="th-sm">Name</th>
                        <th scope="col" class="th-sm">Trash count</th>
                    </tr>

                    @foreach($topGB as $name => $count)
                        <tr>
                            <td scope="col" class="th-sm">{{$name}}</td>
                            <td scope="col" class="th-sm">{{$count}}</td>
                        </tr>
                    @endforeach

                </table>
            </div>
            <div class="tabCont">
                <h4>Top buyers by coins spent</h4>
                <table class="table table-striped table-bordered table-hover table-sm">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Spent coins</th>
                    </tr>

                    @foreach($ucArr as $name => $price)
                        <tr>
                            <td>{{$name}}</td>
                            <td>{{$price}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#topGB').DataTable();
            // $('.dataTables_length').addClass('bs-select');
        });
    </script>
@endsection
