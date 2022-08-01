$(document).ready(function() {
    $("#table_produit_expiration").dataTable({
        processing: true,
        serverSide: false,
        responsive: true,
        pageLength: 5,
    });
})