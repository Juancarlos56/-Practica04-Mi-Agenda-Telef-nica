<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>usuarioLogeado</title>
    
    <!--<link rel="stylesheet" href="../cssAdmin/agregar.css">-->
    <link rel="stylesheet" href="../cssAdmin/pageHome.css">
    <link rel="stylesheet" href="../cssAdmin/estilos.css" type="text/css" media="screen"/>
    <link href="https://fonts.googleapis.com/css2?family=Nixie+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Aleo:wght@300&family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <script src="../jsAdmin/modificarClientes.js" type="text/javascript"></script>
</head>
<body background="../../../../config/Multimedia/imagenesParaSesion/fondoAgregar.png">

    <?php  
        include '../../../../config/conexionBD.php';
        session_start();
        if(!isset($_SESSION['isLogged'])|| $_SESSION['isLogged'] === false ){
            header("Location: ../../../../public/vista/paginasHTML/index.html");
        }

        $correo = $_SESSION['nombre_usuario']; 
        $cedula = $_SESSION ['cedula'];
        $codigo = $_SESSION['codigo'];
        
        $sql = "SELECT * FROM telefonos where usu_codigo=$codigo";
        $result = $conn->query($sql);

    ?>



    <header>
        <div class="logo">
            <a href="paginaAdmi.php" title="Ir a la Pagina principal"> <img src="../../../../config/Multimedia/images/LOGO.png" alt="Logo" id="leftFloat"> </a>
            
            <div id="rightFloat"> 
                
                <nav id="menu">
                    <ol>       
                        <li><a href="agregar.php">Agregar</a> </li>
                        <li><a href="modificar.php">Modificar</a> </li>
                        <li><a href="eliminar.php">Eliminar</a> </li>
                        <li><a href="listarTelefonos.php">Buscar y Listar</a> </li>
                        <li><a href="contrasena.php">Cambio Contraseña</a> </li>
                        <li><a href="../../../../config/cerrarSesion.php">Cerrar Sesion</a> </li>
                    </ol> 
                    </ol> 
                </nav>

            </div>
        </div>
    </header>

    <div class="separador"> </div>

    <section>
       
        <div class="separador"> 

        <article class="listado">
            <header>
                <h2 class="Subtitulos" style="font-size: 30px; text-align: center;">Seleccione su metodo de Busqueda</h2> 
            </header>
            
            <label for="busqueda" class="Subtitulos" style="font-size: 15px; text-align: left; width: 10%;">Buscar por:</label>
            <select name="busqueda" id="busquedaSel" onclick="return opcionBusqueda(value)">
                <option value="Cedula" id="buscarCedula" name="buscarCedula" >Cedula</option>
                <option value="Correo" id="buscarCorreo" name="buscarCorreo" >Correo</option>
            </select>
            <!--AJAX-->
            <form id="Formulario01" onsubmit="return buscarPorCedula()" style="display: inline;">
                <input type="text" id="cedula" name="cedula" value="">
                <input type="button" id="buscarCed" name="buscarCed" value="Buscar" onclick="buscarPorCedula()">
            </form>

            <form id="Formulario02" onsubmit="return buscarPorCorreo()" style="display: none;">
                
                <input type="text" id="correo" name="correo" value="">
                <input type="button" id="buscar" name="buscar" value="Buscar" onclick="buscarPorCorreo()">
            </form>
            
            <div class="separador"> </div>
            <div id="informacion"><b>Datos de la persona</b></div>


        </article>
            
    </section>
</body>
</html>
