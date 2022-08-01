$(document).ready(function() {
    var table = $("#table_famille").DataTable({
        processing: true,
        serverSide: true,
        order: [],
        ajax: {
            url: "./action/_famille_action.php",
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

    function clear_field() {
        $("#formFamille")[0].reset();
    }

    $("#add_button").click(function() {
        $("#button_action").val("Add");
        $("#action").val("Add");
        clear_field();
    });

    $("#formFamille").on("submit", function(event) {
        event.preventDefault();
        $.ajax({
            url: "./action/_famille_action.php",
            data: $(this).serialize(),
            method: "POST",
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
                        message: "Erreur lors de l'ajout de donnees",
                        messageColor: "white",
                        backgroundColor: "#009688",
                        timeout: 4000,
                        position: "topRight",
                        progressBar: true,
                        progressBarColor: "#4db6ac",
                    });
                }
            },
        });
    });


    var famille_id = "";

    $(document).on("click", ".editer_famille", function() {

        famille_id = $(this).attr("id");
        clear_field();
        $.ajax({
            url: "./action/_famille_action.php",
            method: "POST",
            data: { action: "edit_fetch", famille_id: famille_id },
            dataType: "json",
            success: function(data) {
                $("#famille").val(data.famille);
                $("#description").val(data.description);
                $("#famille_id").val(data.famille_id);
                $("#button_action").val("Editer");
                $("#action").val("Edit");
                $("#familleModal").iziModal("open");
            },
        });
    });


    $(document).on('click', '.deleter_famille', function() {
        famille_id = $(this).attr('id');
        $('#deleteFamille').iziModal('open');
    });

    $('#ok_button').click(function() {
        $.ajax({
            url: './action/_famille_action.php',
            method: 'POST',
            data: { action: 'delete', famille_id: famille_id },
            success: function(data) {
                iziToast.show({
                    title: "Suppression :",
                    titleColor: "white",
                    message: "L’Opération du suppression a réussi avec succès",
                    messageColor: "white",
                    backgroundColor: "#e91e63",
                    timeout: 2000,
                    position: "topRight",
                    progressBar: true,
                    progressBarColor: "#d81b60",
                });
                $('#deleteFamille').iziModal('close');
                table.ajax.reload();
            },
        })
    });

    $('#annuler').click(function() {
        $('#deleteFamille').iziModal('close');
    })


});