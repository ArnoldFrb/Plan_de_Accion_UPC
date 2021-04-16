<?php
require 'header.php';
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
                          <h1 class="box-title">Responsable <button class="btn btn-success" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive"" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Apellidos & Nombres</th>
                            <th>Identificacion</th>
                            <th>Telefono</th>
                            <th>Cargo</th>
                            <th>E-Mail</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Apellidos & Nombres</th>
                            <th>Identificacion</th>
                            <th>Telefono</th>
                            <th>Cargo</th>
                            <th>E-Mail</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <label>Primer Apellido:</label>
                            <input type="hidden" name="idresponsable" id="idresponsable">
                            <input type="text" class="form-control" name="primer_apellido" id="primer_apellido" maxlength="15" placeholder="Primer Apellido" required>
                          </div>
                          <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">                 
                            <label>Segundo Apellido:</label>
                            <input type="text" class="form-control" name="segundo_apellido" id="segundo_apellido" maxlength="15" placeholder="Segundo Apellido" required>
                          </div>
                          <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <label>Primer Nombre:</label>
                            <input type="text" class="form-control" name="primer_nombre" id="primer_nombre" maxlength="15" placeholder="Primer Nombre" required>
                          </div>
                          <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <label>Segundo Nombre:</label>
                            <input type="text" class="form-control" name="segundo_nombre" id="segundo_nombre" maxlength="15" placeholder="Segundo Nombre" required>
                          </div>
                          <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-12">
                            <label>Identificacion:</label>
                            <input type="text" class="form-control" name="identificacion" id="identificacion" maxlength="11" placeholder="Identificacion" required>
                          </div>
                          <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-12">
                            <label>Telefono:</label>
                            <input type="text" class="form-control" name="telefono" id="telefono" maxlength="10" placeholder="Telefono" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Cargo:</label>
                            <input type="text" class="form-control" name="cargo" id="cargo" maxlength="30" placeholder="Cargo" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Email:</label>
                            <input type="email" class="form-control" name="e_mail" id="e_mail" maxlength="30" placeholder="E_Mail" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-10">
                            <label>Usuario:</label>
                            <input type="text" class="form-control" name="usuario" id="usuario" maxlength="30" placeholder="Usuario" required>
                          </div>
                          <div class="form-group col-lg-1 col-md-1 col-sm-1 col-xs-2">
                            <label>Validacion</label>
                            <input type="text" class="form-control" name="usuario" maxlength="30" placeholder="validar(usuario)" >
                          </div>
                          <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Contraseña:</label>
                            <input type="password" class="form-control" name="contraseña" id="contraseña" maxlength="15" placeholder="Contraseña" required>
                          </div>
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-success" onclick="validar(usuario)" type="button"><i class="fa fa-question-circle"></i> Validar</button>
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
require 'footer.php';
?>
<script type="text/javascript" src="scripts/responsable.js"></script>