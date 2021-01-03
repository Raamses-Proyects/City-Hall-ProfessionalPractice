<?php
//Creando conexion
  $conexion = mysqli_connect("localhost", "root", "", "ayuntamientomagdalena");

//Verificando conexion a la base de datos
    if(!$conexion)
    {
      echo '<script>console.log("Error al conectar base de datos")</script>';
    }
    else
    {
      echo '<script>console.log("Conectado a la base de datos")</script>';
    }

 ?>
