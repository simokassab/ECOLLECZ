@extends('layouts.corporate-app')
@section('title', 'Corporate')
@section('content')
    <div class=" content-wrapper content-wrapper1">
        <h1 style="color: #1D3357; font-size: 1.4em; margin-left: 1%; padding: 1.5%;">My Brokers</h1>
    </div>
        <!-- /.content-header -->
        <!-- Main content -->
    <div class="content-wrapper">
        <section class="content container-fluid">
                <div class="container-fluid">
                    <div class="row table-responsive">
                                <table id="clients_table" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Address</th>
                                        <th>Control</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($brokers as $c)
                                        <tr>
                                            <td>{{$c->name}}</td>
                                            <td>{{$c->email}}</td>
                                            <td>{{$c->phone}}</td>
                                            <td>{{$c->address}}</td>
                                            <td style="width: 15% !important;">
                                                <div class="button_cont" align="center">

                                                    <a class="btn btnclick" href="./{{$c->bk_id}}/BK/policies" rel="nofollow noopener">
                                                        Policies
                                                    </a>
                                                </div>
                                            </td>
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

