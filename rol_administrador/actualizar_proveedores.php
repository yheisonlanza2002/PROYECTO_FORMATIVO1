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
    <title>consulta proveedores</title>
    <link rel="stylesheet" href="../css/style-actua.css">
    <link rel="stylesheet" href="../css/style_consultas.css">
    <link rel="stylesheet" href="../icons/all.css">
    <script src="js/script.js"></script>
</head>
<body>
    <?php 
        try {
            $sql2="SELECT * FROM proveedor WHERE codigo=".$_REQUEST['cod1'].";";
            $resultado = $base->prepare($sql2);
            $resultado->execute(array());
            while ($consulta=$resultado->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <form name="form" action="actualizar_pro2.php?nuevo=<?php echo $_REQUEST['cod1']; ?>" method="POST">
                    
                    <table>
                        <tr>
                            <td colspan="2" class="colucnas"><span>actualizando informacion del proveedor - <?php echo $consulta['nombre']; ?></span></td>
                        </tr>
                        <tr>
                            <td class="colucnas">Nombre Proveedor</td>
                            <td><input type="text" name="nombre" require value="<?php echo $consulta['nombre']; ?>"></td>
                        </tr>
                        <tr>
                            <td class="colucnas">Nit Proveedor</td>
                            <td><input type="number" name="nit" require value="<?php echo $consulta['nit']; ?>"></td>
                        </tr>
                        <tr>
                            <td colspan="2"> <input class="boton" type="submit" name="boton" value="Actualizar..." class="boton">  </td>
                        </tr>
                    </table>
                </form>
                <?php
            }
        } catch (exception $e) {
            die('se produjo un error de conexion con la base de datos: '.$e->getmessage());
        }
    ?>
</body>
</html>