@extends('layouts.lm_admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between" style="background-color: #006a4e;">
                <h3 class="card-title text-white"><B>LIST TARIF</B></h3>
                <div class="">
                    <form action="{{ route('filter-harga')}}" method="POST" class="d-flex flex-row">
                    @csrf=
                    <div><h3 class="card-title text-white">FILTER BY KODE AREA :</h3></div>
                    <div>&nbsp;&nbsp;&nbsp;</div>
                    <div>
                        <select name="f_asal" id="f_asal" class="form-control">
                            <option value="CGK" selected readonly> DEFAULT CGK</option>

                        </select>
                    </div>
                    <div>&nbsp;&nbsp;&nbsp;</div>
                    
                    <div>
                    <!-- <label for="f_tujuan" class="small text-uppercase">Tujuan</label> -->
                        <select name="f_tujuan" id="f_tujuan" class="form-control" style="display: block; width: 130px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                            <option value="CGK" selected disabled>AREA TUJUAN</option>
                            @foreach($f_tujuan as $val)
                            <option style="width:25%" value="{{ $val->tujuan_area}}">{{ $val->kota." (".$val->tujuan_area.")"}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>&nbsp;&nbsp;&nbsp;</div>
                    
                    <div>
                        <button type="submit" class="btn btn-secondary">FILTER</button>
                    </div>
                    <div>&nbsp;&nbsp;&nbsp;</div>
                    <div style="border-left: 3px solid white; height: 25px;"></div>
                    <div>&nbsp;&nbsp;&nbsp;</div>
                        <a href="{{ route('master-harga-add') }}" class="btn btn-primary">TAMBAH DATA</a>
                    </form>
                </div>
            </div>
            <div class="card-body border-bottom py-3">
                <div class="table-responsive mt-2">
                    <table id="example" class="table table-vcenter card-table" style="width:100%">
                        <thead>
                            <tr>
                                <th>
                                <a href="" class="btn btn-icon border-dashed bg-dark-lt">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="12" cy="12" r="2"></circle>
                                            <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"></path>
                                        </svg>
                                    </a>
                                </th>
                                <th>Kode Area</th>
                                <th>Provinsi Asal</th>
                                <th>Kota Asal</th>
                                <th>Kecamatan Asal</th>
                                <th>Kel. / Desa Asal</th>
                                <th>Kode Area</th>
                                <th>Provinsi Tujuan</th>
                                <th>Kota Tujuan</th>
                                <th>Kecamatan Tujuan</th>
                                <th>Kel. / Desa Tujuan</th>
                                @foreach(config('servis') as $key => $servis)
                                <th>Leadtime {{$servis}}</th>
                                <th>Tarif {{$servis}}</th>
                                @endforeach
                                <th>Kantor</th>
                                <th class="text-center fixed-columns-right" style="width: 50px;" >
                                    <span class="text-muted">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z"></path>
                                            <path d="M16 5l3 3"></path>
                                            <path d="M9 7.07a7.002 7.002 0 0 0 1 13.93a7.002 7.002 0 0 0 6.929 -5.999"></path>
                                        </svg>
                                    </span>
                                </th>
                                <th class="text-center fixed-columns-right" style="width: 50px;">
                                    <span class="text-muted">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <line x1="4" y1="7" x2="20" y2="7"></line>
                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                        </svg>
                                    </span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(json_decode($hargas) as $val)
                            <tr>
                                <td>
                                    <a href="" class="btn btn-icon border-dashed bg-dark-lt">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="12" cy="12" r="2"></circle>
                                            <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"></path>
                                        </svg>
                                    </a>
                                </td>
                                <td>{{$val->asal_area}}</td>
                                <td>{{empty($val->alamat_asal[0])? '' : $val->alamat_asal[0]}}</td>
                                <td>{{empty($val->alamat_asal[1])? '' : $val->alamat_asal[1]}}</td>
                                <td>{{empty($val->alamat_asal[2])? '' : $val->alamat_asal[2]}}</td>
                                <td>{{empty($val->alamat_asal[3])? '' : $val->alamat_asal[3]}}</td>
                                <td>{{$val->tujuan_area}}</td>
                                <td>{{empty($val->alamat_tujuan[0])? '' : $val->alamat_tujuan[0]}}</td>
                                <td>{{empty($val->alamat_tujuan[1])? '' : $val->alamat_tujuan[1]}}</td>
                                <td>{{empty($val->alamat_tujuan[2])? '' : $val->alamat_tujuan[2]}}</td>
                                <td>{{empty($val->alamat_tujuan[3])? '' : $val->alamat_tujuan[3]}}</td>
                                @foreach(config('servis') as $key => $servis)
                                <td>{{$val->estimasi->$key}}</td>
                                <td>{{number_format((float)$val->harga->$key,2,",",".")}}</td>
                                @endforeach
                                <td>{{config('office')[auth()->user()->area]}}</td>
                                <td class="text-center" style="background-color: white;">
                                    <a href="{{ route('harga-edit', $val->id) }}" class="btn btn-icon border-dashed bg-yellow-lt">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z"></path>
                                            <path d="M16 5l3 3"></path>
                                            <path d="M9 7.07a7.002 7.002 0 0 0 1 13.93a7.002 7.002 0 0 0 6.929 -5.999"></path>
                                        </svg>
                                    </a>
                                </td>
                                <td class="text-center" style="background-color: white;">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('harga-delete', $val->id) }}" method="POST">                                                        
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-icon border-dashed bg-red-lt"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <line x1="4" y1="7" x2="20" y2="7"></line>
                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                        </svg></button>
                                </form>
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