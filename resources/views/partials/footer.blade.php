</div>
<footer class="main-footer bg-olive">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
</footer>


</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"
    integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"
    integrity="sha512-uKQ39gEGiyUJl4AI6L+ekBdGKpGw4xJ55+xyJG7YFlJokPNYegn9KwQ3P8A7aFQAUtUsAQHep+d/lrGqrbPIDQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/js/adminlte.min.js"
    integrity="sha256-u2yoem2HtOCQCnsp3fO9sj5kUrL+7hOAfm8es18AFjw=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha256-BRqBN7dYgABqtY9Hd4ynE+1slnEw+roEPFzQ7TRRfcg=" crossorigin="anonymous"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js"
    integrity="sha512-k6/Bkb8Fxf/c1Tkyl39yJwcOZ1P4cRrJu77p83zJjN2Z55prbFHxPs9vN7q3l3+tSMGPDdoH51AEU8Vgo1cgAA=="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.0/js/jquery.overlayScrollbars.min.js"
    integrity="sha512-KltPgUHPHUvpLQvgtMveflxNopj998UE0fGQEGXQIKAA7b3SEJj2g832nnrxYDWGA5rbiF2mXX0lFE5Q37/03w=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js"
    integrity="sha512-CQBWl4fJHWbryGE+Pc7UAxWMUMNMWzWxF4SQo9CgkJIN1kx6djDQZjh3Y8SZ1d+6I+1zze6Z7kHXO7q3UyZAWw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">
    var disabledDate = [
        @if (isset($datebooking))
            @foreach ($datebooking as $items)
                "{{ $items }}",
            @endforeach
        @endif
    ];
    $(function() {
        $('#jadwal_servis').datetimepicker({
            minDate: new Date(),
            date: new Date($(this).val()),
            todayHighlight: true,
            locale: 'id',
            format: 'YYYY-MM-DD'
        });
    });
    $(function() {
        $('#requested_date').datetimepicker({
            minDate: new Date(),
            disabledDates: disabledDate,
            date: new Date($(this).val()),
            todayHighlight: true,
            locale: 'id',
            format: 'YYYY-MM-DD'
        });
    });
    $("#changepassword").on("click", function() {
        console.log(new Date("2023-"));
        if ($("#changepassword").is(":checked")) {
            $("#passwordform").prop("readonly", false);
        } else {
            $("#passwordform").prop("readonly", true);
        }
    })
    var barChartOptions = {
        plugins: {
            title: {
                display: true,
                text: new Date().getFullYear()
            },
            legend: {
                display: false,
            }
        },
        responsive: true,
        maintainAspectRatio: false,
        datasetFill: false
    }
    @if (isset($chart_vehicle_booking_bydate))
        const ctx = document.getElementById('barChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                datasets: [{
                    data: {
                        @foreach ($chart_vehicle_booking_bydate as $key => $booking_date)
                            {{ $key . ':' . $booking_date . ',' }}
                        @endforeach
                    }
                }]
            },
            options: barChartOptions
        })
    @endif
    @if (isset($chart_vehicle_maintenance_bydate))
        const ctx_maintenance = document.getElementById('barChartMaintenance').getContext('2d');
        new Chart(ctx_maintenance, {
            type: 'bar',
            data: {
                datasets: [{
                    data: {
                        @foreach ($chart_vehicle_maintenance_bydate as $key_maintenance => $maintenance_date)
                            {{ $key_maintenance . ':' . $maintenance_date . ',' }}
                        @endforeach
                    }
                }]
            },
            options: barChartOptions
        })
    @endif

    @if (isset($chart_vehicle_usage))
        const ctx_vehicle_usage = document.getElementById('barChartVehicleUsage').getContext('2d');
        new Chart(ctx_vehicle_usage, {
            type: 'bar',
            label: "Vehicle Usage",
            data: {
                datasets: [{
                    data: {
                        @foreach ($chart_vehicle_usage as $key_vehicle_usage => $vehicle_usage)
                            {{ $vehicle_usage->nama . ':' . $vehicle_usage->total_usage . ',' }}
                        @endforeach
                    }
                }]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: "Vehicle Usage"
                    },
                    legend: {
                        display: false,
                    }
                },
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false
            }
        })
    @endif

    $('#calendar').datetimepicker({
        format: 'L',
        inline: true,
        disabledDates: disabledDate,
    })

    $(document).ready(function() {
        $(".filter_status").on("change", function() {
            window.location.href = "{{ url('booking') }}?" + $(this).attr("data-name") + "=" + $(this)
                .val();
        });
        $(".maintenance_filter").on("change", function() {
            window.location.href = "{{ url('maintenance') }}?" + $(this).attr("data-name") + "=" + $(
                    this)
                .val();
        });
    });
</script>
</body>

</html>
