@extends('layouts.app')
@section('title', 'Feedback')
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
</style>
<div class="content-wrapper" >
  <!-- Modal-->
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 style="color: #1D3357; font-size: 1.4em; margin-left: 1%; padding: 0.2%;">Feedback</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
          <hr style="border-bottom: 1px solid #c2c7d0;">
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
 
    <!-- Main content -->
    <section class="content"> 
      <div class="container-fluid ">
      @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
        <!-- Small boxes (Stat box) -->
      <br/>
        <form role="form" method="post" action="{{ route('feedback.send') }}" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="col col-lg-4 div1">
                        <img src="{{ asset('images/f_c_left.png') }}" class="imgimg1">
                    </div>
                    <div class="col col-lg-3 div2" style="margin-left: 2%; background-color: rgba(255, 255, 255, .1) !important;">
                        <div class='form-group'>
                            <label for='name'>NAME</label>
                            <input type='text' name='name' id='name' style=""
                                   value='{{Auth()->user()->name}}'class="form-control" required>
                        </div>
                        <div class='form-group'>
                            <label for='email'>EMAIL</label>
                            <input type='text' name='email' id='email'
                                   value='{{Auth()->user()->email}}'class="form-control" required>
                        </div>
                        <div class='form-group'>
                            <label for='phone'>PHONE</label>
                            <input type='text' name='phone' id='phone'
                                   value='{{Auth()->user()->phone}}' class="form-control" required>
                        </div>
                        <div class='form-group'>
                            <label for='message'>WRITE MESSAGE</label>
                            <textarea name='message' id='message'  class="form-control" required rows='10'></textarea>
                        </div>
                        <button type="submit" class="btn"
                                style="color: #012f5c; background-color:#FCD304; letter-spacing: 2px; width: 100%; font-weight: bolder; margin-bottom: 20% !important;">
                            SUBMIT</button>
                    </div>
                    <div class="col col-lg-4 div1">
                        <img src="{{ asset('images/f_c_right.png') }}" class="imgimg">
                    </div>
                </div>


        </form>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</div>

@endsection
 