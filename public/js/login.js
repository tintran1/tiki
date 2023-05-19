$(document).ready(function () {
    $("#register").click(function (e) {
        e.preventDefault();
        var name = $("#name").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var password = $("#password").val();
        $.ajax({
            type: 'POST',
            url: "/register/add",
            data: { 'name': name, 'email': email, 'phone': phone, 'password': password },
            dataType: "json",
            success: function (response) {
                if (response.status == 400) {
                    $('#save_msgList').html("");
                    $('#save_msgList').addClass('alert alert-danger');
                    $.each(response.errors, function (key, err_value) {
                        $('#save_msgList').append('<li>' + err_value + '</li>');
                    });
                } else {
                    $('#save_msgList').html("");
                    $('#save_msgList').addClass('alert alert-success');
                    $('#save_msgList').text(response.message);
                    $('#save_msgList').append();
                }
            }
        });
    });
});
