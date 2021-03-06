@extends('layouts.backend.app')

@section('title', 'Sites')

@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
<link href="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">
        <a href="{{ URL::previous() }}" class="btn btn-danger waves-effect">BACK</a>
        <a href="{{ route('site.edit',$site->id) }}" class="btn btn-info waves-effect">EDIT</a>
        <br>
        <br>
        <div class="row clearfix">
            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-indigo">
                        <h2>{{ $site->name }}</h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">
                                    <div class="header">
                                        <h4>
                                            {{ $site->name }} Devices
                                            <span class="badge bg-blue">{{ $site->devices->count() }}</span>
                                        </h4>
                                    </div>
                                    <div class="body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>IMEI</th>
                                                    <th>Phone No.</th>
                                                    <th>PIN No 1</th>
                                                    <th>PIN No 2</th>
                                                    <th>Sentry ID</th>
                                                    <th>Status</th>
                                                    <th>Product</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($site->devices as $key=>$device)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $device->name }}</td>
                                                        <td>{{ $device->imei }}</td>
                                                        <td>{{ $device->phone }}</td>
                                                        <td>{{ $device->pin_1 }}</td>
                                                        <td>{{ $device->pin_2 }}</td>
                                                        <td>{{ $device->sentry_id }}</td>
                                                        <td>
                                                            @if($device->status == 1)
                                                                <span class="badge bg-green">Active</span>
                                                            @elseif($device->status == 0)
                                                                <span class="badge bg-red">Inactive</span>
                                                            @elseif($device->status == 2)
                                                                <span class="badge bg-black">Lost</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                        @foreach($device->products as $product)
                                                            <span class="badge bg-teal">{{ $product->name }}</span>
                                                        @endforeach
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="{{ route('device.show',$device->id) }}"
                                                               class="btn btn-success waves-effect">
                                                                <i class="material-icons sm">visibility</i>
                                                            </a>
                                                            <a href="{{ route('device.edit',$device->id) }}"
                                                               class="btn btn-info waves-effect">
                                                                <i class="material-icons sm">edit</i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">
                                    <div class="header">
                                        <h4>
                                            Contact List
                                            <span class="badge bg-blue">{{ $site->contacts->count() }}</span>
                                        </h4>
                                    </div>
                                    <div class="body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Phone No. 1</th>
                                                    <th>Phone No. 2</th>
                                                    <th>Email Address</th>
                                                    {{--<th>Client</th>--}}
                                                    {{--<th>Created At</th>--}}
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($site->contacts as $key=>$contact)
                                                    <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $contact->first_name }}</td>
                                                    <td>{{ $contact->last_name }}</td>
                                                    <td>{{ $contact->phone_1 }}</td>
                                                    <td>{{ $contact->phone_2 }}</td>
                                                    <td>{{ $contact->email }}</td>
                                                    <td class="text-center">
                                                        <a href="{{ route('contact.edit',$contact->id) }}"
                                                           class="btn btn-info waves-effect">
                                                            <i class="material-icons sm">edit</i>
                                                        </a>
                                                    </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                <div class="card">
                    <div class="header bg-indigo">
                        <h2>
                            Client
                        </h2>
                    </div>
                    <div class="body">
                        @foreach($site->clients as $client)
                            <span class="label bg-purple">{{ $client->name }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                <div class="card">
                    <div class="header bg-indigo">
                        <h2>
                            Products
                        </h2>
                    </div>
                    <div class="body">
                        @foreach($site->products as $product)
                            <span class="label bg-purple">{{ $product->name }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<!-- Jquery Core Js -->
<script src="{{ asset('assets/backend/plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap Core Js -->
<script src="{{ asset('assets/backend/plugins/bootstrap/js/bootstrap.js') }}"></script>

<!-- Select Plugin Js -->
<script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

<!-- Slimscroll Plugin Js -->
<script src="{{ asset('assets/backend/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{ asset('assets/backend/plugins/node-waves/waves.js') }}"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="{{ asset('assets/backend/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>

<!-- Custom Js -->
<script src="{{ asset('assets/backend/js/admin.js') }}"></script>
<script src="{{ asset('assets/backend/js/pages/tables/jquery-datatable.js') }}"></script>

<!-- Demo Js -->
<script src="{{ asset('assets/backend/js/demo.js') }}"></script>
@endpush