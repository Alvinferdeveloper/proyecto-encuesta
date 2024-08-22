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
    .container {
  width: 80%;
  margin: 40px auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.header {
  background-color: #f0f0f0;
  padding: 10px;
  border-bottom: 1px solid #ccc;
}

.header h2 {
  margin: 0;
}

.info {
  padding: 20px;
}

.info p {
  margin-bottom: 10px;
}

.questions {
  padding: 20px;
}

.question {
  margin-bottom: 20px;
}

.question label {
  display: block;
  margin-bottom: 10px;
}

.question input[type="text"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
}

.question textarea {
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  resize: vertical;
}

.info_container{
    display: flex;
    justify-content: space-around
    }
</style>
<body class="bg-indigo-900">
    <div class="container w-[70vw] bg-slate-50">
        <div class="header">
          <h2>Información Personal</h2>
        </div>
       <div class="info_container">
        <div class="info">
            <p><strong>Nombre:</strong> <span id="nombre">{{$encuestado->nombres}}</span></p>
            <p><strong>Apellido:</strong> <span id="apellido">{{$encuestado->apellidos}}</span></p>
            <p><strong>Carnet:</strong> <span id="carnet">{{$encuestado->carnet}}</span></p>
          </div>
  
          <div class="info">
              <p><strong>Facultad:</strong> <span id="nombre">{{$encuestado->facultad->nombre}}</span></p>
              <p><strong>Carrera:</strong> <span id="apellido">{{$encuestado->carrera}}</span></p>
              <p><strong>Sexo:</strong> <span id="carnet">@if ($encuestado->sexo == 'F')
                  Femenino
                  @else
                  Masculino
              @endif</span></p>
            </div>
       </div>
        <div class="questions">
          <h2 class="mb-6">Preguntas y Respuestas</h2>
          <div>
            @foreach ($encuestado->respuestas as $respuesta)
            <div class="question">
                <div class=" border-2 border-black h-10 mb-4 text-center">{{$respuesta->pregunta->pregunta}}</div>
                <div class="text-center text-blue-600 font-bold text-2xl">
                    {{$respuesta->respuesta}}
                </div>
              </div>
            @endforeach
            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><a href="/encuesta" class="">Volver</a></button>
        </div>
      </div>
</body>
</html>