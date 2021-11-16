<?php
include 'conect.php';
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
	</div>
    <a href="../sesion/perfil_admi.php"><i class="fas fa-reply"></i></a> 
	<?php
}

// try {
// 	$sql="SELECT * FROM usuario";
// 	$resultado = $base->prepare($sql);
// 	$resultado->execute(array());
// 	while ($consulta = $resultado->fetch(PDO::FETCH_ASSOC)) {
// 	}
// } catch (\Throwable $th) {
// 	//throw $th;
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>consulta usuarios</title>
    <link rel="stylesheet" href="../css/style_consultas.css">
    <link rel="stylesheet" href="../icons/all.css">
    <script src="../js/script.js"></script>
</head>
<body>

    <!-- <a href="../sesion/perfil_admi.php"><i class="fas fa-reply"></i></a> -->
<!-- <label onclick="mostrarMenu();"><i class="fas fa-bars"></i></label>
        <nav id="menu-principal">
            <ul class="menu">
                <li><a href="consulta_proveedores.php"><i class="fas fa-search"></i> Consulta Proveedor</a></li>
                <li><a href="consulta_productos.php"><i class="fas fa-search"></i>Consulta Productos</a></li>
                <li><a href="consulta_usuarios.php"><i class="fas fa-search"></i>Consulta Usuarios</a></li>
                <li><a href="registro_usuarios.php"><i class="fas fa-search"></i>Registro Usuarios</a></li>
                <li><a href="consulta_proveedores.php"><i class="fas fa-search"></i>Registro Proveedores</a></li>
                <li><a href="consulta_productos.php"><i class="fas fa-search"></i>Registro Productos</a></li>

            </ul>
        </nav> -->
<table>
        <tr>
            <td colspan="5" class="titulo">Consulta Usuarios</td>
        </tr>
        <tr>
            <td class="colucnas">Nombre usuario</td>
            <td class="colucnas">Telefono</td>
            <td class="colucnas">Tipo Usuario</td> 
            <td class="colucnas">Direccion</td> 
            <td class="colucnas">Correo</td> 
            <!-- <td><img src="../img/actualizar.png" width="30px" alt=""></td> -->

        </tr>
        <tr>
            <?php
            try {
                $sql="SELECT * FROM usuario";
                $resultado = $base->prepare($sql);
                $resultado->execute(array());
                while ($consulta = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <tr>
                        <td class="registro"><?php echo $consulta['nombre'];?></td>
                        <td class="registro"><?php echo $consulta['telefono'];?></td>
                        <td class="registro"><?php echo $consulta['tipo_usuario'];?></td>
                        <td class="registro"><?php echo $consulta['direccion'];?></td>
                        <td class="registro"><?php echo $consulta['usuario'];?></td>
                        <!-- <td><a href="actualizar_usuarios.php?cod1=<?php echo $consulta['pk_identificacion'];?>"><img src="../img/actualizar.png" width="30px" alt=""></a></td> -->
                    </tr>
                    <?php
                    }
                } catch (exception $e) {
                    die('se produjo un error de conexion con la base de datos: '.$e->getmessage());
                }
                ?>
        </tr>
    </table>
</body>
</html>