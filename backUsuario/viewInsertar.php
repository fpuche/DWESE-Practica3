<?php
require '../require/comun.php';
//$sesion->administrador("index.php");
$error = Leer::get("error");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Insertar</title>
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
        <div class="address-bar">Administradores</div>

        <!-- Menú Enlaces -->
        <nav class="navbar navbar-default" role="navigation">
            <div class="container">

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="../index.php">Inicio</a>
                        </li>
                        <li>
                            <a href="index.php">Administrador</a>
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
                        <h2 class="intro-text text-center">Añada una nueva  
                            <strong>Cuenta</strong>
                        </h2>
                        <hr>
                        <div class="central-info">
                            <form action="phpInsert.php" method="POST">            
                                <input type="hidden" name="loginpk" id="loginpk" value=""/><br/><br/>
                                <input type="text" name="login" value="" id="login" placeholder="login" required/><br/><br/>
                                <input type="password" name="clave" value="" id="clave" placeholder="clave" required/><br/><br/>
                                <input type="password" name="claveConfirmada" value="" id="claveConfirmada" placeholder="repetir clave" required/><br/><br/>  
                                <input type="text" name="nombre" value="" id="nombre" placeholder="nombre" required/><br/><br/>
                                <input type="text" name="apellidos" value="" id="apellidos" placeholder="apellidos" required/><br/><br/>
                                <input type="email" name="email" value="" id="email" placeholder="email" required/><br/><br/>            
                                <br/>
                                <label for="isactivo">Activo</label>
                                <select name="isactivo">
                                    <option value="0"  selected="selected"> >No</option>
                                    <option value="1" >Si</option>                
                                    <option value="-1" >Baneado</option>
                                </select><br/><br/>
                                <input type="checkbox" name="isroot" id="isroot"/>
                                <label for="isroot">Root</label><br/><br/>
                                <select name="rol" id="rol">
                                    <option id="usuario" value="usuario" selected="">Usuario</option>
                                    <option id="aministrador" value="administrador">Administrador</option>
                                </select><br/><br/>

                                <input type="submit" value="Alta" />
                            </form>
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
