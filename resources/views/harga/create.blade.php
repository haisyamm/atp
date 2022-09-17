@extends('layouts.lm_admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="px-3">
            <h2>{{ isset($harga->id) ? "Edit" : "Tambah"  }} Tarif</h2>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body py-4 px-4">
                <div class="h3 fw-bolder text-uppercase col-md-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="me-1 mb-1" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="12" cy="12" r="1"></circle>
                        <circle cx="12" cy="12" r="9"></circle>
                    </svg>
                    Rute
                </div>
                <div class="ps-1">
                    <input type="hidden" name="p_id" id="p_id" value="{{ isset($harga->id) ? $harga->id : ''  }}">
                    <div class="row" style="margin-top: 25px;">
                        <div class="col-md-9 form-select mb-3" style="width: 60%;">
                            <label for="alamat_asal" class="small fw-bolder text-uppercase">Asal</label>
                            <select name="alamat_asal" id="alamat_asal" class="distric form-control mt-1">
                                @if(isset($harga->alamat_asal))
                                <option value="{{ $harga->alamat_asal }}">{{ $harga->alamat_asal }}</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-md-3 form-group mb-3">
                            <label for="asal_area" class="small fw-bolder text-uppercase">Kode Area Asal</label>
                            <input type="text" name="asal_area" id="asal_area" class="form-control mt-1" placeholder="Masukan Kode Area Asal" value="{{ isset($harga->id) ? $harga->asal_area : ''  }}">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-9 form-select mb-3" style="width: 60%;">
                            <label for="alamat_tujuan" class="small fw-bolder text-uppercase"> Tujuan</label>
                            <select name="alamat_tujuan" id="alamat_tujuan" class="distric form-control mt-1">
                                @if(isset($harga->alamat_tujuan))
                                <option value="{{ $harga->alamat_tujuan }}">{{ $harga->alamat_tujuan }}</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-md-3 form-group mb-3">
                            <label for="tujuan_area" class="small fw-bolder text-uppercase">Kode Area Tujuan</label>
                            <input type="text" name="tujuan_area" id="tujuan_area" class="form-control mt-1" placeholder="Masukan Kode Area Tujuan" value="{{ isset($harga->id) ? $harga->tujuan_area : ''  }}">
                        </div>
                    </div>
                </div>
                <div class="h3 fw-bolder text-uppercase col-md-6" style="margin-top: 25px;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="me-1 mb-1" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="12" cy="12" r="1"></circle>
                        <circle cx="12" cy="12" r="9"></circle>
                    </svg>
                    Estimasi, Servis & Tarif
                </div>
                <div class="ps-1">
                    <div class="row" style="margin-top: 25px;">
                        <div class="col-md-4 form-group mb-3">
                            <label for="estimasi" class="small fw-bolder text-uppercase">Leadtime</label>
                            <input type="text" name="estimasi" id="estimasi" class="form-control mt-1" placeholder="Masukan Estimasi" value="{{ isset($harga->id) ? $harga->estimasi : ''  }}">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-4 form-group mb-3">
                            <label for="servis" class="small fw-bolder text-uppercase">Servis</label>
                            <select name="servis" id="servis" class="form-control mt-1">
                                <option value="{{ isset($harga->servis) ? $harga->servis : ''  }}" selected disabled>{{ isset($harga->harga) ? config('servis')[$harga->servis] : 'Pilih Servis'  }}</option>
                                @foreach(config('servis') as $key => $servis)
                                <option value="{{$key}}">{{$servis}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-4 form-group mb-3">
                            <label for="harga" class="small fw-bolder text-uppercase">Tarif /KG</label>
                            <input type="text" name="harga" id="harga" class="form-control mt-1" placeholder="Masukan Tarif" value="{{ isset($harga->harga) ? $harga->harga : ''  }}">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-danger" onclick="history.back()">CANCEL</button>
                    <button class="btn btn-primary ms-3" onclick="onCreateAsset()">{{ isset($harga->id) ? 'UPDATE' : 'ADD'  }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script>
    // $('.provinsi').select2({
    // placeholder: 'Pilih Provinsi',
    // theme: "bootstrap",
    // ajax: {
    //     url: '{{route("provinsi")}}',
    //     dataType: 'json',
    //     delay: 250,
    //     processResults: function (data) {
    //         return {
    //             results: $.map(data, function (item) {
    //                 return {
    //                     text: item.name,
    //                     id: item.id
    //                 }
    //             })
    //         };
    //     },
    //     cache: true
    // }
    // });

    // $('.city').select2({
    // placeholder: 'Pilih Kota',
    // theme: "bootstrap",
    // ajax: {
    //     url: '{{route("city")}}',
    //     dataType: 'json',
    //     delay: 250,
    //     processResults: function (data) {
    //         return {
    //             results: $.map(data, function (item) {
    //                 return {
    //                     text: item.name,
    //                     id: item.id
    //                 }
    //             })
    //         };
    //     },
    //     cache: true
    // }
    // });

    $('.distric').select2({
        placeholder: 'Pilih Kecamatan',
        theme: "bootstrap",
        ajax: {
            url: '{{route("distric")}}',
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

    // $('.village').select2({
    // placeholder: 'Pilih kecamatan',
    // theme: "bootstrap",
    // ajax: {
    //     url: '{{route("village")}}',
    //     dataType: 'json',
    //     delay: 250,

    //     processResults: function (data) {
    //         return {
    //             results: $.map(data, function (item) {
    //                 return {
    //                     text: item.name,
    //                     id: item.id
    //                 }
    //             })
    //         };
    //     },
    //     cache: true
    // }
    // });
</script>
<script>
    const onCreateAsset = () => {
        var dataBatch = getFormInput();
        var p_id = $('#p_id').val();
        if (p_id === "") {
            requestServer({
                url: '{{route("harga-send")}}',
                data: dataBatch,
                onSuccess: function(response) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Your harga has been saved',
                        showConfirmButton: false,
                        timer: 1500
                    }).then((result) => {
                        return false;
                        windows.location.replace("{{route('master-harga')}}");
                    })
                }
            });
        } else {
            dataBatch['id'] = p_id;
            requestServer({
                url: '{{route("harga-update")}}',
                data: dataBatch,
                onSuccess: function(response) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Your harga has been update',
                        showConfirmButton: false,
                        timer: 1500
                    }).then((result) => {
                        backToList();
                    })
                }
            });
        }
    }

    // Get input in form
    const getFormInput = () => {
        // Daerah Asal
        let aa = $('#alamat_asal').text();
        let at = $('#alamat_tujuan').text();
        let ka = $('#alamat_asal').val();
        let kt = $('#alamat_tujuan').val();
        let ara = $('#asal_area').val();
        let art = $('#tujuan_area').val();
        let hrg = $('#harga').val();
        let est = $('#estimasi').val();
        let ser = $('#servis').val();

        let dataBatch = {
            "_token": "{{ csrf_token() }}",
            asal_id: ka,
            tujuan_id: kt,
            alamat_asal: aa,
            alamat_tujuan: at,
            asal_area: ara,
            tujuan_area: art,
            harga: hrg,
            estimasi: est,
            servis: ser
        };

        return dataBatch;
    }

    function backToList() {
        windows.location.href = "http://127.0.0.1:8000/lm-admin/";
    }
</script>
@endpush