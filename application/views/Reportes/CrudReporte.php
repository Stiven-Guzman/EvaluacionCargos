<?php 
  if (isset($ConsulReporte)) 
  { 
    $base = base_url();
    $session_data = $this->session->userdata('nueva_session');
    $perfil = $session_data['perfil'];
  ?>
      <div class="color-heading">
        <strong>&nbsp;&nbsp;RESULTADOS</strong>
      </div>
      
      <table  class="table table-sm table-striped" id="crudcargos" style="font-size: small">
        <th><strong>Grafica</strong></th>                                
        <th><strong>Evaluado</strong></th>               
        <th><strong>Quien Evalua</strong></th>                
        <th><strong>Cargo</strong></th>               
        <th><strong>Ciudad</strong></th>               
        <th><strong>Dependencia</strong></th>               
        <th><strong>Empresa</strong></th>               
    <?php 
      foreach ($ConsulReporte as $key => $cargo)
      { ?> 
        <tr> 
          <?php if($cargo->ANOBITACORA != NULL){ ?>
            <td class="left">
              <button type="button" class="btn-sm" style="background-color: #57FF03; border: 1px solid #57FF03;">
              <i class="far fa-check-circle" disabled></i>
              </button>
            </td>
          <?php } else { ?>
            <td class="left"><button type="button" class="btn btn-danger btn-sm"><i class="far fa-times-circle" disabled></i></button></td>
          <?php } ?>
          <td class="left"> <?php echo $cargo->NOMBRES ?></td>
          <td class="left"> <?php echo $cargo->QUIEN_EVALUA ?></td>
          <td class="left"> <?php echo $cargo->DESCRIPCIONCARGO ?></td>
          <td class="left"> <?php echo $cargo->DESCRIPCIONCIUDAD ?></td>
          <td class="left"> <?php echo $cargo->DESCRIPCIONDEPENDENCIA ?></td>
          <td class="left"> <?php echo $cargo->NOMBREEMPRESA ?></td>
        </tr>  
    <?php
      } 
    ?> 
      </table>
      <br><br><br><br>
<?php } else { ?> 
    <table class="table">
      <tr>
        <td colspan="7">
          <span class="badge badge-important"> No se encontraron datos para mostrar. </span> 
        </td>
      </tr>
    </table> 
  <?php } ?> 

