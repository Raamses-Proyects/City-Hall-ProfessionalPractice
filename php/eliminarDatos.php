<?php
$nombreEmpresa = $_POST["txtEmpresa_eliminar"];

//Incluyendo conexion
include "conexion.php";

  //Creando consulta
  $consultaBuscar = "SELECT nombreEmpresa FROM datos WHERE nombreEmpresa = '$nombreEmpresa'";

  //Ejecutando consulta
  $resultadoBuscar = mysqli_query($conexion, $consultaBuscar);

  if($nombreEmpresa == "" || $nombreEmpresa == null)
  {
    echo"<script>alert('Ingrese el nombre de empresa a eliminar');
      window.history.go(-1);
     </script>";
  }
  else if(mysqli_num_rows($resultadoBuscar) > 0)//si el resultado es mayor a cero entonces encontro algo
  {

      while($datos = mysqli_fetch_array($resultadoBuscar))
      {
         $datos['nombreEmpresa'];
         //echo "$datos[nombreEmpresa]";

         if($datos['nombreEmpresa'] == $nombreEmpresa)//si los datos son iguales se crea una consulta y se ejecuta
         {
           $consulta = "DELETE FROM datos WHERE nombreEmpresa = '$nombreEmpresa'";
           $resultado = mysqli_query($conexion, $consulta);
           echo "<script> alert('Datos eliminados Correctamente');
            window.history.go(-1);
           </script>";
         }

      }
  }
  else{
    echo "<script> alert('Nombre de empresa no encontrado');
      window.history.go(-1);
    </script>";
  }

 ?>
