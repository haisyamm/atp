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
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-9 form-select mb-3" style="width: 75%;">
                            <label for="alamat_asal" class="small fw-bolder text-uppercase">Asal</label>
                            <select name="alamat_asal" id="alamat_asal" class="distric form-control mt-1">
                            <option value="317303" selected>DKI JAKARTA, KOTA JAKARTA BARAT, TAMAN SARI, MAPHAR</option>
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
                        <div class="col-md-9 form-select mb-3" style="width: 75%;">
                            <label for="alamat_tujuan" class="small fw-bolder text-uppercase"> Tujuan</label>
                            <select name="alamat_tujuan" id="alamat_tujuan" class="distric form-control mt-1">
                                @if(isset($harga->alamat_tujuan))
                                <option value="{{ $harga->tujuan_id }}">{{ $harga->alamat_tujuan }}</option>
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
                        <div class="col-md-12 form-group mb-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="50px">KODE SERVIS</th>
                                    <th scope="col" >NAMA SERVIS</th>
                                    <th scope="col">LEADTIME</th>
                                    <th scope="col">TARIF</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach(config('servis') as $key => $servis)
                                <tr>
                                    <td>{{$key}}</td>
                                    <td>{{$servis}}</td>
                                    <td>
                                        <div class="input-group">
                                            <input type="text" name="estimasi_{{$key}}" id="estimasi_{{$key}}" class="form-control" placeholder="Contoh: 3-4" value="{{ isset($harga->estimasi) ? $harga->estimasi->$key : ''  }}" onchange="cekDigit('{{ $key }}')" onkeypress="return onlyNumberKey(event)">
                                            <span span class="input-group-text">Hari</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                        <span class="input-group-text">RP</span>
                                        <input type="currency"  data-type="currency" name="harga_{{$key}}" id="harga_{{$key}}" class="form-control" placeholder="Masukan Tarif {{$servis}}" value="{{ isset($harga->harga) ? $harga->harga->$key : ''  }}">
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="d-flex justify-content-end">
                    <a class="btn btn-danger" href="{{route('master-harga')}}">BACK</a>
                    <button class="btn btn-primary ms-3" onclick="onCreateAsset()">{{ isset($harga->id) ? 'UPDATE' : 'ADD'  }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script>
    $("input[data-type='currency']").on({
        keyup: function() {
        formatCurrency($(this));
        },
        blur: function() { 
        formatCurrency($(this), "blur");
        }
    });


    function formatNumber(n) {
    // format number 1000000 to 1,234,567
    return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    }


    function formatCurrency(input, blur) {
    // appends $ to value, validates decimal side
    // and puts cursor back in right position.
    
    // get input value
    var input_val = input.val();
    
    // don't validate empty input
    if (input_val === "") { return; }
    
    // original length
    var original_len = input_val.length;

    // initial caret position 
    var caret_pos = input.prop("selectionStart");
        
    // check for decimal
    if (input_val.indexOf(".") >= 0) {

        // get position of first decimal
        // this prevents multiple decimals from
        // being entered
        var decimal_pos = input_val.indexOf(".");

        // split number by decimal point
        var left_side = input_val.substring(0, decimal_pos);
        var right_side = input_val.substring(decimal_pos);

        // add commas to left side of number
        left_side = formatNumber(left_side);

        // validate right side
        right_side = formatNumber(right_side);
        

        // join number by .
        input_val = left_side;

    } else {
        // no decimal entered
        // add commas to number
        // remove all non-digits
        input_val = formatNumber(input_val);
        input_val = input_val;
        
    }
    
    // send updated string to input
    input.val(input_val);

    // put caret back in the right position
    var updated_len = input_val.length;
    caret_pos = updated_len - original_len + caret_pos;
    input[0].setSelectionRange(caret_pos, caret_pos);
    }

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
        let aa = $('#alamat_asal option:selected').text();
        let at = $('#alamat_tujuan option:selected').text();
        let ka = $('#alamat_asal').val();
        let kt = $('#alamat_tujuan').val();
        let ara = $('#asal_area').val();
        let art = $('#tujuan_area').val();
        let hrgR = $('#harga_REG').val();
        let hrgK = $('#harga_KIL').val();
        let hrgE = $('#harga_EKO').val();
        let estR = $('#estimasi_REG').val();
        let estK = $('#estimasi_KIL').val();
        let estE = $('#estimasi_EKO').val();

        let dataBatch = {
            "_token": "{{ csrf_token() }}",
            asal_id: ka,
            tujuan_id: kt,
            alamat_asal: aa,
            alamat_tujuan: at,
            asal_area: ara,
            tujuan_area: art,
            harga_REG: hrgR,
            harga_KIL: hrgK,
            harga_EKO: hrgE,
            estimasi_REG: estR,
            estimasi_KIL: estK,
            estimasi_EKO: estE
        };

        return dataBatch;
    }

    function backToList() {
        windows.location.href = "{{route('master-harga')}}";
    }
</script>
<script type="text/javascript">
    function onlyNumberKey(evt) {
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode;
        if(ASCIICode == 45){
            return true;
        }
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)){
            return false;
        }
        return true;
    }

    function cekDigit(evt) {
        var data = document.getElementById(`estimasi_${evt}`).value;
        var digitPertama = data.slice(0, data.lastIndexOf('-'));
        var digitKedua = data.slice(data.lastIndexOf('-') + 1);
        if(digitPertama > 99 || digitKedua > 99){
            document.getElementById(`estimasi_${evt}`).value = " ";
        }
        console.log(digitKedua);
    }
</script>
@endpush