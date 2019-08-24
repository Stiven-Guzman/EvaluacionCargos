	<div class="panel panel-primary">
		<div class="color-heading">
			<strong>&nbsp;&nbsp;CREAR DEPENDENCIAS</strong>
		</div>

		<form action="" method="post" name="frm_dependencias" id="frm_dependencias">

			<table class="table table-sm table-striped">
				<tr align="left">
					<td><label for="">Descripción:</label></td>
					<td>
						<input type="text" class="form-control form-control-sm" id="descripcion" placeholder="Descripción">
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
						<button class="btn btn-primary active btn-sm" type="button" onclick="RegistrarDependencias();">Guardar</button>							
					</td>
				</tr>
			</table>

			<div id="ConsultaDependencias"></div>

	</form>
</div>
