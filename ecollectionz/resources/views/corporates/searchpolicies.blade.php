@extends('layouts.corporate-app')
@section('title', 'Search Dashboard')
@section('content')
    <div class=" content-wrapper content-wrapper1">
        <h1 style="color: #1D3357; font-size: 1.4em; margin-left: 1%; padding: 1.5%;">Search Policies</h1>
    </div>
    <div class="content-wrapper">
     <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
            @include('inc.messages')
                <div class="row">
                    <div class="col-12">
                        <div class="card card-success">
                            <div class="card-header" style="background-color: #1D3357">
                                <h3 class="card-title" style='color:white;'>Search</h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ url('/') }}/corporate/getsearch" method="post">
                                <div class="row">
                                    <div class="col col-sm-6" style="border-right: 1px solid #012F5C;">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="dateype" name="dateype" value="due_date" checked="checked" >
                                            <label class="form-check-label" for="due">Due Date</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="dateype1" name="dateype" value="bord_date">
                                            <label class="form-check-label" for="dateype1">bord Date</label>
                                        </div>
                                   <br> <hr>
                                        <label>Date Range:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="fa fa-calendar"></i>
                                  </span>
                                            </div>
                                            <input type="text" class="form-control float-right" id="dates" name="dates">
                                        </div>
                                    </div>
                                    <div class="col col-sm-6">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control select2" name="status" style="width: 100%;">
                                                <option value="0">Select the Status</option>
                                                <option value="B">B - Barcode</option>
                                                <option value="C">C - Cancelled</option>
                                                <option value="D">D - Distribute</option>
                                                <option value="E">E - Eliminate</option>
                                                <option value="F">F - Failed</option>
                                                <option value="P">P - Paid</option>
                                                <option value="P-Online">P-Online</option>
                                                <option value="UN">UN - Under progress</option>
                                                <option value="V">V - Comments</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col col-sm-12">
                                        <br/>
                                        <input type="hidden" value="search" name="search" id="search">
                                        <button type="submit" class="btn btnsearch" style="width: 100%;">Search !</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        <?php
                          //  print_r();
                        ?>
                        @if(!empty($search))
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title" style='color:#012F5C;'>List of policies</h3>
                           
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="search_table" class="table table-bordered table-hover" style="width: 100% !important;">
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($search as $p)
                                        <tr>
                                            <?php 
                                                if (strpos($p->draft_no, '\\') !== false) {
                                                    $draft = str_replace('\\', '!', $p->draft_no);
                                                }
                                                else {
                                                    $draft = str_replace('/', '-', $p->draft_no);
                                                }
                                                $histo =$p->phone."_".$draft."_".$p->client_name;
                                            ?>
                                            <td>
                                            <a target='_blank' title='History' href='./{{$histo}}/history' class='btn btnclick'>
                                            <i class='fas fa-history'></i></a>
                                            </td>
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
                                            <td>{{$p->RK}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        @endif
                    </div>
                    <!-- /.row -->
                </div>
            </div>
                <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    </div>

@endsection
