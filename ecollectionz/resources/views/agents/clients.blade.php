@extends('layouts.agents-app')
@section('title', 'Agents')
@section('content')
    <div class=" content-wrapper content-wrapper1">
        <h1 style="color: #1D3357; font-size: 1.4em; margin-left: 1%; padding: 1.5%;">My Clients</h1>
    </div>
    <div class="content-wrapper">

        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content container-fluid">
            <div class="container-fluid">
                <div class="row table-responsive">
                    <table id="clients_table" class="table table-bordered table-hover" style="width: 100%;">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            @if($gpa[0]->gpa==1)
                                <th>GPA</th>
                            @endif

                            <th>Registred</th>
                            <th>Control</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clients as $c)
                            <tr>
                                <td>{{$c->CNAME}}</td>
                                <td>{{$c->EMAILS}}</td>
                                <td>{{$c->PPHONE}}</td>
                                @if($gpa[0]->gpa==1)
                                    @if($c->GPAA < 70)
                                        <td class="text-danger"><b>{{$c->GPAA}} %</b></td>
                                    @else
                                        <td class="text-success"><b>{{$c->GPAA}} %</b></td>
                                    @endif
                                @endif

                                @if($c->EMAILS !='')
                                    <td class="text-success">Registred</td>
                                @else
                                    <td class="text-danger">Not Registred</td>
                                @endif
                                <td style="width: 15% !important;">
                                    <div class="button_cont" align="center">
                                        <a class="btn btnclick"  href="./{{$c->PPHONE}}/policies" rel="nofollow noopener">
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

