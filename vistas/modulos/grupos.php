<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h4 class="m-b-10">Listado de Grupos</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="inicio"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="inicio">Inicio</a>
                        </li>
                        <li class="breadcrumb-item"><a href="ruta=grupos">Grupos</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-body start -->
                <div class="page-body">
                    <!-- Basic table card start -->
                    <div class="card">
                        <div class="card-header">
                            <h5>Listado de Grupos</h5>
                            <a href="nuevo-grupo"><button type="button" class="btn btn-primary" name="button">Nuevo</button></a>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                    <li><i class="fa fa-window-maximize full-card"></i></li>
                                    <li><i class="fa fa-minus minimize-card"></i></li>
                                    <li><i class="fa fa-refresh reload-card"></i></li>
                                    <li><i class="fa fa-trash close-card"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                              <table id="example" class="display tablas" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th style="text-align:center;">Mails</th>
                                        <th style="text-align:center;">Descripción</th>
                                        <th style="text-align:center;">Estado</th>
                                        <th style="text-align:center;">Adjunto</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                    $grupos = new ControladorGrupos();
                                    $grupos = $grupos -> ctrMostrarGrupos();

                                    foreach ($grupos as $grupo) {

                                        $id=$grupo['id'];

                                      ?>
                                      <tr>
                                        <td><?php echo $grupo['nombre']; ?></td>
                                        <td style="text-align:center;"><h5><?php echo $grupo['cant_mails']; ?></h5></td>
                                        <td style="text-align:center;"><?php echo $grupo['descripcion']; ?></td>
                                        <td style="text-align:center;"><?php if ($grupo['activo']==1) {
                                          echo "<span class='label label-success'>ACTIVO</span>";
                                        } else {
                                          echo "<span class='label label-danger'>INACTIVO</span>";
                                        }?></td>
                                        <td style="text-align:center;"><?php if ($grupo['adjunto']==1) {
                                          echo "<span class='label label-success'>SI</span>";
                                        } else {
                                          echo "<span class='label label-danger'>NO</span>";
                                        }?></td>

                                        <td>

                                          <a href="index.php?ruta=editar-grupo&id=<?php echo $grupo['id'];?>&nombre=<?php echo $grupo['nombre']; ?>"> <button type="button" class="btn btn-warning waves-effect waves-light">Editar</button></a>
                                          <!--<a href="#"> <button type="button" class="btn btn-danger waves-effect waves-light btnEliminarGrupo" idGrupo="<?php //echo $id; ?>">Borrar</button></a>-->
                                          <button type="button" name="view" value="Ver" id="<?php echo $grupo["id"]; ?>" class="btn btn-info btn-xs view_data"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                          <?php if ($grupo['activo']==1 and $grupo['enviado']==0): ?>
                                          <a href="index.php?ruta=bat&id=<?php echo $grupo['id']; ?>&path=<?php echo $grupo['path_bat']; ?>"> <button type="button" name="button" class="btn btn-danger" onclick="return confirm('¿Confirma envio de mails?');">Enviar</button> </a>
                                          <?php endif; ?>
                                          <?php if ($grupo['enviado']==1): ?>
                                          <button type="button" name="button" class="btn btn-success">Enviado</i></button>
                                          <a href="index.php?ruta=grupos&id=<?php echo $grupo['id']; ?>&valor=0"> <button type="button" class="btn btn-danger" name="desbloquear">Activar envío</button> </a>
                                          <?php endif; ?>

                                        </td>
                                      </tr>
                                  <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                      <th>Nombre</th>
                                      <th style="text-align:center;">Mails</th>
                                      <th style="text-align:center;">Descripción</th>
                                      <th style="text-align:center;">Estado</th>
                                      <th style="text-align:center;">Adjunto</th>
                                      <th>Acciones</th>
                                    </tr>
                                </tfoot>
                            </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Page-body end -->
            </div>
        </div>
        <!-- Main-body end -->

        <div id="styleSelector">

        </div>
    </div>
</div>

<?php

  $borrarGrupo = new ControladorGrupos();
  $borrarGrupo -> ctrBorrarGrupo();

?>

<?php

  if (isset($_GET['id']) and isset($_GET['valor'])) {

    if ($_GET['valor']==0) {

      $id=$_GET['id'];
      $activar = new ControladorGrupos();
      $activar -> ctrActivarEnvio($id);

    }

  }


?>

<br><br>
<div id="dataModal" class="modal fade">
      <div class="modal-dialog">
           <div class="modal-content">
                <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title">Detalle grupo</h4>
                </div>
                <div class="modal-body" id="detalles">
                </div>
                <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
           </div>
      </div>
 </div>
