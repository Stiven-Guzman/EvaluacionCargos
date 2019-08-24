function ListarPreguntas(idusuario)
{
  $("#ListaEncuesta").hide();

  $.post(baseurl+'Con_encuesta/ListarPreguntas',{'idusuario':idusuario}, 

    function(data)
    {      
      $('#FormatoEncuesta').html(data); 
    });   
}

function ColorButton(idinput)
{
  var valorporcentaje = document.getElementsByName('valor[]');
  var bntcolor = document.getElementsByName('btncalifica[]');

  for (var i = 0; i < valorporcentaje.length; i++) 
  {
    idvalor = valorporcentaje[i].value;
    idbntcolor = bntcolor[i].value;

    if(idinput == 'input'+idbntcolor)
    {
      if(idvalor <= 0 || idvalor > 3)
      {
        alert("El valor ingresado no es valido recuerde \n que los valores validos son 1, 2 y 3.");
        document.getElementById("input"+idbntcolor).focus();
        return false;
      }
      else
      {  
        if(idvalor == 1)
        {
          $('#btn'+idbntcolor).removeClass("btn-secondary").addClass("btn-danger");
        
          var uno = document.getElementById('btn'+idbntcolor);
            uno.innerHTML = 'Por Mejorar';
        }

        if(idvalor == 2)
        {
          $('#btn'+idbntcolor).removeClass("btn-secondary").addClass("btn-warning");
          
          var uno = document.getElementById('btn'+idbntcolor);
            uno.innerHTML = 'Satisfactorio';
        }

        if(idvalor == 3)
        {
          $('#btn'+idbntcolor).removeClass("btn-secondary").addClass("colorBtn");
          
          var uno = document.getElementById('btn'+idbntcolor);
            uno.innerHTML = 'Sobresaliente';
        }
      }
    }  
  }
}

function GuardarBitacora()
{
  var idusuarios = document.getElementById('idusuarios').value;
  var fortaleza = document.getElementById('fortaleza').value;
  var mejora = document.getElementById('mejora').value;
  var propuesta = document.getElementById('propuesta').value;
  var observaciones = document.getElementById('observaciones').value;

  var idpregunta = document.getElementsByName('idpregunta[]');
  var valorporcentaje = document.getElementsByName('valor[]');
  var numpregunta = document.getElementsByName('numpregunta[]');  
  var sumaporcentaje = 0;
  var porcentaje = 100;  

  for (var i = 0; i < valorporcentaje.length; i++) 
  {
    idvalorporcentaje = valorporcentaje[i].value;
    idpreguntas = idpregunta[i].value;
    numpreguntas = numpregunta[i].value;

    if(idvalorporcentaje == '')
    {
      var num = [i];
      DataNum = parseInt(num) + 1;
      alert("No puede haber ningun valor NULO, por favor verifique.");
      document.getElementById("input"+DataNum).focus();
      return false;      
    }

    ValPorPregunta = (porcentaje / numpreguntas);
    ValPorEstado = (ValPorPregunta / 3);
    ValPorcentaje = (ValPorEstado * idvalorporcentaje);
    ValFinalPorcentaje = Math.round(ValPorcentaje*1000)/1000;

    sumaporcentaje = sumaporcentaje + parseFloat(ValFinalPorcentaje);
  }

  $.post(baseurl+'Con_encuesta/GuardarBitacora', {'idusuarios':idusuarios, 'sumaporcentaje':sumaporcentaje, 'fortaleza':fortaleza, 
                                                  'mejora':mejora, 'propuesta':propuesta, 'observaciones':observaciones },

  function(data, status)
  {  
    if(status == 'success')
    {
      for (var i = 0; i < valorporcentaje.length; i++) 
      {
        idvalorporcentaje = valorporcentaje[i].value;
        idpreguntas = idpregunta[i].value;

        numpreguntas = numpregunta[i].value;

          ValPorPregunta = (porcentaje / numpreguntas);
          ValPorEstado = (ValPorPregunta / 3);
          ValPorcentaje = (ValPorEstado * idvalorporcentaje);
          ValFinalPorcentaje = Math.round(ValPorcentaje*1000)/1000;
          
        $.post(baseurl+'Con_encuesta/GuardarDetalleBitacora', {'idusuarios':idusuarios, 'idpreguntas':idpreguntas, 'idvalorporcentaje':ValFinalPorcentaje},
    
        function(data, status)
        {  
          if(status == 'success')
          {
            //$('#ListaEncuesta').html(data);
          }
        });
      }
        alert("Proceso terminado con exito.");
        HabilitaVistaPrevia();
    }
    else
    {
      alert("Tubimos un problema, no se guardaron los datos.");
      return false;
    }
  });
}

function soloNumeros(e){
  var key = window.Event ? e.which : e.keyCode
  return (key >= 48 && key <= 57)
}

function DevolverCrud()
{
  $('#DivGrafico').addClass('style').css('display','none');
  $("#ListaEncuesta").show();
}

function HabilitaVistaPrevia()
{
  $('#VistaPreviaReporte').removeAttr('disabled');
}