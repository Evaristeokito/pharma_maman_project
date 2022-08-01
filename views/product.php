<!-- Main Sidebar Container -->
<?php
$page = 'produit';
$link = 'open';
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
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                    <h4>produits pharmaceutique</h4>
                </div>
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
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
            <!--form-->
            <form role="form"  method="post" autocomplete="off" id="formProduit">
             <div class="row">
                    <!-- left column -->
                    <div class="col-lg-6 col-md-12 col-xs-12 col-sm-12">
                        <!-- general form elements -->
                        <!-- Medicament -->
                        <div class="card card-success">
                            <div class="card-header">
                                <!-- <h3 class="card-title">INFORMATION</h3> -->
                            </div>
                            <div class="card-body">

                              <div class="row">
                                <div class="col-lg-4 col-sm-12 col-md-6">
                                    <!-- medicament-->
                                    <div class="form-group mb-3">
                                        <label for="#">Reference :<span class="text-danger">*</span> :</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="reference" value="<?php echo productRef(); ?>" name="reference"
                                                placeholder="reference..." readonly>
                                        </div>
                                        <span id="error_reference" class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-sm-12 col-md-6">
                                    <!-- desgination-->
                                    <div class="form-group mb-3">
                                        <label for="#">Designation <span class="text-danger">*</span> :</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="designation" name="designation"
                                                placeholder="medicament...">
                                        </div>
                                        <span id="error_designation" class="text text-danger" class="error_designation"></span>
                                    </div>
                                </div>
                              </div>
                                <!-- Format -->
                                <div class="form-group mb-3">
                                    <label for="#">Format <span class="text-danger">*</span> :</label>
                                    <select class="form-control select2" id="format" name="format">
                                        <option value="">veuillez selectionner le format</option>
                                       <?php 
                                          echo formatList($connect);
                                       ?>
                                    </select>
                                    <span id="error_format" class="text-danger" ></span>
                                </div>

                                <!-- date expiration row -->
                                <div class="row">
                                    <!-- col-6 -->
                                    <div class="col-lg-6 col-sm-12 col-md-12 col-xs-12">
                                          <!-- date d'expiration-->
                                            <div class="form-group">
                                                <label for="#">Date expiration<span class="text-danger">*</span> :</label>
                                                <div class="input-group">
                                                  <input type="date" id="date_expiration" name="date_expiration"  class="form-control">
                                                </div>
                                                <span class="text-danger" id="error_date_expiration"></span>
                                            </div>
                                          <!-- date expiration row -->
                                    </div>
                                    <!-- ./col-6 -->

                                    <!-- col-6 -->
                                    <div class="col-lg-6 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="#">Prix de base<span class="text-danger">*</span> :</label>
                                            <div class="input-group">
                                                <input type="number" name="prix_u" id="prix_u" class="form-control" placeholder="0.00">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./col-6 -->

                                 </div>

                                <!--En stock et unite -->
                                <div class="row">
                                 <!-- stock -->
                                 <div class="col-lg-6 col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group">
                                       <label for="#">Stock Encours <span class="text-danger">*</span> :</label>
                                       <div class="input-group">
                                          <input type="number" class="form-control" id="qte" name="qte" placeholder="0.00">
                                       </div>
                                       <span class="text-danger" id="error_qte"></span>
                                    </div>
                                 </div>
                                 <!-- end stock -->

                                 <!-- unite -->
                                 <div class="col-lg-6 col-sm-12 col-md-12 col-xs-12">
                                     <div class="form-group">
                                       <label for="#">Unite <span class="text-danger">*</span> :</label>
                                       <div class="input-group">
                                        <select name="unite" id="unite" class="form-control select2">
                                            <option value="">choisir une unite</option>
                                            <option value="kg">kg</option>
                                            <option value="poid">Poids</option>
                                            <option value="cartons">cartons</option>
                                        </select>
                                       </div>
                                       <span id="error_unite" class="text-danger"></span>
                                     </div>
                                 </div>
                                 <!-- end unite -->
                                </div>
                                <!--End stock et unite -->

                                <div class="row">
                                    <!-- alert -->
                                    <div class="col-lg-6 col-sm-12 col-md-12 col-xs-12">
                                      <div class="form-group">
                                         <label for="#">Fixer le niveau d'alerte <span class="text-danger">*</span> :</label>
                                       <div class="input-group">
                                            <input type="number" id="alert" name="alert" class="form-control"  placeholder="0.00">
                                      </div>
                                          <span id="error_alert" class="text-danger"></span>
                                      </div>
                                    </div>
                                    <!-- end alert -->
                                    <!-- etat -->
                                     <div class="col-lg-6 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="">Etat de produit</label>
                                            <div class="input-group">
                                                <select name="etat" id="etat" class="form-control select2">
                                                    <option value="">choississez un etat</option>
                                                    <option value="fonctionnel">Fonctionnel</option>
                                                    <option value="expirer">Hors usage</option>
                                                </select>
                                            </div>
                                        </div>
                                     </div>
                                    <!-- etat -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->

                    <!-- right column -->
                    <div class="col-lg-6 col-md-12 col-xs-12 col-sm-12">
                        <div class="card card-success">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                             <!-- Famille -->
                               <div class="form-group">
                                    <label>Famille <span class="text-danger">*</span> :</label>
                                    <select class="form-control select2" name="famille" id="famille">
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
                                    <div class="input-group">
                                          <textarea class="textarea" placeholder="Emplacement" id="emplacement" name="emplacement"
                                            style="width: 100%; height: 200px; font-size: 19px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                    </div>
                                    <span class="text text-danger" id="error_emplacement"></span>
                                </div>
                               
                                <div class="form-group mb-2 mt-3">
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
    <!-- /.content -->
    
</div>
<!-- /.content-wrapper -->

<?php require_once './components/footer.php'; ?>

<script src="../js/_produit.js"></script>
