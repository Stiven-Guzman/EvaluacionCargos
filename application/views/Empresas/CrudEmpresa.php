<?php 
  if (isset($ConsulEmpresas)) 
  { 
    $base = base_url();
    $session_data = $this->session->userdata('nueva_session');
    $perfil = $session_data['perfil'];
  ?>
      <div class="color-heading">
        <strong>&nbsp;&nbsp;RESULTADOS</strong>
      </div>
      
      <table  class="table table-sm table-striped" id="crudcargos" style="font-size: small">
        <th><strong>Nº</strong></th>                
        <th><strong>Nit</strong></th>               
        <th><strong>Nombre</strong></th>      
        <th><strong>Estado</strong></th>      
        <th> Editar </th>                            
    <?php $count = 1;
      foreach ($ConsulEmpresas as $key => $cargo)
      { ?> 
        <tr> 
          <td class="left"> <strong><?php echo $count; ?></strong></td>
          <td class="left"> <?php echo $cargo->NITEMPRESA ?></td>
          <td class="left"> <?php echo $cargo->NOMBREEMPRESA ?></td>
          <td class="left"> <?php echo $cargo->DESCRIPCIONESTADO ?></td>
          <td>
            <button type="button" class="btn btn-primary btn-sm" 
              onclick="ModificarEmpresas(<?php echo $cargo->IDEMPRESA?>);">
             <i class="fas fa-pencil-alt"></i>
            </button>            
          </td>
        </tr>  
    <?php
      $count ++;} 
    ?> 
      </table>
    </div>

<?php } else { ?> 
    <table class="table">
      <tr>
        <td colspan="7">
          <span class="badge badge-important"> No se encontraron datos para mostrar. </span> 
        </td>
      </tr>
    </table> 
  <?php } ?> 
