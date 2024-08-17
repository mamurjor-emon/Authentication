@extends('layouts.app')
@section('title', $title)
@push('styles')
    <style>
        .fw-bolder {
            font-weight: 600;
        }

        #visitorUsers .apexcharts-toolbar {
            display: none !important;
        }

        #createdDoctors .apexcharts-menu-icon {
            display: none !important;
        }

        #monthlySubscribers .apexcharts-toolbar {
            display: none !important;
        }

        #monthlyBlogsChart .apexcharts-menu-icon {
            display: none;
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
                                {{ $totalUsers->count() > 0 ? $totalUsers->count() . ' +' : '0' }}</h5>
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
                                {{ $verify_users->count() > 0 ? $verify_users->count() . ' +' : '0' }}</h5>
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
                                {{ $allDoctors->count() > 0 ? $allDoctors->count() . ' +' : '0' }}</h5>
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
                                {{ $cancelDoctors->count() > 0 ? $cancelDoctors->count() . ' +' : '0' }}</h5>
                            <div class="card-icon-wrapper">
                                <i class="material-icons">group_add</i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                    <div class="mdc-card">
                        <div>
                            <h4 class="card-title mb-2 mb-sm-0">Last 30 Days Visitors</h4>
                            <p>Visitors Overview</p>
                        </div>
                        <div class="chart-container">
                            <div id="visitorUsers"></div>
                        </div>
                    </div>
                </div>
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                    <div class="mdc-card">
                        <div>
                            <h4 class="card-title mb-2 mb-sm-0">Last 12 Months Doctors</h4>
                            <p>Doctors Overview</p>
                        </div>
                        <div class="chart-container">
                            <div id="createdDoctors"></div>
                        </div>
                    </div>
                </div>

                <div
                    class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop mdc-layout-grid__cell--span-4-tablet">
                    <div class="mdc-card bg-success text-white">
                        <div class="d-flex justify-content-between">
                            <h3 class="font-weight-normal">Impressions</h3>
                        </div>
                        <div class="mdc-layout-grid__inner align-items-center">
                            <div
                                class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-2-phone">
                                <div>
                                    <h5 class="font-weight-normal mt-2">Customers 58.39k</h5>
                                    <h2 class="font-weight-normal mt-3 mb-0">636,757K</h2>
                                </div>
                            </div>
                            <div
                                class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-8-desktop mdc-layout-grid__cell--span-5-tablet mdc-layout-grid__cell--span-2-phone">
                                <canvas id="impressions-chart" height="80"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop mdc-layout-grid__cell--span-4-tablet">
                    <div class="mdc-card bg-info text-white">
                        <div class="d-flex justify-content-between">
                            <h3 class="font-weight-normal">Traffic</h3>
                        </div>
                        <div class="mdc-layout-grid__inner align-items-center">
                            <div
                                class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-2-phone">
                                <div>
                                    <h5 class="font-weight-normal mt-2">Customers 58.39k</h5>
                                    <h2 class="font-weight-normal mt-3 mb-0">636,757K</h2>
                                </div>
                            </div>
                            <div
                                class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-8-desktop mdc-layout-grid__cell--span-5-tablet mdc-layout-grid__cell--span-2-phone">
                                <canvas id="traffic-chart" height="80"></canvas>
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
                                <h4 class="card-title">Active Docotors</h4>
                                <h6 class="card-sub-title"> Total Active Doctors : {{ $allDoctors->count() }}</h6>
                            </div>
                        </div>
                        <div class="chart-container mt-4">
                            <div id="activeDocotorsChats"></div>
                        </div>
                    </div>
                </div>
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                    <div class="mdc-card">
                        <div>
                            <h4 class="card-title mb-2 mb-sm-0">Last 12 Months Subscribers</h4>
                            <p>Subscribers Overview</p>
                        </div>
                        <div class="chart-container">
                            <div id="monthlySubscribers"></div>
                        </div>
                    </div>
                </div>
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                    <div class="mdc-card">
                        <div>
                            <h4 class="card-title mb-2 mb-sm-0">Last 12 Months Blogs</h4>
                            <p>Blogs Overview</p>
                        </div>
                        <div class="chart-container">
                            <div id="monthlyBlogsChart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@push('scripts')
    <script>
        //Last 30 Days Visitors
        var monthlyVisitorsOptions = {
            series: [{
                name: 'Visitors',
                data: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16",
                    "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30"
                ]
            }],
            chart: {
                height: 350,
                type: 'area'
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                categories: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16",
                    "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30"
                ]
            },
            tooltip: {
                enabled: true,
                y: {
                    formatter: function(value) {
                        return value;
                    },
                },
            },
        };
        var monthlyVisitors = new ApexCharts(document.querySelector("#visitorUsers"), monthlyVisitorsOptions);
        monthlyVisitors.render();
        $.ajax({
            url: "{{ route('admin.dashboard.visitors.count') }}",
            type: 'POST',
            dataType: 'json',
            async: true,
            cache: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                monthlyVisitors.updateSeries([{
                    name: 'usersData',
                    data: data.visitors
                }]);
            }
        });

        //Last 12 Months Doctors
        var createdDoctorsOptions = {
            series: [{
                name: 'Doctors',
                data: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
            }],
            chart: {
                height: 350,
                type: 'bar',
            },
            dataLabels: {
                enabled: false,
                formatter: function(val) {
                    return val;
                },
                offsetY: -20,
                style: {
                    fontSize: '12px',
                    colors: ["#1a76d1"]
                }
            },
            xaxis: {
                categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                position: 'bottom',
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                },
                crosshairs: {
                    fill: {
                        type: 'gradient',
                        gradient: {
                            colorFrom: '#1a76d1',
                            colorTo: '#1a76d1',
                            stops: [0, 100],
                            opacityFrom: 0.4,
                            opacityTo: 0.5,
                        }
                    }
                },
                tooltip: {
                    enabled: true,
                    y: {
                        formatter: function(value) {
                            return value;
                        },
                    },
                },
            },
            yaxis: {
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false,
                },
            },
        };
        var doctorsChart = new ApexCharts(document.querySelector("#createdDoctors"), createdDoctorsOptions);
        doctorsChart.render();
        $.ajax({
            url: "{{ route('admin.dashboard.doctor.count') }}",
            type: 'POST',
            dataType: 'json',
            async: true,
            cache: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                doctorsChart.updateSeries([{
                    name: 'Doctors',
                    data: data.doctorsData
                }]);
            }
        });

        // User Create Chart Bar Request
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
                    columnWidth: "40%",
                    startingShape: "rounded",
                    endingShape: "rounded",
                    borderRadius: 2,
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
            colors: ["#1a76d1"],
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
                    style: {
                        fontSize: "13px",
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

        //Last 12 Months Subscribers
        var monthlySubscribersOptions = {
            series: [{
                name: 'Sales',
                data: [5, 10, 15, 20, 25, 30, 25, 20, 15, 10, 5, 0]
            }],
            chart: {
                height: 350,
                type: 'line',
            },
            forecastDataPoints: {
                count: 7
            },
            stroke: {
                width: 5,
                curve: 'smooth'
            },
            xaxis: {
                categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            },
            title: {
                align: 'left',
                style: {
                    fontSize: "16px",
                    color: '#1a76d1'
                }
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'dark',
                    gradientToColors: ['#1a76d1'],
                    shadeIntensity: 1,
                    type: 'horizontal',
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 100, 100, 100]
                },
            }
        };
        var monthlySubscribersChart = new ApexCharts(document.querySelector("#monthlySubscribers"),
            monthlySubscribersOptions);
        monthlySubscribersChart.render();
        $.ajax({
            url: "{{ route('admin.dashboard.subscriber.count') }}",
            type: 'POST',
            dataType: 'json',
            async: true,
            cache: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                monthlySubscribersChart.updateSeries([{
                    name: 'Subscriber',
                    data: data.subscriberData
                }]);
            }
        });

        //Last 12 Months Blogs
        var monthlyBlogsOptions = {
            series: [{
                data: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            annotations: {
                xaxis: [{
                    x: 500,
                    borderColor: '#1a76d1',
                    label: {
                        borderColor: '#1a76d1',
                        style: {
                            color: '#fff',
                            background: '#1a76d1',
                        },
                        text: 'X annotation',
                    }
                }],
                yaxis: [{
                    y: 'July',
                    y2: 'September',
                    label: {
                        text: 'Y annotation'
                    }
                }]
            },
            plotOptions: {
                bar: {
                    horizontal: true,
                }
            },
            dataLabels: {
                enabled: true
            },
            xaxis: {
                categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            },
            grid: {
                xaxis: {
                    lines: {
                        show: true
                    }
                }
            },
            yaxis: {
                reversed: true,
                axisTicks: {
                    show: true
                }
            }
        };
        var monthlyBlogsChart = new ApexCharts(document.querySelector("#monthlyBlogsChart"), monthlyBlogsOptions);
        monthlyBlogsChart.render();
        $.ajax({
            url: "{{ route('admin.dashboard.blog.count') }}",
            type: 'POST',
            dataType: 'json',
            async: true,
            cache: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                monthlyBlogsChart.updateSeries([{
                    name: 'Blogs',
                    data: data.blogsData
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
                                        color: "#1a76d1",
                                        fontSize: "13px",
                                        fontWeight: "400",
                                    },
                                    value: {
                                        offsetY: 10,
                                        color: "#1a76d1",
                                        fontSize: "38px",
                                        fontWeight: "500",
                                    },
                                },
                            },
                        },
                        colors: ["#1a76d1"],
                        fill: {
                            type: "gradient",
                            gradient: {
                                shade: "dark",
                                shadeIntensity: 0.5,
                                gradientToColors: ["#1a76d1"],
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
        activeDoctors();
    </script>
@endpush
