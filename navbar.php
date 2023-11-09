
<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
    <button id='navbar'
        class="navbar-toggler"
        type="button"
        data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasDarkNavbar"
        aria-controls="offcanvasDarkNavbar"
       >
        <span class="navbar-toggler-icon"></span>
      </button> 
      
    <a class="navbar-brand" href="home.php">SoundSolutions</a>
    
    <h6 id='nombreusuario' class="fs-5 text-white text-center mt-1  text-capitalize"></h6>
    <script>

const usuariologin = localStorage.getItem('nombre');

const user= document.getElementById('nombreusuario').innerHTML=usuariologin;





     


    </script>
      <div
        class="offcanvas offcanvas-start text-bg-dark"
        tabindex="-1"
        id="offcanvasDarkNavbar"
        aria-labelledby="offcanvasDarkNavbarLabel"
      >
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">
            Sound Solutions
          </h5>
         

          <button
            type="button"
            class="btn-close btn-close-white"
            data-bs-dismiss="offcanvas"
            aria-label="Close"
          ></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="administracion.php">Administración</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="ventas.php">Ventas</a>
            </li>
            <li>

              <div class="mt-5 w-auto"><button class="btn btn-light" onclick="cerrarsesion()" >Cerrar Sesion</button></div>
            </li>

          </ul>
        </div>
      </div>
    </div>
  </nav>
  

  <script>

   function cerrarsesion(){

    // Cuando el usuario cierra sesión
localStorage.removeItem('nombre');
window.location.href = 'index.php';


    }

  </script>