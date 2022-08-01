<?php
$page = 'vente';
$link = 'op';
require_once './components/header.php';
include "./functions/produit_function.php";
?>

<div class="wrapper">

  <?php include 'components/navbar.php'; ?>
  <?php include 'components/sidebar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5>VENTE A LA CAISSE</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Tableau de bord</a></li>
                        <li class="breadcrumb-item active">vente</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!--form-->
            <form role="form" method="post" autocomplete="off" id="formvente">
             <div class="row">

                    <!-- left column -->
                    <div class="col-lg-6 col-md-12 col-xs-12">
                        <!-- card product and qty -->
                        <div class="card card-success">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="#">Produit & Quantite</label>
                                    <span id="span_product_details" name="span_product_details"></span>
                                </div>
                            </div>
                        </div>
                        <!-- /.card product and qty -->

                          <!-- vente details -->
                        <div class="card card-default">
                            <div class="card-header">
                            </div>
                            <div class="card-body">

                            <!-- prix public -->
                            <div class="col-12">

                                <!-- plage prix -->

                                <div class="row">

                                   <!-- prix public -->
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="#">Prix public :</label>
                                            <div class="input-group mb-3">
                                              <input type="number" class="form-control" placeholder="0.00" name="prix_public" id="prix_public">
                                            </div>
                                            <span id="error_prix_public" class="text text-danger"></span>
                                        </div>
                                    </div>
                                   <!-- end prix public -->

                                    <!-- prix vente -->
                                    <div class="col-6">
                                        <div class="form-group">
                                          <label for="#">Prix de vente:</label>
                                            <div class="input-group mb-3">
                                             <input type="number" name="prix_vente" id="prix_vente" class="form-control" placeholder="0.00">
                                            </div>
                                            <span id="error_prix_vente" class="text text-danger"></span>
                                        </div>
                                    </div>
                                    <!-- End prix vente -->
                                </div>
                                <!-- ./end plage prix -->

                              <div class="row">

                                <!-- tva -->
                                <div class="col-6">
                                  <div class="form-group">
                                    <label for="#">TVA :</label>
                                      <div class="input-group mb-3">
                                         <input type="Number" class="form-control" placeholder="0.5" name="tva" id="tva">
                                     </div>
                                 </div>
                                </div>
                                <!-- ./end tva -->

                                <!-- Total net -->
                                <div class="col-6">
                                  <div class="form-group">
                                    <label for="#">Total Net :</label>
                                    <div class="input-group mb-3">
                                        <input type="number" name="total_net" id="total_net" placeholder="0.00" class="form-control">
                                    </div>
                                    <span class="text text-danger" id="total_net"></span>
                                  </div>
                                </div>
                                <!-- end Total net -->
                              </div>

                              <div class="row">
                                <!-- date vente -->
                                  <div class="col-6">
                                    <div class="form-group">
                                        <label for="#">Date vente :</label>
                                        <div class="input-group mb-3">
                                            <input type="date" class="form-control" id="datevente" name="datevente" >
                                        </div>
                                        <span class="text text-danger" id="error_date_vente"></span>
                                    </div>
                                  </div>
                                <!-- ./end date vente -->

                               <!-- paiement mode -->
                                <div class="col-6">
                                  <div class="form-group">
                                    <label for="#">Paiement Mode :</label>
                                    <div class="input-group mb-3">
                                        <select name="paie_mode" id="paie_mode" class="form-control select2">
                                            <option value="">paie mode...</option>
                                            <option value="cash">cash</option>
                                            <option value="credit">credit</option>
                                        </select>
                                    </div>
                                    <span class="text text-danger" id="error_paie_mode"></span>
                                  </div>
                                </div>
                                <!-- end paiement mode -->
                              </div>
                            <!-- /.row -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                     </div><!-- ./card 2 -->
                    </div>
                    <!--/.col (left) -->

                    <!-- right column -->
                    <div class="col-lg-6 col-md-12 col-xs-12">
                        <!-- card 1-->
                        <div class="card card-default">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                            <div class="col-12">

                              <!-- client -->
                              <div class="row">
                                <!-- client list -->
                                <div class="col-11">
                                   <div class="form-group">
                                       <label for="#">Client :</label>
                                        <div class="input-group">
                                            <select name="client" id="client" class="form-control select2">
                                                <option value="">Selectionner le client</option>
                                                <?php echo fill_client($connect); ?>
                                            </select>
                                       </div>
                                       <span class="text text-danger" id="error_client"></span>
                                    </div>
                                </div>
                                <!-- end client list -->

                                <!-- add button client -->
                                <div class="col-1 mt-4">
                                   <button data-izimodal-open="#clientModal" type="button" id="add_button"
                                            data-izimodal-transitionin="fadeInDown" class="btn btn-primary btn-sm">
                                            <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <!-- end add button client -->
                              </div>
                                <!-- End client -->

                              <div class="row">
                                  <!-- paiement status -->
                                    <div class="form-group col-6">
                                        <label for="#">Paiement status :</label>
                                        <div class="input-group mb-3">
                                            <select name="paie_status" id="paie_status" class="form-control select2">
                                                <option value="">Selectionner paiement status</option>
                                                <option value="active">active</option>
                                                <option value="inactive">inactive</option>
                                            </select>
                                        </div>
                                        <span class="text text-danger" id="error_paie_status"></span>
                                    </div>
                                    <!-- ./end paiement status -->

                                    <!-- cautionnement -->
                                     <div class="form-group col-6">
                                        <label for="#">Cautionnement :</label>
                                           <div class="input-group mb-3">
                                              <select name="cautionnement" id="cautionnement" class="form-control select2">
                                                 <option value="">cautionnement...</option>
                                                 <option value="Boite">Boite</option>
                                                 <option value="carton">Carton</option>
                                                 <option value="Boite">Boite</option>
                                                 <option value="Boite">Boite</option>
                                               </select>
                                            </div>
                                        <span class="text text-danger" id="error_cautionnement"></span>
                                     </div>
                                    <!-- end cautionnement -->
                              </div>
                             <!-- /.row -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                      </div><!--/.col (right) -->
                   </div>
                    <!-- /.row -->

                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="float-right">
                                    <input type="hidden" name="vente_id" id="vente_id">
                                    <input type="hidden" name="action" id="action" name="action" value="Add">
                                    <input type="submit" value="Enregistrer" name="button_action" id="button_action" class="btn btn-primary">
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
        <!-- /. form-->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->
