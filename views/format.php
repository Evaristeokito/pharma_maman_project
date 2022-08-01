<?php
$link = "openPam";
$page = "format";
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
                    <h5>FORMAT DE PRODUITS</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Tableau de bord</a></li>
                        <li class="breadcrumb-item active">format</li>
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
                            <button type="button" data-izimodal-open="#formatModal" id="add_button"
                                                data-izimodal-transitionin="fadeInDown" class="btn btn-primary btn-sm">Creer un format</button>
                        </div>
                    </div>
                </div>
            </div>
           <div class="card-body table-responsive" style="height: 480px;">
                <table class="table table-striped table-head-fixed display responsive nowrap" width="100%" id="table_format">
                        <thead>
                            <tr>
                                <th>N</th>
                                <th>Format</th>
                                <th>Description</th>
                                <th>Inserer Par l'utilisateur</th>
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

<?php
include_once  "./components/footer.php";
?>

<?php include './modal/format_modal.html'; ?>

<script src="./js/_format.js"></script>



