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
 $tel_numero = isset($_POST["telefono"]) ? trim($_POST["telefono"]) : null;
 $tel_tipo = isset($_POST["tipo"]) ? trim($_POST["nombres"]) : null;
 $tel_operadora = isset($_POST["operadora"]) ?trim($_POST["nombres"]) : null;

 $sql = "UPDATE telefonos " .
 "SET tel_tipo = '$tel_numero', " .
 "tel_numero = '$tel_tipo)', " .
 "tel_operadora = '$til_operadora', " . 
 "WHERE usu_codigo = $codigo";
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
