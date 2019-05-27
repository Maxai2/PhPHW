@extends('layouts.admin')

@section('content')
    <div class="staticDiv">
        <div class="total container">
            <h2>Total garbage collected: <strong>{{$totTrashCount}}</strong></h2>
            <h2>Total number of purchases in the store: <strong>{{$totNumGift}}</strong></h2>
        </div>
        <div class="topDiv container">
            <div>
                <div class="tabCont">
                    <h4>Top of garbage collecters</h4>
                    <table class="table table-striped table-bordered table-hover table-sm">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Trash count</th>
                        </tr>

                        <tr>
                            @foreach($)
                        </tr>

                    </table>
                </div>
                <div class="tabCont">
                    <h4>Top buyers by coins spent</h4>
                    <table class="table table-striped table-bordered table-hover table-sm">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Spent coins</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
@endsection
