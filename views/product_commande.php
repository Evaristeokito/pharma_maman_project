<?php
$page = "mes-commandes";
$link = "com";
 include  "./components/header.php";
?>

<div class="wrapper">
  <?php include 'components/navbar.php'; ?>
  <?php include  'components/sidebar.php'; ?>

<div class="content-wrapper">
   <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>Mes commandes</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Tableau de bord</a></li>
                        <li class="breadcrumb-item active">Mes commandes</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- forme liste-->
  <section class="content">
   <div class="container-fluid">
     <div class="row">
      <div class="col-12">
        <div class="card">
         <div class="card-body table-responsive" style="height: 510px;">
          <table class="table table-bordered table-hover table-head-fixed" id="commande_table">
                <thead>
                    <tr>
                        <th>Bon commande</th>
                        <th>Designation</th>
                        <th>Format</th>
                        <th>Date cmd</th>
                        <th>Qte cdee</th>
                        <th>Montant</th>
                        <th>Total</th>
                        <th>Editer</th>
                        <th>Suppr</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
         </table>
        </div>
      </div>
      </div>
     </div>
   </div>
  </section>
</div>



<?php require_once "./components/footer.php"; ?>

<script src="/js/_commande.js"></script>

<script>
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
</script>

