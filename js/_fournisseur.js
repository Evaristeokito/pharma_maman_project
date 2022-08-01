$(document).ready(function() {
    var table = $("#table_fournisseur").DataTable({
        processing: true,
        serverSide: true,
        order: [],
        ajax: {
            url: "./action/_fournisseur_action.php",
            type: "POST",
            data: { action: "fetch" },
        },
        columnDefs: [{
            targets: [],
            orderable: false,
        }, ],
        responsive: true,
        language: {
            url: "//cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json",
        },
        pageLength: 5,
    });

    function clear_field() {
        $("#formFournisseur")[0].reset();
    }

    $('#add_button').click(function() {
        $('#button_action').val('Add');
        $('#action').val('Add');
        clear_field();
    })

    $('#formFournisseur').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: "./action/_fournisseur_action.php",
            method: "POST",
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function() {
                $("#button_action").val("validation...");
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
                    clear_field();
                    table.ajax.reload();
                }
                if (data.error) {
                    iziToast.show({
                        title: "Message",
                        titleColor: "white",
                        message: "L’erreur lors d'insertion",
                        messageColor: "white",
                        backgroundColor: "#009688",
                        timeout: 2000,
                        position: "topRight",
                        progressBar: true,
                        progressBarColor: "#4db6ac",
                    });
                }
            },
        });
    });

    var fournisseur_id = '';

    $(document).on('click', '.editer_fournisseur', function() {
        fournisseur_id = $(this).attr('id');

        $.ajax({
            url: "./action/_fournisseur_action.php",
            method: "POST",
            data: { action: "edit_fetch", fournisseur_id: fournisseur_id },
            dataType: "json",

            success: function(data) {
                $('#nom').val(data.nom);
                $("#ville").val(data.ville);
                $("#adresse").val(data.adresse);
                $('#telephone').val(data.telephone);
                $('#email').val(data.email);
                $('#fournisseur_id').val(data.fournisseur_id);
                $('#button_action').val('Editer');
                $('#action').val('Edit');
                $("#fournisseurModal").iziModal("open");
            }
        });

    });

    $(document).on("click", ".delete_fournisseur", function() {
        fournisseur_id = $(this).attr('id');
        $("#deleteFournisseur").iziModal("open");
    });

    $('#ok_button').click(function() {
        $.ajax({
            url: "./action/_fournisseur_action",
            method: "POST",
            data: { action: 'delete', fournisseur_id: fournisseur_id },
            success: function(data) {

            }
        })
    });

    $('#annuler').click(function() {
        $('#deleteFournisseur').iziModal('close');
    })

})