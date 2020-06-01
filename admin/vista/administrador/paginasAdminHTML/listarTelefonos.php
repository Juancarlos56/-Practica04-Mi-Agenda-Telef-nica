<!DOCTYPE html>
<html lang="es">
<!--head es utilizado para marcar información sobre el documento-->
<head>
    <!--  
        Information about Indie Rock page
        Author: Juan Carlos Barrera Barrera  
        Date:  04/04/2020 
        Filename: contactos.html 
    -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indie Rock</title>
    <!--metadatos para la pagina Indie Rock-->
    <meta name="keywords" content="Indie Rock, musica, Juan, rock, videos" />
    <link rel="stylesheet" href="../cssAdmin/pageHome.css">
    <link rel="stylesheet" href=" ../cssAdmin/estilosCSS.css" type="text/css" media="screen"/>
    <link rel="stylesheet" href="../cssAdmin/estilosListarTelefonos.css" type="text/css" media="screen"/>
    <script src="../jsAdmin/listarTelefonos.js" type="text/javascript"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Nixie+One&display=swap" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css2?family=Aleo:wght@300&family=Montserrat:wght@300&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Hind+Madurai&family=Noto+Serif+JP:wght@300&display=swap" rel="stylesheet">
    


</head>
<!--etiqueta body se utiliza para marcar el contenido
que aparecerá en la página web-->
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
                        <li><a href="agregar.html">Agregar</a> </li>
                        <li><a href="modificar.html">Modificar</a> </li>
                        <li><a href="eliminar.html">Eliminar</a> </li>
                        <li><a href="listarTelefonos.php">Buscar y Listar</a> </li>
                        <li><a href="contrasena.html">Cambio Contraseña</a> </li>
                        <li><a href="../../../../config/cerrarSesion.php">Cerrar Sesion</a> </li>
                    </ol> 
                </nav>

            </div>
        </div>
    </header>

    <!--Esta es la barra de navegación principal del sitio. Sirve para definir 
        una zona de navegación con vínculos entre las diferentes páginas.-->  
    <div class="separador"> </div>

    <section class="seccion1">
        
        <div class="separador"> </div>

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
                <input type="text" id="cedula" name="cedula" value="" onkeyup="return buscarPorCedula()" onblur="buscarPorCedula()">
                <input type="button" id="buscarCed" name="buscarCed" value="Buscar" onclick="buscarPorCedula()">
            </form>

            <form id="Formulario02" onsubmit="return buscarPorCorreo()" style="display: none;">
                
                <input type="text" id="correo" name="correo" value="" onkeyup="return buscarPorCorreo()" onblur="buscarPorCorreo()">
                <input type="button" id="buscar" name="buscar" value="Buscar" onclick="buscarPorCorreo()">
            </form>
            
            <div class="separador"> </div>
            <div id="informacion"><b>Datos de la persona</b></div>


        </article>
        
        
    </section>

    <div class="separador"> </div>

    <footer class="footer">
        <!--A nivel de página sería la típica zona en la parte baja de la web, donde 
            se suelen incluir datos de contacto, enlaces, etc-->
        <div class="container6">

            <span class="btnFacebook">
                <img src="../../../../config/Multimedia/imagesCSS/facebook.png" alt="Acceder a la cuenta">
            </span>

            <span class="btnInstagram">
                <img src="../../../../config/Multimedia/imagesCSS/instagram.png" alt="Enviar mensaje">
            </span>

            <div class="estiloPiePagina">
                <div>
                    <a href="index.html" title="Ir a la Pagina principal">  
                        <img id="footerlogo" src="../../../../config/Multimedia/images/LOGO.png" alt="logo" > 
                    </a>
                </div>
                <p>
                    &#169;Todos los derechos reservados.
                </p>
            </div>
           
        </div>   
        
        
    </footer>
</body>
</html>