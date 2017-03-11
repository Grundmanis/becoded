$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.js-page-in-menu').click(function (e) {
        $.ajax({
           type: 'POST',
            url: '/becoded/pages',
            data: {
                test: 'test'
            },
            success: function (e) {
                console.log(e);
            }
        });
    });
    $('.js-page-change-tag');
});