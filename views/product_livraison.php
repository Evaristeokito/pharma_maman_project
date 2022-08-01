
<?php
$page = "mesLivraison";
$link = "openLiv";

require_once './components/header.php';
require_once './functions/produit_function.php';
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
                    <h4>Enregistrer des nouvelles livraison</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Tableau de bord</a></li>
                        <li class="breadcrumb-item active">Produit</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                    <!-- left column -->
                    <div class="col-lg-6 col-md-12 col-xs-12">
                        <!-- ./card -->
                        <div class="card card-default">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                              <div class="row">
                               <!-- div col-6 livraison product form -->
                              <div class="col-lg-12 col-md-12 col-sm-12">
                               <!--form-->
                                 <form role="form" method="post" autocomplete="off" id="form_livraison" name="form_livraison">
                                    <!-- BON DE LIVRAISON -->
                                    <div class="form-group mb-3">
                                        <label for="#">Bon Livraison :<span class="text-danger">*</span> :</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="bon_livraison" value="<?php echo generateLiv(); ?>" name="bon_livraison"
                                                placeholder="bon de livraison...">
                                            <span id="error_bon_livraison" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <!-- end BON DE LIVRAISON  -->

                                    <!-- fournisseur -->
                                    <div class="form-group mb-3">
                                        <label for="#">Fournisseur <span class="text-danger">*</span> :</label>
                                        <div class="input-group">
                                            <select name="fournisseur" id="fournisseur" class="form-control">
                                                <option value="">fournisseur</option>
                                                <?php echo fill_fournisseur($connect); ?>
                                            </select>
                                        </div>
                                        <span id="error_fournisseur" class="text-danger"></span>
                                    </div>
                                    <!-- end fournisseur -->

                                    <!-- Date Livraison -->
                                    <div class="form-group mb-3">
                                        <label for="#">Date de livraison</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="date_livraison" id="date_livraison" data-provide="datepicker" class="form-control datepicker">
                                        </div>
                                        <span class="error_date_livraison"></span>
                                    </div>
                                    <!-- date livraison -->

                                    <!-- button -->
                                    <div class="form-group mb-2">
                                        <div class="float-right">
                                            <input type="hidden" name="livraison_id" id="livraison_id">
                                            <input type="hidden" name="action" id="action" value="Add">
                                            <input type="submit" value="Enregistrer" id="button_action" name="button_action" class="btn btn-primary">
                                        </div>
                                    </div>
                                    <!-- End button -->
                                   </form>
                                  <!-- /. form-->
                              </div>
                              <!-- end div col-6 livraison product form -->
                              </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->

                    <!-- right column -->
                    <div class="col-lg-6 col-md-12 col-xs-12">
                         <!-- ./card -->
                        <div class="card card-default">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                            <div class="row">
                                <!-- livraison list col-6 -->
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="responsive">
                                  <table class="table table-striped" id="tab_livraison" name="tab_livraison">
                                     <thead>
                                        <tr>
                                            <th>BON LIVRAISON</th>
                                            <th>DATE LIVRAISON</th>
                                            <th>FOURNISSEUR</th>
                                            <th>Action</th>
                                        </tr>
                                     </thead>
                                     <tbody>
                                      
                                     </tbody>
                                  </table>
                                </div>
                              </div>
                                <!-- end livraison list col-6 -->
                            </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col (right) -->
                </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php require_once './components/footer.php'; ?>
<script src="../js/_livraison.js"></script>
<?php include '../modal/livraison_modal.html'; ?>
