@extends('layouts.app')
@section('content')
<section class="mt-7 py-0">
    <div class="bg-holder w-50 bg-right d-none d-lg-block" style="background-image:url({{ asset('assets/img/hero-section-1.png') }});"></div>
    <!--/.bg-holder-->
    <div class="container">
        <div class="row">
            <div class="col-lg-6 py-5 py-xl-5 py-xxl-7">
                <h1 class="display-6 text-1000 fw-normal">Let’s find a Cargo</h1>
                <h1 class="display-5 text-primary fw-bold">TRACK & TRACE</h1>
                <div class="pt-5">
                    <nav>
                        <div class="nav nav-tabs voyage-tabs" id="nav-tab" role="tablist"><button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
                                <b>LACAK PENGIRIMAN</b></button>
                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
                                <b>CEK TARIF</b></button>
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <form class="row g-4 mt-2">
                                    <div class="col-sm-6 col-md-6 col-xl-5">
                                        <div class="input-group-icon"><label class="form-label visually-hidden" for="inputAddress1">Address 1</label><input class="form-control input-box form-voyage-control" id="inputAddress1" type="text" placeholder="Example :  123456789"><span class="nav-link-icon text-800 fs--1 input-box-icon"></span></div>
                                    </div>

                                    <div class="col-12 col-xl-10 col-lg-12 d-grid mt-6"><button class="btn btn-secondary" type="button" onClick="onCekTarif()">LACAK PENGIRIMAN</button></div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            
                                <form class="row g-4 mt-2" method="GET" action="{{ route('tarif') }}">
                                    <div class="col-12">
                                        <div class="form-control">
                                            <select name="asal_id" id="asal_id" class="distric form-control" readonly>
                                                <option value="317303" selected>DKI JAKARTA, KOTA JAKARTA BARAT, TAMAN SARI, MAPHAR</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-control">
                                            <select name="tujuan_id" id="tujuan_id" class="distric form-control ">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="panjang" class="small text-uppercase">panjang</label>
                                            <input class="form-control input-box form-voyage-control" id="panjang" name="panjang" type="text" placeholder="CM">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="lebar" class="small text-uppercase">lebar</label>
                                            <input class="form-control input-box form-voyage-control" id="lebar" name="lebar" type="text" placeholder="CM">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <label for="tinggi" class="small text-uppercase">tinggi</label>
                                        <div class="form-group">
                                            <input class="form-control input-box form-voyage-control" id="tinggi" name="tinggi" type="text" placeholder="CM">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <label for="berat" class="small text-uppercase">berat actual</label>
                                        <div class="form-group">
                                            <input class="form-control input-box form-voyage-control" id="berat" name="berat" type="text" placeholder="KG">
                                        </div>
                                    </div>

                                    <div class="col-12 d-grid mt-6"><button class="btn btn-secondary" type="submit">Cek Tarif</button></div>
                                </form>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================-->
<!-- <section> begin ============================-->
<section class="py-0 overflow-hidden" id="about">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 px-0"><img class="img-fluid order-md-0 mb-4 h-100 fit-cover" src="{{ asset('assets/img/hero-section-2.png') }}" alt="..."></div>
            <div class="col-lg-6 px-0 bg-primary-gradient bg-offcanvas-right">
                <div class="mx-6 mx-xl-8 my-8">
                    <h3 class="mb-2 text-light">ABOUT US</h3>
                    <hr>
                    <p class="text-light" align="justify" style="font-size: 14px"><b>PT. Agung Tunggal Prakarsa (ATP Cargo) </b> dibangun atas dasar pengalaman serta didukung oleh sumber daya manusia yang kompeten dibidangnya. Perusahaan yang berdiri sejak tahun 1998 dan bergerak di bidang transportasi logistik ke seluruh pelosok daerah di Indonesia.</p>
                    <p class="text-light" align="justify" style="font-size: 14px">Kami sangat berharap dapat melayani Anda dalam proses pendistribusian barang ke seluruh Indonesia dan siap untuk menjalin kerja sama yang baik.</p>
                    <hr>
                    <h3 class="mb-2 text-light">COMPANY VALUE</h3>
                    <div class="our-service-sass hide-pr show-pr">
                        <div class="inner-wrapper">
                            <div class="row">
                                <div class="col-lg-6 single-block aos-init aos-animate" data-aos="fade-up">
                                    <div class="service-block">
                                        <span class="snow-dot"></span>
                                        <span class="snow-dot"></span>
                                        <span class="snow-dot"></span>
                                        <span class="snow-dot"></span>
                                        <span class="snow-dot"></span>
                                        <span class="snow-dot"></span>
                                        <span class="snow-dot"></span>
                                        <div class="hover-content"></div>
                                        <i class="flaticon-web user"></i>
                                        <h5 class="title"><a>RISE TO CHALLENGE</a></h5>
                                        <p>Melihat setiap tantangan yang ada sebagai kesempatan untuk berkembang.</p>
                                        <a class="detail-button"><i class="icon-img"><img src="https://cdn-icons-gif.flaticon.com/6172/6172530.gif" width="100%"></i></a>
                                    </div> <!-- /.service-block -->
                                </div> <!-- /.single-block -->
                                <div class="col-lg-6 single-block aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                                    <div class="service-block">
                                        <span class="snow-dot"></span>
                                        <span class="snow-dot"></span>
                                        <span class="snow-dot"></span>
                                        <span class="snow-dot"></span>
                                        <span class="snow-dot"></span>
                                        <span class="snow-dot"></span>
                                        <span class="snow-dot"></span>
                                        <div class="hover-content"></div>
                                        <i class="flaticon-value icon-s"></i>
                                        <h5 class="title"><a>SHOW HONEST RESULT</a></h5>
                                        <p>Berintegritas dan menjunjung tinggi nilai kejujuran dalam setiap hal</p>
                                        <a href="#" class="detail-button">
                                            <i class="icon-img"><img src="https://cdn-icons-gif.flaticon.com/6172/6172511.gif" width="100%"></i>
                                        </a>
                                    </div> <!-- /.service-block -->
                                </div> <!-- /.single-block -->

                            </div> <!-- /.row -->
                        </div> <!-- /.inner-wrapper -->
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end of .container-->
</section><!-- <section> close ============================-->
<!-- ============================================-->

