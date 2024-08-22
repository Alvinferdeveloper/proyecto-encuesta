<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
  </div>
    
   
</body>
</html>