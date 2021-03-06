<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();
 
if (!isset($_SESSION["nombre"]))
{
  header("Location: login.html");
}
else
{
require 'header.php';
if ($_SESSION['recurso']==1)
{
?>
  <!-- Content Wrapper. Contains page content -->
  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">Tabla <button class="btn btn-success" id="btnAgregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive"" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Recursos humanos</th>
                            <th>Recursos fisicos</th>
                            <th>Recursos financieros</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Recursos humanos</th>
                            <th>Recursos fisicos</th>
                            <th>Recursos financieros</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-12">
                            <label>Recursos humanos:</label>
                            <input type="hidden" name="idrecurso" id="idrecurso">
                            <input type="text" class="form-control" name="recurso_humano" id="recurso_humano" maxlength="100" placeholder="Recurso humano" required>
                          </div>
                          <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">                 
                            <label>Recursos fisicos:</label>
                            <input type="text" class="form-control" name="recurso_fisico" id="recurso_fisico" maxlength="100" placeholder="Recurso fisico" required>
                          </div>
                          <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <label>Recursos financieros:</label>
                            <input type="text" class="form-control" name="recurso_financiero" id="recurso_financiero" maxlength="100" placeholder="Recurso financiero" required>
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
  <!-- /.content-wrapper -->
<?php
}
else
{
  require 'noacceso.php';
}
require 'footer.php';
?>
<script type="text/javascript" src="scripts/recursos.js"></script>

<?php
}
ob_end_flush();
?>