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
                                <label for="exampleInputEmail2">Email</label>
                                <input type="text" name="email" class="form-control"
                                    value="{{ !empty($items->email) ? $items->email : '' }}" id="exampleInputEmail2"
                                    placeholder="Enter Email">
                            </div>
                            <div class="form-group">
                                <label for="changepassword">Password</label>
                                <div class="row">
                                    <div class="col-md-9">
                                        <input type="password" name="password" class="form-control" value=""
                                            id="passwordform" placeholder="Enter Password" {{ $readonly }} required>
                                    </div>
                                    <div class="col-md-3">
                                        @if ($url == 'editactionusers')
                                            <div class="icheck-success icheck-inline">
                                                <input name="change_password" type="checkbox" id="changepassword">
                                                <label for="changepassword">Change Password</label>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Alamat</label>
                                <input type="text" name="alamat" class="form-control"
                                    value="{{ !empty($items->alamat) ? $items->alamat : '' }}" id="exampleInputEmail3"
                                    placeholder="Enter Alamat">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail4">No HP</label>
                                <input type="text" name="no_hp" class="form-control"
                                    value="{{ !empty($items->no_hp) ? $items->no_hp : '' }}" id="exampleInputEmail4"
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
                            <a class="btn btn-outline-danger" href="{{ url('users') }}"><i
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
