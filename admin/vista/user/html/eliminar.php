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
                    <label for="cedula">Telefono </label>
                    <input type="text" id="cedula" name="cedula" value="<?php echo $row["usu_cedula"]; ?>"disabled/>
                    <br>

                    <input  type="submit" id="eliminar" name="eliminar" value="Eliminar"  />
                    <br>
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
</html>