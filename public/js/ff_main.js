$(document).ready(function () {
    paneActivate();

    var ARR = ['jpg', 'pic-on-page'];

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        paneActivate()
    });

    $('.row_pin input').on('change', function () {
        if ($(this).is(':checked')) {
            $(this).parent().parent().parent().addClass('row-checked');
        } else {
            $(this).parent().parent().parent().removeClass('row-checked');
        }
    });

    $.each(ARR, function (key, el) {
        $('tr[data-ext="' + el + '"]').find('.row_pin input').each(function(){
            $(this).attr('checked', 'checked').change();
        });
    });

});


function paneActivate() {
    var Tbl = $('.session-pane.active .content-pane.active table');
    if (!Tbl.hasClass('dataTable')) {
        Tbl.DataTable({
            paging: false,
            scrollY: 300,
            scrollX: false,
            autoWidth: false,
            ordering: false,
            searching: false
        });
    }
}

