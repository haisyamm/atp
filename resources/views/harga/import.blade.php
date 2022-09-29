@extends('layouts.lm_admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card-header d-flex justify-content-between text-white" style="background-color: #006a4e;">
            <h3>Import Bulk Tarif</h3>
            <a class="btn btn-secondary" href="{{asset('excel/import_template_price.xlsx')}}">Download</a>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body py-4 px-4">
                <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group mb-4">
                        <div class="custom-file text-left">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                            <input type="file" name="file" class="custom-file-input" id="customFile">
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