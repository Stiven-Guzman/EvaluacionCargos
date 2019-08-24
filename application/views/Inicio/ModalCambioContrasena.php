<!DOCTYPE html>
<html>
<head>
	<title>Evaluación Cargos</title>

	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/main.css">

  <script> var baseurl = "<?php echo base_url(); ?>"; </script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/all.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/function_usuarios.js"></script>
</head>
<body class="img-responsive">

	<div class="modal-dialog text-center">
		<div class="col-sm-9 main-section">
			<div class="modal-content contenedor" style="background-color: #434e5a; opacity: .8; border-radius: 10px;">
				
				<div class="col-12">
					<br>
					<p><font size="4" style="color: white;">Cambio de Contraseña</font></p>
				</div>
				<div class="col-12 form-input">
					<form action="<?php echo base_url(); ?>Con_index/CambioContrasena" method="post" autocomplete="off">
						<div class="form-group">
							<input type="hidden" name="Modifusuario" id="Modifusuario" class="form-control" value="<?php if(Isset($UsuariosContra)) echo $UsuariosContra[0]->IDUSUARIOS; ?>">
						</div>

						<div class="form-group">
							<input type="text" name="nombre" class="form-control" 
								value="<?php if(Isset($UsuariosContra)) echo $UsuariosContra[0]->NOMBREUSUARIO.' '.$UsuariosContra[0]->APELLIDOUSUARIO; ?>"  
								disabled="disabled" >							
						</div> 

						<div class="form-group">
							<input type="password" name="idcontrasena" id="idcontrasena" class="form-control" placeholder="Ingrese contraseña" >							
						</div>
						<div class="form-group">
							<input type="password" name="confiridcontrasena" id="confiridcontrasena" class="form-control" placeholder="Confirmar contraseña" onchange="ConfirmarContrasena();">							
						</div>

						<button type="submit" class="btn btn-success">Modificar</button><br>
					</form>
				</div>
				<div class="col-12 forgot">	</div>
			</div>
		</div>
	</div>
</body>
</html>