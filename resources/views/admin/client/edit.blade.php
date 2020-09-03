
@extends('layouts.backend.app')

@section('title', 'Clients')

@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
@endpush

@section('content')
    <!-- Vertical Layout -->
    <div class="row clearfix">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
            <div class="card">
                <div class="header">
                    <h4>
                        Edit Client
                    </h4>
                </div>
                <div class="body">
                    <form  action="{{ route('client.update',$client->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label for="name">Client Name</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="name" name="name" class="form-control" value="{{ $client->name }}">
                            </div>
                        </div>
                        <label for="name">Client Phone No.</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="phone" name="phone" class="form-control" value="{{ $client->phone }}">
                            </div>
                        </div>
                        <label for="name">Client Email Address</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="email" id="email" name="email" class="form-control" value="{{ $client->email }}">
                            </div>
                        </div>
                        <label for="name">Client Web Page</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="url" id="webpage" name="webpage" class="form-control" value="{{ $client->webpage }}">
                            </div>
                        </div>
                        <label for="name">About Client</label>
                        <div class="form-group">
                            <div class="form-line">
                                <textarea name="about" cols="30" rows="3" class="form-control no-resize" aria-required="true">{{ $client->about }}</textarea>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line{{ $errors->has('products') ? 'focused error' : '' }}">
                                <label for="product">Select Product</label>
                                <select name="products[]" id="product" class="form-control show-tick" data-live-search="false" multiple>
                                    @foreach($products as $product)
                                        <option
                                             @foreach($client->products as $clientProduct)
                                                 {{ $clientProduct->id == $product->id ? 'selected' : '' }}
                                             @endforeach
                                             value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <label for="status">Select Status</label>
                            <select name="status[]" id="status" class="form-control show-tick">
                                <option  {{ $client->status == 1 ? 'Selected' : '' }} value="1" >Active</option>
                                <option  {{ $client->status == 0 ? 'Selected' : '' }} value="0" >Inactive</option>
                                <option  {{ $client->status == 2 ? 'Selected' : '' }} value="2" >POC</option>
                                <option  {{ $client->status == 3 ? 'Selected' : '' }} value="3" >Deactivate</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary waves-effect">UPDATE</button>
                        <a href="{{ route('client.index') }}" class="btn btn-danger waves-effect">BACK</a>
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