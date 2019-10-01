 
  <div class="content-wrapper">
       <section class="content-header">
      <h1>
        Marca
        <small>Crear Marca</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-users"></i> Articulos</a></li>
        <li class="active">R. Marca</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <input type="hidden" id="form_view" name="form_view" value="2">
      <!-- Small boxes (Stat box) -->
     <div class="col-lg-12 col-xs-12">
      <div class="col-md-8 col-xs-6">
        <!-- Main content -->
        <section class="content">
          <input type="button" id="pru"  name="pru" value="Mostrar Tabla" onclick="javascript:ver_marca()"> 
          <div id="table_container" name="table_container">
          </div>
        </section>
      </div>
    <div class="col-md-4 col-xs-6">
    <div class="panel-group">
    <div class="panel panel-primary">
    <div class="panel-heading" align="center"><b>Registro Marca Articulo</b></div>
     <div class="form-box" style="overflow:auto;">
      <form id="camar" name="camar"  enctype="multipart/form-data" method="post">       
        <div class="body bg-gray">
          Nombre Marca:
          <input type="text" id="marca" name="marca" class="form-control" placeholder="(Marca)" required autofocus required>
          Descripcion:
          <textarea class="form-control" rows="3" id="desc" name="desc"></textarea><br>
          <div id="gbut" align="center">
          <input type="button" onclick="javascript:ingresar_datos_marca()" class="btn bg-blue " value="Registrar">
          <input type="button" class="btn bg-blue " value="Limpiar">
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