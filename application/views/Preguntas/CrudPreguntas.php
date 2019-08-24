<?php 
  if (isset($ConsulPreguntas)) 
  { 
    $base = base_url();
    $session_data = $this->session->userdata('nueva_session');
    $perfil = $session_data['perfil'];
  ?>
      <div class="color-heading">
        <strong>&nbsp;&nbsp;RESULTADOS</strong>
      </div>
      
      <table  class="table table-sm table-striped" id="crudcargos" style="font-size: small">
        <th><strong>N°</strong></th>               
        <th><strong>Descripción</strong></th>               
        <th><strong>Lider</strong></th>               
        <th><strong>Estado</strong></th>      
        <th> Editar </th>                            
    <?php $count = 1;
      foreach ($ConsulPreguntas as $key => $cargo)
      { ?> 
        <tr> 
          <td class="left"> <strong><?php echo $count; ?></strong></td>
          <td class="left"> <?php echo $cargo->DESCRIPCIONPREGUNTA ?></td>
          <td class="left"> <?php echo $cargo->LIDERPREGUNTA ?></td>
          <td class="left"> <?php echo $cargo->DESCRIPCIONESTADO ?></td>
          <td>
            <button type="button" class="btn btn-primary btn-sm" 
              onclick="ModificarPreguntas(<?php echo $cargo->IDPREGUNTA?>);">
             <i class="fas fa-pencil-alt"></i>
            </button>           
          </td>
        </tr>  
    <?php
      $count ++;} 
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
