<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet"> 
</head>
<style>

    :root{
        --var-white: rgba(255,255,255,0.3);
    }

body {
  background: linear-gradient(45deg, #FC466B, #3F5EFB);
  height: 100vh;
  font-family: 'Montserrat', sans-serif;
}

.error{
 color: rgb(158, 10, 10);
 font-weight: bold
}

.container {
  position: absolute;
  transform: translate(-50%,-50%);
  top: 50%;
  left: 50%;
  
}

form {
 
  padding: 3em;
  opacity: 10px;
  height: 320px;
  border-radius: 20px;
  border-left: 1px solid --var-white;
  border-top: 1px solid --var-white;
  backdrop-filter: blur(400px);
  box-shadow: 20px 20px 40px -6px rgba(0,0,0,0.2);
  text-align: center;
  position: relative;
  transition: all 0.2s ease-in-out;
  
  p {
    font-weight: 500;
    color: #fff;
    opacity: 0.7;
    font-size: 1.4rem;
    margin-top: 0;
    margin-bottom: 60px;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
  }
  
  a {
    text-decoration: none;
    color: #ddd;
    font-size: 12px;
    
    &:hover {
      text-shadow: 2px 2px 6px #00000040;
    }
    
    &:active {
      text-shadow: none;
    }
  }
  
  input {
    background: transparent;
    width: 200px;
    padding: 1em;
    margin-bottom: 2em;
    border: none;
    border-left: 1px solid --var-white;
    border-top: 1px solid --var-white;
    border-radius: 5000px;
    backdrop-filter: blur(5px);
    box-shadow: 4px 4px 60px rgba(0,0,0,0.2);
    color: #fff;
    font-family: Montserrat, sans-serif;
    font-weight: 500;
    transition: all 0.2s ease-in-out;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
    
    &:hover {
      background: rgba(255,255,255,0.1);
      box-shadow: 4px 4px 60px 8px rgba(0,0,0,0.2);
    }
    
    &[type="email"],
    &[type="password"] {
      
      &:focus {
        background: rgba(255,255,255,0.1);
        box-shadow: 4px 4px 60px 8px rgba(0,0,0,0.2);
      }
    }
    
    &[type="button"] {
      margin-top: 10px;
      width: 150px;
      font-size: 1rem;
      
      &:hover {
        cursor: pointer;
      }
      
      &:active {
        background: rgba(255,255,255,0.2);
      }
    }
  }
  
  &:hover {
    margin: 4px;
  }
}

::placeholder {
  font-family: Montserrat, sans-serif;
  font-weight: 400;
  color: #fff;
  text-shadow: 2px 2px 4px rgba(0,0,0,0.4);
}

.drop {
  background: --var-white;
  backdrop-filter: blur(10px);
  border-radius: 10px;
  border-left: 1px solid --var-white;
  border-top: 1px solid --var-white;
  box-shadow: 10px 10px 60px -8px rgba(0,0,0,0.2);
  position: absolute;
  transition: all 0.2s ease;
  
  &-1 {
    height: 80px;
    width: 80px;
    top: -20px;
    left: -40px;
    z-index: -1;
  }
  
  &-2 {
    height: 80px;
    width: 80px;
    bottom: -30px;
    right: -10px;
  }
  
  &-3 {
    height: 100px;
    width: 100px;
    bottom: 120px;
    right: -50px;
    z-index: -1;
  }
  
  &-4 {
    height: 120px;
    width: 120px;
    top: -60px;
    right: -60px;
  }
  
  &-5 {
    height: 60px;
    width: 60px;
    bottom: 170px;
    left: 90px;
    z-index: -1;
  }
}

a,
input:focus,
select:focus,
textarea:focus,
button:focus {
    outline: none;
}

</style>
<body>
    <div class="container" >
        <form action="/loginAction" method="POST">
          @csrf
          <p>Bienvenido</p>
          <input type="email" placeholder="email" name="email"><br>
          <input type="password" placeholder="Contraseña" name="password"><br>
          <input type="submit" value="Enviar"><br>
          @if ($errors->has('email'))
        <p class="error" >Credenciales Incorrectas</p>
        @endif
          <a href="/registro" style="font-size: 18px">Registrarse</a>
        </form>

        
       

        <div class="drops">
          <div class="drop drop-1"></div>
          <div class="drop drop-2"></div>
          <div class="drop drop-3"></div>
          <div class="drop drop-4"></div>
          <div class="drop drop-5"></div>
        </div>
      </div>
</body>
</html>