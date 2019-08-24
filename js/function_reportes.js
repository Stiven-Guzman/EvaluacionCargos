function ReporteBusqueda()
{
	var idjefe = document.getElementById('idjefe').value;
	var idcargo = document.getElementById('idcargo').value;
	var iddependencia = document.getElementById('iddependencia').value;
	var idciudad = document.getElementById('idciudad').value;
	var idempresa = document.getElementById('idempresa').value;
	var anoencuesta = document.getElementById('anoencuesta').value;


	if (idjefe != '' || idcargo != '-1' || iddependencia != '-1' || idciudad != '-1' || idempresa != '-1' || anoencuesta != '' )
	{
	  $.post(baseurl+'Con_reportes/ReporteBusqueda',{'idjefe':idjefe, 'idcargo':idcargo, 'iddependencia':iddependencia, 'idciudad':idciudad, 'idempresa':idempresa, 'anoencuesta':anoencuesta}, 

	  function(data)
	  {      
	    $('#ReporteConsulta').html(data); 
	  }); 		
	}
	else
	{
    alert('Debe suministrar al menos una dato para la consulta.');
    return false;  		
	}
}

