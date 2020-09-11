@extends('layouts.backend.app')

@section('title', 'Client')

@push('css')
<link href="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}"
      rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">
        <a href="{{ URL::previous() }}" class="btn btn-danger waves-effect">BACK</a>
        <br>
        <br>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h4>
                            POC Client List
                            <span class="badge bg-blue">{{ $clients->count() }}</span>
                        </h4>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email Address</th>
                                    <th>Description</th>
                                    <th>Products</th>
                                    <th>Status</th>
                                    <th>Sites</th>
                                    <th>Devices</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($clients as $key=>$client)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $client->name }}</td>
                                        <td>{{ $client->phone }}</td>
                                        <td>{{ $client->email }}</td>
                                        <td>{{ str_limit($client->about, '20') }}</td>
                                        <td>
                                            @foreach($client->products as $product)
                                                <span class="badge bg-teal">{{ $product->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @if($client->status == 1)
                                                <span class="badge bg-green">Active</span>
                                            @elseif($client->status == 0)
                                                <span class="badge bg-deep-orange">Inactive</span>
                                            @elseif($client->status == 2)
                                                <span class="badge bg-purple">POC</span>
                                            @elseif($client->status == 3)
                                                <span class="badge bg-deep-red">Deactivated</span>
                                            @endif
                                        </td>
                                        <td><span class="badge bg-blue">{{ $client->sites->count() }}</span></td>
                                        <td><span class="badge bg-blue-grey">{{ $client->devices->count() }}</span></td>
                                        <td>{{ \Carbon\Carbon::parse($client->created_at)->format('d/m/Y H:i:s') }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('client.show',$client->id) }}"
                                               class="btn btn-success waves-effect">
                                                <i class="material-icons sm">visibility</i>
                                            </a>
                                            <a href="{{ route('client.edit',$client->id) }}"
                                               class="btn btn-info waves-effect">
                                                <i class="material-icons sm">edit</i>
                                            </a>
                                            <button class="btn btn-danger waves-effect" type="button"
                                                    onclick="deleteClient({{ $client->id }})">
                                                <i class="material-icons">delete</i>
                                            </button>
                                            <form id="delete-form-{{ $client->id }}"
                                                  action="{{ route('client.destroy',$client->id) }}" method="POST"
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
            //         confirmButtonText: 'Yes, delete it!',
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

            function deleteClient(id) {
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