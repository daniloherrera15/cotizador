 
  <div class="content-wrapper">
       <section class="content-header">
      <h1>
        Tipo
        <small>Crear Tipo</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-video-camera"></i> Articulos</a></li>
        <li class="active">R. Tipo</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <input type="hidden" id="form_view" name="form_view" value="5">
      <!-- Small boxes (Stat box) -->
     <div class="row">
      <div id="utab" name="utab">
      <div class="col-lg-8 col-xs-6">
        <section class="content">
          <input type="button" id="pru"  name="pru" value="Mostrar Tabla" onclick="javascript:ver_tipo()"> 
          <div id="table_container" name="table_container">
          </div>
        </section>
      </div>
      </div>
    <div class="col-lg-4 col-xs-6">
    <div class="panel-group">
    <div class="panel panel-primary">
    <div class="panel-heading" align="center"><b>Registro Tipo</b></div>
     <div class="form-box" style="overflow:auto;">
      <form id="tipo" name="tipo"  enctype="multipart/form-data" method="post">       
        <div class="body bg-gray">
          Nombre Tipo:
          <input type="text" id="tip" name="tip" class="form-control" placeholder="(Tipo)" required autofocus required>
          Descripcion:
          <textarea class="form-control" rows="3" id="desc" name="desc"></textarea><br>
          <div id="gbut" align="center">
          <input type="button" onclick="javascript:ingresar_datos_tipo()" class="btn bg-blue " value="Registrar">
          <input type="button" class="btn bg-blue " onclick="javascript:limpiar_tipo()" value="Limpiar">
          </div>
        </div>
       </form>
      </div>
     </div>
   </div>
   </div>
    </div>
  </section>
  </div>