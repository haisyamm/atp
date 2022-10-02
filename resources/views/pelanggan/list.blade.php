@extends('layouts.lm_admin')
@section('css')
    <style>
        th,
        td {
            white-space: nowrap;
        }

        div.dataTables_wrapper {
            margin: 0 auto;
        }
    </style>
@stop
@section('content')
    <div class="row p-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title"><B>List Data Customer</B></h3>
                    <div class="">
                        <a href="{{ route('pelanggan.create') }}" class="btn btn-dark">TAMBAH</a>
                    </div>
                </div>
                <div class="card-body border-bottom py-3">
                    <div class="table-responsive mt-2">
                        <table id="booking" class="stripe row-border order-column" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Detail Alamat</th>
                                    <th>No Tlp</th>
                                    <th class="text-center fixed-columns-right" style="width: 50px;">
                                        <span class="text-muted">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-edit-circle" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z">
                                                </path>
                                                <path d="M16 5l3 3"></path>
                                                <path d="M9 7.07a7.002 7.002 0 0 0 1 13.93a7.002 7.002 0 0 0 6.929 -5.999">
                                                </path>
                                            </svg>
                                        </span>
                                    </th>
                                    <th class="text-center fixed-columns-right" style="width: 50px;">
                                        <span class="text-muted">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-circle-x" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <circle cx="12" cy="12" r="9"></circle>
                                                <path d="M10 8l4 8"></path>
                                                <path d="M10 16l4 -8"></path>
                                            </svg>
                                        </span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pelanggan as $no => $plg)
                                <?php $add = json_decode($plg->alamat);?>
                                    <tr>
                                        <td>{{ $no + 1 }}</td>
                                        <td>{{ $plg->nama }}</td>
                                        <td>{{ $add->alamat_1 }}</td>
                                        <td>{{ $add->alamat_2 }}</td>
                                        <td>{{ $plg->no_tlp }}</td>
                                        <td>
                                            <a href="{{ route('pelanggan.edit', $plg->id) }}" class="btn btn-icon border-dashed bg-yellow-lt">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z"></path>
                                            <path d="M16 5l3 3"></path>
                                            <path d="M9 7.07a7.002 7.002 0 0 0 1 13.93a7.002 7.002 0 0 0 6.929 -5.999"></path>
                                        </svg>
                                    </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('pelanggan.destroy',$plg->id) }}" method="POST"
                                                style="display: inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-icon border-dashed bg-danger-lt"><span class="text-muted">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-circle-x" width="24" height="24"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <circle cx="12" cy="12" r="9"></circle>
                                                    <path d="M10 8l4 8"></path>
                                                    <path d="M10 16l4 -8"></path>
                                                </svg>
                                            </span></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">Tidak ada data</td>
                                    </tr>
                                @endforelse
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
        $(document).ready(function() {
            $('#booking').DataTable({
                fixedColumns: {
                    left: false,
                    right: 2
                }
            });
        });
    </script>
@endpush
