<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap-5.3.2-dist/css/bootstrap.min.css">

     <!--si no esta logeado el usuario redirige al login-->
     <script>
        if (!localStorage.getItem('nombre')) {
        window.location.href = 'index.php';
        }
    </script>


    <title>home</title>
</head>
<body>
    
<?php include 'navbar.php'; ?>




<h1><div id="resultado" class="text-capitalize"></div></h1>

<script type="text/javascript">





const nombre = localStorage.getItem('nombre');
console.log(nombre);


const divnombreempleado= document.getElementById('resultado');

      divnombreempleado.textContent=`Bienvenido, ${nombre}!`;

</script>

<div style="
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh; /* Ajusta la altura como desees */
        
" class="contenedor">

  
  <img  src="iconos/calculator-monochromatic.svg" width="600px" class="rounded" alt="...">
  </div>



<script src="./bootstrap-5.3.2-dist/js/bootstrap.min.js"></script> 
</body>
</html>