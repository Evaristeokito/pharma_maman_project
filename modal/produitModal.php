<?php include "./functions/produit_function.php"; ?>
<!-- produit Modal -->
<div id="produitModal" className="iziModal" data-izimodal-group="alerts" data-izimodal-group="alerts">
    <section class="content">
        <div class="container-fluid">
            <!--form-->
            <form role="form" method="post" autocomplete="off" id="formProduit">
             <div class="row">
                    <!-- left column -->
                    <div class="col-lg-6 col-md-12 col-xs-12">
                        <!-- general form elements -->
                        <!-- Medicament -->
                        <div class="card card-default">
                            <div class="card-header">
                                <!-- <h3 class="card-title">INFORMATION</h3> -->
                            </div>
                            <div class="card-body">

                              <div class="row">
                                <div class="col-4">
                                    <!-- medicament-->
                                    <div class="form-group mb-3">
                                        <label for="#">Reference :<span class="text-danger">*</span> :</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="reference" name="reference"
                                                placeholder="reference...">
                                        </div>
                                        <span id="error_reference" class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <!-- desgination-->
                                    <div class="form-group mb-3">
                                        <label for="#">Designation <span class="text-danger">*</span> :</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="designation" name="designation"
                                                placeholder="medicament...">
                                        </div>
                                        <span id="error_designation" class="text-danger"></span>
                                    </div>
                                </div>
                              </div>

                                <!-- Format -->
                                <div class="form-group mb-3">
                                    <label for="#">Format <span class="text-danger">*</span> :</label>
                                    <select class="form-control" id="format" name="format">
                                        <option value="">veuillez selectionner le format</option>
                                       <?php 
                                         echo formatList($connect);
                                       ?>
                                    </select>
                                    <span id="error_format" class="text-danger" ></span>
                                </div>

                                <!--En stock et unite -->
                                 <div class="row">
                                 <div class="col-6">
                                    <div class="form-group">
                                       <label for="#">Stock Encours <span class="text-danger">*</span> :</label>
                                       <div class="input-group">
                                          <input type="number" class="form-control" id="qte" name="qte" placeholder="Quantite...">
                                       </div>
                                       <span class="text-danger" id="error_qte"></span>
                                    </div>
                                 </div>
                                 <div class="col-6">
                                     <div class="form-group">
                                       <label for="#">Unite <span class="text-danger">*</span> :</label>
                                       <div class="input-group">
                                        <select name="unite" id="unite" class="form-control">
                                            <option value="">choisir une unite</option>
                                            <option value="kg">kg</option>
                                            <option value="autre">autre</option>
                                        </select>
                                       </div>
                                       <span id="error_unite" class="text-danger"></span>
                                     </div>
                                 </div>
                                </div>
                                <!--End stock et unite -->

                                <div class="row">
                                    <!-- niveau d'alert -->
                                    <div class="col-6">
                                      <div class="form-group">
                                         <label for="#">Definir le niveau d'alerte <span class="text-danger">*</span> :</label>
                                       <div class="input-group">
                                            <input type="number" id="alert" name="alert" class="form-control" placeholder="niveau d'alert">
                                      </div>
                                          <span id="error_alert" class="text-danger"></span>
                                      </div>
                                    </div>

                                    <!-- end niveau d'alert -->
                                    <div class="col-6">
                                      <div class="form-group">
                                         <label for="#">Le stock maximum <span class="text-danger">*</span> :</label>
                                       <div class="input-group">
                                            <input type="number" id="stock_max" name="stock_max" class="form-control" placeholder="niveau maximum">
                                      </div>
                                          <span id="error_stock_max" class="text-danger"></span>
                                      </div>
                                    </div>
                                    
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                          <!-- date d'expiration-->
                                            <div class="form-group">
                                                <label for="#">Date expiration<span class="text-danger">*</span> :</label>
                                                <div class="input-group mb-3">
                                                <input type="date" id="date_expiration" name="date_expiration" class="form-control">
                                                </div>
                                                <span class="text-danger" id="error_date_expiration"></span>
                                            </div>
                                    </div>
                                 </div>
                            
                                <!-- /.row -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->

                    <!-- right column -->
                    <div class="col-lg-6 col-md-12 col-xs-12">
                        <div class="card card-default">
                            <div class="card-header">
                            </div>
                            <div class="card-body">

                                    <!-- Famille -->
                               <div class="form-group">
                                    <label>Famille <span class="text-danger">*</span> :</label>
                                    <select class="form-control" name="famille" id="famille">
                                     <option value="">Selectionner</option>
                                        <?php 
                                          echo familleList($connect);
                                        ?>
                                    </select>
                                    <span class="text-danger" id="error_famille" name="error_famille"></span>
                                </div>

                                <!-- fabricant-->
                                <div class="form-group">
                                    <label for="#">Fabricant :</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="fabricant" name="fabricant" placeholder="Fabricant">
                                    </div>
                                </div>

                                  <!-- emplacement-->
                                <div class="form-group">
                                    <label for="#">Emplacement <span class="text-danger">*</span> :</label>
                                    <div class="input-group mb-3">
                                        <textarea name="emplacement" id="emplacement" placeholder="Emplacement du produit..."  class="form-control" cols="30" rows="5"></textarea>
                                    </div>
                                    <span class="text text-danger" id="error_emplacement"></span>
                                </div>

                                <div class="form-group mb-3 mt-5">
                                    <div class="float-right">
                                        <button type="reset" id="annuler" class="btn btn-danger btn-sm">Initialiser</button>
                                        <input type="hidden" name="produit_id" id="produit_id">
                                        <input type="hidden" id="action" name="action" value="Add">
                                        <input type="submit" id="button_action" name="button_action" class="btn btn-primary btn-sm" value="Enregistrer">
                                    </div>
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div><!--/.col (right) -->
                </div>
            <!-- /.row -->
            </form>
        <!-- /. form-->
        </div><!-- /.container-fluid -->
    </section>
