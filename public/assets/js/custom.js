$(function() {
    $('select[selected_value]').each(function() {
        $(this).val($(this).attr("selected_value"));
    });
});