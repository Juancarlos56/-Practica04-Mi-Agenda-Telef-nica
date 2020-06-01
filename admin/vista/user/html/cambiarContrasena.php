<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Contrasenia</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/modificarU.css">
</head>
<body  background="../../../../config/Multimedia/imagenesParaSesion/fondoCuenta.png">
    <?php
        session_start();
        if(!isset($_SESSION['isLogged'])|| $_SESSION['isLogged'] === false ){
        header("Location: ../../../../public/vista/paginasHTML/index.html");
         }
        $codigo = $_SESSION["codigo"];
    ?>

<header >
        <div class="logo" >
            <a href="../../../../public/vista/paginasHTML/index.html" title="Ir a la Pagina principal"> <img src="../../../../config/Multimedia/images/LOGO.png" alt="Logo" id="leftFloat" width="78px" height="78px"></a>
            <h1> Tu Cuenta</h1> 
         </div>
   </header>

    <form  class="menuHorizontal" id="menu" method="POST" action="../../../controladores/user/cuenta/cambiar_contrasena.php">

        <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
        <label for="cedula">Contraseña Actual</label>
        <input type="password" id="contrasena1" name="contrasena1" value="" required placeholder="Ingrese su contraseña actual ..."/>
        <br>
        <label for="cedula">Contraseña Nueva </label>
        <input type="password" id="contrasena2" name="contrasena2" value="" required placeholder="Ingrese su contraseña nueva ..."/>
        <br>

        <input type="submit" id="modificar" name="modificar" value="Modificar" />
        <input type="reset" id="cancelar" name="cancelar" value="Cancelar" onclick=" location.href=' cuenta.php'" />
    </form>
</body>
</html>