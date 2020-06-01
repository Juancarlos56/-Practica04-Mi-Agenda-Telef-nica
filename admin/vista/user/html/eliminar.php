<DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Eliminar datos de persona</title>
    <link rel="stylesheet" href="../css/eliminarUsuario.css">
</head>
<body background="../../../../config/Multimedia/imagenesParaSesion/fondoCuenta.png">
        
    <form class="menuHorizontal2" id= "menu2"> 
        <input type="button"  id="agregar" name="agregar" value="AGREGAR" onclick="location.href='agregar.php'">
        <input type="button"  id="modificar" name="modificar" value="MODIFICAR" onclick ="location.href='modifcar.php'">
        <input type="button"  id="eliminar" name="eliminar" value="ELIMINAR" onclick="location.href='eliminar.php'" >  
        <input type="button"  id="cuenta" name="cuenta" value="CUENTA" onclick="location.href='cuenta.php'"  > 
        <input type="button"  id="finalizar" name="finalizar" value="CERRAR SESION" onclick="location.href='../../../../config/cerrarSesion.php'"  > 
    </form> 

        <?php
            session_start();
            if(!isset($_SESSION['isLogged'])|| $_SESSION['isLogged'] === false ){
                header("Location: ../../../../public/vista/paginasHTML/index.html ");
            }
            $codigo = $_SESSION [ 'codigo' ];
        ?>
            
        <header >
            <div class="logo" >
                 <a href="../../../../public/vista/paginasHTML/index.html" title="Ir a la Pagina principal"> <img src="../../../../config/Multimedia/images/LOGO.png" alt="Logo" id="leftFloat" width="78px" height="78px"></a>
             <h1> ELIMINAR TELEFONO</h1> 
            </div>
        </header>
        <article>
        <form class="menuHorizontal" id="menu" method="POST" action="../../../controladores/user/telefono/eliminar.php"">
                <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
                <label for="telefono">Ingrese numero de telefono </label>
                <input type="text" id="numero" name="numero" value=""/>
                <br>

                <input  type="submit" id="eliminar" name="eliminar" value="Eliminar"  />
                <br>
                <input type="reset" id="cancelar" name="cancelar" value="Cancelar" onclick=" location.href='usuLogeado.php'" />
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
                
</body>
</html>
