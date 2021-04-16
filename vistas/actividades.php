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
                          <h1 class="box-title">Actividades <button class="btn btn-success" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive"" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>OPCIONES</th>
                            <th>EJE ESTRATÉGICO</th>
                            <th>ESTRATEGIA</th>
                            <th>PROGRAMAS</th>
                            <th>No.</th>
                            <th>INICIATIVAS ESTRATEGICAS</th>
                            <th>DESCRIPCION DE LA META</th>
                            <th>RECURSO HUMANOS</th>
                            <th>RECURSO FISICOS</th>
                            <th>RECURSO FINANCI.</th>
                            <th>RESPONSABLE</th>
                            <th>CARGO</th>
                            <th>TIEMPO DE DURACIÓN</th>
                            <th>UNIDAD DE TIEMPO</th>
                            <th>INDICADOR CLAVE DE RENDIMIENTO</th>
                            <th>ESTADO</th>
                          </thead>
                          <tbody>
                          </tbody>
                          <tfoot>
                            <th>OPCIONES</th>
                            <th>EJE ESTRATÉGICO</th>
                            <th>ESTRATEGIA</th>
                            <th>PROGRAMAS</th>
                            <th>No.</th>
                            <th>INICIATIVAS ESTRATEGICAS</th>
                            <th>DESCRIPCION DE LA META</th>
                            <th>RECURSO HUMANOS</th>
                            <th>RECURSO FISICOS</th>
                            <th>RECURSO FINANCI.</th>
                            <th>RESPONSABLE</th>
                            <th>CARGO</th>
                            <th>TIEMPO DE DURACIÓN</th>
                            <th>UNIDAD DE TIEMPO</th>
                            <th>INDICADOR CLAVE DE RENDIMIENTO</th>
                            <th>ESTADO</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-1 col-md-1 col-sm-1 col-xs-12">
                            <label>No.:</label>
                            <input type="hidden" name="idactividades" id="idactividades">
                            <input type="hidden" name="idusuario" id="idusuario" value="<?php echo $_SESSION['idusuario']; ?>">
                            <input type="text" class="form-control" name="codigo" id="codigo" maxlength="3" placeholder="No." required>
                          </div>
                          <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-12">
                            <label>Iniciativas estrategicas:</label>
                            <textarea type="text" class="form-control" name="iniciativas_est" id="iniciativas_est" maxlength="500" placeholder="Iniciativas estrategicas" required></textarea>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">                 
                            <label>Describcion de la meta:</label>
                            <textarea type="text" class="form-control" name="meta" id="meta" maxlength="500" placeholder="Describcion de la meta" required></textarea>
                          </div>
                          <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-12">
                            <label>Tiempo de duracion:</label>
                            <input type="text" class="form-control" name="tiempo_duracion" id="tiempo_duracion" maxlength="25" placeholder="Tiempo de duracion" required>
                          </div>
                          <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-12">                 
                            <label>Unidada de tiempo:</label>
                            <input type="text" class="form-control" name="tiempo_unidad" id="tiempo_unidad" maxlength="10" placeholder="Unidada de tiempo" required>
                          </div>
                          <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-12">
                            <label>Indicador clave de rendimiento:</label>
                            <input type="text" class="form-control" name="indicador_rendimiento" id="indicador_rendimiento" maxlength="100" placeholder="Indicador clave de rendimiento" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Programa:</label>
                            <select class="form-control selectpicker" name="idprograma" id="idprograma" required></select>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Eje estrategico:</label>
                            <select class="form-control selectpicker" data-live-search="true" name="ideje_estrategico" id="ideje_estrategico" required></select>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Recursos:</label>
                            <select class="form-control selectpicker" name="idrecursos" id="idrecursos" required></select>
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
<script type="text/javascript" src="scripts/actividades.js"></script>

<?php
}
ob_end_flush();
?>