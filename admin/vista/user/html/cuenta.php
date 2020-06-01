<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/modificarU.css">
    <script src="../js/agregar.js"" type="text/javascript"></script>
    <style type="text/css">
            .error {
            color: red;
            font-size: 15px;
            ;
            }
        </style>
    <title>Document</title>
</head>
<body background="../../../../config/Multimedia/imagenesParaSesion/fondoCuenta.png">
 

    <header >
        <div class="logo" >
            <a href="../../../../public/vista/paginasHTML/index.html" title="Ir a la Pagina principal"> <img src="../../../../config/Multimedia/images/LOGO.png" alt="Logo" id="leftFloat" width="78px" height="78px"></a>
            <h1> Tu Cuenta</h1> 
         </div>
   </header>

   <form class="menuHorizontal" id= "menu"> 
    <input type="button"  id="modificar" name="modificar" value="MODIFICAR USUARIO" onclick ="location.href='modificarUsuario.php'">
    <input type="button"  id="eliminar" name="eliminar" value="ELIMINAR USUARIO" onclick="location.href='eliminarUsuario.php'" >  
    <input type="button"  id="cuenta" name="cuenta" value="CAMBIAR CONTRASENA" onclick="location.href='cambiarContrasena.php'"  > 
    <input type="button"  id="cuenta" name="cuenta" value="VOLVER" onclick="location.href='usuLogeado.php'"  > 
   </form> 

    
</body>
</html>