@extends('layouts.agents-app')
@section('title', 'Brokers')
@section('content')
    <div class=" content-wrapper content-wrapper1">
        <h1 style="color: #1D3357; font-size: 1.4em; margin-left: 1%; padding: 1.5%;">History</h1>
    </div>
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
            @include('inc.messages')
            <!-- Small boxes (Stat box) -->
                <br/>
                <div class="row table-responsive">
                    <table id="history_table" class="table table-bordered table-hover" style="width: 100% !important;">
                        <thead>
                        <tr>
                            <th>Client No</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Draft</th>
                            <th>Due Date</th>
                            <th>Status</th>
                            <th>Currency</th>
                            <th>Amount</th>
                            <th>Remarks</th>
                            <th>Address</th>
                            <th>Updated At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($history as $p)
                            <tr class='histo' id='{{$p->phone}}_{{$p->draft_no}}_{{$p->client_name}}'>
                                <td>{{$p->client_no}}</td>
                                <td>{{$p->client_name}}</td>
                                <td>{{$p->phone}}</td>
                                <td>{{$p->draft_no}}</td>
                                <td>{{$p->due_date}}</td>
                                <td>{{$p->STAT}}</td>
                                @if($p->currency == 1)
                                    <td>USD</td>
                                @else
                                    <td>LBP</td>
                                @endif
                                <td>{{$p->amount}}</td>
                                <td>{{$p->remarks}}</td>
                                <td>{{$p->address}}</td>
                                <td>{{$p->created_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col col-sm-12">
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection

