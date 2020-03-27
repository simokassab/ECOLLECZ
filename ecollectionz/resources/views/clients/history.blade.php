@extends('layouts.app')
@section('title', 'Policies')
@section('content')

    <div class="content-wrapper1">
        <h1 style="color: #1D3357; font-size: 1.4em; margin-left: 1%; padding: 1.5%;">Invoice History</h1>
    </div>
    <div class="content-wrapper"  style="background-color: rgba(255, 255, 255, .7) !important;">

        <!-- /.content-header -->
        <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @include('inc.messages')
                            <div class="row table-responsive">
                                <table id="history_table" class="table table-bordered table-hover " style="width:100%;">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Policy#</th>
                                        <th>Client#</th>
                                        <th>Amount</th>
                                        <th>Draft</th>
                                        <th>Due Date</th>
                                        <th>Status</th>
                                        <th>Control</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($policies as $p)
                                        <tr>
                                            <td>{{$p->id}}</td>
                                            <td>{{$p->policy}}</td>
                                            <td>{{$p->client_id}}</td>
                                            @if($p->currency==1)
                                                <td>{{$p->amount}} $</td>
                                            @else
                                                <td>{{$p->amount}} LBP</td>
                                            @endif
                                            <td>{{$p->draft_no}}</td>
                                            <td>{{$p->due_date}}</td>
                                            @if($p->status=='')
                                                <td>UN</td>
                                            @else
                                                <td>{{$p->status}}</td>
                                           @endif
                                            <td><a class="btn btn-info" href="{{ url('/') }}/{{$p->id}}/DOWNLOAD">Download Receipt</a></td>
                                               

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

