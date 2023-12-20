@include('partials.header')
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Lokasi</h3>
                        <a class="btn btn-sm btn-outline-success float-right" href="{{ url('addlokasi') }}">
                            <i class="fa-solid fa-plus"></i> ADD DATA
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover table-sm text-center">
                            <thead class="bg-secondary">
                                <tr>
                                    <th>Lokasi</th>
                                    <th>Deskripsi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $item->lokasi }}</td>
                                        <td>{{ $item->deskripsi }}
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <a class="btn btn-sm btn-block btn-outline-warning"
                                                        href="{{ url("editlokasi/{$item->id}") }}"><i
                                                            class="fa-solid fa-pen-to-square"></i> Edit</a>
                                                </div>
                                                <div class="col-md-6">
                                                    <a class="btn btn-sm btn-block btn-outline-danger"
                                                        href="{{ url("deletelokasi/{$item->id}") }}"><i
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
