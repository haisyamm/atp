@extends('layouts.lm_admin')
@section('content')
    <div class="row p-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Tambah Data Master</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('pelanggan.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label class="small fw-bolder text-uppercase">Nama lengkap:</label>
                            <input type="text" name="nama" class="form-control mt-2"
                                placeholder="Masukan nama lengkap disini...">
                        </div>
                        <div class="form-group mb-3">
                            <label class="small fw-bolder text-uppercase">Alamat:</label>
                            <div class="form-select mt-2">
                                <select name="alamat" class="distric form-select">
                                    <option value="Tasikmalaya">Tasikmalaya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="small fw-bolder text-uppercase">No Telp:</label>
                            <input type="number" name="no_tlp" class="form-control mt-2"
                                placeholder="Masukan no telp disini...">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
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
                va = va.toFixed(4)
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
                tk = parseFloat(Math.ceil(total_vol) * parseInt(trf));
            } else {
                document.getElementById('total_berat').value = total_bact;
                tk = parseFloat(Math.ceil(total_bact) * parseInt(trf));
            }
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
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Your resi has been saved',
                            showConfirmButton: false,
                            timer: 1500
                        }).then((result) => {
                            window.location.assign('{{ route('resi') }}')
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
            let savep = $('#save_pengirim').val();
            let savea = $('#save_penerima').val();
            let ido = $('#is_do').val();
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
                var temp = {
                    berat_actual: bact,
                    dimensi: p + " x " + l + " x " + t,
                    volume: vol
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
@endpush
