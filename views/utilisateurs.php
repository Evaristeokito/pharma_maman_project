<?php
$page = "utilisateur";
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
                    <h5>GESTION DES UTILISATEURS</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Tableau de bord</a></li>
                        <li class="breadcrumb-item active">utilisateurs</li>
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
            <!-- card header -->
           <div class="card-header">
             <div class="row">
                <div class="col-6">
                     
                </div>
                <div class="col-6">
                   <div class="float-right">
                    <button  data-izimodal-open="#userModal" type="button" id="add_button"
                                            data-izimodal-transitionin="fadeInDown" class="btn btn-info btn-sm">
                                            <i class="fas fa-users"></i>
                     Nouveau
                    </button>
                   </div> 
                </div>
             </div>
           </div>
           <!-- ./card header -->

           <!-- card body -->
            <div class="card-body table-responsive" style="height: 490px;">
                <table class="table table-bordered table-hover table-head-fixed display responsive nowrap" width="100%"  id="table_user">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>Nom</th>
                                <th>SEXE</th>
                                <th>TELEPHONE</th>
                                <th>EMAIL</th>
                                <th>STATUS</th>
                                <th>IMG</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                </table>
            </div>
           <!-- end card body -->
         </div>
      </div>
     </div>
   </div>
  </section>
</div>


<?php 
include "./modal/user_modal.html" ;
?>

<?php
 include_once  "./components/footer.php";
?>


<script>
    $('#userModal').iziModal({
        title: 'Gestion des utilisateurs',
        headerColor: '#1e88e5',
        loop: false,
        padding: 10,
        iframe: false,
        width: 850,
        overlay: false,
        closeOnEscape: false,
        navigateArrows: false,
        zindex: 2000,
    });
</script>

<script src="../js/_user.js"></script>



