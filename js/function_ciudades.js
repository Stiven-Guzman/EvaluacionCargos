function RegistrarCiudades()
{
	alert("Puweiruwoer");
	var descripcion = document.getElementById('descripcion').value;
	var abreviatura = document.getElementById('abreviatura').value;
	var idestado = document.getElementById('idestado').value;

	if (descripcion != '' && abreviatura != '')
	{
	  $.post(baseurl+'Con_ciudades/RegistrarCiudades', {'descripcion': descripcion, 'abreviatura':abreviatura, 'idestado':idestado}, 
	  
		function(data, status)
		{  
			if(status == 'success')
			{
				alert("Registro almacenado con exito");
				$('#idciudad').html(data); 
			}
		}); 		
	}
	else
	{
    alert('Debe suministrar la información requerida en el formulario.');
    return false;  		
	}
}

function BuscarCiudades()
{
	var descripcion = document.getElementById('descripcion').value;
	var abreviatura = document.getElementById('abreviatura').value;
	var idestado = document.getElementById('idestado').value;

	if (descripcion != '' || abreviatura != '' || idestado != '')
	{
	  $.post(baseurl+'Con_ciudades/BuscarCiudades', {'descripcion': descripcion, 'abreviatura':abreviatura, 'idestado':idestado}, 
	  
	  function(data)
	  {      
	    $('#ConsultaCiudades').html(data); 
	  }); 		
	}
	else
	{
    alert('Debe suministrar al menos una dato.');
    return false;  		
	}
}

function ModificarCiudad(idciudad)
{
  $.post(baseurl+'Con_ciudades/ModificarCiudad', {'idciudad': idciudad}, 
  
  function(data)
  {      
    $('#ModifCiudades').html(data); 
  }); 		
}

function CrudActualizarCiudad(idciudad)
{
	var idestadociudad = document.getElementById('idestado').value;

	if(idestadociudad != '')
	{
		if(confirm('¿Esta seguro de actualizar el estado del cargo?'))
		{
			$.getJSON(baseurl+'Con_ciudades/CrudActualizarCiudad', {'idciudad': idciudad, 'idestadociudad':idestadociudad}, function(json){

        if(json == true)
        {
        	alert("La ciudad fue modificado con exito.");
        }

			});
		}				
	} else { alert("La descripcion debe estar llena."); return false;}
}

