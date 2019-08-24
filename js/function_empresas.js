function RegistrarEmpresas()
{
	var nitempresa = document.getElementById('nitempresa').value;
	var descripcionempresa = document.getElementById('descripcionempresa').value;
	var idestado = document.getElementById('idestado').value;

	if (nitempresa != '' && descripcionempresa != '')
	{
	  $.post(baseurl+'Con_empresas/RegistrarEmpresas', {'nitempresa': nitempresa, 'descripcionempresa':descripcionempresa, 'idestado':idestado}, 
	  
		function(data, status)
		{  
			if(status == 'success')
			{
				alert("Registro almacenado con exito");
		    $('#idempresa').html(data); 
			}
		}); 	
	}
	else
	{
    alert('Debe suministrar la información requerida en el formulario.');
    return false;  		
	}
}

function BuscarEmpresas()
{
	var nitempresa = document.getElementById('nitempresa').value;
	var descripcionempresa = document.getElementById('descripcionempresa').value;
	var idestado = document.getElementById('idestado').value;

	if (nitempresa != '' || descripcionempresa != '' || idestado != '')
	{
		$.post(baseurl+'Con_empresas/BuscarEmpresas', {'nitempresa': nitempresa, 'descripcionempresa':descripcionempresa, 'idestado':idestado}, 
	  
	  function(data)
	  {      
	    $('#ConsultaEmpresa').html(data); 
	  }); 		
	}
	else
	{
    alert('Debe suministrar al menos una dato.');
    return false;  		
	}

}

/*************************** Modificar los cargos ***************************/
function ModificarEmpresas(idempresa)
{
	$.post(baseurl+'Con_empresas/ModificarEmpresas', {'idempresa': idempresa}, 
  
  function(data)
  {      
    $('#ModifEmpresa').html(data); 
  }); 
}

/*************************** Fin Funcion de menu ***************************/
function CrudActualizarEmpresa(idempresa)
{
	var idestadoempresa = document.getElementById('idestado').value;
	
	if(idestadoempresa != '')
	{
		if(confirm('¿Esta seguro de actualizar el estado del cargo?'))
		{
			$.getJSON(baseurl+'Con_empresas/CrudActualizarEmpresa', {'idempresa': idempresa, 'idestadoempresa':idestadoempresa},function(json){
				if(json == true)
				{
					alert("La empresa fue modificada.");
				}
			});
		}				
	} else { alert("La empresa debe estar llena."); return false;}
}
