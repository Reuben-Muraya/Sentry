@extends('layouts.backend.app')

@section('title', 'Devices')

@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
@endpush

@section('content')
    <!-- Vertical Layout -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        ADD Device
                    </h2>
                </div>
                <div class="body">
                    <form  action="{{ route('device.store') }}" method="POST">
                        @csrf
                            <h2 class="card-inside-title">Device Details</h2>
                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" name="name" class="form-control date" placeholder="Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" name="phone" class="form-control date" placeholder="Phone No">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" name="imei" class="form-control date" placeholder="Imei No">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-2">
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" name="puk_1" class="form-control date" placeholder="PUK No. 1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" name="puk_2" class="form-control date" placeholder="PUK No. 2">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" name="pin_1" class="form-control date" placeholder="PIN No. 1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" name="pin_2" class="form-control date" placeholder="PIN No. 2">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" name="sentry_id" class="form-control date" placeholder="Sentry ID">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="row clearfix">
                            <div class="col-md-3">
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="text" name="supplier" class="form-control date" placeholder="Supplier">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="text" name="portal_pass" class="form-control date" placeholder="Online portal password / pin">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="text" name="color" class="form-control date" placeholder="Device Color">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="date" name="date_to_renewal" class="form-control date" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="row clearfix">
                                        <div class="col-md-3">
                                            <label for="status">Select Status</label>
                                            <select name="status" class="form-control show-tick">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="status">Select Client</label>
                                            <select name="clients[]" id="client" class="form-control show-tick" data-live-search="true">
                                                @foreach($clients as $client)
                                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="status">Select Product</label>
                                            <select name="products[]" id="client" class="form-control show-tick" data-live-search="true">
                                                @foreach($products as $product)
                                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="status">Select Device Model</label>
                                            <select name="phones[]" id="phone" class="form-control show-tick" data-live-search="true">
                                                @foreach($phones as $phone)
                                                    <option value="{{ $phone->id }}">{{ $phone->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="status">Select Simcard Type</label>
                                            <select name="simcards[]" id="simcard" class="form-control show-tick" data-live-search="true">
                                                @foreach($simcards as $simcard)
                                                    <option value="{{ $simcard->id }}">{{ $simcard->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                            </div>
                        <button type="submit" class="btn btn-primary waves-effect">SAVE</button>
                        <a href="{{ route('device.index') }}" class="btn btn-danger waves-effect">BACK</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Vertical Layout -->
@endsection

@push('js')
{{--<script>--}}
    {{--$('.datepicker').datepicker();--}}
{{--</script>--}}
<script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-*.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
@endpush