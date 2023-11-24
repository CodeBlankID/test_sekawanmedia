@include('partials.header')
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-info">
                    @php
                        if (!empty($items->id)) {
                            $readonly = 'readonly';
                            $url = 'editactionusers';
                        } else {
                            $readonly = '';
                            $url = 'addactionusers';
                        }
                    @endphp
                    <form method="post" action="{{ url($url) }}">
                        <input type="hidden" name="id" value="{{ !empty($items->id) ? $items->id : '' }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ !empty($items->name) ? $items->name : '' }}" id="exampleInputEmail1"
                                    placeholder="Enter Nama">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" name="email" class="form-control"
                                    value="{{ !empty($items->email) ? $items->email : '' }}" id="exampleInputEmail1"
                                    placeholder="Enter Email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="password" name="password" class="form-control"
                                    value="{{ !empty($items->password) ? $items->password : '' }}"
                                    id="exampleInputEmail1" placeholder="Enter Password" {{ $readonly }}>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Alamat</label>
                                <input type="text" name="alamat" class="form-control"
                                    value="{{ !empty($items->alamat) ? $items->alamat : '' }}" id="exampleInputEmail1"
                                    placeholder="Enter Alamat">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">No HP</label>
                                <input type="text" name="no_hp" class="form-control"
                                    value="{{ !empty($items->no_hp) ? $items->no_hp : '' }}" id="exampleInputEmail1"
                                    placeholder="Enter No HP">
                            </div>
                            <div class="form-group">
                                <label>Jabatan</label>
                                <select class="form-control" name="id_jabatan">
                                    @foreach ($jabatan as $itemjabatan)
                                        <option value="{{ $itemjabatan->id }}"
                                            {{ !empty($items->id_jabatan) && $items->id_jabatan == $itemjabatan->id ? 'selected' : '' }}>
                                            {{ $itemjabatan->jabatan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Level</label>
                                <select class="form-control" name="level">
                                    <option value="admin"
                                        {{ !empty($items->level) && $items->level == 'admin' ? 'Selected' : '' }}>Admin
                                    </option>
                                    <option value="pegawai"
                                        {{ !empty($items->level) && $items->level == 'pegawai' ? 'Selected' : '' }}>
                                        Pegawai</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option value="1"
                                        {{ isset($items->status) && $items->status == '1' ? 'Selected' : '' }}>
                                        Active</option>
                                    <option value="0"
                                        {{ isset($items->status) && $items->status == '0' ? 'Selected' : '' }}>Not
                                        Active</option>
                                </select>
                            </div>

                        </div>
                        <div class="card-footer">
                            <a class="btn btn-outline-danger" href="{{ url('lokasi') }}">Back</a>
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@include('partials.footer')
