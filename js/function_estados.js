function RegistrarEstados()
{
	var descripcion = document.getElementById('descripcion').value;
	var codigo = document.getElementById('codigo').value;

	if (descripcion != '' && codigo != '')
	{
	  $.post(baseurl+'Con_estados/RegistrarEstados', {'descripcion': descripcion, 'codigo':codigo}, 

		function(data, status)
		{  
			if(status == 'success')
			{
				alert("Registro almacenado con exito");
	    	$('#idestado').html(data); 
			}
		}); 
	}
	else
	{
    alert('Debe suministrar la información requerida en el formulario.');
    return false;  		
	}
}

function BuscarEstados()
{
	var descripcion = document.getElementById('descripcion').value;
	var codigo = document.getElementById('codigo').value;

	  $.post(baseurl+'Con_estados/BuscarEstados', {'descripcion': descripcion, 'codigo':codigo}, 
	  
	  function(data)
	  {      
	    $('#ConsultaEstados').html(data); 
	  }); 		
}

/*************************** Modificar los cargos ***************************/
function ModificarEstados(idestados)
{
  $.post(baseurl+'Con_estados/ModificarEstados', {'idestados': idestados}, 
  
  function(data)
  {      
    $('#ModifEstado').html(data); 
  }); 
}

/*************************** Fin Funcion de menu ***************************/
function CrudActualizarEstados(idestados)
{
	var descripcionestado = document.getElementById('descripcion').value;
	var codigoestado = document.getElementById('codigo').value;
	
	if(confirm('¿Esta seguro de actualizar el estado del cargo?'))
	{
		$.getJSON(baseurl+'Con_estados/CrudActualizarEstados', {'idestados': idestados, 'descripcionestado':descripcionestado, 'codigoestado':codigoestado},function(json){
			if(json == true)
			{
				alert("La dependencia fue modificada.");
			}
		});
	}				
}
