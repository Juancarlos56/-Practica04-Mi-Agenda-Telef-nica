<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Crear Nuevo Usuario</title>
    <style type="text/css" rel="stylesheet" >
        .error{
        color: red;
    }
    </style>
</head>
<body>
    
<?php
        //incluir conexión a la base de datos
        include "../../../config/conexionBD.php";
        $codigo = $_POST["codigo"];
        $contrasena1 = isset($_POST["contAct"]) ? trim($_POST["contAct"]) : null;
        $contrasena2 = isset($_POST["contrasena2"]) ? trim($_POST["contrasena2"]) : null;
        $cargaDatos = FALSE;

        $sqlContrasena1 = "SELECT * FROM usuario where usu_codigo=$codigo and usu_password=MD5('$contrasena1')";
        $result1 = $conn->query($sqlContrasena1);

        if ($result1->num_rows > 0) {
            date_default_timezone_set("America/Guayaquil");
            $fecha = date('Y-m-d H:i:s', time());
            $sqlContrasena2 = "UPDATE usuario " .
                                "SET usu_password = MD5('$contrasena2'), " .
                                "usu_fecha_modificacion = '$fecha' " .
                                "WHERE usu_codigo = $codigo";
    
                if ($conn->query($sqlContrasena2) === TRUE) {
                    echo "Se ha actualizado la contraseña correctamemte!!!<br>"; 
                } else {
                        echo "<p>Error: " . mysqli_error($conn) . "</p>";
                    }
    
        }else{
            echo "<p>La contraseña actual no coincide con nuestros registros!!! </p>";
        }
        echo "<a href='../../../admin/vista/administrador/paginasAdminHTML/paginaAdmi.php'>Regresar</a>";

    ?>
</body>
 </html>