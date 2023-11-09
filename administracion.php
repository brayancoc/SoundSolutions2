<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <script src="html2pdf.bundle.min.js"></script>
   <!--si no esta logeado el usuario redirige al login-->
   <script>
        if (!localStorage.getItem('nombre')) {
        window.location.href = 'index.php';
        }
    </script>

    <title>administracion</title>
</head>
<body>
<?php include 'navbar.php' ?>



    <div class="container-fluid p-3 bg-secondary">
        <div class="row">
            <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Productos</h4>
                            </div>
                            <div class="card-body  ">
                              <!--Creacion de cuadros de texto para el crud-->

                              <!--cuadro de texto para productos-->
                                
                                <div class="form-group "  >
                                    <label>ID</label>
                                    <input type="text" class="form-control" id="txtid" placeholder="Id producto">
                                </div>
                                <div class="form-group ">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" id="nombre" placeholder="Ingrese el nombre">
                                </div>
                                <!--cuadro de texto para Precio-->
                                <div class="form-group input-group-sm ">
                                    <label>Precio</label>
                                    <input type="text" name="" class="form-control" placeholder="Ingrese el precio" id="precio">
                                </div>
                                <!--cuadro de texto para cantidad-->
                                <div class="form-group input-group-sm ">
                                    <label>Cantidad</label>
                                    <input type="text" name="" class="form-control" placeholder="Ingrese la cantidad" id="cantidad">
                                </div>
                                <!--cuadro de texto para marca-->
                                <div class="form-group input-group-sm ">
                                    <label>Marca</label>
                                    <input type="text" name="" class="form-control" placeholder="Ingrese la marca" id="marca">
                                </div>
                                <!--cuadro de texto para fechamodificacion-->
                                <div class="form-group input-group-sm ">
                                    <label>Fecha Ingreso</label>
                                    <input type="date" name="" class="form-control" placeholder="fechaingreso" id="fechamodificacion">
                                </div>



                                 <!--botones-->

                                 <div class="d-grid gap-2 mt-3"  aria-label="Basic mixed styles example">
                                  <button type="button" class="btn btn-success" onclick="addUser();" id="botonguardar">Guardar</button>


                                  <button type="button" class="btn btn-warning" onclick="editarFila();"  id="botoneditar">
                                  Editar</button>
                              

                                <button type="button" class="btn btn-danger" onclick="cancelarmodificar();"  id="botoncancelaredicion">Cancelar</button>
                                
                                </div>


                                <div class="w-100">
                                    <span id="mensajespan" class="text-success"></span>
                                </div>
                            </div>
                        </div>

           <!--::::::::::::::::::::::::::::::::cuadro de texto buscar:::::::::::::::::::::::-->
           <div class="card mt-2">
                            <div class="card-header">
                                <h4 class="text-center">Buscar Producto</h4>
                            </div>
                            <div class="card-body">
                              <!--Creacion de cuadros de texto para el crud-->

                              <!--cuadro de texto para productos-->
                                
                                <div class="form-group ">
                                    <label for="">ID</label>
                                    <input type="text" class="form-control" placeholder="Buscar producto" id="buscarproducto" >
                                </div>
                                
                                 <!--botones-->

                                 <div class="btn-group mt-4" role="group" aria-label="Basic mixed styles example">
                                  <button type="button" class="btn btn-warning" onclick="buscarproducto();">Buscar</button>
                                  <button type="button" class="btn btn-danger" onclick="cancelarbusqueda();">Cancelar</button>
                                </div>

                                <div class="w-100">
                                    <span id="mensajespan" class="text-success"></span>
                                </div>
                            </div>
                        </div>
           <!--:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->             
            </div>
     
          <div class="col-md-8">
    <table id="tablaproducto" class="table table-bordered text-white text-center">
        <thead>
            <th>Id</th>                      
            <th>Nombre</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Marca</th>
            <th>Fecha Ingreso</th>
            <th colspan="2">Funciones</th>
        </thead>
        <tbody id="data-container">
        </tbody>
    </table>
    <button class="btn btn-primary btn-sm" id="pagina-anterior" onclick="paginaAnterior()">←Página Anterior </button>
    <button class="btn btn-primary btn-sm" id="pagina-siguiente" onclick="paginaSiguiente()"> Página Siguiente → </button>
     <button class="btn btn-warning btn-sm" onclick="generarPDF();" >Exportar PDF</button>
</div>

            
        </div>

    </div>


 

    
    <script>

//::::::::::::::::::::::::EFECTOS VISUALES::::::::::::::::::::::::::::::      
//desabilitar el input ID producto para evitar inconvenientes al editar
var input = document.getElementById("txtid");
input.disabled=true;
//ocultar boton modificar , cancelaredicion (estetico)

