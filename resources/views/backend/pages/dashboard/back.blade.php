@extends('layouts.app')
@section('title', $title)
@push('styles')
    <style>
        .fw-bolder {
            font-weight: 600;
        }

        #arrow {
            position: relative;
            display: block;
            width: 10px;
            -webkit-animation: moveit 2.5s infinite;
            animation: moveit 2.5s infinite;
        }

        @-webkit-keyframes moveit {
            from {
                left: 0%;
                opacity: 0;
            }
            25% {
                left: 25%;
                opacity: 1;
            }
            50% {
                left: 50%;
                opacity: 1;
            }
            75% {
                left: 75%;
                opacity: 1;
            }
            100% {
                left: 100%;
                opacity: 1;
            }
            to {
                left: 0%;
                opacity: 0;
            }
        }

        @keyframes moveit {
            from {
                left: 0%;
                opacity: 0;
            }
            25% {
                left: 25%;
                opacity: 1;
            }
            50% {
                left: 50%;
                opacity: 1;
            }
            75% {
                left: 75%;
                opacity: 1;
            }
            100% {
                left: 100%;
                opacity: 1;
            }
            to {
                left: 0%;
                opacity: 0;
            }
        }
    </style>
@endpush
@section('content')
    <main class="content-wrapper">
        <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
                <div
                    class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                    <div class="mdc-card info-card info-card--primary">
                        <div class="card-inner">
                            <h5 class="card-title">Total Users</h5>
                            <h5 class="pb-2 mb-1 border-bottom fw-bolder">
                                {{ $totalUsers->count() > 0 ? $totalUsers->count() . ' +' : '' }}</h5>
                                <i id="arrow" class="fa fa-long-arrow-down fa-2x">hh</i>
                            <div class="card-icon-wrapper">
                                <i class="material-icons">group_add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                    <div class="mdc-card info-card info-card--success">
                        <div class="card-inner">
                            <h5 class="card-title">Verified User</h5>
                            <h5 class="pb-2 mb-1 border-bottom fw-bolder">
                                {{ $verify_users->count() > 0 ? $verify_users->count() . ' +' : '' }}</h5>
                            <p class="tx-12 text-muted">55% target reached</p>
                            <div class="card-icon-wrapper">
                                <i class="material-icons">verified_user</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                    <div class="mdc-card info-card info-card--primary">
                        <div class="card-inner">
                            <h5 class="card-title">Total Doctors</h5>
                            <h5 class="pb-2 mb-1 border-bottom fw-bolder">
                                {{ $allDoctors->count() > 0 ? $allDoctors->count() . ' +' : '' }}</h5>
                            <p class="tx-12 text-muted">87% target reached</p>
                            <div class="card-icon-wrapper">
                                <i class="material-icons">group_add</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                    <div class="mdc-card info-card info-card--danger">
                        <div class="card-inner">
                            <h5 class="card-title">Cancel Doctors</h5>
                            <h5 class="pb-2 mb-1 border-bottom fw-bolder">
                                {{ $cancelDoctors->count() > 0 ? $cancelDoctors->count() . ' +' : '' }}</h5>
                            <p class="tx-12 text-muted">87% target reached</p>
                            <div class="card-icon-wrapper">
                                <i class="material-icons">group_add</i>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-8">
                    <div class="mdc-card">
                        <div>
                            <h4 class="card-title mb-2 mb-sm-0">Last 12 Months Overview</h4>
                            <p>User Create Overview</p>
                        </div>
                        <div class="chart-container mt-4">
                            <div id="MonthlyUserCreateReport" class="mt-3"></div>
                        </div>
                    </div>
                </div>
                <div
                    class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4 mdc-layout-grid__cell--span-8-tablet">
                    <div class="mdc-card">
                        <div class="d-flex d-lg-block d-xl-flex justify-content-between">
                            <div>
                                <h4 class="card-title">Order Statistics</h4>
                                <h6 class="card-sub-title">Customers 58.39k</h6>
                            </div>
                        </div>
                        <div class="chart-container mt-4">
                            <div id="activeDocotorsChats"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@push('scripts')
    <script>
        var MonthlyUserCreateOptions = {
            chart: {
                height: 320,
                parentHeightOffset: 0,
                type: "bar",
                toolbar: {
                    show: false,
                },
            },
            plotOptions: {
                bar: {
                    barHeight: "60%",
                    columnWidth: "38%",
                    startingShape: "rounded",
                    endingShape: "rounded",
                    borderRadius: 4,
                    distributed: true,
                },
            },
            grid: {
                show: false,
                padding: {
                    top: -30,
                    bottom: 0,
                    left: -10,
                    right: -10,
                },
            },
            colors: ["#7367f0"],
            dataLabels: {
                enabled: false,
            },
            series: [{
                data: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
            }, ],
            legend: {
                show: false,
            },
            xaxis: {
                categories: [
                    "Jan",
                    "Feb",
                    "Mar",
                    "Apr",
                    "May",
                    "Jun",
                    "Jul",
                    "Aug",
                    "Sep",
                    "Oct",
                    "Nov",
                    "Dec",
                ],
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
                labels: {
                    className: "font-class",
                    style: {
                        colors: "#7367f0",
                        fontSize: "13px",
                        // fontFamily: 'nunito'
                    },
                },
            },
            yaxis: {
                labels: {
                    show: false,
                },
            },
            tooltip: {
                enabled: true,
                y: {
                    formatter: function(value) {
                        return value;
                    },
                },
            },
            responsive: [{
                breakpoint: 1025,
                options: {
                    chart: {
                        height: 199,
                    },
                },
            }, ],
        };
        var MonthlyUserCreateCharts = new ApexCharts(document.querySelector("#MonthlyUserCreateReport"),
            MonthlyUserCreateOptions);
        MonthlyUserCreateCharts.render();
        // User Create Chart Bar Request
        $.ajax({
            url: "{{ route('admin.dashboard.users.count') }}",
            type: 'POST',
            dataType: 'json',
            async: true,
            cache: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                MonthlyUserCreateCharts.updateSeries([{
                    name: 'usersData',
                    data: data.usersData
                }]);
            }
        });


        // Active Doctors Chart
        function activeDoctors() {
            $.ajax({
                url: "{{ route('admin.dashboard.active.doctor.count') }}",
                type: 'POST',
                dataType: 'json',
                async: true,
                cache: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    var activeDoctorsOptions = {
                        series: [data && data.totalPersentage],
                        labels: ["Active Doctors"],
                        chart: {
                            height: 360,
                            type: "radialBar",
                        },
                        plotOptions: {
                            radialBar: {
                                offsetY: 10,
                                startAngle: -140,
                                endAngle: 130,
                                hollow: {
                                    size: "65%",
                                },
                                track: {
                                    background: "tranparent",
                                    strokeWidth: "100%",
                                },
                                dataLabels: {
                                    name: {
                                        offsetY: -20,
                                        color: "#7367f0",
                                        fontSize: "13px",
                                        fontWeight: "400",
                                    },
                                    value: {
                                        offsetY: 10,
                                        color: "#7367f0",
                                        fontSize: "38px",
                                        fontWeight: "500",
                                    },
                                },
                            },
                        },
                        colors: ["#7367f0"],
                        fill: {
                            type: "gradient",
                            gradient: {
                                shade: "dark",
                                shadeIntensity: 0.5,
                                gradientToColors: ["#7367f0"],
                                inverseColors: true,
                                opacityFrom: 1,
                                opacityTo: 0.6,
                                stops: [30, 70, 100],
                            },
                        },
                        stroke: {
                            dashArray: 10,
                        },
                        grid: {
                            padding: {
                                top: -20,
                                bottom: 5,
                            },
                        },
                        states: {
                            hover: {
                                filter: {
                                    type: "none",
                                },
                            },
                            active: {
                                filter: {
                                    type: "none",
                                },
                            },
                        },
                        responsive: [{
                                breakpoint: 1025,
                                options: {
                                    chart: {
                                        height: 330,
                                    },
                                },
                            },
                            {
                                breakpoint: 769,
                                options: {
                                    chart: {
                                        height: 280,
                                    },
                                },
                            },
                        ],
                    };
                    const activeDocotorsChats = new ApexCharts(document.querySelector("#activeDocotorsChats"),
                        activeDoctorsOptions);
                    activeDocotorsChats.render();
                }
            });
        }
        activeDoctors()
    </script>
@endpush
