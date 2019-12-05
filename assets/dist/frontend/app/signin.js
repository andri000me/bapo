$("form").submit(function (event) {
    // const form = $(this).serializeArray();

    $("#loaderIcon2").show();
    $("#login-form").hide();
    $("div").remove("#message-alert");

    $.ajax({
        url: "api/login",
        data: {
            username: $("#username").val(),
            password: $("#password").val()
        },
        type: "POST",
        success: function (response) {
            const res = JSON.parse(response);
            if (res.status != "error") {
                $("#message").after('<div id="message-alert" class="alert alert-success text-center" role="alert">' + res.message + '</div>');
                $("#loaderIcon2").hide();

                setTimeout(function () {
                    window.location.replace("/");
                }, 1000);
            } else {
                $("#message").after('<div id="message-alert" class="alert alert-danger text-center" role="alert"><strong>Gagal Masuk!</strong>&nbsp;' + res.message + ' </div>');
                $("#loaderIcon2").hide();
                $("#login-form").show();
            }
        },
        error: function (e) {
            $("#message").after('<div id="message-alert" class="alert alert-danger text-center" role="alert"><strong>Gagal Masuk!</strong>&nbsp;' + e.message + '</div>');
            $("#loaderIcon2").hide();
            $("#login-form").show();
        }
    });

    event.preventDefault();
});