var boton = document.getElementById("botoneditar");
        boton.style.display = "none";

var boton2 = document.getElementById("botoncancelaredicion");
        boton2.style.display = "none";

//:::::::::::::::::funcion mostrar botones
function habilitaredicion(){

  var boton = document.getElementById("botoneditar");
        boton.style.display = "block";

  var boton2 = document.getElementById("botoncancelaredicion");
        boton2.style.display = "block";
      

}
function habilitarguardar(){

  var boton = document.getElementById("botonguardar");
        boton.style.display = "block";
}
//:::::::::::::::::funcion ocultar botones:::::::::::::::::::::
function deshabilitaredicion(){

  var boton = document.getElementById("botoneditar");
        boton.style.display = "none";
  var boton2 = document.getElementById("botoncancelaredicion");
        boton2.style.display = "none";
  
}
function desahabilitarguardar(){
 var boton = document.getElementById("botonguardar");
        boton.style.display = "none"; 
}

function cancelarbusqueda(){

 fetchData();
  document.getElementById("buscarproducto").value="";
}

function cancelarmodificar(){
  fetchData();
  document.getElementById("txtid").value="";
  document.getElementById("nombre").value="";
  document.getElementById("precio").value="";
  document.getElementById("cantidad").value="";
  document.getElementById("marca").value="";
  document.getElementById("fechamodificacion").value="";
 deshabilitaredicion();
 habilitarguardar();
}

//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
//:::::::::::::::::::::::::generar pdf::::::::::::::::::::::::::::::::

  
// ... (código de paginación y funciones de navegación)

function generarPDF() {
    // Obtener todos los datos sin paginación
    fetch('http://localhost:8080/CRUDRepo/ConsultarProductos')
        .then(response => response.json())
        .then(allData => {
            data = allData; // Almacena todos los datos en la variable data

            // Crear una tabla con todos los datos y estilos
            var table = '<table border="1"><tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Cantidad</th><th>Marca</th><th>Fecha de Modificación</th></tr>';
            data.forEach(producto => {
                table += `<tr><td>${producto.id}</td><td>${producto.nombre}</td><td>${producto.precio}</td><td>${producto.cantidad}</td><td>${producto.marca}</td><td>${producto.fechamodificacion}</td></tr>`;
            });
            table += '</table>';
            //::::::::::::Datos encabezado::::::::::::::
            var encabezado="INVENTARIO";
            var emlp="  Empleado:  ";

            //:::::::::::::::::::::::::traer variable de session local::::::::::::::: 
  const nombre = localStorage.getItem('nombre');  
  //::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: 
  //:::::::::::::::datos fechamod:::::::::
    // Crear una nueva instancia de Date
  var fechaActual = new Date();

  // Obtener la fecha actual en formato de cadena (por ejemplo, "Thu Oct 20 2023 15:45:23 GMT-0400 (hora de verano del este de Sudamérica)")
        console.log(fechaActual);

        // Si deseas formatear la fecha en un formato específico, puedes hacerlo de la siguiente manera:

        // Obtener el año
        var año = fechaActual.getFullYear();

        // Obtener el mes (0-11, donde 0 = enero, 1 = febrero, etc.)
        var mes = fechaActual.getMonth();

        // Obtener el día del mes (1-31)
        var dia = fechaActual.getDate();


        var fechaFormateada = `${año}-${mes + 1}-${dia}`;
            //:::::::::::::::::::::::::::::::::::::::::::::
              // Aplicar estilos CSS para bordes a las filas
            var cssStyles = `
                <style>
                    table {
                        border-collapse: collapse;
                        width: 100%;
                    }
                   td ,tr {
                        border: 1px solid black; 
                        padding: 1px;
                        text-align: left;
                        
                    }
                </style>
            `;

            // Convertir la tabla en PDF
            var element = document.createElement('div');
            element.innerHTML =encabezado+'<br>'+'Empleado  :'+nombre+'<br>'+'Fecha Generado :'+fechaFormateada+ cssStyles +table;
            html2pdf(element, {
                margin: 10,
                filename: 'tabla_completa.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { 
                    unit: 'mm', 
                    format: 'a4', 
                    orientation: 'portrait',
                    autoTable: { startY: 10 } // Comienza automáticamente una nueva página al llegar al final de la página actual
                }
            });
        })
        .catch(error => {
            console.error('Error al obtener los datos:', error);
        });
}



//::::::::::::::::::::::::FUNCIONES CRUD::::::::::::::::::::::::::::::

