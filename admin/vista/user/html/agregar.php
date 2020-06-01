<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/agregar.css">
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
<body background="../../../../config/Multimedia/imagenesParaSesion/fondoAgregar.png">
   
<?php  
    include '../../../../config/conexionBD.php';
    session_start();
    if(!isset($_SESSION['isLogged'])|| $_SESSION['isLogged'] === false ){
        header("Location: ../../../../public/vista/paginasHTML/index.html");
    }
    $correo = $_SESSION['nombre_usuario']; 
    $cedula = $_SESSION [ 'cedula'];
    $codigo = $_SESSION['codigo'];
    

?>

    <header >
        <div class="logo" >
            <a href="../../../../public/vista/paginasHTML/index.html" title="Ir a la Pagina principal"> <img src="../../../../config/Multimedia/images/LOGO.png" alt="Logo" id="leftFloat" width="78px" height="78px"></a>
            <h1>AGREGAR NUEVO TELEFONO</h1> 
         </div>
         </header>

    <div class="separador"> 

  <form class="menuHorizontal" id= "menu" method="POST" action="../../../controladores/user/telefono/modificar.php" > 

    <label for="cedula">CEDULA:</label>
    <input type="text"  id="cedula" name="cedula"   value="<?php echo "$cedula" ?>" onclick ="return buscarPorCedula()">


    <label for="numero">NUMERO NUEVO DE TELEFONO:</label>
    <input type="text"  id="telefono" name="telefono"  onkeyup=" return validarNumero(this)" onblur= "return verificarTelefono(this)" /> <span id="mensajeTelefono" class="error"></span><br>


    <label for="tipo">TIPO:</label>
    <input type="text"  id="tipo" name="tipo" >

    <label for="operadora">OPERADORA:</label>
    <input type="text"  id="operadora" name="operado" > 

    
    <input class="agregar" type="button" id="agregar" name="agregar" value="AGREGAR" onclick="agregar()">
    <input type="submit" id="modificar" name="modificar" value="Modificar" />
   </form>

   <div class="separador"> 
       
</body>
</html>