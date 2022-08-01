<?php
$link = "openPam";
$page = "parametre";
include_once "./components/header.php";
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
                    <h5>FAMILLE DES PRODUITS</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Tableau de bord</a></li>
                        <li class="breadcrumb-item active">Famille</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- forme liste-->
  <section class="content">
   <div class="container-fluid">
     <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
                <div class="row">
                    <div class="col-6">

                    </div>
                    <div class="col-6">
                        <div class="float-right">
                            <button data-izimodal-open="#familleModal" type="button" id="add_button"
                                            data-izimodal-transitionin="fadeInDown" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i>
                                Creer une famille
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive" style="height: 510px;">
               <div class="col-12">
                <table class="table table-bordered table-hover table-head-fixed display responsive nowrap" width="100%" id="table_famille">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>ID</th>
                            <th>Famille</th>
                            <th>Description</th>
                            <th>Effectuer,Par</th>
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
include_once "./components/footer.php";
?>

<?php include './modal/famille_modal.html'; ?>

<script src="./js/_famille.js"></script>

