@extends('layouts.app')
@section('content')
<section class="mt-7 py-0">
    <div class="bg-holder w-50 bg-right d-none d-lg-block" style="background-image:url({{ asset('assets/img/hero-section-1.png') }});"></div>
    <!--/.bg-holder-->
    <div class="container">
        <div class="row">
        <div class="col-lg-6 py-5 py-xl-5 py-xxl-7">
            <h1 class="display-3 text-1000 fw-normal">Let’s find a cargo</h1>
            <h1 class="display-3 text-primary fw-bold">TRACK AND TRACE</h1>
            <div class="pt-5">
            <nav>
                <div class="nav nav-tabs voyage-tabs" id="nav-tab" role="tablist"><button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path></svg><!-- <i class="fas fa-map-marker-alt"></i> Font Awesome fontawesome.com -->&nbsp;
                <b>Lacak Pengiriman</b></button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"> <svg class="svg-inline--fa fa-plane fa-w-18" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plane" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M480 192H365.71L260.61 8.06A16.014 16.014 0 0 0 246.71 0h-65.5c-10.63 0-18.3 10.17-15.38 20.39L214.86 192H112l-43.2-57.6c-3.02-4.03-7.77-6.4-12.8-6.4H16.01C5.6 128-2.04 137.78.49 147.88L32 256 .49 364.12C-2.04 374.22 5.6 384 16.01 384H56c5.04 0 9.78-2.37 12.8-6.4L112 320h102.86l-49.03 171.6c-2.92 10.22 4.75 20.4 15.38 20.4h65.5c5.74 0 11.04-3.08 13.89-8.06L365.71 320H480c35.35 0 96-28.65 96-64s-60.65-64-96-64z"></path></svg><!-- <i class="fas fa-plane"></i> Font Awesome fontawesome.com -->&nbsp;
                    <b>Cek Tarif</b></button>
                </div>
                <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <form class="row g-4 mt-2">
                    <div class="col-sm-6 col-md-6 col-xl-5">
                        <div class="input-group-icon"><label class="form-label visually-hidden" for="inputAddress1">Address 1</label><input class="form-control input-box form-voyage-control" id="inputAddress1" type="text" placeholder="Example :  123456789"><span class="nav-link-icon text-800 fs--1 input-box-icon"><svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path></svg><!-- <i class="fas fa-map-marker-alt"></i> Font Awesome fontawesome.com --></span></div>
                    </div>
                    
                    <div class="col-12 col-xl-10 col-lg-12 d-grid mt-6"><button class="btn btn-secondary" type="button" onClick="onCekTarif()">Lacak Pengiriman</button></div>
                    </form>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <form class="row g-4 mt-2" method="GET" action="{{ route('tarif') }}">
                    <div class="col-12">
                        <div class="form-control">
                            <select name="kelurahan_asal" id="kelurahan_asal" class="village form-control">
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-control">
                            <select name="kelurahan_tujuan" id="kelurahan_tujuan" class="village form-control ">
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="panjang" class="small text-uppercase">panjang</label>
                            <input class="form-control input-box form-voyage-control" id="panjang" name="panjang" type="text" placeholder="CM" oninput="hitung()">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="lebar" class="small text-uppercase">lebar</label>
                            <input class="form-control input-box form-voyage-control" id="lebar" name="lebar" type="text" placeholder="CM" oninput="hitung()">
                        </div>
                    </div>
                    <div class="col-3">
                    <label for="tinggi" class="small text-uppercase">tinggi</label>
                        <div class="form-group">
                            <input class="form-control input-box form-voyage-control" id="tinggi" name="tinggi" type="text" placeholder="CM" oninput="hitung()">
                        </div>
                    </div>
                    <div class="col-3">
                    <label for="berat" class="small text-uppercase">berat</label>
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
            <h3 class="mb-2 text-light">About Us</h3>
            <hr>
            <p class="text-light" align="justify" style="font-size:14px">
                <b>PT. Agung Tunggal Prakarsa (ATP Cargo) </b>
                dibangun atas dasar pengalaman serta didukung oleh sumber daya manusia yang kompeten dibidangnya. Perusahaan yang berdiri sejak tahun 1998 dan bergerak di bidang transportasi logistik ke seluruh pelosok daerah di Indonesia.
            </p>
            <p class="text-light" align="justify" style="font-size:14px">
                Kami sangat berharap dapat melayani Anda dalam proses pendistribusian barang ke seluruh Indonesia dan siap untuk menjalin kerja sama yang baik.
            </p>
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
                                    <i class="icon-img"><img src="https://cdn-icons-gif.flaticon.com/6172/6172511.gif"  width="100%"></i>
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

    <section class="py-4 overflow-hidden backgroundservices" id="services">
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
                                <i class="icon-img"><img src="https://cdn-icons-gif.flaticon.com/6172/6172512.gif"  width="100%"></i>
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
    
