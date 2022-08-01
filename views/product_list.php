<?php
$page = "listprod";
$link = "open";
require_once  "./components/header.php";
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
                    <h5>liste des produits</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Tableau de bord</a></li>
                        <li class="breadcrumb-item active">Liste des produits</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- produit liste-->
  <section class="content">
   <div class="container-fluid">
     <div class="row">
      <div class="col-12">
         <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-6">
                        <div class="float-right">
                          <a href="/produit" class="btn btn-success btn-sm">
                            <i class="fas fa-plus"></i>
                                               Creer un Produit
                          </a>
                        </div>
                    </div>
                </div>
            </div>
             <div class="card-body responsive" style="height: 510px;">
             <table class="table table-bordered table-hover table-head-fixed display responsive nowrap" width="100%" id="table_produit">
                <thead>
                    <tr>
                        <th>Designation</th>
                        <th>Forme</th>
                        <th>Stock</th>
                        <th>Etat</th>
                        <th>Ajouter ,Par</th>
                        <th>Detail</th>
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

<?php require_once "./modal/produitModal.php"; ?>
<script src="../js/_produit.js"></script>

