@include('partials.header')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Users</h3>
                        <a class="btn btn-sm btn-outline-success float-right" href="{{ url('addusers') }}">
                            <i class="fa-solid fa-plus"></i> ADD DATA
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered  table-hover table-sm text-center">
                            <thead class="bg-secondary">
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th>No Hp</th>
                                    <th>Jabatan</th>
                                    <th>Level</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}
                                        </td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->no_hp }}</td>
                                        <td>{{ $item->nama_jabatan }}</td>
                                        <td>{{ $item->level }}</td>
                                        <td>{{ $item->status == '1' ? 'Active' : 'Not Active' }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <a class="btn btn-sm btn-block btn-outline-warning"
                                                        href="{{ url("editusers/{$item->id}") }}"><i
                                                            class="fa-solid fa-pen-to-square"></i> Edit</a>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <a class="btn btn-sm btn-block btn-outline-danger"
                                                        href="{{ url("deleteusers/{$item->id}") }}"><i
                                                            class="fa-solid fa-trash"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('partials.footer')
