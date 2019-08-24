//esta funcion es para dar estilos al select de busquedas
$(".chosen-select").chosen({disable_search_threshold: 10});

function RegistrarCargo()
{
  var descripcion = document.getElementById('descripcion').value;
  var objetivo = document.getElementById('objetivo').value;
  var idestado = document.getElementById('idestado').value;


  if (descripcion != '' && objetivo != '')
  {
    $.post(baseurl+'Con_cargos/RegistrarCargo', {'descripcion': descripcion, 'objetivo':objetivo, 'idestado':idestado}, 
    
    function(data, status)
    {      
      if(status == 'success')
      {
        alert("Registro guardado correctamente.");
        $('#idcargo').html(data); 
      }
    });     
  }
  else
  {
    alert('Debe suministrar la información requerida en el formulario.');
    return false;     
  }
}

function BuscarCargo()
{
  var descripcion = document.getElementById('descripcion').value;
  var objetivo = document.getElementById('objetivo').value;
  var idestado = document.getElementById('idestado').value;


  if (descripcion != '' || objetivo != '' || idestado != '')
  {
    $.post(baseurl+'Con_cargos/BuscarCargo', {'descripcion': descripcion, 'objetivo':objetivo, 'idestado':idestado}, 
    
    function(data)
    {      
      $('#ConsultaCargos').html(data); 
    });     
  }
  else
  {
    alert('Debe suministrar al menos una dato.');
    return false;     
  }
}

function ModificarCargo(idcargos)
{
  $.post(baseurl+'Con_cargos/ModificarCargo', {'idcargos': idcargos}, 
  
  function(data)
  {      
    //esta funcion es para dar estilos al select de busquedas
    $('#ModifCargo').html(data); 
  });       
}

function CrudActualizarCargo(idcargos)
{
  var idestado = document.getElementById('idestado').value;

  if(idestado != '')
  {
    if(confirm('¿Esta seguro de actualizar el estado del cargo?'))
    {
      $.getJSON(baseurl+'Con_cargos/CrudActualizarCargo', {'idcargos': idcargos, 'idestado':idestado},function(json){
        
        if(json == true)
        {
//          $("#ModalCargos").modal('hide');
//          $('.modal-backdrop').remove();
          alert("El cargo fue modificado con exito.");

        }
      });
    }       
  } else { alert("La descripcion debe estar llena."); return false;}
}
