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
<body class=" bg-blue-950 ">
   

<div class="relative overflow-x-auto shadow-md sm:rounded-lg w-[80%] m-auto">
   
    <div class="flex justify-between p-8 pl-32 pr-32">
        <p class=" text-white">{{$user->nombres}}</p>
        <p class=" text-white">{{$user->correo}}</p>
        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><a href="/logOut" class="">LogOut</a></button>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
            Preguntas de la encuesta
            <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Abajo tendras una lista donde podras elegir y ver las estadisticas relacionadas con cada pregunta y sus respuestas</p>
        </caption>
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Id
                </th>
                <th scope="col" class="px-6 py-3">
                    Pregunta
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Accion</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($preguntas as $pregunta)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$pregunta->id}}
                </th>
                <td class="px-6 py-4">
                    {{$pregunta->pregunta}}
                </td>
                
                <td class="px-6 py-4 text-right">
                    <a href="/pregunta/{{$pregunta->id}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Estadistica</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><a href="/usuariosEncuestados" class="">Ver usuarios</a></button>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>
</html>
