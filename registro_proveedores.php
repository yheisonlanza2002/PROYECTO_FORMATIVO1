<?php
include 'conect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title> Registro Proveedor</title>
	<link rel="stylesheet" href="style-provee.css">
	<link rel="stylesheet" href="icons/all.css">
    <script src="js/script.js"></script>
</head>
<body>
<label onclick="mostrarMenu();"><i class="fas fa-bars"></i></label>
        <nav id="menu-principal">
            <ul class="menu">
                <li><a href="consulta_proveedores.php"><i class="fas fa-search"></i> Consulta Proveedor</a></li>
                <li><a href="consulta_productos.php"><i class="fas fa-search"></i>Consulta Productos</a></li>
                <li><a href="consulta_usuarios.php"><i class="fas fa-search"></i>Consulta Usuarios</a></li>
                <li><a href="registro_usuarios.php"><i class="fas fa-search"></i>Registro Usuarios</a></li>
                <li><a href="registro_proveedores.php"><i class="fas fa-search"></i>Registro Proveedores</a></li>
                <li><a href="registro_productos.php"><i class="fas fa-search"></i>Registro Productos</a></li>
            </ul>
        </nav>
	<fieldset>	
			<form method="POST" action="" name="frm1">
				<table colspan="2">
					<tr>
						<td class="colucnas" colspan="2"> REGISTRO PROVEEDOR</td>
					</tr>
					<tr>
						<td class="colucnas"> Nombre Proveedor</td>
						<td><input type="text" name="txt1" required></td>
					</tr>
					<tr>
						<td class="colucnas">Nit Proveedor</td>
						<td><input type="text" name="txt2" required></td>
					</tr>
					<tr>
						<td colspan="2"><input type="submit" class="boton" name="btn1" value="REGISTRAR"></td>
					</tr>

				</table>
			</form>
		
	</fieldset>
</body>
	<?php
	if (isset($_POST['btn1'])) {
		$nomb = $_POST['txt2']; 
		$nitd = $_POST['txt1'];

		try { 
			$sql="INSERT INTO proveedor(`codigo`, `nit`, `nombre`) VALUES('',:nom,:nit)";
			$resultado = $base->prepare($sql);
            $resultado->execute(array(":nom"=>$nomb,":nit"=>$nitd));
            ?>
            <script language="javascript">window.alert('Proveedor registrado exitosamente!!')</script>
            <?php
            
        } catch (exception $e) {
            die('se produjo un error de conexion con la base de datos: '.$e->getmessage());
        }
	}
	?>
</html>