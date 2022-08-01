<?php
$page = 'commande';
$link = 'com';
require_once './components/header.php';
require_once './functions/produit_function.php';
?>

<?php $query = "SELECT * FROM product_alert_minimal";
 $stmt = $connect->prepare($query);
 $stmt->execute();
 $stmt->rowCount();
 $res = $stmt->fetchAll(PDO::FETCH_OBJ); ?>

<div class="wrapper">
  <?php include 'components/navbar.php'; ?>
  <?php include  'components/sidebar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>une nouvelle commande</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Tableau de bord</a></li>
                        <li class="breadcrumb-item active">nouvelle</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!--form-->
            <div class="row">
                <!-- produit reaprovisionner -->
                  <div class="col-lg-4 col-md-12 col-sm-12">
                     <div class="card card-default">
                        <div class="card-header">
                            <div class="card-title">PRODUIT A REAPROVISIONNER</div>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                           </div>
                        </div>
                        <div class="card-body">
                            <div class="col-12">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Designation</th>
                                            <th>Reapro</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($res as $row): ?>
                                        <tr>
                                            <td><?= $row->designation; ?></td>
                                            <td>
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                     </div>
                  </div> 
                <!-- produit reaprovisionner -->

                <!-- nouvelle commande -->
                 <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="card card-default">
                        <div class="card-header">
                            <div class="card-title">
                                Passer une nouvelle commande
                            </div>
                        </div>
                        <!-- card header -->

                        <!-- card-body  -->
                        <div class="card-body">
                            <form action="/" method="post" id="command_form" name="command_form">
                                <div class="row">
                                    <!-- produit info -->
                                 <div class="col-6">
                                   <span id="span_product_details" name="span_product_details"></span>
                                </div>
                                <!-- end produit info -->

                                <!-- commande info -->
                                <div class="col-6">
                                    <!-- Bon de commande -->
                                    <div class="form-group mb-3">
                                        <label for="#">Bon de commande <span class="text-danger">*</span> :</label>
                                         <div class="input-group">
                                            <input type="text" name="bon_commande" id="bon_commande" placeholder="bon de commande" class="form-control">
                                         </div>
                                        <span id="error_format" name="error_format" class="text-danger" ></span>
                                    </div>
                                    <!-- end bon de commande -->
                                    <!-- date commande -->

                                    <!-- Bon de commande -->
                                    <div class="form-group mb-3">
                                        <label for="#">Date de la commande <span class="text-danger">*</span> :</label>
                                         <div class="input-group">
                                            <input type="date" name="date_commande" id="date_commande" class="form-control">
                                         </div>
                                        <span id="error_date_commande" name="error_date_commande" class="text-danger" ></span>
                                    </div>
                                    <!-- end date commande -->

                                    <!--montant -->
                                    <div class="form-group mb-3">
                                        <label for="#">Montant <span class="text-danger">*</span> :</label>
                                         <div class="input-group">
                                            <input type="number" name="montant" id="montant" placeholder="0.00" class="form-control">
                                         </div>
                                        <span id="error_montant" name="error_montant" class="text-danger" ></span>
                                    </div>
                                    <!-- montant -->

                                    <!--montant total -->
                                    <div class="form-group mb-3">
                                        <label for="#">MT TOTAL <span class="text-danger">*</span> :</label>
                                         <div class="input-group">
                                            <input type="number" name="montant_total" id="montant_total" placeholder="0.00" class="form-control">
                                         </div>
                                        <span id="error_montant" name="error_montant" class="text-danger" ></span>
                                    </div>
                                    <!-- montant total -->

                                </div>
                                <!-- end commande info -->
                                </div>
                            </form>
                        </div>
                    </div>
                 </div>
                <!-- end nouvelle commande -->
            </div>
            <!-- /.row -->
           
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require_once './components/footer.php'; ?>
<script src="../js/_commande.js"></script>

