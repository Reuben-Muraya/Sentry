@extends('layouts.backend.app')

@section('title', 'Sites')

@push('css')
<link href="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}"
      rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <a class="btn bg-blue waves-effect" href="{{ route('site.create') }}">
                <i class="material-icons">person_add</i>
                <span>Add New Site</span>
            </a>
            <a class="btn bg-deep-orange waves-effect" href="{{ route('site.status') }}">
                <i class="material-icons">block</i>
                <span>Inactive Sites</span>
            </a>
            <a class="btn bg-purple waves-effect" id="poc" href="{{ route('site.poc') }}">
                <i class="material-icons">add_alert</i>
                <span>Sites on POC</span>
            </a>
            <a class="btn bg-red waves-effect" id="deactivate" href="{{ route('site.deactivate') }}">
                <i class="material-icons">block</i>
                <span>Deactivated Sites</span>
            </a>
            <a class="btn bg-orange waves-effect" id="dormant" href="{{ route('site.dormant') }}">
                <i class="material-icons">watch_later</i>
                <span>Dormant Sites</span>
            </a>
        </div>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h4>
                            Active Client Sites List
                            <span class="badge bg-blue">{{ $sites->count() }}</span>
                        </h4>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Location</th>
                                    <th>Phone</th>
                                    <th>Email Address</th>
                                    <th>Client</th>
                                    <th>Products</th>
                                    <th>Status</th>
                                    <th>Devices</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sites as $key=>$site)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $site->name }}</td>
                                        <td>{{ $site->location }}</td>
                                        <td>{{ $site->phone }}</td>
                                        <td>{{ $site->email }}</td>
                                        <td>
                                            @foreach($site->clients as $client)
                                                <span class="badge bg-indigo">{{ $client->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($site->products as $product)
                                                <span class="badge bg-teal">{{ $product->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @if($site->status == 1)
                                                <span class="badge bg-green">Active</span>
                                            @elseif($site->status == 0)
                                                <span class="badge bg-deep-orange">Inactive</span>
                                            @endif
                                        </td>
                                        <td><span class="badge bg-blue-grey">{{ $site->devices->count() }}</span></td>
                                        <td>{{ \Carbon\Carbon::parse($site->created_at)->format('d/m/Y H:i:s') }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('site.show',$site->id) }}"
                                               class="btn btn-success waves-effect">
                                                <i class="material-icons sm">visibility</i>
                                            </a>
                                            <a href="{{ route('site.edit',$site->id) }}"
                                               class="btn btn-info waves-effect">
                                                <i class="material-icons sm">edit</i>
                                            </a>
                                            <button class="btn btn-danger waves-effect" type="button"
                                                    onclick="deleteSite({{ $site->id }})">
                                                <i class="material-icons">delete</i>
                                            </button>
                                            <form id="delete-form-{{ $site->id }}"
                                                  action="{{ route('site.destroy',$site->id) }}" method="POST"
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
        <script type="text/javascript">
            // function deleteClient(id) {
            //     const swalWithBootstrapButtons = Swal.mixin({
            //         customClass: {
            //             confirmButton: 'btn btn-success' ,
            //             cancelButton: 'btn btn-danger'
            //         },
            //         buttonsStyling: false
            //     })

            //     swalWithBootstrapButtons.fire({
            //         title: 'Are you sure?',
            //         text: "You won't be able to revert this!",
            //         type: 'warning',
            //         showCancelButton: true,
            //         confirmButtonText: 'Yes, delete it!' ,
            //         cancelButtonText: 'No, cancel!',
            //         reverseButtons: true
            //     }).then((result) => {
            //         if (result.value) {
            //             event.preventDefault();
            //             document.getElementById('delete-form-'+id).submit();
            //         } else if (
            //                 /* Read more about handling dismissals below */
            //         result.dismiss === Swal.DismissReason.cancel
            //         ) {
            //             swalWithBootstrapButtons.fire(
            //                 'Cancelled',
            //                 'Your data is safe',
            //                 'error'
            //             )
            //         }
            //     })
            // }

            function deleteSite(id) {
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.value) {
                // event.preventDefault();
                document.getElementById('delete-form-'+id).submit();
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            }
            });
        }
        </script>
    @endpush