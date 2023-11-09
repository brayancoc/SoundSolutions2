<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="./bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <title>Inicio</title>
</head>
<body>
<?php include 'navbar.php';?>

<div class="bg-white d-flex justify-content-center align-items-center vh-100">
    <div
      class="bg-white p-5 rounded-5 text-secondary shadow-lg rounded"
      style="width: 25rem"
    >
      <div class="d-flex justify-content-center">
        <img
          src="iconos/person-circle-outline.svg"
          alt="login-icon"
          style="height: 7rem"
        />
      </div>
      <div class="text-center fs-1 fw-bold">Login</div>
      <div class="input-group mt-4">
        <div class="input-group-text bg-secondary">
          <img
            src="iconos/usuario.svg"
            alt="username-icon"
            style="height: 1rem"
          />
        </div>
        <input
          class="form-control bg-light"
          type="text"
          id="txtnombre"
          placeholder="Usuario"
        />
      </div>
      <div class="input-group mt-1">
        <div class="input-group-text bg-secondary">
          <img
            src="iconos/lock-closed-outline.svg"
            alt="password-icon"
            style="height: 1rem"
          />
        </div>
        <input
          class="form-control bg-light"
          id="txtpassword"
          type="password"
          placeholder="Contraseña"
        />
      </div>
      <span id='notificacion' class="text-danger"></span>
      <div onclick="buscarproducto();" class="btn btn-secondary text-white w-100 mt-4 fw-semibold shadow-sm">
        Ingresar
      </div>
     
     
      
    </div>
  </div>

  

<script type="text/javascript">

let navbar=document.getElementById('navbar');
        navbar.style.display='none';



function buscarproducto() {
    const searchInput1 = document.getElementById('txtnombre');
    const nombre = searchInput1.value;

    const searchInput2 = document.getElementById('txtpassword');
    const password = searchInput2.value;

    if (!nombre || !password) {
        alert('Por favor, ingresa un nombre de usuario y contraseña válidos.');
        return;
    }

    fetch(`http://localhost:8080/users/search?nombre=${nombre}&contrasena=${password}`)
        .then(response => response.json())
        .then(data => {
            if (data && data.length > 0) {
           // Se encontraron datos, puedes hacer algo con ellos
        // Por ejemplo, mostrarlos en un div con id "resultado"
        

        var nombre = data[0].nombre; // Suponiendo que el nombre se encuentra en la propiedad "nombre" de los datos
        console.log(nombre);

        // Redirigir a bienvenida.php con el nombre como parámetro
       window.location.href = `home.php`;


       localStorage.setItem('nombre',nombre);
       
      

        //alert('Bienvenido!'); 

            } else {
               // alert('Usuario no encontrado');

                let alerta = document.getElementById("notificacion");
              let mensaje= "Usuario no encontrado";

              alerta.innerHTML=mensaje;

            }
           
        })
        .catch(error => {
           console.error('Error al buscar el Usuario:', error);
            alert('Error al buscar el Usuario');

            



        });
}


</script>

   <script src="./bootstrap-5.3.2-dist/js/bootstrap.min.js"></script> 
</body>
</html>