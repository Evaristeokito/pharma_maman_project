$(document).ready(function() {

    $('#admin_login_form').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: "./action/_check_admin_login.php",
            method: "POST",
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function() {
                $('#admin_login').val('validation...');
                $('#admin_login').attr('disabled', 'disabled');
            },
            success: function(data) {
                if (data.success) {
                    location.href = "http://pharma.test/";
                }
                if (data.error) {
                    $('#admin_login').val('connexion');
                    $('#admin_login').attr('disabled', false);

                    iziToast.show({
                        title: "Notification",
                        titleColor: "white",
                        message: "Le nom administrateur ou mot de passe invalid",
                        messageColor: "white",
                        backgroundColor: "#009688",
                        timeout: 4000,
                        position: "topRight",
                        progressBar: true,
                        progressBarColor: "#4db6ac",
                    });
                }
            }
        });
    });
});