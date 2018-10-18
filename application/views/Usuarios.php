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

<?php   include("incluidos/css.php") ?>
<?php 
if (isset($css_files)) {
	# si la variables css files existes cargamos estilos que trae
	foreach ($css_files as $rutacss) {
		# por cada archivo css 
	 ?>
	 <link rel="stylesheet" type="text/css" href="<?php echo $rutacss ?>">
	 <?php  
	}
}
 ?>

</head>
<body class="hold-transition skin-blue sidebar-mini">

<?php   include("incluidos/head.php") ?>
<?php   include("incluidos/menu.php") ?>
  <!-- Content Wrapper. Contains page content -->

<?php   include("incluidos/contenidousuarios.php") ?>
<?php   include("incluidos/footer.php") ?>
<?php   include("incluidos/js.php") ?>
<?php 
if (isset($js_files)) {
	# si la variables css files existes cargamos estilos que trae
	foreach ($js_files as $rutajs) {
		# por cada archivo css 
	 ?>
	 <script type="text/javascript" src="<?php echo $rutajs ?>"></script>
	 <?php  
	}
}
 ?>
</body>
</html>