<section class="py-4 overflow-hidden backgroundservices" id="services" style="background-image:url({{ asset('assets/img/gallery/bg-bot.png') }}); background-size: 100%; background-position: center; position: relative;">
    <div class="container">
        <div class="row py-0">
            <h1 class="display-5 text-primary fw-bold">SERVICES & PRODUCT</h1>
        </div>
        <div class="our-service-sass hide-pr show-pr">
            <div class="inner-wrapper">
                <div class="row">
                    <div class="col-lg-4 single-block aos-init aos-animate" data-aos="fade-up">
                        <div class="service-block">
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <div class="hover-content"></div>
                            <i class="flaticon-web user"></i>
                            <h5 class="title"><a>REGULER</a></h5>
                            <h6 class="text-secondary me-3">UDARA, DARAT, LAUT</h6>
                            <p align="justify">Regular adalah jasa pengiriman dengan estimasi pengiriman sekitar <br>1-4 hari kerja, tergantung daerah tujuan pengiriman.</p>
                            <a class="detail-button"><i class="icon-img"><img src="https://cdn-icons-gif.flaticon.com/6172/6172532.gif" width="100%"></i></a>
                        </div> <!-- /.service-block -->
                    </div> <!-- /.single-block -->
                    <div class="col-lg-4 single-block aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-block">
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <div class="hover-content"></div>
                            <i class="flaticon-value icon-s"></i>
                            <h5 class="title"><a>KILAT</a></h5>
                            <h6 class="text-secondary me-3">UDARA, DARAT, LAUT</h6>
                            <p align="justify">Kilat adalah jasa pengiriman dengan estimasi pengiriman sekitar <br>1-2 hari kerja, tergantung daerah tujuan pengiriman.</p>
                            <a href="#" class="detail-button">
                                <i class="icon-img"><img src="https://cdn-icons-gif.flaticon.com/6172/6172512.gif" width="100%"></i>
                            </a>
                        </div> <!-- /.service-block -->
                    </div> <!-- /.single-block -->
                    <div class="col-lg-4 single-block aos-init aos-animate" data-aos="fade-up" data-aos-delay="500">
                        <div class="service-block">
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <div class="hover-content"></div>
                            <i class="flaticon-login icon-s"></i>
                            <h5 class="title"><a>EKONOMIS</a></h5>
                            <h6 class="text-secondary me-3">UDARA, DARAT, LAUT</h6>
                            <p align="justify">Ekonomis adalah jasa pengiriman dengan estimasi pengiriman sekitar <br>7-10 hari kerja, tergantung daerah tujuan pengiriman.</p>
                            <a href="#" class="detail-button"><i class="icon-img">
                                    <img src="https://cdn-icons-gif.flaticon.com/6172/6172509.gif" width="100%">
                                </i></a>
                        </div> <!-- /.service-block -->
                    </div> <!-- /.single-block -->

                </div> <!-- /.row -->
            </div> <!-- /.inner-wrapper -->
        </div>
    </div>
</section>


