function GraficoEncuesta(idusuario)
{
  $('#ListaEncuesta').hide();
  $("#FormatoEncuesta").hide();
  $('#DivGrafico').removeAttr('style');
      
  var fecha = new Date();
  var ano = fecha.getFullYear();
  
  $.getJSON(baseurl+'Con_graficos/GraficoEncuesta', {'idusuario': idusuario}, function(json)
  {
    var NumPreguntasBitacora = Object.keys(json[1]);

    matrizPorcentaje = [];
    matrizCompetencia  = [];
    i = 0;

    while(NumPreguntasBitacora.length > i)
    {
      porcentaje = Object.values(json[1][i]);
      
        n = String(porcentaje);
        elporcentaje = n.replace(",",".");

      matrizPorcentaje.push(elporcentaje);

      competencia = Object.values(json[2][i]);
      matrizCompetencia.push(competencia);
      i++;
    }

    var chartData = {
      labels: matrizCompetencia,
        datasets: [{
          label: json[0].NOMBREUSUARIO +" "+ json[0].APELLIDOUSUARIO,
          data: matrizPorcentaje,
          backgroundColor: 'rgb(7,163,247)',
          borderColor: 'rgb(7,163,247)',
          borderWidth: 1
        }]
      };

    var opt = {
      events: false,
      tooltips: { enabled: false },
      scales: { yAxes: [{ ticks: { beginAtZero: true } }] },
      legend: { labels: { fontColor: "black", fontSize: 16 } },      
      hover: { animationDuration: 0 },
      animation: {
        duration: 1,
        onComplete: function () {
          var ctx = this.chart.ctx;
          ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontFamily, 'normal', Chart.defaults.global.defaultFontFamily);
          ctx.textAlign = 'center';
          ctx.textBaseline = 'bottom';

          this.data.datasets.forEach(function (dataset) {
            for (var i = 0; i < dataset.data.length; i++) {
              var model = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._model,
                scale_max = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._yScale.maxHeight;

              ctx.fillStyle = '#000';
              var y_pos = model.y - 5;

              if ((scale_max - model.y) / scale_max >= 0.50)
                  y_pos = model.y + 20; 

              ctx.fillText(dataset.data[i], model.x, y_pos);
            }
          });               
        }
      }
    };
  
    var ctx = document.getElementById("ReporteBarras"),
      myLineChart = new Chart(ctx, {
        type: 'bar',
        data: chartData,
        options: opt
     });

    document.getElementById("DetalleBitacora").innerHTML = 
    '<div class="color-heading alinearcentro"><strong>RESULTADO ENCUESTA</strong></div>'+
      '<table  class="table table-sm table-striped" id="crudcargos" style="font-size: small">'+
        '<tr>'+
          '<td><strong>CALIFICACIÓN IDEAL:</strong></td>'+
          '<td>'+
            '<input type="text" class="form-control form-control-sm confondo-Sobresaliente"  value="Sobresaliente">'+
          '</td>'+
          '<td><strong>CALIFICACIÓN OBTENIDA:</strong></td>'+
          '<td>'+
            '<input type="text" class="form-control form-control-sm confondo-'+json[0].CALIFICACION+'" value="'+json[0].CALIFICACION+'">'+
          '</td>'+
        '</tr>'+
        '<tr>'+
          '<td><strong>PUNTUAJE IDEAL:</strong></td>'+
          '<td>100%</td>'+
          '<td><strong>PORCENTAJE FINAL OBTENIDO:</strong></td>'+
          '<td>'+
            '<input type="text" value="'+json[0].PORCENTAJE+'%">'+
          '</td>'+
        '</tr>'+
        '<tr>'+
          '<td><strong>PORCENTAJE IDEAL X ITEM</strong></td>'+
          '<td colspan="3">'+
            '<input type="text" value="'+json[0].PORCENTAJEXPREGUNTA+'%">'+
          '</td>'+
        '</tr>'+
      '</table>'+
    '</div>'+
    '<div class="color-heading alinearcentro"><strong>COMPLEMENTO ENCUESTA</strong></div>'+
      '<table  class="table table-sm table-striped" id="crudcargos" style="font-size: small">'+
        '<tr>'+
          '<td style="text-align:center;"><strong>FORTALEZAS</strong></td>'+
          '<td style="text-align:center;"><strong>A MEJORAR</strong></td>'+
          '<td style="text-align:center;"><strong>ACCIONES</strong></td>'+
        '</tr>'+
        '<tr>'+
          '<td>'+
            '<textarea class="form-control" rows="5">'+json[0].FORTALEZASBITACORA+'</textarea>'+
          '</td>'+
          '<td>'+
            '<textarea class="form-control" rows="5">'+json[0].AMEJORARBITACORA+'</textarea>'+
          '</td>'+
          '<td>'+
            '<textarea class="form-control" rows="5">'+json[0].ACCIONESBITACORA+'</textarea>'+
          '</td>'+
        '</tr>'+
        '<tr>'+
          '<td colspan=3 style="text-align:center;"><strong>OBSERVACIONES</strong></td>'+
        '</tr>'+
        '<tr>'+
          '<td colspan=3>'+
            '<textarea class="form-control" rows="5">'+json[0].OBSERVACIONESBITACORA+'</textarea>'+
          '</td>'+
        '</tr>'+
      '</table>'+
      '<table class="table table-sm table-striped" id="crudcargos" style="font-size: small">'+    
        '<tr>'+
          '<td style="text-align:center;">'+
            '<br><br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+
            '____________________________________________ <br> <strong>FIRMA EVALUADO</strong>'+
          '</td>'+
          '<td style="text-align:center;">'+
            '<br><br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '+
            '____________________________________________ <br> <strong>FIRMA EVALUADOR</strong>'+
          '</td>'+
        '</tr>'+
      '</table>'+
    '</div>';
  });
}



