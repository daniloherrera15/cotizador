 
  <div class="content-wrapper">
       <section class="content-header">
      <h1>
        Cliente
        <small>Crear Cliente</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-users"></i> Cliente</a></li>
        <li class="active">R. Cliente</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
    <div class="panel-group">
    <div class="panel panel-primary">
    <div class="panel-heading" align="center"><b>Registro Clientes</b></div>
     <div class="form-box" style="overflow:auto;">
      <form id="cclie" name="cclie"  enctype="multipart/form-data" method="post">       
        <div class="body bg-gray">
          Nombre(s):
          <input type="text" id="nom" name="nom" class="form-control" placeholder="(Nombres)" required autofocus required>
          Apellidos:
          <input type="text" name="ape" id="ape" class="form-control" placeholder="(Apellidos)" required autofocus required >
          NIT/Cedula:
          <input type="text" id="ide" name="ide" class="form-control" placeholder="(Identificación)" required autofocus required >
          Razón Social:
          <input type="text" id="rso" name="rso" class="form-control" placeholder="(Razón Social)" required autofocus required >
          Telefono:
          <input type="text" name="tel" id="tel" class="form-control" placeholder="(Telefono)" required autofocus required >
          Celular:
          <input type="text" name="cel" id="cel" class="form-control" placeholder="(Celular)" required autofocus required >
          E-Mail:
          <input type="text" name="ema" id="ema" class="form-control" placeholder="(E-Mail)" required autofocus required >
          Ciudad:
          <input type="text" name="ciu" id="ciu" class="form-control" placeholder="(Ciudad)" required autofocus required >
          Dirección:
          <input type="text" name="dir" id="dir" class="form-control" placeholder="(Dirección)" required autofocus required >
          <br>
          <div align="center">
          <input type="button" onclick="javascript:ingresar_datos()" class="btn bg-blue " value="Registrar">
          <input type="button" class="btn bg-blue " value="Limpiar">
          <div>
        </div>
       </form>
      </div>
     </div>
   </div>
  </section>
  </div>