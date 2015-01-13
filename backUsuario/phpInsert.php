<?php
require '../require/comun.php';
//$sesion->administrador("index.php");
$bd = new BaseDatos();
$login = Leer::post("login");
$clave = Leer::post("clave");
$claveConfirmada = Leer::post("claveConfirmada");
$nombre = Leer::post("nombre");
$apellidos = Leer::post("apellidos");
$email = Leer::post("email");
$isactivo = 0;

if ($clave != $claveConfirmada){
   header ("Location: viewInsertar.php?error=No coiciden las claves");
  exit();   
}

if(isset($_POST["isactivo"])){    
    $isactivo = 1;
}
$isroot = 0;
if(isset($_POST["isroot"])){    
    $isroot = 1;
}
$rol = Leer::post("rol");
$usuario = new Usuario($login, $clave, $nombre, $apellidos, $email, null, $isactivo, $isroot, $rol, null);    
$modelo = new ModeloUsuario($bd);
$r = $modelo->add($usuario); 
$bd->closeConexion();
header("Location: phpMenu.php?op=insert&r=$r");
