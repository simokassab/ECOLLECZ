@extends('layouts.agents-app')
@section('title', 'All Policies')
@section('content')

    <div class="content-wrapper">
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
            @include('inc.messages')
            <!-- Small boxes (Stat box) -->
                <br/>
                <div class="row table-responsive" >
                    <table id="politable" class="table table-bordered table-hover" style="width: 100% !important;">
                        <thead>
                        <tr>
                            <th>History</th>
                            <th>Client No</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Draft</th>
                            <th>Due Date</th>
                            <th>Status</th>
                            <th>Currency</th>
                            <th>Amount</th>
                            <th>Remarks</th>
                            <th>Updated At</th>
                            <th>Comments</th>
                        </tr>
                        </thead>
                    </table>
                    <!-- /.row -->
                </div>
            </div>
        </section>
    </div>

@endsection


