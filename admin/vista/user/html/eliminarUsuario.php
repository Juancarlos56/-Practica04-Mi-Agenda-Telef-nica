<DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Eliminar datos de persona</title>
        <link rel="stylesheet" href="../css/eliminarUsuario.css">
    </head>
    <body background="../../../../config/Multimedia/imagenesParaSesion/fondoCuenta.png">
        <?php
            session_start();
             if(!isset($_SESSION['isLogged'])|| $_SESSION['isLogged'] === false ){
                    header("Location: ../../../../public/vista/paginasHTML/index.html ");
                 }

            $codigo = $_SESSION [ 'codigo' ];
            $sql = "SELECT * FROM usuario where usu_codigo=$codigo";
            include '../../../../config/conexionBD.php';
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

            while($row = $result->fetch_assoc()) {
            ?>

            
        <header >
            <div class="logo" >
                 <a href="../../../../public/vista/paginasHTML/index.html" title="Ir a la Pagina principal"> <img src="../../../../config/Multimedia/images/LOGO.png" alt="Logo" id="leftFloat" width="78px" height="78px"></a>
             <h1> Tu Cuenta</h1> 
            </div>
        </header>

                <form class="menuHorizontal" id="menu" method="POST" action="../../../controladores/user/cuenta/eliminar.php"">
                    <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
                    <label for="cedula">Cedula </label>
                    <input type="text" id="cedula" name="cedula" value="<?php echo $row["usu_cedula"]; ?>"disabled/>
                    <br>
                    <label for="nombres">Nombres </label>
                    <input type="text" id="nombres" name="nombres" value="<?php echo $row["usu_nombres"]; ?>" disabled/>
                    <br>
                    <label for="apellidos">Apelidos </label>
                    <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["usu_apellidos"]; ?>" disabled/>
                    <br>
                    <label for="direccion">Dirección </label>
                    <input type="text" id="direccion" name="direccion" value="<?php echo $row["usu_direccion"]; ?>" disabled/>
                    <br>
                    <label for="correo">Correo electrónico</label>
                    <input type="email" id="correo" name="correo" value="<?php echo $row["usu_correo"]; ?>" disabled/>
                    <br>

                    
                    <input  type="submit" id="eliminar" name="eliminar" value="Eliminar"  />
                    <input type="reset" id="cancelar" name="cancelar" value="Cancelar" onclick=" location.href=' cuenta.php'" />
                    
                   
              </form>
   <?php
        }
        } else {
        echo "<p>Ha ocurrido un error inesperado !</p>";
        echo "<p>" . mysqli_error($conn) . "</p>";
    }
    $conn->close();
 ?>
</body>
</html>
