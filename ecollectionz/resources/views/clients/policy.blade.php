@extends('layouts.app')
@section('title', 'Policies')
@section('content')
    <style>
        .btn-file {
            position: relative;
            overflow: hidden;
        }
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }
        #img-upload{
            width: 50%;
        }
        .imgimg1 {
            width: 50%;
            margin-left: 20%;
            height: 100%;
        }
        .imgimg {
            width: 50%;
            margin-left: 20%;
            height: 100%;
        }

        label {
            color: #1d3357;
            font-size: 15px;
            letter-spacing: 2px;
        }
        input, textarea{
            background-color: rgba(255, 255, 255, 0.1) !important;
        }

        .select2-selection {
            background-color: rgba(255, 255, 255, 0.1) !important;
        }
    </style>
    <div class="content-wrapper" >
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 style="color: #1D3357; font-size: 1.4em; margin-left: 1%; padding: 0.2%;">Add New Policy</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <hr style="border-bottom: 1px solid #c2c7d0;">
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @include('inc.messages')
                        {!! Form::open(['action'=>'HomeController@store', 'method'=>'POST', 'enctype' => 'multipart/form-data']) !!}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="row" style="margin-top: 1.5%;">
                                <div class="col col-lg-4 div1">
                                    <img src="{{ asset('images/f_c_left.png') }}" class="imgimg1">
                                </div>
                                <div class="col col-lg-3 div2" style="margin-left: 2%;  background-color: rgba(255, 255, 255, .1) !important;">
                                    <!--img style="width: 20%; margin-left: 40%; margin-bottom: 20%;" src="{{ asset('images/logo_trans.png') }}" -->
                                    <div class="form-group">
                                        <label class="control-label"for="corporates">COMPANY</label>
                                        <select class="form-control select2" style="width: 100%; background-color: rgba(255, 255, 255, .1)!important;" name='corporates' id ='corporates' required>
                                            @foreach ($corp as $cor)
                                                    <option value="{{$cor->id}}" >{{$cor->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                        <br>
                                    <div class="form group">
                                        <label class="control-label"for="phone">PHONE</label>
                                        <input type="number" class="form-control" name='phone' id='phone' value="" placeholder="e.g 96171123456">
                                    </div>
                                        <br>
                                    <center><b>OR</b></center>
                                    <div class="form group">
                                        <label class="control-label"for="policy_no">POLICY NUMBER</label>
                                        <input type="number" class="form-control" name='policy_no' id='policy_no' value="" placeholder="Policy number">
                                    </div>
                                        <br>
                                    <center><b>OR</b></center>
                                    <div class="form group">
                                        <label class="control-label"for="client_no">CLIENT NUMBER</label>
                                        <input type="number" class="form-control" name='client_no' id='client_no' value="" placeholder="Client Number">
                                    </div>
                                    <button type="submit" class="btn"
                                            style="color: #012f5c; background-color:#FCD304;
                                            letter-spacing: 2px; width: 100%;
                                            font-weight: bolder; margin-top: 10% !important;">
                                        REQUEST POLICY</button>
                                </div>
                                <div class="col col-lg-4 div1">
                                    <img src="{{ asset('images/f_c_right.png') }}" class="imgimg">
                                </div>
                            </div>
                            <!-- /.row -->
                        {!! Form::close() !!}
                </div><!-- /.container-fluid -->
            </section>
    </div>
@endsection

