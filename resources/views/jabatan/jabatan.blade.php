@include('partials.header')
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Jabatan</h3>
                        <a class="btn  btn-sm btn-outline-success float-right" href="{{ url('addjabatan') }}">
                            <i class="fa-solid fa-plus"></i> ADD DATA
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover table-sm text-center">
                            <thead class="bg-secondary">
                                <tr>
                                    <th>Jabatan</th>
                                    <th>Deskripsi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $item->jabatan }}</td>
                                        <td>{{ $item->deskripsi }}
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <a class="btn btn-sm btn-block btn-outline-warning"
                                                        href="{{ url("editjabatan/{$item->id}") }}"><i
                                                            class="fa-solid fa-pen-to-square"></i> Edit</a>
                                                </div>
                                                <div class="col-md-6">
                                                    <a class="btn btn-sm btn-block  btn-outline-danger"
                                                        href="{{ url("deletejabatan/{$item->id}") }}"><i
                                                            class="fa-solid fa-trash"></i> Delete</a>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
@include('partials.footer')
