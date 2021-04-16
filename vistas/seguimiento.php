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
if ($_SESSION['actividad']==1)
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
                          <h1 class="box-title">Seguimientos <button class="btn btn-success" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive"" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Seguimiento</th>
                            <th>Porcentaje de avance en tiempo</th>
                            <th>Porcentaje de avance de la actividad</th>
                            <th>Acciones correctivas</th>
                            <th>No.</th>
                            <th>Iniciativas estrategicas</th>
                            <th>Descripcion de la meta</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Seguimiento</th>
                            <th>Porcentaje de avance en tiempo</th>
                            <th>Porcentaje de avance de la actividad</th>
                            <th>Acciones correctivas</th>
                            <th>No.</th>
                            <th>Iniciativas estrategicas</th>
                            <th>Descripcion de la meta</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">                          
                          <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <label>Seguimiento :</label>
                            <input type="hidden" name="idseguimiento" id="idseguimiento">
                            <textarea type="text" class="form-control" name="seguimiento" id="seguimiento" maxlength="500" placeholder="Seguimiento" required></textarea>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Porcentaje de avance en tiempo:</label>
                            <input type="text" class="form-control" name="porcentaje_avance_tiempo" id="porcentaje_avance_tiempo" maxlength="50" placeholder="Porcentaje de avance en tiempo" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">                 
                            <label>Porcentaje de avance de la actividad:</label>
                            <input type="text" class="form-control" name="porcentaje_avance_actividad" id="porcentaje_avance_actividad" maxlength="50" placeholder="Porcentaje de avance de la actividad" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Acciones correctivas:</label>
                            <textarea type="text" class="form-control" name="acciones_correctivas" id="acciones_correctivas" maxlength="250" placeholder="Acciones correctivas" required></textarea>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Actividad:</label>
                            <select class="form-control selectpicker" data-live-search="true" name="idactividades" id="idactividades" placeholder="Actividad" required></select>
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
<script type="text/javascript" src="scripts/seguimiento.js"></script>

<?php
}
ob_end_flush();
?>