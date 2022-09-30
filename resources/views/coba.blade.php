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
    <link rel="stylesheet"
        href="{{ asset('assets/pus_dist/lib/sweetalert/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
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
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body border-bottom py-3">
                                <div class="mt-2">
                                    <div style="display: flex">
                                        <div style="width: 50%">
                                            <img class="d-inline-block" src="{{ asset('assets/img/logo.png') }}"
                                                alt="logo" width="100">
                                        </div>
                                        <div class="text-end" style="width: 50%">
                                            <p><b>2 - 3 Hari | CGK - TSY | PS1</b></p>
                                        </div>
                                    </div>
                                    <hr style="margin-top: 0px;margin-bottom: 10px">
                                    <div style="display: flex">
                                        <div style="width: 50%">
                                            <p><b>ATPXXTUPGR00001</b></p>
                                            <div class="barcode">
                                                {!! DNS1D::getBarcodeHTML(123456, 'C128', 0.7, 22) !!}
                                            </div>
                                        </div>
                                        <div class="text-end" style="width: 50%">
                                            <span>Cipawitra, Mangkubumi, Kota Tasikmalaya</span><br>
                                            <span>Dibuat :<br>{{ date('d F Y', strtotime(2022 - 05 - 07)) }}</s>
                                        </div>
                                    </div>
                                    <hr style="margin-top: 10px;margin-bottom: 10px">
                                    <div>
                                        <span>Pengirim : Lerian Febriana (+6281286501014)</span><br>
                                        <span>Penerima : Haisyam Maulana (+6283255489011)</span><br>
                                        <span>Alamat : Jl. Cikembulan RT.01 RW.13 Kel. Sukamajukaler Kec. Sukasari Kota
                                            Tasikmalaya</span><br>
                                        <span>Isi : Seragam Sekolah</span>
                                    </div>
                                    <hr style="margin-top: 10px;margin-bottom: 10px">
                                    <div style="display: flex">
                                        <div style="width: 50%">
                                            <p>ATP Packing Olshop Cgk</p>
                                        </div>
                                        <div class="text-end" style="width: 50%">
                                            <h2>*DO BALIK*</h2>
                                        </div>
                                    </div>
                                    <hr style="margin-top: 5px;margin-bottom: 10px">
                                    <div style="display: flex">
                                        <div style="width: 60%">
                                            <h2 class="text-uppercase">Tunai</h2>
                                        </div>
                                        <div style="width: 20%">
                                            <a class="btn btn-dark mb-1">KILAT</a>
                                            <h2>GW:</h2>
                                            <h2>VW:</h2>
                                        </div>
                                        <div class="text-end" style="width: 20%">
                                            <h1>9/9</h1>
                                            <h2>1kg/1kg</h2>
                                            <p>10x10x10cm<br><b>0,1kg</b></p>
                                        </div>
                                    </div>
                                    <div style="border: 1px dashed #000000; margin: 0px 0px 15px 0px"></div>
                                    <div style="display: flex">
                                        <div style="width: 60%">
                                            <div style="display: flex">
                                                <div style="width: 50%">
                                                    <img class="d-inline-block" src="{{ asset('assets/img/logo.png') }}"
                                                    alt="logo" width="100">
                                                    <p class="mt-2"><b>29 September 2022</b></p>
                                                </div>
                                                <div>
                                                    <p><b>ATPXXTUPGR00001</b></p>
                                                    <div class="barcode">
                                                        {!! DNS1D::getBarcodeHTML(123456, 'C128', 0.7, 22) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <span>Pengirim :</span><br>
                                            <span>Penerima :</span><br>
                                            <span>Alamat :</span><br>
                                            <span>Estimasi :</span>
                                        </div>
                                        <div style="width: 20%">
                                            <a class="btn btn-dark mb-1">KILAT</a>
                                            <p><b>9/9</b></p>
                                            <span>Total berat: -</span><br>
                                            <span>Biaya kirim: -</span>
                                        </div>
                                        <div class="text-end" style="width: 20%">
                                            <h1>Barcode</h1>
                                            <span>Total biaya:<br>Rp-</span>
                                        </div>
                                    </div>
                                    <div style="border: 1px dashed #000000; margin: 20px 0px 20px 0px"></div>
                                    <div style="display: flex">
                                        <div style="width: 60%">
                                            <div style="display: flex">
                                                <div style="width: 50%">
                                                    <img class="d-inline-block" src="{{ asset('assets/img/logo.png') }}"
                                                    alt="logo" width="100">
                                                    <p class="mt-2"><b>29 September 2022</b></p>
                                                </div>
                                                <div>
                                                    <p><b>ATPXXTUPGR00001</b></p>
                                                    <div class="barcode">
                                                        {!! DNS1D::getBarcodeHTML(123456, 'C128', 0.7, 22) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <span>Pengirim :</span><br>
                                            <span>Penerima :</span><br>
                                            <span>Alamat :</span><br>
                                            <span>Estimasi :</span>
                                        </div>
                                        <div style="width: 20%">
                                            <a class="btn btn-dark mb-1">KILAT</a>
                                            <p><b>9/9</b></p>
                                            <span>Total berat: -</span><br>
                                            <span>Biaya kirim: -</span>
                                        </div>
                                        <div class="text-end" style="width: 20%">
                                            <h1>Barcode</h1>
                                            <span>Total biaya:<br>Rp-</span>
                                        </div>
                                    </div>
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
