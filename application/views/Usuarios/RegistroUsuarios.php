	<div class="panel panel-primary">
		<div class="color-heading">
			<strong>&nbsp;&nbsp;CREAR USUARIOS</strong>
		</div>

		<form action="" method="post" name="frm_usuarios" id="frm_usuarios">

				<table class="table table-sm table-striped">
					<tr align="left">
						<td><label for=""><strong>Identificación:</strong></label></td>
						<td>
							<input type="text" class="form-control form-control-sm" id="idusuario" placeholder="Identificación" >
						</td>
						<td><label for=""><strong>Nombre:</strong></label></td>
						<td>
							<input type="text" class="form-control form-control-sm" id="nombreusuario" placeholder="Nombre" >
						</td>
					</tr>
					<tr align="left">
						<td><label for=""><strong>Apellidos:</strong></label></td>
						<td>
							<input type="text" class="form-control form-control-sm" id="apellidosusuario" placeholder="Apellidos" >
						</td>
						<td><label for=""><strong>Jefe a Cargo:</strong></label></td> 
						<td>
							<select id="idjefe" class="chosen-select" style="width:200px" >
								<?php if (isset($idusu)) { 
									foreach ($idusu as $key => $value):
										echo "<option value=".$value->IDUSUARIOS.">".$value->APELLIDOUSUARIO." ".$value->NOMBREUSUARIO."</option>";
								 	endforeach;
								} ?>	
							</select>
						</td>						
					</tr>	
					<tr align="left">
						<td><label for=""><strong>Nivel:</strong></label></td> 
						<td>
							<select id="idniveles" class="chosen-select" style="width:200px" >
								<?php if (isset($idniveles)) { 
									foreach ($idniveles as $key => $value):
										echo "<option value=".$value->IDCATEGORIZACION.">".$value->DESCRIPCIONCATEGORIZACION."</option>";
								 	endforeach;
								} ?>	
							</select>
						</td>						
						<td><label for=""><strong>Cargo:</strong></label></td> 
						<td>
							<select id="idcargo" class="chosen-select" style="width:200px" >
								<?php if (isset($idcargo)) { 
									foreach ($idcargo as $key => $value):
										echo "<option value=".$value->IDCARGO.">".$value->DESCRIPCIONCARGO."</option>";
								 	endforeach;
								} ?>	
							</select>
						</td>						
					</tr>								
					<tr align="left">
						<td><label for=""><strong>Dependencia:</strong></label></td> 
						<td>
							<select id="iddependencia" class="chosen-select" style="width:200px" >
								<?php if (isset($iddependencias)) { 
									foreach ($iddependencias as $key => $value):
										echo "<option value=".$value->IDDEPENDENCIAS.">".$value->DESCRIPCIONDEPENDENCIA."</option>";
								 	endforeach;
								} ?>	
							</select>
						</td>		
						<td><label for=""><strong>Ciudad:</strong></label></td> 
						<td>
							<select id="idciudad" class="chosen-select" style="width:200px" >
								<?php if (isset($idciudades)) { 
									foreach ($idciudades as $key => $value):
										echo "<option value=".$value->IDCIUDAD.">".$value->DESCRIPCIONCIUDAD."</option>";
								 	endforeach;
								} ?>	
							</select>
						</td>										
					</tr>		
					<tr align="left">
						<td><label for=""><strong>Empresa:</strong></label></td> 
						<td>
							<select id="idempresa" class="chosen-select" style="width:200px" >
								<?php if (isset($idempresas)) { 
									foreach ($idempresas as $key => $value):
										echo "<option value=".$value->IDEMPRESA.">".$value->NOMBREEMPRESA."</option>";
								 	endforeach;
								} ?>	
							</select>
						</td>		
						<td><label for=""><strong>Estado:</strong></label></td> 
						<td>
							<select id="idestado" class="chosen-select" style="width:200px" >
								<?php if (isset($IdEstado)) { 
									foreach ($IdEstado as $key => $value):
										echo "<option value=".$value->IDESTADO.">".$value->DESCRIPCIONESTADO."</option>";
								 	endforeach;
								} ?>	
							</select>
						</td>										
					</tr>					     							            
					<tr align="left">
						<td><label for=""><strong>Perfil:</strong></label></td>
						<td colspan="3">
							<select id="idperfil" class="chosen-select" style="width:200px" >
								<option value="1">ADMINISTRADOR</option>
								<option value="2">USUARIO</option>
							</select>
						</td>	
					</tr>
					<tr>
						<td><label for=""><strong>Contraseña:</strong></label></td>
						<td>
							<input type="password" class="form-control form-control-sm" id="idcontrasena" placeholder="Contraseña" >
						</td>	
						<td><label for=""><strong>Confirmar Contraseña:</strong></label></td>
						<td>
							<input type="password" class="form-control form-control-sm" id="confiridcontrasena" placeholder="Confirmaciòn Contraseña" onchange="ConfirmarContrasena();">
						</td>													
					</tr>
					<tr>		
						<td align="right" colspan="8">
							<button class="btn btn-primary active btn-sm" type="button" onclick="RegistrarUsuarios();">Guardar</button>							
						</td>
					</tr>
				</table>

		</form>
	</div>
