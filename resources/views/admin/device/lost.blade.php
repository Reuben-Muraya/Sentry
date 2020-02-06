@extends('layouts.backend.app')

@section('title', 'Devices')

@push('css')
<link href="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}"
      rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">
        <a href="{{ route('device.index') }}" class="btn btn-danger waves-effect">BACK</a>
        <br>
        <br>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            DEVICE LIST
                            <span class="badge bg-blue">{{ $devices->count() }}</span>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>IMEI No.</th>
                                    <th>Phone</th>
                                    <th>Client</th>
                                    <th>Product</th>
                                    <th>Model</th>
                                    <th>Simcard</th>
                                    <th>Sentry</th>
                                    <th>Color</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($devices as $key=>$device)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $device->name }}</td>
                                        <td>{{ $device->imei }}</td>
                                        <td>{{ $device->phone }}</td>
                                        <td>
                                            <span class="badge bg-indigo">
                                                @foreach($device->clients as $client)
                                                    {{ $client->name }}
                                                @endforeach
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge bg-teal">
                                                @foreach($device->products as $product)
                                                    {{ $product->name }}
                                                @endforeach
                                            </span>
                                        </td>
                                        <td>
                                            @foreach($device->phones as $phone)
                                                {{ $phone->name }}
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($device->simcards as $simcard)
                                                {{ $simcard->name }}
                                            @endforeach
                                        </td>
                                        <td>{{ $device->sentry_id }}</td>
                                        <td>{{ $device->color }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('device.show',$device->id) }}"
                                               class="btn btn-success waves-effect">
                                                <i class="material-icons sm">visibility</i>
                                            </a>
                                            <a href="{{ route('device.edit',$device->id) }}"
                                                      class="btn btn-info waves-effect">
                                                <i class="material-icons sm">edit</i>
                                            </a>
                                            <button class="btn btn-danger waves-effect" type="button"
                                                    onclick="deleteDevice({{ $device->id }})">
                                                <i class="material-icons">delete</i>
                                            </button>
                                            <form id="delete-form-{{ $device->id }}"
                                                  action="{{ route('device.destroy',$device->id) }}" method="POST"
                                                  style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
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
        <!-- #END# Exportable Table -->
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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.17.4/dist/sweetalert2.all.min.js"></script>
        <script type="text/javascript">
            function deleteDevice(id) {
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success' ,
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        event.preventDefault();
                        document.getElementById('delete-form-'+id).submit();
                    } else if (
                            /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            'Cancelled',
                            'Your data is safe',
                            'error'
                        )
                    }
                })
            }
        </script>
    @endpush