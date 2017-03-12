$(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.js-page-in-menu').click(function (e) {
        var $this = $(this),
            tr = $this.closest('tr'),
            uri = tr.data('uri'),
            type = tr.data('type'),
            middleware = tr.data('middleware'),
            as = tr.data('as'),
            controller = tr.data('controller');

        $.ajax({
           type: 'POST',
            url: '/becoded/pages',
            data: {
                in_menu: true,
                uri: uri,
                type: type,
                controller: controller,
                middleware: middleware,
                as: as
            },
            success: function (e) {
                e = JSON.parse(e);
                console.log(e);
                var type = 'danger';
                if (e.result) {
                    type = 'info';
                }
                $.notify({
                    // options
                    message: e.response
                },{
                    // settings
                    type: type,
                    placement: {
                        from: 'bottom',
                        align: 'right'
                    },
                    animate: {
                        enter: 'animated fadeInUp',
                        exit: 'animated fadeOutDown'
                    }
                });
            }
        });
    });
    $('.js-page-active').click(function (e) {
        var $this = $(this),
            tr = $(this).closest('tr'),
            uri = tr.data('uri'),
            type = tr.data('type'),
            middleware = tr.data('middleware'),
            as = tr.data('as'),
            controller = tr.data('controller'),
            active = $this.is(':checked');

        $.ajax({
           type: 'POST',
            url: '/becoded/pages',
            data: {
                set_active: true,
                uri: uri,
                controller: controller,
                middleware: middleware,
                as: as,
                type: type,
                active: active
            },
            success: function (e) {
                e = JSON.parse(e);
                console.log(e);
                var type = 'danger';
                if (e.result) {
                    type = 'info';
                }
                $.notify({
                    // options
                    message: e.response
                },{
                    // settings
                    type: type,
                    placement: {
                        from: 'bottom',
                        align: 'right'
                    },
                    animate: {
                        enter: 'animated fadeInUp',
                        exit: 'animated fadeOutDown'
                    }
                });
            }
        });
    });
    $('select.js-page-change-tag').on('change',function (e) {
        e.preventDefault();

        var $this = $(this),
            tr = $this.closest('tr'),
            uri = tr.data('uri'),
            type = tr.data('type'),
            middleware = tr.data('middleware'),
            as = tr.data('as'),
            controller = tr.data('controller'),
            tag = $this.val();

        $.ajax({
            type: 'POST',
            url: '/becoded/pages',
            data: {
                change_tag: true,
                tag: tag,
                type: type,
                uri: uri,
                controller: controller,
                middleware: middleware,
                as: as
            },
            success: function (e) {
                e = JSON.parse(e);
                console.log(e);
                var type = 'danger';
                if (e.result) {
                    type = 'info';
                }
                $.notify({
                    // options
                    message: e.response
                },{
                    // settings
                    type: type,
                    placement: {
                        from: 'bottom',
                        align: 'right'
                    },
                    animate: {
                        enter: 'animated fadeInUp',
                        exit: 'animated fadeOutDown'
                    }
                });
            }
        });
    });
});