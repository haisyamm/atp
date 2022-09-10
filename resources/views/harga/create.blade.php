@extends('layouts.lm_admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="px-3">
            <h2>{{ isset($harga->id) ? "Edit" : "Tambah"  }} Harga</h2>
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
                        <div class="col-md-6 form-group mb-3">
                            <label for="kelurahan_asal" class="small fw-bolder text-uppercase">Daerah Asal Kelurahan</label>
                            <select name="kelurahan_asal" id="kelurahan_asal" class="village form-control mt-1">
                                @if(isset($harga->kelurahan_asal))
                                <option value="{{ $harga->kelurahan_asal }}">{{ $harga->alamat_asal }}</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="kelurahan_tujuan" class="small fw-bolder text-uppercase"> Daerah Tujuan Kelurahan</label>
                            <select name="kelurahan_tujuan" id="kelurahan_tujuan" class="village form-control mt-1">
                                @if(isset($harga->kelurahan_asal))
                                <option value="{{ $harga->kelurahan_tujuan }}">{{ $harga->alamat_tujuan }}</option>
                                @endif  
                            </select>
                        </div>
                    </div>
                </div>
                <div class="ps-1">
                    <div class="row" style="margin-top: 25px;">
                        <div class="col-md-4 form-group mb-3">
                            <label for="estimasi" class="small fw-bolder text-uppercase">Estimasi</label>
                            <input type="text" name="estimasi" id="estimasi" class="form-control mt-1" placeholder="Masukan Estimasi" value="{{ isset($harga->id) ? $harga->estimasi : ''  }}">
                        </div>
                        <div class="col-md-4 form-group mb-3">
                            <label for="servis" class="small fw-bolder text-uppercase">Servis</label>
                            <select name="servis" id="servis" class="form-control mt-1">
                                <option value="{{ isset($harga->servis) ? $harga->servis : ''  }}" selected disabled>{{ isset($harga->harga) ? config('servis')[$harga->servis] : 'Pilih Servis'  }}</option>
                                <option value="REG">REGULER</option>
                                <option value="KIL">KILAT</option>
                                <option value="EKO">EKONOMIS</option>
                            </select>
                        </div>
                        <div class="col-md-4 form-group mb-3">
                            <label for="harga" class="small fw-bolder text-uppercase">Harga /KG</label>
                            <input type="text" name="harga" id="harga" class="form-control mt-1" placeholder="Masukan Harga" value="{{ isset($harga->harga) ? $harga->harga : ''  }}">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-light" onclick="history.back()">Cancel</button>
                    <button class="btn btn-dark ms-3" onclick="onCreateAsset()">Add</button>
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

    // $('.distric').select2({
    // placeholder: 'Pilih Kecamatan',
    // theme: "bootstrap",
    // ajax: {
    //     url: '{{route("distric")}}',
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

    $('.village').select2({
    placeholder: 'Pilih Kelurahan',
    theme: "bootstrap",
    ajax: {
        url: '{{route("village")}}',
        dataType: 'json',
        delay: 250,

        processResults: function (data) {
            return {
                results: $.map(data, function (item) {
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
<script>
    const onCreateAsset = () => {
        var dataBatch = getFormInput();
        var p_id = $('#p_id').val();
        if(p_id == null){
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
                        windows.location.href("{{route('master-harga')}}");
                    })
                }
            });
        }else{
            dataBatch['id'] = p_id;
            requestServer({
                url: '{{route("harga-update")}}',
                data: dataBatch,
                onSuccess: function(response) {
                    Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Your harga has been saved',
                    showConfirmButton: false,
                    timer: 1500
                    }).then((result) => {
                        windows.location.href("{{route('master-harga')}}");
                    })
                }
            });
        }
    }

    // Get input in form
    const getFormInput = () => {
        // Daerah Asal
        let aa = $('#kelurahan_asal').text();
        let ka = $('#kelurahan_asal').val();
        let at = $('#kelurahan_tujuan').text();
        let kt = $('#kelurahan_tujuan').val();
        let hrg = $('#harga').val();
        let est = $('#estimasi').val();
        let ser = $('#servis').val();

        let dataBatch = {
            "_token": "{{ csrf_token() }}",
            alamat_asal: aa,
            kelurahan_asal: ka,
            alamat_tujuan: at,
            kelurahan_tujuan: kt,
            harga: hrg,
            estimasi: est,
            servis: ser
        };

        return dataBatch;
    }
</script>
@endpush