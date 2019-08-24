function RegistrarDependencias()
{
	var descripcion = document.getElementById('descripcion').value;
	var idestado = document.getElementById('idestado').value;

	if (descripcion != '' && idestado != '')
	{
	  $.post(baseurl+'Con_dependencias/RegistrarDependencias', {'descripcion': descripcion, 'idestado':idestado}, 
	  	
		function(data, status)
		{  
			if(status == 'success')
			{
				alert("Registro almacenado con exito");
	    	$('#iddependencias').html(data); 
			}
		}); 	

	}
	else
	{
    alert('Debe suministrar la información requerida en el formulario.');
    return false;  		
	}
}

function BuscarDependencias()
{
	var descripcion = document.getElementById('descripcion').value;
	var idestado = document.getElementById('idestado').value;

	if (descripcion != '' || idestado != '')
	{
	  $.post(baseurl+'Con_dependencias/BuscarDependencias', {'descripcion': descripcion, 'idestado':idestado}, 
	  
	  function(data)
	  {      
	    $('#ConsultaDepenacias').html(data); 
	  }); 		
	}
	else
	{
    alert('Debe suministrar al menos una dato.');
    return false;  		
	}
}

/*************************** Modificar los cargos ***************************/
function ModificarDependencias(iddepen)
{

  $.post(baseurl+'Con_dependencias/ModificarDependencias', {'iddepen': iddepen}, 
  
  function(data)
  {      
    $('#ModifDependencias').html(data); 
  }); 
}

function CrudActualizarDependencias(iddepen)
{
	var idestadodepen = document.getElementById('idestado').value;
	
	if(idestadodepen != '')
	{
		if(confirm('¿Esta seguro de actualizar el estado del cargo?'))
		{
			$.getJSON(baseurl+'Con_dependencias/CrudActualizarDependencias', {'iddepen': iddepen, 'idestadodepen':idestadodepen},function(json){
				if(json == true)
				{
					alert("La dependencia fue modificada.");
				}
//alert("Prueba ");
			});
		}				
	} else { alert("La descripcion debe estar llena."); return false;}
}

