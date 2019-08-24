function RegistrarPreguntas()
{
	var descripcionpreg = document.getElementById('descripcionpreg').value;
	var competencia = document.getElementById('competencia').value;
	var lidpregunta = document.getElementById('lidpregunta').value;
	var idestado = document.getElementById('idestado').value;

	if (descripcionpreg != '' && competencia != '')
	{
	  $.post(baseurl+'Con_preguntas/RegistrarPreguntas', {'descripcionpreg': descripcionpreg, 
	  	'competencia':competencia, 'lidpregunta':lidpregunta, 'idestado':idestado}, 

		function(data, status)
		{  
			if(status == 'success')
			{
				alert("Registro almacenado con exito");
	    	$('#idpreguntas').html(data);
			}
		}); 	
	}
	else
	{
    alert('Debe suministrar la información requerida en el formulario.');
    return false;  		
	}
}

function BuscarPreguntas()
{
	var descripcionpreg = document.getElementById('descripcionpreg').value;
	var competencia = document.getElementById('competencia').value;
	var lidpregunta = document.getElementById('lidpregunta').value;
	var idestado = document.getElementById('idestado').value;

	if (descripcionpreg != '' || competencia != '' || lidpregunta != '')
	{
	  $.post(baseurl+'Con_preguntas/BuscarPreguntas', {'descripcionpreg': descripcionpreg, 'competencia':competencia, 'lidpregunta':lidpregunta, 'idestado':idestado}, 
	  
	  function(data)
	  {      
	    $('#ConsultaPreguntas').html(data); 
	  }); 		
	}
	else
	{
    alert('Debe suministrar al menos una dato.');
    return false;  		
	}

}

/*************************** Modificar los cargos ***************************/
function ModificarPreguntas(idpreguntas)
{
  $.post(baseurl+'Con_preguntas/ModificarPreguntas', {'idpreguntas': idpreguntas},

  function(data)
  {      
    $('#ModifPregunta').html(data); 
  }); 
}

/*************************** Fin Funcion de menu ***************************/
function CrudActualizarPreguntas(idpreguntas)
{
	var idestadopregunta = document.getElementById('idestado').value;
	
	if(confirm('¿Esta seguro de actualizar el estado del cargo?'))
	{
		$.getJSON(baseurl+'Con_preguntas/CrudActualizarPreguntas', {'idpreguntas': idpreguntas, 'idestadopregunta':idestadopregunta}, function(json){
      if(json == true)
      {
      	alert("La ciudad fue modificado con exito.");
      }
		});
	}				
}

