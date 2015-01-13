<?php
require '../require/comun.php';
$sesion->administrador("index.php");

$usuario = $sesion->getUsuario();

$pagina = 0;
if (Leer::get("pagina") != null) {
    $pagina = Leer::get("pagina");
}
$bd = new BaseDatos();
$modelo = new ModeloUsuario($bd);
$filas = $modelo->getList($pagina);
$paginas = $modelo->getNumeroPaginas();
$total = $modelo->count();
$enlaces = Util::getEnlacesPaginacion2($pagina, $total[0]);
?>
<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Menú Administrador</title>
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
                        <h2 class="intro-text text-center">Menú de  
                            <strong>Gestión</strong>
                        </h2>
                        <hr>
                        <div class="central-info">
                            <table border="1">  
                                <tr>
                                    <th>Login</th>  
                                    <th>Clave</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Email</th>
                                    <th>FechaAlta</th>                
                                    <th>IsActivo</th>
                                    <th>IsRoot</th>
                                    <th>Rol</th>
                                    <th>Fecha Login</th>
                                    <th>Borrar</th>
                                    <th>Editar</th>
                                </tr>
                                <?php
                                foreach ($filas as $indice => $objeto) {
                                    ?>
                                    <tr>
                                        <td><?php echo $objeto->getLogin(); ?></td>
                                        <td><?php echo $objeto->getClave(); ?></td>
                                        <td><?php echo $objeto->getNombre(); ?></td>
                                        <td><?php echo $objeto->getApellidos(); ?></td>                    
                                        <td><?php echo $objeto->getEmail(); ?></td>                    
                                        <td><?php echo $objeto->getFechaalta(); ?></td>
                                        <td><?php echo $objeto->getIsactivo(); ?></td>                    
                                        <td><?php echo $objeto->getIsroot(); ?></td>
                                        <td><?php echo $objeto->getRol(); ?></td>                    
                                        <td><?php echo $objeto->getFechalogin(); ?></td>
                                        <td><a data-id='<?php echo $objeto->getLogin(); ?>' 
                                               data-nombre='<?php echo $objeto->getNombre() . " " . $objeto->getApellidos(); ?>' 
                                               class='borrar' href='phpDelete.php?id=<?php echo $objeto->getLogin(); ?>'>borrar</a></td>
                                        <td><a data-login='<?php echo $objeto->getLogin(); ?>'
                                               href='viewEditar.php?login=<?php echo $objeto->getLogin(); ?>'>editar</a></td>
                                    </tr>
                                    <?php
                                }
                                ?> 
                                <tr>
                                    <td class="paginacion" colspan="12">
                                        <?php echo $enlaces["inicio"]; ?>
                                        <?php echo $enlaces["anterior"]; ?>
                                        <?php echo $enlaces["primero"]; ?>
                                        <?php echo $enlaces["segundo"]; ?>
                                        <?php echo $enlaces["actual"]; ?>
                                        <?php echo $enlaces["cuarto"]; ?>
                                        <?php echo $enlaces["quinto"]; ?>
                                        <?php echo $enlaces["siguiente"]; ?>
                                        <?php echo $enlaces["ultimo"]; ?>
                                    </td>
                                </tr>
                            </table>
                            <br/>
                            <a href="viewInsertar.php">Insertar</a><br/><br/>
                            <a href="phpLogout.php">Cerrar sesión</a>
                            <form action="" method="POST" id="formulario">
                                <input type="hidden" name="id" value="" id="idformulario"/>
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
<?php
$bd->closeConexion();
?>