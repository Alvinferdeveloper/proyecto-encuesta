<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class=" bg-indigo-900 w-[100%]">
   <form action="/procesarEncuesta" method="POST" class=" min-w-[400px] w-[40%] p-12 mx-auto bg-indigo-700 text-white">
    @csrf
    <h2 class=" text-center text-white font-bold  text-2xl mb-2">Encuesta sobre calidad academica</h2>
    @if ($estado == 'HECHA')
        <div class=" mb-4">Usted ya ha realizado esta encuesta, se le notificara cuando hayan encuestas nuevas</div>
        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><a href="/logOut" class="">LogOut</a></button>

        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><a href="/respuestaUsuario/{{$usuarioId}}" class="">Ver Mis Respuestas</a></button>
    @else
    @foreach ($preguntas as $pregunta)
    <div class="mb-5">
        <label for="base-input" class="block mb-2 text-sm font-medium text-white mt-8">{{$pregunta->pregunta}}</label>

    </div>
       @if ($pregunta->tipo == 'MULTIPLE')
      
       <select id="countries" class=" border bg-gray-100 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="pregunta{{$pregunta->id}}">
       @foreach ($pregunta->posibles_respuestas as $posible_respuesta)
         <option value="{{$posible_respuesta->id}}" class="">{{$posible_respuesta->posible_respuesta}}</option> 
       @endforeach
    </select>
       @else
       <div class="mb-5">
        <input type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="pregunta{{$pregunta->id}}" minlength="4">
    </div>
       @endif
    @endforeach
    <button class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 mt-7">
        <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white rounded-md group-hover:bg-opacity-0">
        Enviar
        </span>
        </button>
   </form>
   @endif


  
   
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>
</html>