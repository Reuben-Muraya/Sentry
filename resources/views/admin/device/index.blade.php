@extends('layouts.backend.app')

@section('title', 'Devices')

@push('css')
<link href="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}"
      rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <a class="btn bg-blue waves-effect" href="{{ route('device.create') }}">
                <i class="material-icons">add</i>
                <span>Add New Device</span>
            </a>
            <a class="btn bg-red waves-effect" href="{{ route('device.status') }}">
                <i class="material-icons">report</i>
                <span>Inactive Devices</span>
            </a>
            <a class="btn bg-black waves-effect" href="{{ route('device.lost') }}">
                <i class="material-icons">perm_device_information</i>
                <span>Lost Devices</span>
            </a>
        </div>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h4>
                            Active Device List 
                            <span class="badge bg-blue">{{ $devices->count() }}</span>
                        </h4>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="deviceTable">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>IMEI No.</th>
                                    <th>Phone</th>
                                    <th>Client</th>
                                    <th>Site</th>
                                    <th>Product</th>
                                    <th>Status</th>
                                    <th>Model</th>
                                    <th>Simcard</th>
                                    <th>Sentry</th>
                                    <th>Date To Data Renewal</th>
                                    <th>Days to Renewal</th>
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
                                            <span class="badge bg-">
                                                @foreach($device->sites as $site)
                                                    {{ $site->name }}
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
                                            @if($device->status == true)
                                                <span class="badge bg-green">Active</span>
                                            @else
                                                <span class="badge bg-red">Inactive</span>
                                            @endif
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
                                        <td>{{ \Carbon\Carbon::parse($device->date_to_renewal)->format('m/d/Y') }}</td>
                                        <td></td>
                                        <td class="text-center">
                                            <a href="{{ route('device.show',$device->id) }}"
                                               class="btn btn-success" style="padding: 2px 3px;">
                                                <i class="material-icons">visibility</i>
                                            </a>
                                            <a href="{{ route('device.edit',$device->id) }}"
                                                      class="btn btn-info" style="padding: 2px 3px;">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <p-button class="btn btn-danger" type="submit" style="padding: 2px 3px;" onclick="deleteDevice({{ $device->id }})">
                                                <i  class="material-icons" [ngClass]="{'active': pinned}">delete</i>
                                              </p-button>
                                              <form id="delete-form-{{ $device->id }}" action="{{ route('device.destroy',$device->id) }}" method="POST" style="display: none;">
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
            function deleteDevice(id) {
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
       
        var table = document.getElementById("deviceTable");
            
            var x = setInterval(
                function () {
            
                    for (var i = 1, row; row = table.rows[i]; i++) {
                        //iterate through rows
                        //rows would be accessed using the "row" variable assigned in the for loop
            
                        var endDate = row.cells[11];
                        countDownDate = new Date(endDate.innerHTML.replace(/-/g, "/")).getTime();
                        var countDown = row.cells[12];
                        // Update the count down every 1 second
            
                        // Get todays date and time
                        var now = new Date().getTime();
            
                        // Find the distance between now an the count down date
                        var distance = countDownDate - now;
            
                        // Time calculations for days, hours, minutes and seconds
                        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            
            
                        // Display the result in the element
                        countDown.innerHTML = (days + " Days");
            
                        //If the count down is finished, write some text 
                        if (distance < 7) {
                            // countDown.innerHTML = "";
                            clearInterval(x);
                            countDown.style.color = "red";
                        }
                    }
                }, 1000);
        </script>
             
    @endpush