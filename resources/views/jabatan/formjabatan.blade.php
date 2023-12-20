@include('partials.header')
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-info">
                    @php
                        if (!empty($items->id)) {
                            $url = 'editactionjabatan';
                        } else {
                            $url = 'addactionjabatan';
                        }
                    @endphp
                    <form method="post" action="{{ url($url) }}">
                        <input type="hidden" name="id" value="{{ !empty($items->id) ? $items->id : '' }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jabatan</label>
                                <input type="text" name="jabatan" class="form-control"
                                    value="{{ !empty($items->jabatan) ? $items->jabatan : '' }}" id="exampleInputEmail1"
                                    placeholder="Enter Jabatan">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" rows="10" placeholder="Enter Deskripsi">{{ !empty($items->deskripsi) ? $items->deskripsi : '' }}</textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-outline-danger" href="{{ url('jabatan') }}"><i
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
