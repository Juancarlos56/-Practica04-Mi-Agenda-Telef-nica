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
        include "../../../../config/conexionBD.php";
        $codigo = $_POST['codigo'];
        $numero = $_POST['numero'];
        
        $sql = "DELETE FROM telefonos WHERE (telefonos.usu_codigo = $codigo) AND (telefonos.tel_numero = '$numero')";
        
        if ($conn->query($sql) === TRUE) {
            header("Location: ../../../../admin/vista/user/html/eliminar.php");
        } else {

            if($conn->errno == 1062){
                echo '<p>La persona con la cedula '.$cedula.'ya esta registrada en el sistema</p>';
                
            }else{
                echo "ERROR: ".$sql ."<br>".mysqli_error($conn)."<br>" ;
            }
        }
    
        //cerrar la base de datos
        $conn->close();
        echo "<a href='../../../../admin/vista/user/html/usuLogeado.php'>Regresar</a>";
    
    ?>
</body>
 </html>