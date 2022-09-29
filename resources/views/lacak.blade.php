@extends('layouts.app')
@section('css')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
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
    .badge-dot-xl-tbl {
        width: 40px;
        height: 40px;
        position: relative;
        left: -5px;
        
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

<div class="page">
    <div class="page-wrapper">
        <div class="page-body mt-7 py-0">   
            <div class="bg-holder bg-right d-none d-lg-block">
                <div class="container">
                    <div class="row h-100">
                        <div class="col-12 card-body">
                        <div class="main-card mb-2 card">
                                <div class="card-header d-flex justify-content-between px-4 py-4">
                                    <form action="{{ route('tracking')}}" method="GET" class="d-flex flex-row">
                                        <div class="col-md-8">
                                            <input type="text" name="no_resi" id="no_resi" class="form-control" placeholder="ATPXX12345678" value="{{ isset($resi->resi) ? $resi->resi : ''  }}">
                                        </div>
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-secondary" >
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
                                                <span class="vertical-timeline-element-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-truck-delivery badge icon-success badge-dot-xl-tbl" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <circle cx="7" cy="17" r="2"></circle>
                                                <circle cx="17" cy="17" r="2"></circle>
                                                <path d="M5 17h-2v-4m-1 -8h11v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5"></path>
                                                <line x1="3" y1="9" x2="7" y2="9"></line>
                                                </svg>
                                                </span>
                                                @else
                                                <span class="vertical-timeline-element-icon bounce-in">
                                                    <i class="badge badge-dot badge-dot-xl badge-success"> </i>
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
                            </div>        
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection
@push('script')
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
@endpush