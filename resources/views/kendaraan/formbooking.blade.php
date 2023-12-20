@include('partials.header')
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-info">
                    <form method="post" action="{{ url('addbooking') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kendaraan</label>
                                <input type="hidden" name="id_kendaraan" value="{{ $kendaraan->id }}" />
                                <input type="text" class="form-control " id="kendaraan"
                                    value="{{ $kendaraan->nama }}" readonly />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail2">Select Approval User</label>
                                <select class="form-control" name="booking_status_by">
                                    @foreach ($users as $usersitems)
                                        <option value="{{ $usersitems->id }}">{{ $usersitems->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail6">Select Driver</label>
                                <select class="form-control" name="id_driver">
                                    @foreach ($users as $usersitems)
                                        <option value="{{ $usersitems->id }}">{{ $usersitems->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail7">Booking Date</label>
                                <div class="input-group">
                                    <input type="text" class="form-control datetimepicker-input" id="requested_date"
                                        data-toggle="datetimepicker" data-target="#requested_date"
                                        name="requested_date" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Durasi <p class="d-inline text-sm font-italic">(day)</p>
                                </label>
                                <input type="number" name="durasi" class="form-control" id="exampleInputEmail13"
                                    placeholder="Enter Durasi">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail4">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" id="exampleInputEmail4" placeholder="Enter Deskripsi"></textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-outline-danger" href="{{ url('kendaraan') }}"><i
                                    class="fa-solid fa-rotate-left"></i> Back</a>
                            <button type="submit" class="btn btn-primary float-right"><i
                                    class="fa-solid fa-floppy-disk"></i> Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@include('partials.footer', $datebooking)
