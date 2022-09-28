@extends('layouts.lm_admin')
@section('content')
    <div class="row p-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Data Pelanggan</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('pelanggan.update', $data->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group mb-3">
                            <label class="small fw-bolder text-uppercase">Nama lengkap:</label>
                            <input type="text" name="nama" class="form-control mt-2"
                                value="{{ $data->nama }}">
                        </div>
                        <div class="form-group mb-3">
                            <label class="small fw-bolder text-uppercase">Alamat:</label>
                            <div class="form-select mt-2">
                                <select name="alamat" class="distric form-select">
                                    <option value="{{ $data->add->id.':'.$data->add->alamat_1 }}">{{ $data->add->alamat_1 }}</option>
                                </select>
                                <input type="text" name="alamat2" id="alamat2" class="form-control mt-2" value="{{ $data->add->alamat_2 }}">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="small fw-bolder text-uppercase">No Telp:</label>
                            <input type="number" name="no_tlp" class="form-control mt-2"
                            value="{{ $data->no_tlp }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@push('script')
    <script>
        $('.distric').select2({
            placeholder: 'Pilih Kecamatan',
            theme: "bootstrap",
            ajax: {
                url: '{{ route('distric') }}',
                dataType: 'json',
                delay: 250,

                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });
    </script>
@endpush
