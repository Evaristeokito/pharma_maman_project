$(document).ready(function() {
    $("#commande_table").DataTable({
        processing: true,
        serverSide: true,
        order: [],
        ajax: {
            url: "./action/_commande_action.php",
            type: "POST",
            data: { action: "fetch" },
        },
        columnDefs: [{
            targets: [0, 1, 2, 3],
            orderable: false,
        }, ],
    });

    $("#span_product_details").html("");
    add_product_row();

    function add_product_row(count = "") {
        var html = "";
        html += '<span id="row' + count + '"><div class="row">';
        html += '<div class="col-md-8">';
        html +=
            '<select name="produit_id[]" id="produit_id ' +
            count +
            '" class="form-control select2" style="width: 100%;" required>';
        html += "<?php echo fill_produit_list($connect); ?>";
        html +=
            '</select><input type="hidden" name="hidden_produit_id[]" id="hidden_produit_id' +
            count +
            '" />';
        html += "</div>";

        html += '<div class="col-md-3">';
        html +=
            '<input type="text" name="quantity[]" class="form-control" required />';
        html += "</div>";
        html += '<div class="col-md-1">';
        if (count == "") {
            html +=
                '<button type="button"  name="add_more" id="add_more" class="btn btn-success btn-xs">+</buttom>';
        } else {
            html +=
                '<button type="button" name="remove" id="' +
                count +
                '" class="btn btn-danger btn-xs remove">-</button>';
        }
        html += "</div>";
        html += "</div></div><br /></span>";

        $("#span_product_details").append(html);

        $(".select2").select2();

        //Initialize Select2 Elements
        $(".select2bs4").select2({
            theme: "bootstrap4",
        });
    }

    var count = 0;

    $(document).on("click", "#add_more", function() {
        count = count + 1;
        add_product_row(count);
    });

    $(document).on("click", ".remove", function() {
        var row_no = $(this).attr("id");
        $("#row" + row_no).remove();
    });
})