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
		<?php echo "Cliente :"?> <?php echo "$nombre" ?> <img width="15px" src="img/linea.png" alt="">
	</div>
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
    <title>Actualizar Usuarios</title>
    <link rel="stylesheet" href="../css/style-actua.css">
</head>
<body>
<?php 
        try {
            $sql2="SELECT * FROM usuario WHERE pk_identificacion=".$_REQUEST['cod1'].";";
            $resultado = $base->prepare($sql2);
            $resultado->execute(array());
            while ($consulta=$resultado->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <form name="form" action="actualizar_usu2.php?upusu=<?php echo $_REQUEST['cod1']; ?>" method="POST">
                    <table>
                        <tr>
                        <td colspan="2" class="colucnas"><span>actualizando informacion del usuario - <?php echo $consulta['nombre']; ?></span></td>
                        </tr>

                        <tr>
                            <td class="colucnas">Nombre Usuario</td>
                            <td><input type="text" name="nombre" require value="<?php echo $consulta['nombre']; ?>"></td>
                        </tr>

                        <tr>
                            <td class="colucnas">Telefono</td>
                            <td><input type="text" name="telefono" require value="<?php echo $consulta['telefono']; ?>"></td>
                        </tr>
                        <tr>
						<td class="colucnas">Tipo Usuario</td>
					    <td>
                            <select name="tipo">
                                <!-- <option value=""></option> -->
                                <option value="administrador">ADMINISTRADOR</option>
                                <!-- <option value="cliente">CLIENTE</option> -->
                            </select>
                        </td>
					</tr>
                    <tr>
                        <td class="colucnas">Direccion</td>
                        <td><input type="text" name="direccion" require value="<?php echo $consulta['direccion']; ?>"></td>
                    </tr>
                    <tr>
                        <td class="colucnas">Email</td>
                        <td><input type="text" name="email" require value="<?php echo $consulta['usuario']; ?>"></td>
                    </tr>
                    <tr>
                        <td class="colucnas">Contraseña</td>
                        <td><input type="text" name="contra" require value="<?php echo $consulta['contraseña']; ?>"></td>
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