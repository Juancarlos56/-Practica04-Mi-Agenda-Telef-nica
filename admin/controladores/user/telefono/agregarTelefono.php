<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Modificar datos de persona </title>
</head>
<body>
    <?php
    //incluir conexión a la base de datos
    include '../../../../config/conexionBD.php';
    $codigo = $_POST["codigo"];
    $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
    $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]) : null;
    $tipo = isset($_POST["tipo"]) ? trim($_POST["tipo"]) : null;
    $operadora = isset($_POST["operadora"]) ? trim($_POST["operadora"]) : null;
   

    $sql = "INSERT INTO telefonos VALUES (0, '$tipo', '$telefono', '$operadora','$codigo')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../../../../admin/vista/user/html/agregar.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
    }
        echo "<a href='../../../vista/user/html/agregar.php'>Regresar</a>";
    $conn->close();
    ?>
</body>
</html>
