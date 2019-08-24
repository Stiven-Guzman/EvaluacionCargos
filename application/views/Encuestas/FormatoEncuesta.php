	<?php 
	  if (isset($DatosUsuPre)) 
	  { 
	  	?>
			<div class="color-heading">
				<strong>&nbsp;&nbsp;DATOS EMPLEADO</strong>
			</div>				

			<table class="table table-sm table-striped">
				<tr>
					<td><label class="namelabel" for=""><strong>Cedula:</strong></label></td>
					<td>
						<?php if (isset($DatosUsuPre)) { ?>
							<input type="text" class="form-control form-control-sm" id="idusuarios" 
								value="<?php if (isset($DatosUsuPre)) echo $DatosUsuPre[0]->IDUSUARIOS; ?>" disabled>
						<?php	} ?>
					</td> 
					<td><label class="namelabel" for=""><strong>Nombre:</strong></label></td>
					<td>
						<?php if (isset($DatosUsuPre)) { ?>
							<input type="text" class="form-control form-control-sm" id="nomempleado" 
								value="<?php if (isset($DatosUsuPre)) echo $DatosUsuPre[0]->NOMBREUSUARIO; ?>" disabled>
						<?php	} ?>	
					</td> 													
				</tr>
				<tr>
					<td><label class="namelabel" for=""><strong>Cargo:</strong></label></td>
					<td>
						<?php if (isset($DatosUsuPre)) { ?>
							<input type="text" class="form-control form-control-sm" id="idcargo" 
								value="<?php if (isset($DatosUsuPre)) echo $DatosUsuPre[0]->DESCRIPCIONCARGO; ?>" disabled>
						<?php	} ?>	
					</td> 
					<td><label class="namelabel" for=""><strong>Empresa:</strong></label></td>
					<td>
						<?php if (isset($DatosUsuPre)) { ?>
							<?php if ($DatosUsuPre[0]->NOMBREEMPRESA == 'ARAS LTDA') { ?>
								<input type="text" class="form-control form-control-sm confondo-aras" id="idempresa" 
								value="<?php if (isset($DatosUsuPre)) echo $DatosUsuPre[0]->NOMBREEMPRESA; ?>">
							<?php } else { ?>
								<input type="text" class="form-control form-control-sm confondo-gerleinco" id="idempresa" 
								value="<?php if (isset($DatosUsuPre)) echo $DatosUsuPre[0]->NOMBREEMPRESA; ?>">
						<?php	}
							} ?>	
					</td> 
				</tr>
				<tr>
					<td><label class="namelabel" for=""><strong>Jefe:</strong></label></td>
					<td colspan="3">
						<?php if (isset($DatosUsuPre)) { ?>
							<input type="text" class="form-control form-control-sm" id="idjefe" 
								value="<?php if (isset($DatosUsuPre)) echo $DatosUsuPre[0]->JEFE; ?>" disabled>
						<?php	} ?>	
					</td> 													
				</tr>
				<tr>
					<td style="text-align:center;"><strong>OBJETIVO DEL CARGO</strong></td>
					<td colspan="3">			
						<textarea class="form-control" id="objetivo" rows="5"	disabled><?php if (isset($DatosUsuPre)) echo $DatosUsuPre[0]->OBJETIVOCARGO; ?></textarea>				
					</td>
				</tr>
				<tr>
					<td style="text-align:center;"><strong>INSTRUCCIONES DE EVALUACIÓN</strong></td>
					<td colspan="3">
						Evalúe cuidadosamente el desempeño del colaborador de acuerdo a los aspectos que estén relacionadas con su cargo. Seleccione la opción según considere en la casilla "VALOR". Teniendo en cuenta que las escala de calificación es de tres, se establece:<br>
						<strong>1 - Equivale a "Por mejorar".</strong><br>
						<strong>2 - Equivale a "Satisfactorio".</strong><br>
						<strong>3 - Equivale a "Sobresaliente".</strong>
					</td>
				</tr>
			</table>
	<?php	
		} ?>

	<?php 
	  if (isset($ListaPre)) 
	  { ?>
			<div class="color-heading">
				<strong>&nbsp;&nbsp;ENCUESTA</strong>
			</div>				      
      <table  class="table table-sm table-striped" id="crudcargos" style="font-size: small">
      	<th><strong>N°</strong></th>
        <th><strong>Aspectos</strong></th>                
        <th><strong>Calificación</strong></th>      
        <th><strong>Valor</strong></th>      

		    <?php 
		    	$count = 1;
		      foreach ($ListaPre as $key => $cargo)
		      { ?> <tr> 
		      	<input type="hidden" name="idpregunta[]" value="<?php echo $cargo->IDPREGUNTA ?>" >
		      	<input type="hidden" name="numpregunta[]" value="<?php echo $cargo->NUMPREGUNTASCATEGORIZA ?>" >
		      	<td><strong><?php echo $count; ?></strong></td>
		        <td><?php echo $cargo->DESCRIPCIONPREGUNTA ?></td>
		        <td width="110">
		        	<button type="button" class="btn btn-secondary btn-sm" 
		        		value="<?php echo $count;?>" 
		        		id="btn<?php echo $count;?>" 
		        		style="width: 120px;"
		        		tabIndex="-1"
		        		name="btncalifica[]">Por Definir</button>
		        </td>
		        <td>
		        	<input type='text' 
		        		class='form-control form-control-sm' 
		        		name='valor[]' 
		        		id="input<?php echo $count;?>" 
		        		onchange="ColorButton(this.id);" onKeyPress="return soloNumeros(event)">
		        	</td>
	        </tr>  
		    <?php $count ++;
		      } 
		    ?> 
			</table>
			
			<div class="color-heading">
				<strong>&nbsp;&nbsp;OBSERVACIONES</strong>
			</div>				      

      <table  class="table table-sm table-striped" id="crudcargos" style="font-size: small">
		    <tr>
		    	<td style="text-align:center;"><label for=""><strong>Fortalezas:</strong></label></td>
		    	<td style="text-align:center;"><label for=""><strong>A Mejorar:</strong></label></td>
		    	<td style="text-align:center;"><label for=""><strong>Propuesta de Acciones:</strong></label></td>
		    </tr>
				<tr>
		    	<td><textarea class="form-control" id="fortaleza" rows="5"></textarea></td>
		    	<td><textarea class="form-control" id="mejora" rows="5"></textarea></td>
		    	<td><textarea class="form-control" id="propuesta" rows="5"></textarea></td>
				</tr>
				<tr>
		    	<th colspan="3" style="text-align:center;"><label for=""><strong>Observaciones:</strong></label></th>
				</tr>
				<tr>
		    	<td colspan="3">
		    		<textarea class="form-control" id="observaciones" rows="3"></textarea>
		    	</td>
				</tr>
				<tr>
					<td colspan="3">
			      <button type="button" class="btn btn-primary btn-sm" id="GeneraBitacora" onclick="GuardarBitacora();">Guardar</button>	
						<button type="button" 
							id="VistaPreviaReporte" 
							class="btn btn-secondary btn-sm" 
							onclick="GraficoEncuesta(<?php echo $ListaPre[0]->IDUSUARIOS; ?>);" disabled>
							VISTA PREVIA
						</button> 
					</td>
				</tr>
    	</table>
    	<br><br>
  <?php
    } ?> 
