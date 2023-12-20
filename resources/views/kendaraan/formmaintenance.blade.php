@include('partials.header')
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-info">
                    <form method="post" action="{{ url('addmaintenance') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kendaraan</label>
                                <input type="hidden" name="id_kendaraan" value="{{ $kendaraan->id }}" />
                                <input type="hidden" name="status" value="pending" />
                                <input type="text" class="form-control " id="kendaraan"
                                    value="{{ $kendaraan->nama }}" readonly />
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
@include('partials.footer')
