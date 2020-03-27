@extends('layouts.admin-app')
@section('title', 'Status')
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

</style>
<div class="content-wrapper">
  <!-- Modal-->

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Status</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Status</li>
            </ol>
           
          </div><!-- /.col -->
        </div><!-- /.row -->
        <hr style="border-bottom: 1px solid #012F5C;">
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
 
    <!-- Main content -->
    <section class="content"> 
      <div class="container-fluid">
          @include('inc.messages')
          @foreach ($status as $s)
              <form role="form" method="post" action="{{ route('admin.status.update', $s->id) }}" >
            <div class="card card-warning" style="border: 2px solid #012F5C;">
              <div class="card-header" style="background-color: #012F5C;" >
                <h3 class="card-title" style=" color: white; ">Edit this</h3>
              </div>
              <div class="card-body">
                  <div class="row">

                              <div class="col col-sm-6">
                                  <div class="form-group">
                                      <label for="code"> Code</label>
                                      <input type="text" name="code" id="code" class="form-control" value="{{$s->code}}">
                                  </div>
                              </div>
                              <div class="col col-sm-6">
                                  <div class="form-group">
                                      <label for="name">Description</label>
                                      <input type="text" name="name" id="name" class="form-control" value="{{$s->name}}">
                                  </div>
                              </div>

                              <div class="col col-sm-12">
                                  <br>
                                  <button type="submit" class="btn btn-success" style="width:100%; color: white; background-color: #012F5C;">Save</button>
                              </div>

                </div>
              </div>
              <!-- /.card-body -->
            </div>
              </form>
          @endforeach
        </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</div>

@endsection
