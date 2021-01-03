<?php
//Aquí es donde se crea la variable de sesion para poder entrar a sesion_administrador.php
session_start();//trabajar con variables de sesion

//Contraseña correcta
$contraseña = "ad";//este es la contraseña que se debe de ingresar


//Contraseña que ingresa el usuario por el formulario
$pass = $_POST["txtPass"];


//Creando variable de sesion
$_SESSION['inicioSesion'] = $pass;//variable de sesion

if($_SESSION['inicioSesion'] == null || $_SESSION['inicioSesion'] == "")
{
  $_SESSION['inicioSesion'] = "";
  echo "<script> alert('Ingrese la contraseña');
          window.history.go(-1);
          </script>";
}
else if($_SESSION['inicioSesion'] != $contraseña)
{
  $_SESSION['inicioSesion'] = "";
  echo "<script> alert('Contraseña incorrecta');
          window.history.go(-1);
          </script>";
}

if($_SESSION['inicioSesion'] == $contraseña)
{
  header("Location:sesion_administrador.php");//redireccionando a una página especifica
}

 ?>
