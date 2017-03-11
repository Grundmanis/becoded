$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.js-page-in-menu').click(function (e) {
        var $this = $(this),
            uri = $this.data('uri'),
            middleware = $this.data('middleware'),
            as = $this.data('as'),
            controller = $this.data('controller');

        $.ajax({
           type: 'POST',
            url: '/becoded/pages',
            data: {
                in_menu: true,
                uri: uri,
                controller: controller,
                middleware: middleware,
                as: as
            },
            success: function (e) {
                console.log(e);
            }
        });
    });
    $('.js-page-change-tag').click(function (e) {
        $.ajax({
            type: 'POST',
            url: '/becoded/pages',
            data: {
                change_tag: true,
                tag: 1
            },
            success: function (e) {
                console.log(e);
            }
        });
    });
});