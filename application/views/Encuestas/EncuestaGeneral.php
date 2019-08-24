<form action="" method="post" name="frm_encuestausuario" id="frm_encuestausuario" autocomplete="off">	 
	<div id="ListaEncuesta">	
	<?php
	  if (isset($UsuEncuesta)) 
	  { ?>
			<div class="color-heading">
				<i class="fas fa-address-card fa-2x icono-izq"></i>
				<strong>&nbsp;&nbsp;LISTADO DE PERSONAS A EVALUAR</strong>
			</div>	
      <table class="table table-sm table-striped">
	      <th>Identificación</th>                
	      <th>Nombres</th>               
	      <th>Cargo</th>      
	      <th>Generar</th>                            
	      <th>Consultar</th>                            
	      <th>Estado</th>      
    <?php 
      foreach ($UsuEncuesta as $key => $cargo) { ?> 
      	<tr> 
      		<?php if($cargo->IDUSUARIOS == 41435961 OR $cargo->IDUSUARIOS == 17149512 ) { ?> <td colspan="8"></td> <?php } else {?>
		        <td class="left"> <?php echo $cargo->IDUSUARIOS ?></td>
		        <td class="left"> <?php echo $cargo->NOMBREUSUARIO." ".$cargo->APELLIDOUSUARIO ?></td>
		        <td class="left"> <?php echo $cargo->DESCRIPCIONCARGO?></td>

		        <?php if($cargo->ANOBITACORA == date('Y')){ ?>
			        <td class="left"><button type="button" class="btn btn-primary btn-sm"><i class="far fa-edit"></i></button></td>
			      <?php } else { ?>
			        <td class="left">
								<button type="button" class="btn btn-primary btn-sm" id="OcultarDatos" onclick="ListarPreguntas(<?php echo $cargo->IDUSUARIOS ?>);">
									<i class="far fa-edit"></i>
								</button>
			        </td>
			      <?php } ?>
		        <?php if($cargo->ANOBITACORA == date('Y')){ ?>
			        <td class="left">
								<button type="button" id="ImprimeRepor" class="btn btn-info btn-sm" onclick="GraficoEncuesta(<?php echo $cargo->IDUSUARIOS ?>);">
									<i class="far fa-edit"></i>
								</button>
			        </td>
			      <?php } else { ?>
			        <td class="left">
								<button type="button" class="btn btn-info btn-sm" disabled>
									<i class="far fa-edit"></i>
								</button>
			        </td>
			      <?php } ?>
		        <?php if($cargo->ANOBITACORA == date('Y')){ ?>
			        <td class="left">
			        	<button type="button" class="btn-sm" style="background-color: #57FF03; border: 1px solid #57FF03;">
			        	<i class="far fa-check-circle" disabled></i>
			        	</button>
			        </td>
			      <?php } else { ?>
			        <td class="left"><button type="button" class="btn btn-danger btn-sm"><i class="far fa-times-circle" disabled></i></button></td>
			      <?php } 
			    }?>
      </tr>  
    <?php
      } 
	    ?> 
      </table>
	    <br><br><br>
			<?php 
		} ?>
	</div>

	<div id="FormatoEncuesta"> </div>

	<div id="DivGrafico" class="col-md-12" style="display: none">
		<table class="table table-sm table-striped">
			<tr>
				<td class="alinearcentro" style="font-size: 26px;">
					<strong>RESULTADO DE EVALUACIÒN</strong>					
					<button type="button" class="btn btn-primary btn-sm icono-der" onclick="window.print();"><i class="fas fa-print"></i> Imprimir</button>
				</td>
			</tr>
		</table>
    <br><br>
    <div id="contenedor_grafico">
      <canvas id="ReporteBarras" height="20" width="40"></canvas>
    </div>
    <br><br>
		<div id="DetalleBitacora"></div>
		<br><br><br><br>			
	</div>

</form>