
	<div class="panel panel-primary">
		<div class="color-heading">
			<strong>&nbsp;&nbsp;CREAR PREGUNTAS</strong>
		</div>

		<form action="" method="post" name="frm_preguntas" id="frm_preguntas">

			<table class="table table-sm table-striped">
				<tr align="left">
					<td><label for=""><strong>Descripción:</strong></label></td>
					<td>
						<input type="text" class="form-control form-control-sm" id="descripcionpreg" placeholder="Descripción">
					</td>
				</tr>
				<tr align="left">
					<td><label for=""><strong>Competencia:</strong></label></td>
					<td>
						<input type="text" class="form-control form-control-sm" id="competencia" placeholder="Competencia">
					</td>
				</tr>
				<tr align="left">
					<td><label for=""><strong>Aplica a Lider</strong></label></td>
					<td>
						<select id="lidpregunta" class="chosen-select" style="width:200px">
							<option value="S">SI</option>
							<option value="N">NO</option>
						</select>
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
						<button class="btn btn-primary active btn-sm" type="button" onclick="RegistrarPreguntas();">Guardar</button>							
					</td>
				</tr>
			</table>

	</form>
</div>
