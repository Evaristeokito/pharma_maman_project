$(document).ready(function() {

    var table = $("#table_format").DataTable({
        processing: true,
        serverSide: true,
        order: [],
        ajax: {
            url: "./action/_format_action.php",
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
        $("#form_format")[0].reset();
    }

    $("#add_button").click(function() {
        $("#button_action").val("Add");
        $("#action").val("Add");
        clear_field();
    });


    $('#form_format').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: "./action/_format_action.php",
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

    var format_id = "";

    $(document).on("click", ".editer_format", function() {
        format_id = $(this).attr("id");
        clear_field();
        $.ajax({
            url: "./action/_format_action.php",
            method: "POST",
            data: { action: "edit_fetch", format_id: format_id },
            dataType: "json",
            success: function(data) {
                $("#format").val(data.format);
                $("#description").val(data.description);
                $("#format_id").val(data.format_id);
                $("#button_action").val("Editer");
                $("#action").val("Edit");
                $("#formatModal").iziModal("open");
            },
        });
    });

    $(document).on("click", ".deleter_format", function() {
        format_id = $(this).attr('id');
        $('#deleteFormat').iziModal('open');
    });

    $('#ok_button').click(function() {
        $.ajax({
            url: "./action/_format_action.php",
            method: "POST",
            data: { action: 'delete', format_id: format_id },
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
                table.ajax.reload();
                $('#deleteFormat').iziModal('close');
            }
        })
    })
});