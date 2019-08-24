<div id="ModifCargo">
	<script>$(".chosen-select").chosen({disable_search_threshold: 10});</script>
	<div class="panel panel-primary">
		<form action="" method="post" name="frm_cargo" id="frm_cargo">
			<div class="color-heading" id="Busqueda">
				<?php if (isset($ModifCargo)) { ?>
					<strong>&nbsp;&nbsp;MODIFICAR CARGOS</strong>
				<?php	} else { ?>
					<strong>&nbsp;&nbsp;BUSCAR CARGOS</strong>
				<?php } ?>		
			</div>		

				<table class="table table-sm table-striped">
					<tr align="left">
						<td><label for=""><strong>Descripción:</strong></label></td>
						<td>
							<?php if (isset($ModifCargo)) { ?>
								<input type="text" class="form-control form-control-sm" id="descripcion" value="<?php if (isset($ModifCargo)) echo $ModifCargo[0]->DESCRIPCIONCARGO; ?>" disabled>
							<?php	} else { ?>
								<input type="text" class="form-control form-control-sm" id="descripcion" placeholder="Descripción">
							<?php } ?>
						</td>
					</tr>
					<tr>	
						<td><label for=""><strong>Objetivo:</strong></label></td> 
						<td>
							<?php if (isset($ModifCargo)) { ?>
								<textarea class="form-control" id="objetivo" rows="3" disabled><?php if (isset($ModifCargo)) echo $ModifCargo[0]->OBJETIVOCARGO; ?></textarea>
							<?php	} else { ?>
								<textarea class="form-control" id="objetivo" rows="3"></textarea>
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
								<?php if (isset($ModifCargo)) { ?>
									<option value="<?php if (isset($ModifCargo)) echo $ModifCargo[0]->IDESTADO; ?>">
									<?php if (isset($ModifCargo)) echo $ModifCargo[0]->DESCRIPCIONESTADO; ?>
									</option>
									<?php if($ModifCargo[0]->IDESTADO == 1) { ?>
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
						<?php if (isset($ModifCargo)) { ?>
							<button class="btn btn-primary active btn-sm" type="button" onclick="CrudActualizarCargo(<?php echo $ModifCargo[0]->IDCARGO; ?>);">Modificar</button>
						<?php	} else { ?>
							<button class="btn btn-primary active btn-sm" type="button" onclick="BuscarCargo();">Buscar</button>							
						<?php } ?>	

						</td>
					</tr>
				</table>

			<div id="ConsultaCargos"></div>
		
		</form>
	</div>
</div>