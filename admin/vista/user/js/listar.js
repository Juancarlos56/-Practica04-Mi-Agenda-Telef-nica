function elegir(elemento){
     
    switch (elemento.value) {
        case 'AGREGAR':
          console.log('El kilogramo de Naranjas cuesta $0.59.');
          break;
        case 'MODIFICAR':
          console.log('El kilogramo de Manzanas cuesta $0.32.');
          break;
        case 'BUSCAR':
          console.log('El kilogramo de Bananas cuesta $0.48.');
          break;
        case 'ELIMINAR':
          console.log('El kilogramo de Cerezas cuesta $3.00.');
          break;
        case 'CUENTA':
          console.log('El kilogramo de Mangos y Papayas cuesta $2.79.');
          break;
        default:
          console.log('Lo lamentamos, por el momento no disponemos de ');
      }   
}


function buscarPorCedula() {
  var cedula = document.getElementById("cedula").value;
  if (cedula == "") {
      document.getElementById("informacion").innerHTML = "";
  } else {
      if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp = new XMLHttpRequest();
      } else {
          // code for IE6, IE5
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              //alert("llegue");
              document.getElementById("informacion").innerHTML = this.responseText;
          }
      };
      xmlhttp.open("GET", "../../../controladores/user/telefono/listar.php?cedula=" + cedula, true);
      xmlhttp.send();
  }
  return false;
}