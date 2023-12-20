@include('partials.header')
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-info">
                    @php
                        if (!empty($items->id)) {
                            $readonly = 'readonly';
                            $url = 'editactionkendaraan';
                        } else {
                            $readonly = '';
                            $url = 'addactionkendaraan';
                        }
                    @endphp
                    <form method="post" action="{{ url($url) }}">
                        <input type="hidden" name="id" value="{{ !empty($items->id) ? $items->id : '' }}">
                        <input type="hidden" name="status" value="available">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama</label>
                                <input type="text" name="nama" class="form-control"
                                    value="{{ !empty($items->nama) ? $items->nama : '' }}" id="exampleInputEmail1"
                                    placeholder="Enter Nama">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kategori</label>
                                <select class="form-control" name="kategori">
                                    <option value="sewa">Sewa</option>
                                    <option value="asset">Asset</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jenis</label>
                                <input type="text" name="jenis" class="form-control"
                                    value="{{ !empty($items->jenis) ? $items->jenis : '' }}" id="exampleInputEmail1"
                                    placeholder="Enter Jenis Kendaraan">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nomor Kendaraan</label>
                                <input type="text" name="nomor" class="form-control"
                                    value="{{ !empty($items->nomor) ? $items->nomor : '' }}" id="exampleInputEmail1"
                                    placeholder="Enter Nomor kendaraan">
                            </div>
                            <div class="form-group">
                                <label>Lokasi</label>
                                <select class="form-control" name="id_lokasi">
                                    @foreach ($lokasi as $item)
                                        <option value="{{ $item->id }}"
                                            {{ !empty($items->id_lokasi) && $item->id == $items->id_lokasi ? 'selected' : '' }}>
                                            {{ $item->lokasi }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jadwal Service</label>
                                <div class="input-group">
                                    <input type="text" class="form-control datetimepicker-input" id="jadwal_servis"
                                        data-toggle="datetimepicker" data-target="#jadwal_servis" name="jadwal_servis"
                                        value="{{ !empty($items->jadwal_servis) ? $items->jadwal_servis : '' }}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" row="5">{{ !empty($items->deskripsi) ? $items->deskripsi : '' }}</textarea>
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
