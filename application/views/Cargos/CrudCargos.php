<?php 
  if (isset($ConsulCargo)) 
  { 
    $base = base_url();
    $session_data = $this->session->userdata('nueva_session');
    $perfil = $session_data['perfil'];
  ?>
      <div class="color-heading">
        <strong>&nbsp;&nbsp;RESULTADOS</strong>
      </div>
      
      <table  class="table table-sm table-striped" id="crudcargos" style="font-size: small">
        <th>N°</th>                
        <th>Descripción</th>               
        <th>objetos</th>               
        <th>Estado</th>      
        <th>  </th>                            
    <?php 
      $count = 1;
      foreach ($ConsulCargo as $key => $cargo)
      { ?> 
        <tr>
          <td class="left"> <strong><?php echo $count; ?></strong></td>
          <td class="left"> <?php echo $cargo->DESCRIPCIONCARGO ?></td>
          <td class="left"> <?php echo $cargo->OBJETIVOCARGO ?></td>
          <td class="left"> <?php echo $cargo->DESCRIPCIONESTADO ?></td>
          <td>
            <button type="button" class="btn btn-primary btn-sm" 
              onclick="ModificarCargo(<?php echo $cargo->IDCARGO?>);">
             <i class="fas fa-pencil-alt"></i>
            </button>          
          </td>
        </tr>  
    <?php
      $count ++;
    } 
    ?> 
      </table>
    <br><br>
<?php } else { ?> 
    <table class="table">
      <tr>
        <td colspan="7">
          <span class="badge badge-important"> No se encontraron datos para mostrar. </span> 
        </td>
      </tr>
    </table> 
  <?php } ?> 
