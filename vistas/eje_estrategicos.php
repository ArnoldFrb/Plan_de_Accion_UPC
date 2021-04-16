<?php

//activar almacenamiento e el buffer
ob_start();
session_start();

if (!isset($_SESSION['nombre'])) 
{
  header("Location: login.html");
}
else
{

require 'header.php';
if ($_SESSION['estrategias_programas']==1)
{
?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">Ejes Estrategicos <button class="btn btn-success" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive"" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Eje Estrategico</th>
                            <th>Estrategia</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Eje Estrategico</th>
                            <th>Estrategia</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Eje estrategicos:</label>
                            <input type="hidden" name="ideje_estrategico" id="ideje_estrategico">
                            <input type="text" class="form-control" name="eje_estrategico" id="eje_estrategico" maxlength="15" placeholder="Eje estrategicos" required>
                          </div>
                          <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12">                 
                            <label>Estrategia:</label>
                            <input type="text" class="form-control" name="estrategia" id="estrategia" maxlength="250" placeholder="Estrategia" required>
                          </div>                          
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>
                        </form>
                    </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
<?php
}
else
{
  require 'noacceso.php';
}
require 'footer.php';
?>
<script type="text/javascript" src="scripts/eje_estrategicos.js"></script>

<?php
}
ob_end_flush();
?>