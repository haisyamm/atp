@extends('layouts.lm_admin')
@section('content')
    <div class="row p-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between text-white" style="background-color: #006a4e;">
                    <h3>BANNER BUSINESS</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label class="mb-2">Banner 1:</label><br>
                            <input type="file" name="banner1" class="form-control-file mb-3">
                            <small style="display:block;margin-top:-5px;" class="form-text text-muted">Rekomendasi ukuran gambar: 1200(px) x 500(px)</small>
                        </div>
                        <div class="form-group mb-3">
                            <label class="mb-2">Banner 2:</label><br>
                            <input type="file" name="banner2" class="form-control-file mb-3">
                            <small style="display:block;margin-top:-5px;" class="form-text text-muted">Rekomendasi ukuran gambar: 1200(px) x 500(px)</small>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card mt-3">
                <div class="card-header d-flex justify-content-between text-white" style="background-color: #006a4e;">
                    <h3>ABOUT US</h3>
                </div>
                <div class="card-body">
                    @forelse ($about as $ab)
                        <form action="{{ route('home.update', $ab->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group mb-2">
                                <label class="mb-2">About Us:</label>
                                <textarea class="form-control" name="about" value="{{ $ab->about }}"
                                    rows="3">{{ $ab->about }}</textarea>
                            </div><hr>
                            <div class="form-group mb-2">
                                <label class="mb-2">Company Value 1:</label><br>
                                <input type="file" name="company_icon1" class="form-control-file mb-3">
                                <small style="display:block;margin-top:-10px;margin-bottom:15px" class="form-text text-muted">Rekomendasi ukuran gambar: 640(px) x 640(px)</small>
                                <input type="text" name="company_value1" class="form-control mb-2" value="{{ $ab->company_value1 }}">
                                <textarea name="company_desc1" class="form-control" value="{{ $ab->company_desc1 }}" rows="3">{{ $ab->company_desc1 }}</textarea>
                            </div><hr>
                            <div class="form-group mb-2">
                                <label class="mb-2">Company Value 2:</label><br>
                                <input type="file" name="company_icon2" class="form-control-file mb-3">
                                <small style="display:block;margin-top:-10px;margin-bottom:15px" class="form-text text-muted">Rekomendasi ukuran gambar: 640(px) x 640(px)</small>
                                <input type="text" name="company_value2" class="form-control mb-2" value="{{ $ab->company_value2 }}">
                                <textarea name="company_desc2" class="form-control" value="{{ $ab->company_desc2 }}" rows="3">{{ $ab->company_desc2 }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </form>
                    @empty
                        <form action="{{ route('home.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-2">
                                <label class="mb-2">About Us:</label>
                                <textarea class="form-control" name="about" placeholder="Tuliskan tentang deskripsi perusahaan disini..."
                                    rows="3"></textarea>
                            </div><hr>
                            <div class="form-group mb-2">
                                <label class="mb-2">Company Value 1:</label><br>
                                <input type="file" name="company_icon1" class="form-control-file mb-3">
                                <small style="display:block;margin-top:-10px;margin-bottom:15px" class="form-text text-muted">Rekomendasi ukuran gambar: 640(px) x 640(px)</small>
                                <input type="text" name="company_value1" class="form-control mb-2"
                                    placeholder="Tuliskan value disini...">
                                <textarea name="company_desc1" class="form-control" placeholder="Tuliskan deskripsi value disini..." rows="3"></textarea>
                            </div><hr>
                            <div class="form-group mb-2">
                                <label class="mb-2">Company Value 2:</label><br>
                                <input type="file" name="company_icon2" class="form-control-file mb-3">
                                <small style="display:block;margin-top:-10px;margin-bottom:15px" class="form-text text-muted">Rekomendasi ukuran gambar: 640(px) x 640(px)</small>
                                <input type="text" name="company_value2" class="form-control mb-2"
                                    placeholder="Tuliskan value disini...">
                                <textarea name="company_desc2" class="form-control" placeholder="Tuliskan deskripsi value disini..." rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </form>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card mt-3">
                <div class="card-header d-flex justify-content-between text-white" style="background-color: #006a4e;">
                    <h3>SERVICES & PRODUCT</h3>
                </div>
                <div class="card-body">
                    @forelse ($service as $sv)
                    <form action="{{ route('service.update', $sv->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group mb-2">
                            <label class="mb-2">Service 1:</label><br>
                            <input type="file" name="service_icon1" class="form-control-file mb-3">
                            <small style="display:block;margin-top:-10px;margin-bottom:15px" class="form-text text-muted">Rekomendasi ukuran gambar: 640(px) x 640(px)</small>
                            <input type="text" name="service_value1" class="form-control mb-2"
                            value="{{ $sv->service_value1 }}">
                            <textarea class="form-control" name="service_desc1" value="{{ $sv->service_desc1 }}" rows="3">{{ $sv->service_desc1 }}</textarea>
                        </div><hr>
                        <div class="form-group mb-2">
                            <label class="mb-2">Service 2:</label><br>
                            <input type="file" name="service_icon2" class="form-control-file mb-3">
                            <small style="display:block;margin-top:-10px;margin-bottom:15px" class="form-text text-muted">Rekomendasi ukuran gambar: 640(px) x 640(px)</small>
                            <input type="text" name="service_value2" class="form-control mb-2"
                            value="{{ $sv->service_value2 }}">
                            <textarea class="form-control" name="service_desc2" 
                            value="{{ $sv->service_desc2 }}" rows="3">{{ $sv->service_desc2 }}</textarea>
                        </div><hr>
                        <div class="form-group mb-2">
                            <label class="mb-2">Service 3:</label><br>
                            <input type="file" name="service_icon3" class="form-control-file mb-3">
                            <small style="display:block;margin-top:-10px;margin-bottom:15px" class="form-text text-muted">Rekomendasi ukuran gambar: 640(px) x 640(px)</small>
                            <input type="text" name="service_value3" class="form-control mb-2"
                            value="{{ $sv->service_value3 }}">
                            <textarea class="form-control" name="service_desc3"
                            value="{{ $sv->service_desc3 }}" rows="3">{{ $sv->service_desc3 }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    </form>
                    @empty  
                    <form action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-2">
                            <label class="mb-2">Service 1:</label><br>
                            <input type="file" name="service_icon1" class="form-control-file mb-3">
                            <small style="display:block;margin-top:-10px;margin-bottom:15px" class="form-text text-muted">Rekomendasi ukuran gambar: 640(px) x 640(px)</small>
                            <input type="text" name="service_value1" class="form-control mb-2"
                                placeholder="Tuliskan nama service disini...">
                            <textarea class="form-control" name="service_desc1" placeholder="Tuliskan deskripsi service disini..." rows="3"></textarea>
                        </div><hr>
                        <div class="form-group mb-2">
                            <label class="mb-2">Service 2:</label><br>
                            <input type="file" name="service_icon2" class="form-control-file mb-3">
                            <small style="display:block;margin-top:-10px;margin-bottom:15px" class="form-text text-muted">Rekomendasi ukuran gambar: 640(px) x 640(px)</small>
                            <input type="text" name="service_value2" class="form-control mb-2"
                                placeholder="Tuliskan nama service disini...">
                            <textarea class="form-control" name="service_desc2" placeholder="Tuliskan deskripsi service disini..." rows="3"></textarea>
                        </div><hr>
                        <div class="form-group mb-2">
                            <label class="mb-2">Service 3:</label><br>
                            <input type="file" name="service_icon3" class="form-control-file mb-3">
                            <small style="display:block;margin-top:-10px;margin-bottom:15px" class="form-text text-muted">Rekomendasi ukuran gambar: 640(px) x 640(px)</small>
                            <input type="text" name="service_value3" class="form-control mb-2"
                                placeholder="Tuliskan nama service disini...">
                            <textarea class="form-control" name="service_desc3" placeholder="Tuliskan deskripsi service disini..." rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    </form>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card mt-3">
                <div class="card-header d-flex justify-content-between text-white" style="background-color: #006a4e;">
                    <h3>WHY CHOOSE US</h3>
                </div>
                <div class="card-body">
                    @forelse ($why as $wh)
                    <form action="{{ route('why.update', $wh->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group mb-2">
                            <label class="mb-2">Alasan 1:</label><br>
                            <input type="file" name="why_icon1" class="form-control-file mb-3">
                            <small style="display:block;margin-top:-10px;margin-bottom:15px" class="form-text text-muted">Rekomendasi ukuran gambar: 500(px) x 500(px)</small>
                            <input type="text" name="why_value1" class="form-control mb-2"
                            value="{{ $wh->why_value1 }}">
                            <input type="text" name="why_sub1" class="form-control mb-2"
                            value="{{ $wh->why_sub1 }}">
                            <textarea class="form-control" name="why_desc1" 
                            value="{{ $wh->why_desc1 }}" rows="3">{{ $wh->why_desc1 }}</textarea>
                        </div><hr>
                        <div class="form-group mb-2">
                            <label class="mb-2">Alasan 2:</label><br>
                            <input type="file" name="why_icon2" class="form-control-file mb-3">
                            <small style="display:block;margin-top:-10px;margin-bottom:15px" class="form-text text-muted">Rekomendasi ukuran gambar: 500(px) x 500(px)</small>
                            <input type="text" name="why_value2" class="form-control mb-2"
                            value="{{ $wh->why_value2 }}">
                            <input type="text" name="why_sub2" class="form-control mb-2"
                            value="{{ $wh->why_sub2 }}">
                            <textarea class="form-control" name="why_desc2" 
                            value="{{ $wh->why_desc2 }}" rows="3">{{ $wh->why_desc2 }}</textarea>
                        </div><hr>
                        <div class="form-group mb-2">
                            <label class="mb-2">Alasan 3:</label><br>
                            <input type="file" name="why_icon3" class="form-control-file mb-3">
                            <small style="display:block;margin-top:-10px;margin-bottom:15px" class="form-text text-muted">Rekomendasi ukuran gambar: 500(px) x 500(px)</small>
                            <input type="text" name="why_value3" class="form-control mb-2" 
                            value="{{ $wh->why_value3 }}">
                            <input type="text" name="why_sub3" class="form-control mb-2"
                            value="{{ $wh->why_sub3 }}">
                            <textarea class="form-control" name="why_desc3" 
                            value="{{ $wh->why_desc3 }}" rows="3">{{ $wh->why_desc3 }}</textarea>
                        </div><hr>
                        <div class="form-group mb-2">
                            <label class="mb-2">Alasan 4:</label><br>
                            <input type="file" name="why_icon4" class="form-control-file mb-3">
                            <small style="display:block;margin-top:-10px;margin-bottom:15px" class="form-text text-muted">Rekomendasi ukuran gambar: 500(px) x 500(px)</small>
                            <input type="text" name="why_value4" class="form-control mb-2" 
                            value="{{ $wh->why_value4 }}">
                            <input type="text" name="why_sub4" class="form-control mb-2"
                            value="{{ $wh->why_sub4 }}">
                            <textarea class="form-control" name="why_desc4" 
                            value="{{ $wh->why_desc4 }}" rows="3">{{ $wh->why_desc4 }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    </form>
                    @empty
                    <form action="{{ route('why.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-2">
                            <label class="mb-2">Alasan 1:</label><br>
                            <input type="file" name="why_icon1" class="form-control-file mb-3">
                            <small style="display:block;margin-top:-10px;margin-bottom:15px" class="form-text text-muted">Rekomendasi ukuran gambar: 500(px) x 500(px)</small>
                            <input type="text" name="why_value1" class="form-control mb-2" placeholder="Tuliskan alasan disini...">
                            <input type="text" name="why_sub1" class="form-control mb-2" placeholder="Tuliskan penjelasan disini...">
                            <textarea class="form-control" name="why_desc1" placeholder="Tuliskan deskripsi alasan disini..." rows="3"></textarea>
                        </div><hr>
                        <div class="form-group mb-2">
                            <label class="mb-2">Alasan 2:</label><br>
                            <input type="file" name="why_icon2" class="form-control-file mb-3">
                            <small style="display:block;margin-top:-10px;margin-bottom:15px" class="form-text text-muted">Rekomendasi ukuran gambar: 500(px) x 500(px)</small>
                            <input type="text" name="why_value2" class="form-control mb-2" placeholder="Tuliskan alasan disini...">
                            <input type="text" name="why_sub2" class="form-control mb-2" placeholder="Tuliskan penjelasan disini...">
                            <textarea class="form-control" name="why_desc2" placeholder="Tuliskan deskripsi alasan disini..." rows="3"></textarea>
                        </div><hr>
                        <div class="form-group mb-2">
                            <label class="mb-2">Alasan 3:</label><br>
                            <input type="file" name="why_icon3" class="form-control-file mb-3">
                            <small style="display:block;margin-top:-10px;margin-bottom:15px" class="form-text text-muted">Rekomendasi ukuran gambar: 500(px) x 500(px)</small>
                            <input type="text" name="why_value3" class="form-control mb-2" placeholder="Tuliskan alasan disini...">
                            <input type="text" name="why_sub3" class="form-control mb-2" placeholder="Tuliskan penjelasan disini...">
                            <textarea class="form-control" name="why_desc3" placeholder="Tuliskan deskripsi alasan disini..." rows="3"></textarea>
                        </div><hr>
                        <div class="form-group mb-2">
                            <label class="mb-2">Alasan 4:</label><br>
                            <input type="file" name="why_icon4" class="form-control-file mb-3">
                            <small style="display:block;margin-top:-10px;margin-bottom:15px" class="form-text text-muted">Rekomendasi ukuran gambar: 500(px) x 500(px)</small>
                            <input type="text" name="why_value4" class="form-control mb-2" placeholder="Tuliskan alasan disini...">
                            <input type="text" name="why_sub4" class="form-control mb-2" placeholder="Tuliskan penjelasan disini...">
                            <textarea class="form-control" name="why_desc4" placeholder="Tuliskan deskripsi alasan disini..." rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    </form>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
