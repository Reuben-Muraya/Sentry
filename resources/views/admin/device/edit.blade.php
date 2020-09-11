@extends('layouts.backend.app')

@section('title', 'Devices')

@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
@endpush

@section('content')
    <!-- Vertical Layout -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h4>
                        Edit Device Details
                    </h4>
                </div>
                <div class="body">
                    <form  action="{{ route('device.update',$device->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                            <h2 class="card-inside-title">Device Details</h2>
                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" name="name" class="form-control date" placeholder="Name" value="{{ $device->name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" name="phone" class="form-control date" placeholder="Phone No" value="{{ $device->phone }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" name="imei" class="form-control date" placeholder="Imei No" value="{{ $device->imei }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-2">
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" name="puk_1" class="form-control date" placeholder="PUK No. 1" value="{{ $device->puk_1 }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" name="puk_2" class="form-control date" placeholder="PUK No. 2" value="{{ $device->puk_2 }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" name="pin_1" class="form-control date" placeholder="PIN No. 1" value="{{ $device->pin_1 }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" name="pin_2" class="form-control date" placeholder="PIN No. 2" value="{{ $device->pin_2 }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" name="sentry_id" class="form-control date" placeholder="Sentry ID" value="{{ $device->sentry_id }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="row clearfix">
                            <div class="col-md-3">
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="text" name="supplier" class="form-control date" placeholder="Supplier" value="{{ $device->supplier }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="text" name="portal_pass" class="form-control date" placeholder="Online portal password / pin" value="{{ $device->portal_pass }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="text" name="color" class="form-control date" placeholder="Device Color" value="{{ $device->color }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="date" name="date_to_renewal" class="form-control date" value="{{ $device->date_to_renewal }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="row clearfix">
                                        <div class="col-md-2">
                                            <label for="status">Select Status</label>
                                            <select name="status" class="form-control show-tick">
                                                <option {{ $device->status == 1 ? 'Selected' : '' }} value="1">Active</option>
                                                <option {{ $device->status == 0 ? 'Selected' : '' }} value="0">Inactive</option>
                                                <option {{ $device->status == 2 ? 'Selected' : '' }} value="2">Lost</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-line{{ $errors->has('clients') ? 'focused error' : '' }}">
                                            <label for="status">Select Client</label>
                                                <select name="clients[]" id="client" class="form-control show-tick" data-live-search="false" required>
                                                    @foreach($clients as $client)
                                                        <option
                                                                @foreach($device->clients as $deviceClient)
                                                                {{ $deviceClient->id == $client->id ? 'selected' : '' }}
                                                                @endforeach
                                                                value="{{ $client->id }}">{{ $client->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-line{{ $errors->has('sites') ? 'focused error' : '' }}">
                                                <label for="status">Select Sites</label>
                                                <select name="sites[]" id="site" class="form-control show-tick" data-live-search="false" required>
                                                    <option value="">Select Site</option>
                                                    @foreach($sites as $site)
                                                        <option
                                                            @foreach($device->sites as $deviceSite)
                                                              {{ $deviceSite->id == $site->id ? 'selected' : '' }}
                                                            @endforeach
                                                              value="{{ $site->id }}">{{ $site->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-line{{ $errors->has('products') ? 'focused error' : '' }}">
                                            <label for="status">Select Product</label>
                                                <select name="products[]" id="product" class="form-control show-tick" data-live-search="false" required>
                                                    @foreach($products as $product)
                                                        <option
                                                                @foreach($device->products as $deviceProduct)
                                                                {{ $deviceProduct->id == $product->id ? 'selected' : '' }}
                                                                @endforeach
                                                                value="{{ $product->id }}">{{ $product->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-line{{ $errors->has('phones') ? 'focused error' : '' }}">
                                            <label for="status">Select Device Model</label>
                                                <select name="phones[]" id="phone" class="form-control show-tick" data-live-search="false" required>
                                                    @foreach($phones as $phone)
                                                        <option
                                                                @foreach($device->phones as $devicePhone)
                                                                {{ $devicePhone->id == $phone->id ? 'selected' : '' }}
                                                                @endforeach
                                                                value="{{ $phone->id }}">{{ $phone->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-line{{ $errors->has('simcards') ? 'focused error' : '' }}">
                                            <label for="status">Select Simcard Type</label>
                                                <select name="simcards[]" id="phone" class="form-control show-tick" data-live-search="false" required>
                                                    @foreach($simcards as $simcard)
                                                        <option
                                                                @foreach($device->simcards as $deviceSimcard)
                                                                {{ $deviceSimcard->id == $simcard->id ? 'selected' : '' }}
                                                                @endforeach
                                                                value="{{ $simcard->id }}">{{ $simcard->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                            </div>
                        <button type="submit" class="btn btn-primary waves-effect">SAVE</button>
                        <a href="{{ URL::previous() }}" class="btn btn-danger waves-effect">BACK</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Vertical Layout -->
@endsection

@push('js')
<script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-*.min.js"></script>
@endpush