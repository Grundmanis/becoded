@extends('becoded_view::master')

@section('head_title')
    Users
@endsection

@section('content')
    <div class="block-header">

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <form method="post" class="card">
                    <div class="header">
                        <h2>
                            New user creating
                            <button type="submit" class="btn btn-lg bg-green waves-effect pull-right">Add user</button>
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="body">

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input id="email" autocomplete="off" type="email" name="email" class="form-control">
                                <label for="email" class="form-label">E-mail</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input id="password" autocomplete="off" type="password" name="password" class="form-control">
                                <label for="password" class="form-label">Password</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input id="name" autocomplete="off" type="text" name="name" class="form-control">
                                <label for="name" class="form-label">First name</label>
                            </div>
                        </div>

                        <div>
                            <br>
                            <button type="submit" class="btn btn-lg bg-green waves-effect pull-right">Add user</button>
                            <div class="clearfix"></div>
                        </div>

                        {{ csrf_field() }}
                    </div>
                </form>
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

    <!-- Custom Js -->
    <script src="{{ asset('vendor/becoded/js/admin.js') }}"></script>
    <script src="{{ asset('vendor/becoded/js/pages/tables/jquery-datatable.js') }}"></script>
    <script src="{{ asset('vendor/becoded/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
    <script src="{{ asset('vendor/becoded/plugins/bootstrap-notify/bootstrap-notify.js') }}"></script>

    <!-- Demo Js -->
    <script src="{{ asset('vendor/becoded/js/demo.js') }}"></script>
@endsection