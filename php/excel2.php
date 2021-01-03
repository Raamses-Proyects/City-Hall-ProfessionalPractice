<?php

header('Content-type:application/xls');
header('Content-Disposition: attachment; filename=empresas.xls');


//Incluyendo conexion
include "conexion.php";


  //Creando y ejecutando consulta
    $query = "SELECT * FROM datos";
    $query2 = "SELECT id, nombreEmpresa, calle, numero, colonia, referencia, telefono, celular, paginaWeb, giro, especificar, razonSocial,
     nombrePropietario, nombreRepresentante, numeroEmpleados, actividadEmpresa, sugerenciaDEC, comentarios, latitud, longitud FROM datos";

     $result = mysqli_query($conexion, $query);

 ?>

 <table border="1">
   <tr >
     <th style="font-size: 1.2em;" style="background-color:#050980;" style="color:white;">ID </th>
     <th style="font-size: 1.2em;" style="background-color:#050980;" style="color:white;">NombreEmpresa </th>
     <th style="font-size: 1.2em;" style="background-color:#050980;" style="color:white;">Calle </th>
     <th style="font-size: 1.2em;" style="background-color:#050980;" style="color:white;">Numero </th>
     <th style="font-size: 1.2em;" style="background-color:#050980;" style="color:white;">Colonia </th>
     <th style="font-size: 1.2em;" style="background-color:#050980;" style="color:white;">Referencia </th>
     <th style="font-size: 1.2em;" style="background-color:#050980;" style="color:white;">Telefono </th>
     <th style="font-size: 1.2em;" style="background-color:#050980;" style="color:white;">Celular </th>
     <th style="font-size: 1.2em;" style="background-color:#050980;" style="color:white;">PaginaWeb </th>
     <th style="font-size: 1.2em;" style="background-color:#050980;" style="color:white;">Giro </th>
     <th style="font-size: 1.2em;" style="background-color:#050980;" style="color:white;">Especificar </th>
     <th style="font-size: 1.2em;" style="background-color:#050980;" style="color:white;">RazonSocial </th>
     <th style="font-size: 1.2em;" style="background-color:#050980;" style="color:white;">NombrePropietario </th>
     <th style="font-size: 1.2em;" style="background-color:#050980;" style="color:white;">NombreRepresentante </th>
     <th style="font-size: 1.2em;" style="background-color:#050980;" style="color:white;">NumeroEmpleados </th>
     <th style="font-size: 1.2em;" style="background-color:#050980;" style="color:white;">ActividadEmpresa </th>
     <th style="font-size: 1.2em;" style="background-color:#050980;" style="color:white;">SugerenciaDEC </th>
     <th style="font-size: 1.2em;" style="background-color:#050980;" style="color:white;">Comentarios </th>
     <th style="font-size: 1.2em;" style="background-color:#050980;" style="color:white;">Latitud </th>
     <th style="font-size: 1.2em;" style="background-color:#050980;" style="color:white;">Longitud </th>
   </tr>

    <?php
      while($row = mysqli_fetch_assoc($result))
      {
        ?>

          <tr style="text-align: center;">
            <td style="background-color:#6265D5;" style="font-weight: bold;"><?php echo $row['id']; ?> </td>
            <td style="font-weight: bold;" style="background-color:#CECFF5;"><?php echo $row['nombreEmpresa']; ?> </td>
            <td style="background-color:#6265D5;" style="font-weight: bold;"><?php echo $row['calle']; ?> </td>
            <td style="font-weight: bold;" style="background-color:#CECFF5;"><?php echo $row['numero']; ?> </td>
            <td style="background-color:#6265D5;" style="font-weight: bold;"><?php echo $row['colonia']; ?> </td>
            <td style="font-weight: bold;" style="background-color:#CECFF5;"><?php echo $row['referencia']; ?> </td>
            <td style="background-color:#6265D5;" style="font-weight: bold;"><?php echo $row['telefono']; ?> </td>
            <td style="font-weight: bold;" style="background-color:#CECFF5;"><?php echo $row['celular']; ?> </td>
            <td style="background-color:#6265D5;" style="font-weight: bold;"><?php echo $row['paginaWeb']; ?> </td>
            <td style="font-weight: bold;" style="background-color:#CECFF5;"><?php echo $row['giro']; ?> </td>
            <td style="background-color:#6265D5;" style="font-weight: bold;"><?php echo $row['especificar']; ?> </td>
            <td style="font-weight: bold;" style="background-color:#CECFF5;"><?php echo $row['razonSocial']; ?> </td>
            <td style="background-color:#6265D5;" style="font-weight: bold;"><?php echo $row['nombrePropietario']; ?> </td>
            <td style="font-weight: bold;" style="background-color:#CECFF5;"><?php echo $row['nombreRepresentante']; ?> </td>
            <td style="background-color:#6265D5;" style="font-weight: bold;"><?php echo $row['numeroEmpleados']; ?> </td>
            <td style="font-weight: bold;" style="background-color:#CECFF5;"><?php echo $row['actividadEmpresa']; ?> </td>
            <td style="background-color:#6265D5;" style="font-weight: bold;"><?php echo $row['sugerenciaDEC']; ?> </td>
            <td style="font-weight: bold;" style="background-color:#CECFF5;"><?php echo $row['comentarios']; ?> </td>
            <td style="background-color:#6265D5;" style="font-weight: bold;"><?php echo $row['latitud']; ?> </td>
            <td style="font-weight: bold;" style="background-color:#CECFF5;"><?php echo $row['longitud']; ?> </td>
          </tr>

        <?php
      }
     ?>
 </table>
