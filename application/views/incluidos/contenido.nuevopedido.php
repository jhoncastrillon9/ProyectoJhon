<?php
/*
Este Script contiene el proceso para nuevos pedidos
*/
?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Pedidos
        <small>Realizar un nuevo pedido</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('principal')?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="<?php echo site_url('pedidos')?>"><i class="fa fa-circle-o"></i> Pedidos</a></li>
        <li class="active">Nuevo</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        
        <div class="col-lg-3 col-xs-6">
          <span id="carrito" class="btn btn-info">El pedido va en: </span>
        </div>

      </div>

      <div class="row">
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Producto</th>
                  <th>Referencia</th>
                  <th>Valor</th>
                  <th>Impuestos</th>
                  <th>Cantidad</th>
                  <th>Subtotal</th>
                  <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
              <?php foreach ($listaproductos as $fila) {?>
              
                <tr>
                  <td align="center">
                    <img style="width: 100px;" src="<?php echo base_url()?>/assets/imagenes/productos/<?php echo $fila["imagen"]?>">
                    <br>
                    <?php echo $fila["nombre"];?>
                      

                    </td>
                  <td><?php echo $fila["referencia"];?></td>
                  <td><input type="number" style="width: 110px" maxlength="20" class="form-control" name="valor" id="valor" value="<?php echo $fila["precio"]?>"></td>
                  <td><input type="number" style="width: 60px"  class="form-control" name="impuesto" maxlength="4" id="impuesto" value="<?php echo $fila["impuestos"]?>"></td>
                  <td><input type="number" style="width: 60px"  class="form-control" name="cantidad" maxlength="4" id="cantidad" value=""></td>
                  <td><input type="number"  class="form-control" name="subtotal" id="valorsubtotal" value="" readonly></td>
                  <td><button name="agregar" id="agregar" class="btn btn-success"><i class="fa fa-plus" title="Click para agregar este producto (<?php echo $fila["nombre"];?>)"></i></td>
                </tr>
              <?php } ?>
                
              </tbody>
            </table>
      </div> 

    </section>
  </div>