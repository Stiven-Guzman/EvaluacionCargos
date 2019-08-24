<div id="ModifUsuarios">
	<script>$(".chosen-select").chosen({disable_search_threshold: 10});</script>

	<div class="panel panel-primary">

		<div class="color-heading">
			<?php if (Isset($DatosUsuarios)) { ?>
			<strong>&nbsp;&nbsp;BUSCAR USUARIOS</strong>
			<?php	} else { ?>
			<strong>&nbsp;&nbsp;MODIFICAR USUARIOS</strong>
			<?php } ?>		
		</div>	

		<form action="" method="post" name="frm_usuarios" id="frm_usuarios">
			<table class="table table-sm table-striped">
				<tr align="left">
					<td><label for=""><strong>Identificación:</strong></label></td>
					<td>
						<?php if (Isset($DatosUsuarios)) { ?>
							<input type="text" class="form-control form-control-sm" id="idusuario" placeholder="Identificación"
								value="<?php if (Isset($DatosUsuarios)) echo $DatosUsuarios[0]->IDUSUARIOS; ?>">
						<?php	} else { ?>
							<input type="text" class="form-control form-control-sm" id="idusuario" placeholder="Identificación">
						<?php } ?>		
					</td>
					<td><label for=""><strong>Nombre:</strong></label></td>
					<td>
						<?php if (Isset($DatosUsuarios)) { ?>
							<input type="text" class="form-control form-control-sm" id="nombreusuario" placeholder="Nombre" 
							value="<?php if (Isset($DatosUsuarios)) echo $DatosUsuarios[0]->NOMBREUSUARIO; ?>">
						<?php	} else { ?>
							<input type="text" class="form-control form-control-sm" id="nombreusuario" placeholder="Nombre">
						<?php } ?>		
					</td>
				</tr>
				<tr align="left">
					<td><label for=""><strong>Apellidos:</strong></label></td>
					<td>
						<?php if (Isset($DatosUsuarios)) { ?>
							<input type="text" class="form-control form-control-sm" id="apellidosusuario" placeholder="Apellidos" 
							value="<?php if (Isset($DatosUsuarios)) echo $DatosUsuarios[0]->APELLIDOUSUARIO; ?>">
						<?php	} else { ?>
							<input type="text" class="form-control form-control-sm" id="apellidosusuario" placeholder="Apellidos">
						<?php } ?>		
					</td>
					<td><label for=""><strong>Jefe a Cargo:</strong></label></td> 
					<td>
						<select id="idjefe" class="chosen-select" style="width:200px">
							<?php if (Isset($idusu) && Isset($DatosUsuarios)) { ?>
								<option value="<?php if (Isset($DatosUsuarios)) echo $DatosUsuarios[0]->IDJEFE; ?>">
								<?php if (Isset($DatosUsuarios)) echo $DatosUsuarios[0]->JEFE; ?>
								</option>
							<?php
								foreach ($idusu as $key => $value):
									echo "<option value=".$value->IDUSUARIOS.">".$value->APELLIDOUSUARIO." ".$value->NOMBREUSUARIO."</option>";
							 	endforeach;
							} else { ?>					
									<option value="-1">Seleccione un jefe</option> <?php
									foreach ($idusu as $key => $value):
										echo "<option value=".$value->IDUSUARIOS.">".$value->APELLIDOUSUARIO." ".$value->NOMBREUSUARIO."</option>";
								 	endforeach; 
								 }  ?>		
						</select>
					</td>						
				</tr>	
				<tr align="left">
					<td><label for=""><strong>Nivel:</strong></label></td> 
					<td>
						<select id="idniveles" class="chosen-select" style="width:200px">
							<?php if (Isset($idniveles) && Isset($DatosUsuarios)) { ?>
								<option value="<?php if (Isset($DatosUsuarios)) echo $DatosUsuarios[0]->IDCATEGORIZACION; ?>">
								<?php if (Isset($DatosUsuarios)) echo $DatosUsuarios[0]->DESCRIPCIONCATEGORIZACION; ?>
								</option>
							<?php
								foreach ($idniveles as $key => $value):
									echo "<option value=".$value->IDCATEGORIZACION.">".$value->DESCRIPCIONCATEGORIZACION."</option>";
							 	endforeach;
							} else { ?>					
									<option value="-1">Seleccione un nivel</option> <?php
									foreach ($idniveles as $key => $value):
										echo "<option value=".$value->IDCATEGORIZACION.">".$value->DESCRIPCIONCATEGORIZACION."</option>";
								 	endforeach; 
								 }  ?>		
						</select>
					</td>						
					<td><label for=""><strong>Cargo:</strong></label></td> 
					<td>
						<select id="idcargo" class="chosen-select" style="width:200px">
							<?php if (Isset($idcargo) && Isset($DatosUsuarios)) { ?>
								<option value="<?php if (Isset($DatosUsuarios)) echo $DatosUsuarios[0]->IDCARGO; ?>">
								<?php if (Isset($DatosUsuarios)) echo $DatosUsuarios[0]->DESCRIPCIONCARGO; ?>
								</option>
							<?php
								foreach ($idcargo as $key => $value):
									echo "<option value=".$value->IDCARGO.">".$value->DESCRIPCIONCARGO."</option>";
							 	endforeach;
							} else { ?>					
									<option value="-1">Seleccione un cargo</option> <?php
									foreach ($idcargo as $key => $value):
										echo "<option value=".$value->IDCARGO.">".$value->DESCRIPCIONCARGO."</option>";
								 	endforeach; 
								 }  ?>		
						</select>
					</td>						
				</tr>								
				<tr align="left">
					<td><label for=""><strong>Dependencia:</strong></label></td> 
					<td>
						<select id="iddependencia" class="chosen-select" style="width:200px">
							<?php if (Isset($iddependencias) && Isset($DatosUsuarios)) { ?>
								<option value="<?php if (Isset($DatosUsuarios)) echo $DatosUsuarios[0]->IDDEPENDENCIA; ?>">
								<?php if (Isset($DatosUsuarios)) echo $DatosUsuarios[0]->DESCRIPCIONDEPENDENCIA; ?>
								</option>
							<?php
								foreach ($iddependencias as $key => $value):
									echo "<option value=".$value->IDDEPENDENCIA.">".$value->DESCRIPCIONDEPENDENCIA."</option>";
							 	endforeach;
							} else { ?>					
									<option value="-1">Seleccione un dependencia</option> <?php
									foreach ($iddependencias as $key => $value):
										echo "<option value=".$value->IDDEPENDENCIA.">".$value->DESCRIPCIONDEPENDENCIA."</option>";
								 	endforeach; 
								 }  ?>		
						</select>
					</td>		
					<td><label for=""><strong>Ciudad:</strong></label></td> 
					<td>
						<select id="idciudad" class="chosen-select" style="width:200px">
							<?php if (Isset($idciudades) && Isset($DatosUsuarios)) { ?>
								<option value="<?php if (Isset($DatosUsuarios)) echo $DatosUsuarios[0]->IDCIUDAD; ?>">
								<?php if (Isset($DatosUsuarios)) echo $DatosUsuarios[0]->DESCRIPCIONCIUDAD; ?>
								</option>
							<?php
								foreach ($idciudades as $key => $value):
									echo "<option value=".$value->IDCIUDAD.">".$value->DESCRIPCIONCIUDAD."</option>";
							 	endforeach;
							} else { ?>					
									<option value="-1">Seleccione una ciudad</option> <?php
									foreach ($idciudades as $key => $value):
										echo "<option value=".$value->IDCIUDAD.">".$value->DESCRIPCIONCIUDAD."</option>";
								 	endforeach; 
								 }  ?>		
						</select>
					</td>										
				</tr>		
				<tr align="left">
					<td><label for=""><strong>Empresa:</strong></label></td> 
					<td>
						<select id="idempresa" class="chosen-select" style="width:200px">
							<?php if (Isset($idempresas) && Isset($DatosUsuarios)) { ?>
								<option value="<?php if (Isset($DatosUsuarios)) echo $DatosUsuarios[0]->IDEMPRESA; ?>">
								<?php if (Isset($DatosUsuarios)) echo $DatosUsuarios[0]->NOMBREEMPRESA; ?>
								</option>
							<?php
								foreach ($idempresas as $key => $value):
									echo "<option value=".$value->IDEMPRESA.">".$value->NOMBREEMPRESA."</option>";
							 	endforeach;
							} else { ?>					
									<option value="-1">Seleccione una empresa</option> <?php
									foreach ($idempresas as $key => $value):
										echo "<option value=".$value->IDEMPRESA.">".$value->NOMBREEMPRESA."</option>";
								 	endforeach; 
								 }  ?>		
						</select>
					</td>		
					<td><label for=""><strong>Estado:</strong></label></td> 
					<td>
						<select id="idestado" class="chosen-select" style="width:200px">
							<?php if (Isset($IdEstado) && Isset($DatosUsuarios)) { ?>
								<option value="<?php if (Isset($DatosUsuarios)) echo $DatosUsuarios[0]->IDESTADO; ?>">
								<?php if (Isset($DatosUsuarios)) echo $DatosUsuarios[0]->DESCRIPCIONESTADO; ?>
								</option>
							<?php
								foreach ($IdEstado as $key => $value):
									echo "<option value=".$value->IDESTADO.">".$value->DESCRIPCIONESTADO."</option>";
							 	endforeach;
							} else { ?>					
									<option value="-1">Seleccione un estado</option> <?php
									foreach ($IdEstado as $key => $value):
										echo "<option value=".$value->IDESTADO.">".$value->DESCRIPCIONESTADO."</option>";
								 	endforeach; 
								 }  ?>		
						</select>
					</td>										
				</tr>					     							            
				<tr align="left">
					<td><label for=""><strong>Perfil:</strong></label></td>
					<td colspan="3">
						<select id="idperfil" class="chosen-select" style="width:200px">
							<?php if (Isset($DatosUsuarios)) { ?>
								<option value="<?php if (Isset($DatosUsuarios)) echo $DatosUsuarios[0]->PERFILUSUARIO; ?>">
								<?php if (Isset($DatosUsuarios)) echo $DatosUsuarios[0]->DESCRIPCIONPERFILUSUARIO; ?>
								</option>
							<?php	} else { ?>
								<option value="-1">Seleccione un perfil</option>
								<option value="1">ADMINISTRADOR</option>
								<option value="2">USUARIO</option>
							<?php } ?>
						</select>
					</td>	
				</tr>
				<tr>
					<td><label for=""><strong>Contraseña:</strong></label></td>
					<td>
						<?php if (Isset($DatosUsuarios)) { ?>
							<input type="password" class="form-control form-control-sm" id="idcontrasena" placeholder="Contraseña">
						<?php	} else { ?>
							<input type="password" class="form-control form-control-sm" id="idcontrasena" placeholder="Contraseña" disabled>
						<?php } ?>
					</td>	
					<td><label for=""><strong>Confirmar Contraseña:</strong></label></td>
					<td>
						<?php if (Isset($DatosUsuarios)) { ?>
							<input type="password" class="form-control form-control-sm" id="confiridcontrasena" placeholder="Confirmaciòn Contraseña">
						<?php	} else { ?>
							<input type="password" class="form-control form-control-sm" id="confiridcontrasena" placeholder="Confirmaciòn Contraseña" disabled>
						<?php } ?>

					</td>													
				</tr>
				<tr>		
					<td align="right" colspan="8">
						<?php if (Isset($DatosUsuarios)) { ?>
							<button class="btn btn-primary active btn-sm" type="button" onclick="CrudActualizarUsuarios(<?php echo $DatosUsuarios[0]->IDUSUARIOS; ?>);">Modificar</button>
						<?php	} else { ?>
							<button class="btn btn-primary active btn-sm" type="button" onclick="BuscarUsuarios();">Buscar</button>							
						<?php } ?>		
					</td>
				</tr>
			</table>
			<div id="ConsultaUsuarios"></div>
	</form>
</div>
</div>