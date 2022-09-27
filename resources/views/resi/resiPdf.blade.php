<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel</title>
    <!-- CSS files -->
    <link href="{{ asset('assets/dist/css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/dist/css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/dist/css/tabler-payments.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/dist/css/tabler-vendors.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/dist/css/demo.min.css') }}" rel="stylesheet" />
    <!-- Pus Dist -->
    <link href="{{ asset('assets/pus_dist/css/style.css') }}" rel="stylesheet" />
    <!-- Toast -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/pus_dist/lib/jquery-toast-plugin/jquery.toast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/pus_dist/lib/sweetalert/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.4.0/css/select.dataTables.min.css">
        
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>

<body class="layout-fluid theme-light">
    <div class="page">
        <div class="page-wrapper">
            <div class="container">
                <div class="row  justify-content-md-center">
                    <?php $i =0;?>
                    @foreach($detail_barang as $brg)
                    <?php $i++;?>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body border-bottom py-3">
                                <div class="mt-2">
                                    <table width="100%">
                                        <thead>
                                            <tr class="border-bottom">
                                                <td><img class="d-inline-block" src="{{asset('assets/img/logo.png')}}" alt="logo" width="100"></td>
                                                <td colspan="2" class="text-end"><b>{{$area->asal_area}}-{{$area->tujuan_area}}</b></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td width="200px">
                                            <label class="small fw-bolder">{{$product}}</label>
                                            </td>
                                            <td colspan="2">{{$alamat_pengirim->alamat_2}}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                            <div class="barcode">
                                            {!! DNS1D::getBarcodeHTML($product, "C128",0.7,22) !!}
                                            </div>
                                            </td>
                                            <td class="text-end" width="300px"> Dibuat :<br>{{date('d-m-Y', strtotime($resi->tgl_resi))}}</td>
                                        </tr>
                                        <tr class="border">
                                            <td colspan="3" class="text-left" width="250px">
                                                Pengirim :  {{$alamat_pengirim->alamat_2}}<br>
                                                Penerima :  {{$alamat_penerima->alamat_2}}<br>
                                                Alamat   :  {{$alamat_penerima->alamat_1}}<br>
                                                            {{$alamat_penerima->alamat_1}}<br>
                                                Isi      : {{$detail_biaya->isi}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                            <br><br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                <label class="small">ATP Packing Olshop Cgk</label>
                                            </td>
                                            <td></td>
                                            <td class="text-end"> 
                                                <label class="small">{{$resi->no_reff}}</label>
                                            </td>
                                        </tr>
                                        
                                        </tbody>
                                    </table>
                                    <table width="100%" class="mt-2">
                                        <thead>
                                            <tr class="border-top" >
                                                <td colspan="2"><h2 class="text-uppercase">{{config('payment')[$resi->payment]}}</h2></td>
                                                <td><a class="btn btn-dark">{{config('servis')[$resi->servis]}}</a></td>
                                                <td class="text-end"><h2>{{$i}}/{{$detail_biaya->total_barang}}</h2></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <label class="small">Total Biaya : {{$resi->total_biaya}}</label>
                                            </td>
                                            <td>
                                                <label class="small">Total Berat : {{$brg->berat_actual}}</label>
                                            </td>
                                            <td rowspan="2"><h3>GW : {{$brg->berat_actual}}</h3></td>
                                            <td rowspan="2" class="text-end"><h3> {{$brg->berat_actual}}Kg / 1Kg</h3></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="small">Biaya Kirim : {{$detail_biaya->tarif}} </label>
                                            </td>
                                            <td>
                                                <label class="small">Pajak/BM : -</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="small">Asuransi : -</label>
                                            </td>
                                            <td>
                                                <label class="small">Lain-lain : {{number_format((float)$resi->total_biaya,2)}}</label>
                                            </td>
                                            <td rowspan="2"><h3>VW : {{number_format((float)$brg->volume,2)}}Kg</h3></td>
                                            <td rowspan="2" class="text-end">{{$brg->dimensi}} <h3>{{number_format((float)$brg->volume,2)}}Kg</h3></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="text-left" width="250px">
                                                <br>
                                            </td>
                                        </tr>
                                        </tbody>
                                        <tfoot class="border">
                                        <tr>
                                            <td>
                                                <img class="d-inline-block" src="{{asset('assets/img/logo.png')}}" alt="logo" width="100">
                                            </td>
                                            <td>
                                                {!! DNS1D::getBarcodeHTML($product, "C128",0.7,22) !!}
                                            </td>
                                            <td rowspan="2" class="border">
                                                <center><a class="btn btn-sm btn-dark">{{config('servis')[$resi->servis]}}</a></center><br>
                                                <label class="small">Total Berat : {{$resi->total_berat}}</label><br>
                                                <label class="small">Biaya Kirim : -</label><br>
                                                <label class="small">Pajak/BM : -</label><br>
                                                <label class="small">Asuransi : -</label><br>
                                                <label class="small">Lain-lain : {{number_format((float)$resi->others,2)}}</label>
                                            </td>
                                            <td class="text-center">{!! $qrcode !!}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="border">
                                                Pengirim : {{$resi->pengirim}}<br>
                                                Penerima : {{$resi->penerima}}<br>
                                                Alamat   : ***************<br>
                                                Estimasi : {{date('d F Y', strtotime($resi->tgl_resi))}}
                                            </td>
                                            <td class="border text-center">
                                                <label class="small">Total Biaya</label><br>
                                                <label class="small">{{number_format((float)$resi->total_biaya,2)}}</label>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/dist/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/dist/libs/jsvectormap/dist/js/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('assets/dist/libs/jsvectormap/dist/maps/world.js') }}"></script>
    <script src="{{ asset('assets/dist/libs/jsvectormap/dist/maps/world-merc.js') }}"></script>
    <!-- Tabler Core -->
    <script src="{{ asset('assets/dist/js/tabler.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/demo.min.js') }}"></script>
    <!-- Jquery -->
    <script src="{{ asset('assets/pus_dist/js/script.js') }}"></script>
    <script src="{{ asset('assets/pus_dist/lib/jquery/jquery.min.js') }}"></script>
    <!-- Toast and sweetalert -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{ asset('assets/pus_dist/lib/jquery-toast-plugin/jquery.toast.min.js') }}"></script>
    <script src="{{ asset('assets/pus_dist/lib/sweetalert/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- Custome Js -->
    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
</body>
</html>