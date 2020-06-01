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
        $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
        $nombres = isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'UTF-8') : null;
        $apellidos = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'UTF-8') : null;
        $direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null;
        $correo = isset($_POST["correo"]) ? trim($_POST["correo"]): null;
        $fechaNacimiento = isset($_POST["fechaNac"]) ? trim($_POST["fechaNac"]): null;
        $rol = isset($_POST["rol"]) ? mb_strtoupper(trim($_POST["rol"]), 'UTF-8') : null; 
        date_default_timezone_set("America/Guayaquil");
        $fecha = date('Y-m-d H:i:s', time());
        $cargaDatos = FALSE;

        $sql = "UPDATE usuario " .
                "SET usu_eliminado = 'S' " .
                "WHERE usu_codigo = $codigo";
        
        if ($conn->query($sql) === TRUE) {
            header("Location: ../../../admin/vista/administrador/paginasAdminHTML/paginaAdmi.php");
        } else {

            if($conn->errno == 1062){
                echo '<p>La persona con la cedula '.$cedula.'ya esta registrada en el sistema</p>';
                
            }else{
                echo "ERROR: ".$sql ."<br>".mysqli_error($conn)."<br>" ;
            }
        }
    
        //cerrar la base de datos
        $conn->close();
        echo "<a href='../../../admin/vista/administrador/paginasAdminHTML/paginaAdmi.php'>Regresar</a>";
    
    ?>
</body>
 </html>