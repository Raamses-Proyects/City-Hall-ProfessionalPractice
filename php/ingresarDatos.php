<?php
error_reporting(0);

//Variables
  $nombreEmpresa = $_POST["txtNombreEmpresa"];
  $calle = $_POST['txtCalle'];
  $numero = $_POST['txtNumero'];
  $colonia = $_POST['txtColonia'];
  $referencia = $_POST['txtReferencia'];
  $telefono = $_POST['txtTelefono'];
  $celular = $_POST['txtCelular'];
  $paginaWeb = $_POST['txtPagWeb'];
  $giro = $_POST['comboLista'];
  $especificar = $_POST['txtEspecificar'];
  $razonSocial = $_POST['txtRazonSocial'];
  $nombrePropietario = $_POST['txtNomPropietario'];
  $nombreRepresentante = $_POST['txtNomRepresentante'];
  $numeroEmpleados = $_POST['txtNumEmpleados'];
  $actividadEmpresa = $_POST['textActividadEmpresa'];
  $sugerenciaDEC = $_POST['textASugerenciaDEC'];
  $comentarios = $_POST['textAComentarios'];



  //Incluyendo conexion
  include "conexion.php";



//Creando consulta
  $consulta = "INSERT INTO datos(nombreEmpresa, calle, numero, colonia, referencia, telefono, celular, paginaWeb, giro, especificar,
  razonSocial, nombrePropietario, nombreRepresentante, numeroEmpleados, actividadEmpresa, sugerenciaDEC, comentarios)
               VALUES ('$nombreEmpresa', '$calle', '$numero', '$colonia', '$referencia', '$telefono', '$celular', '$paginaWeb', '$giro', '$especificar',
  '$razonSocial', '$nombrePropietario', '$nombreRepresentante', '$numeroEmpleados', '$actividadEmpresa', '$sugerenciaDEC', '$comentarios')";



  //Verificando nombre de empresa
  $verificarNomEmpresa = mysqli_query($conexion, "SELECT * FROM datos WHERE nombreEmpresa = '$nombreEmpresa'");
  if(mysqli_num_rows($verificarNomEmpresa) > 0)
  {
      echo "<script> alert('El nombre de la empresa ya esta registrado, ingrese otro.')
      window.history.go(-1);
            </script>";
      exit; //En caso de ser verdadera se sale para que no se ejecute la consulta
  }

  if($nombreEmpresa == "")
  {
    echo "<script> alert('Tiene que ingresar un nombre de empresa.')
          window.history.go(-1);
          </script>";
    exit;
  }

  if($calle == "")
  {
    echo "<script> alert('Tiene que ingresar la calle.')
          window.history.go(-1);
          </script>";
    exit;
  }

  if($numero == "")
  {
    echo "<script> alert('Tiene que ingresar el numero.')
          window.history.go(-1);
          </script>";
    exit;
  }

  if($colonia == "")
  {
    echo "<script> alert('Tiene que ingresar la colonia.')
          window.history.go(-1);
          </script>";
    exit;
  }

  if($referencia == "")
  {
    echo "<script> alert('Tiene que ingresar alguna referencia.')
          window.history.go(-1);
          </script>";
    exit;
  }

  if($telefono == "" && $celular == "")
  {
    echo "<script> alert('Tiene que ingresar el teléfono o celular de empresa.')
          window.history.go(-1);
          </script>";
    exit;
  }

  if($razonSocial == "")
  {
    echo "<script> alert('Tiene que ingresar la Razón Social.')
          window.history.go(-1);
          </script>";
    exit;
  }


  if($nombrePropietario == "")
  {
    echo "<script> alert('Tiene que ingresar el Nombre del Propietario.')
          window.history.go(-1);
          </script>";
    exit;
  }

  if($nombreRepresentante == "")
  {
    echo "<script> alert('Tiene que ingresar el Nombre del Representante.')
          window.history.go(-1);
          </script>";
    exit;
  }

  if($numeroEmpleados == "")
  {
    echo "<script> alert('Tiene que ingresar el Número de Empleados.')
          window.history.go(-1);
          </script>";
    exit;
  }

  if($actividadEmpresa == "")
  {
    echo "<script> alert('Tiene que especificar la actividad que realiza la empresa.')
          window.history.go(-1);
          </script>";
    exit;
  }



  //Ejecutando consulta
  $resultado = mysqli_query($conexion, $consulta);

    if(!$resultado)
    {
      echo "<script>alert('Error al registrar datos');
            </script>";
    }
    else
    {//Aqui deberia de redireccioanr a inicio
      echo "<script>alert('Datos almacenados exitosamente');
            window.history.go(-1);
            </script>";
    }



  //Cerrando conexion
    mysqli_close($conexion);
 ?>
