<?php
//_________________________________________________Area de inicio de sesion________________________________________
session_cache_limiter('public');
session_start();
error_reporting(0);
$variable = $_SESSION['inicioSesion'];//usando la variable de sesion creanda en loginAdministrador.php

if($variable == null || $variable == "")
{
  echo '<script>alert("Usted no tiene autorización para acceder a esta página")
              window.history.go(-1);
      </script>';
die();

}

//_______________________________Area para trabajar con la consulta______________________
$nombreEmpresa = $_POST["txtEmpresa_buscar"];

//Incluyendo conexion
include "conexion.php";

  //Creando consulta para mostrar los datos
$consulta = "SELECT id, nombreEmpresa, calle, numero, colonia, referencia, telefono, celular, paginaWeb, giro, especificar, razonSocial, nombrePropietario, nombreRepresentante, numeroEmpleados,
actividadEmpresa, sugerenciaDEC, comentarios, latitud, longitud FROM datos WHERE nombreEmpresa = '$nombreEmpresa'";

//Ejecutando consulta
$resultado = mysqli_query($conexion, $consulta);


if(mysqli_num_rows($resultado) > 0)
{
  echo "<script> alert('Datos de empresa encontrados:')

           </script>";

    while($datos = mysqli_fetch_array($resultado))
    {
       //$datos['calle'];

       echo "
       <body class = 'fondoBuscarDatos'>

       <link rel = 'stylesheet' href='../css/estilos.css'>

       <link rel = 'stylesheet' href='../css/fonts.css'>

       <script src='https://code.jquery.com/jquery-1.12.4.js'> </script>

       <script src='https://code.jquery.com/ui/1.12.1/jquery-ui.js'></script>

       <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js'> </script>


       <form action='actualizarDatos.php' onclick='habilitar()' method='post' class = 'formMostrarDatos'>

        <h2 class ='h2_Actualizar'>Datos a Actualizar </h2>


        <label class = 'formulario__label'>ID de empresa:</label> <br>
        <input type='text' name='txtID'  value='$datos[id]' placeholder='ID solo lectura' maxlength=5 readonly>


         <label class = 'formulario__label'>Nombre de empresa:</label>
         <input type='text' name='txtNombreEmpresa'  value='$datos[nombreEmpresa]' placeholder='Empresa/negocio' maxlength=150 >

         <div class = 'container container__flex'>
           <div class = 'column column--50-25'>

             <label class = 'formulario__label'>Dirección: </label>

           </div>
         </div>

         <div class = 'container container__flex'>

             <div class = 'column column--50-25'>
               <input type = 'text' name='txtCalle' value ='$datos[calle]' placeholder = 'Ingresar la calle' maxlength=25>
             </div>

             <div class = 'column column--50-25'>
               <input type = 'text' name = 'txtNumero'  value='$datos[numero]' placeholder = 'Ingresar el número' maxlength=5 id = 'Num'>
             </div>

             <div class = 'column column--50-25'>
               <input type = 'text' name = 'txtColonia' placeholder = 'Ingresar la colonia' value='$datos[colonia]' maxlength=40>
             </div>

             <div class = 'column column--50-25'>
               <input type = 'text' name = 'txtReferencia' placeholder = 'Ingresar referencia' value='$datos[referencia]' maxlength=50>
             </div>

             <div class = 'column column--50-25'>
               <label class = 'formulario__label'>Latitud: </label>
               <input type='text' id = 'idLatitud' name='txtLatitud' placeholder='Ingrese la latitud' value='$datos[latitud]'>
             </div>

             <div class = 'column column--50-25'>
               <label class = 'formulario__label'>Longitud: </label>
               <input type='text' id = 'idLongitud' name='txtLongitud' placeholder='Ingrese la longitud' value='$datos[longitud]'>
             </div>


         </div>

         <label class = 'formulario__label'>Teléfono/Celular: </label>


         <div class = 'container container__flex'>
         <div class='column column--50-25'>
           <input type='text' name='txtTelefono' placeholder='Teléfono' value='$datos[telefono]' id='Tel'  maxlength=14>
         </div>

            <div class='column column--50-25'>
              <input type='text' name='txtCelular' placeholder='Celular' value='$datos[celular]' id='Cel'  maxlength=14>
           </div>
         </div>

         <label class = 'formulario__label'>Página web: </label>
         <input type='url' name='txtPagWeb' placeholder='Web empresarial/red social de trabajo' value='$datos[paginaWeb]' maxlength=100>

         <label class = 'formulario__label'>Giro: </label>
         <select id = 'IdLista' class='letraCombo' name='comboLista'>

           <option value='comercio'>Comercio </option>

           <option value='servicios'>Servicios </option>

           <option value='industria'>Industria </option>

           <option value='minero'>Minero </option>

           <option value='educativo'>Educativo </option>

           <option value='otro'>Otro </option>

         </select><br>
        <div class = 'container container__flex'>

         <div class='column column--50-25'>
            <label class = 'formulario__label'>Si el usuario lo especifico: </label>
            <input type='text' name='txtEspecificar' placeholder='Especificar' value='$datos[especificar]'  id = 'IdEspecificar' maxlength=50>
         </div>

         <div class='column column--50-25'>
          <label class = 'formulario__label'>Giro Actual: </label>
           <input type='text' name='txtGiroActual' placeholder='Giro' value='$datos[giro]' id='Cel' disabled = true maxlength=14>
         </div>
        </div>

         <label class = 'formulario__label'>Razón social: </label>
         <div class='help-tip'>
           <p>La razon social es la denominación por la cual se conoce colectivamente a una empresa. Se trata de un nombre oficial y legal.</p>
         </div>
         <input type='text' name='txtRazonSocial' placeholder='Razón social' value='$datos[razonSocial]' maxlength=50>

         <label class = 'formulario__label'>Nombre del propietario: </label>
         <input type='text' name='txtNomPropietario' placeholder='Ingrese nombre de propietario' value='$datos[nombrePropietario]' maxlength=40>

         <label class = 'formulario__label'>Nombre del representante: </label>
         <input type = 'text' name = 'txtNomRepresentante' placeholder = 'Ingrese nombre de representante' value='$datos[nombreRepresentante]' maxlength=40>

         <label class = 'formulario__label'>Número de empleados:</label>
         <input type = 'text' name = 'txtNumEmpleados' placeholder = 'Ingrese el número de empleados' value='$datos[numeroEmpleados]' id = 'NumEmpleados' maxlength=5>


         <label class = 'formulario__label'>Descripción de la actividad que se realiza en su empresa o negocio: </label>
         <textarea name='textActividadEmpresa' placeholder='Ingresar las actividades realizadas' maxlength=255>$datos[actividadEmpresa] </textarea>

         <label class = 'formulario__label'>Que tipo de cursos, capacitación, o apoyo sugiere a Desarrollo Económico y Turístico: </label>
         <textarea name='textASugerenciaDEC' placeholder='Brindamos capacitaciones a las empresas, si tiene alguna sugerencia escríbala' maxlength=255>$datos[sugerenciaDEC] </textarea>

         <label class = 'formulario__label'>Comentarios: </label>
         <textarea name='textAComentarios' placeholder='Nos interesa su opinión' maxlength=255>$datos[comentarios] </textarea>

         <input type='submit' value='Actualizar' id = 'idBtn' name = 'buscador' class='tam' title = 'Actualizar datos'>

       </form>

             <div class='derecha'> <a href = 'cerrarSesion.php' class = 'btnCerrar' title = 'Cerrar sesión e ir a inicio'>Cerrar sesión </a></div>
      </body>

       ";
    }//termino del while

}
else{
  echo "<script> alert('Nombre de empresa no encontrado:')
          window.history.go(-1);
           </script>";
}

 ?>
