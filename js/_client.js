$(document).ready(function() {

    var table = $("#table_client").dataTable({
        processing: true,
        serverSide: true,
        order: [],
        ajax: {
            url: "./action/_client_action.php",
            type: "POST",
            data: { action: "fetch" },
        },
        responsive: true,
        columnDefs: [{
            targets: [],
            orderable: false,
        }, ],
    });

    function clear_fields() {
        $("#formClient")[0].reset();
        $("#client_nom").text('');
        $("#client_telephone").text('');
        $("#client_adresse").text('');
        $("#client_email").text('');
        $("#client_type").text('');
    }

    $("#add_button").click(function() {
        $("#action").val("add");
        $("#button_add").val("Enregistrer");
    });

    $('#formClient').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: "./action/_client_action.php",
            method: "POST",
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function() {
                $('#button_add').val('validation...');
                $('#button_add').attr('disabled', 'disabled');
            },
            success: function(data) {
                $("#button_add").val("Enregister");
                $('#button_add').attr('disabled', false);
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
                }
                if (data.error) {
                    iziToast.show({
                        title: "Message",
                        titleColor: "white",
                        message: "Erreur lors de l'ajout de donnees",
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
    })
});