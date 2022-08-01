 <?php
  include_once "./components/header.php";
?>


 <div class="wrapper">

  <?php include 'components/navbar.php'; ?>
  <?php include  'components/sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../public/assets/user-img/<?php echo $resultat['img'] ?> "
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">
                  <?php echo $resultat['nom']; ?>
                </h3>

                <p class="text-muted text-center">
                  <?php echo $resultat['role']; ?>
                </p>

                <ul class="list-group list-group-unbordered mb-3">
                 <li class="list-group-item">
                    <b>Sexe :</b> <a class="float-right"> <?php echo $resultat['sexe']; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Role :</b> <a class="float-right"> <?php echo $resultat['role']; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Telephone :</b> <a class="float-right"> <?php echo $resultat['telephone']; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Email :</b> <a class="float-right"> <?php echo $resultat['email']; ?></a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <h5 class="text text-primary">Mis a jour</h5>
              </div><!-- /.card-header -->
              <div class="card-body">
                 <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nom</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" value="<?php echo $resultat['nom']; ?>" id="inputName" placeholder="Name">
                        </div>
                      </div>
                       <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Sexe</label>
                          <div class="col-sm-10">
                             <input type="text" class="form-control" value="<?php echo $resultat['sexe']; ?>" id="inputName" placeholder="Name">
                           </div>
                        </div>
                         <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Role</label>
                             <div class="col-sm-10">
                               <input type="text" class="form-control" value="<?php echo $resultat['role']; ?>" id="inputName" placeholder="Name">
                            </div>
                        </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" value="<?php echo $resultat['email']; ?>" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Telephone</label>
                        <div class="col-sm-10">
                          <input type="tel" class="form-control" id="inputName2" value="<?php echo $resultat['telephone']; ?>" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                          <input type="text" disabled class="form-control" id="inputSkills" value="<?php echo $resultat['status']; ?>" placeholder="Skills">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Editer</button>
                        </div>
                      </div>
                    </form>
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>

          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <?php
include_once "./components/footer.php";
?>