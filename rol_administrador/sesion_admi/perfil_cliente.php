<?php
    include '../conect.php';
    session_start();
    if (isset($_SESSION['nombre'])) {
        $nombre=$_SESSION['nombre'];

    }else{
        $nombre="";
    }
    if ($nombre=="") {
        echo "<script>window.location='../index.html'</script>";
    }else{
        ?>
        <div class="nombre">
            <?php echo "Cliente : $nombre"; ?>
            <a id="cerrar" href="cerrar.php">cerrar seccion</a>
        </div>
        <?php
    }

    try {
        $sql="SELECT * FROM usuario WHERE pk_identificacion=id || nombre=nombre";
        $resultado = $base->prepare($sql);
        $resultado->execute(array());
        while ($consulta = $resultado->fetch(PDO::FETCH_ASSOC)) {
          ?>
          <!-- <label onclick="mostrarMenu();"><i class="fas fa-bars"></i></label>
        <nav id="menu-principal">
            <ul class="menu">
                <li><a href="consulta_proveedores.php"><i class="fas fa-search"></i> Consulta Proveedor</a></li>
                <li><a href="consulta_productos.php"><i class="fas fa-search"></i>Consulta Productos</a></li>
                <li><a href="consulta_usuarios.php"><i class="fas fa-search"></i>Consulta Usuarios</a></li>
                <li><a href="registro_usuarios.php"><i class="fas fa-search"></i>Registro Usuarios</a></li>
                <li><a href="registro_proveedores.php"><i class="fas fa-search"></i>Registro Proveedores</a></li>
                <li><a href="registro_productos.php"><i class="fas fa-search"></i>Registro Productos</a></li>
            </ul>
        </nav> -->
          <?php
        }
    } catch (\Throwable $th) {
        //throw $th;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cerrar</title>
    <link rel="stylesheet" href="../css/style_consultas.css">
    <link rel="stylesheet" href="../icons/all.css">
    <script src="../js/script.js"></script>
</head>
<body>
<label onclick="mostrarMenu();"><i class="fas fa-bars"></i></label>
        <nav id="menu-principal">
            <ul class="menu">
                <!-- <li><a href="../consulta_proveedores.php"><i class="fas fa-search"></i> Consulta Proveedor</a></li> -->
                <!-- <li><a href="consulta_productos.php"><i class="fas fa-search"></i>Consulta Productos</a></li> -->
                <li><a href="../consulta_usuarios.php"><i class="fas fa-search"></i>Actualizar Mi Informacion</a></li>
                <!-- <li><a href="registro_usuarios.php"><i class="fas fa-search"></i>Registro Usuarios</a></li> -->
                <li><a href="../consulta_productos.php"><i class="fas fa-search"></i>Comprar Productos</a></li>
                <!-- <li><a href="registro_productos.php"><i class="fas fa-search"></i>Registro Productos</a></li> -->
                <!-- <li><a href="cerrar.php">cerrar seccion</a></li> -->
            </ul>
        </nav>

            
    
</body>
</html>