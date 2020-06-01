<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../vista/user/css/agregar.css">
    <script src="../../../vista/user/js/agregar.js" type="text/javascript"></script>
    <style type="text/css">
            .error {
            color: red;
            font-size: 15px;
            ;
            }
        </style>
    <title>Document</title>
</head>
<body background="../../../../config/Multimedia/imagenesParaSesion/fondoAgregar.png">
   
<?php  
    session_start();
    if(!isset($_SESSION['isLogged'])|| $_SESSION['isLogged'] === false ){
        header("Location: ../vista/paginasHTML/iniciarSesion.html");
    }
    $correo = $_SESSION['nombre_usuario'];  
?>

    <header >
        <div class="logo" >
            <a href="../../../../public/vista/paginasHTML/index.html" title="Ir a la Pagina principal"> <img src="../../../../config/Multimedia/images/LOGO.png" alt="Logo" id="leftFloat" width="78px" height="78px"></a>
            <h1>AGREGAR NUEVO TELEFONO</h1> 
         </div>
         </header>

    <div class="separador"> 

  <form class="menuHorizontal" id= "menu" > 

    <label for="female">CEDULA:</label>
    <input type="text"  id="cedula" name="cedula"  onclick ="">
    <label for="female">NUMERO NUEVO DE TELEFONO:</label>
    <input type="text"  id="telefono" name="telefono"  onkeyup=" return validarNumero(this)" onblur= "return verificarTelefono(this)" /> <span id="mensajeTelefono" class="error"></span><br>
    <label for="female">TIPO:</label>
    <input type="text"  id="tipo" name="tipo" > 
    <label for="female">OPERADORA:</label>
    <input type="text"  id="operadora" name="operado" > 
    <input class="agregar" type="button" id="agregar" name="agregar" value="AGREGAR" onclick="agregar()">
   </form> 

   <div class="separador"> 
       
</body>
</html>