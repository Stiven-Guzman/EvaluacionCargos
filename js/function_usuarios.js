function RegistrarUsuarios()
{
	var idusuario = document.getElementById('idusuario').value;
	var nombreusuario = document.getElementById('nombreusuario').value;
	var apellidosusuario = document.getElementById('apellidosusuario').value;
	var idjefe = document.getElementById('idjefe').value;
	var idniveles = document.getElementById('idniveles').value;
	var idcargo = document.getElementById('idcargo').value;
	var iddependencia = document.getElementById('iddependencia').value;
	var idciudad = document.getElementById('idciudad').value;
	var idempresa = document.getElementById('idempresa').value;
	var idestado = document.getElementById('idestado').value;
	var idperfil = document.getElementById('idperfil').value;
	var idcontrasena = document.getElementById('idcontrasena').value;

	if (idusuario != '' && nombreusuario != '' && apellidosusuario != '' && idcontrasena != '')
	{
	  $.post(baseurl+'Con_usuarios/RegistrarUsuarios',{'idusuario':idusuario, 'nombreusuario':nombreusuario, 'apellidosusuario':apellidosusuario,
	  	 'idjefe':idjefe, 'idniveles':idniveles, 'idcargo':idcargo, 'iddependencia':iddependencia, 'idciudad':idciudad, 'idempresa':idempresa,
	  	 'idestado':idestado, 'idperfil':idperfil, 'idcontrasena':idcontrasena}, 
	  
	  function(data)
	  {      
	    $('#idusuarios').html(data); 
	  }); 		
	}
	else
	{
    alert('Debe suministrar la información requerida en el formulario.');
    return false;  		
	}
	
}

function BuscarUsuarios()
{
	var idusuario = document.getElementById('idusuario').value;
	var nombreusuario = document.getElementById('nombreusuario').value;
	var apellidosusuario = document.getElementById('apellidosusuario').value;
	var idjefe = document.getElementById('idjefe').value;
	var idniveles = document.getElementById('idniveles').value;
	var idcargo = document.getElementById('idcargo').value;
	var iddependencia = document.getElementById('iddependencia').value;
	var idciudad = document.getElementById('idciudad').value;
	var idempresa = document.getElementById('idempresa').value;
	var idestado = document.getElementById('idestado').value;
	var idperfil = document.getElementById('idperfil').value;

	if (idusuario != '' || nombreusuario != '' || apellidosusuario != '' || idjefe != '-1' || idniveles != '-1' || idcargo != '-1' || iddependencia != '-1' || idciudad != '-1' || idempresa != '-1' || idestado != '-1' || idperfil != '-1')
	{
	  $.post(baseurl+'Con_usuarios/BuscarUsuarios',{'idusuario':idusuario, 'nombreusuario':nombreusuario, 'apellidosusuario':apellidosusuario,
	  	 'idjefe':idjefe, 'idniveles':idniveles, 'idcargo':idcargo, 'iddependencia':iddependencia, 'idciudad':idciudad, 'idempresa':idempresa,
	  	 'idestado':idestado, 'idperfil':idperfil}, 

	  function(data)
	  {      
	    $('#ConsultaUsuarios').html(data); 
	  }); 		
	}
	else
	{
    alert('Debe suministrar al menos una dato para la consulta.');
    return false;  		
	}
}

/*************************** Modificar los cargos ***************************/
function ModificarUsuarios(idusuarios)
{

  $.post(baseurl+'Con_usuarios/ModificarUsuarios',{'idusuarios':idusuarios}, 
  
  function(data)
  {      
    $('#ModifUsuarios').html(data); 
  }); 
}  

function CrudActualizarUsuarios(idusuarios)
{
	var nombreusuario = document.getElementById('nombreusuario').value;
	var apellidosusuario = document.getElementById('apellidosusuario').value;
	var idjefe = document.getElementById('idjefe').value;
	var idniveles = document.getElementById('idniveles').value;
	var idcargo = document.getElementById('idcargo').value;
	var iddependencia = document.getElementById('iddependencia').value;
	var idciudad = document.getElementById('idciudad').value;
	var idempresa = document.getElementById('idempresa').value;
	var idestado = document.getElementById('idestado').value;
	var idperfil = document.getElementById('idperfil').value;	
	var idcontrasena = document.getElementById('idcontrasena').value;
	
	if(confirm('¿Esta seguro de actualizar este usuario?'))
	{
		$.getJSON(baseurl+'Con_usuarios/CrudActualizarUsuarios', {'nombreusuario': nombreusuario, 'apellidosusuario': apellidosusuario, 'idjefe': idjefe, 'idniveles': idniveles,
			'idcargo': idcargo, 'iddependencia': iddependencia, 'idciudad': idciudad, 'idempresa': idempresa, 'idestado': idestado, 'idperfil': idperfil, 'idusuarios':idusuarios, 'idcontrasena':idcontrasena }, 
			
			function(json)
			{
	      if(json == true)
  	    {
    	  	alert("El usuario fue modificado con exito.");
      	}
		});
	}				
}

function ConfirmarContrasena()
{
	var idcontrasena = document.getElementById('idcontrasena').value;
	var confiridcontrasena = document.getElementById('confiridcontrasena').value;	

	if(idcontrasena != confiridcontrasena)
	{
		alert("Las contraseña no coinciden, por favor verifique.");
		document.getElementById('idcontrasena').focus();
		return false;
	}
} 