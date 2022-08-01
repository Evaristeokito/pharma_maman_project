<?php 

  include  __DIR__ .'../../action/connection_database.php';

  if(!isset($_SESSION["user_id"]))
  {
      header('location:login');
  }

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pharma | Admin 3</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- DataTable responsive -->
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">

   <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">

  <!-- Select Picker -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.css">
  <!-- Google Font: Source Sans Pro -->

  <!-- scrollbar -->
   <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- end scrollbar -->

   <!-- datepicker -->
   <link rel="stylesheet" href="plugins/datepicker/css/datepicker.css">
  <!-- end datepicker-->

  <!-- iziModal -->
  <link rel="stylesheet" href="plugins/izimodal/modal/css/iziModal.min.css">

  <!-- iziToast -->
  <link rel="stylesheet" href="plugins/iziToast/dist/css/iziToast.min.css">

  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">

  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">


