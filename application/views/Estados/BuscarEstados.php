<div id="ModifEstado">
	
	<div class="panel panel-primary">
		<div class="color-heading">
			<?php if(Isset($ModifEstado)) {?>
				<strong>&nbsp;&nbsp;MODIFICAR ESTADOS</strong>
			<?php } else {?>
				<strong>&nbsp;&nbsp;BUSCAR ESTADOS</strong>
			<?php } ?>
		</div>	

		<form action="" method="post" name="frm_estados" id="frm_estados">
			<table class="table table-sm table-striped">
				<tr align="left">
					<td><label for=""><strong>Descripción:</strong></label></td>
					<td>
						<?php if(Isset($ModifEstado)) {?>
							<input type="text" class="form-control form-control-sm" id="descripcion" value="<?php if (isset($ModifEstado)) echo $ModifEstado[0]->DESCRIPCIONESTADO; ?>" disabled>
						<?php } else {?>
							<input type="text" class="form-control form-control-sm" id="descripcion" placeholder="Descripción">
						<?php } ?>

					</td>
				</tr>
				<tr align="left">
					<td><label for=""><strong>Codigo:</strong></label></td>
					<td>
						<?php if(Isset($ModifEstado)) {?>
							<input type="text" class="form-control form-control-sm" id="codigo" value="<?php if (isset($ModifEstado)) echo $ModifEstado[0]->CODIGOESTADO; ?>" disabled>
						<?php } else {?>
							<input type="text" class="form-control form-control-sm" id="codigo" placeholder="Codigo">
						<?php } ?>

					</td>
				</tr>
				<tr>		
					<td align="right" colspan="8">
						<?php if(Isset($ModifEstado)) {?>
							<button class="btn btn-primary active btn-sm" type="button" onclick="CrudActualizarEstados(<?php echo $ModifEstado[0]->IDESTADO; ?>);">Modificar</button>							
						<?php } else {?>
							<button class="btn btn-primary active btn-sm" type="button" onclick="BuscarEstados();">Buscar</button>							
						<?php } ?>
					</td>
				</tr>
			</table>

			<div id="ConsultaEstados"></div>

		</form>
	</div>
</div>
