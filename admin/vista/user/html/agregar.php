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

    <article>
        <form class="menuHorizontal" id= "menu" method="POST" action="../../../controladores/user/telefono/agregarTelefono.php" > 

            <input type='hidden' id="codigo" name="codigo" value="<?php echo "$codigo" ?>">
            <label for="cedula">CEDULA:</label>
            <input type="text"  id="cedula" name="cedula"   value="<?php echo "$cedula" ?>" onclick ="return buscarPorCedula()">


            <label for="numero">NUMERO NUEVO DE TELEFONO:</label>
            <input type="text"  id="telefono" name="telefono"  onkeyup=" return validarNumero(this)" onblur= "return verificarTelefono(this)" /> <span id="mensajeTelefono" class="error"></span><br>


            <label for="tipo">TIPO:</label>
            <input type="text"  id="tipo" name="tipo" >

            <label for="operadora">OPERADORA:</label>
            <input type="text"  id="operadora" name="operadora" > 
            
            <input type="submit" id="modificar" name="modificar" value="Agregar" />

            <?php
                    $sql = "SELECT u.usu_cedula, u.usu_nombres, u.usu_apellidos, u.usu_correo, t.tel_tipo, t.tel_operadora, t.tel_numero FROM usuario u, telefonos t WHERE (u.usu_codigo = t.usu_codigo) AND (u.usu_codigo = $codigo)";
                    include '../../../../config/conexionBD.php';
                    $result = $conn->query($sql);
                    echo " <table id='tabla'>
                            <tr>
                            <th>Cedula</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Correo Electronico</th>
                            <th>Tipo de Telefono</th>
                            <th>Tipo de Operador</th>
                            <th>Numero Telefonico</th>
                            </tr>";
                    if ($result->num_rows > 0) {

                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo " <td>" . $row['usu_cedula'] . "</td>";
                            echo " <td>" . $row['usu_nombres'] . "</td>";
                            echo " <td>" . $row['usu_apellidos'] ."</td>";
                            echo " <td>" . $row['usu_correo'] ."</td>";
                            echo " <td>" . $row['tel_tipo'] . "</td>";
                            echo " <td>" . $row['tel_operadora'] . "</td>";
                            echo " <td>" . $row['tel_numero'] . "</td>";
                            echo "</tr>";
        
                        }
                    } else {
                        echo "<tr>";
                        echo " <td colspan='7'> No existen usuarios registrados en el sistema con esa informacion</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
            
                    $conn->close();
                    
                ?>

        </form>

    </article>

  
   <div class="separador"> 
       
</body>
</html>