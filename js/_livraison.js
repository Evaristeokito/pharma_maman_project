$(document).ready(function() {

    var table = $("#tab_livraison").DataTable({
        processing: true,
        serverSide: true,
        order: [],
        ajax: {
            url: "./action/_livraison_action.php",
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
        pageLength: 3,
    });

    $('#action').val('Add');
    $('#button_action').val('Enregistrer');

    function clear_field() {
        $('#form_livraison')[0].reset();
    }

    $("#form_livraison").on("submit", function(e) {
        e.preventDefault();
        $.ajax({
            url: "./action/_livraison_action.php",
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
                        title: "Notification",
                        titleColor: "white",
                        message: "L’erreur lors d'insertion...",
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

    var livraison_id = '';
    $(document).on("click", ".btn_editer", function() {
        livraison_id = $(this).attr("id");
        console.log(livraison_id);
        $.ajax({
            url: "./action/_livraison_action.php",
            method: "POST",
            data: { action: "fetch_edit", livraison_id: livraison_id },
            dataType: "json",

            success: function(data) {
                $("#bon_livraison").val(data.bon_livraison);
                $("#date_livraison").val(data.date_livraison);
                $("#fournisseur").val(data.fournisseur);
                $("#livraison_id").val(data.livraison_id);
                $('#button_action').val('Editer');
                $("#action").val("Edit");
            },
        });
    });
})