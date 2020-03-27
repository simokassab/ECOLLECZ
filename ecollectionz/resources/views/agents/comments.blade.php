@extends('layouts.agents-app')
@section('title', 'Agent')
@section('content')
    <div class=" content-wrapper content-wrapper1">
        <h1 style="color: #1D3357; font-size: 1.4em; margin-left: 1%; padding: 1.5%;">Comments</h1>
    </div>
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content container-fluid">
            <div class="container-fluid">
                <div class="row table-responsive">
                    <table id="comment_table" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Policy#</th>
                            <th>Client#</th>
                            <th>Amount</th>
                            <th>Draft</th>
                            <th>Due Date</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($policies as $p)
                            <tr>
                                <td>{{$p->id}}</td>
                                <td>{{$p->policy}}</td>
                                <td>{{$p->client_id}}</td>
                                @if($p->currency==1)
                                    <td>{{$p->amount}} $</td>
                                @else
                                    <td>{{$p->amount}} LBP</td>
                                @endif
                                <td>{{$p->draft_no}}</td>
                                <td>{{$p->due_date}}</td>
                                @if($p->status=='')
                                    <td>UN</td>
                                @else
                                    <td>{{$p->status}}</td>
                                @endif


                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12 col-md-offset-3 comments-section">
                    <hr>
                    @if($comments->isEmpty())
                        <h2>Client has no comments yet</h2>
                        <div class="row">
                            <div class="col col-sm-12">
                                <form method="post" action="addcomment" >
                                    <textarea name="comment" id="comment" class="form-control" cols="30" required rows="10" placeholder="Add Comment here..."></textarea>
                                    <br/>
                                    <button type="submit" class="btn btnsearch">Save</button>
                                    <br>
                                    <br>
                                </form>
                            </div>

                        </div>
                @else
                    <!-- comments wrapper -->
                        <div id="comments-wrapper">
                            @foreach($comments as $c)
                                <div class="comment clearfix">
                                    <div class="comment-details">
                                        <span class="comment-name">{{$c->writer}}</span>
                                        <span class="comment-date">{{$c->ccreated_at}}</span>
                                        <p><strong>{{$c->message}}</strong> </p>
                                    </div>
                                </div>
                            @endforeach
                            <hr style="border-top: 1px solid #012F5C;">
                            @foreach($replies as $r)
                                <div class="comment reply clearfix" style="margin: 0 0 0 60px !important;">
                                    <div class="comment-details">
                                        <span class="comment-name">{{$r->from_}}</span>
                                        <span class="comment-date">{{$r->created_at}}</span>
                                        <p>{{$r->reply}}</p>
                                    </div>
                                </div>
                                <hr/>
                            @endforeach
                            <div class="reply_div">
                                <form class="clearfix" method="post" action="../addreply" id="reply" name="reply">
                                    <input type="hidden" name="comment_id" value="{{$comments[0]->CID}}">

                                    <textarea name="message" id="message" class="form-control" cols="30" required rows="8" placeholder="Reply here..."></textarea>
                                    <br/>
                                    <button class="btn btnclick" id="submit">Reply</button>
                                    <br/> <br/>
                                </form>
                            </div>
                        </div>
                @endif

                <!-- // comments wrapper -->
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

