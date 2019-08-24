<div id="ModifCiudades">
	<script>$(".chosen-select").chosen({disable_search_threshold: 10});</script>
	<div class="panel panel-primary">
		<div class="color-heading">
			<?php if(Isset($ModifCiudades)) {?>
				<strong>&nbsp;&nbsp;MODIFICAR CIUDADES</strong>
			<?php } else {?>
				<strong>&nbsp;&nbsp;BUSCAR CIUDADES</strong>
			<?php } ?>
		</div>	

		<form action="" method="post" name="frm_ciudad" id="frm_ciudad">

			<table class="table table-sm table-striped">
				<tr align="left">
					<td><label for=""><strong>Descripción:</strong></label></td>
					<td>
						<?php if(Isset($ModifCiudades)) { ?>
							<input type="text" class="form-control form-control-sm" id="descripcion" value="<?php if(Isset($ModifCiudades)) echo $ModifCiudades[0]->DESCRIPCIONCIUDAD; ?>" disabled>
						<?php } else { ?>
							<input type="text" class="form-control form-control-sm" id="descripcion" placeholder="Descripción">
						<?php } ?>
					</td>
				</tr>
				<tr>	
					<td><label for=""><strong>Abreviatura:</strong></label></td> 
					<td>
						<?php if(Isset($ModifCiudades)) {?>
							<input type="text" class="form-control form-control-sm" id="abreviatura" value="<?php if(Isset($ModifCiudades)) echo $ModifCiudades[0]->ABREVIATURACIUDAD; ?>" disabled>
						<?php } else {?>
							<input type="text" class="form-control form-control-sm" id="abreviatura" placeholder="Codigo Abreviado">
						<?php } ?>
					</td>																	
				</tr>
				<tr align="left">
					<td><label for=""><strong>Estado:</strong></label></td> 
					<td>
						<select id="idestado" class="chosen-select" style="width:200px">
							<?php if (isset($IdEstado)) { 
								foreach ($IdEstado as $key => $value):
									echo "<option value=".$value->IDESTADO.">".$value->DESCRIPCIONESTADO."</option>";
							 	endforeach;
							} else { ?>	
							<?php if (isset($ModifCiudades)) { ?>
								<option value="<?php if (isset($ModifCiudades)) echo $ModifCiudades[0]->IDESTADO; ?>">
								<?php if (isset($ModifCiudades)) echo $ModifCiudades[0]->DESCRIPCIONESTADO; ?>
								</option>
								<?php if($ModifCiudades[0]->IDESTADO == 1) { ?>
									<option value="2">INACTIVO</option>
									<?php } else { ?>	
									<option value="1">ACTIVO</option>
							<?php
								}		
							 }
							} ?>
						</select>	
					</td>						
				</tr>					            
				<tr>		
					<td align="right" colspan="8">
						<?php if (isset($ModifCiudades)) { ?>
							<button class="btn btn-primary active btn-sm" type="button" onclick="CrudActualizarCiudad(<?php echo $ModifCiudades[0]->IDCIUDAD; ?>);">Modificar</button>		
						<?php } else { ?>	
							<button class="btn btn-primary active btn-sm" type="button" onclick="BuscarCiudades();">Buscar</button>		
						<?php } ?>
					</td>
				</tr>
			</table>

			<div id="ConsultaCiudades"></div>

		</form>
	</div>
</div>
