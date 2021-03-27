$(function() {
    $('select[value]').each(function() {
        $(this).val($(this).attr("value"));
    });
});