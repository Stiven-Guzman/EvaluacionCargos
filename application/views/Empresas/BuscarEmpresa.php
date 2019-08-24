<div id="ModifEmpresa">
	<script>$(".chosen-select").chosen({disable_search_threshold: 10});</script>
	<div class="panel panel-primary">
		<div class="color-heading">
			<?php if(Isset($ModifEmpresa)) {?>
				<strong>&nbsp;&nbsp;MODIFICAR EMPRESAS</strong>
			<?php } else { ?>
				<strong>&nbsp;&nbsp;BUSCAR EMPRESAS</strong>
			<?php } ?>
		</div>	

		<form action="" method="post" name="frm_empresa" id="frm_empresa">

			<table class="table table-sm table-striped">
				<tr align="left">
					<td><label for=""><strong>Nit:</strong></label></td>
					<td>
						<?php if(Isset($ModifEmpresa)) {?>
							<input type="text" class="form-control form-control-sm" id="nitempresa" value="<?php if (isset($ModifEmpresa)) echo $ModifEmpresa[0]->NITEMPRESA; ?>" disabled>
						<?php } else { ?>
							<input type="text" class="form-control form-control-sm" id="nitempresa" placeholder="Nit Empresa">
						<?php } ?>
					</td>
				</tr>
				<tr align="left">
					<td><label for=""><strong>Descripción:</strong></label></td>
					<td>
						<?php if(Isset($ModifEmpresa)) {?>
							<input type="text" class="form-control form-control-sm" id="descripcionempresa" value="<?php if (isset($ModifEmpresa)) echo $ModifEmpresa[0]->NOMBREEMPRESA; ?>" disabled>
						<?php } else { ?>
							<input type="text" class="form-control form-control-sm" id="descripcionempresa" placeholder="Nombre Empresa">
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
							<?php if (isset($ModifEmpresa)) { ?>
								<option value="<?php if (isset($ModifEmpresa)) echo $ModifEmpresa[0]->IDESTADO; ?>">
								<?php if (isset($ModifEmpresa)) echo $ModifEmpresa[0]->DESCRIPCIONESTADO; ?>
								</option>
								<?php if($ModifEmpresa[0]->IDESTADO == 1) { ?>
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
						<?php if(Isset($ModifEmpresa)) {?>
							<button class="btn btn-primary active btn-sm" type="button" onclick="CrudActualizarEmpresa(<?php echo $ModifEmpresa[0]->IDEMPRESA; ?>);">Modificar</button>							
						<?php } else { ?>
							<button class="btn btn-primary active btn-sm" type="button" onclick="BuscarEmpresas();">Buscar</button>							
						<?php } ?>						
					</td>
				</tr>
			</table>

			<div id="ConsultaEmpresa"></div>

		</form>
	</div>
</div>
