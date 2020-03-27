@extends('layouts.app')
@section('title', 'Client Dashboard')
@section('content')

<div class="content-wrapper1" >
    <h1 style="color: #1D3357; font-size: 1.4em; margin-left: 1%; padding: 1.5%;">Linked Accounts</h1>
</div>
<div class="content-wrapper" >
    <!-- Main content -->
    <section class="content container-fluid" style="padding-bottom: 2%; ">
        @include('inc.messages')
      <div class="container-fluid">
          <div class="row">
              @if($linked->isEmpty())
                  <div class="col col-sm-12">
                      <h1 style="text-align: center; color: #c2c7d0;;">You don't have any Linked Accounts yet</h1>
                      <hr>
                  </div>
              @else
                  @foreach($linked as $c)
                      <?php
                      //$photo = $c->photo;
                      ?>
                          <div class="col col-sm-3" style='background-color: #1D3357; margin-right: 3%;  border-radius: 15px; color:white; opacity: 0.9; border: 2px solid #fad500'>
                              <div class="row" style="border-bottom: 1px solid #fad500; padding: 5%; ">
                                  <!-- Add the bg color to the header using any of the bg-* classes -->
                                  <div class="col col-sm-6">
                                      <h4  style="color:white; font-size: 1.2rem"><u>{{$c->name}}</u></h4>
                                  </div>
                                  <div class="col col-sm-6 " >
                                      <img class="img" src="{{asset('images/'.$photo) }}" >
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-sm-12 border-right">
                                      <div class="description-block">
                                          <a href="./lpolicies/{{$c->PPHONE}}/{{$c->CPP}}" class="btn btn-danger "> My Policies </a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                  @endforeach
              @endif
          </div>
          <div class="row">
              <div class="col col-sm-12" >
                  <div class="button_cont" align="center" >
                      <a class="example_e" href="./policy" rel="nofollow noopener" style="position: relative; z-index: 999!important;" >
                          <i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;
                          <b style="letter-spacing: 2px;">Add more policies</b>
                      </a>
                  </div>
              </div>
          </div>
      </div><!-- /.container-fluid -->
    </section>
</div>
@endsection

