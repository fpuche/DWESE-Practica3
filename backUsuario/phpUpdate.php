<?php
require '../require/comun.php';
//$sesion->administrador("index.php");
$bd = new BaseDatos();
$login = Leer::post("login");
$clave = Leer::post("clave");
$nombre = Leer::post("nombre");
$apellidos = Leer::post("apellidos");
$email = Leer::post("email");
$isactivo = Leer::post("isactivo");
echo $isactivo;
$isroot = 0;
if(isset($_POST["isroot"])){    
    $isroot = 1;
}
$rol = Leer::post("rol");
$loginpk = Leer::post("loginpk");
$usuario = new Usuario($login, $clave, $nombre, $apellidos, $email, null, $isactivo, $isroot, $rol, null);
$modelo = new ModeloUsuario($bd);
$r = $modelo->editPK($usuario, $loginpk); 
$bd->closeConexion();
header("Location: phpMenu.php?op=insert&r=$r");