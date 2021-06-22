<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {
  border: 3px solid #f1f1f1;
  width: 600px;
    margin-left: 500px;
    margin-top: 100px;
}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 200px;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>


<form action="{{route('sesion.login')}}" method="post">
    @csrf
  <div class="imgcontainer">
    <img src="{{url('/img/avatar.PNG')}}" alt="Avatar" class="avatar">

  </div>

  <div class="container">
    <label for="usuario"><b>Usuario</b></label>
    <input type="text" placeholder="Ingrese usuario" name="usuario" required>

    <label for="authKey"><b>Contraseña</b></label>
    <input type="password" placeholder="Ingrese contraseña" name="authKey" required>
        
    <button type="submit">Iniciar Sesión</button>
    
  </div>

  
</form>

</body>
</html>
