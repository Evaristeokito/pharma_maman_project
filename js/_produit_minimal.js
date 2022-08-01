$(document).ready(function() {
    var table = $("#table_reap").DataTable({
        processing: true,
        serverSide: false,
        responsive: true,
    });



    $("#formstock").on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: "./action/_produit_reap_action.php",
            method: "POST",
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function() {
                $("#button_edit").attr('disabled', 'disabled');
                $("#button_edit").val('validation...');
            },
            success: function(data) {
                $("#button_edit").attr('disabled', false);
                $("#button_edit").val($('action').val());

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
                    table.ajax.reload();
                }

                if (data.error) {
                    iziToast.show({
                        title: "Erreur",
                        titleColor: "white",
                        message: "L’Opération n'a pas reussi",
                        messageColor: "white",
                        backgroundColor: "#009688",
                        timeout: 2000,
                        position: "topRight",
                        progressBar: true,
                        progressBarColor: "#4db6ac",
                    });
                }
            }
        });
    });

    var produit_id = '';

    $(document).on("click", ".reap", function() {
        produit_id = $(this).attr('id');
        console.log(produit_id);
        $.ajax({
            url: "./action/_produit_reap_action.php",
            method: "POST",
            data: { action: "Edit_fetch", produit_id: produit_id },
            dataType: "json",
            success: function(data) {
                $('#produit').val(data.designation);
                $('#stock').val(data.stock);
                $('#alert').val(data.alert);
                $('#stock_max').val(data.stock_max);
                $('#unite').val(data.unite);
                $("#stockModal").iziModal("open");
            }
        });

    });


})