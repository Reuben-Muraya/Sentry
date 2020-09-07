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
                        Add Contact
                    </h4>
                </div>
                <div class="body">
                    <form  action="{{ route('contact.store') }}" method="POST">
                        @csrf
                            <h2 class="card-inside-title">Contact Details</h2>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" name="first_name" class="form-control date" placeholder="First Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" name="last_name" class="form-control date" placeholder="Last Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" name="email" class="form-control date" placeholder="Email Address">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" name="phone_1" class="form-control date" placeholder="Phone No. 1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" name="phone_2" class="form-control date" placeholder="Phone No. 2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                        <div class="col-md-3">
                                            <label for="status">Select Client</label>
                                            <br>
                                            <select name="clients[]" id="client" class="form-control show-tick" data-live-search="false">
                                                @foreach($clients as $client)
                                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                                                @endforeach
                                            </select>
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