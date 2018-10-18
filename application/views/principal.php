<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*Se recomeinda crear una caretra para los recuersos como Assets*/
?>

<!DOCTYPE html>
<html>
<head>
	<?php echo base_url() ?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Aplicativo de administracion de sitios web</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->  

<?php   include("incluidos/css.php") ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php   include("incluidos/head.php") ?>

<?php   include("incluidos/menu.php") ?>
  <!-- Content Wrapper. Contains page content -->

<?php   include("incluidos/Contenidoprincipal.php") ?>
<?php   include("incluidos/footer.php") ?>
<?php   include("incluidos/js.php") ?>
</body>
</html>
