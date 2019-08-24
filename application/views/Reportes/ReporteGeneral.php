<form action="<?php echo base_url(); ?>Con_reportes/ReporteExcelEvaluacion" method="post" name="frm_usuarios" id="frm_usuarios" target="_blank">
	<div id="ReporteGeneral">

		<div class="color-heading">
			<strong>&nbsp;&nbsp;REPORTE GENERAL</strong>
		</div>	

		<table class="table table-sm table-striped">
			<tr align="left">
				<td><label for=""><strong>Jefe a Cargo:</strong></label></td> 
				<td>
					<select id="idjefe" name="idjefe" class="chosen-select" style="width:200px">
						<option value="">Seleccione un jefe</option> <?php
							foreach ($idusu as $key => $value):
								echo "<option value=".$value->IDUSUARIOS.">".$value->APELLIDOUSUARIO." ".$value->NOMBREUSUARIO."</option>";
						 	endforeach; ?>		
					</select>
				</td>						
				<td><label for=""><strong>Cargo:</strong></label></td> 
				<td>
					<select id="idcargo" name="idcargo" class="chosen-select" style="width:200px">
						<option value="-1">Seleccione un cargo</option> <?php
							foreach ($idcargo as $key => $value):
								echo "<option value=".$value->IDCARGO.">".$value->DESCRIPCIONCARGO."</option>";
						 	endforeach; ?>		
					</select>
				</td>						
			</tr>	
			<tr align="left">
				<td><label for=""><strong>Dependencia:</strong></label></td> 
				<td>
					<select id="iddependencia" name="iddependencia" class="chosen-select" style="width:200px">
						<option value="-1">Seleccione un dependencia</option> <?php
							foreach ($iddependencias as $key => $value):
								echo "<option value=".$value->IDDEPENDENCIA.">".$value->DESCRIPCIONDEPENDENCIA."</option>";
						 	endforeach; ?>		
					</select>
				</td>		
				<td><label for=""><strong>Ciudad:</strong></label></td> 
				<td>
					<select id="idciudad" name="idciudad" class="chosen-select" style="width:200px">
						<option value="-1">Seleccione una ciudad</option> <?php
							foreach ($idciudades as $key => $value):
								echo "<option value=".$value->IDCIUDAD.">".$value->DESCRIPCIONCIUDAD."</option>";
						 	endforeach; ?>		
					</select>
				</td>										
			</tr>		
			<tr align="left">
				<td><label for=""><strong>Empresa:</strong></label></td> 
				<td>
					<select id="idempresa" name="idempresa" class="chosen-select" style="width:200px">
						<option value="-1">Seleccione una empresa</option> <?php
							foreach ($idempresas as $key => $value):
								echo "<option value=".$value->IDEMPRESA.">".$value->NOMBREEMPRESA."</option>";
						 	endforeach; ?>		
					</select>
				</td>		
				<td><label for=""><strong>Año Encuesta:</strong></label></td>
				<td>
					<input type="text" class="form-control form-control-sm" id="anoencuesta" placeholder="Año Encuesta">						
				</td>
			</tr>					     							            
			<tr>		
				<td align="right" colspan="8">
					<button class="btn btn-primary active btn-sm" type="button" onclick="ReporteBusqueda();">Buscar</button>
					<button class="btn btn-primary active btn-sm" type="submit" style="background-color: #57FF03; border: 1px solid #57FF03;">Reporte Excel</button>		
				</td>
			</tr>
		</table>
	</div>

	<div id="ReporteConsulta"></div>
</form>
