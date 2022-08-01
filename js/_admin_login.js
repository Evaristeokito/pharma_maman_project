$(document).ready(function() {

    $(".loading-spinner").hide();

    $('#admin_login_form').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: "./action/_check_admin_login.php",
            method: "POST",
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function() {
                $('#admin_login').val('validation...');
                $(".loading-spinner").show();
                $('#admin_login').attr('disabled', 'disabled');
            },
            success: function(data) {
                if (data.success) {
                    location.href = "http://pharma.test/";
                }
                if (data.error) {
                    $('#admin_login').val('connexion');
                    setTimeout(() => {
                        $(".loading-spinner").hide()
                    }, 4000);
                    $('#admin_login').attr('disabled', false);

                    iziToast.show({
                        title: "Erreur :",
                        titleColor: "white",
                        message: "Le nom administrateur ou Mot de passe incorrect",
                        messageColor: "white",
                        backgroundColor: "#ba000d",
                        timeout: 4000,
                        position: "topRight",
                        progressBar: true,
                        progressBarColor: "#f44336",
                    });
                }
            }
        });
    });
});