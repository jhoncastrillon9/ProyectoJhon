  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Clientes
        <small>Listado</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
<div class="col-md-10 col-md-offset-1">
  <?php 
        if (isset($tabla)) {
          echo $tabla;
        }
     ?>

</div>
    
    </section>
    <!-- /.content -->
  </div>