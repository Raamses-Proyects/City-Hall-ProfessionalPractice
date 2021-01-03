<?php
//Incluyendo conexion
include "conexion.php";

  //Creando consulta
     $query = "UPDATE datos SET nombreEmpresa ='$_POST[txtNombreEmpresa]', calle = '$_POST[txtCalle]', numero = '$_POST[txtNumero]', colonia = '$_POST[txtColonia]',
     referencia = '$_POST[txtReferencia]', telefono = '$_POST[txtTelefono]', celular = '$_POST[txtCelular]', latitud = '$_POST[txtLatitud]', longitud = '$_POST[txtLongitud]',
     paginaWeb = '$_POST[txtPagWeb]', giro = '$_POST[comboLista]', especificar = '$_POST[txtEspecificar]',
     razonSocial = '$_POST[txtRazonSocial]', nombrePropietario = '$_POST[txtNomPropietario]',
     nombreRepresentante = '$_POST[txtNomRepresentante]', numeroEmpleados = '$_POST[txtNumEmpleados]',
     actividadEmpresa = '$_POST[textActividadEmpresa]', sugerenciaDEC = '$_POST[textASugerenciaDEC]',
     comentarios = '$_POST[textAComentarios]' WHERE id ='$_POST[txtID]'";


    //Ejecutando consulta
    $resultado = mysqli_query($conexion, $query);

//Verificando funcionalidad de consulta
    if($resultado)//si el resultado es positivo
    {
      echo "<script> alert('Datos de empresa Actulizados:')
              window.location='sesion_administrador.php';
               </script>";
    }
    else{
      echo "<script> alert('Error:')
              window.history.go(-1);
               </script>";
    }

?>
