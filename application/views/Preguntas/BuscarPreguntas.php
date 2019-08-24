<div id="ModifPregunta">
	<script>$(".chosen-select").chosen({disable_search_threshold: 10});</script>
	<div class="panel panel-primary">
		<div class="color-heading">
			<?php if(Isset($ModifPregunta)) {?>
				<strong>&nbsp;&nbsp;MODIFICAR PREGUNTAS</strong>
			<?php } else {?>
				<strong>&nbsp;&nbsp;BUSCAR PREGUNTAS</strong>
			<?php } ?>
		</div>	

		<form action="" method="post" name="frm_preguntas" id="frm_preguntas">

			<table class="table table-sm table-striped">
				<tr align="left">
					<td><label for=""><strong>Descripción:</strong></label></td>
					<td>
						<?php if(Isset($ModifPregunta)) {?>
							<input type="text" class="form-control form-control-sm" id="descripcionpreg" value="<?php if (isset($ModifPregunta)) echo $ModifPregunta[0]->DESCRIPCIONPREGUNTA; ?>" disabled>
						<?php } else {?>
							<input type="text" class="form-control form-control-sm" id="descripcionpreg" placeholder="Descripción">
						<?php } ?>
					</td>
				</tr>
				<tr align="left">
					<td><label for=""><strong>Competencia:</strong></label></td>
					<td>
						<?php if(Isset($ModifPregunta)) {?>
							<input type="text" class="form-control form-control-sm" id="competencia" value="<?php if (isset($ModifPregunta)) echo $ModifPregunta[0]->COMPETENCIA; ?>" disabled>
						<?php } else {?>
							<input type="text" class="form-control form-control-sm" id="competencia" placeholder="Descripción">
						<?php } ?>
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
							} else { ?>	
							<?php if (isset($ModifPregunta)) { ?>
								<option value="<?php if (isset($ModifPregunta)) echo $ModifPregunta[0]->IDESTADO; ?>">
								<?php if (isset($ModifPregunta)) echo $ModifPregunta[0]->DESCRIPCIONESTADO; ?>
								</option>
								<?php if($ModifPregunta[0]->IDESTADO == 1) { ?>
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
						<?php if(Isset($ModifPregunta)) {?>
							<button class="btn btn-primary active btn-sm" type="button" onclick="CrudActualizarPreguntas(<?php echo $ModifPregunta[0]->IDPREGUNTA; ?>);">Modificar</button>							
						<?php } else {?>
							<button class="btn btn-primary active btn-sm" type="button" onclick="BuscarPreguntas();">Buscar</button>							
						<?php } ?>
					</td>
				</tr>
			</table>

			<div id="ConsultaPreguntas"></div>

		</div>	
	</form>
</div>
</div>
