<?php
$page = "produit-available";
$link = "open";
require_once  "./components/header.php";

$query = "
  SELECT * FROM product_disponible
";
 $statement = $connect->prepare($query);
 $statement->execute();
 $product = $statement->fetchAll(PDO::FETCH_OBJ);
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
                    <h5>PRODUIT DISPONIBLE</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Tableau de bord</a></li>
                        <li class="breadcrumb-item active">Disponible</li>
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
            </div>
             <div class="card-body responsive" style="height: 510px;">
                 <table class="table table-bordered table-hover table-head-fixed display responsive nowrap" width="100%" id="table_produit_expiration">
            <thead>
                <tr>
                    <th>Reference</th>
                    <th>Designation</th>
                    <th>Format</th>
                    <th>En stock</th>
                    <th>Expirer,le</th>
                    <th>Etat</th>
                    <th>Emplacement</th>
                    <th>Vente</th>
                </tr>
            </thead>
            <tbody>
                    <?php foreach($product as $row):

                     $etat = '';
                     if ($row->etat =='fonctionnel'){
                        $etat = '<button class="btn btn-success btn-xs">
                                   utilisable
                                 </button>';
                     }else {
                        $etat = '<button class="btn btn-danger btn-xs">
                                   Le produit est expiré
                                 </button>';
                     }
                    ?>
                        <tr>
                            <td><?php echo $row->reference; ?></td>
                            <td><?php echo $row->designation; ?></td>
                            <td><?php echo $row->idformat; ?></td>
                            <td><?php echo $row->stock; ?></td>
                            <td class="text-center">
                                <button class="btn btn-primary btn-xs">
                                    <?php echo $row->dateexpiration; ?>
                                </button>
                            </td>  
                             <td>
                               <?php echo $row->etat; ?>
                            </td>  
                            <td>
                               <?php echo $row->emplacement; ?>
                            </td>                  
                            <td>
                                <a href="/vente" class="btn btn-primary btn-sm">
                                    <i class="fas fa-shopping-cart"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
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

<script src="../js/_product_expire.js"></script>

