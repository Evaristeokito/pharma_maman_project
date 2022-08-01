$('document').ready(function() {

    var table = $("#table_user").DataTable({
        processing: true,
        serverSide: true,
        order: [],
        ajax: {
            url: "./action/_user_action.php",
            type: "POST",
            data: { action: "fetch" },
        },
        columnDefs: [{
            targets: [0, 1],
            orderable: false,
        }, ],
        responsive: true,
        language: {
            url: "//cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json",
        },
        pageLength: 5,
    });

    function clear_fields() {
        $('#userForm')[0].reset();
        $('#error_user_nom').text('');
        $('#error_user_sexe').text('');
        $('#error_user_role').text('');
        $('#error_user_password').text('');
        $('#error_user_status').text('');
        $('#error_user_img').text('');
    }

    $("#add_button").click(function() {
        $("#button_action").val("Add");
        $("#action").val("Add");
        clear_fields();
    });

    $('#userForm').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: "./action/_user_action.php",
            method: "POST",
            data: new FormData(this),
            dataType: "json",
            contentType: false,
            processData: false,
            beforeSend: function() {
                $("#button_action").val("Validation...");
                $("#button_action").attr("disabled", "disabled");
            },
            success: function(data) {
                $("#button_action").attr("disabled", false);
                $("#button_action").val($("#action").val());
                if (data.success) {
                    iziToast.show({
                        title: "Notification",
                        titleColor: "white",
                        message: "L’Opération  a réussi avec succès",
                        messageColor: "white",
                        backgroundColor: "#009688",
                        timeout: 2000,
                        position: "topRight",
                        progressBar: true,
                        progressBarColor: "#4db6ac",
                    });
                    clear_fields();
                    table.ajax.reload();
                    $("#userModal").iziModal("hide");
                }
                if (data.error) {
                    iziToast.show({
                        title: "Message",
                        titleColor: "white",
                        message: "Les champs suivie de l'asterisques sont obligatoire.",
                        messageColor: "white",
                        backgroundColor: "#c62828",
                        timeout: 4000,
                        position: "topRight",
                        progressBar: true,
                        progressBarColor: "#880e4f",
                    });
                }
            },
        });
    });


    var user_id = '';

    $(document).on('click', '.editer_user', function() {
        user_id = $(this).attr("id");

        console.log(user_id);

        clear_fields();
        $.ajax({
            url: "./action/_user_action.php",
            method: "POST",
            data: { action: "edit_fetch", user_id: user_id },
            dataType: "json",
            success: function(data) {
                $("#user_nom").val(data.nom);
                $("#user_sexe").val(data.sexe);
                $("#user_role").val(data.role);
                $("#user_telephone").val(data.telephone);
                $("#user_email").val(data.email);
                $("#user_status").val(data.status);
                $("#user_id").val(data.user_id);
                $("#button_action").val("Editer");
                $("#action").val("Edit");
                $("#userModal").iziModal("open");
            },
        });
    });

});