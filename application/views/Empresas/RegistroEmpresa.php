
	<div class="panel panel-primary">
		<div class="color-heading">
			<strong>&nbsp;&nbsp;CREAR EMPRESAS</strong>
		</div>

		<form action="" method="post" name="frm_empresa" id="frm_empresa">

			<table class="table table-sm table-striped">
				<tr align="left">
					<td><label for=""><strong>Nit:</strong></label></td>
					<td>
						<input type="text" class="form-control form-control-sm" id="nitempresa" placeholder="Nit Empresa">
					</td>
				</tr>
				<tr align="left">
					<td><label for=""><strong>Descripción:</strong></label></td>
					<td>
						<input type="text" class="form-control form-control-sm" id="descripcionempresa" placeholder="Nombre Empresa">
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
							} ?>	
						</select>
					</td>						
				</tr>					            
				<tr>		
					<td align="right" colspan="8">
						<button class="btn btn-primary active btn-sm" type="button" onclick="RegistrarEmpresas();">Guardar</button>							
					</td>
				</tr>
			</table>

			<div id="ConsultaEmpresas"></div>

	</form>
</div>
