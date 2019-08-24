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
</head>
<body class="img-responsive" oncopy="return false" onpaste="return false">

	<div class="modal-dialog text-center">
		<div class="col-sm-9 main-section">
			<div class="modal-content contenedor" style="background-color: #434e5a; opacity: .8; border-radius: 10px;">
				<div class="col-12 user-img">
					<img src="img/face.png" alt="">
				</div>
				<div class="col-12 form-input">
					<form action="<?php echo base_url(); ?>Con_index/inicio" method="post" autocomplete="off">

					  <div class="form-group">
						  <input type="text" class="form-control" name="idusuario" placeholder="Ingrese usuario">
					  </div>						

						<div class="form-group">
							<input type="password" name="idpassword" class="form-control" placeholder="Ingrese contraseña" >							
						</div>

						<button type="submit" class="btn btn-success">Ingresar</button>
					</form>
				</div>

				<div class="col-12 forgot">
					<a href="#">¿Olvido su contraseña?</a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