<?php require_once './components/footer.php'; ?>
<!-- <script src="../js/_vente.js"></script> -->
<script>
     $(document).ready(function() {

        $('#action').val('Add');
        $('#button_action').val('Enregistrer');
    
      $("#formvente").on("submit", function(event) {
          event.preventDefault();
          $.ajax({
            url : './action/_vente_action.php',
            method : "POST",
            data : $(this).serialize(),
            dataType : 'json',
            beforeSend : function(){
              $('#button_action').val('validation...');
              $('#button_action').attr('disabled' , 'disabled');
            },
            success : function(data) {
                $('#button_action').attr('disabled' ,false);
                $('button_action').val('Sauvagarder');
                
                if (data.success){
                 alert('data inserted success fully');
                }

                if (data.error){
                 alert('error when data is inserted');
                }
            }
          })
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
          html += '<?php echo fill_produit_list($connect); ?>';
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
          if (count == '') {
              html +=
                  '<button type="button"  name="add_more" id="add_more" class="btn btn-success btn-xs mt-2"><i class="fas fa-plus"></i></buttom>';
          } else {
              html +=
                  '<button type="button" name="remove" id="' +
                  count +
                  '" class="btn btn-danger btn-xs remove mt-2"><i class="fas fa-minus"></i></button>';
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

  });
</script>

<?php require_once './modal/client_modal.html' ;?>
<script src="../js/_client.js"></script>


