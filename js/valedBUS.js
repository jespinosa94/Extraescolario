//$(document).on("ready",inicio);

//PARA LA PROXIMA EN VEZ DE PONER CORREO EMPRESA PON SOLO CORREO Y ASÍ EN USUARIO NO TIENES CORREO EMPRESA MELÓN
function validar_Todo()
{

      if(validar_Email() && validar_Telef() && validar_Fecha())
      {
        //alert("devuelvo true");
        return true;
      }
      else
      {
        /*
        var bool1=validar_Email();
        var bool2=validar_Telef();
        var bool3=validar_Pass();
        var bool4=validar_Nick();
        alert("devuelvo false la variable email es"+ bool1 +"la variable telef es "+ bool2 +"la variable pass es " + bool3 +" validar nick da:" +bool4);
        */
        return false;
      }



}

function comprobar_DatosBD()
{
  alert("si");
  return false;
}

function validar_Email()
{
  var valor = document.getElementById("correoempresa").value;
  if( !(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(valor)) )
  {
    //alert ("No has introducido una dirección de correo!");
    poner_Estados("correoempresa","error","No has introducido una dirección de correo!");
    return false;
  }
  else
  {
    poner_Estados("correoempresa","success","Has introducido una direccion de correo");
  }
  return true;
}
function poner_Estados(id,tipo,texto)
{
    $('#'+id).parent().parent().attr("class","form-group has-"+tipo);
    $('#'+id).attr("title",texto);
    $('#'+id).parent().children("span").text(texto).show();
}

function validar_Telef()
{

  var valor = document.getElementById("telefonoempresa").value;
  if( isNaN(valor) )
  {
    //alert("El teléfono introducido no esta compuesto solo por números, por favor introduce números solamente");
    poner_Estados("telefonoempresa","error","El teléfono introducido no esta compuesto solo por números, por favor introduce números solamente");
    return false;
  }
  else if( !(/^\d{9}$/.test(valor)) )
  {
    //alert("Introduce 9 números en el campo teléfono");
    poner_Estados("telefonoempresa","error","Introduce 9 números en el campo teléfono");
    return false;
  }
  else
  {
    poner_Estados("telefonoempresa","success","Teléfono introducido correctamente");
  }
  return true;
}

function validar_Pass1()
{
    var valor1 = document.getElementById("pass1").value;
    if (valor1.length < 6)
    {
        //alert("La contraseña 1 debe ser mayor de 6 digitos");
        poner_Estados("pass1","error","La contraseña debe ser mayor de 6 digitos");

    }
    else
    {
      poner_Estados("pass1","success","La contraseña tiene la longitud adecuada");

    }
}


function validar_Fecha()
{
  var valor = document.getElementById("fechan").value;
  //alert(valor);

  if( !(/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/.test(valor)) )
  {
    poner_Estados("fechan","error","la fecha de nacimiento no tiene un formato correcto");
    return false;
  }
  else
  {
    poner_Estados("fechan","success","Fecha de nacimiento válida");
    return true;
  }

}

function validar_Pass()
{
  var valor1 = document.getElementById("pass1").value;
  var valor2 = document.getElementById("pass2").value;


  if (valor1.length < 6)
  {
      //alert("La contraseña 1 debe ser mayor de 6 digitos");
      poner_Estados("pass1","error","La contraseña debe ser mayor de 6 digitos");
      return (false);
  }
  else if (valor2.length < 6)
  {
      //alert("La contraseña 2 debe ser mayor de 6 digitos");
      poner_Estados("pass2","error","La contraseña de verificación debe ser mayor de 6 digitos");
      return (false);
  }
  else if (valor1 != valor2)
  {
      //alert("La contraseña confirmada no concuerda con la contraseña escrita");
      poner_Estados("pass1","error","La contraseña no concuerda con la contraseña de verificación escrita");
      poner_Estados("pass2","error","La contraseña no concuerda con la contraseña de verificación escrita");
      form1.pass2.focus();
      return (false);
  }
  else
  {
    poner_Estados("pass1","success","Las contraseñas son válidas y coinciden");
    poner_Estados("pass2","success","Las contraseñas son válidas y coinciden");
  }
  return true;
}

function validar_Nick() //el parámetro de entrada no lo voy a usar pero se prodría usar. ES mejor pasarlo por aquí porque así solo capturas el valor 1 vez así evitas cogerlo del dom 2 veces
{

  console.log("llamo a la funcion");
  //si pongo # es una id si pongo . una clase
  if ($('#nicko').val() == "")
   {alert("el campo nick esta vacío");}
   else
   {
     console.log('el email no está vacío'+$('#nicko').val());
     // ajax llama al sitio que tiene esa url
     $.ajax({
     url: "funciones.php",
     data: 'metodo=' + 'compruebaNick' + '&nick='+ $('#nicko').val(), //envío los parámetros que quiero siempre se pone donde lo guardo y el valor
     type: "POST",
     dataType: 'json',
     success: function(json)
     {

       poner_Estados("nicko",json.estado,json.mensaje);


       console.log(json.mensaje);
       console.log("el numero de filas es :" +json.resultado);

       /*if(json.estado == "error")
         //notificaEstado("cajaNickLogin",json.estado,json.mensaje,"inputsLogin");
         alert("existe el nick")
       //si el logueo ha sido correcto redirrecciono segun el argumento
       else{
         alert("funciona")

       }*/

     },
     error: function(e){
           console.log(e.responseText);
         }
 });

   }

   if ($('#nicko').parent().parent().hasClass("has-error"))
   {return false}
   else{return true}

}
