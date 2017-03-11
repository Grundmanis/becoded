@extends('becoded_view::master')

@section('head_title')
    Pages
@endsection

@section('content')
    <div class="block-header">

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Pages
                        </h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <th>Uri</th>
                                        <th>Middleware</th>
                                        <th>Controller</th>
                                        <th>As</th>
                                        <th>Tag</th>
                                        <th>In menu</th>
                                    </thead>
                                    <tfoot>
                                        <th>Uri</th>
                                        <th>Middleware</th>
                                        <th>Controller</th>
                                        <th>As</th>
                                        <th>Tag</th>
                                        <th>In menu</th>
                                    </tfoot>
                                    <tbody>
                                        @foreach($routes as $key => $route)
                                            @if ($route->methods[0] == 'GET' && !preg_match('/becoded/',$route->uri))
                                            <tr>
                                                <td>{{ $route->uri }}</td>
                                                <td>{{ is_array($route->action['middleware']) ? $route->action['middleware'][0] : $route->action['middleware'] }}</td>
                                                <td>{{ !empty($route->action['controller']) ? $route->action['controller'] : '' }}</td>
                                                <td>{{ !empty($route->action['as']) ? $route->action['as'] : ''}}</td>
                                                <td class="text-right">
                                                    <select class="form-control show-tick">
                                                    <option value="">-- Please select --</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    </select>
                                                </td>
                                                <td class="text-right">
                                                    <input type="checkbox" id="md_checkbox_<?= $key; ?>" class="filled-in chk-col-purple" />
                                                    <label for="md_checkbox_<?= $key; ?>"></label>
                                                </td>
                                            </tr>
                                            @endif
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
@endsection

@section('scripts')

        <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('vendor/becoded/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('vendor/becoded/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('vendor/becoded/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendor/becoded/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('vendor/becoded/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
    <script src="{{ asset('vendor/becoded/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
    <script src="{{ asset('vendor/becoded/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{ asset('vendor/becoded/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendor/becoded/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>
    <script src="{{ asset('vendor/becoded/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{ asset('vendor/becoded/js/admin.js') }}"></script>
    <script src="{{ asset('vendor/becoded/js/pages/tables/jquery-datatable.js') }}"></script>
    <script src="{{ asset('vendor/becoded/plugins/bootstrap-notify/bootstrap-notify.js') }}"></script>

    <!-- Demo Js -->
    <script src="{{ asset('vendor/becoded/js/demo.js') }}"></script>
@endsection

@section('styles')
    <link href="{{ asset('vendor/becoded/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet">
@endsection