<?php

require '../require/comun.php';
//$sesion->administrador("index.php");
$bd = new BaseDatos();
$login = Leer::post("login");
$clave = Leer::post("clave");

$modelo = new ModeloUsuario($bd);
$usuario = $modelo->autentifica($login, $clave);
if ($usuario instanceof Usuario) {
//    if ($sesion->esAdministrador($usuario)) {
        $sesion->setUsuario($usuario);
        $modelo->fechalogin($usuario);
        $bd->closeConexion();
        header("Location:phpMenu.php");
//    } else {
//        header("Location: ../usuario/viewLogin.php?error=No Administrador");
//        //$sesion->administrador("../usuario/viewLogin.php");
//    }
} else {
    $sesion->cerrar();
    $bd->closeConexion();
    header("Location:index.php?error=Login incorrecto o usuario inactivo");
}