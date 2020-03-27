@extends('layouts.agents-app')
@section('title', 'Corporate Dashboard')
@section('content')
  <div class=" content-wrapper content-wrapper1">
    <h1 style="color: #1D3357; font-size: 1.4em; margin-left: 1%; padding: 1.5%;">Status: {{$status}}</h1>
  </div>
  <div class="content-wrapper">
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row table-responsive">
          <table id="brokers_table" class="table table-bordered table-hover">
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
              <th>Created At</th>
            </tr>
            </thead>
            <tbody>
            @foreach($policies as $p)
              <tr>
                  <?php
                  $draft = str_replace('\\', '!', $p->draft_no);
                  $draft = str_replace('/', '-', $p->draft_no);
                  $histo =$p->phone."_".$draft."_".$p->client_name;
                  ?>
                <td>
                  <a target='_blank' title='History' href='../{{$histo}}/history' class='btn btnclick'>
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
                <td>
                  <time class="timeago"
                        datetime="{{$p->created_at}}">{{$p->created_at}}</time>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
          <!-- /.row -->
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
  </div>

@endsection