<section id="testimonial">
    <div class="container">
        <div class="row h-100">
        <div class="col-lg-7 mx-auto text-center mb-6">
            <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">Flash Deals</h5>
        </div>
        <div class="col-12">
            <div class="carousel slide" id="carouselTestimonials" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item" data-bs-interval="10000">
                <div class="row h-100 align-items-center g-2">
                    <div class="col-md-4 mb-3 mb-md-0 h-100">
                    <div class="card card-span h-100 text-white"><img class="img-fluid h-100" src="{{ asset('assets/img/gallery') }}/maldives.png" alt="...">
                        <div class="card-img-overlay ps-0"><span class="badge bg-primary ms-3 me-1 p-2"><svg class="svg-inline--fa fa-clock fa-w-16 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="clock" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256,8C119,8,8,119,8,256S119,504,256,504,504,393,504,256,393,8,256,8Zm92.49,313h0l-20,25a16,16,0,0,1-22.49,2.5h0l-67-49.72a40,40,0,0,1-15-31.23V112a16,16,0,0,1,16-16h32a16,16,0,0,1,16,16V256l58,42.5A16,16,0,0,1,348.49,321Z"></path></svg><!-- <i class="fas fa-clock me-1"></i> Font Awesome fontawesome.com --><span>20:04:32:21</span></span><span class="badge bg-secondary p-2"><svg class="svg-inline--fa fa-bolt fa-w-10 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bolt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M296 160H180.6l42.6-129.8C227.2 15 215.7 0 200 0H56C44 0 33.8 8.9 32.2 20.8l-32 240C-1.7 275.2 9.5 288 24 288h118.7L96.6 482.5c-3.6 15.2 8 29.5 23.3 29.5 8.4 0 16.4-4.4 20.8-12l176-304c9.3-15.9-2.2-36-20.7-36z"></path></svg><!-- <i class="fas fa-bolt me-1"></i> Font Awesome fontawesome.com --><span>trending</span><svg class="svg-inline--fa fa-bolt fa-w-10 ms-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bolt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M296 160H180.6l42.6-129.8C227.2 15 215.7 0 200 0H56C44 0 33.8 8.9 32.2 20.8l-32 240C-1.7 275.2 9.5 288 24 288h118.7L96.6 482.5c-3.6 15.2 8 29.5 23.3 29.5 8.4 0 16.4-4.4 20.8-12l176-304c9.3-15.9-2.2-36-20.7-36z"></path></svg><!-- <i class="fas fa-bolt ms-1"> </i> Font Awesome fontawesome.com --></span></div>
                        <div class="card-body ps-0">
                        <h5 class="fw-bold text-1000 mb-4 text-truncate">Mermaid Beach Resort: The most joyful way to spend your holiday</h5>
                        <div class="d-flex align-items-center justify-content-start"><span class="text-800 fs--1 me-2"><svg class="svg-inline--fa fa-map-marker-alt fa-w-12" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="map-marker-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path></svg><!-- <i class="fas fa-map-marker-alt"></i> Font Awesome fontawesome.com --></span><span class="text-900 me-3">Maldives</span><span class="text-800 fs--1 me-2"><svg class="svg-inline--fa fa-calendar fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="calendar" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M12 192h424c6.6 0 12 5.4 12 12v260c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V204c0-6.6 5.4-12 12-12zm436-44v-36c0-26.5-21.5-48-48-48h-48V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H160V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H48C21.5 64 0 85.5 0 112v36c0 6.6 5.4 12 12 12h424c6.6 0 12-5.4 12-12z"></path></svg><!-- <i class="fas fa-calendar"></i> Font Awesome fontawesome.com --></span><span class="text-900">4 days</span></div>
                        <p class="text-decoration-line-through text-900 mt-3 mb-0">$200</p>
                        <h1 class="mb-3 text-primary fw-bolder fs-4"><span>$175</span><span class="text-900 fs--1 fw-normal">/Per person</span></h1><span class="badge bg-soft-secondary p-2"><svg class="svg-inline--fa fa-tag fa-w-16 text-secondary fs--1 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="tag" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M0 252.118V48C0 21.49 21.49 0 48 0h204.118a48 48 0 0 1 33.941 14.059l211.882 211.882c18.745 18.745 18.745 49.137 0 67.882L293.823 497.941c-18.745 18.745-49.137 18.745-67.882 0L14.059 286.059A48 48 0 0 1 0 252.118zM112 64c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48z"></path></svg><!-- <i class="fas fa-tag text-secondary fs--1 me-1"></i> Font Awesome fontawesome.com --><span class="text-secondary fw-normal fs-1">-15%</span></span>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0 h-100">
                    <div class="card card-span h-100 text-white"><img class="img-fluid h-100" src="{{ asset('assets/img/gallery') }}/cinnamon.png" alt="...">
                        <div class="card-img-overlay ps-0"><span class="badge bg-primary ms-3 me-1 p-2"><svg class="svg-inline--fa fa-clock fa-w-16 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="clock" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256,8C119,8,8,119,8,256S119,504,256,504,504,393,504,256,393,8,256,8Zm92.49,313h0l-20,25a16,16,0,0,1-22.49,2.5h0l-67-49.72a40,40,0,0,1-15-31.23V112a16,16,0,0,1,16-16h32a16,16,0,0,1,16,16V256l58,42.5A16,16,0,0,1,348.49,321Z"></path></svg><!-- <i class="fas fa-clock me-1"></i> Font Awesome fontawesome.com --><span>20:04:32:21</span></span><span class="badge bg-secondary p-2"><svg class="svg-inline--fa fa-bolt fa-w-10 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bolt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M296 160H180.6l42.6-129.8C227.2 15 215.7 0 200 0H56C44 0 33.8 8.9 32.2 20.8l-32 240C-1.7 275.2 9.5 288 24 288h118.7L96.6 482.5c-3.6 15.2 8 29.5 23.3 29.5 8.4 0 16.4-4.4 20.8-12l176-304c9.3-15.9-2.2-36-20.7-36z"></path></svg><!-- <i class="fas fa-bolt me-1"></i> Font Awesome fontawesome.com --><span>trending</span><svg class="svg-inline--fa fa-bolt fa-w-10 ms-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bolt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M296 160H180.6l42.6-129.8C227.2 15 215.7 0 200 0H56C44 0 33.8 8.9 32.2 20.8l-32 240C-1.7 275.2 9.5 288 24 288h118.7L96.6 482.5c-3.6 15.2 8 29.5 23.3 29.5 8.4 0 16.4-4.4 20.8-12l176-304c9.3-15.9-2.2-36-20.7-36z"></path></svg><!-- <i class="fas fa-bolt ms-1"> </i> Font Awesome fontawesome.com --></span></div>
                        <div class="card-body ps-0">
                        <h5 class="fw-bold text-1000 mb-4 text-truncate">Bora Bora: Enjoy a romantic cruise tour of at the sunny side of life</h5>
                        <div class="d-flex align-items-center justify-content-start"><span class="text-800 fs--1 me-2"><svg class="svg-inline--fa fa-map-marker-alt fa-w-12" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="map-marker-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path></svg><!-- <i class="fas fa-map-marker-alt"></i> Font Awesome fontawesome.com --></span><span class="text-900 me-3">Maldives</span><span class="text-800 fs--1 me-2"><svg class="svg-inline--fa fa-calendar fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="calendar" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M12 192h424c6.6 0 12 5.4 12 12v260c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V204c0-6.6 5.4-12 12-12zm436-44v-36c0-26.5-21.5-48-48-48h-48V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H160V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H48C21.5 64 0 85.5 0 112v36c0 6.6 5.4 12 12 12h424c6.6 0 12-5.4 12-12z"></path></svg><!-- <i class="fas fa-calendar"></i> Font Awesome fontawesome.com --></span><span class="text-900">4 days</span></div>
                        <p class="text-decoration-line-through text-900 mt-3 mb-0">$300</p>
                        <h1 class="mb-3 text-primary fw-bolder fs-4"><span>$250</span><span class="text-900 fs--1 fw-normal">/Per person</span></h1><span class="badge bg-soft-secondary p-2"><svg class="svg-inline--fa fa-tag fa-w-16 text-secondary fs--1 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="tag" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M0 252.118V48C0 21.49 21.49 0 48 0h204.118a48 48 0 0 1 33.941 14.059l211.882 211.882c18.745 18.745 18.745 49.137 0 67.882L293.823 497.941c-18.745 18.745-49.137 18.745-67.882 0L14.059 286.059A48 48 0 0 1 0 252.118zM112 64c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48z"></path></svg><!-- <i class="fas fa-tag text-secondary fs--1 me-1"></i> Font Awesome fontawesome.com --><span class="text-secondary fw-normal fs-1">-15%</span></span>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0 h-100">
                    <div class="card card-span h-100 text-white"><img class="img-fluid h-100" src="{{ asset('assets/img/gallery') }}/dhigu.png" alt="...">
                        <div class="card-img-overlay ps-0"><span class="badge bg-primary ms-3 me-1 p-2"><svg class="svg-inline--fa fa-clock fa-w-16 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="clock" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256,8C119,8,8,119,8,256S119,504,256,504,504,393,504,256,393,8,256,8Zm92.49,313h0l-20,25a16,16,0,0,1-22.49,2.5h0l-67-49.72a40,40,0,0,1-15-31.23V112a16,16,0,0,1,16-16h32a16,16,0,0,1,16,16V256l58,42.5A16,16,0,0,1,348.49,321Z"></path></svg><!-- <i class="fas fa-clock me-1"></i> Font Awesome fontawesome.com --><span>20:04:32:21</span></span><span class="badge bg-secondary p-2"><svg class="svg-inline--fa fa-bolt fa-w-10 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bolt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M296 160H180.6l42.6-129.8C227.2 15 215.7 0 200 0H56C44 0 33.8 8.9 32.2 20.8l-32 240C-1.7 275.2 9.5 288 24 288h118.7L96.6 482.5c-3.6 15.2 8 29.5 23.3 29.5 8.4 0 16.4-4.4 20.8-12l176-304c9.3-15.9-2.2-36-20.7-36z"></path></svg><!-- <i class="fas fa-bolt me-1"></i> Font Awesome fontawesome.com --><span>trending</span><svg class="svg-inline--fa fa-bolt fa-w-10 ms-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bolt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M296 160H180.6l42.6-129.8C227.2 15 215.7 0 200 0H56C44 0 33.8 8.9 32.2 20.8l-32 240C-1.7 275.2 9.5 288 24 288h118.7L96.6 482.5c-3.6 15.2 8 29.5 23.3 29.5 8.4 0 16.4-4.4 20.8-12l176-304c9.3-15.9-2.2-36-20.7-36z"></path></svg><!-- <i class="fas fa-bolt ms-1"> </i> Font Awesome fontawesome.com --></span></div>
                        <div class="card-body ps-0">
                        <h5 class="fw-bold text-1000 mb-4 text-truncate">Fihalhohi Island Resort: Luxury destination without compromise</h5>
                        <div class="d-flex align-items-center justify-content-start"><span class="text-800 fs--1 me-2"><svg class="svg-inline--fa fa-map-marker-alt fa-w-12" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="map-marker-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path></svg><!-- <i class="fas fa-map-marker-alt"></i> Font Awesome fontawesome.com --></span><span class="text-900 me-3">Maldives</span><span class="text-800 fs--1 me-2"><svg class="svg-inline--fa fa-calendar fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="calendar" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M12 192h424c6.6 0 12 5.4 12 12v260c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V204c0-6.6 5.4-12 12-12zm436-44v-36c0-26.5-21.5-48-48-48h-48V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H160V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H48C21.5 64 0 85.5 0 112v36c0 6.6 5.4 12 12 12h424c6.6 0 12-5.4 12-12z"></path></svg><!-- <i class="fas fa-calendar"></i> Font Awesome fontawesome.com --></span><span class="text-900">4 days</span></div>
                        <p class="text-decoration-line-through text-900 mt-3 mb-0">$375</p>
                        <h1 class="mb-3 text-primary fw-bolder fs-4"><span>$300</span><span class="text-900 fs--1 fw-normal">/Per person</span></h1><span class="badge bg-soft-secondary p-2"><svg class="svg-inline--fa fa-tag fa-w-16 text-secondary fs--1 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="tag" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M0 252.118V48C0 21.49 21.49 0 48 0h204.118a48 48 0 0 1 33.941 14.059l211.882 211.882c18.745 18.745 18.745 49.137 0 67.882L293.823 497.941c-18.745 18.745-49.137 18.745-67.882 0L14.059 286.059A48 48 0 0 1 0 252.118zM112 64c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48z"></path></svg><!-- <i class="fas fa-tag text-secondary fs--1 me-1"></i> Font Awesome fontawesome.com --><span class="text-secondary fw-normal fs-1">-15%</span></span>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <div class="carousel-item" data-bs-interval="5000">
                <div class="row h-100 align-items-center g-2">
                    <div class="col-md-4 mb-3 mb-md-0 h-100">
                    <div class="card card-span h-100 text-white"><img class="img-fluid h-100" src="{{ asset('assets/img/gallery') }}/maldives.png" alt="...">
                        <div class="card-img-overlay ps-0"><span class="badge bg-primary ms-3 me-1 p-2"><svg class="svg-inline--fa fa-clock fa-w-16 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="clock" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256,8C119,8,8,119,8,256S119,504,256,504,504,393,504,256,393,8,256,8Zm92.49,313h0l-20,25a16,16,0,0,1-22.49,2.5h0l-67-49.72a40,40,0,0,1-15-31.23V112a16,16,0,0,1,16-16h32a16,16,0,0,1,16,16V256l58,42.5A16,16,0,0,1,348.49,321Z"></path></svg><!-- <i class="fas fa-clock me-1"></i> Font Awesome fontawesome.com --><span>20:04:32:21</span></span><span class="badge bg-secondary p-2"><svg class="svg-inline--fa fa-bolt fa-w-10 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bolt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M296 160H180.6l42.6-129.8C227.2 15 215.7 0 200 0H56C44 0 33.8 8.9 32.2 20.8l-32 240C-1.7 275.2 9.5 288 24 288h118.7L96.6 482.5c-3.6 15.2 8 29.5 23.3 29.5 8.4 0 16.4-4.4 20.8-12l176-304c9.3-15.9-2.2-36-20.7-36z"></path></svg><!-- <i class="fas fa-bolt me-1"></i> Font Awesome fontawesome.com --><span>trending</span><svg class="svg-inline--fa fa-bolt fa-w-10 ms-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bolt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M296 160H180.6l42.6-129.8C227.2 15 215.7 0 200 0H56C44 0 33.8 8.9 32.2 20.8l-32 240C-1.7 275.2 9.5 288 24 288h118.7L96.6 482.5c-3.6 15.2 8 29.5 23.3 29.5 8.4 0 16.4-4.4 20.8-12l176-304c9.3-15.9-2.2-36-20.7-36z"></path></svg><!-- <i class="fas fa-bolt ms-1"> </i> Font Awesome fontawesome.com --></span></div>
                        <div class="card-body ps-0">
                        <h5 class="fw-bold text-1000 mb-4 text-truncate">Mermaid Beach Resort: The most joyful way to spend your holiday</h5>
                        <div class="d-flex align-items-center justify-content-start"><span class="text-800 fs--1 me-2"><svg class="svg-inline--fa fa-map-marker-alt fa-w-12" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="map-marker-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path></svg><!-- <i class="fas fa-map-marker-alt"></i> Font Awesome fontawesome.com --></span><span class="text-900 me-3">Maldives</span><span class="text-800 fs--1 me-2"><svg class="svg-inline--fa fa-calendar fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="calendar" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M12 192h424c6.6 0 12 5.4 12 12v260c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V204c0-6.6 5.4-12 12-12zm436-44v-36c0-26.5-21.5-48-48-48h-48V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H160V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H48C21.5 64 0 85.5 0 112v36c0 6.6 5.4 12 12 12h424c6.6 0 12-5.4 12-12z"></path></svg><!-- <i class="fas fa-calendar"></i> Font Awesome fontawesome.com --></span><span class="text-900">4 days</span></div>
                        <p class="text-decoration-line-through text-900 mt-3 mb-0">$200</p>
                        <h1 class="mb-3 text-primary fw-bolder fs-4"><span>$175</span><span class="text-900 fs--1 fw-normal">/Per person</span></h1><span class="badge bg-soft-secondary p-2"><svg class="svg-inline--fa fa-tag fa-w-16 text-secondary fs--1 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="tag" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M0 252.118V48C0 21.49 21.49 0 48 0h204.118a48 48 0 0 1 33.941 14.059l211.882 211.882c18.745 18.745 18.745 49.137 0 67.882L293.823 497.941c-18.745 18.745-49.137 18.745-67.882 0L14.059 286.059A48 48 0 0 1 0 252.118zM112 64c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48z"></path></svg><!-- <i class="fas fa-tag text-secondary fs--1 me-1"></i> Font Awesome fontawesome.com --><span class="text-secondary fw-normal fs-1">-15%</span></span>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0 h-100">
                    <div class="card card-span h-100 text-white"><img class="img-fluid h-100" src="{{ asset('assets/img/gallery') }}/cinnamon.png" alt="...">
                        <div class="card-img-overlay ps-0"><span class="badge bg-primary ms-3 me-1 p-2"><svg class="svg-inline--fa fa-clock fa-w-16 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="clock" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256,8C119,8,8,119,8,256S119,504,256,504,504,393,504,256,393,8,256,8Zm92.49,313h0l-20,25a16,16,0,0,1-22.49,2.5h0l-67-49.72a40,40,0,0,1-15-31.23V112a16,16,0,0,1,16-16h32a16,16,0,0,1,16,16V256l58,42.5A16,16,0,0,1,348.49,321Z"></path></svg><!-- <i class="fas fa-clock me-1"></i> Font Awesome fontawesome.com --><span>20:04:32:21</span></span><span class="badge bg-secondary p-2"><svg class="svg-inline--fa fa-bolt fa-w-10 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bolt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M296 160H180.6l42.6-129.8C227.2 15 215.7 0 200 0H56C44 0 33.8 8.9 32.2 20.8l-32 240C-1.7 275.2 9.5 288 24 288h118.7L96.6 482.5c-3.6 15.2 8 29.5 23.3 29.5 8.4 0 16.4-4.4 20.8-12l176-304c9.3-15.9-2.2-36-20.7-36z"></path></svg><!-- <i class="fas fa-bolt me-1"></i> Font Awesome fontawesome.com --><span>trending</span><svg class="svg-inline--fa fa-bolt fa-w-10 ms-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bolt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M296 160H180.6l42.6-129.8C227.2 15 215.7 0 200 0H56C44 0 33.8 8.9 32.2 20.8l-32 240C-1.7 275.2 9.5 288 24 288h118.7L96.6 482.5c-3.6 15.2 8 29.5 23.3 29.5 8.4 0 16.4-4.4 20.8-12l176-304c9.3-15.9-2.2-36-20.7-36z"></path></svg><!-- <i class="fas fa-bolt ms-1"> </i> Font Awesome fontawesome.com --></span></div>
                        <div class="card-body ps-0">
                        <h5 class="fw-bold text-1000 mb-4 text-truncate">Bora Bora: Enjoy a romantic cruise tour of at the sunny side of life</h5>
                        <div class="d-flex align-items-center justify-content-start"><span class="text-800 fs--1 me-2"><svg class="svg-inline--fa fa-map-marker-alt fa-w-12" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="map-marker-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path></svg><!-- <i class="fas fa-map-marker-alt"></i> Font Awesome fontawesome.com --></span><span class="text-900 me-3">Maldives</span><span class="text-800 fs--1 me-2"><svg class="svg-inline--fa fa-calendar fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="calendar" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M12 192h424c6.6 0 12 5.4 12 12v260c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V204c0-6.6 5.4-12 12-12zm436-44v-36c0-26.5-21.5-48-48-48h-48V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H160V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H48C21.5 64 0 85.5 0 112v36c0 6.6 5.4 12 12 12h424c6.6 0 12-5.4 12-12z"></path></svg><!-- <i class="fas fa-calendar"></i> Font Awesome fontawesome.com --></span><span class="text-900">4 days</span></div>
                        <p class="text-decoration-line-through text-900 mt-3 mb-0">$300</p>
                        <h1 class="mb-3 text-primary fw-bolder fs-4"><span>$250</span><span class="text-900 fs--1 fw-normal">/Per person</span></h1><span class="badge bg-soft-secondary p-2"><svg class="svg-inline--fa fa-tag fa-w-16 text-secondary fs--1 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="tag" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M0 252.118V48C0 21.49 21.49 0 48 0h204.118a48 48 0 0 1 33.941 14.059l211.882 211.882c18.745 18.745 18.745 49.137 0 67.882L293.823 497.941c-18.745 18.745-49.137 18.745-67.882 0L14.059 286.059A48 48 0 0 1 0 252.118zM112 64c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48z"></path></svg><!-- <i class="fas fa-tag text-secondary fs--1 me-1"></i> Font Awesome fontawesome.com --><span class="text-secondary fw-normal fs-1">-15%</span></span>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0 h-100">
                    <div class="card card-span h-100 text-white"><img class="img-fluid h-100" src="{{ asset('assets/img/gallery') }}/dhigu.png" alt="...">
                        <div class="card-img-overlay ps-0"><span class="badge bg-primary ms-3 me-1 p-2"><svg class="svg-inline--fa fa-clock fa-w-16 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="clock" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256,8C119,8,8,119,8,256S119,504,256,504,504,393,504,256,393,8,256,8Zm92.49,313h0l-20,25a16,16,0,0,1-22.49,2.5h0l-67-49.72a40,40,0,0,1-15-31.23V112a16,16,0,0,1,16-16h32a16,16,0,0,1,16,16V256l58,42.5A16,16,0,0,1,348.49,321Z"></path></svg><!-- <i class="fas fa-clock me-1"></i> Font Awesome fontawesome.com --><span>20:04:32:21</span></span><span class="badge bg-secondary p-2"><svg class="svg-inline--fa fa-bolt fa-w-10 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bolt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M296 160H180.6l42.6-129.8C227.2 15 215.7 0 200 0H56C44 0 33.8 8.9 32.2 20.8l-32 240C-1.7 275.2 9.5 288 24 288h118.7L96.6 482.5c-3.6 15.2 8 29.5 23.3 29.5 8.4 0 16.4-4.4 20.8-12l176-304c9.3-15.9-2.2-36-20.7-36z"></path></svg><!-- <i class="fas fa-bolt me-1"></i> Font Awesome fontawesome.com --><span>trending</span><svg class="svg-inline--fa fa-bolt fa-w-10 ms-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bolt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M296 160H180.6l42.6-129.8C227.2 15 215.7 0 200 0H56C44 0 33.8 8.9 32.2 20.8l-32 240C-1.7 275.2 9.5 288 24 288h118.7L96.6 482.5c-3.6 15.2 8 29.5 23.3 29.5 8.4 0 16.4-4.4 20.8-12l176-304c9.3-15.9-2.2-36-20.7-36z"></path></svg><!-- <i class="fas fa-bolt ms-1"> </i> Font Awesome fontawesome.com --></span></div>
                        <div class="card-body ps-0">
                        <h5 class="fw-bold text-1000 mb-4 text-truncate">Fihalhohi Island Resort: Luxury destination without compromise</h5>
                        <div class="d-flex align-items-center justify-content-start"><span class="text-800 fs--1 me-2"><svg class="svg-inline--fa fa-map-marker-alt fa-w-12" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="map-marker-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path></svg><!-- <i class="fas fa-map-marker-alt"></i> Font Awesome fontawesome.com --></span><span class="text-900 me-3">Maldives</span><span class="text-800 fs--1 me-2"><svg class="svg-inline--fa fa-calendar fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="calendar" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M12 192h424c6.6 0 12 5.4 12 12v260c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V204c0-6.6 5.4-12 12-12zm436-44v-36c0-26.5-21.5-48-48-48h-48V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H160V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H48C21.5 64 0 85.5 0 112v36c0 6.6 5.4 12 12 12h424c6.6 0 12-5.4 12-12z"></path></svg><!-- <i class="fas fa-calendar"></i> Font Awesome fontawesome.com --></span><span class="text-900">4 days</span></div>
                        <p class="text-decoration-line-through text-900 mt-3 mb-0">$375</p>
                        <h1 class="mb-3 text-primary fw-bolder fs-4"><span>$300</span><span class="text-900 fs--1 fw-normal">/Per person</span></h1><span class="badge bg-soft-secondary p-2"><svg class="svg-inline--fa fa-tag fa-w-16 text-secondary fs--1 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="tag" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M0 252.118V48C0 21.49 21.49 0 48 0h204.118a48 48 0 0 1 33.941 14.059l211.882 211.882c18.745 18.745 18.745 49.137 0 67.882L293.823 497.941c-18.745 18.745-49.137 18.745-67.882 0L14.059 286.059A48 48 0 0 1 0 252.118zM112 64c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48z"></path></svg><!-- <i class="fas fa-tag text-secondary fs--1 me-1"></i> Font Awesome fontawesome.com --><span class="text-secondary fw-normal fs-1">-15%</span></span>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <div class="carousel-item active" data-bs-interval="3000">
                <div class="row h-100 align-items-center g-2">
                    <div class="col-md-4 mb-3 mb-md-0 h-100">
                    <div class="card card-span h-100 text-white"><img class="img-fluid h-100" src="{{ asset('assets/img/gallery') }}/maldives.png" alt="...">
                        <div class="card-img-overlay ps-0"><span class="badge bg-primary ms-3 me-1 p-2"><svg class="svg-inline--fa fa-clock fa-w-16 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="clock" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256,8C119,8,8,119,8,256S119,504,256,504,504,393,504,256,393,8,256,8Zm92.49,313h0l-20,25a16,16,0,0,1-22.49,2.5h0l-67-49.72a40,40,0,0,1-15-31.23V112a16,16,0,0,1,16-16h32a16,16,0,0,1,16,16V256l58,42.5A16,16,0,0,1,348.49,321Z"></path></svg><!-- <i class="fas fa-clock me-1"></i> Font Awesome fontawesome.com --><span>20:04:32:21</span></span><span class="badge bg-secondary p-2"><svg class="svg-inline--fa fa-bolt fa-w-10 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bolt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M296 160H180.6l42.6-129.8C227.2 15 215.7 0 200 0H56C44 0 33.8 8.9 32.2 20.8l-32 240C-1.7 275.2 9.5 288 24 288h118.7L96.6 482.5c-3.6 15.2 8 29.5 23.3 29.5 8.4 0 16.4-4.4 20.8-12l176-304c9.3-15.9-2.2-36-20.7-36z"></path></svg><!-- <i class="fas fa-bolt me-1"></i> Font Awesome fontawesome.com --><span>trending</span><svg class="svg-inline--fa fa-bolt fa-w-10 ms-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bolt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M296 160H180.6l42.6-129.8C227.2 15 215.7 0 200 0H56C44 0 33.8 8.9 32.2 20.8l-32 240C-1.7 275.2 9.5 288 24 288h118.7L96.6 482.5c-3.6 15.2 8 29.5 23.3 29.5 8.4 0 16.4-4.4 20.8-12l176-304c9.3-15.9-2.2-36-20.7-36z"></path></svg><!-- <i class="fas fa-bolt ms-1"> </i> Font Awesome fontawesome.com --></span></div>
                        <div class="card-body ps-0">
                        <h5 class="fw-bold text-1000 mb-4 text-truncate">Mermaid Beach Resort: The most joyful way to spend your holiday</h5>
                        <div class="d-flex align-items-center justify-content-start"><span class="text-800 fs--1 me-2"><svg class="svg-inline--fa fa-map-marker-alt fa-w-12" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="map-marker-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path></svg><!-- <i class="fas fa-map-marker-alt"></i> Font Awesome fontawesome.com --></span><span class="text-900 me-3">Maldives</span><span class="text-800 fs--1 me-2"><svg class="svg-inline--fa fa-calendar fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="calendar" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M12 192h424c6.6 0 12 5.4 12 12v260c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V204c0-6.6 5.4-12 12-12zm436-44v-36c0-26.5-21.5-48-48-48h-48V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H160V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H48C21.5 64 0 85.5 0 112v36c0 6.6 5.4 12 12 12h424c6.6 0 12-5.4 12-12z"></path></svg><!-- <i class="fas fa-calendar"></i> Font Awesome fontawesome.com --></span><span class="text-900">4 days</span></div>
                        <p class="text-decoration-line-through text-900 mt-3 mb-0">$200</p>
                        <h1 class="mb-3 text-primary fw-bolder fs-4"><span>$175</span><span class="text-900 fs--1 fw-normal">/Per person</span></h1><span class="badge bg-soft-secondary p-2"><svg class="svg-inline--fa fa-tag fa-w-16 text-secondary fs--1 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="tag" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M0 252.118V48C0 21.49 21.49 0 48 0h204.118a48 48 0 0 1 33.941 14.059l211.882 211.882c18.745 18.745 18.745 49.137 0 67.882L293.823 497.941c-18.745 18.745-49.137 18.745-67.882 0L14.059 286.059A48 48 0 0 1 0 252.118zM112 64c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48z"></path></svg><!-- <i class="fas fa-tag text-secondary fs--1 me-1"></i> Font Awesome fontawesome.com --><span class="text-secondary fw-normal fs-1">-15%</span></span>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0 h-100">
                    <div class="card card-span h-100 text-white"><img class="img-fluid h-100" src="{{ asset('assets/img/gallery') }}/cinnamon.png" alt="...">
                        <div class="card-img-overlay ps-0"><span class="badge bg-primary ms-3 me-1 p-2"><svg class="svg-inline--fa fa-clock fa-w-16 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="clock" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256,8C119,8,8,119,8,256S119,504,256,504,504,393,504,256,393,8,256,8Zm92.49,313h0l-20,25a16,16,0,0,1-22.49,2.5h0l-67-49.72a40,40,0,0,1-15-31.23V112a16,16,0,0,1,16-16h32a16,16,0,0,1,16,16V256l58,42.5A16,16,0,0,1,348.49,321Z"></path></svg><!-- <i class="fas fa-clock me-1"></i> Font Awesome fontawesome.com --><span>20:04:32:21</span></span><span class="badge bg-secondary p-2"><svg class="svg-inline--fa fa-bolt fa-w-10 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bolt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M296 160H180.6l42.6-129.8C227.2 15 215.7 0 200 0H56C44 0 33.8 8.9 32.2 20.8l-32 240C-1.7 275.2 9.5 288 24 288h118.7L96.6 482.5c-3.6 15.2 8 29.5 23.3 29.5 8.4 0 16.4-4.4 20.8-12l176-304c9.3-15.9-2.2-36-20.7-36z"></path></svg><!-- <i class="fas fa-bolt me-1"></i> Font Awesome fontawesome.com --><span>trending</span><svg class="svg-inline--fa fa-bolt fa-w-10 ms-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bolt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M296 160H180.6l42.6-129.8C227.2 15 215.7 0 200 0H56C44 0 33.8 8.9 32.2 20.8l-32 240C-1.7 275.2 9.5 288 24 288h118.7L96.6 482.5c-3.6 15.2 8 29.5 23.3 29.5 8.4 0 16.4-4.4 20.8-12l176-304c9.3-15.9-2.2-36-20.7-36z"></path></svg><!-- <i class="fas fa-bolt ms-1"> </i> Font Awesome fontawesome.com --></span></div>
                        <div class="card-body ps-0">
                        <h5 class="fw-bold text-1000 mb-4 text-truncate">Bora Bora: Enjoy a romantic cruise tour of at the sunny side of life</h5>
                        <div class="d-flex align-items-center justify-content-start"><span class="text-800 fs--1 me-2"><svg class="svg-inline--fa fa-map-marker-alt fa-w-12" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="map-marker-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path></svg><!-- <i class="fas fa-map-marker-alt"></i> Font Awesome fontawesome.com --></span><span class="text-900 me-3">Maldives</span><span class="text-800 fs--1 me-2"><svg class="svg-inline--fa fa-calendar fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="calendar" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M12 192h424c6.6 0 12 5.4 12 12v260c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V204c0-6.6 5.4-12 12-12zm436-44v-36c0-26.5-21.5-48-48-48h-48V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H160V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H48C21.5 64 0 85.5 0 112v36c0 6.6 5.4 12 12 12h424c6.6 0 12-5.4 12-12z"></path></svg><!-- <i class="fas fa-calendar"></i> Font Awesome fontawesome.com --></span><span class="text-900">4 days</span></div>
                        <p class="text-decoration-line-through text-900 mt-3 mb-0">$300</p>
                        <h1 class="mb-3 text-primary fw-bolder fs-4"><span>$250</span><span class="text-900 fs--1 fw-normal">/Per person</span></h1><span class="badge bg-soft-secondary p-2"><svg class="svg-inline--fa fa-tag fa-w-16 text-secondary fs--1 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="tag" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M0 252.118V48C0 21.49 21.49 0 48 0h204.118a48 48 0 0 1 33.941 14.059l211.882 211.882c18.745 18.745 18.745 49.137 0 67.882L293.823 497.941c-18.745 18.745-49.137 18.745-67.882 0L14.059 286.059A48 48 0 0 1 0 252.118zM112 64c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48z"></path></svg><!-- <i class="fas fa-tag text-secondary fs--1 me-1"></i> Font Awesome fontawesome.com --><span class="text-secondary fw-normal fs-1">-15%</span></span>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0 h-100">
                    <div class="card card-span h-100 text-white"><img class="img-fluid h-100" src="{{ asset('assets/img/gallery') }}/dhigu.png" alt="...">
                        <div class="card-img-overlay ps-0"><span class="badge bg-primary ms-3 me-1 p-2"><svg class="svg-inline--fa fa-clock fa-w-16 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="clock" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256,8C119,8,8,119,8,256S119,504,256,504,504,393,504,256,393,8,256,8Zm92.49,313h0l-20,25a16,16,0,0,1-22.49,2.5h0l-67-49.72a40,40,0,0,1-15-31.23V112a16,16,0,0,1,16-16h32a16,16,0,0,1,16,16V256l58,42.5A16,16,0,0,1,348.49,321Z"></path></svg><!-- <i class="fas fa-clock me-1"></i> Font Awesome fontawesome.com --><span>20:04:32:21</span></span><span class="badge bg-secondary p-2"><svg class="svg-inline--fa fa-bolt fa-w-10 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bolt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M296 160H180.6l42.6-129.8C227.2 15 215.7 0 200 0H56C44 0 33.8 8.9 32.2 20.8l-32 240C-1.7 275.2 9.5 288 24 288h118.7L96.6 482.5c-3.6 15.2 8 29.5 23.3 29.5 8.4 0 16.4-4.4 20.8-12l176-304c9.3-15.9-2.2-36-20.7-36z"></path></svg><!-- <i class="fas fa-bolt me-1"></i> Font Awesome fontawesome.com --><span>trending</span><svg class="svg-inline--fa fa-bolt fa-w-10 ms-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bolt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M296 160H180.6l42.6-129.8C227.2 15 215.7 0 200 0H56C44 0 33.8 8.9 32.2 20.8l-32 240C-1.7 275.2 9.5 288 24 288h118.7L96.6 482.5c-3.6 15.2 8 29.5 23.3 29.5 8.4 0 16.4-4.4 20.8-12l176-304c9.3-15.9-2.2-36-20.7-36z"></path></svg><!-- <i class="fas fa-bolt ms-1"> </i> Font Awesome fontawesome.com --></span></div>
                        <div class="card-body ps-0">
                        <h5 class="fw-bold text-1000 mb-4 text-truncate">Fihalhohi Island Resort: Luxury destination without compromise</h5>
                        <div class="d-flex align-items-center justify-content-start"><span class="text-800 fs--1 me-2"><svg class="svg-inline--fa fa-map-marker-alt fa-w-12" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="map-marker-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path></svg><!-- <i class="fas fa-map-marker-alt"></i> Font Awesome fontawesome.com --></span><span class="text-900 me-3">Maldives</span><span class="text-800 fs--1 me-2"><svg class="svg-inline--fa fa-calendar fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="calendar" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M12 192h424c6.6 0 12 5.4 12 12v260c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V204c0-6.6 5.4-12 12-12zm436-44v-36c0-26.5-21.5-48-48-48h-48V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H160V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H48C21.5 64 0 85.5 0 112v36c0 6.6 5.4 12 12 12h424c6.6 0 12-5.4 12-12z"></path></svg><!-- <i class="fas fa-calendar"></i> Font Awesome fontawesome.com --></span><span class="text-900">4 days</span></div>
                        <p class="text-decoration-line-through text-900 mt-3 mb-0">$375</p>
                        <h1 class="mb-3 text-primary fw-bolder fs-4"><span>$300</span><span class="text-900 fs--1 fw-normal">/Per person</span></h1><span class="badge bg-soft-secondary p-2"><svg class="svg-inline--fa fa-tag fa-w-16 text-secondary fs--1 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="tag" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M0 252.118V48C0 21.49 21.49 0 48 0h204.118a48 48 0 0 1 33.941 14.059l211.882 211.882c18.745 18.745 18.745 49.137 0 67.882L293.823 497.941c-18.745 18.745-49.137 18.745-67.882 0L14.059 286.059A48 48 0 0 1 0 252.118zM112 64c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48z"></path></svg><!-- <i class="fas fa-tag text-secondary fs--1 me-1"></i> Font Awesome fontawesome.com --><span class="text-secondary fw-normal fs-1">-15%</span></span>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <div class="carousel-item">
                <div class="row h-100 align-items-center g-2">
                    <div class="col-md-4 mb-3 mb-md-0 h-100">
                    <div class="card card-span h-100 text-white"><img class="img-fluid h-100" src="{{ asset('assets/img/gallery') }}/maldives.png" alt="...">
                        <div class="card-img-overlay ps-0"><span class="badge bg-primary ms-3 me-1 p-2"><svg class="svg-inline--fa fa-clock fa-w-16 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="clock" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256,8C119,8,8,119,8,256S119,504,256,504,504,393,504,256,393,8,256,8Zm92.49,313h0l-20,25a16,16,0,0,1-22.49,2.5h0l-67-49.72a40,40,0,0,1-15-31.23V112a16,16,0,0,1,16-16h32a16,16,0,0,1,16,16V256l58,42.5A16,16,0,0,1,348.49,321Z"></path></svg><!-- <i class="fas fa-clock me-1"></i> Font Awesome fontawesome.com --><span>20:04:32:21</span></span><span class="badge bg-secondary p-2"><svg class="svg-inline--fa fa-bolt fa-w-10 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bolt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M296 160H180.6l42.6-129.8C227.2 15 215.7 0 200 0H56C44 0 33.8 8.9 32.2 20.8l-32 240C-1.7 275.2 9.5 288 24 288h118.7L96.6 482.5c-3.6 15.2 8 29.5 23.3 29.5 8.4 0 16.4-4.4 20.8-12l176-304c9.3-15.9-2.2-36-20.7-36z"></path></svg><!-- <i class="fas fa-bolt me-1"></i> Font Awesome fontawesome.com --><span>trending</span><svg class="svg-inline--fa fa-bolt fa-w-10 ms-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bolt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M296 160H180.6l42.6-129.8C227.2 15 215.7 0 200 0H56C44 0 33.8 8.9 32.2 20.8l-32 240C-1.7 275.2 9.5 288 24 288h118.7L96.6 482.5c-3.6 15.2 8 29.5 23.3 29.5 8.4 0 16.4-4.4 20.8-12l176-304c9.3-15.9-2.2-36-20.7-36z"></path></svg><!-- <i class="fas fa-bolt ms-1"> </i> Font Awesome fontawesome.com --></span></div>
                        <div class="card-body ps-0">
                        <h5 class="fw-bold text-1000 mb-4 text-truncate">Mermaid Beach Resort: The most joyful way to spend your holiday</h5>
                        <div class="d-flex align-items-center justify-content-start"><span class="text-800 fs--1 me-2"><svg class="svg-inline--fa fa-map-marker-alt fa-w-12" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="map-marker-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path></svg><!-- <i class="fas fa-map-marker-alt"></i> Font Awesome fontawesome.com --></span><span class="text-900 me-3">Maldives</span><span class="text-800 fs--1 me-2"><svg class="svg-inline--fa fa-calendar fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="calendar" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M12 192h424c6.6 0 12 5.4 12 12v260c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V204c0-6.6 5.4-12 12-12zm436-44v-36c0-26.5-21.5-48-48-48h-48V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H160V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H48C21.5 64 0 85.5 0 112v36c0 6.6 5.4 12 12 12h424c6.6 0 12-5.4 12-12z"></path></svg><!-- <i class="fas fa-calendar"></i> Font Awesome fontawesome.com --></span><span class="text-900">4 days</span></div>
                        <p class="text-decoration-line-through text-900 mt-3 mb-0">$200</p>
                        <h1 class="mb-3 text-primary fw-bolder fs-4"><span>$175</span><span class="text-900 fs--1 fw-normal">/Per person</span></h1><span class="badge bg-soft-secondary p-2"><svg class="svg-inline--fa fa-tag fa-w-16 text-secondary fs--1 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="tag" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M0 252.118V48C0 21.49 21.49 0 48 0h204.118a48 48 0 0 1 33.941 14.059l211.882 211.882c18.745 18.745 18.745 49.137 0 67.882L293.823 497.941c-18.745 18.745-49.137 18.745-67.882 0L14.059 286.059A48 48 0 0 1 0 252.118zM112 64c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48z"></path></svg><!-- <i class="fas fa-tag text-secondary fs--1 me-1"></i> Font Awesome fontawesome.com --><span class="text-secondary fw-normal fs-1">-15%</span></span>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0 h-100">
                    <div class="card card-span h-100 text-white"><img class="img-fluid h-100" src="{{ asset('assets/img/gallery') }}/cinnamon.png" alt="...">
                        <div class="card-img-overlay ps-0"><span class="badge bg-primary ms-3 me-1 p-2"><svg class="svg-inline--fa fa-clock fa-w-16 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="clock" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256,8C119,8,8,119,8,256S119,504,256,504,504,393,504,256,393,8,256,8Zm92.49,313h0l-20,25a16,16,0,0,1-22.49,2.5h0l-67-49.72a40,40,0,0,1-15-31.23V112a16,16,0,0,1,16-16h32a16,16,0,0,1,16,16V256l58,42.5A16,16,0,0,1,348.49,321Z"></path></svg><!-- <i class="fas fa-clock me-1"></i> Font Awesome fontawesome.com --><span>20:04:32:21</span></span><span class="badge bg-secondary p-2"><svg class="svg-inline--fa fa-bolt fa-w-10 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bolt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M296 160H180.6l42.6-129.8C227.2 15 215.7 0 200 0H56C44 0 33.8 8.9 32.2 20.8l-32 240C-1.7 275.2 9.5 288 24 288h118.7L96.6 482.5c-3.6 15.2 8 29.5 23.3 29.5 8.4 0 16.4-4.4 20.8-12l176-304c9.3-15.9-2.2-36-20.7-36z"></path></svg><!-- <i class="fas fa-bolt me-1"></i> Font Awesome fontawesome.com --><span>trending</span><svg class="svg-inline--fa fa-bolt fa-w-10 ms-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bolt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M296 160H180.6l42.6-129.8C227.2 15 215.7 0 200 0H56C44 0 33.8 8.9 32.2 20.8l-32 240C-1.7 275.2 9.5 288 24 288h118.7L96.6 482.5c-3.6 15.2 8 29.5 23.3 29.5 8.4 0 16.4-4.4 20.8-12l176-304c9.3-15.9-2.2-36-20.7-36z"></path></svg><!-- <i class="fas fa-bolt ms-1"> </i> Font Awesome fontawesome.com --></span></div>
                        <div class="card-body ps-0">
                        <h5 class="fw-bold text-1000 mb-4 text-truncate">Bora Bora: Enjoy a romantic cruise tour of at the sunny side of life</h5>
                        <div class="d-flex align-items-center justify-content-start"><span class="text-800 fs--1 me-2"><svg class="svg-inline--fa fa-map-marker-alt fa-w-12" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="map-marker-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path></svg><!-- <i class="fas fa-map-marker-alt"></i> Font Awesome fontawesome.com --></span><span class="text-900 me-3">Maldives</span><span class="text-800 fs--1 me-2"><svg class="svg-inline--fa fa-calendar fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="calendar" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M12 192h424c6.6 0 12 5.4 12 12v260c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V204c0-6.6 5.4-12 12-12zm436-44v-36c0-26.5-21.5-48-48-48h-48V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H160V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H48C21.5 64 0 85.5 0 112v36c0 6.6 5.4 12 12 12h424c6.6 0 12-5.4 12-12z"></path></svg><!-- <i class="fas fa-calendar"></i> Font Awesome fontawesome.com --></span><span class="text-900">4 days</span></div>
                        <p class="text-decoration-line-through text-900 mt-3 mb-0">$300</p>
                        <h1 class="mb-3 text-primary fw-bolder fs-4"><span>$250</span><span class="text-900 fs--1 fw-normal">/Per person</span></h1><span class="badge bg-soft-secondary p-2"><svg class="svg-inline--fa fa-tag fa-w-16 text-secondary fs--1 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="tag" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M0 252.118V48C0 21.49 21.49 0 48 0h204.118a48 48 0 0 1 33.941 14.059l211.882 211.882c18.745 18.745 18.745 49.137 0 67.882L293.823 497.941c-18.745 18.745-49.137 18.745-67.882 0L14.059 286.059A48 48 0 0 1 0 252.118zM112 64c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48z"></path></svg><!-- <i class="fas fa-tag text-secondary fs--1 me-1"></i> Font Awesome fontawesome.com --><span class="text-secondary fw-normal fs-1">-15%</span></span>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0 h-100">
                    <div class="card card-span h-100 text-white"><img class="img-fluid h-100" src="{{ asset('assets/img/gallery') }}/dhigu.png" alt="...">
                        <div class="card-img-overlay ps-0"><span class="badge bg-primary ms-3 me-1 p-2"><svg class="svg-inline--fa fa-clock fa-w-16 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="clock" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256,8C119,8,8,119,8,256S119,504,256,504,504,393,504,256,393,8,256,8Zm92.49,313h0l-20,25a16,16,0,0,1-22.49,2.5h0l-67-49.72a40,40,0,0,1-15-31.23V112a16,16,0,0,1,16-16h32a16,16,0,0,1,16,16V256l58,42.5A16,16,0,0,1,348.49,321Z"></path></svg><!-- <i class="fas fa-clock me-1"></i> Font Awesome fontawesome.com --><span>20:04:32:21</span></span><span class="badge bg-secondary p-2"><svg class="svg-inline--fa fa-bolt fa-w-10 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bolt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M296 160H180.6l42.6-129.8C227.2 15 215.7 0 200 0H56C44 0 33.8 8.9 32.2 20.8l-32 240C-1.7 275.2 9.5 288 24 288h118.7L96.6 482.5c-3.6 15.2 8 29.5 23.3 29.5 8.4 0 16.4-4.4 20.8-12l176-304c9.3-15.9-2.2-36-20.7-36z"></path></svg><!-- <i class="fas fa-bolt me-1"></i> Font Awesome fontawesome.com --><span>trending</span><svg class="svg-inline--fa fa-bolt fa-w-10 ms-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bolt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M296 160H180.6l42.6-129.8C227.2 15 215.7 0 200 0H56C44 0 33.8 8.9 32.2 20.8l-32 240C-1.7 275.2 9.5 288 24 288h118.7L96.6 482.5c-3.6 15.2 8 29.5 23.3 29.5 8.4 0 16.4-4.4 20.8-12l176-304c9.3-15.9-2.2-36-20.7-36z"></path></svg><!-- <i class="fas fa-bolt ms-1"> </i> Font Awesome fontawesome.com --></span></div>
                        <div class="card-body ps-0">
                        <h5 class="fw-bold text-1000 mb-4 text-truncate">Fihalhohi Island Resort: Luxury destination without compromise</h5>
                        <div class="d-flex align-items-center justify-content-start"><span class="text-800 fs--1 me-2"><svg class="svg-inline--fa fa-map-marker-alt fa-w-12" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="map-marker-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path></svg><!-- <i class="fas fa-map-marker-alt"></i> Font Awesome fontawesome.com --></span><span class="text-900 me-3">Maldives</span><span class="text-800 fs--1 me-2"><svg class="svg-inline--fa fa-calendar fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="calendar" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M12 192h424c6.6 0 12 5.4 12 12v260c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V204c0-6.6 5.4-12 12-12zm436-44v-36c0-26.5-21.5-48-48-48h-48V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H160V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H48C21.5 64 0 85.5 0 112v36c0 6.6 5.4 12 12 12h424c6.6 0 12-5.4 12-12z"></path></svg><!-- <i class="fas fa-calendar"></i> Font Awesome fontawesome.com --></span><span class="text-900">4 days</span></div>
                        <p class="text-decoration-line-through text-900 mt-3 mb-0">$375</p>
                        <h1 class="mb-3 text-primary fw-bolder fs-4"><span>$300</span><span class="text-900 fs--1 fw-normal">/Per person</span></h1><span class="badge bg-soft-secondary p-2"><svg class="svg-inline--fa fa-tag fa-w-16 text-secondary fs--1 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="tag" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M0 252.118V48C0 21.49 21.49 0 48 0h204.118a48 48 0 0 1 33.941 14.059l211.882 211.882c18.745 18.745 18.745 49.137 0 67.882L293.823 497.941c-18.745 18.745-49.137 18.745-67.882 0L14.059 286.059A48 48 0 0 1 0 252.118zM112 64c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48z"></path></svg><!-- <i class="fas fa-tag text-secondary fs--1 me-1"></i> Font Awesome fontawesome.com --><span class="text-secondary fw-normal fs-1">-15%</span></span>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <div class="row"><button class="carousel-control-prev" type="button" data-bs-target="#carouselTestimonials" data-bs-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="visually-hidden">Previous</span></button><button class="carousel-control-next" type="button" data-bs-target="#carouselTestimonials" data-bs-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="visually-hidden">Next                                    </span></button></div>
            </div>
            <div class="row flex-center">
                <div class="col-auto position-relative z-index-2">
                <ol class="carousel-indicators me-xxl-7 me-xl-4 me-lg-7">
                    <li class="" data-bs-target="#carouselTestimonials" data-bs-slide-to="0"></li>
                    <li data-bs-target="#carouselTestimonials" data-bs-slide-to="1" class=""></li>
                    <li data-bs-target="#carouselTestimonials" data-bs-slide-to="2" class="active" aria-current="true"></li>
                    <li data-bs-target="#carouselTestimonials" data-bs-slide-to="3" class=""></li>
                </ol>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</section>
        
<section class="py-0 overflow-hidden backgroundfooter" id="contactus">
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

    $('.village').select2({
    placeholder: 'Pilih Kelurahan Asal',
    theme: "bootstrap",
    ajax: {
        url: '{{route("village")}}',
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
        let ka = $('#kelurahan_asal').val();
        let kt = $('#kelurahan_tujuan').val();
        let vol = $('#berat').val();

        let dataBatch = {
            "_token": "{{ csrf_token() }}",
            kelurahan_asal: ka,
            kelurahan_tujuan: kt,
            berat: vol
        };

        return dataBatch;
    }
</script>
@endpush