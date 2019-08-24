<?php 
  $base = base_url();
  $session_data = $this->session->userdata('nueva_session');
  $perfil = $session_data['perfil'];
  $nombre = $session_data['nombre'];
  $apellido = $session_data['apellido'];

?>		  
	<nav class="navbar navbar-dark" style="background-color: #058CF6;">
		<strong style="font-family: sans-serif; color: #fff; font-size: 120%;">GERLEINCO S.A.</strong>
		<strong style="font-family: sans-serif; color: #fff; font-size: 120%;" class="icono-der">BIENVENID@ <?php echo $nombre .' '.$apellido?></strong>
	</nav>

	<div class="contenedor-menu">
	
		<a href="#" class="btn-menu">Menu<i class="icono fas fa-bars"></i></a>

		<?php 
		  if($perfil == 1) 
			{ ?>
				<ul class="menu">
					<li><a href="<?php echo base_url(); ?>Con_index/home"><i class="icono izq fas fa-home"></i>Inicio</a></li>
					<li><a href="#"><i class="icono izq fas fa-star"></i>Cargos<i class="icono der fas fa-chevron-down"></i></a>
						<ul>
							<li><a href="<?php echo base_url(); ?>Con_cargos/cargos/1">Insertar</a></li>
							<li><a href="<?php echo base_url(); ?>Con_cargos/cargos/2">Buscar</a></li>
						</ul>
					</li>
					<li><a href="#"><i class="icono izq fas fa-list-ol"></i>Niveles<i class="icono der fas fa-chevron-down"></i></a>
						<ul>
							<li><a href="<?php echo base_url(); ?>Con_niveles/niveles/1">Insertar</a></li>
							<li><a href="<?php echo base_url(); ?>Con_niveles/niveles/2">Buscar</a></li>
						</ul>
					</li>
					<li><a href="#"><i class="icono izq fas fa-building"></i>Ciudades<i class="icono der fas fa-chevron-down"></i></a>
						<ul>
							<li><a href="<?php echo base_url(); ?>Con_ciudades/ciudades/1">Insertar</a></li>
							<li><a href="<?php echo base_url(); ?>Con_ciudades/ciudades/2">Buscar</a></li>
						</ul>
					</li>
					<li><a href="#"><i class="icono izq fas fa-share-alt"></i>Dependencias<i class="icono der fas fa-chevron-down"></i></a>
						<ul>
							<li><a href="<?php echo base_url(); ?>Con_dependencias/dependencias/1">Insertar</a></li>
							<li><a href="<?php echo base_url(); ?>Con_dependencias/dependencias/2">Buscar</a></li>
						</ul>
					</li>
					<li><a href="#"><i class="icono izq fas fa-desktop"></i>Empresas<i class="icono der fas fa-chevron-down"></i></a>
						<ul>
							<li><a href="<?php echo base_url(); ?>Con_empresas/empresa/1">Insertar</a></li>
							<li><a href="<?php echo base_url(); ?>Con_empresas/empresa/2">Buscar</a></li>
						</ul>
					</li>
					<li><a href="#"><i class="icono izq fas fa-book"></i>Encuesta<i class="icono der fas fa-chevron-down"></i></a>
						<ul>
							<li><a href="<?php echo base_url(); ?>Con_encuesta/encuesta">Llenar</a></li>
						</ul>
					</li>
					<li><a href="#"><i class="icono izq fas fa-shield-alt"></i>Estados<i class="icono der fas fa-chevron-down"></i></a>
						<ul>
							<li><a href="<?php echo base_url(); ?>Con_estados/estados/1">Insertar</a></li>
							<li><a href="<?php echo base_url(); ?>Con_estados/estados/2">Buscar</a></li>
						</ul>
					</li>
					<li><a href="#"><i class="icono izq fas fa-question"></i>Preguntas<i class="icono der fas fa-chevron-down"></i></a>
						<ul>
							<li><a href="<?php echo base_url(); ?>Con_preguntas/preguntas/1">Insertar</a></li>
							<li><a href="<?php echo base_url(); ?>Con_preguntas/preguntas/2">Buscar</a></li>
						</ul>
					</li>
					<li><a href="#"><i class="icono izq fas fa-users"></i>Usuarios<i class="icono der fas fa-chevron-down"></i></a>
						<ul>
							<li><a href="<?php echo base_url(); ?>Con_usuarios/usuarios/1">Insertar</a></li>
							<li><a href="<?php echo base_url(); ?>Con_usuarios/usuarios/2">Buscar</a></li>
						</ul>
					</li>
					<li><a href="#"><i class="icono izq fas fa-chart-pie"></i>Consultas<i class="icono der fas fa-chevron-down"></i></a>
						<ul>
							<li><a href="<?php echo base_url(); ?>Con_reportes/ReporteGeneral">Reporte General</a></li>
						</ul>
					</li>
					<li><a href="<?php echo base_url(); ?>Con_index/Logout"><i class="icono izq fas fa-power-off"></i>Cerrar Sesión</a></li>
				</ul>	
		<?php
			}
			else
			{ 
			  if($perfil == 2) 
				{ ?>
					<ul class="menu">
						<li><a href="<?php echo base_url(); ?>Con_index/home"><i class="icono izq fas fa-home"></i>Inicio</a></li>
						<li><a href="#"><i class="icono izq fas fa-book"></i>Encuesta<i class="icono der fas fa-chevron-down"></i></a>
							<ul>
								<li><a href="<?php echo base_url(); ?>Con_encuesta/encuesta">Llenar</a></li>
							</ul>
						</li>
						<li><a href="<?php echo base_url(); ?>Con_index/Logout"><i class="icono izq fas fa-power-off"></i>Cerrar Sesión</a></li>
					</ul>
		<?php
				}
				else
				{
					echo "<script> alert('No se ha iniciado sesion o la \n sesion caduco.'); location.href=".$baseurl."'; </script>";
				}			
			}	
		?>    	
</div>

<iframe class="contenedor-iframe" frameborder="0" framespacing="0" border="0" id="iframe" allowtransparency="true"></iframe>