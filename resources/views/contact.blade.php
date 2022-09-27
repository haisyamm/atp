@extends('layouts.lm_admin')
@section('content')
    <div class="row p-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3>CONTACT US</h3>
                </div>
                <div class="card-body">
                    @forelse ($contact as $ct)
                    <form action="{{ route('contacts.update', $ct->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group mb-2">
                            <label class="mb-2">Link Maps:</label><br>
                            <input type="text" name="address" class="form-control mb-2" value="{{ $ct->address }}">
                            <textarea class="form-control" name="maps_link" value="{{ $ct->maps_link }}" rows="3">{{ $ct->maps_link }}</textarea>
                        </div>
                        <div class="form-group mb-2">
                            <label class="mb-2">Head Office:</label>
                            <input type="text" name="ho_telp" class="form-control mb-2" value="{{ $ct->ho_telp }}">
                            <input type="text" name="ho_email" class="form-control mb-2" value="{{ $ct->ho_email }}">
                        </div>
                        <div class="form-group mb-2">
                            <label class="mb-2">Operational Office:</label>
                            <input type="text" name="oo_telp" class="form-control mb-2" value="{{ $ct->oo_telp }}">
                            <input type="text" name="oo_email" class="form-control mb-2" value="{{ $ct->oo_email }}">
                        </div>
                        <div class="form-group mb-2">
                            <label class="mb-2">Marketing Office:</label>
                            <input type="text" name="mo_telp" class="form-control mb-2" value="{{ $ct->mo_telp }}">
                            <input type="text" name="mo_email" class="form-control mb-2" value="{{ $ct->mo_email }}">
                        </div>
                        <div class="form-group mb-2">
                            <label class="mb-2">Facebook:</label>
                            <input type="text" name="facebook" class="form-control mb-2" value="{{ $ct->facebook }}">
                        </div>
                        <div class="form-group mb-2">
                            <label class="mb-2">Instagram:</label>
                            <input type="text" name="instagram" class="form-control mb-2" value="{{ $ct->instagram }}">
                        </div>
                        <div class="form-group mb-2">
                            <label class="mb-2">Whatsapp:</label>
                            <input type="text" name="whatsapp" class="form-control mb-2" value="{{ $ct->whatsapp }}">
                        </div>
                        <div class="form-group mb-2">
                            <label class="mb-2">Youtube:</label>
                            <input type="text" name="youtube" class="form-control mb-2" value="{{ $ct->youtube }}">
                        </div>
                        <div class="form-group mb-2">
                            <label class="mb-2">Linkedin:</label>
                            <input type="text" name="linkedin" class="form-control mb-2" value="{{ $ct->linkedin }}">
                        </div>
                        <div class="form-group mb-2">
                            <label class="mb-2">Telegram:</label>
                            <input type="text" name="telegram" class="form-control mb-2" value="{{ $ct->telegram }}">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    </form>
                    @empty
                        <form action="{{ route('contacts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-2">
                                <label class="mb-2">Link Maps:</label><br>
                                <textarea class="form-control" name="maps_link" placeholder="Tuliskan link alamat perusahaan disini..." rows="3"></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label class="mb-2">Head Office:</label>
                                <input type="text" name="ho_telp" class="form-control mb-2"
                                    placeholder="Tuliskan no. telp disini...">
                                <input type="text" name="ho_email" class="form-control mb-2"
                                    placeholder="Tuliskan email disini...">
                            </div>
                            <div class="form-group mb-2">
                                <label class="mb-2">Operational Office:</label>
                                <input type="text" name="oo_telp" class="form-control mb-2"
                                    placeholder="Tuliskan no. telp disini...">
                                <input type="text" name="oo_email" class="form-control mb-2"
                                    placeholder="Tuliskan email disini...">
                            </div>
                            <div class="form-group mb-2">
                                <label class="mb-2">Marketing Office:</label>
                                <input type="text" name="mo_telp" class="form-control mb-2"
                                    placeholder="Tuliskan no. telp disini...">
                                <input type="text" name="mo_email" class="form-control mb-2"
                                    placeholder="Tuliskan email disini...">
                            </div>
                            <div class="form-group mb-2">
                                <label class="mb-2">Facebook:</label>
                                <input type="text" name="facebook" class="form-control mb-2"
                                    placeholder="Tuliskan link sosial media disini...">
                            </div>
                            <div class="form-group mb-2">
                                <label class="mb-2">Instagram:</label>
                                <input type="text" name="instagram" class="form-control mb-2"
                                    placeholder="Tuliskan link sosial media disini...">
                            </div>
                            <div class="form-group mb-2">
                                <label class="mb-2">Whatsapp:</label>
                                <input type="text" name="whatsapp" class="form-control mb-2"
                                    placeholder="Tuliskan link sosial media disini...">
                            </div>
                            <div class="form-group mb-2">
                                <label class="mb-2">Youtube:</label>
                                <input type="text" name="youtube" class="form-control mb-2"
                                    placeholder="Tuliskan link sosial media disini...">
                            </div>
                            <div class="form-group mb-2">
                                <label class="mb-2">Linkedin:</label>
                                <input type="text" name="linkedin" class="form-control mb-2"
                                    placeholder="Tuliskan link sosial media disini...">
                            </div>
                            <div class="form-group mb-2">
                                <label class="mb-2">Telegram:</label>
                                <input type="text" name="telegram" class="form-control mb-2"
                                    placeholder="Tuliskan link sosial media disini...">
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </form>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
