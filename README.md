# Practica04-MiAgendaTelefonica
### ACTIVIDADES DESARROLLADAS
#### El diagrama E-R de la solución propuesta.

#### Nombre de la base de datos
- ###### La base de datos se creó en “Hipermedial”, que contiene a las tuplas “teléfonos” y “usuario”. La tabla teléfonos cuenta con 4 atributos y el 5 atributo es la llave foránea, “usu_codigo” para conectar la relación entre los usuarios y sus teléfonos. Un usuario, puede tener uno o muchos teléfonos y un teléfono debe pertenecer a un usuario.
- 
#### El desarrollo de cada uno de los requerimientos antes descritos.
##### Agregar roles a la tabla usuario.

##### Crear una tabla para almacenar los teléfonos de los usuarios

- Ejemplo de una sentencia SQL para la búsqueda de teléfonos de un usuario Anónimo.
```sh
$sql = _"SELECT u.usu_cedula, u.usu_nombres, u.usu_apellidos, u.usu_correo,
t.tel_tipo, t.tel_operadora, t.tel_numero
FROM usuario u, telefonos t
WHERE (u.usu_codigo = t.usu_codigo) AND (u.usu_cedula LIKE '%$cedula%');"
```
- Sentencia SQL update para eliminación de cuenta de un usuario Normal
```sh
$sql = _"UPDATE usuario SET usu_eliminado = 'S', usu_fecha_modificacion =
'$fecha' WHERE
usu_codigo = $codigo"_ ;
```

- Además, los requerimientos funcionales del sistema son:

- Los usuarios “anónimos” pueden registrarse en la aplicación a través de un formulario de creación de cuentas.
- La página para la creación de cuentas, se encuentra en la pagina principal (index.html), al presionar el botón, se redirige a la página, crearCuenta.html, se muestra a continuación la página.
- Los atributos de esta página fueron validados según lo solicitado en el presente informe.
- Los usuarios “anónimos” listar los números de teléfono de un usuario usando su número de cédula o correo electrónico
- La búsqueda de listar números para los usuarios anónimos se la hizo mediante AJAX, para que muestre los resultados de búsqueda sobre la misma página, que es visualizada mediante una tabla, que tiene los atributos del usuario, y puedo buscarlo, por correo o cedula.
- Los usuarios “anónimos” podrá llamar o enviar un correo electrónico desde el sistema usando aplicaciones externas.
- En la página contactos.html, se colocaron los correos electrónicos y la opción para llamar. Esto puede verlo el usuario sin necesidad de tener una cuenta o iniciar sesión,
- Un usuario puede iniciar sesión usando su correo y contraseña, y dependiendo del rol podrá:
    - Usuario Login: Se creo una sola página de login, en la cual el dependiendo del correo electrónico y la contraseña que ingrese, vamos a verificar si su rol es administrador o es un usuario.

#### Parte del código que se utilizo para separar administradores de usuarios:
```sh
if ($result->num_rows > 0 ) {
while($row = $result->fetch_assoc()) {
$rol = $row[ _'usu_rol'_ ];
$cedula = $row[ _'usu_cedula'_ ];
$codigo = $row [ _'usu_codigo'_ ];
}
$_SESSION[ _'isLogged'_ ] = TRUE;
$_SESSION [ _'nombre_usuario'_ ] = $_POST [ _'correo'_ ];
$_SESSION [ _'contraseña'_ ] = $_POST [ _'contrasena'_ ];
$_SESSION [ _'rol'_ ] = $rol;
$_SESSION [ _'cedula'_ ] = $cedula;
$_SESSION [ _'codigo'_ ] = $codigo;
if ($rol == _'admin'_ ) {
header( _"Location: ../../admin/vista/administrador/paginasAdminHTML/paginaAdmi.php"_ );
}
if ($rol == _'user'_ ) {
header( _"Location: ../../admin/vista/user/html/usuLogeado.php"_ );
}
```
 - Con la variable global $_SESSION guardamos las variables que necesitamos, para los procedimientos próximos, dependiendo si es administrador se enviara a la pagina “paginaAdmin.php” y en caso contrario se enviara ala pagina de “usuLogueado.php”.

