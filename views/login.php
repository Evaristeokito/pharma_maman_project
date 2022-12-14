<?php 
include "components/head.php";

?>

<?php 
  // Login PHP
  include __DIR__ . "../../action/connection_database.php";
 
 
  if (isset($_SESSION['user_id']))
  {
      header('location:http://pharma.test/');
  }

?>

<div class="login-page">
 <div class="login-box">
  <div class="login-logo">
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-header">
      <div class="login-logo">
        <img src="../public/assets/user-img/lagos.jpg" width="90" height="90" alt="IMG">
     </div>
    </div>
    <div class="card-body login-card-body">
      <p class="login-box-msg">Admnistration Pharmacie</p>

      <form id="admin_login_form" name="admin_login_form" method="post">
       <span id="error_message" class="text text-danger"></span>

        <div class="input-group mb-3">
          <input type="text" class="form-control text text-capitalize" id="admin_user_name" name="admin_user_name" placeholder="Nom utilisateur">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          <span id="error_admin_user_name" class="text text-danger"></span>
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control" name="admin_password" id="admin_password" placeholder="Mot de passe">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <span id="error_admin_password" class="text text-danger"></span>
        </div>

        <div class="row">
          <div class="col-7">
            <div class="icheck-primary">
              <!-- <input type="checkbox" id="remember">
              <label for="remember">
               souvenir de moi
              </label> -->
            </div>
          </div>
          <!-- /.col -->
          <div class="col-5">
            <input type="submit" id="admin_login" name="admin_login" class="btn btn-primary btn-block" value="Connexion">
          </div>
          <!-- /.col -->
        </div>

      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
</div>

<?php include "components/footer.php"; ?>

<script src="../js/_admin_login.js"></script>
