 
  <div class="content-wrapper">
       <section class="content-header">
      <h1>
        Cotización Electronica.
        <small>Cotizaciones Aprobadas/Rechazadas</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-calculator"></i> Cotizaciones</a></li>
        <li class="active">Aprobadas/Rechazadas</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div id="cas1" name="cas1" >
  <div class = "row">
    <div class="col-md-11"  style="margin-left: 15px;
    margin-top: 15px;">
    <form id="buscar" name="buscar">
    <div class = "row">
       <div class="col-lg-2 col-xs-6">
        <label> Cuenta: </label>
    <input type="text" class="form-control" id="cue" name="cue" style="background:#FFFFFF;">
    </div>
       <div class="col-lg-2 col-xs-6">
        <label> Filtrar Desde:</label>
    <input type="text" class="form-control" id="fds" name="fds" style="background:#FFFFFF;" readonly>
 
    </div>

     <div class="col-lg-2 col-xs-6">
    <label> Hasta:</label>
    <input type="text" class="form-control" id="fhs" name="fhs" style="background:#FFFFFF;" required readonly>
    
  </div>
       <div class="col-lg-2 col-xs-6">
          </br>
          <input type="button" class="btn btn-primary btn-bg" value="Ir" onclick="javascript:buscar_cue_por_fecha()" >
       </div>
  </div>
  </form>
</div>
    <div class="col-md-11"  style="margin-left: 15px;
    margin-top: 15px;">
    <div class="panel panel-primary">
      <div class="panel-heading">Información General</div>
      <div class="panel-body">
       <input type ="submit" onclick="location='../epages/reg_cotizacion.php'" class="btn bg-blue btn-sm" style="margin-top:8px"  Value="Crear Cotizacion" name="crea_comp" id="crea_comp">
      <div id="tabla_reporte">


       <?php 
       //include ("../views/tablac.php"); 
       ?>
       </div>
     </div>
   </div>
   <input type="button" class="btn bg-blue btn-sm" value="Filtrar por Tercero" onclick="javascript:buscar_por_tercero()">
 </div> 
</div>
</div>
<div id="cas3" style="display:none">
 

</div>

    <div id="cas2" name="cas2" style="display:none" >
  <div class = "row">
    <div class="col-md-11"  style="margin-left: 15px;
    margin-top: 15px;">
    <form id="buscar" name="buscar">
    <div class = "row">
       <div class="col-lg-2 col-xs-6">
        <label> Tercero </label>
    <input type="text" class="form-control" id="ter" name="ter" onclick="javascript:ver_terceros()" style="background:#FFFFFF;">
    </div>
       <div class="col-lg-2 col-xs-6">
        <label> Filtrar Desde:</label>
    <input type="text" class="form-control" id="fdst" name="fdst" style="background:#FFFFFF;" readonly>
    
    </div>

     <div class="col-lg-2 col-xs-6">
    <label> Hasta:</label>
    <input type="text" class="form-control" id="fhst" name="fhst" style="background:#FFFFFF;" required readonly>
    
  </div>
       <div class="col-lg-2 col-xs-6">
          </br>
          <input type="button" class="btn btn-primary btn-bg" value="Ir" onclick="javascript:buscar_ter_por_fecha()" >
       </div>
  </div>
  </form>
</div>
    <div class="col-md-11"  style="margin-left: 15px;
    margin-top: 15px;">
    <div class="panel panel-primary">
      <div class="panel-heading">Informacion General</div>
      <div class="panel-body">
       <input type ="submit" onclick="location='../reg_cotizacion.php'" class="btn bg-blue btn-sm" style="margin-top:8px"  Value="Crear Cotizacion" name="crea_comp" id="crea_comp">
      <div id="prueba_reporte_ter">


       <?php 
       //include ("../views/tablac.php"); 
       ?>
       </div>
     </div>
   </div>
      <input type="button" class="btn bg-blue btn-sm" onclick="javascript:buscar_por_cuenta()" value="Filtrar por Nª de Cuenta">
 </div>
</div>
</div>
<div id="cas4" style="display:none">
 

</div>
<input type="hidden" id="cons" name="cons" value="0"> 
  </section>
  </div>