@include('partials.header')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fa-solid fa-circle-info"></i>
                            Information
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card bg-default">
                                    <div class="card-header border-0">
                                        <h3 class="card-title">
                                            <i class="far fa-calendar-alt"></i>
                                            Calendar Booking
                                        </h3>
                                        <!-- tools card -->
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-success btn-sm"
                                                data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                        <!-- /. tools -->
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body pt-0">
                                        <!--The calendar -->
                                        <div id="calendar" style="width: 100%"></div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row justify-content-center">
                                    <div class="col-lg-12 col-12">
                                        <!-- small box -->
                                        <div class="small-box bg-default">
                                            <div class="inner">
                                                <h3>{{ $today_request_booking }}</h3>
                                                <p>Today Request Booking</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-person-add"></i>
                                            </div>
                                            <a href="{{ url('booking?status=requested') }}"
                                                class="small-box-footer text-dark">More info
                                                <i class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-12">
                                        <!-- small box -->
                                        <div class="small-box bg-default">
                                            <div class="inner">
                                                <h3>{{ $today_request_maintenance }}</h3>
                                                <p>Today Request Maintenance</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-person-add"></i>
                                            </div>
                                            <a href="{{ url('maintenance?status=pending') }}"
                                                class="small-box-footer text-dark">More info
                                                <i class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fa-solid fa-toolbox"></i>
                            Total Booking & Maintenance Status
                        </h3>
                    </div>
                    <div class="card-body">
                        <h5 class=" mb-2"></h5>
                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>{{ $booking_done }}</h3>
                                        <p>Done Booking</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="{{ url('booking?status=done') }}" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>{{ $booking_approved }}</h3>
                                        <p>Approved Booking</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a href="{{ url('booking?status=approved') }}" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3>{{ $booking_requested }}</h3>
                                        <p>Request Booking</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                    <a href="{{ url('booking?status=requested') }}" class="small-box-footer">More info
                                        <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3>{{ $booking_rejected }}</h3>
                                        <p>Rejected Booking</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-pie-graph"></i>
                                    </div>
                                    <a href="{{ url('booking?status=rejected') }}" class="small-box-footer">More info
                                        <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                        </div>
                        <h5 class=" mb-2"></h5>
                        <!-- /.row -->
                        <div class="row">
                            <div class="col-4">
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3>{{ $maintenance_pending }}</h3>
                                        <p>Pending Maintenance</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="{{ url('maintenance?status=pending') }}" class="small-box-footer">More
                                        info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>{{ $maintenance_on_progress }}</h3>
                                        <p>On Progress Maintenance</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="{{ url('maintenance?status=on-progress') }}" class="small-box-footer">More
                                        info
                                        <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>{{ $maintenance_done }}</h3>
                                        <p>Done Maintenance</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="{{ url('maintenance?status=done') }}" class="small-box-footer">More info
                                        <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fa-regular fa-chart-bar"></i>
                            Chart
                        </h3>
                    </div>
                    <div class="card-body">
                        <h5 class=" mb-2"></h5>
                        <div class="row">
                            <div class="col-4">
                                <div class="card card-default">
                                    <div class="card-header">
                                        <h3 class="card-title">Total Booking Chart in Year</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart">
                                            <canvas id="barChart"
                                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card card-default">
                                    <div class="card-header">
                                        <h3 class="card-title">Total Maintenance Chart in Year</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart">
                                            <canvas id="barChartMaintenance"
                                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card card-default">
                                    <div class="card-header">
                                        <h3 class="card-title">Total Vehicle Usage Charts</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart">
                                            <canvas id="barChartVehicleUsage"
                                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@include('partials.footer')
