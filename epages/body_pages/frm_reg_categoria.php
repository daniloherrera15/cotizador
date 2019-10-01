 
  <div class="content-wrapper">
       <section class="content-header">
      <h1>
        Categorias
        <small>Crear Categorias</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-video-camera"></i> Articulos</a></li>
        <li class="active">R. Categorias</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <input type="hidden" id="form_view" name="form_view" value="3">
      <!-- Small boxes (Stat box) -->
     <div class="row">
      <div id="utab" name="utab">
      <div class="col-lg-8 col-xs-6">
        <!-- Main content -->
        <section class="content">
          
          <input type="button" id="pru"  name="pru" value="Mostrar Tabla" onclick="javascript:ver_cate()"> 
          <div id="table_container" name="table_container">
          </div>
        </section>
      </div>
      </div>
    <div class="col-lg-4 col-xs-6">
    <div class="panel-group">
    <div class="panel panel-primary">
    <div class="panel-heading" align="center"><b>Registro Categoria</b></div>
     <div class="form-box" style="overflow:auto;">
      <form id="categ" name="categ"  enctype="multipart/form-data" method="post">       
        <div class="body bg-gray">
          Nombre Categoria:
          <input type="text" id="cate" name="cate" class="form-control" placeholder="(Categoria)" required autofocus required>
          Descripcion:
          <textarea class="form-control" rows="3" id="desc" name="desc"></textarea><br>
          <div id="gbut" align="center">
          <input type="button" onclick="javascript:ingresar_datos_categoria()" class="btn bg-blue " value="Registrar">
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