@extends('layouts.lm_admin')
@section('css')
<style>
    body{
     background-color: #eee;
}

.mt-70{
     margin-top: 70px;
}

.mb-70{
     margin-bottom: 70px;
}

.card {
    box-shadow: 0 0.46875rem 2.1875rem rgba(4,9,20,0.03), 0 0.9375rem 1.40625rem rgba(4,9,20,0.03), 0 0.25rem 0.53125rem rgba(4,9,20,0.05), 0 0.125rem 0.1875rem rgba(4,9,20,0.03);
    border-width: 0;
    transition: all .2s;
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(26,54,126,0.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    padding: 1.25rem;
}
.vertical-timeline {
    width: 100%;
    position: relative;
    padding: 1.5rem 0 1rem;
}

.vertical-timeline::before {
    content: '';
    position: absolute;
    top: 0;
    left: 67px;
    height: 100%;
    width: 5px;
    background: #e9ecef;
    border-radius: .25rem;
}

.vertical-timeline-element {
    position: relative;
    margin: 0 0 1rem;
}

.vertical-timeline--animate .vertical-timeline-element-icon.bounce-in {
    visibility: visible;
    animation: cd-bounce-1 .8s;
}
.vertical-timeline-element-icon {
    position: absolute;
    top: 0;
    left: 55px;
}

.vertical-timeline-element-icon .badge-dot-xl {
    box-shadow: 0 0 0 5px #fff;
}

.badge-dot-xl {
    width: 28px;
    height: 28px;
    position: relative;
}
.badge:empty {
    display: none;
}


.badge-dot-xl::before {
    content: '';
    width: 10px;
    height: 10px;
    border-radius: .25rem;
    position: absolute;
    left: 50%;
    top: 50%;
    margin: -5px 0 0 -5px;
    background: #fff;
}

.vertical-timeline-element-content {
    position: relative;
    margin-left: 90px;
    font-size: .8rem;
}

.vertical-timeline-element-content .timeline-title {
    font-size: .8rem;
    text-transform: uppercase;
    margin: 0 0 .5rem;
    padding: 2px 0 0;
    font-weight: bold;
}

.vertical-timeline-element-content .vertical-timeline-element-date {
    display: block;
    position: absolute;
    left: -90px;
    top: 0;
    padding-right: 10px;
    text-align: right;
    color: #adb5bd;
    font-size: .7619rem;
    white-space: nowrap;
}

.vertical-timeline-element-content:after {
    content: "";
    display: table;
    clear: both;
}
</style>
@stop
@section('content')    
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card-header d-flex justify-content-between" style="background-color: #006a4e;">
                <h3 class="card-title text-white"><B>UPDATE LACAK PENGIRIMAN</B></h3>
                </div>
            </div>
        <div class="main-card mb-2 card">
            <div class="card-header d-flex justify-content-between px-4 py-4">
                <form action="{{ route('tracking')}}" method="GET" class="d-flex flex-row">
                    <div class="col-md-6">
                        <input type="text" name="no_resi" id="no_resi" class="form-control mt-2" placeholder="ATPXX12345678" value="{{ isset($resi->resi) ? $resi->resi : ''  }}">
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-dark w-100">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="10" cy="10" r="7"></circle>
                                <line x1="21" y1="21" x2="15" y2="15"></line>
                                </svg>
                                </span>
                            Cari
                        </button>
                    </div>
                </form>
                <a href="{{ route('resi-add') }}" class="btn btn-primary">Book Now</a>
            </div>
            <div class="card-body">
            @if($tracking)
                <h5 class="card-title">Tracking Timeline</h5>
                <div class="vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
                    @foreach($tracking as $key => $track)
                    <div class="vertical-timeline-item vertical-timeline-element">
                        <div>
                            @if($last== $key)
                            <span class="vertical-timeline-element-icon bounce-in">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-truck-delivery badge-dot-xl" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="7" cy="17" r="2"></circle>
                            <circle cx="17" cy="17" r="2"></circle>
                            <path d="M5 17h-2v-4m-1 -8h11v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5"></path>
                            <line x1="3" y1="9" x2="7" y2="9"></line>
                            </svg>
                            </span>
                            @else
                            <span class="vertical-timeline-element-icon bounce-in">
                                <i class="badge badge-dot badge-dot-xl badge-danger"> </i>
                            </span>
                            @endif
                            <div class="vertical-timeline-element-content bounce-in">
                                <h4 class="timeline-title">{{$track->status}}</h4>
                                <p>
                                    {{$track->word}}
                                    <!-- <a href="javascript:void(0);" data-abc="true">12:00 PM</a> -->
                                </p>
                                <span class="vertical-timeline-element-date">
                                    <label for="">{{date("d M", strtotime($track->date))}}</label><br>
                                    <label for="">{{$track->time}}</label>
                                </span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- <div class="vertical-timeline-item vertical-timeline-element">
                        <div>
                            <span class="vertical-timeline-element-icon bounce-in">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-truck-delivery" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="7" cy="17" r="2"></circle>
                            <circle cx="17" cy="17" r="2"></circle>
                            <path d="M5 17h-2v-4m-1 -8h11v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5"></path>
                            <line x1="3" y1="9" x2="7" y2="9"></line>
                            </svg>
                            </span>
                            <div class="vertical-timeline-element-content bounce-in">
                                <p>Another meeting with UK client today, at <b class="text-danger">3:00 PM</b></p>
                                <p>Yet another one, at <span class="text-success">5:00 PM</span></p>
                                <span class="vertical-timeline-element-date">12:25 PM</span>
                            </div>
                        </div>
                    </div>
                    <div class="vertical-timeline-item vertical-timeline-element">
                        <div>
                            <span class="vertical-timeline-element-icon bounce-in">
                                <i class="badge badge-dot badge-dot-xl badge-danger"> </i>
                            </span>
                            <div class="vertical-timeline-element-content bounce-in">
                                <h4 class="timeline-title">Discussion with team about new product launch</h4>
                                <p>meeting with team mates about the launch of new product. and tell them about new features</p>
                                <span class="vertical-timeline-element-date">6:00 PM</span>
                            </div>
                        </div>
                    </div>
                    <div class="vertical-timeline-item vertical-timeline-element">
                        <div>
                            <span class="vertical-timeline-element-icon bounce-in">
                                <i class="badge badge-dot badge-dot-xl badge-primary"> </i>
                            </span>
                            <div class="vertical-timeline-element-content bounce-in">
                                <h4 class="timeline-title text-success">Discussion with marketing team</h4>
                                <p>Discussion with marketing team about the popularity of last product</p>
                                <span class="vertical-timeline-element-date">9:00 AM</span>
                            </div>
                        </div>
                    </div>
                    <div class="vertical-timeline-item vertical-timeline-element">
                        <div>
                            <span class="vertical-timeline-element-icon bounce-in">
                                <i class="badge badge-dot badge-dot-xl badge-success"> </i>
                            </span>
                            <div class="vertical-timeline-element-content bounce-in">
                                <h4 class="timeline-title">Purchase new hosting plan</h4>
                                <p>Purchase new hosting plan as discussed with development team, today at <a href="javascript:void(0);" data-abc="true">10:00 AM</a></p>
                                <span class="vertical-timeline-element-date">10:30 PM</span>
                            </div>
                        </div>
                    </div>
                    <div class="vertical-timeline-item vertical-timeline-element">
                        <div>
                            <span class="vertical-timeline-element-icon bounce-in">
                                <i class="badge badge-dot badge-dot-xl badge-warning"> </i>
                            </span>
                            <div class="vertical-timeline-element-content bounce-in">
                                <p>Another conference call today, at <b class="text-danger">11:00 AM</b></p>
                                <p>Yet another one, at <span class="text-success">1:00 PM</span></p>
                                <span class="vertical-timeline-element-date">12:25 PM</span>
                            </div>
                        </div>
                    </div>
                    <div class="vertical-timeline-item vertical-timeline-element">
                        <div>
                            <span class="vertical-timeline-element-icon bounce-in">
                                <i class="badge badge-dot badge-dot-xl badge-warning"> </i>
                            </span>
                            <div class="vertical-timeline-element-content bounce-in">
                                <p>Another meeting with UK client today, at <b class="text-danger">3:00 PM</b></p>
                                <p>Yet another one, at <span class="text-success">5:00 PM</span></p>
                                <span class="vertical-timeline-element-date">12:25 PM</span>
                            </div>
                        </div>
                    </div>
                    <div class="vertical-timeline-item vertical-timeline-element">
                        <div>
                            <span class="vertical-timeline-element-icon bounce-in">
                                <i class="badge badge-dot badge-dot-xl badge-danger"> </i>
                            </span>
                            <div class="vertical-timeline-element-content bounce-in">
                                <h4 class="timeline-title">Discussion with team about new product launch</h4>
                                <p>meeting with team mates about the launch of new product. and tell them about new features</p>
                                <span class="vertical-timeline-element-date">6:00 PM</span>
                            </div>
                        </div>
                    </div>
                    <div class="vertical-timeline-item vertical-timeline-element">
                        <div>
                            <span class="vertical-timeline-element-icon bounce-in">
                                <i class="badge badge-dot badge-dot-xl badge-primary"> </i>
                            </span>
                            <div class="vertical-timeline-element-content bounce-in">
                                <h4 class="timeline-title text-success">Discussion with marketing team</h4>
                                <p>Discussion with marketing team about the popularity of last product</p>
                                <span class="vertical-timeline-element-date">9:00 AM</span>
                            </div>
                        </div>
                    </div>
                    <div class="vertical-timeline-item vertical-timeline-element">
                        <div>
                            <span class="vertical-timeline-element-icon bounce-in">
                                <i class="badge badge-dot badge-dot-xl badge-success"> </i>
                            </span>
                            <div class="vertical-timeline-element-content bounce-in">
                                <h4 class="timeline-title">Purchase new hosting plan</h4>
                                <p>Purchase new hosting plan as discussed with development team, today at <a href="javascript:void(0);" data-abc="true">10:00 AM</a></p>
                                <span class="vertical-timeline-element-date">10:30 PM</span>
                            </div>
                        </div>
                    </div>
                    <div class="vertical-timeline-item vertical-timeline-element">
                        <div>
                            <span class="vertical-timeline-element-icon bounce-in">
                                <i class="badge badge-dot badge-dot-xl badge-warning"> </i>
                            </span>
                            <div class="vertical-timeline-element-content bounce-in">
                                <p>Another conference call today, at <b class="text-danger">11:00 AM</b></p>
                                <p>Yet another one, at <span class="text-success">1:00 PM</span></p>
                                <span class="vertical-timeline-element-date">12:25 PM</span>
                            </div>
                        </div>
                    </div> -->
                </div>
            @else
                <h5 class="card-title">Resi Not Found</h5>
            @endif
            </div>
            <div class="card-footer border-light">
                <input type="hidden" name="p_id" id="p_id" value="{{ isset($resi->id) ? $resi->id : ''  }}">
                <div class="row" style="margin-top: 25px;">
                    <div class="col-md-12 form-group mb-3">
                        <label for="tracking" class="small fw-bolder text-uppercase">Update Status</label>
                        <select name="tracking" id="tracking" class="col-md-12 form-select mt-1" required>
                        <option value="" class="col-md-12 form-select">Pilih...</option>
                        @foreach(config('tracking') as $key => $tracking)
                        <option value="{{$key}}" class="col-md-12 form-select"><b>{{'< '.$key.' >'}}</b> {{$tracking}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex justify-content-end">
                    <a class="btn btn-light" href="{{route('resi')}}">CANCEL</a>
                    <button class="btn btn-dark ms-1" onclick="onCreateAsset()">Update</button>
                </div>
            </div>
        </div>        
    </div>
</div>
@endsection
@push('script')
<script>
    const onCreateAsset = () => {
        var dataBatch = getFormInput();
        var p_id = $('#p_id').val();
        dataBatch['id'] = p_id;
        requestServer({
            url: '{{route("track-update")}}',
            data: dataBatch,
            onSuccess: function(response) {
                Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Your resi has been update',
                showConfirmButton: false,
                timer: 1500
                }).then((result) => {
                    window.location.assign('{{ route("tracking", "no_resi=".$resi->no_resi) }}');
                })
            }
        });
    }

    // Get input in form
    const getFormInput = () => {
        // Daerah Asal
        let word = $('#tracking option:selected').text();
        let sts = $('#tracking').val();
        let dataBatch = {
            "_token": "{{ csrf_token() }}",
            status: sts ,
            word: word 
        };
        return dataBatch;
    }
</script>
@endpush