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
        $tel_numeroactual = isset($_POST["telefonoActual"]) ? trim($_POST["telefonoActual"]) : null;
        $tel_numeroNuevo = isset($_POST["telefono"]) ? trim($_POST["telefono"]) : null;
        $tel_tipo = isset($_POST["tipo"]) ? trim($_POST["tipo"]) : null;
        $tel_operadora = isset($_POST["operadora"]) ?trim($_POST["operadora"]) : null;

        $sql = "UPDATE telefonos t
                SET t.tel_tipo = '$tel_tipo', 
                    t.tel_numero = '$tel_numeroNuevo', 
                    t.tel_operadora = '$tel_operadora'
                WHERE (usu_codigo = $codigo) AND (t.tel_numero = '$tel_numeroactual')";

        if ($conn->query($sql) === TRUE) {
            header("Location: ../../../../admin/vista/user/html/modifcar.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
        }
            echo "<a href='../../../../admin/vista/user/html/modifcar.php'>Regresar</a>";
        $conn->close();
    ?>
</body>
</html>
