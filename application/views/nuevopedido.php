<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*Se recomeinda crear una caretra para los recuersos como Assets*/
?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Aplicativo de administracion de sitios web</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->  
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<?php   include("incluidos/css.php") ?>

</head>
<body class="hold-transition skin-blue sidebar-mini">

<?php   include("incluidos/head.php") ?>
<?php   include("incluidos/menu.php") ?>
  <!-- Content Wrapper. Contains page content -->

<?php include("incluidos/contenido.nuevopedido.php");?>

<?php   include("incluidos/footer.php") ?>
<?php   include("incluidos/js.php") ?>

<script src="<?php echo base_url()?>/assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

</body>
</html>



<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
Vista o pagina de nuevo pedido
*/
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Aplicativo Sistema de Clientes Curso Cesde Administracion de sitios web</title>
  <?php include("incluidos/css.php");?>
   <!-- DataTables -->


</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include("incluidos/header.php");?>
  
  <?php include("incluidos/menu.php");?>

  <?php include("incluidos/contenido.nuevopedido.php");?>

  <?php include("incluidos/footer.php");?>

</div>
<!-- ./wrapper -->
  <?php include("incluidos/js.php");?>
<!-- DataTables -->


</body>
</html>

  