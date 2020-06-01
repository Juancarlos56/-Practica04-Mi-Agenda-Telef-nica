<?php
    //incluir conexión a la base de datos
    include "../../../config/conexionBD.php";
    $cedula = $_GET['cedula'];

    $sql = "SELECT * FROM usuario u WHERE u.usu_cedula LIKE '%$cedula%';";
    
    //cambiar la consulta para puede buscar por ocurrencias de letras
    $result = $conn->query($sql);
    echo " <table style='width:100%'>
            <tr>
            <th>Cedula</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Correo Electronico</th>
            <th>Direccion</th>
            <th>Fecha de Nacimiento</th>
            <th>ROL</th>
            </tr>";
            
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo " <td>" . $row['usu_cedula'] . "</td>";
        echo " <td>" . $row['usu_nombres'] . "</td>";
        echo " <td>" . $row['usu_apellidos'] ."</td>";
        echo " <td>" . $row['usu_correo'] ."</td>";
        echo " <td>" . $row['usu_direccion'] ."</td>";
        echo " <td>" . $row['usu_fecha_nacimiento'] ."</td>";
        echo " <td>" . $row['usu_rol'] ."</td>";
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