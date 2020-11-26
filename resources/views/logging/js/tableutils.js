function filterlog(mode) {
    $('.tablealt tr').each(function () {
        var t = $(this).attr('id');

        t = '' + t;
        if(t.split('_')[0] === mode) {
            $('#'+ t).hide();
        } else {
            $('#'+ t).show();
        }
    });
}
