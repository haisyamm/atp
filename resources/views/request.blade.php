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
                                        <label class="form-label visually-hidden" for="no_resi">No Resi</label>
                                        <input class="form-control input-box form-voyage-control" id="no_resi" type="text" placeholder="No Resi">
                                        <span class="nav-link-icon text-800 fs--1 input-box-icon">
                                            <svg class="svg-inline--fa fa-map-marker-alt fa-w-12" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="map-marker-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path></svg><!-- <i class="fas fa-map-marker-alt"></i> Font Awesome fontawesome.com --></span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-group-icon">
                                        <label class="form-label visually-hidden" for="alamat">Alamat</label>
                                        <input class="form-control input-box form-voyage-control" id="alamat" type="text" placeholder="Alamat">
                                        <span class="nav-link-icon text-800 fs--1 input-box-icon"><svg class="svg-inline--fa fa-map-marker-alt fa-w-12" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="map-marker-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path></svg><!-- <i class="fas fa-map-marker-alt"> </i> Font Awesome fontawesome.com --></span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-group-icon">
                                        <label class="form-label visually-hidden" for="no_hp">No HP</label>
                                        <input class="form-control input-box form-voyage-control" id="no_hp" type="text" placeholder="Nomor Hp">
                                        <span class="nav-link-icon text-800 fs--1 input-box-icon"><svg class="svg-inline--fa fa-map-marker-alt fa-w-12" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="map-marker-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path></svg><!-- <i class="fas fa-map-marker-alt"> </i> Font Awesome fontawesome.com --></span>
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
        $.ajax({
            type:'POST',
            url: '{{route("request-send")}}',
            dataType : 'json',
            data:      dataBatch,
            success:function(response) {
                console.log(response);
                window.location = "https://api.whatsapp.com/send?phone=6285156722379&text=Halo%20Mau%20Pickup%20Di%20dong%20:%0ANo%20RESI:%20"+
                dataBatch['no_resi']+"E%0AAlamat:%20"+dataBatch['alamat_pengirim'];
            }
        });
    });
});

    // Get input in form
    const getFormInput = () => {
        // Daerah Asal
        let nor = $('#no_resi').val();
        let add = $('#alamat').val();
        let nhp = $('#no_hp').val();

        let dataBatch = {
            no_resi: nor,
            alamat_pengirim: add,
            no_hp: nhp,
            "_token": "{{ csrf_token() }}",
        };

        return dataBatch;
    }
</script>
@endpush