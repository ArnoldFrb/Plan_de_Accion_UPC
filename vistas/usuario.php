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
if ($_SESSION['acceso']==1)
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
                          <h1 class="box-title">Usuario <button class="btn btn-success" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive"" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Apellidos & Nombre</th>
                            <th>Tipo de documento</th>
                            <th>Identificacion</th>
                            <th>Direccion</th>
                            <th>Telefono</th>
                            <th>Email</th>
                            <th>Login</th>
                            <th>Imagen</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Apellidos & Nombre</th>
                            <th>Tipo de documento</th>
                            <th>Identificacion</th>
                            <th>Direccion</th>
                            <th>Telefono</th>
                            <th>Email</th>
                            <th>Login</th>
                            <th>Imagen</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body embed-responsive-16by9" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">                          
                          <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <label>Primer Apellido:</label>
                            <input type="hidden" name="idusuario" id="idusuario">
                            <input type="text" class="form-control" name="primer_apellido" id="primer_apellido" maxlength="25" placeholder="Primer Apellido" required>
                          </div>
                          <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">                 
                            <label>Segundo Apellido:</label>
                            <input type="text" class="form-control" name="segundo_apellido" id="segundo_apellido" maxlength="25" placeholder="Segundo Apellido" required>
                          </div>
                          <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <label>Primer Nombre:</label>
                            <input type="text" class="form-control" name="primer_nombre" id="primer_nombre" maxlength="25" placeholder="Primer Nombre" required>
                          </div>
                          <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <label>Segundo Nombre:</label>
                            <input type="text" class="form-control" name="segundo_nombre" id="segundo_nombre" maxlength="25" placeholder="Segundo Nombre" required>
                          </div>
                          <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Tipo de Identificacion:</label>
                            <select  class="form-control selectpicker" name="tipo_documento" id="tipo_documento" maxlength="20" placeholder="Identificacion" required>
                              <option value="CI">CI</option>
                              <option value="CC">CC</option>
                              <option value="TI">TI</option>
                              <option value="TP">RC</option>
                              <option value="CE">CE</option>
                              <option value="CI">Ci</option>
                              <option value="DNI">DNI</option>
                              <option value="DUI">DUI</option>
                              <option value="ID">ID</option>
                            </select>
                          </div>
                          <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Identificacion:</label>
                            <input type="text" class="form-control" name="num_documento" id="num_documento" maxlength="20" placeholder="Identificacion" required>
                          </div>
                          <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Cargo:</label>
                            <input type="text" class="form-control" name="cargo" id="cargo" maxlength="20" placeholder="Cargo" required>
                          </div>
                          <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <label>Direccion:</label>
                            <input type="text" class="form-control" name="direccion" id="direccion" maxlength="70" placeholder="Direccion" required>
                          </div>
                          <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <label>Telefono:</label>
                            <input type="text" class="form-control" name="telefono" id="telefono" maxlength="20" placeholder="Telefono" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Email:</label>
                            <input type="email" class="form-control" name="email" id="email" maxlength="50" placeholder="Email" required>
                          </div>
                          <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-10">
                            <label>Usuario:</label>
                            <input type="text" class="form-control" name="login" id="login" maxlength="20" placeholder="Usuario" required>
                          </div>
                          <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Contraseña:</label>
                            <input type="password" class="form-control" name="clave" id="clave" maxlength="10" placeholder="Contraseña" required>
                          </div>
                          <div class="custom-file col-lg-5 col-md-5 col-sm-5 col-xs-12">
                            <label>Permisos:</label>
                            <ul style="list-style: none;" id="permisos">
                              
                            </ul>
                          </div>
                          <div class="custom-file col-lg-5 col-md-5 col-sm-5 col-xs-12">
                            <label>Imagen</label>
                            <input type="file" class="custom-file-input" name="imagen" id="imagen" placeholder="Imagen">
                            <input type="hidden" name="imagenactual" id="imagenactual">
                            <img src="" width="150px" height="120px" id="imagenmuestra">
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
<script type="text/javascript" src="scripts/usuario.js"></script>

<?php
}
ob_end_flush();
?>