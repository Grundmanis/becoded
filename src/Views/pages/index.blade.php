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
                            <a href="{{ route('becoded.users.add') }}" class="btn btn-lg bg-light-blue waves-effect">Add new</a>
                            <a href="{{ route('becoded.users.add') }}" class="btn btn-lg bg-orange waves-effect">Clear database</a>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <ul>
                                    <li>Add new page/route</li>
                                    <li>Edit content of page/route</li>
                                    <li>Delete page/route</li>
                                    <li>Delete not used pages from database</li>
                                </ul>
                                {{--@foreach($routes as $key => $route)--}}
                                    {{--@if ($route->methods[0] == 'GET' && !preg_match('/becoded/',$route->uri))--}}
                                        {{--{{dump($route)}}--}}
                                    {{--@endif--}}
                                {{--@endforeach--}}
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <th>Uri</th>
                                        {{--<th>Middleware</th>--}}
                                        {{--<th>Controller</th>--}}
                                        {{--<th>As</th>--}}
                                        <th>Tag</th>
                                        <th>In menu</th>
                                        <th>Actions</th>
                                    </thead>
                                    <tfoot>
                                        <th>Uri</th>
                                        {{--<th>Middleware</th>--}}
                                        {{--<th>Controller</th>--}}
                                        {{--<th>As</th>--}}
                                        <th>Tag</th>
                                        <th>In menu</th>
                                        <th>Actions</th>
                                    </tfoot>
                                    <tbody>
                                        @foreach($routes as $key => $route)
                                            @if ($route->methods[0] == 'GET' && !preg_match('/becoded/',$route->uri))
                                            <tr data-uri="{{ $route->uri }}" data-as="{{ !empty($route->action['as']) ? $route->action['as'] : ''}}" data-middleware="{{ is_array($route->action['middleware']) ? $route->action['middleware'][0] : $route->action['middleware'] }}" data-controller="{{ !empty($route->action['controller']) ? $route->action['controller'] : '' }}">
                                                <td><a href="/{{ $route->uri }}">{{ $route->uri }}</a></td>
                                                {{--<td>{{ is_array($route->action['middleware']) ? $route->action['middleware'][0] : $route->action['middleware'] }}</td>--}}
                                                {{--<td>{{ !empty($route->action['controller']) ? $route->action['controller'] : '' }}</td>--}}
                                                {{--<td>{{ !empty($route->action['as']) ? $route->action['as'] : ''}}</td>--}}
                                                <td class="text-right">
                                                    <select class="form-control show-tick js-page-change-tag">
                                                        <option value="">-- Please select --</option>
                                                        <option @if (!empty($in_menu[$route->uri]->tag) && $in_menu[$route->uri]->tag == 1) selected @endif value="1">1</option>
                                                        <option @if (!empty($in_menu[$route->uri]->tag) && $in_menu[$route->uri]->tag == 2) selected @endif value="2">2</option>
                                                        <option @if (!empty($in_menu[$route->uri]->tag) && $in_menu[$route->uri]->tag == 3) selected @endif value="3">3</option>
                                                        <option @if (!empty($in_menu[$route->uri]->tag) && $in_menu[$route->uri]->tag == 4) selected @endif value="4">4</option>
                                                        <option @if (!empty($in_menu[$route->uri]->tag) && $in_menu[$route->uri]->tag == 5) selected @endif value="5">5</option>
                                                        <option @if (!empty($in_menu[$route->uri]->tag) && $in_menu[$route->uri]->tag == 6) selected @endif value="6">6</option>
                                                        <option @if (!empty($in_menu[$route->uri]->tag) && $in_menu[$route->uri]->tag == 7) selected @endif value="7">7</option>
                                                        <option @if (!empty($in_menu[$route->uri]->tag) && $in_menu[$route->uri]->tag == 8) selected @endif value="8">8</option>
                                                        <option @if (!empty($in_menu[$route->uri]->tag) && $in_menu[$route->uri]->tag == 9) selected @endif value="9">9</option>
                                                        <option @if (!empty($in_menu[$route->uri]->tag) && $in_menu[$route->uri]->tag == 10) selected @endif value="10">10</option>
                                                    </select>
                                                </td>
                                                <td class="text-center">
                                                    <input @if (!empty($in_menu[$route->uri]) && $in_menu[$route->uri]->in_menu) checked @endif type="checkbox" id="md_checkbox_<?= $key; ?>" class="filled-in chk-col-purple js-page-in-menu" />
                                                    <label for="md_checkbox_<?= $key; ?>"></label>
                                                </td>
                                                <td>
                                                    <a href="{{ route('becoded.pages') }}" class="btn bg-deep-purple waves-effect">
                                                        <i class="material-icons">mode_edit</i>
                                                    </a>
                                                    <a href="{{ route('becoded.pages') }}" class="btn bg-red waves-effect">
                                                        <i class="material-icons">delete</i>
                                                    </a>
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
    <script src="{{ asset('vendor/becoded/js/pages.js') }}"></script>
@endsection

@section('styles')
    <link href="{{ asset('vendor/becoded/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet">
@endsection