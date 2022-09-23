@extends('layouts.lm_admin')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body border-bottom py-3">
                <div class="mt-2">
                    <table width="500px">
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
                    <table width="500px" class="mt-2">
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
@endsection
@push('script')
<script>
$(document).ready(function () {

});
</script>
@endpush