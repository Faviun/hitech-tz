$(document).ready(function () {
    $("#phoneForm").submit(function (e) {
        e.preventDefault();

        let phone = $("#phone").val();

        $.ajax({
            url: "validate_phone.php",
            method: "POST",
            data: {phone: phone},
            dataType: "html",
            success: function (response) {
                $("#response").html(response);
            },
            error: function () {
                $("#response").html(
                    '<p class="error">Возникла неожиданная ошибка. Попробуйте еще раз.</p>'
                );
            },
        });
    });
});
