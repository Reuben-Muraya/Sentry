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
                        Edit Contact
                    </h4>
                </div>
                <div class="body">
                    <form  action="{{ route('contact.update',$contact->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                            <h2 class="card-inside-title">Contact Details</h2>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="text" name="first_name" class="form-control date" placeholder="First Name" value="{{ $contact->first_name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="text" name="last_name" class="form-control date" placeholder="Last Name" value="{{ $contact->last_name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="text" name="email" class="form-control date" placeholder="Email Address" value="{{ $contact->email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="text" name="phone_1" class="form-control date" placeholder="Phone No. 1" value="{{ $contact->phone_1 }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="text" name="phone_2" class="form-control date" placeholder="Phone No. 2" value="{{ $contact->phone_2 }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="row clearfix">
                                            <div class="col-md-3">
                                                <div class="form-line{{ $errors->has('clients') ? 'focused error' : '' }}">
                                                    <label for="status">Select Client</label>
                                                    <select name="clients[]" id="client" class="form-control show-tick" data-live-search="false" required>
                                                        @foreach($clients as $client)
                                                            <option
                                                                    @foreach($contact->clients as $contactClient)
                                                                    {{ $contactClient->id == $client->id ? 'selected' : '' }}
                                                                    @endforeach
                                                                    value="{{ $client->id }}">{{ $client->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-line{{ $errors->has('sites') ? 'focused error' : '' }}">
                                                    <label for="status">Select Sites</label>
                                                    <select name="sites[]" id="site" class="form-control show-tick" data-live-search="false" required>
                                                        <option value="">Select Site</option>
                                                        @foreach($sites as $site)
                                                            <option
                                                                @foreach($contact->sites as $contactSite)
                                                                  {{ $contactSite->id == $site->id ? 'selected' : '' }}
                                                                @endforeach
                                                                  value="{{ $site->id }}">{{ $site->name }}</option>
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