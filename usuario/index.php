<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<?php
require '../require/comun.php';
$bd = new BaseDatos();
$modelo = new ModeloUsuario($bd);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Red Social</title>

    <!-- CSS -->
    <link href="../css/cssreset.css" rel="stylesheet">
    <link href="../css/estilo.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">


</head>

<body>
        <?php
        if (Leer::get("op") == "alta") {
            echo "alta<br/>";
            var_dump($modelo->get(Leer::get("login")));
        }
        ?>
    <div class="brand">Red Social</div>
    <div class="address-bar">Usuario</div>

    <!-- Menú Enlaces -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="../index.php">Inicio</a>
                    </li>
                    <li>
                        <a href="viewLogin.php">Acceso</a>
                    </li>
                    <li>
                        <a href="viewAlta.php">Alta</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
        <!-- /.container -->
    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
                    <div id="carousel-example-generic" class="carousel slide">
                        <!-- Imagen -->
                            <div class="item">
                                <img  src="../img/img2.jpg" alt="">
                            </div>
                    </div>
                    <!-- Pies de imagen -->
                    <h2 class="brand-before">
                        <small>Bienvenidos a</small>
                    </h2>
                    <h1 class="brand-name">Red Social</h1>
                    <hr class="tagline-divider">
                    <h2>
                        <small>Entre y 
                            <strong>decubra</strong>
                        </small>
                    </h2>
                </div>
            </div>
        </div>
    </div>


    <!-- /.container pie -->

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