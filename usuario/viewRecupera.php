<?php
require '../require/comun.php';
$id = Leer::get("id");
$login = Leer::get("login");
$bd = new BaseDatos();
$modelo = new ModeloUsuario($bd);
$r = $modelo->cambiarClave($login, $id);
if ($r <= 0) {
    $bd->closeConexion();
    header("Location:index.php");
    exit();
}
$bd->closeConexion();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Recupera</title>
        <script src="../js/main.js"></script>

        <!-- CSS -->
        <link href="../css/cssreset.css" rel="stylesheet">
        <link href="../css/estilo.css" rel="stylesheet">

        <!-- Fonts -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    </head>
    <body>

        <div class="brand">Red Social</div>
        <div class="address-bar">Usuarios</div>

        <!-- Menú Enlaces -->
        <nav class="navbar navbar-default" role="navigation">
            <div class="container">

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="../index.php">Inicio</a>
                        </li>
                        <li>
                            <a href="index.php">Usuario</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
        </nav>

        <div class="container">

            <div class="row">
                <div class="box2">
                    <div class="col-lg-12">
                        <hr>
                        <h2 class="intro-text text-center">Recupere el acceso a su 
                            <strong>Cuenta</strong>
                        </h2>
                        <hr>
                        <div class="central-info">
                            <div class="col-lg-12">
                                <form action="phpRecupera.php" method="POST">   
                                    <label for="clave">Clave</label>
                                    <input type="password" name="clave" value="" id="clave" required/>            
                                    <label for="claveConfirmada">Confirmar clave</label>
                                    <input type="password" name="claveConfirmada" value="" id="claveConfirmada" required/> 
                                    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>"/>
                                    <input type="hidden" name="login" id="login" value="<?php echo $login; ?>"/>
                                    <input type="submit" value="Cambiar contraseña" />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <p>Copyright &copy; Red Social</p>
                    </div>
                </div>
            </div>
        </footer>       
    </body>
</html>