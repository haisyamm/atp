@extends('layouts.lm_admin')
@section('content')
<div class="row row-deck row-cards">
    <div class="col-sm-6 col-lg-12">
        <div class="card">
            <div class="card-body d-flex justify-content-between">
                <div class="h1 mb-3">Hai, {{ Auth::user()->name }}!</div>
                <a href="{{ route('resi-add') }}" class="btn btn-primary">Buat Booking Sekarang</a>
            </div>
        </div>
    </div>
</div>
<div class="row row-deck row-cards">
    <div class="col-sm-6 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="subheader">Active Shipment :</div>
                    <div class="ms-auto lh-1">
                        <div class="dropdown">
                            <!-- <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7 days</a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item active" href="#">Last 7 days</a>
                                <a class="dropdown-item" href="#">Last 30 days</a>
                                <a class="dropdown-item" href="#">Last 3 months</a>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="h1 mb-3"><span id="active"></span>  </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="subheader">Finished Shipment :</div>
                    <div class="ms-auto lh-1">
                        <div class="dropdown">
                            <!-- <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7 days</a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item active" href="#">Last 7 days</a>
                                <a class="dropdown-item" href="#">Last 30 days</a>
                                <a class="dropdown-item" href="#">Last 3 months</a>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="h1 mb-3"><span id="finish"></span>  </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="subheader">Performance Rate:</div>
                    <div class="ms-auto lh-1">
                        <div class="dropdown">
                            <!-- <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7 days</a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item active" href="#">Last 7 days</a>
                                <a class="dropdown-item" href="#">Last 30 days</a>
                                <a class="dropdown-item" href="#">Last 3 months</a>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="h1 mb-3"><span id="pr"></span>  </div>
            </div>
        </div>
    </div>
</div>
<div class="row row-deck row-cards">
    <div class="col-sm-6 col-lg-12">
        <div class="card">
            <div class="card-body">
            <div class="table-responsive mt-2">
                    <table id="booking" class="table table-vcenter card-table" style="width:100%">
                    <thead>
                            <tr>
                                <th class="text-center" style="width: 30px;">
                                <span class="text-muted">#</span>
                                </th>
                                <th>No Resi</th>
                                <th>Status</th>
                        </thead>
                        <tbody id="f-booking">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script>
$(document).ready(function() {
    dbooking();
    fbooking();
});

    function dbooking(){
            $.ajax({
                url: '{{route("d-booking")}}',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    //console.log(data.finished);
                    $('#finish').html(data.finished);
                    $('#active').html(data.ongoing);
                    let pr = 0;
                    pr = data.finished/data.total*100/100;
                    $('#pr').html(parseFloat(pr).toFixed(2));
                }
            });
            
        }
    function fbooking(){
        $.ajax({
            url: '{{route("f-booking")}}',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                //console.log(data);
                let html = '';
                for(var i=0; i<data.length; i++) {
                    var n = i+1;
                    html += "<tr>"+
                            "<td>"+n+"</td>"+ 
                            "<td>"+data[i]['no_resi']+"</td>"+ 
                            "<td>"+data[i]['status']+"</td>"+ 
                            "</tr>";
                }
                //console.log(html);
                $('#f-booking').html(html);
            }
        });
        
    }
</script>
@endpush