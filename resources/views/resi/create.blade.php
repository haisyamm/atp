@extends('layouts.lm_admin')
@section('content')
    <div class="row g-1">
        <div class="col-md-12">
            <div class="card-header d-flex justify-content-between" style="background-color: #006a4e;">
                <h3 class="card-title text-white"><b>
                        <h3>{{ isset($resi->id) ? 'Edit' : 'Tambah' }} Resi</h3>
                    </b></h3>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body py-4 px-4">
                    <div class="h3 fw-bolder text-uppercase col-md-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="me-1 mb-1" width="20" height="20"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="12" cy="12" r="1"></circle>
                            <circle cx="12" cy="12" r="9"></circle>
                        </svg>
                        Detail Pengiriman
                    </div>
                    <div class="ps-1">
                        <div class="row" style="margin-top: 25px;">
                            <div class="col-md-4 form-group mb-3">
                                <label for="tgl_resi" class="small fw-bolder text-uppercase">Tanggal Resi</label>
                                <input type="datetime-local" name="tgl_resi" id="tgl_resi"
                                    class="form-control mt-1 datepicker" value="">
                            </div>
                            <div class="col-md-4 form-group mb-3">
                                <label for="servis" class="small fw-bolder text-uppercase">Pilih Layanan</label>
                                <select name="servis" id="servis" class="form-select mt-1">
                                    <option value="{{ isset($resi->servis) ? $resi->servis : '' }}" selected disabled>
                                        {{ isset($resi->resi) ? config('servis')[$resi->servis] : 'Pilih Servis' }}</option>
                                    @foreach (config('servis') as $key => $servis)
                                        <option value="{{ $key }}">{{ $servis }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 form-group mb-3">
                                <label for="no_reff" class="small fw-bolder text-uppercase">Refferensi</label>
                                <input type="text" oninput="this.value = this.value.toUpperCase()" name="no_reff"
                                    id="no_reff" class="form-control mt-1" placeholder="Refferensi (Optional)"
                                    value="{{ isset($resi->resi) ? $resi->resi : '' }}">
                            </div>
                            <!-- <div class="col-md-3 form-group mb-3" cek>
                                                    <label for="no_pickup" class="small fw-bolder text-uppercase">No Pickup</label>
                                                    <input type="text" oninput="this.value = this.value.toUpperCase()" name="no_pickup" id="no_pickup" class="form-control mt-1" placeholder="Masukan No Pickup" value="{{ isset($resi->resi) ? $resi->resi : '' }}">
                                                </div> -->
                            <!-- <div class="col-md-3 form-group mb-3">
                                                    <label for="tgl_pickup" class="small fw-bolder text-uppercase">Tanggal Pickup</label>
                                                    <input type="date" name="tgl_pickup" id="tgl_pickup" class="form-control mt-1 datepicker" placeholder="Masukan No Res" value="{{ isset($resi->resi) ? $resi->resi : '' }}">
                                                </div> -->
                            <div class="col-md-6 form-group mb-3">
                                <label for="nama_pengirim" class="small fw-bolder text-uppercase">Nama Pengirim</label>
                                <input type="text" oninput="this.value = this.value.toUpperCase()" name="nama_pengirim"
                                    id="nama_pengirim" class="form-control mt-1" placeholder="Masukan Nama"
                                    value="{{ isset($resi->id) ? $resi->estimasi : '' }}">
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="nama_penerima" class="small fw-bolder text-uppercase">Nama Penerima</label>
                                <input type="text" oninput="this.value = this.value.toUpperCase()" name="nama_penerima"
                                    id="nama_penerima" class="form-control mt-1" placeholder="Masukan Nama"
                                    value="{{ isset($resi->id) ? $resi->estimasi : '' }}">
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="alamat_pengirim_1" class="small fw-bolder text-uppercase">Alamat
                                    Pengirim</label>
                                <div class="col-md-6 form-select mb-3">
                                    <select name="alamat_pengirim_2" id="alamat_pengirim_2"
                                        class="distric form-select mt-1">
                                    </select>
                                </div>
                                <input type="text" oninput="this.value = this.value.toUpperCase()"
                                    name="alamat_pengirim_1" id="alamat_pengirim_1" class="form-control"
                                    placeholder="Nama Jalan, Patokan, RT/RW"
                                    value="{{ isset($resi->id) ? $resi->alamat_1 : '' }}">
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="alamat_penerima_1" class="small fw-bolder text-uppercase">Alamat
                                    Penerima</label>
                                <div class="col-md-6 form-select mb-3">
                                    <select name="alamat_penerima_2" id="alamat_penerima_2"
                                        class="distric form-control mt-1">
                                    </select>
                                </div>
                                <input type="text" oninput="this.value = this.value.toUpperCase()"
                                    name="alamat_penerima_1" id="alamat_penerima_1" class="form-control"
                                    placeholder="Nama Jalan, Patokan, RT/RW"
                                    value="{{ isset($resi->id) ? $resi->alamat_2 : '' }}">
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="tlp_pengirim" class="small fw-bolder text-uppercase">Telp. Pengirim</label>
                                <div class="input-group">
                                    <input type="tel" name="tlp_pengirim" id="tlp_pengirim"
                                        class="form-control mt-1" placeholder="Ex: 0811234567890"
                                        value="{{ isset($resi->id) ? $resi->estimasi : '' }}" onkeyup="tlpPengirim()"
                                        onkeypress="return onlyNumberKey(event)">
                                </div>
                                <div class="col-md-12 form-group form-switch mt-3">
                                    <input class="form-check-input" type="checkbox" id="save_pengirim"
                                        name="save_pengirim">
                                    <label class="fw-bolder text-uppercase ms-1" for="save_pengirim">Simpan
                                        Pengirim</label>
                                </div>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="tlp_penerima" class="small fw-bolder text-uppercase">Telp. Penerima</label>
                                <div class="input-group">
                                    <!-- <span class="input-group-text">
                                                        </span> -->
                                    <input type="tel" name="tlp_penerima" id="tlp_penerima"
                                        class="form-control mt-1" placeholder="Ex: 0881234567890" onkeyup="tlpPenerima()"
                                        onkeypress="return onlyNumberKey(event)">
                                </div>
                                <div class="col-md-12 form-group form-switch mt-3">
                                    <input class="form-check-input" type="checkbox" id="save_penerima"
                                        name="save_penerima">
                                    <label class="fw-bolder text-uppercase ms-1" for="save_penerima">Simpan
                                        Penerima</label>
                                </div>
                            </div>
                            <div class="col-md-6 form-group form-switch mb-3 ms-2">
                                <input class="form-check-input" type="checkbox" id="is_do" name="is_do">
                                <label class="fw-bolder text-uppercase ms-1" for="is_do">DO Balik</label>
                            </div>
                        </div>
                    </div>
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
                    <div class="ps-1">
                        <table class="table align-middle">
                            <tr>
                                <th>Berat Barang</th>
                                <th>Dimensi Paket (p x l x t) </th>
                                <th>Volume</th>
                                <th>Keterangan</th>
                            </tr>
                        </table>
                        <table id="emptbl" class="table align-middle">
                            <tr class="detail">
                                <td id="col0"><input type="text" id="berat_act" placeholder="Berat Actual"
                                        name="berat_act" value="" class="form-control" oninput="hitung()" /></td>
                                <td id="col1" style="width :40%">
                                    <div class="row">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Panjang"
                                                aria-label="Panjang" id="panjang" name="panjang" oninput="hitung()">
                                            <span class="input-group-text">x</span>
                                            <input type="text" class="form-control" placeholder="Lebar"
                                                aria-label="Lebar" id="lebar" name="lebar" oninput="hitung()">
                                            <span class="input-group-text">x</span>
                                            <input type="text" class="form-control" placeholder="Tinggi"
                                                aria-label="Tinggi" id="tinggi" name="tinggi" oninput="hitung()">
                                            <span class="input-group-text"><b>CM</b></span>
                                        </div>
                                    </div>
                                </td>
                                <td id="col2">
                                    <input type="text" id="volume" name="volume" value=""
                                        class="form-control" readonly />
                                </td>
                                <td id="col3">
                                    <input type="text" oninput="this.value = this.value.toUpperCase()"
                                        name="keterangan" class="form-control" placeholder="Keterangan..">
                                </td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td style="width :90%">&nbsp;</td>
                                <td class="text-end"><input type="button" value="Add Row" onclick="addRows()"
                                        class="btn btn-sm btn-primary" /></td>
                                <td class="text-end"><input type="button" value="Delete Row" onclick="deleteRows()"
                                        class="btn btn-sm btn-danger" /></td>
                                <br>
                            </tr>
                            <tr class="mb-6">
                                <td style="width :90%">Isi Barang</td>
                                <td colspan="2" class="text-end" style="width :30%">
                                    <div class="input-group mt-2">
                                        <input type="text" oninput="this.value = this.value.toUpperCase()"
                                            name="isi_barang" id="isi_barang" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr class="mb-6">
                                <td style="width :90%">Total Barang</td>
                                <td colspan="2" class="text-end" style="width :30%">
                                    <div class="input-group">
                                        <input type="text" oninput="this.value = this.value.toUpperCase()"
                                            name="total_barang" id="total_barang" class="form-control" readonly>
                                    </div>
                                </td>
                            </tr>
                            <tr class="mb-6">
                                <td style="width :90%">Total Berat Dimensi</td>
                                <td colspan="2" class="text-end" style="width :30%">
                                    <div class="input-group">
                                        <input type="text" oninput="this.value = this.value.toUpperCase()"
                                            name="total_volume" id="total_volume" class="form-control" readonly>
                                        <span class="input-group-text">KG</span>
                                    </div>
                                </td>
                            </tr class="mb-6">
                            <tr>
                                <td style="width :90%">Berat Dikenakan Biaya</td>
                                <td colspan="2" class="text-end" style="width :30%">
                                    <div class="input-group">
                                        <input type="text" oninput="this.value = this.value.toUpperCase()"
                                            name="total_berat" id="total_berat" class="form-control" readonly>
                                        <span class="input-group-text">KG</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="width :90%">Tarif</td>
                                <td colspan="2" class="text-end" style="width :30%">
                                    <div class="input-group">
                                        <span class="input-group-text">RP</span>
                                        <input type="text" oninput="this.value = this.value.toUpperCase()"
                                            name="tarif" id="tarif" class="form-control" readonly>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="width :70%">Biaya Kirim</td>
                                <td colspan="2" class="text-end" style="width :30%">
                                    <div class="input-group">
                                        <span class="input-group-text">RP</span>
                                        <input type="text" oninput="this.value = this.value.toUpperCase()"
                                            name="tot_biaya_kirim" id="tot_biaya_kirim" class="form-control" readonly>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
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
                    <div class="ps-1">
                        <input type="hidden" name="p_id" id="p_id"
                            value="{{ isset($resi->id) ? $resi->id : '' }}">
                        <div class="row" style="margin-top: 25px;">
                            <div class="col-md-3 form-group mb-3">
                                <label for="payment" class="small fw-bolder text-uppercase">Metode Pembayaran</label>
                                <select name="payment" id="payment" class="form-select mt-1" required>
                                    <option value="" class="form-select">Pilih...</option>
                                    @foreach (config('payment') as $key => $payment)
                                        <option value="{{ $key }}" class="form-select">{{ $payment }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- <div class="col-md-3 form-group mb-3">
                                                        <label for="tujuan_area" class="small fw-bolder text-uppercase">PPN</label>
                                                        <input type="text" oninput="this.value = this.value.toUpperCase()" name="tujuan_area" id="tujuan_area" class="form-control mt-1" placeholder="Masukan PPN" value="{{ isset($resi->id) ? $resi->tujuan_area : '' }}">
                                                    </div> -->
                            <div class="col-md-3 form-group mb-3">
                                <label for="packing" class="small fw-bolder text-uppercase">Biaya Packing</label>
                                <input type="text" name="packing" id="packing" class="form-control mt-1"
                                    placeholder="Packing" value="{{ isset($resi->id) ? $resi->tujuan_area : '' }}"
                                    oninput="total()">
                            </div>
                            <div class="col-md-3 form-group mb-3">
                                <label for="other" class="small fw-bolder text-uppercase">Others</label>
                                <input type="text" name="other" id="other" class="form-control mt-1"
                                    placeholder="Others" value="{{ isset($resi->id) ? $resi->tujuan_area : '' }}"
                                    oninput="total()">
                            </div>
                            <!-- <div class="col-md-3 form-group mb-3">
                                                        <label for="tujuan_area" class="small fw-bolder text-uppercase">Asuransi</label>
                                                        <input type="text" name="tujuan_area" id="tujuan_area" class="form-control mt-1" placeholder="Masukan Asuransi" value="{{ isset($resi->id) ? $resi->tujuan_area : '' }}">
                                                    </div> -->

                            <div class="col-md-3 form-group mb-3">
                                <label for="total_biaya" class="small fw-bolder text-uppercase">Total Biaya
                                    Keseluruhan</label>
                                <div class="input-group">
                                    <span class="input-group-text">RP</span>
                                    <input type="text" name="total_biaya" id="total_biaya" class="form-control"
                                        readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                    </div>
                    <div class="d-flex justify-content-end">
                        <a class="btn btn-light" href="{{ route('resi') }}">CANCEL</a>
                        <button class="btn btn-dark ms-1" onclick="onCreateAsset()">Add</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="card-body">
                            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="file" class="form-control">
                                <br>
                                <button class="btn btn-success">
                                    Import User Data
                                </button>
                                
                            </form>
                        </div> -->
@endsection
@push('script')
    <script type="text/javascript">
        function addRows() {
            var table = document.getElementById('emptbl');
            var rowCount = table.rows.length;
            var cellCount = table.rows[0].cells.length;
            var row = table.insertRow(rowCount);
            for (var i = 0; i <= cellCount; i++) {
                var cell = 'cell' + i;
                cell = row.insertCell(i);
                var copycel = document.getElementById('col' + i).innerHTML;
                cell.innerHTML = copycel;
                total_barang();
            }
        }

        function deleteRows() {
            var table = document.getElementById('emptbl');
            var rowCount = table.rows.length;
            if (rowCount > '1') {
                var row = table.deleteRow(rowCount - 1);
                rowCount--;
            } else {
                alert('There should be atleast one row');
            }
            total_barang();
        }

        function total_barang() {
            var table = document.getElementById('emptbl');
            var rowCount = table.rows.length;
            document.getElementById('total_barang').value = rowCount;
        }

        function hitung() {
            var total_vol = 0;
            var total_bact = 0;
            let ser = $('#servis').val();
            $('#emptbl tr').each(function() {
                var $this = $(this).attr('class', 'detail'),
                    bact = $this.find("input[name='berat_act']").val();

                p = $this.find("input[name='panjang']").val();
                l = $this.find("input[name='lebar']").val();
                t = $this.find("input[name='tinggi']").val();

                if (ser == "EKO") {
                    va = (p * l * t) / 4000;
                } else {
                    va = (p * l * t) / 6000;
                }
                va = va.toFixed(1)
                vol = $this.find("input[name='volume']");
                vol.val(va);
                total_vol = parseFloat(total_vol) + parseFloat(va);
                total_bact = parseFloat(total_bact) + parseFloat(bact);
            });

            document.getElementById('total_volume').value = total_vol;

            tarif();

            let trf = $('#tarif').val();

            if (total_vol > total_bact) {
                document.getElementById('total_berat').value = Math.ceil(total_vol);
            } else {
                document.getElementById('total_berat').value = total_bact;
            }
            let tb = $('#total_berat').val();
            tk = parseFloat(parseFloat(tb) * parseInt(trf));
            document.getElementById('tot_biaya_kirim').value = tk;
            document.getElementById('total_biaya').value = tk;
            document.getElementById('packing').value = 0;
            document.getElementById('other').value = 0;
        }

        function tarif() {
            let ser = $('#servis').val();
            let ka = "{{ auth()->user()->origin_id }}"; //role user
            let kt = $('#alamat_penerima_2').val();

            return data = $.ajax({
                url: '{{ route('tarif-fix') }}',
                type: 'GET',
                data: {
                    tujuan_id: kt,
                    asal_id: ka
                },
                dataType: 'json',
                success: function(data) {
                    document.getElementById('tarif').value = data[ser];

                    let tb = $('#total_berat').val();
                    if (tb > 0) {
                        tk = parseFloat(parseFloat(tb) * parseInt(data[ser]));
                        document.getElementById('tot_biaya_kirim').value = tk;
                        total();
                    }

                }
            });

        }

        function total() {
            let tbk = $('#tot_biaya_kirim').val();
            let packing = $('#packing').val();
            let others = $('#other').val();

            tot = parseFloat(tbk) + parseFloat(packing) + parseFloat(others);
            document.getElementById('total_biaya').value = tot;

        }

        $(document).ready(function() {
            total_barang();
        });

        $('#servis').on('change', function() {
            hitung();
        });
    </script>
    <script>
        $('.distric').select2({
            placeholder: 'Pilih Kecamatan',
            theme: "bootstrap",
            ajax: {
                url: '{{ route('distric') }}',
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
    </script>
    <script>
        const onCreateAsset = () => {
            var dataBatch = getFormInput();
            var p_id = $('#p_id').val();
            if (p_id === "") {
                dataBatch['detail_barang'] = getDetailInput();
                dataBatch['detail'] = getDetail();
                requestServer({
                    url: '{{ route('resi-send') }}',
                    data: dataBatch,
                    onSuccess: function(response) {
                        var url = '{{ route('show-detail', ':id') }}';
                        url = url.replace(':id', response.data.id);
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Your resi has been saved',
                            showConfirmButton: false,
                            timer: 1500
                        }).then((result) => {
                            window.location.assign(url)
                        })
                    }
                });
            } else {
                dataBatch['id'] = p_id;
                requestServer({
                    url: '{{ route('resi-update') }}',
                    data: dataBatch,
                    onSuccess: function(response) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Your resi has been update',
                            showConfirmButton: false,
                            timer: 1500
                        }).then((result) => {
                            window.location.assign('{{ route('resi') }}');
                        })
                    }
                });
            }
        }

        // Get input in form
        const getFormInput = () => {
            // Daerah Asal
            let aa = $('#alamat_pengirim_2 option:selected').text();
            let at = $('#alamat_penerima_2 option:selected').text();
            let ka = $('#alamat_pengirim_2').val();
            let kt = $('#alamat_penerima_2').val();
            let ara = $('#asal_area').val();
            let art = $('#tujuan_area').val();
            let tgr = $('#tgl_resi').val();
            let nor = $('#no_reff').val();
            let ser = $('#servis').val();
            let nmp = $('#nama_pengirim').val();
            let nma = $('#nama_penerima').val();
            let alp = $('#alamat_pengirim_1').val();
            let ala = $('#alamat_penerima_1').val();
            let tlpp = $('#tlp_pengirim').val();
            let tlpa = $('#tlp_penerima').val();
            let savep = $('#save_pengirim').prop('checked');
            let savea = $('#save_penerima').prop('checked');
            let ido = $('#is_do').prop('checked');
            let tb = $('#total_berat').val();
            let pay = $('#payment').val();
            let pack = $('#packing').val();
            let oth = $('#other').val();
            let total = $('#total_biaya').val();

            let dataBatch = {
                "_token": "{{ csrf_token() }}",
                asal_id: ka,
                tujuan_id: kt,
                alamat_pengirim_2: aa,
                alamat_penerima_2: at,
                asal_area: ara,
                tujuan_area: art,
                tgl_resi: tgr,
                no_reff: nor,
                servis: ser,
                nama_pengirim: nmp,
                nama_penerima: nma,
                alamat_pengirim_1: alp,
                alamat_penerima_1: ala,
                tlp_pengirim: tlpp,
                tlp_penerima: tlpa,
                simpan_pengirim: savep,
                simpan_penerima: savea,
                is_do: ido,
                total_berat: tb,
                payment: pay,
                packing: pack,
                others: oth,
                total_biaya: total
            };

            return dataBatch;
        }

        const getDetailInput = () => {
            // Daerah Asal

            var data = [];

            $('#emptbl tr').each(function() {
                var $this = $(this).attr('class', 'detail'),
                    bact = $this.find("input[name='berat_act']").val(),
                    p = $this.find("input[name='panjang']").val(),
                    l = $this.find("input[name='lebar']").val(),
                    t = $this.find("input[name='tinggi']").val(),
                    vol = $this.find("input[name='volume']").val();
                ket = $this.find("input[name='keterangan']").val();
                var temp = {
                    berat_actual: bact,
                    dimensi: p + " x " + l + " x " + t,
                    volume: vol,
                    keterangan: ket
                };
                data.push(temp);
            });

            return data;
        }

        const getDetail = () => {
            // Daerah Asal

            var data = [];

            let ibr = $('#isi_barang').val();
            let tbr = $('#total_barang').val();
            let tvl = $('#total_volume').val();
            let trf = $('#tarif').val();
            var dt = {
                isi: ibr,
                total_barang: tbr,
                total_volume: tvl,
                tarif: trf
            };
            data.push(dt);
            console.log(data);

            return data;
        }

        function backToList() {}
    </script>
    <script type="text/javascript">
        function onlyNumberKey(evt) {
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode;
            if (ASCIICode == 43) {
                return true;
            }
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) {
                return false;
            }
            return true;
        }

        function tlpPengirim() {
            var data = document.getElementById("tlp_pengirim").value;
            if (data[0] == 0) {
                document.getElementById("tlp_pengirim").value = "+62";
            } else if (data[0] == 6) {
                document.getElementById("tlp_pengirim").value = "+62";
            } else if (data[3] == 0) {
                document.getElementById("tlp_pengirim").value = "+62";
            }
        }

        function tlpPenerima() {
            var data = document.getElementById("tlp_penerima").value;
            if (data[0] == 0) {
                document.getElementById("tlp_penerima").value = "+62";
            } else if (data[0] == 6) {
                document.getElementById("tlp_penerima").value = "+62";
            } else if (data[3] == 0) {
                document.getElementById("tlp_penerima").value = "+62";
            }
        }
        var tanggal = new Date();
        var jam = tanggal.getHours();
        var menit = tanggal.getMinutes();
        var detik = tanggal.getSeconds();
    </script>
    <script>
        function showTime() {
            var date = new Date();
            var dd = date.getDate();
            var mm = date.getMonth() + 1;
            var yyyy = date.getFullYear();
            var h = date.getHours(); // 0 - 23
            var m = date.getMinutes(); // 0 - 59
            var s = date.getSeconds(); // 0 - 59

            if (dd < 10) {
                dd = `0${dd}`
            } else if (dd == null) {
                dd = `00`;
            }

            if (mm < 10) {
                mm = `0${mm}`;
            } else if (mm == null) {
                mm = `00`;
            }

            if (h < 10) {
                h = `0${h}`;
            }

            if (m < 10) {
                m = `0${m}`;
            }

            if (s < 10) {
                s = `0${s}`;
            }

            document.getElementById('tgl_resi').value = `${yyyy}-${mm}-${dd}T${h}:${m}:${s}`;

            setTimeout(showTime, 1000);

        }
        showTime();
    </script>
@endpush
