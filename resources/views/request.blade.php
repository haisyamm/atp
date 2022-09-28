@extends('layouts.app')
@section('content')
<section class="py-8 overflow-hidden backgroundfooter" id="contactus">

    <div class="container">
        <div class="our-service-sass hide-pr show-pr">
            <div class="inner-wrapper">
                <div class="row py-0">
                    <div class="col-lg-6 single-block aos-init aos-animate" data-aos="fade-up">
                        <div class="service-block">
                            <div class="hover-content"></div>
                            <i class="flaticon-web user"></i>
                            <h1 class="title"><a>Request Pickup</a></h1>
                            <div class="row g-4">
                                <div class="col-12">
                                    <div class="input-group-icon">
                                        <label class="form-label " for="nama_pengirim">Nama Pengirim</label>
                                        <input class="form-control" id="nama_pengirim" type="text" placeholder="Nama Pengirim">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-group-icon">
                                        <label class="form-label " for="alamat">Alamat</label>
                                        <input class="form-control" id="alamat" type="text" placeholder="Alamat">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-group-icon">
                                        <label class="form-label " for="no_hp">Nomor yang dapat dihubungi:</label>
                                        <input class="form-control" id="no_hp" type="text" placeholder="Nomor yang dapat dihubungi">
                                    </div>
                                </div>
                            
                                <div class="col-12">
                                    <div class="input-group-icon">
                                        <label class="form-label" for="date">Request Waktu Pick Up</label>
                                        <input class="form-control datepicker" id="date" type="date">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-group-icon">
                                        <input class="form-check-input" type="radio" name="option1" id="option1" value="09.00-12.00">
                                            <label class="form-check-label" for="option1">
                                                09.00-12.00
                                            </label>
                                        </div>
                                        <input class="form-check-input" type="radio" name="option1" id="option1" value="13.00-16.00">
                                        <label class="form-check-label" for="option2">
                                            13.00-16.00
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-group-icon">
                                    <label class="form-label " for="tujuan_id">Tujuan</label>
                                        <select name="tujuan_id" id="tujuan_id" class="distric form-control ">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-group-icon">
                                    <label class="form-label " for="servis">Servis</label>
                                        <select name="servis" id="servis" class="form-select mt-1">
                                            <option value="{{ isset($resi->servis) ? $resi->servis : ''  }}" selected disabled>{{ isset($resi->resi) ? config('servis')[$resi->servis] : 'Pilih Servis'  }}</option>
                                            @foreach(config('servis') as $key => $servis)
                                            <option value="{{$key}}">{{$servis}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-6">
                                    <div class="input-group-icon">
                                        <label class="form-label " for="qty">Jumlah Pcs</label>
                                        <input class="form-control" id="qty" type="text" placeholder="Jumlah">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group-icon">
                                        <label class="form-label " for="berat">Total Berat</label>
                                        <input class="form-control" id="berat" type="text" placeholder="..../KG">
                                    </div>
                                </div>
                                </div>                            
                                <div class="col-12 d-grid mt-6"><button class="btn btn-secondary"  id="btnRequest">Request</button></div>
                            </div>
                        </div> <!-- /.service-block -->
                    </div> <!-- /.single-block -->
                    <div class="col-lg-6 single-block aos-init aos-animate" data-aos="fade-up">
                        <div class="service-block">
                            <div class="hover-content"></div>
                            <h5 class="title"><a>ANY INQUIRY ? PLEASE CONTACT US</a></h5>
                            <h5 class="text-secondary me-3">Head Office</h5>
                            <p><i class="fas fa-phone-alt me-3"></i><span class="text">(021) 6249965</span></p>
                            <p><i class="fas fa-envelope me-3"></i><span class="text">info@atpcargo.co.id</span></p>
                            <hr>
                            <h5 class="text-secondary me-3">Operational Office</h5>
                            <p><i class="fas fa-phone-alt me-3"></i><span class="text">(021) 6249965</span></p>
                            <p><i class="fas fa-envelope me-3"></i><span class="text">info@atpcargo.co.id</span></p>
                            <hr>
                            <h5 class="text-secondary me-3">Marketing</h5>
                            <p><i class="fas fa-phone-alt me-3"></i><span class="text">(021) 6249965</span></p>
                            <p><i class="fas fa-envelope me-3"></i><span class="text">info@atpcargo.co.id</span></p>
                            <hr>
                            <div class="mt-12">
                                <a href="#!" class="text-primary"><i><img src="assets/icons/facebook.png" width="30px"></i></a>&nbsp;&nbsp;
                                <a href="#!" class="text-primary"><i><img src="assets/icons/instagram.png" width="30px"></i></a>&nbsp;&nbsp;
                                <a href="#!" class="text-primary"><i><img src="assets/icons/whatsapp.png" width="30px"></i></a>&nbsp;&nbsp;
                                <a href="#!" class="text-primary"><i><img src="assets/icons/youtube.png" width="30px"></i></a>&nbsp;&nbsp;
                                <a href="#!" class="text-primary"><i><img src="assets/icons/linkedin.png" width="30px"></i></a>&nbsp;&nbsp;
                                <a href="#!" class="text-primary"><i><img src="assets/icons/telegram.png" width="30px"></i></a>&nbsp;&nbsp;
                            </div>
                            <a class="detail-button"><i class="icon-img"><img src="assets/contactus3.svg" width="150px"></i></a>
                        </div> <!-- /.service-block -->
                    </div> <!-- /.single-block -->

                </div> <!-- /.row -->
            </div> <!-- /.inner-wrapper -->
        </div>
    </div>

    <!-- end of .container-->

</section>
@endsection

@push('script')
<script>
$(document).ready(function(){
    $('#btnRequest').click(function(){
        var dataBatch = getFormInput();
        let tid = $('#tujuan_id option:selected').text();
        let srv = $('#servis option:selected').text();
        let tgl = $('#date').val();
        let time = $('#option1').val();
        let qty = $('#qty').val();
        let kg = $('#berat').val();

        let d = new Date(tgl);
        let ye = new Intl.DateTimeFormat('id', { year: 'numeric' }).format(d);
        let mo = new Intl.DateTimeFormat('id', { month: 'long' }).format(d);
        let da = new Intl.DateTimeFormat('id', { day: '2-digit' }).format(d);
        date = da+"-"+mo+"-"+ye;

            window.location = "https://api.whatsapp.com/send?phone=6285880555650&text="+
            "*Halo Mas Agung! Tolong pick-up barang saya ya!*"+
            "%0A Nama Pengirim:%20"+dataBatch['nama_pengirim']+
            "%0A Alamat Pick-Up:%20"+dataBatch['alamat_pengirim']+
            "%0A Request Waktu Pick Up:%20"+date+" "+time+
            "%0A Tujuan: "+tid+
            "%0A Layanan: %20"+srv+
            "%0A Jumlah PCS:%20"+qty+
            "%20%20%20Total Berat:%20"+kg+
            "%0A Terkait penjemputan dapat menghubungi nomor ini :%20"+dataBatch['no_hp'];
    });
});

    // Get input in form
    const getFormInput = () => {
        // Daerah Asal
        let nor = $('#nama_pengirim').val();
        let add = $('#alamat').val();
        let nhp = $('#no_hp').val();

        let dataBatch = {
            nama_pengirim: nor,
            alamat_pengirim: add,
            no_hp: nhp,
            "_token": "{{ csrf_token() }}",
        };

        return dataBatch;
    }
    $('.distric').select2({
    placeholder: 'Pilih Kecamatan',
    theme: "bootstrap",
    ajax: {
        url: '{{route("distric")}}',
        dataType: 'json',
        delay: 250,

        processResults: function (data) {
            return {
                results: $.map(data, function (item) {
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
</script>
@endpush