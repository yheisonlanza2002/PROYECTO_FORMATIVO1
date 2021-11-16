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
            <?php echo "Administrador :"?> <?php echo "$nombre" ?> <img width="15px" src="../img/linea.png" alt="">  
            <!-- <a id="cerrar" href="cerrar.php"> cerrar seccion</a> -->
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
    <!-- <a href=""></a> -->
<label onclick="mostrarMenu();"><i class="fas fa-bars"></i></label>
        <nav id="menu-principal">
            <ul class="menu">
                <!-- <li><a href="consulta_productos.php"><i class="fas fa-search"></i>Consulta Productos</a></li> -->
                <li><a href="../rol_administrador/consulta_usuarios.php"><i class="fas fa-user-edit"></i>Actualizar Mi Informacion</a></li>
                <li><a href="../rol_administrador/consulta_clientes.php"><i class="fas fa-users"></i>Consulta Clientes</a></li>
                <li><a href="../rol_administrador/consulta_proveedores.php"><i class="fas fa-briefcase"></i> Consulta Proveedor</a></li>
                <li><a href="../rol_administrador/consulta_productos1.php"><i class="fas fa-search"></i> Consulta Productos</a></li>
                <li><a href="../rol_administrador/registro_productos.php"><i class="fas fa-apple-alt"></i>Registrar Productos</a></li>
                <li><a href="../rol_administrador/registro_proveedores.php"><i class="fas fa-address-card"></i>Registrar Proveedores</a></li>
                <li><a href="../rol_administrador/consulta_productos.php"><i class="fas fa-redo-alt"></i>Actualizar Productos</a></li>
                <li><a href="../rol_administrador/consulta_proveedores1.php"><i class="fas fa-users-cog"></i>Actualizar Proveedores</a></li>
                <!-- <li><a href="registro_productos.php"><i class="fas fa-search"></i>Registro Productos</a></li> -->
                <li><a href="cerrar.php"><i class="fas fa-sign-out-alt"></i> cerrar seccion</a></li>
            </ul>
        </nav>