<div Id="ModifNiveles">
	<script>$(".chosen-select").chosen({disable_search_threshold: 10});</script>
	<div class="panel panel-primary">
		<div class="color-heading">
			<?php if(Isset($ModifNiveles)) { ?>
				<strong>&nbsp;&nbsp;MODIFICAR NIVELES</strong>
			<?php } else {?>
				<strong>&nbsp;&nbsp;BUSCAR NIVELES</strong>
			<?php } ?>
		</div>	

		<form action="" method="post" name="frm_cargo" id="frm_cargo">

			<table class="table table-sm table-striped">
				<tr align="left">
					<td><label for=""><strong>Descripción:</strong></label></td>
					<td>
						<?php if(Isset($ModifNiveles)) { ?>
							<input type="text" class="form-control form-control-sm" id="descripcion" value="<?php if (isset($ModifNiveles)) echo $ModifNiveles[0]->DESCRIPCIONCATEGORIZACION; ?>" disabled >
						<?php } else {?>
							<input type="text" class="form-control form-control-sm" id="descripcion" placeholder="Descripción">
						<?php } ?>

					</td>
				</tr>
				<tr>	
					<td><label for=""><strong>Numero de Preguntas:</strong></label></td> 
					<td>
						<?php if(Isset($ModifNiveles)) { ?>
							<input type="text" class="form-control form-control-sm" id="npreguntas" value="<?php if (isset($ModifNiveles)) echo $ModifNiveles[0]->NUMPREGUNTASCATEGORIZA; ?>" disabled>
						<?php } else {?>
							<input type="text" class="form-control form-control-sm" id="npreguntas" placeholder="N° Preguntas">
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
							<?php if (isset($ModifNiveles)) { ?>
								<option value="<?php if (isset($ModifNiveles)) echo $ModifNiveles[0]->IDESTADO; ?>">
								<?php if (isset($ModifNiveles)) echo $ModifNiveles[0]->DESCRIPCIONESTADO; ?>
								</option>
								<?php if($ModifNiveles[0]->IDESTADO == 1) { ?>
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
						<?php if (isset($ModifNiveles)) { ?>
							<button class="btn btn-primary active btn-sm" type="button" onclick="CrudActualizarNivel(<?php echo $ModifNiveles[0]->IDCATEGORIZACION; ?>);">Modificar</button>	
						<?php } else { ?>		
							<button class="btn btn-primary active btn-sm" type="button" onclick="BuscarNiveles();">Buscar</button>	
						<?php } ?>						
					</td>
				</tr>
			</table>

			<div id="ConsultaNiveles"></div>

	</form>
</div>
</div>