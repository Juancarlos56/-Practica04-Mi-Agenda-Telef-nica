<?php
    //incluir conexión a la base de datos
    include "../../../config/conexionBD.php";
    $cedula = $_GET['cedula'];

    $sql = "SELECT * FROM usuario u WHERE u.usu_cedula LIKE '%$cedula%';";
    
    //cambiar la consulta para puede buscar por ocurrencias de letras
    $result = $conn->query($sql);

    echo " <form id='Formulario01' method='POST'  action='../../../../admin/controladores/administrador/modificarContrasena.php' style='display: inline;'>";
            
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<input type='hidden' id='codigo' name='codigo' value='".$row['usu_codigo']. "'>";
            echo "<br>";
            echo "<label for='busqueda'>Cedula: </label>";
            echo "<input type='text' id='cedula' name='cedula' value='".$row['usu_cedula'] ."' disabled>";
            echo "<br><br>";
            echo "<label for='busqueda'>Nombres: </label>";
            echo "<input type='text' id='nombres' name='nombres' value='".$row['usu_nombres'] ."' disabled>";
            echo "<br><br>";
            echo "<label for='busqueda'>Apellidos: </label>";
            echo "<input type='text' id='apellidos' name='apellidos' value='".$row['usu_apellidos'] ."' disabled>";
            echo "<br><br>";
            echo "<label for='busqueda'>Direccion:</label>";
            echo "<input type='text' id='direccion' name='direccion' value='".$row['usu_direccion'] ."' disabled>";
            echo "<br><br>";
            echo "<label for='busqueda'>Correo: </label>";
            echo "<input type='text' id='correo' name='correo' value='".$row['usu_correo'] ."' disabled>";
            echo "<br><br>";
            echo "<label for='busqueda'>fecha de nacimiento: </label>";
            echo "<input type='text' id='fechaNac' name='fechaNac' value='".$row['usu_fecha_nacimiento'] ."' disabled>";
            echo "<br><br>";
            echo "<label for='busqueda'>ROL: </label>";
            echo "<input type='text' id='rol' name='rol' value='".$row['usu_rol'] ."' disabled>";
            echo "<br><br>";
            echo "<label for='passwordAntes'>Contraseña actual: </label>";
            echo "<input type='text' id='contAct' name='contAct' value=''>";
            echo "<br><br>";
            echo "<label for='passwordNueva'>Contraseña Nueva: </label>";
            echo "<input type='text' id='contNueva' name='contNueva' value=''>";
            echo "<br><br>";
            echo "<input type='submit' id='modificar' name='modificar' value='Modificar'>";
        }
    } else {
        
    }
    echo "</form>";
    
    $conn->close();
?>