<?php
$page = 'vente-liste';
$link = 'op';
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
                    <h5>Toutes les ventes</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Tableau de bord</a></li>
                        <li class="breadcrumb-item active">vente</li>
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
                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-6">
                        <div class="float-right">
                             <button data-izimodal-open="#venteModal" type="button" id="add_button"
                                                data-izimodal-transitionin="fadeInDown" class="btn btn-primary btn-sm">
                                                <i class="fas fa-user-plus"></i>
                                                new vente
                   </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive" style="height: 510px;">
              <table class="table table-bordered table-hover table-head-fixed display responsive nowrap" width="100%" id="table_vente">
                <thead>
                    <tr>
                        <th>Designation</th>
                        <th>Date</th>
                        <th>Qte</th>
                        <th>Prix</th>
                        <th>Net</th>
                        <th>Editer</th>
                        <th>Suppression</th>
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

<?php require_once "./modal/vente_modal.php"; ?>

<script src="../js/_vente.js"></script>