</div>
<!-- end Produit Modal -->

<!--  views modal -->
<div id="viewProduit" className="iziModal" data-izimodal-group="alerts" data-izimodal-group="alerts">
    <div class="modal-body" id="produit_detail">
    </div>
</div>
<!--end views modal-->

<!-- delete Modal -->
<div id="deleteProduit" className="iziModal" data-izimodal-group="alerts" data-izimodal-group="alerts">
        <!-- Modal body -->
        <div class="modal-body">
            <h5 align="center">voulez-vous supprimer ce Produit ?</h5>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="reset" name="annuler" id="annuler" class="btn btn-primary btn-sm">Annuler</button>
            <button type="button" name="ok_button" id="ok_button" class="btn btn-danger btn-sm">
                valider
                <i class="fa-thin fa-pen-to-square"></i>
            </button>
        </div>
 </div>
<!-- end delete Modal -->


<script>

    $('#produitModal').iziModal({
        title: 'Editer Produit',
        headerColor: '#1e88e5',
        loop: false,
        padding: 20,
        iframe: false,
        width: 1000,
        overlay: false,
        zindex: 2000,
    });

</script>

<script>
      $('#viewProduit').iziModal({
            title: 'DETAIL SUR LE PRODUIT',
            headerColor: '#1e88e5',
            overlay: true,
            loop: false,
            padding: 10,
            iframe: false,
            width: 600,
            overlay: false,
            closeOnEscape: false,
            navigateArrows: false,
            zindex: 2000,
        });
</script>

<script>
     $('#deleteProduit').iziModal({
            title: 'SUPPRESSION DU PRODUIT',
            headerColor: '#ba000d',
            loop: false,
            width: 500,
            closeOnEscape: false,
            navigateArrows: false,
            zindex: 2000,
            overlay: false,
            closeButton: true,
        });
</script>