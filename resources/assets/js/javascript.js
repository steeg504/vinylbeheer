$(document).ready(function () {
    $(".alert").fadeTo(2000, 500).slideUp(500, function () {
        $(".alert").alert('close');
    });


    $(".artistSelect").change(function () {
        $(this).parent('.form-group').clone().insertAfter($(this).parent('.form-group'));
    });

    $("small.remove").click(function () {
        $(this).parent('.form-group').remove();
    });
});