<?php
$link = "openLiv";
$page = "fournisseur";
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
                    <h4>Mes fournisseurs</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Tableau de bord</a></li>
                        <li class="breadcrumb-item active">fournisseur</li>
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
          <div class="card-header">
            <div class="card-header">
              <div class="row">
                <div class="col-6">

                </div>
                <div class="col-6">
                  <div class="float-right">
                    <button data-izimodal-open="#fournisseurModal" type="button" id="add_button"
                                                data-izimodal-transitionin="fadeInDown" class="btn btn-primary btn-sm">
                                                <i class="fas fa-user-plus"></i>
                                                Creer un fournisseur
                   </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
         <div class="card-body table-responsive" style="height: 510px;">
          <div class="table-responsive">
            <table class="table table-bordered table-hover table-head-fixed display responsive nowrap" width="100%" id="table_fournisseur">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Ville</th>
                    <th>Telephone</th>
                    <th>Adresse</th>
                    <th>Email</th>
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
   </div>
  </section>
</div>


<?php 
require_once "./components/footer.php"; 
?>

<?php include('./modal/fournisseur.html'); ?>

<script src="../js/_fournisseur.js"></script>


