<?php
//_________________________________________________Area de inicio de sesion________________________________________
  session_start();
  error_reporting(0);
  $variable = $_SESSION['inicioSesion'];//usando la variable de sesion creanda en loginAdministrador.php


  if($variable == null || $variable == "")
  {
    echo '<script>alert("Usted no tiene autorización para acceder a esta página")
                window.history.go(-1);
        </script>';
  die();//para que no ejecute nada mas en caso de sesion fallida

  }


  //____________________Para buscar los datos_________________
  include "conexion.php";

//Creando consulta
  $query = "SELECT * FROM datos";

  //Ejecutando consulta
  $resultado = mysqli_query($conexion, $query);

  //Creando array
  $array =  array();

  if($resultado)
  {
    while($row = mysqli_fetch_array($resultado))
    {
      $nombre = utf8_encode($row['nombreEmpresa']);//aqui es donde especifico que solo quiero el campo de nombreEmpresa de la tabla datos
      array_push($array, $nombre);
    }
  }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <script type="text/javascript" src = "../js/jquery-3.4.1.min.js"> </script>
    <link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">
    <script type="text/javascript" src = "../js/jquery-ui.js"> </script>

    <link rel = "stylesheet" href="../css/estilos.css">
    <link rel = "stylesheet" href="../css/exportar.css">
    <link rel = "stylesheet" href="../css/font.css">
  </head>
  <body>

      <form action="exportar_archivo_de_excel.php" method="post" class="formExcel">

        <h2>Administrador </h2>

        <h2 class="formulario__label_excel colorBlack">Exporte los datos de las empresas a Excel</h2>

        <input type="submit" value="Exportar a Excel" id = "formulario__btn" name = "buscador" class="tamBtnExcel" title = "Exportar datos">

      </form>

      <div class="derecha"> <a href = "cerrarSesion.php" class = "btnCerrar ad" title = "Cerrar sesión e ir a inicio">Cerrar sesión</a></div>



      <div class = "container container__flex">


        <div class = "column column--50-25">
          <!--____________________________________Form para Buscar y actualizar__________________________________________-->
          <form action="buscarDatos.php" method="post" class="forms buscar">

            <h2>Buscar </h2>
            <h2 class="formulario__label_excel colorBlack">Ingrese el nombre de la Empresa: </h2>
            <input type="text" name = "txtEmpresa_buscar" id = "idBuscar" value="" maxlength=30 title = "Buscar datos" placeholder="&#128269;">
            <input type="submit" value="Buscar" id = "formulario__btn_delete" name = "buscador" class="tamBtnExcel delete" title = "Buscar datos">

          </form>
        </div>


        <div class = "column column--50-25">
          <!--___________________________________________Form para Borrar___________________________________________-->
          <form action="eliminarDatos.php" method="post" class="forms eliminar">

            <h2>Eliminar </h2>
            <h2 class="formulario__label_excel colorBlack">Ingrese el nombre de la Empresa: </h2>
            <input type="text" name = "txtEmpresa_eliminar" id = "idEliminar"  value="" maxlength=30 title = "Se eliminara todo" placeholder="&#128686;">
            <input type="submit" value="Eliminar" id = "formulario__btn_delete" name = "buscador" class="tamBtnExcel delete" title = "Eliminar datos">

          </form>
        </div>

    </div>


    <script type="text/javascript">
      $(document).ready(function(){

        var items = <?= json_encode($array) ?>

        $("#idBuscar").autocomplete({
          source: items
      });

    }) ;


    $(document).ready(function(){

      var items = <?= json_encode($array) ?>

      $("#idEliminar").autocomplete({
        source: items
      });

    }) ;

</script>



      <script src="../js/detalles.js"> </script>

  </body>
</html>
