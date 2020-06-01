<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Modificar datos de persona </title>
</head>
<body>
    <?php
    //incluir conexión a la base de datos
    include '../../../config/conexionBD.php';
    $codigo = $_POST["codigo"];
    $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
    $telefono = isset($_POST["telefono"]) ? mb_strtoupper(trim($_POST["telefono"]), 'UTF-8') : null;
    $apellidos = isset($_POST["tipo"]) ? mb_strtoupper(trim($_POST["tipo"]), 'UTF-8') : null;
    $direccion = isset($_POST["operadora"]) ? mb_strtoupper(trim($_POST["operadora"]), 'UTF-8') : null;
    

    $sql = "INSERT INTO usuario VALUES (0, '$nombres', '$apellidos', '$direccion','$correo', MD5('$contrasena'), '$fechaNacimiento', '$rol', 'N', null, null)";

    if ($conn->query($sql) === TRUE) {
    echo "Se ha actualizado los datos personales correctamemte!!!<br>";
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
    }
    echo "<a href='../../vista/usuario/index.php'>Regresar</a>";
    $conn->close();
    ?>
</body>
</html>
