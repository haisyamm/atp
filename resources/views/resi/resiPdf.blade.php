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
    <style>
    body, option {
        font-family: 'Poppins';
    }
    </style>
</head>

<body class="layout-fluid theme-light">
    <div class="page">
        <div class="page-wrapper">
            <div class="container">
                <div class="row  justify-content-md-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body border-bottom py-3">
                                <div class="mt-2">
                                    <table width="100%">
                                        <thead>
                                            <tr class="border-bottom">
                                                <td><img class="d-inline-block" src="{{asset('assets/img/logo.png')}}" alt="logo" width="100"></td>
                                                <td colspan="2" class="text-end"><b>CGK - TSY | PS1</b></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td width="200px">
                                            <label class="small fw-bolder">{{$product}}</label>
                                            </td>
                                            <td colspan="2">Cipawitra, Mangkubumi, Kota Tasikmalaya</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                            <div class="barcode">
                                            {!! DNS1D::getBarcodeHTML($product, "C128",0.7,22) !!}
                                            </div>
                                            </td>
                                            <td class="text-end" width="300px"> Dibuat :<br>22 September 2022</td>
                                        </tr>
                                        <tr class="border">
                                            <td colspan="3" class="text-left" width="250px">
                                                Pengirim :<br>
                                                Penerima :22 September 2022<br>
                                                Alamat   : <br><br>
                                                Isi      :
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
                                                <label class="small">Ex. Reff : XXXXXX</label>
                                            </td>
                                        </tr>
                                        
                                        </tbody>
                                    </table>
                                    <table width="100%" class="mt-2">
                                        <thead>
                                            <tr class="border-top" >
                                                <td colspan="2"><h2>NON COD</h2></td>
                                                <td><a class="btn btn-dark">KILAT</a></td>
                                                <td class="text-end"><h2>1/1</h2></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <label class="small">Total Biaya : -</label>
                                            </td>
                                            <td>
                                                <label class="small">Total Berat : -</label>
                                            </td>
                                            <td rowspan="2"><h3>GW :</h3></td>
                                            <td rowspan="2" class="text-end"><h3> 1Kg / 1Kg</h3></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="small">Biaya Kirim : -</label>
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
                                                <label class="small">Lain-lain : -</label>
                                            </td>
                                            <td rowspan="2"><h3>VW :</h3></td>
                                            <td rowspan="2" class="text-end">10x10x10CM<h3>0,1Kg</h3></td>
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
                                                <center><a class="btn btn-sm btn-dark">KILAT</a></center><br>
                                                <label class="small">Total Berat : -</label><br>
                                                <label class="small">Biaya Kirim : -</label><br>
                                                <label class="small">Pajak/BM : -</label><br>
                                                <label class="small">Asuransi : -</label><br>
                                                <label class="small">Lain-lain : -</label>
                                            </td>
                                            <td class="text-center">{!! $qrcode !!}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="border">
                                                Pengirim :<br>
                                                Penerima : <br>
                                                Alamat   : <br>
                                                Estimasi : 22 September 2022
                                            </td>
                                            <td class="border text-center">
                                                <label class="small">Total Biaya</label><br>
                                                Rp. -
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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