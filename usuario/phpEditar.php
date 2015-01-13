<?php
require '../require/comun.php';
$sesion->autentificado("viewLogin.php");
$usuario= $sesion->getUsuario();
$login = Leer::post("login");
$claveAnterior = Leer::post("claveanterior");
$clave = Leer::post("clave");
$claveConfirmada = Leer::post("claveconfirmada");
$nombre = Leer::post("nombre");
$apellidos = Leer::post("apellidos");
$email = Leer::post("email");
$objeto = new Usuario($login, $clave, $nombre, $apellidos, $email);

$bd = new BaseDatos();
$modelo = new ModeloUsuario ($bd);

$cambioClave = strlen($clave)>0 && $clave == $claveConfirmada;
$cambioCorreo = $email!=$usuario->getEmail();
if ($cambioClave){
    $r= $modelo-> editConClave ($objeto, $usuario->getLogin(), $claveold);
}else{
     $r= $modelo-> editSinClave ($objeto, $usuario->getLogin());   
}

if ($cambioCorreo  && $r>0 ) 
{
    $r = $modelo->desactivar($usuario->getLogin());
    $id = md5($email . Configuracion::PEZARANA . $login);   
    $enlace = "Click aqui: <a href='".Entorno::getEnlaceCarpeta("phpconfirmar.php?id=$id")."'>Validar cuenta</a>";
    $correo = Correo::enviarGmail(Configuracion::ORIGENGMAIL, $email, "alta en web", $enlace, Configuracion::CLAVEGMAIL);
    header("Location: phplogOut.php");
    exit();
}
$sesion->setUsuario($usuario);
$bd->closeConexion();
header("Location: phpLogout.php"); 