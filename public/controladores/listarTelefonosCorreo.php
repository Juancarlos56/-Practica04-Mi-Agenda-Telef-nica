<?php
    //incluir conexión a la base de datos
    include "../../config/conexionBD.php";
    $correo = $_GET['correo'];

    $sql = "SELECT u.usu_cedula, u.usu_nombres, u.usu_apellidos, u.usu_correo, t.tel_tipo, t.tel_operadora, t.tel_numero FROM usuario u, telefonos t WHERE (u.usu_codigo = t.usu_codigo) AND (u.usu_correo LIKE '%$correo%');";
    
    //cambiar la consulta para puede buscar por ocurrencias de letras
    $result = $conn->query($sql);
    echo " <table style='width:100%'>
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