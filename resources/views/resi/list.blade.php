@extends('layouts.lm_admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title">List Resi</h3>
                <div class="">
                    <a href="{{ route('resi-add') }}" class="btn btn-dark">Tambah</a>
                </div>
            </div>
            <div class="card-body border-bottom py-3">
                <div class="table-responsive mt-2">
                    <table id="example" class="table table-striped table-bordered table-responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 30px;">
                                <span class="text-muted">    
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-truck-delivery" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="7" cy="17" r="2"></circle>
                                        <circle cx="17" cy="17" r="2"></circle>
                                        <path d="M5 17h-2v-4m-1 -8h11v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5"></path>
                                        <line x1="3" y1="9" x2="7" y2="9"></line>
                                    </svg>
                                </span>
                                </th>
                                <th>No Resi</th>
                                <th>Tanggal Resi</th>
                                <th>Pengirim</th>
                                <th>Penerima</th>
                                <th>Servis</th>
                                <th>Tujuan</th>
                                <th>Berat Keseluruhan</th>
                                <th>Total Biaya</th>
                                <th class="text-center" style="width: 50px;">
                                    <span class="text-muted">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-spy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M3 11h18"></path>
                                    <path d="M5 11v-4a3 3 0 0 1 3 -3h8a3 3 0 0 1 3 3v4"></path>
                                    <circle cx="7" cy="17" r="3"></circle>
                                    <circle cx="17" cy="17" r="3"></circle>
                                    <path d="M10 17h4"></path>
                                    </svg>
                                    Action
                                    </span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(json_decode($resi) as $val)
                            <tr>
                                <td class="text-center" style="width: 30px;">
                                <a href="" class="btn btn-icon border-dashed bg-dark-lt">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-truck-delivery" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="7" cy="17" r="2"></circle>
                                        <circle cx="17" cy="17" r="2"></circle>
                                        <path d="M5 17h-2v-4m-1 -8h11v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5"></path>
                                        <line x1="3" y1="9" x2="7" y2="9"></line>
                                        </svg>
                                    </a>
                                </td>
                                <td>{{$val->no_resi}}</td>
                                <td>{{$val->tgl_resi}}</td>
                                <td>{{$val->pengirim}}</td>
                                <td>{{$val->penerima}}</td>
                                <td>{{$val->servis}}</td>
                                <td>{{$val->alamat_penerima[0]['alamat_1']}}</td>
                                <td>{{$val->total_berat}}</td>
                                <td>{{$val->total_biaya}}</td>
                                <td class="text-center" style="width: 100px;">
                                    <a href="" class="btn btn-icon border-dashed bg-dark-lt">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <circle cx="12" cy="12" r="9"></circle>
                                                <path d="M10 8l4 8"></path>
                                                <path d="M10 16l4 -8"></path>
                                        </svg>
                                    </a>
                                        <a href="{{route('cetak-resi')}}" class="btn btn-icon border-dashed bg-dark-lt">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-printer" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2"></path>
                                        <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4"></path>
                                        <rect x="7" y="13" width="10" height="8" rx="2"></rect>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')

<script src="https://cdn.datatables.net/fixedcolumns/4.1.0/js/dataTables.fixedColumns.min.js"></script>
<script>
    
$(document).ready(function () {
    $('#example').DataTable({
        fixedColumns:   {
            left: false,
            right: 2
        }
    });
});
</script>
@endpush