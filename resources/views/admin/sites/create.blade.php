@extends('layouts.backend.app')

@section('title', 'Sites')

@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
@endpush

@section('content')
    <!-- Vertical Layout -->
    <div class="row clearfix">
        <div class="col-lg-8 col-md-12 col-sm-8 col-xs-8">
            <div class="card">
                <div class="header">
                    <h4>
                        Add Site
                    </h4>
                </div>
                <div class="body">
                    <form method="POST" action="{{ route('site.store') }}" enctype="multipart/form-data">
                        @csrf
                        <label for="name">Site Name</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="name" name="name" class="form-control" placeholder="Enter the site name">
                            </div>
                        </div>
                        <label for="name">Site Location</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="location" name="location" class="form-control" placeholder="Enter the site Location">
                            </div>
                        </div>
                        <label for="name">Site Email Address</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="email" id="email" name="email" class="form-control" placeholder="Type the client Email Address">
                            </div>
                        </div>
                        <label for="name">Site Phone No.</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter the client Phone No.">
                            </div>
                        </div>
                        <label for="name">Site Web Page</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="url" id="webpage" name="webpage" class="form-control" placeholder="Type the client web page">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <div class="{{ $errors->has('products') ? 'focused error' : '' }}">
                                    <label for="status">Select Client</label>
                                    <select name="clients[]" id="client" class="form-control show-tick" data-live-search="false">
                                        @foreach($clients as $client)
                                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="{{ $errors->has('products') ? 'focused error' : '' }}">
                                    <label for="products">Select Product</label>
                                    <select name="products[]" id="product" class="form-control show-tick " data-live-search="false" multiple>
                                        @foreach($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <label for="status">Select Status</label>
                            <select name="status" class="form-control show-tick ">
                                <option value="1">Active</option>
                                {{-- <option value="0">Inactive</option> --}}
                                <option value="2">POC</option>
                            </select>
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
<!-- Jquery Core Js -->
<script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-*.min.js"></script>
@endpush