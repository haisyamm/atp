@extends('layouts.app')
@section('content')
<section class="mt-7 py-0">
    <div class="bg-holder w-50 bg-right d-none d-lg-block">
        <div class="container">
            <div class="row h-100">
                <div class="col-12 card-body">
                    @if(isset($tarif))
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" width="250px">RUTE</th>
                                <th scope="col">VOLUME KGv</th>
                                <th scope="col">BERAT ACTUAL</th>
                                <th scope="col">REGULAR</th>
                                <th scope="col">KILAT</th>
                                <th scope="col">EKONOMI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tarif as $val)
                            <?php 
                                if($val->servis=="EKO") {
                                    $berat_act = ceil($volume/4000);
                                }else{
                                    $berat_act = ceil($volume/6000);
                                }
                                
                                if ($berat_act > $berat){
                                    $berat_akhir = $berat_act;
                                }else{
                                    $berat_akhir = $berat;
                                }
                            ?>
                            <tr>
                                <td>{{$val->alamat_asal}}&nbsp;&nbsp;==>&nbsp;&nbsp;{{$val->alamat_tujuan}}</td>
                                <td>{{$berat_act}}</td>
                                <td>{{$berat}}</td>
                                <td>{{ ($val->servis=="REG") ? 'Rp. '.number_format((float)$val->harga*$berat_akhir) : ''  }}</td>
                                <td>{{ ($val->servis=="KIL") ? 'Rp. '.number_format((float)$val->harga*$berat_akhir) : ''  }}</td>
                                <td>{{ ($val->servis=="EKO") ? 'Rp. '.number_format((float)$val->harga*$berat_akhir) : ''  }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!--/.bg-holder-->
    <div class="container">
        <div class="row">
            <div class="col-lg-6 py-5 py-xl-5 py-xxl-7">
                <h1 class="display-3 text-1000 fw-normal">Let’s find a cargo</h1>
                <h1 class="display-3 text-primary fw-bold">TRACK AND TRACE</h1>
                <div class="pt-5">
                    <nav>
                        <div class="nav nav-tabs voyage-tabs" id="nav-tab" role="tablist"><button class="nav-link id=" nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
                                <b>LACAK PENGIRIMAN</b></button>
                            <button class="nav-link active" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
                                <b>CEK TARIF</b></button>
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <form class="row g-4 mt-2">
                                    <div class="col-sm-6 col-md-6 col-xl-5">
                                        <div class="input-group-icon"><label class="form-label visually-hidden" for="inputAddress1">Address 1</label><input class="form-control input-box form-voyage-control" id="inputAddress1" type="text" placeholder="Example :  123456789"><span class="nav-link-icon text-800 fs--1 input-box-icon"><svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg="">
                                                    <path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path>
                                                </svg><!-- <i class="fas fa-map-marker-alt"></i> Font Awesome fontawesome.com --></span></div>
                                    </div>

                                    <div class="col-12 col-xl-10 col-lg-12 d-grid mt-6"><button class="btn btn-secondary" type="submit">Lacak Pengiriman</button></div>
                                </form>
                            </div>
                            <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <form class="row g-4 mt-2" method="GET" action="{{ route('tarif') }}">
                                    <div class="col-12">
                                        <div class="form-control">
                                            <select name="asal_id" id="asal_id" class="distric form-control" readonly>
                                                <option value="317303" selected>DKI JAKARTA, KOTA JAKARTA BARAT, TAMAN SARI, MAPHAR</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-control">
                                            <select name="tujuan_id" id="tujuan_id" class="distric form-control ">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="panjang" class="small text-uppercase">panjang</label>
                                            <input class="form-control input-box form-voyage-control" id="panjang" name="panjang" type="text" placeholder="CM">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="lebar" class="small text-uppercase">lebar</label>
                                            <input class="form-control input-box form-voyage-control" id="lebar" name="lebar" type="text" placeholder="CM">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <label for="tinggi" class="small text-uppercase">tinggi</label>
                                        <div class="form-group">
                                            <input class="form-control input-box form-voyage-control" id="tinggi" name="tinggi" type="text" placeholder="CM">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <label for="berat" class="small text-uppercase">berat actual</label>
                                        <div class="form-group">
                                            <input class="form-control input-box form-voyage-control" id="berat" name="berat" type="text" placeholder="KG">
                                        </div>
                                    </div>

                                    <div class="col-12 d-grid mt-6"><button class="btn btn-secondary" type="submit">Cek Tarif</button></div>
                                </form>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!--
<section id="testimonial">

</section> -->
@endsection

@push('script')
<script>
    function hitung() {
        var panjang = document.getElementById("panjang");
        var p = panjang.value;
        var lebar = document.getElementById("lebar");
        var l = lebar.value;
        var tinggi = document.getElementById("tinggi");
        var t = tinggi.value;

        var berat = document.getElementById("berat");
        var v = p * l * t;
        berat.value = v;
    }

    $('.distric').select2({
    placeholder: 'Pilih Kecamatan',
    theme: "bootstrap",
    ajax: {
        url: '{{route("distric")}}',
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
    const onCekTarif = () => {
        var dataBatch = getFormInput();
        requestServer({
            url: '{{route("tarif")}}',
            data: dataBatch
        });
    }

    // Get input in form
    const getFormInput = () => {
        // Daerah Asal
        let ka = $('#asal_id').val();
        let kt = $('#tujuan_id').val();
        let vol = $('#berat').val();
        let p = $('#panjang').val();
        let l = $('#lebar').val();
        let t = $('#tinggi').val();

        let dataBatch = {
            "_token": "{{ csrf_token() }}",
            asal_id: ka,
            tujuan_id: kt,
            berat: vol,
            panjang: p,
            lebar: l,
            tinggi: t
        };

        return dataBatch;
    }
</script>
@endpush