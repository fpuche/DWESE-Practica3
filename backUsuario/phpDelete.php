<?php
require '../require/comun.php';
//$sesion->administrador("index.php");

$bd = new BaseDatos();

$login = Leer::request("id");
echo $login;
$modelo = new ModeloUsuario($bd);
$usuario = $modelo->get($login);
echo $usuario->getIsroot();
if ($usuario->getIsroot() != 1) 
{
    $r = $modelo->delete($usuario);
}
$bd->closeConexion();
header("Location: phpMenu.php?op=delete");