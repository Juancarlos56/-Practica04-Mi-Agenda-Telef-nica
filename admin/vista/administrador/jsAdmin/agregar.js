

function validarNumero(elemento)
{
    if(elemento.value.length > 0)
    {
      var miAscii = elemento.value.charCodeAt(elemento.value.length-1);
      console.log(miAscii);
      if(miAscii >= 48 && miAscii <= 57) 
        {
          console.log ('acepto valor');
          return true;
        }else {
            elemento.value = elemento.value.substring(0, elemento.value.length-1)
            console.log ('no acepto valido');
            return false;
            }
    }else {
        return true
        }
}



function verificarTelefono (celu) {

    if (celu.value.length === 10 ){
      document.getElementById('mensajeTelefono').innerHTML = ' Telefono aceptado';
      correcto = comentarioCorrecto(celu);
      console.log ('num valido');
      return true;
    }else 
    {
          celu.value= "";
          document.getElementById('mensajeTelefono').innerHTML = ' Ingresar 10 numeros'; 
          error= comentarioError(celu);
          console.log ('no num valido')
          return false;
          
    }
  }