<section class="py-4 overflow-hidden" id="whyus">
    <div class="container">
        <div class="row py-2">
            <h1 class="display-5 text-primary fw-bold">WHY CHOOSE US</h1>
        </div>
        <div class="our-service-sass hide-pr show-pr">
            <div class="inner-wrapper">
                <div class="row">

                    <div class="col-lg-3 single-block aos-init aos-animate" data-aos="fade-up">
                        <div class="service-block">
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <div class="hover-content"></div>
                            <i class="flaticon-web user"></i>
                            <h5 class="title"><a>RELIABLE</a></h5>
                            <h6 class="text-secondary me-3">CUSTOMER SERVICE 24/7</h6>
                            <p align="justify">Pantau, cari informasi produk maupun klaim melalui customer care ATP dengan mudah. Chat di whatsapp maupun telpon</p>
                            <a class="detail-button"><i class="icon-img"><img src="assets/whyus1.svg" width="150px"></i></a>
                        </div> <!-- /.service-block -->
                    </div> <!-- /.single-block -->
                    <div class="col-lg-3 single-block aos-init aos-animate" data-aos="fade-up">
                        <div class="service-block">
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <div class="hover-content"></div>
                            <i class="flaticon-web user"></i>
                            <h5 class="title"><a>FAST</a></h5>
                            <h6 class="text-secondary me-3">PAKET CEPAT SAMPAI</h6>
                            <p align="justify">Menjangkau lebih cepat dengan dukungan armada pesawat dan frekuensi penerbangan yang tinggi dari ATP Group.</p>
                            <a class="detail-button"><i class="icon-img"><img src="assets/whyus2.svg" width="150px"></i></a>
                        </div> <!-- /.service-block -->
                    </div> <!-- /.single-block -->
                    <div class="col-lg-3 single-block aos-init aos-animate" data-aos="fade-up">
                        <div class="service-block">
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <div class="hover-content"></div>
                            <i class="flaticon-web user"></i>
                            <h5 class="title"><a>AFFORDABLE</a></h5>
                            <h6 class="text-secondary me-3">LEBIH HEMAT DAN PRAKTIS</h6>
                            <p align="justify">Kirim paket sebanyak apapun tanpa takut dengan biaya pengiriman dan tanpa biaya jemput.</p>
                            <a class="detail-button"><i class="icon-img"><img src="assets/whyus3.svg" width="150px"></i></a>
                        </div> <!-- /.service-block -->
                    </div> <!-- /.single-block -->
                    <div class="col-lg-3 single-block aos-init aos-animate" data-aos="fade-up">
                        <div class="service-block">
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <div class="hover-content"></div>
                            <i class="flaticon-web user"></i>
                            <h5 class="title"><a>CONNECTED</a></h5>
                            <h6 class="text-secondary me-3">SELURUH NUSANTARA</h6>
                            <p align="justify">Dengan lebih dari 7000 mitra tersebar di seluruh nusantara, kirim ke mana saja di seluruh Indonesia maupun ke luar negri.</p>
                            <a class="detail-button"><i class="icon-img"><img src="assets/whyus4.svg" width="150px"></i></a>
                        </div> <!-- /.service-block -->
                    </div> <!-- /.single-block -->

                </div> <!-- /.row -->
            </div> <!-- /.inner-wrapper -->
        </div>
    </div>
</section>


<section class="py-0 overflow-hidden backgroundfooter" id="contactus" style="background-image:url({{ asset('assets/img/gallery/bg-footer.png') }}); background-size: 100%; background-position: center; position: relative;">
    <div class="container">
        <div class="row py-2">
            <h1 class="display-5 text-primary fw-bold">CONTACT US</h1>
        </div>
        <div class="our-service-sass hide-pr show-pr">
            <div class="inner-wrapper">
                <div class="row">
                    <div class="col-lg-6 single-block aos-init aos-animate" data-aos="fade-up">
                        <div class="service-block">
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <div class="hover-content"></div>
                            <i class="flaticon-web user"></i>
                            <h5 class="title"><a>FIND US ON MAPS</a></h5>
                            <p><i class="fas fa-map-marker-alt me-3"></i><span class="text lh-lg">Jl. Kebon Jeruk XV No. 33 Maphar, Taman Sari Jakarta Barat – DKI Jakarta</span></p>

                            <a class="detail-button"><i class="icon-img"><img src="assets/maps.svg" width="150px"></i></a>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d991.7073701864455!2d106.81990182915112!3d-6.153586999721546!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x17b70126c393d47c!2zNsKwMDknMTIuOSJTIDEwNsKwNDknMTMuNiJF!5e0!3m2!1sen!2sid!4v1661020233257!5m2!1sen!2sid" width="650" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                        </div> <!-- /.service-block -->
                    </div> <!-- /.single-block -->
                    <div class="col-lg-6 single-block aos-init aos-animate" data-aos="fade-up">
                        <div class="service-block">
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <div class="hover-content"></div>
                            <i class="flaticon-web user"></i>
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
    function hitung() {
        var panjang = document.getElementById("panjang");
        var p = panjang.value;
        var lebar = document.getElementById("lebar");
        var l = lebar.value;
        var tinggi = document.getElementById("tinggi");
        var t = tinggi.value;

        var berat = document.getElementById("berat");
        var v = p * l * t;
        berat.value = v;
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
<script>
    const onCekTarif = () => {
        var dataBatch = getFormInput();
        requestServer({
            url: '{{route("tarif")}}',
            data: dataBatch
        });
    }

    // Get input in form
    const getFormInput = () => {
        // Daerah Asal
        let ka = $('#asal_id').val();
        let kt = $('#tujuan_id').val();
        let vol = $('#berat').val();

        let dataBatch = {
            "_token": "{{ csrf_token() }}",
            asal_id: ka,
            tujuan_id: kt,
            berat: vol
        };

        return dataBatch;
    }
</script>
@endpush