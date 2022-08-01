<?php
$link = "openPam";
$page = "client";
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
                    <h5>CLIENT AU COMPTOIRE</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Tableau de bord</a></li>
                        <li class="breadcrumb-item active">client</li>
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
                            <button type="button" data-izimodal-open="#clientModal" id="add_button"
                                                data-izimodal-transitionin="fadeInDown" class="btn btn-primary btn-sm">Creer un client</button>
                        </div>
                    </div>
                </div>
            </div>
           <div class="card-body table-responsive" style="height: 480px;">
                <table class="table table-striped table-head-fixed display responsive nowrap" width="100%" id="table_client">
                        <thead>
                            <tr>
                                <th>Client</th>
                                <th>Type client</th>
                                <th>Telephone</th>
                                <th>Email</th>
                                <th>Adresse</th>
                                <th>Editer</th>
                                <th>Suppression</th>
                                <th>Action</th>
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

<?php include './modal/client_modal.html'; ?>

<script src="./js/_client.js"></script>



