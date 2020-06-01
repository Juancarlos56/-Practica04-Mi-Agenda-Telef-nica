<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>usuarioLogeado</title>
    <script src="../js/listar.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../cssAdmin/pageHome.css">
    <link rel="stylesheet" href="../cssAdmin/estilos.css" type="text/css" media="screen"/>
    <link href="https://fonts.googleapis.com/css2?family=Nixie+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Aleo:wght@300&family=Montserrat:wght@300&display=swap" rel="stylesheet">
</head>
<body>

    <?php  
        session_start();
        if(!isset($_SESSION['isLogged'])|| $_SESSION['isLogged'] === false ){
            header("Location: ../../../../public/vista/paginasHTML/iniciarSesion.html");
        }
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
                </nav>

            </div>
        </div>
    </header>

    <div class="separador"> </div>

    <div class="fondo">
        <img src="../../../../config/Multimedia/imagesCSS/s3.png" alt="presentacion" style="width: 100%;">
    </div>     
</body>
</html>