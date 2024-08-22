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
<style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  outline: none;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body{
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  padding: 10px;
  font-family: 'Poppins', sans-serif;
  background: linear-gradient(115deg, #56d8e4 10%, #9f01ea 90%);
}
.container{
  max-width: 800px;
  background: #fff;
  width: 800px;
  padding: 25px 40px 10px 40px;
  box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
}
.container .text{
  text-align: center;
  font-size: 41px;
  font-weight: 600;
  font-family: 'Poppins', sans-serif;
  background: -webkit-linear-gradient(right, #56d8e4, #9f01ea, #56d8e4, #9f01ea);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}
.container form{
  padding: 30px 0 0 0;
}
.container form .form-row{
  display: flex;
  margin: 32px 0;
}
form .form-row .input-data{
  width: 100%;
  height: 40px;
  margin: 0 20px;
  position: relative;
}
form .form-row .textarea{
  height: 70px;
}
.input-data input,
.textarea textarea{
  display: block;
  width: 100%;
  height: 100%;
  border: none;
  font-size: 17px;
  border-bottom: 2px solid rgba(0,0,0, 0.12);
}
.input-data input:focus ~ label, .textarea textarea:focus ~ label,
.input-data input:valid ~ label, .textarea textarea:valid ~ label{
  transform: translateY(-20px);
  font-size: 14px;
  color: #3498db;
  border: none;
  outline: none
}
.textarea textarea{
  resize: none;
  padding-top: 10px;
}
.input-data label{
  position: absolute;
  pointer-events: none;
  bottom: 10px;
  font-size: 16px;
  transition: all 0.3s ease;
}
.textarea label{
  width: 100%;
  bottom: 40px;
  background: #fff;
}
.input-data .underline{
  position: absolute;
  bottom: 0;
  height: 2px;
  width: 100%;
}
.input-data .underline:before{
  position: absolute;
  content: "";
  height: 2px;
  width: 100%;
  background: #3498db;
  transform: scaleX(0);
  transform-origin: center;
  transition: transform 0.3s ease;
}
.input-data input:focus ~ .underline:before,
.input-data input:valid ~ .underline:before,
.textarea textarea:focus ~ .underline:before,
.textarea textarea:valid ~ .underline:before{
  transform: scale(1);
  border: none;
  outline: none;
}
.submit-btn .input-data{
  overflow: hidden;
  height: 45px!important;
  width: 25%!important;
}
.submit-btn .input-data .inner{
  height: 100%;
  width: 300%;
  position: absolute;
  left: -100%;
  background: -webkit-linear-gradient(right, #56d8e4, #9f01ea, #56d8e4, #9f01ea);
  transition: all 0.4s;
}
.submit-btn .input-data:hover .inner{
  left: 0;
}
.submit-btn .input-data input{
  background: none;
  border: none;
  color: #fff;
  font-size: 17px;
  font-weight: 500;
  text-transform: uppercase;
  letter-spacing: 1px;
  cursor: pointer;
  position: relative;
  z-index: 2;
}
@media (max-width: 700px) {
  .container .text{
    font-size: 30px;
  }
  .container form{
    padding: 10px 0 0 0;
  }
  .container form .form-row{
    display: block;
  }
  form .form-row .input-data{
    margin: 35px 0!important;
  }
  .submit-btn .input-data{
    width: 40%!important;
  }
}
</style>
<body>
      <div class="container w-4/6">
        <div class="text">
           Formulario de registro
        </div>
        <form action="/registerInsert" method="POST">
          @csrf
           <div class="form-row">
              <div class="input-data">
                 <input type="text" required name="nombre">
                 <div class="underline"></div>
                 <label for="">Nombres</label>
              </div>
              <div class="input-data">
                 <input type="text" required name="apellido">
                 <div class="underline"></div>
                 <label for="">Apellidos</label>
              </div>
              <div class="input-data">
                <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="sexo">

   
                  <option value="M">Femenino</option>
                  <option value="F">Masculino</option>
                  
                 
                </select>
             </div>
           </div>
           <div class="form-row">
              <div class="input-data">
                 <input type="text" required name="carnet">
                 <div class="underline"></div>
                 <label for="">Carnet</label>
              </div>
              <div class="input-data">
                 <input type="email" required name="email">
                 <div class="underline"></div>
                 <label for="">Email</label>
              </div>
              <div class="input-data">
                <input type="password" required name="password">
                <div class="underline"></div>
                <label for="">Contraseña</label>
             </div>
             
           </div>
           <div class="form-row">
            <div class="input-data">
             
  <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="facultad">

    @foreach ($facultades as $facultad)
    <option value="{{$facultad->id}}">{{$facultad->nombre}}</option>
    @endforeach
  </select>
  
            </div>
            <div class="input-data">
               <input type="text" required name="carrera">
               <div class="underline"></div>
               <label for="">Carrera</label>
            </div>
            <div class="input-data">
             
  <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="anio">

    <option value="">Año</option>
    <option value="1" default>Primero</option>
    <option value="2">Segundo</option>
    <option value="3">Tercero</option>
    <option value="4">Cuarto</option>
    <option value="5">Quinto</option>
   
  </select>
          
           
                        </div>
         </div>

         @if (session('userExist') != null)
             <h2 class=" text-red-600 font-semibold text-lg ml-4">El usuario con este carnet ya existe</h2>
         @endif
        
              <div class="form-row submit-btn">
                 <div class="input-data">
                    <div class="inner"></div>
                    <input type="submit" value="Enviar">
                 </div>
              </div>
        </form>
        </div>
     
</body>
</html>