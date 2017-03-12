@extends('becoded_view::master')

@section('head_title')
    Pages
@endsection

@section('content')
    <div class="block-header">

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <form id="form_validation" method="post" class="card">
                    <div class="header">
                        <h2>
                            New page creating
                            <button type="submit" class="btn btn-lg bg-green waves-effect pull-right">Add page</button>
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="body">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <label for="tinymce" class="form-label">Text</label>
                                     <textarea name="text" id="tinymce"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="uri" autocomplete="off" type="text" name="uri" class="form-control" required>
                                        <label for="uri" class="form-label">Uri *</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="title" autocomplete="off" type="text" name="title" class="form-control">
                                        <label for="title" class="form-label">Title</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea id="excerpt" name="excerpt" rows="5" class="form-control no-resize"></textarea>
                                        <label for="excerpt" class="form-label">Excerpt</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <input name="active" type="checkbox" id="active_checkbox" class="filled-in chk-col-purple" />
                                    <label for="active_checkbox">Active</label>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6">

                                <div class="form-group form-float">
                                    <label for="pid" class="form-label">Parent</label>
                                    <select name="pid" id="pid" class="form-control show-tick">
                                        <option value="">-- Select --</option>
                                        <option value="1">/</option>
                                        <option value="2">Login</option>
                                        <option value="2">Register</option>
                                    </select>
                                </div>

                                <div class="form-group form-float">
                                    <label for="template" class="form-label">Template *</label>
                                    <select id="template" name="template" class="form-control show-tick" required>
                                        <option value="">-- Select --</option>
                                        <option value="1">blank</option>
                                        <option value="2">blog</option>
                                        <option value="3">news</option>
                                    </select>
                                </div>

                                <div class="form-group form-float">
                                    <label for="tag" class="form-label">Tag</label>
                                    <select name="tag" id="tag" class="form-control show-tick">
                                        <option value="">-- Select --</option>
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
                                </div>
                                <div class="form-group form-float">
                                    <input name="in_menu" type="checkbox" id="in_menu_checkbox" class="filled-in chk-col-purple" />
                                    <label for="in_menu_checkbox">In menu</label>
                                </div>

                            </div>
                        </div>

                        <div>
                            <br>
                            <button type="submit" class="btn btn-lg bg-green waves-effect pull-right">Add page</button>
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
    <script src="{{ asset('vendor/becoded/plugins/jquery-validation/jquery.validate.js') }}"></script>

    <!-- TinyMCE -->
    <script src="{{ asset('vendor/becoded/plugins/tinymce/tinymce.js') }}"></script>

    <!-- Demo Js -->
    <script src="{{ asset('vendor/becoded/js/demo.js') }}"></script>
    <script src="{{ asset('vendor/becoded/js/pages/forms/form-validation.js') }}"></script>

    <script>
        //TinyMCE
        tinymce.init({
            selector: "textarea#tinymce",
            theme: "modern",
            height: 300,
            plugins: [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools'
            ],
            toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            toolbar2: 'print preview media | forecolor backcolor emoticons',
            image_advtab: true
        });
        tinymce.suffix = ".min";
        tinyMCE.baseURL = '/vendor/becoded/plugins/tinymce';
    </script>

@endsection

@section('styles')
    <link href="{{ asset('vendor/becoded/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet">
@endsection