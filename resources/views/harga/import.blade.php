@extends('layouts.lm_admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card-header d-flex justify-content-between text-white" style="background-color: #006a4e;">
            <h3>{{ isset($harga->id) ? "Edit" : "Tambah"  }} Tarif</h3>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body py-4 px-4">
                <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                        <div class="custom-file text-left">
                            <input type="file" name="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a class="btn btn-danger" href="{{route('master-harga')}}">BACK</a>
                        <button class="btn btn-primary ms-3" type="submit">IMPORT</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
@endpush