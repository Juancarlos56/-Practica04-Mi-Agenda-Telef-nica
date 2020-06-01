<?php
    session_start();

    include '../../config/conexionBD.php';
    
    $usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
    $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
    $rol = "";
    $cedula = "";
    $codigo = "";
    $sql = "SELECT * FROM usuario WHERE usu_correo = '$usuario' and usu_password = MD5('$contrasena')";
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
             $rol = $row['usu_rol'];
             $cedula = $row['usu_cedula'];
             $codigo = $row ['usu_codigo'];
        }
       
        $_SESSION['isLogged'] = TRUE;
        $_SESSION [ 'nombre_usuario' ] = $_POST [ 'correo' ];
        $_SESSION [ 'contraseña' ] = $_POST [ 'contrasena' ];
        $_SESSION [ 'rol' ] = $rol;
        $_SESSION [ 'cedula'] = $cedula;
        $_SESSION [ 'codigo'] = $codigo;
        
        if ($rol == 'admin') {
            header("Location: ../../admin/vista/administrador/paginasAdminHTML/paginaAdmi.php");
        }

        if ($rol == 'user') {
            header("Location: ../../admin/vista/user/html/usuLogeado.php");
        }
        

    } else {
        header("Location: ../vista/paginasHTML/iniciarSesion.html");
    }

    $conn->close();
?>