- Los usuarios con rol de “admin” pueden: agregar, modificar, eliminar, buscar, listar y cambiar la contraseña de cualquier usuario de la base de datos. Las opciones de administrador, son la de agregar que es la primera imagen, la segunda imagen muestra la parte de buscar, que sirve para acciones como, modificar, eliminar, se busca por cedula o correo al usuario para realizar estas acciones. 
- Esta imagen muestra el método buscar que existe para el administrador con el
Se busca el nombre o la cedula de la persona y se muestra en pantalla sus datos.
Para los usuarios se creó una página principal, que presenta todas las opciones que puede realizar el usuario Normal al presionar sobre ”CUENTA”, nos lleva a la pagina tuCuenta.php.
- Los usuarios con rol de “user” pueden modificar, eliminar y cambiar la contraseña de su usuario.
- Los usuarios con rol de “user” pueden agregar, modificar, eliminar, buscar y listar sus teléfonos.

- Los datos siempre deberán ser validados cuando se trabaje a través de formularios. Los datos de los formularios fueron validados según los requerimientos. Un ejemplo de formulario para crear cuenta validado. Debido a que el código es demasiado extenso, se colocará una función corta, que represente la validación del formulario.
```sh
function numeroTelefono( _elemento_ ){
    if((elemento.value.length === 10 ) || (elemento.value.length === 7 )){
        console.log( _"telefono correcto "_ );
        document.getElementById( _'mensajeTelefono'_ ).innerHTML = _'Telefono correcto'_ ;
        document.getElementById( _'mensajeTelefono'_ ).style.color = _'#00BB2D'_ ;
        return true;
    }else{
        elemento.value = _""_ ;
        document.getElementById( _'mensajeTelefono'_ ).innerHTML =
        _'El telefono debe constar de 10 numeros para moviles o 7 para fijos'_ ;
        return false;
    }
}
```
De igual manera, se pide manejar sesiones para que existe seguridad en el sistema de agenda telefónica. Por lo qué, debe existir una parte pública y una privada. Para lo cual, se debe tener en cuenta:
- Un usuario “anónimo”, es decir, un usuario que no ha iniciado sesión puede acceder únicamente a los archivos de la carpeta pública.

- Un usuario con rol de “admin” puede acceder únicamente a los archivos de la carpeta admin → vista → admin; yadmin → controladores → admin
- Un usuario con rol de “user” puede acceder únicamente a los archivos de la carpeta admin → vista → user; y admin
    → controladores → user

#### En el informe se debe incluir la información de GitHub (usuario y URL del repositorio de la práctica)
    USUARIO: Juancarlos
    URL: https://github.com/Juancarlos56/Practica04-MiAgendaTelefonica.git
RESULTADO(S) OBTENIDO(S):
- Se crearon interfaces amigables con un usuario y agradables visualmente para el usuario
- Se crearon las carpetas en las que se podría separar las carpetas publicas de las prividades que pertenecen
al administrador como a un usuario, que ha iniciado sesión.
CONCLUSIONES:
- Se diseñaron adecuadamente elementos gráficos en sitios web en Internet.
- Se crear sitios web aplicando estándares actuales.
- El trabajo, contiene varias páginas HTML, js, css y php. La interacción entre todas ellas, fueron compiladas
para programar. Sin embargo, se logro adquirir el conocimiento y se logro conectar todas las paginas entre
sí y además se envían parámetros entre ellos.
- Se desarrollaron aplicaciones web interactivas y amigables al usuario

Nombre de estudiante: ________Juan Barrera_____________________
Nombre de estudiante: ________Katherine Barrera_____________________
