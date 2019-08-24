	<div class="panel panel-primary">
		<div class="color-heading">
			<strong>&nbsp;&nbsp;CREAR CIUDADES</strong>
		</div>

		<form action="" method="post" name="frm_ciudades" id="frm_ciudades">

			<table class="table table-sm table-striped">
				<tr align="left">
					<td><label for="">Descripción Ciudad:</label></td>
					<td>
						<input type="text" class="form-control form-control-sm" id="descripcion" placeholder="Descripción">
					</td>
				</tr>
				<tr>	
					<td><label for="">Abreviatura:</label></td> 
					<td>
						<input type="text" class="form-control form-control-sm" id="abreviatura" placeholder="Codigo Abreviado">
					</td>																
				</tr>
				<tr align="left">
					<td><label for="">Estado:</label></td> 
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
						<button class="btn btn-primary active btn-sm" type="button" onclick="RegistrarCiudades();">Guardar</button>							
					</td>
				</tr>
			</table>

			<div id="ConsultaCiudades"></div>

	</form>
</div>
