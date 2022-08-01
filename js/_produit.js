$(document).ready(function() {

    var table = $("#table_produit").DataTable({
        processing: true,
        serverSide: true,
        order: [],
        ajax: {
            url: "./action/_produit_action.php",
            type: "POST",
            data: { action: "fetch" },
        },
        columnDefs: [{
            targets: [],
            orderable: false,
        }, ],
        responsive: true,
        pageLength: 5,
        language: {
            url: "//cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json",
        },
    });

    function clear_field() {
        $('#formProduit')[0].reset();
        $('#error_reference').text('');
        $("#error_designation").text("");
        $("#error_qte").text("");
        $("#error_status").text("");
        $("#error_emplacement").text("");
        $("#error_famille").text("");
        $("#error_format").text("");
        $("#error_date_expiration").text("");
        $("#error_unite").text("");
        $("#error_stock_max").text("");
        $("#error_alert").text("");
    }

    $('#annuler').on('click', function() {
        clear_field();
        $("#button_action").attr("disabled", false);
    });


    $('#qte').blur(function() {
        this.value = parseFloat(this.value).toFixed(2);
    })

    $("#alert").blur(function() {
        this.value = parseFloat(this.value).toFixed(2);
    });

    // $("#formProduit").validate({
    //     rules: {
    //         designation: {
    //             required: true,
    //             minlength: 3,
    //         },
    //         reference: {
    //             required: true,
    //             minlength: 5,
    //         },
    //         format: {
    //             required: true,
    //         },
    //     },
    //     messages: {
    //         designation: {
    //             required: "la designation est requise",
    //             minlength: "Le nomre minimal est de 3 caracteres",
    //         },
    //         reference: {
    //             required: "La reference est obligatoire",
    //             minlength: "la longueur est de 5 caracteres",
    //         },
    //         format: "Le format est requis",
    //     },
    //     errorElement: "span",
    //     errorPlacement: function(error, element) {
    //         error.addClass("invalid-feedback");
    //         element.closest(".form-group").append(error);
    //     },
    //     highlight: function(element, errorClass, validClass) {
    //         $(element).addClass("is-invalid");
    //     },
    //     unhighlight: function(element, errorClass, validClass) {
    //         $(element).removeClass("is-invalid");
    //     },
    // });

    $('#button_action').val('Enregistrer');
    $('#action').val('Add');

    $("#formProduit").on("submit", function(event) {
        event.preventDefault();
        $.ajax({
            url: "./action/_produit_action.php",
            method: "POST",
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function() {
                $("#button_action").val("validation...");
                $("#button_action").attr("disabled", "disabled");
            },
            success: function(data) {
                $("#button_action").attr("disabled", false);
                $("#button_action").val('Enregistrer');

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

                    if (data.error_reference != '') {
                        $('#error_reference').text(data.error_reference);
                    } else {
                        $('#error_reference').text('');
                    }

                    if (data.error_designation != '') {
                        $('#error_designation').text(data.error_designation);
                    } else {
                        $('#error_designation').text('');
                    }

                    if (data.error_format != '') {
                        $('#error_format').text(data.error_format);
                    } else {
                        $('#error_format').text('');
                    }

                    if (data.error_qte != '') {
                        $('#error_qte').text(data.error_qte);
                    } else {
                        $('#error_qte').text('');
                    }

                    if (data.error_famille != '') {
                        $('#error_famille').text(data.error_famille);
                    } else {
                        $('#error_famille').text('');
                    }

                    if (data.error_unite != '') {
                        $("#error_unite").text(data.error_unite);
                    } else {
                        $("#error_unite").text('');
                    }

                    if (data.error_date_expiration != '') {
                        $('#error_date_expiration').text(data.error_date_expiration);
                    } else {
                        $('#error_date_expiration').text('');
                    }

                    if (data.error_emplacement != '') {
                        $('#error_emplacement').text(data.error_emplacement);
                    } else {
                        $('#error_emplacement').text('');
                    }

                    if (data.error_status != '') {
                        $('#error_status').text(data.error_status);
                    } else {
                        $('#error_status').text('');
                    }

                    if (data.error_alert != '') {
                        $('#error_alert').text(data.error_alert);
                    } else {
                        $('#error_alert').text('');
                    }

                    if (data.error_stock_max != '') {
                        $('#error_stock_max').text(data.error_stock_max);
                    } else {
                        $('#error_stock_max').text('');
                    }
                }
            },
        });
    });

    var produit_id = "";

    $(document).on("click", ".view_produit", function() {
        produit_id = $(this).attr("id");
        $.ajax({
            url: "./action/_produit_action.php",
            method: "POST",
            data: { action: "single_fetch", produit_id: produit_id },
            success: function(data) {
                $("#viewProduit").iziModal("open");
                $("#produit_detail").html(data);
            },
        });
    });

    $(document).on('click', '.editer_produit', function() {
        produit_id = $(this).attr('id');
        $.ajax({
            url: "./action/_produit_action.php",
            method: "POST",
            data: { action: "edit_fetch", produit_id: produit_id },
            dataType: "json",
            success: function(data) {
                $("#designation").val(data.designation);
                $("#reference").val(data.reference);
                $("#qte").val(data.stock);
                $("#unite").val(data.unite);
                $("#alert").val(data.alert);
                $("#date_expiration").val(data.dateexpiration);
                $("#emplacement").val(data.emplacement);
                $("#fabricant").val(data.fabricant);
                $('#format').val(data.idformat);
                $('#famille').val(data.idfamille);
                $('#produit_id').val(data.produit_id);
                $("#button_action").val("Editer");
                $("#action").val("Edit");
                $("#produitModal").iziModal("open");
            },
        });

    });

    $(document).on("click", ".deleteProduit", function() {
        produit_id = $(this).attr("id");
        $("#deleteProduit").iziModal("open");
    });

    $("#ok_button").click(function() {
        $.ajax({
            url: "./action/_produit_action.php",
            method: "POST",
            data: { produit_id: produit_id, action: "delete" },
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
                $("#deleteProduit").iziModal("close");
                table.ajax.reload();
            },
        });
    });

    $("#annuler").click(function() {
        $("#deleteProduit").iziModal("close");
    });
})