function buscarproducto(){


    const searchInput = document.getElementById('buscarproducto');
    const productId = searchInput.value;

    if (!productId) {
        alert('Por favor, ingresa un ID de producto válido.');
        return;
    }

    fetch(`http://localhost:8080/CRUDRepo/BuscarProducos/${productId}`)
        .then(response => response.json())
        .then(product => {
            if (product) {
                // Limpiar la tabla actual
                const dataContainer = document.getElementById('data-container');
                dataContainer.innerHTML = '';

                // Crear una fila para el producto encontrado
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${product.id}</td>
                    <td>${product.nombre}</td>
                    <td>${product.precio}</td>
                    <td>${product.cantidad}</td>
                    <td>${product.marca}</td>
                    <td>${product.fechamodificacion}</td>
                    <!-- Botones Editar y eliminar -->
                    <td><button id="activarbtneditar" type="button" class="btn btn-warning" onclick="enviardatosformulario(this); habilitaredicion(); desahabilitarguardar(); ">Editar</button></td>
                    <td><button type="button" class="btn btn-danger" onclick="eliminarproducto(this);">Eliminar</button></td>
                `;
                dataContainer.appendChild(row);
            } else {
                alert('No se encontró ningún producto con el ID proporcionado.');
            }
        })
        .catch(error => {
            console.error('Error al buscar el producto:', error);
        });
   habilitarguardar();
} 

function eliminarproducto(boton){
  
    // Variables para almacenar los datos editables
    // Obtener datos de las celdas y guardarlos en las variables
            let nuevosdatos={};
        

        

    // Función para capturar los datos de la fila seleccionada
    
        const fila = boton.closest('tr'); // Obtener la fila
        const celdas = fila.querySelectorAll('td'); // Obtener todas las celdas de la fila
        // Puedes hacer lo que quieras con los datos guardados en las variables

         
         

            console.log(nuevosdatos);

    nuevosdatos['id'] = celdas[0].textContent;

    //colocar los datos en el formulario para editarlo
    
    
            
            
    fetch("http://localhost:8080/CRUDRepo/EliminarProducos/" + nuevosdatos['id'], {
    method: "DELETE",
    headers: {
        "Content-Type": "application/json"
    }
    })
    .then((res) => {
        if (!res.ok) {
        throw new Error("La solicitud DELETE no se realizó con éxito.");
        }

        //mensaje de producto creado correctamente
    let mensajeSpan = document.getElementById("mensajespan");

    // Define el mensaje que deseas agregar
    let mensaje = "Producto Eliminado Correctamente!";

    // Asigna el mensaje al contenido del <span>
    mensajeSpan.innerHTML = mensaje;

        
        fetchData();
    })
    .catch((error) => {
        console.error("Error:", error);
    });

}

//:::::::::::::::::::::::::::::::::::::::funcion editar producto
function enviardatosformulario(boton){


    // Variables para almacenar los datos editables
        // Obtener datos de las celdas y guardarlos en las variables
            let nuevosdatos={};
        

            

        // Función para capturar los datos de la fila seleccionada
        
            const fila = boton.closest('tr'); // Obtener la fila
            const celdas = fila.querySelectorAll('td'); // Obtener todas las celdas de la fila
            // Puedes hacer lo que quieras con los datos guardados en las variables

            nuevosdatos['id'] = celdas[0].textContent;
            nuevosdatos['nombre'] = celdas[1].textContent;
            nuevosdatos['precio'] = celdas[2].textContent;
            nuevosdatos['cantidad'] = celdas[3].textContent;
            nuevosdatos['marca'] = celdas[4].textContent;
            nuevosdatos['fechamodificacion'] = celdas[5].textContent;

            console.log(nuevosdatos);



    //colocar los datos en el formulario para editarlo
    document.getElementById("txtid").value=celdas[0].textContent;        
    document.getElementById("nombre").value=celdas[1].textContent;
    document.getElementById("precio").value=celdas[2].textContent;
    document.getElementById("cantidad").value=celdas[3].textContent;
    document.getElementById("marca").value=celdas[4].textContent;
    document.getElementById("fechamodificacion").value=celdas[5].textContent;

}
//::::::::::::::::::::::::::::::::::::::funcion editar productos
function editarFila(boton) {

        // Variables para almacenar los datos editables
        // Obtener datos de las celdas y guardarlos en las variables

            let payload={};

    payload['id']=document.getElementById("txtid").value;
    payload['nombre']=document.getElementById("nombre").value;
    payload['precio']=parseFloat(document.getElementById("precio").value); //parseFloar para decimales, parseInt para enteros
    payload['cantidad']=document.getElementById("cantidad").value;
    payload['marca']=document.getElementById("marca").value;
    payload['fechamodificacion']=document.getElementById("fechamodificacion").value;


            console.log(payload);
            
            // enviar datos modificados
        fetch("http://localhost:8080/CRUDRepo/ModificarProducos",{
    method:"PUT",
    headers:{
        "Content-Type":"application/json"
    },
    body:JSON.stringify(payload)
    }).then((res)=>res.json()).then((response)=>{
    //mensaje de producto creado correctamente
    let mensajeSpan = document.getElementById("mensajespan");

    // Define el mensaje que deseas agregar
    let mensaje = "Producto Modificado correctamente!";

    // Asigna el mensaje al contenido del <span>
    mensajeSpan.innerHTML = mensaje;
    //limpiar campos

    fetchData();
    deshabilitaredicion();
    habilitarguardar();
    })
    document.getElementById("txtid").value="";
    document.getElementById("nombre").value="";
    document.getElementById("precio").value="";
    document.getElementById("cantidad").value="";
    document.getElementById("marca").value="";
    document.getElementById("fechamodificacion").value="";


 }
       
//::::::::::::::::::::::::::::::::::::::funcion guardar prodcuto
function  addUser(){

    let payload = {};

    payload['nombre']=document.getElementById("nombre").value;
    payload['precio']=parseFloat(document.getElementById("precio").value); //parseFloar para decimales, parseInt para enteros
    payload['cantidad']=document.getElementById("cantidad").value;
    payload['marca']=document.getElementById("marca").value;
    payload['fechamodificacion']=document.getElementById("fechamodificacion").value;


    fetch("http://localhost:8080/CRUDRepo/CrearProductos",{
    method:"POST",
    headers:{
        "Content-Type":"application/json"
    },
    body:JSON.stringify(payload)
    }).then((res)=>res.json()).then((response)=>{
    //mensaje de producto creado correctamente
    let mensajeSpan = document.getElementById("mensajespan");

    // Define el mensaje que deseas agregar
    let mensaje = "Producto Creado Correctamente!";

    // Asigna el mensaje al contenido del <span>
    mensajeSpan.innerHTML = mensaje;
    //limpiar campos
    document.getElementById("nombre").value="";
    document.getElementById("precio").value="";
    document.getElementById("cantidad").value="";
    document.getElementById("marca").value="";
    document.getElementById("fechamodificacion").value="";
    fetchData();
    })
}


//::::::::::::::::::::::::::::::::::::::::funcion para obtener y listar los productos de la api
        // Variables para la paginación
let currentPage = 1;
const itemsPerPage = 10; // Cambia esto al número de elementos por página
let data = []; // Aquí almacenaremos todos los datos obtenidos

function fetchData() {
    fetch('http://localhost:8080/CRUDRepo/ConsultarProductos')
        .then(response => response.json())
        .then(allData => {
            data = allData; // Almacena todos los datos en la variable data

            // Mostrar los datos en la tabla
            mostrarDatosEnTabla();
        })
        .catch(error => {
            console.error('Error al obtener los datos:', error);
        });
}

function mostrarDatosEnTabla() {
    // Procesar los datos y mostrar solo la página actual
    const dataContainer = document.getElementById('data-container');
    dataContainer.innerHTML = ''; // Limpiar el contenido previo

    const startIndex = (currentPage - 1) * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;
    const currentPageData = data.slice(startIndex, endIndex);

    currentPageData.forEach(producto => {
        // Crear una fila para cada producto
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${producto.id}</td>
            <td>${producto.nombre}</td>
            <td>${producto.precio}</td>
            <td>${producto.cantidad}</td>
            <td>${producto.marca}</td>
            <td>${producto.fechamodificacion}</td>

            <!-- Botones Editar y eliminar -->
            <td><button id="activarbtneditar" type="button" class="btn btn-warning" onclick="enviardatosformulario(this); habilitaredicion(); desahabilitarguardar(); ">Editar</button></td>
           
            <td><button type="button" class="btn btn-danger" onclick="eliminarproducto(this);">Eliminar</button></td>
        `;

        dataContainer.appendChild(row);
    });
}

// Funciones para navegar entre las páginas
function paginaSiguiente() {
    if (currentPage * itemsPerPage < data.length) {
        currentPage++;
        mostrarDatosEnTabla();
    }
}

function paginaAnterior() {
    if (currentPage > 1) {
        currentPage--;
        mostrarDatosEnTabla();
    }
}

// Llamar a la función para cargar los datos cuando la página cargue
window.onload = fetchData;

    </script>



<script src="./bootstrap-5.3.2-dist/js/bootstrap.min.js"></script>
</body>
</html>