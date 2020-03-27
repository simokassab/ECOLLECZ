@extends('layouts.agents-app')
@section('title', 'Agent')
@section('content')
    <style>
        .col-xs-12 p {
            color: #012F5C;
            margin: 3%;
        }
    </style>
    <div class="content-wrapper" style="background: none !important;">

        <!-- Main content -->
        <section class="content container-fluid">
                    <!-- Small boxes (Stat box) -->
            <!-- Small boxes (Stat box) -->
            <div class="row" style="background: none !important;">
                <div class="col col-lg-3 col-xs-3" style="background-color: white; margin: 1% 1% 1% 1%; border: 1px white;">
                    <div class="row">
                        <div class="col col-xs-6" style="margin-left: 5%;">
                            <h3>{{$paid_policies[0]->P_COUNT}}</h3>
                        </div>
                        <div class="col col-xs-6" style="margin-left: 5%;">
                            <img src="{{asset('img/1.png') }}" style="width: 60%; margin-top: 10%;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-xs-12" style="margin: 1% 1% 1% 1%; width: 95%; background-color: #EBF0F7; ">
                            <p>Paid Policies</p>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-3 col-xs-3" style="margin: 1% 1% 1% 1%; background-color: white; border: 1px white;">
                    <div class="row">
                        <div class="col col-xs-6" style="margin-left: 5%;">
                            <h3>{{$unpaid_policies[0]->P_COUNT}}</h3>
                        </div>
                        <div class="col col-xs-6" style="margin-left: 5%;">
                            <img src="{{asset('img/2.png') }}" style="width: 60%; margin-top: 10%;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-xs-12" style="margin: 1% 1% 1% 1%; width: 95%; background-color: #EBF0F7; ">
                            <p>Remaining Policies</p>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-3 col-xs-3" style=" margin: 1% 1% 1% 1%;background-color: white; border: 1px white;">
                    <div class="row">
                        <div class="col col-xs-6" style="margin-left: 5%;">
                            <h3>{{$paid_policies[0]->P_COUNT}}</h3>
                        </div>
                        <div class="col col-xs-6" style="margin-left: 5%;">
                            <img src="{{asset('img/3.png') }}" style="width: 60%; margin-top: 10%;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-xs-12" style="margin: 1% 1% 1% 1%; width: 95%; background-color: #EBF0F7; ">
                            <p>Paid Policies</p>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>
                    <!-- /.row -->
                    <hr style="border-top: 1px solid #012f5c !important; ">
            <div class="row">
                <div class="col col-sm-6">
                    <div class="card">
                        <div class="card-header" style="background-color: #012F5C;">
                            <center><h3 class="card-title" style="color: white;">Summary</h3></center>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" style="padding: 0!important; width: 100%;">
                            <table  class="table table-bordered table-hover" style="width: 100%!important;">
                                <thead>
                                <tr style="color: #012F5C; background-color: #D0D6DD; ">
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Count
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $data = '[{'; ?>
                                @foreach($summary as $s)
                                    <?php
                                    if($s->status==''){
                                        $data.="name: 'UN',";
                                        $data.="y: ".$s->COUNT."
                                                },{";
                                    }
                                    else {
                                        $data.="name: '".$s->status."',";
                                        $data.="y: ".$s->COUNT."
                                                },{";
                                    }

                                    ?>

                                    @if($s->status =='')
                                        <tr style="font-weight: bold; color: #012F5C ;" class=" clicked" id="UN">
                                            <td >Under progress</td>
                                            <td style="font-weight: bold;">{{$s->COUNT}}</td>
                                        </tr>
                                    @else
                                        <tr style="font-weight: bold; color: #012F5C ;" class="clicked" id="{{$s->status}}">
                                            <td  >{{$s->STAT}}</td>
                                            <td style="font-weight: bold;">{{$s->COUNT}}</td>
                                        </tr>
                                    @endif

                                @endforeach
                                <?php
                                $data =  substr($data, 0, -3);
                                $data.="}]";

                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col col-sm-6" style="border-right: 1px solid #012f5c !important; ">
                    <div class="card card-success" >
                        <div class="card-header" style="background-color: #012F5C;">
                            <center><h3 class="card-title" style="color: white;">Summary</h3></center>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="container" style="border: 0!important;"></div>
                            <script>
                                Highcharts.setOptions({
                                    colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
                                        return {
                                            radialGradient: {
                                                cx: 0.5,
                                                cy: 0.3,
                                                r: 0.7
                                            },
                                            stops: [
                                                [0, color],
                                                [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
                                            ]
                                        };
                                    })
                                });
                                Highcharts.chart('container', {
                                    chart: {
                                        plotBackgroundColor: null,
                                        plotBorderWidth: null,
                                        plotShadow: true,
                                        type: 'pie'
                                    },
                                    title: {
                                        text: ''
                                    },
                                    tooltip: {
                                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                                    },
                                    plotOptions: {
                                        pie: {
                                            allowPointSelect: true,
                                            cursor: 'pointer',
                                            dataLabels: {
                                                enabled: true,
                                                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                                style: {
                                                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                                },
                                                connectorColor: 'silver'
                                            },
                                            showInLegend: true,
                                            colors: [
                                                '#1D3357',
                                                '#D17D36',
                                                '#a8882f',
                                                '#4972d1',
                                                '#453ec9',
                                                '#FCD304',
                                                '#FFF263',
                                                '#aa95f0'
                                            ],
                                        }
                                    },
                                    series: [{
                                        name: 'Status',
                                        colorByPoint: true,
                                        data: <?php echo $data; ?>,
                                        point:{
                                            events:{
                                                click: function (event) {
                                                    // alert(this.name );
                                                    location.href = "./corporate/"+this.name+"/status";
                                                }
                                            }
                                        }
                                    }]
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            </section>
    </div>
@endsection

