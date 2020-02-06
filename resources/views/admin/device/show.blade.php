@extends('layouts.backend.app')

@section('title', 'Devices')

@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
@endpush

@section('content')
    <div class="container-fluid">
        <a href="{{ route('device.index') }}" class="btn btn-danger waves-effect">BACK</a>
        <a href="{{ route('device.edit', $device->id) }}" class="btn btn-info waves-effect">EDIT</a>
        <br>
        <br>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-teal">
                        <h2>
                            {{ $device->name }}
                        </h2>
                    </div>
                    <div class="body">
                        <h4>Devices Details</h4>
                        <div>
                            <!-- Basic Card -->
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md- col-sm-3 col-xs-3">
                                    <div class="card">
                                        <div class="header bg-amber">
                                            <h5>IMEI No.</h5>
                                        </div>
                                        <div class="body">
                                            {{ $device->imei }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md- col-sm-3 col-xs-3">
                                    <div class="card">
                                        <div class="header bg-deep-purple">
                                            <h5>Phone No.</h5>
                                        </div>
                                        <div class="body">
                                            {{ $device->phone }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md- col-sm-3 col-xs-3">
                                    <div class="card">
                                        <div class="header bg-deep-orange">
                                            <h5>Sentry ID</h5>
                                        </div>
                                        <div class="body">
                                            {{ $device->sentry_id }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md- col-sm-3 col-xs-3">
                                    <div class="card">
                                        <div class="header bg-light-blue">
                                            <h5>Supplier</h5>
                                        </div>
                                        <div class="body">
                                            {{ $device->supplier }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md- col-sm-3 col-xs-3">
                                    <div class="card">
                                        <div class="header bg-black">
                                            <h5>PUK NO. 1</h5>
                                        </div>
                                        <div class="body">
                                            {{ $device->puk_1 }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md- col-sm-3 col-xs-3">
                                    <div class="card">
                                        <div class="header bg-black">
                                            <h5>PUK NO. 2</h5>
                                        </div>
                                        <div class="body">
                                            {{ $device->puk_2 }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md- col-sm-3 col-xs-3">
                                    <div class="card">
                                        <div class="header bg-orange">
                                            <h5>PIN NO. 1</h5>
                                        </div>
                                        <div class="body">
                                            {{ $device->pin_1 }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md- col-sm-3 col-xs-3">
                                    <div class="card">
                                        <div class="header bg-orange">
                                            <h5>PIN NO. 2</h5>
                                        </div>
                                        <div class="body">
                                            {{ $device->pin_2 }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md- col-sm-3 col-xs-3">
                                    <div class="card">
                                        <div class="header bg-teal">
                                            <h5>Date To Data Renewal</h5>
                                        </div>
                                        <div class="body" id="date1">
                                            {{ \Carbon\Carbon::parse($device->date_to_renewal)->format('d/m/Y') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md- col-sm-3 col-xs-3">
                                    <div class="card">
                                        <div class="header bg-teal">
                                            <h5>Date To Data Renewal</h5>
                                        </div>
                                        <div class="body" id="result">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md- col-sm-3 col-xs-3">
                                    <div class="card">
                                        <div class="header bg-green">
                                            <h5>Status</h5>
                                        </div>
                                        <div class="body">
                                            @if($device->status == true)
                                                <span class="badge bg-green">Active</span>
                                            @else
                                                <span class="badge bg-red">Inactive</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md- col-sm-3 col-xs-3">
                                    <div class="card">
                                        <div class="header bg-grey">
                                            <h5>Client</h5>
                                        </div>
                                        <div class="body">
                                            @foreach($device->clients as $client)
                                               <span class="badge bg-indigo">{{ $client->name }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md- col-sm-3 col-xs-3">
                                    <div class="card">
                                        <div class="header bg-purple">
                                            <h5>Product</h5>
                                        </div>
                                        <div class="body">
                                            @foreach($device->products as $product)
                                                 <span class="badge bg-teal">{{ $product->name }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md- col-sm-3 col-xs-3">
                                    <div class="card">
                                        <div class="header bg-blue-grey">
                                            <h5>Device Model</h5>
                                        </div>
                                        <div class="body">
                                            @foreach($device->phones as $phone)
                                                 <span class="badge bg-deep-orange">{{ $phone->name }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- #END# Basic Card -->
                        </div>
                    </div>
                </div>

            </div>
            {{--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">--}}
                {{--<div class="card">--}}
                    {{--<div class="header bg-deep-purple">--}}
                        {{--<h2>--}}
                            {{--Client--}}
                        {{--</h2>--}}
                    {{--</div>--}}
                    {{--<div class="body">--}}
                        {{--@foreach($device->clients as $client)--}}
                            {{--<span class="label bg-black">{{ $client->name }}</span>--}}
                        {{--@endforeach--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="card">--}}
                    {{--<div class="header bg-deep-purple">--}}
                        {{--<h2>--}}
                            {{--Product--}}
                        {{--</h2>--}}
                    {{--</div>--}}
                    {{--<div class="body">--}}
                        {{--@foreach($device->products as $product)--}}
                            {{--<span class="label bg-black">{{ $product->name }}</span>--}}
                        {{--@endforeach--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>
@endsection

@push('js')
<!-- Jquery Core Js -->
<script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-*.min.js"></script>
@endpush