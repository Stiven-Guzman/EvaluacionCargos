<div id="ModifDependencias">
	<script>$(".chosen-select").chosen({disable_search_threshold: 10});</script>
	<div class="panel panel-primary">
		<div class="color-heading">
			<?php if(Isset($ModifDependencias)) {?>
				<strong>&nbsp;&nbsp;MODIFICAR DEPENDENCIAS</strong>
			<?php } else {?>
				<strong>&nbsp;&nbsp;BUSCAR DEPENDENCIAS</strong>
			<?php } ?>	
		</div>	

		<form action="" method="post" name="frm_dependencias" id="frm_dependencias">

			<table class="table table-sm table-striped">
				<tr align="left">
					<td><label for=""><strong>Descripción:</strong></label></td>
					<td>
						<?php if(Isset($ModifDependencias)) {?>
							<input type="text" class="form-control form-control-sm" id="descripcion" value="<?php if(Isset($ModifDependencias)) echo $ModifDependencias[0]->DESCRIPCIONDEPENDENCIA; ?>" disabled>
						<?php } else {?>
							<input type="text" class="form-control form-control-sm" id="descripcion" placeholder="Descripción">
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
							<?php if (isset($ModifDependencias)) { ?>
								<option value="<?php if (isset($ModifDependencias)) echo $ModifDependencias[0]->IDESTADO; ?>">
								<?php if (isset($ModifDependencias)) echo $ModifDependencias[0]->DESCRIPCIONESTADO; ?>
								</option>
								<?php if($ModifDependencias[0]->IDESTADO == 1) { ?>
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
						<?php if(Isset($ModifDependencias)) {?>
							<button class="btn btn-primary active btn-sm" type="button" onclick="CrudActualizarDependencias(<?php echo $ModifDependencias[0]->IDDEPENDENCIA?>);">Modificar</button>							
						<?php } else {?>
							<button class="btn btn-primary active btn-sm" type="button" onclick="BuscarDependencias();">Buscar</button>							
						<?php } ?>							
					</td>
				</tr>
			</table>

			<div id="ConsultaDepenacias"></div>

		</form>
	</div>
</div>
