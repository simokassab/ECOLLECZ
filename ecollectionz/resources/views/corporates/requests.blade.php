@extends('layouts.corporate-app')
@section('title', 'Requests  Dashboard')
@section('content')
    <div class=" content-wrapper content-wrapper1">
        <h1 style="color: #1D3357; font-size: 1.4em; margin-left: 1%; padding: 1.5%;">Policies requests</h1>
    </div>
            @include('inc.messages')
            <!-- Small boxes (Stat box) -->
                <div class="content-wrapper">
                    <section class="content container-fluid">
                        <div class="container-fluid">
                            <div class="row table-responsive">
                                    <table  id='table1' class="table  table-bordered hover" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Company</th>
                                        <th>Name</th>
                                        <th style="border-right: 4px solid #FFC107;">Sender Phone</th>
                                        <th>Client#</th>
                                        <th>Policy#</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($req as $p)
                                        <tr>
                                            <td>{{$p->CP_NAME}}</td>
                                            <td>{{$p->US_NAME}}</td>
                                            <td style="border-right: 4px solid #FFC107;">{{$p->USPHONE}}</td>
                                            <td>{{$p->client_number}}</td>
                                            <td>{{$p->policy}}</td>
                                            <td>{{$p->phone}}</td>
                                            <td style="width: 20%;">
                                                <a href="./{{$p->id}}/confirm" class="btn btn-success"><i class="fa fa-check-circle "></i>&nbsp;&nbsp;Confirm</a>
                                                <a href="./{{$p->id}}/decline" class="btn btn-danger"><i class="fa fa-window-close "></i>&nbsp;&nbsp;Decline</a>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
            </div>
                <!-- /.container-fluid -->



@endsection
