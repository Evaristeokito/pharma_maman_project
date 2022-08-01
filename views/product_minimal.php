<?php
$page = "produit-minimal";
$link = "open";
require_once  "./components/header.php";

$query = "
          SELECT * FROM product_alert_minimal
        ";
  $statement = $connect->prepare($query);
  $statement->execute(); 
  $res = $statement->fetchAll(PDO::FETCH_OBJ);  
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
                    <h5>produits en repture de stock</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Tableau de bord</a></li>
                        <li class="breadcrumb-item active">Repture de stock</li>
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
                          <a href="/produit" class="btn btn-primary btn-sm">
                            <i class="fas fa-user-plus"></i>
                              Reaprovisionner
                          </a>
                        </div>
                    </div>
                </div>
            </div>
             <div class="card-body responsive" style="height: 510px;">
                 <table class="table table-bordered table-hover table-head-fixed display responsive nowrap" width="100%" id="table_reap">
            <thead>
                <tr>
                    <th>Reference</th>
                    <th>Designation</th>
                    <th>Format</th>
                    <th>Stock</th>
                    <th>Unite</th>
                    <th>Alert</th>
                    <th>Expiration</th>
                    <th>Categorie</th>
                    <th>Reap</th>
                </tr>
            </thead>
            <tbody>
               <?php foreach ($res as $row): ?>
                 <tr>
                   <td><?php echo $row->reference; ?></td>
                   <td><?php echo $row->designation; ?></td>
                   <td><?php echo $row->FORMAT; ?></td>
                   <td>
                     <button class="btn btn-danger btn-xs"><?php echo '-' . ''. $row->stock; ?></button>
                   </td>
                   <td><?php echo $row->unite; ?></td>
                   <td>
                     <button class="btn btn-success btn-xs"><?php echo $row->alert; ?></button>
                   </td>
                   <td><?php echo $row->dateexpiration; ?></td>
                   <td><?php echo $row->famille; ?></td>
                   <td>
                      <button class="btn btn-primary btn-xs reap" name="reap" id="<?php echo $row->refence; ?>">Reaprovisionner</button>
                   </td>
                 </tr>
               <?php endforeach ?>
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
<?php require_once "./modal/updated_stock_modal.html" ; ?>
<script src="../js/_produit_minimal.js"></script>



