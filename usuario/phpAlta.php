<?php

require "../require/comun.php";

$login = Leer::post("login");
$clave = Leer::post("clave");
$nombre = Leer::post("nombre");
$apellidos = Leer::post("apellidos");
$claveconfirmada = Leer::post("claveConfirmada");
$email = Leer::post("email");
if ($clave != $claveconfirmada) {
    header("Location: viewAlta.php?error=No coiciden las claves");
    exit();
}
//Creamos la base de datos
$bd = new BaseDatos();
//creamos el usuario y su modelo
$modelo = new ModeloUsuario($bd);
$objeto = new Usuario($login, $clave, $nombre, $apellidos, $email);
$r = $modelo->add($objeto);
if ($r = 1) {
    $id = md5($email . Configuracion::PEZARANA . $login);
    $enlace = Entorno::getEnlaceCarpeta("/phpConfirmar.php?id=" . $id);
    $mensaje = "Bienvenido. <a href='" . $enlace . "'>Click aqui para confirmar</a>";
    //Probar con correo:
//    $r = correo::enviarGmail(Configuracion::ORIGENGMAIL, $email, "Nueva alta. ¡Bienvenido!", $enlace, Configuracion::CLAVEGMAIL);
    echo 'Envío a correo comentado... este enlace llega al correo del usuario: <br/>';
    echo $mensaje;

//    if (!$correo) {
//        header("Location: viewAlta.php?error=$r ");
//        exit();
//    }
    exit;
}
header("Location: viewAlta.php?error=$r");
?>
