@extends('layouts.admin-app')
@section('title', 'Clients')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Clients</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">clientss</li>
                        </ol>

                    </div><!-- /.col -->
                </div><!-- /.row -->
                <hr style="border-bottom: 1px solid #012F5C;">
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content container-fluid">
                <div class="container-fluid">
                    <div class="card card-danger" style="border: 2px solid #012F5C;">
                        <div class="card-header">
                            <h3 class="card-title" style="color: white">My Clients</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <table id="clients_table" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Phone Number</th>
                                        <th>GPA</th>
                                        <th>Address</th>
                                        <th>Updated Date</th>
                                        <th>Control</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($clients as $c)
                                        <tr>
                                            <td>{{$c->CNAME}}</td>
                                            <td>{{$c->PPHONE}}</td>
                                            @if($c->GPAA < 70)
                                                <td class="text-danger"><b>{{$c->GPAA}} %</b></td>
                                            @else
                                                <td class="text-success"><b>{{$c->GPAA}} %</b></td>
                                            @endif
                                            <td>{{$c->ADDR}}</td>
                                            <td style="text-align: center;font-style: italic; color: #012F5C ;">
                                                <time class="timeago" datetime="{{$c->CDATE}}" >{{$c->CDATE}}</time>
                                            </td>

                                            <td style="width: 15% !important;">
                                                <div class="button_cont" align="center">
                                                    <a class="example_e" href="./{{$c->PPHONE}}/policy" rel="nofollow noopener">
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
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
    </div>
@endsection

