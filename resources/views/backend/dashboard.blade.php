@extends('backend.master')
@section('content')
    <div class="vb__utils__content">
        <div class="row">
            <div class="col-lg-12">
                <div class="vb__utils__heading">
                    <strong class="text-uppercase font-size-16">Today Statistics</strong>
                </div>
                <div class="row">
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body position-relative overflow-hidden">
                                <div class="font-size-36 font-weight-bold text-dark mb-n2">1240</div>
                                <div class="text-uppercase">Transactions</div>
                                <div class="vb__c11__chartContainer">
                                    <div class="vb__c11__chart ct-hidden-points"></div>
                                </div>
                            </div>
                            <script>
                                /////////////////////////////////////////////////////////////////////////////////////////
                                // "Chart Widget 11" module scripts

                                ; (function ($) {
                                    'use strict'
                                    $(function () {
                                        new Chartist.Line(
                                            '.vb__c11__chart',
                                            {
                                                series: [
                                                    {
                                                        className: 'ct-series-a',
                                                        data: [2, 11, 8, 14, 18, 20, 26],
                                                    },
                                                ],
                                            },
                                            {
                                                width: '120px',
                                                height: '107px',

                                                showPoint: true,
                                                showLine: true,
                                                showArea: true,
                                                fullWidth: true,
                                                showLabel: false,
                                                axisX: {
                                                    showGrid: false,
                                                    showLabel: false,
                                                    offset: 0,
                                                },
                                                axisY: {
                                                    showGrid: false,
                                                    showLabel: false,
                                                    offset: 0,
                                                },
                                                chartPadding: 0,
                                                low: 0,
                                                plugins: [Chartist.plugins.tooltip()],
                                            },
                                        )
                                    })
                                })(jQuery)
                            </script>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body position-relative overflow-hidden">
                                <div class="font-size-36 font-weight-bold text-dark mb-n2">$256.12</div>
                                <div class="text-uppercase">Income</div>
                                <div class="vb__c11-1__chartContainer">
                                    <div class="vb__c11-1__chart ct-hidden-points"></div>
                                </div>
                            </div>
                            <script>
                                /////////////////////////////////////////////////////////////////////////////////////////
                                // "Chart Widget 11-1" module scripts

                                ; (function ($) {
                                    'use strict'
                                    $(function () {
                                        new Chartist.Line(
                                            '.vb__c11-1__chart',
                                            {
                                                series: [
                                                    {
                                                        className: 'ct-series-a',
                                                        data: [20, 80, 67, 120, 132, 66, 97],
                                                    },
                                                ],
                                            },
                                            {
                                                width: '120px',
                                                height: '107px',

                                                showPoint: true,
                                                showLine: true,
                                                showArea: true,
                                                fullWidth: true,
                                                showLabel: false,
                                                axisX: {
                                                    showGrid: false,
                                                    showLabel: false,
                                                    offset: 0,
                                                },
                                                axisY: {
                                                    showGrid: false,
                                                    showLabel: false,
                                                    offset: 0,
                                                },
                                                chartPadding: 0,
                                                low: 0,
                                                plugins: [Chartist.plugins.tooltip()],
                                            },
                                        )
                                    })
                                })(jQuery)
                            </script>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body position-relative overflow-hidden">
                                <div class="font-size-36 font-weight-bold text-dark mb-n2">$56.12</div>
                                <div class="text-uppercase">Outcome</div>
                                <div class="vb__c11-2__chartContainer">
                                    <div class="vb__c11-2__chart ct-hidden-points"></div>
                                </div>
                            </div>
                            <script>
                                /////////////////////////////////////////////////////////////////////////////////////////
                                // "Chart Widget 11-2" module scripts

                                ; (function ($) {
                                    'use strict'
                                    $(function () {
                                        new Chartist.Line(
                                            '.vb__c11-2__chart',
                                            {
                                                series: [
                                                    {
                                                        className: 'ct-series-a',
                                                        data: [42, 40, 80, 67, 84, 20, 97],
                                                    },
                                                ],
                                            },
                                            {
                                                width: '120px',
                                                height: '107px',

                                                showPoint: true,
                                                showLine: true,
                                                showArea: true,
                                                fullWidth: true,
                                                showLabel: false,
                                                axisX: {
                                                    showGrid: false,
                                                    showLabel: false,
                                                    offset: 0,
                                                },
                                                axisY: {
                                                    showGrid: false,
                                                    showLabel: false,
                                                    offset: 0,
                                                },
                                                chartPadding: 0,
                                                low: 0,
                                                plugins: [Chartist.plugins.tooltip()],
                                            },
                                        )
                                    })
                                })(jQuery)
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="vb__utils__heading mb-0">
                            <strong>Recently Referrals</strong>
                        </div>
                        <div class="text-muted">
                            Block with important Recently Referrals information
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="thead-default">
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Age</th>
                                    <th>Office</th>
                                    <th>Date</th>
                                    <th>Salary</th>
                                </tr>
                                </thead>
                                <tr>
                                    <td>Damon</td>
                                    <td>5516 Adolfo Green</td>
                                    <td>18</td>
                                    <td>Littelhaven</td>
                                    <td>2014/06/13</td>
                                    <td>553.536</td>
                                </tr>
                                <tr>
                                    <td>Miracle</td>
                                    <td>176 Hirthe Squares</td>
                                    <td>35</td>
                                    <td>Ryleetown</td>
                                    <td>2013/09/27</td>
                                    <td>784.802</td>
                                </tr>
                                <tr>
                                    <td>Torrey</td>
                                    <td>1995 Richie Neck</td>
                                    <td>15</td>
                                    <td>West Sedrickstad</td>
                                    <td>2014/09/12</td>
                                    <td>344.302</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
