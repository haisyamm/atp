@extends('layouts.lm_admin')
@section('css')
    <style>
        .hr-custom {
            margin: 0px 0px 10px 0px;
        }
        .text-gray {
            color: #5b5b5b;
        }
        body {
            background-color: #eee;
        }

        .mt-70 {
            margin-top: 70px;
        }

        .mb-70 {
            margin-bottom: 70px;
        }

        .card {
            box-shadow: 0 0.46875rem 2.1875rem rgba(4, 9, 20, 0.03), 0 0.9375rem 1.40625rem rgba(4, 9, 20, 0.03), 0 0.25rem 0.53125rem rgba(4, 9, 20, 0.05), 0 0.125rem 0.1875rem rgba(4, 9, 20, 0.03);
            border-width: 0;
            transition: all .2s;
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(26, 54, 126, 0.125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            padding: 1.25rem;
        }

        .vertical-timeline {
            width: 100%;
            position: relative;
            padding: 1.5rem 0 1rem;
        }

        .vertical-timeline::before {
            content: '';
            position: absolute;
            top: 0;
            left: 67px;
            height: 100%;
            width: 5px;
            background: #e9ecef;
            border-radius: .25rem;
        }

        .vertical-timeline-element {
            position: relative;
            margin: 0 0 1rem;
        }

        .vertical-timeline--animate .vertical-timeline-element-icon.bounce-in {
            visibility: visible;
            animation: cd-bounce-1 .8s;
        }

        .vertical-timeline-element-icon {
            position: absolute;
            top: 0;
            left: 55px;
        }

        .vertical-timeline-element-icon .badge-dot-xl {
            box-shadow: 0 0 0 5px #fff;
        }

        .badge-dot-xl {
            width: 28px;
            height: 28px;
            position: relative;
        }

        .badge:empty {
            display: none;
        }


        .badge-dot-xl::before {
            content: '';
            width: 10px;
            height: 10px;
            border-radius: .25rem;
            position: absolute;
            left: 50%;
            top: 50%;
            margin: -5px 0 0 -5px;
            background: #fff;
        }

        .vertical-timeline-element-content {
            position: relative;
            margin-left: 90px;
            font-size: .8rem;
        }

        .vertical-timeline-element-content .timeline-title {
            font-size: .8rem;
            text-transform: uppercase;
            margin: 0 0 .5rem;
            padding: 2px 0 0;
            font-weight: bold;
        }

        .vertical-timeline-element-content .vertical-timeline-element-date {
            display: block;
            position: absolute;
            left: -90px;
            top: 0;
            padding-right: 10px;
            text-align: right;
            color: #adb5bd;
            font-size: .7619rem;
            white-space: nowrap;
        }

        .vertical-timeline-element-content:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
@stop
@section('content')
    <div class="row g-1 justify-content-center">
        <div class="col-md-10">
            <div class="main-card mb-2 pt-3 card">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body">
                            <div class="h3 fw-bolder text-uppercase col-md-12">
                                <svg xmlns="http://www.w3.org/2000/svg" class="me-1 mb-1" width="20" height="20"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="12" r="1"></circle>
                                    <circle cx="12" cy="12" r="9"></circle>
                                </svg>
                                Detail Pengiriman
                            </div>
                            <div class="row" style="margin-top: 20px;">
                                <div class="col-md-4 form-group">
                                    <label for="tgl_resi" class="small fw-bolder text-uppercase">Tanggal Resi</label>
                                    <p class="mt-2 text-gray">{{ date('d-m-Y', strtotime($resi->tgl_resi)) }}</p>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="servis" class="small fw-bolder text-uppercase">Pilih Layanan</label>
                                    <p class="mt-2 text-gray">{{ config('servis')[$resi->servis] }}</p>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="no_reff" class="small fw-bolder text-uppercase">Refferensi</label>
                                    <p class="mt-2 text-gray">{{ date('d-m-Y', strtotime($resi->tgl_resi)) }}</p>
                                </div>
                            </div>
                            <hr class="hr-custom">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="nama_pengirim" class="small fw-bolder text-uppercase">Nama
                                        Pengirim</label>
                                    <p class="mt-2 text-gray">{{ $resi->pengirim }}</p>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="nama_penerima" class="small fw-bolder text-uppercase">Nama
                                        Penerima</label>
                                    <p class="mt-2 text-gray">{{ $resi->penerima }}</p>
                                </div>
                            </div>
                            <hr class="hr-custom">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="alamat_pengirim_1" class="small fw-bolder text-uppercase">Alamat
                                        Pengirim</label>
                                    <p class="mt-2 text-gray">{{ $alamat_pengirim->alamat_1 }}</p>
                                    <p class="text-gray">{{ $alamat_pengirim->alamat_2 }}</p>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="alamat_penerima_1" class="small fw-bolder text-uppercase">Alamat
                                        Penerima</label>
                                    <p class="mt-2 text-gray">{{ $alamat_penerima->alamat_1 }}</p>
                                    <p class="text-gray">{{ $alamat_penerima->alamat_2 }}</p>
                                </div>
                            </div>
                            <hr class="hr-custom">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="tlp_pengirim" class="small fw-bolder text-uppercase">Telp.
                                        Pengirim</label>
                                    <p class="mt-2 text-gray">{{ $resi->tlp_pengirim }}</p>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="tlp_penerima" class="small fw-bolder text-uppercase">Telp.
                                        Penerima</label>
                                    <p class="mt-2 text-gray">{{ $resi->tlp_penerima }}</p>
                                </div>
                            </div>
                            <hr class="hr-custom">
                            <div class="h3 fw-bolder text-uppercase col-md-6 mb-3 mt-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="me-1 mb-1" width="20" height="20"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="12" r="1"></circle>
                                    <circle cx="12" cy="12" r="9"></circle>
                                </svg>
                                Detail Barang
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table align-middle">
                                        <tr>
                                            <th>Berat Barang</th>
                                            <th>Dimensi Paket (p x l x t) </th>
                                            <th>Volume</th>
                                        </tr>
                                        @foreach ($detail_barang as $brg)
                                            <tr>
                                                <td class="text-gray">{{ $brg->berat_actual }}</td>
                                                <td class="text-gray">{{ $brg->dimensi }}</td>
                                                <td class="text-gray">{{ $brg->volume }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            <div class="row justify-content-between align-items-center mb-1">
                                <div class="col-md-4">
                                    <p>Isi Barang</p>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group mt-2">
                                        <input type="text" name="isi_barang" id="isi_barang" class="form-control"
                                            value="{{ isset($detail_biaya->isi) ? $detail_biaya->isi : '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-between align-items-center mb-1">
                                <div class="col-md-4">
                                    <p>Total Berat Dimensi</p>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" name="total_volume" id="total_volume" class="form-control"
                                            value="{{ $detail_biaya->total_volume }}"readonly>
                                        <span class="input-group-text">KG</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-between align-items-center mb-1">
                                <div class="col-md-4">
                                    <p>Berat Dikenakan Biaya</p>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" name="total_berat" id="total_berat"
                                            value="{{ $resi->total_berat }}"class="form-control" readonly>
                                        <span class="input-group-text">KG</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-between align-items-center mb-1">
                                <div class="col-md-4">
                                    <p>Tarif</p>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-text">RP</span>
                                        <input type="text" name="tarif" id="tarif" class="form-control"
                                            value="{{ isset($detail_biaya->tarif) ? $detail_biaya->tarif : '' }}"
                                            readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-between align-items-center mb-3">
                                <div class="col-md-4">
                                    <p>Biaya Kirim</p>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-text">RP</span>
                                        <input type="text" name="tarif" id="tarif" class="form-control"
                                            value="{{ isset($detail_biaya->tarif) ? $detail_biaya->tarif : '' }}"
                                            readonly>
                                    </div>
                                </div>
                            </div>
                            <hr class="hr-custom">
                            <div class="h3 fw-bolder text-uppercase col-md-6 px" style="margin-top: 25px;">
                                <svg xmlns="http://www.w3.org/2000/svg" class="me-1 mb-1" width="20" height="20"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="12" r="1"></circle>
                                    <circle cx="12" cy="12" r="9"></circle>
                                </svg>
                                Detail Biaya
                            </div>
                            <div class="row pb-3">
                                <div class="col-md-12">
                                    <form>
                                        <div class="row">
                                            <input type="hidden" name="p_id" id="p_id"
                                                value="{{ isset($resi->id) ? $resi->id : '' }}">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="payment" class="small fw-bolder text-uppercase">Metode
                                                        Pembayaran</label>
                                                    <select name="payment" id="payment" class="form-select mt-1"
                                                        required>
                                                        <option value="" class="form-select">Pilih...</option>
                                                        @foreach (config('payment') as $key => $payment)
                                                            <option value="{{ $key }}" class="form-select"
                                                                {{ $resi->payment == $key ? 'selected=true' : '' }}>
                                                                {{ $payment }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="packing"
                                                        class="small fw-bolder text-uppercase">Packing</label>
                                                    <input type="text" name="packing" id="packing"
                                                        class="form-control mt-1" placeholder="Packing"
                                                        value="{{ isset($resi->packing) ? $resi->packing : '' }}"
                                                        oninput="total()">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="other"
                                                        class="small fw-bolder text-uppercase">Others</label>
                                                    <input type="text" name="other" id="other"
                                                        class="form-control mt-1" placeholder="Others"
                                                        value="{{ isset($resi->others) ? $resi->others : '' }}"
                                                        oninput="total()">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="total_biaya" class="small fw-bolder text-uppercase">Total
                                                        Biaya
                                                        Keseluruhan</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">RP</span>
                                                        <input type="text" name="total_biaya" id="total_biaya"
                                                            class="form-control"
                                                            value="{{ isset($resi->total_biaya) ? $resi->total_biaya : '' }}"
                                                            readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="col-md-2">
                <div class="card position-fixed" style="width: 190px">
                    <div class="card-header">
                        <h4 class="card-title"><b>History</b></h4>
                    </div>
                    <div class="card-body">
                        <p>Coming Soon.</p>
                        <hr style="margin-bottom: 10px">
                        <button class="btn btn-secondary-outline">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-printer"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2">
                                </path>
                                <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4"></path>
                                <rect x="7" y="13" width="10" height="8" rx="2">
                                </rect>
                            </svg>
                            Cetak
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
@endpush
