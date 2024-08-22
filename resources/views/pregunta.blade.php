<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<style>
   .pregunta {
  width: 80%;
  margin: 40px auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.pregunta h2 {
  margin: 0;
}

.estadisticas {
  padding: 20px;
}

.estadisticas p {
  margin-bottom: 10px;
}

#opciones {
  list-style: none;
  padding: 0;
  margin: 0;
}

#opciones li {
  margin-bottom: 10px;
}

#opciones li span {
  font-weight: bold;
}

#opciones li .barra {
  width: 100%;
  height: 10px;
  background-color: #ccc;
  border-radius: 5px;
}

#opciones li .barra .fill {
  width: 0%;
  height: 10px;
  background-color: #4CAF50;
  border-radius: 5px;
}
</style>
<body class="">
  <div class="pregunta">
    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><a href="/dashboard" class="">Volver</a></button>
    <h2>Pregunta:<span>{{$pregunta->pregunta}}</span></h2>

    <h3>Cantidad de respuestas: <span>{{$cantidadRespuestas}}</span></h3>
    <p id="pregunta-texto"></p>
    <div class="estadisticas">
      <p><strong>Respuestas:</strong> <span id="respuestas-total"></span></p>
      <ul id="opciones">
        @if(count($posiblesRespuestas) != 0)
       @foreach ($posiblesRespuestas as $posibleRespuesta)
       <span>{{$posibleRespuesta->posible_respuesta}}: {{$porcentajes[$posibleRespuesta->id]}}%</span><br>
       @endforeach
       @else
       @foreach ($pregunta->respuestas as $respuesta)
           <div>{{$respuesta->respuesta}}</div>
       @endforeach
       @endif
      </ul>
    </div>
    
  @if(count($posiblesRespuestas) != 0)
  <div class="container">
    <h2>Mi Gráfico de Barras</h2>
    <canvas id="miGraficoBarras"></canvas>
</div>
</div>
  <script>
    const ctx = document.getElementById('miGraficoBarras').getContext('2d');
    const labels = @json($labels);
    const posiblesRespuestas = @json($posiblesRespuestas);
    const porcentajes = @json($porcentajes);
    let data  = [];

    for(let posibleRespuesta of posiblesRespuestas){
      data.push(porcentajes[posibleRespuesta.id])
    }
    const miGraficoBarras = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Ventas',
                data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    max:100,
                    ticks:{
                      callback: function(value){
                        return value + "%"
                      }
                    }
                }
            }
        }
    });
</script>
@endif
</body>
</html>
