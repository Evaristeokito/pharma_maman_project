<?php
$page = "mesLivraison";
$link = "openLiv";
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
                    <h5>Mes Livraisons</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Tableau de bord</a></li>
                        <li class="breadcrumb-item active">Livraisons</li>
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
                  <a href="/livraison" class="btn btn-primary">
                    <i class="fas fa-user-plus"></i>
                      Nouvelle livraison
                    </a>
                 </div>
               </div>
             </div>
           </div>
           <div class="card-body table-responsive" style="height: 510px;">
             <table class="table table-bordered table-hover table-head-fixed" id="table_livraison">
               <thead>
                  <tr>
                      <th>Designation</th>
                      <th>Bon Livraison</th>
                      <th>Date livraison</th>
                      <th>Qte livraison</th>
                      <th>Fournisseur</th>
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


