function RegistrarNiveles()
{
	var descripcion = document.getElementById('descripcion').value;
	var npreguntas = document.getElementById('npreguntas').value;
	var idestado = document.getElementById('idestado').value;

	if (descripcion != '' && npreguntas != '')
	{
	  $.post(baseurl+'Con_niveles/RegistrarNiveles', {'descripcion': descripcion, 'npreguntas':npreguntas, 'idestado':idestado}, 
	  
		function(data, status)
		{  
			if(status == 'success')
			{
				alert("Registro almacenado con exito");
	    	$('#idniveles').html(data); 
			}
		}); 
	}
	else
	{
    alert('Debe suministrar la información requerida en el formulario.');
    return false;  		
	}
}

function BuscarNiveles()
{
	var descripcion = document.getElementById('descripcion').value;
	var npreguntas = document.getElementById('npreguntas').value;
	var idestado = document.getElementById('idestado').value;

	if (descripcion != '' || npreguntas != '' || idestado != '')
	{
	  $.post(baseurl+'Con_niveles/BuscarNiveles', {'descripcion': descripcion, 'npreguntas':npreguntas, 'idestado':idestado}, 
	  
	  function(data)
	  {      
	    $('#ConsultaNiveles').html(data); 
	  }); 		
	}
	else
	{
    alert('Debe suministrar al menos una dato.');
    return false;  		
	}

}

function CrudActualizarNivel(idniveles)
{
	var descripcion = document.getElementById('descripcion').value;
	var npreguntas = document.getElementById('npreguntas').value;
	var idestado = document.getElementById('idestado').value;

	if(idestado != '')
	{
		if(confirm('¿Esta seguro de actualizar el estado del nivel?'))
		{
			$.getJSON(baseurl+'Con_niveles/CrudActualizarNivel', {'idniveles': idniveles, 'descripcion': descripcion, 'npreguntas':npreguntas, 'idestado':idestado},function(json){
        if(json == true)
        {
        	alert("El nivel fue modificado con exito.");
        }
			});
		}				
	} else { alert("La descripcion debe estar llena."); return false;}
}

function ModificarNiveles(idniveles)
{

  $.post(baseurl+'Con_niveles/ModificarNiveles', {'idniveles': idniveles}, 
  
  function(data)
  {      
    //esta funcion es para dar estilos al select de busquedas
    $('#ModifNiveles').html(data); 
  }); 

}

