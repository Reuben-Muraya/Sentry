@extends('layouts.backend.app')

@section('title', 'Dashboard')

@push('css')
<link href="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}"
      rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>DASHBOARD</h2>
        </div>
        <div class="row clearfix">
            <a href="{{ route('client.index') }}">
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="info-box-3 bg-green hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">people</i>
                        </div>
                        <div class="content">
                            <div class="text">ACTIVE CLIENTS</div>
                            <div class="number">{{ $active_clients }}</div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('client.status') }}">
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="info-box-3 bg-deep-orange hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">people</i>
                        </div>
                        <div class="content">
                            <div class="text">INACTIVE CLIENTS</div>
                            <div class="number">{{ $inactive_clients }}</div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('client.poc') }}">
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="info-box-3 bg-purple hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">people</i>
                        </div>
                        <div class="content">
                            <div class="text">CLIENTS ON DEMO</div>
                            <div class="number">{{ $poc }}</div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('client.deactivate') }}">
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="info-box-3 bg-red hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">people</i>
                        </div>
                        <div class="content">
                            <div class="text">DEACTIVATED CLIENTS</div>
                            <div class="number">{{ $deactivated_clients }}</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="row clearfix">
            <a href="{{ route('device.index') }}">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                 <div class="info-box-3 bg-teal hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">phone_android</i>
                    </div>
                    <div class="content">
                        <div class="text">ACTIVE DEVICES</div>
                        <div class="number">{{ $active_devices }}</div>
                    </div>
                 </div>
                </div>
            </a>
            <a href="{{ route('device.status') }}">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                 <div class="info-box-3 bg-red hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">phone_android</i>
                    </div>
                    <div class="content">
                        <div class="text">INACTIVE DEVICES</div>
                        <div class="number">{{ $inactive_devices }}</div>
                    </div>
                 </div>
                </div>
            </a>
            <a href="{{ route('device.lost') }}">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                 <div class="info-box-3 bg-black hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">phone_android</i>
                    </div>
                    <div class="content">
                        <div class="text">LOST DEVICES</div>
                        <div class="number">{{ $lost_devices }}</div>
                    </div>
                 </div>
                </div>
            </a>
            <a href="{{ route('contact.index') }}">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                 <div class="info-box-3 bg-blue-grey hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">contacts</i>
                    </div>
                    <div class="content">
                        <div class="text">CONTACTS</div>
                        <div class="number">{{ $contacts->count() }}</div>
                    </div>
                 </div>
                </div>
            </a>
            <a href="{{ route('product.index') }}">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                 <div class="info-box-3 bg-brown hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">view_headline</i>
                    </div>
                    <div class="content">
                        <div class="text">PRODUCTS</div>
                        <div class="number">{{ $product_count->count() }}</div>
                    </div>
                 </div>
                </div>
            </a>
            <a href="{{ route('client.dormant') }}">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                 <div class="info-box-3 bg-orange hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">people</i>
                    </div>
                    <div class="content">
                        <div class="text">Dormant Clients</div>
                        <div class="number">{{ $dormant }}</div>
                    </div>
                 </div>
                </div>
            </a>
            <a href="{{ route('client.unconverted_poc') }}">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                 <div class="info-box-3 bg-indigo hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">people</i>
                    </div>
                    <div class="content">
                        <div class="text">Unconverted POC's</div>
                        <div class="number">{{ $unconverted_poc }}</div>
                    </div>
                 </div>
                </div>
            </a>
        </div>
        {{--<div class="row clearfix">--}}
            {{--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">--}}
                {{--<div class="card">--}}
                    {{--<div class="header">--}}
                        {{--<h2>--}}
                            {{--RECENT CLIENT LIST--}}
                            {{--<span class="badge bg-blue">{{ $recent_clients->count() }}</span>--}}
                        {{--</h2>--}}
                    {{--</div>--}}
                {{--<div class="body">--}}
            {{--<div class="table-responsive">--}}
                {{--<table class="table table-bordered table-striped table-hover dataTable js-exportable">--}}
                    {{--<thead>--}}
                    {{--<tr>--}}
                        {{--<th>ID</th>--}}
                        {{--<th>Name</th>--}}
                        {{--<th>Products</th>--}}
                        {{--<th>Devices</th>--}}
                        {{--<th>Status</th>--}}
                        {{--<th>Action</th>--}}
                    {{--</tr>--}}
                    {{--</thead>--}}
                    {{--<tbody>--}}
                    {{--@foreach($recent_clients as $key=>$client)--}}
                        {{--<tr>--}}
                            {{--<td>{{ $key + 1 }}</td>--}}
                            {{--<td>{{ $client->name }}</td>--}}
                            {{--<td>{{ $client->products->count() }}</td>--}}
                            {{--<td>{{ $client->devices->count() }}</td>--}}
                            {{--<td>--}}
                                {{--@if($client->status == 1)--}}
                                    {{--<span class="badge bg-green">Active</span>--}}
                                {{--@elseif($client->status == 0)--}}
                                    {{--<span class="badge bg-deep-orange">Inactive</span>--}}
                                {{--@elseif($client->status == 2)--}}
                                    {{--<span class="badge bg-purple">POC</span>--}}
                                {{--@elseif($client->status == 3)--}}
                                    {{--<span class="badge bg-red">Deactivated</span>--}}
                                {{--@endif--}}
                            {{--</td>--}}
                            {{--<td class="text-center">--}}
                                {{--<a href="{{ route('client.show',$client->id) }}"--}}
                                   {{--class="btn btn-success waves-effect">--}}
                                    {{--<i class="material-icons sm">visibility</i>--}}
                                {{--</a>--}}
                                {{--<a href="{{ route('client.edit',$client->id) }}"--}}
                                   {{--class="btn btn-info waves-effect">--}}
                                    {{--<i class="material-icons sm">edit</i>--}}
                                {{--</a>--}}
                            {{--</td>--}}
                        {{--</tr>--}}
                    {{--@endforeach--}}
                    {{--</tbody>--}}
                {{--</table>--}}
            {{--</div>--}}
        {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

        <div class="row-clearfix">
            <!-- Donut Chart -->
            {{-- <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>DONUT CHART</h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div id="donut_chart" class="graph"></div>
                    </div>
                </div>
            </div> --}}
            <!-- #END# Donut Chart -->
        </div>

    </div>
@endsection

@push('js')
<!-- Jquery CountTo Plugin Js -->
<script src="{{ asset('assets/backend/plugins/jquery-countto/jquery.countTo.js') }}"></script>

<!-- Morris Plugin Js -->
<script src="{{ asset('assets/backend/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/morrisjs/morris.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/chartjs/Chart.bundle.js') }}"></script>

<!-- ChartJs -->
<script src="{{ asset('assets/backend/plugins/chartjs/Chart.bundle.js') }}"></script>

<!-- Flot Charts Plugin Js -->
<script src="{{ asset('assets/backend/plugins/flot-charts/jquery.flot.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/flot-charts/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/flot-charts/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/flot-charts/jquery.flot.categories.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/flot-charts/jquery.flot.time.js') }}"></script>

<!-- Sparkline Chart Plugin Js -->
<script src="{{ asset('assets/backend/plugins/jquery-sparkline/jquery.sparkline.js') }}"></script>

<script src="{{ asset('assets/backend/js/pages/index.js') }}"></script>

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
<script src="{{ asset('assets/backend/js/pages/charts/morris.js') }}"></script>
<script>
    Morris.Donut({
        element: element,
        data: [],
        colors: ['rgb(233, 30, 99)', 'rgb(0, 188, 212)', 'rgb(255, 152, 0)', 'rgb(0, 150, 136)'],
        formatter: function (y) {
            return y + '%'
        }
    });
</script>
@endpush