<?php
include 'conect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registro Productos</title>
	<!-- <link rel="stylesheet" href="style.css"> -->
	<link rel="stylesheet" href="style.css">
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
		<div>
			<form method="POST" action="">
				<table>
					<tr>
						<td class="colucnas" colspan="2">..::REGISTRO PRODUCTOS::..</td>
					</tr>
					<tr>
						<td class="colucnas">NOMBRES PRODUCTO</td>
						<td><input type="text" name="txt0" required ></td>
					</tr>
					<tr>
						<td class="colucnas">DESCRIPCION</td>
						<td><input type="text" name="txt1" required></td>
					</tr>
					<tr>
						<td class="colucnas">VALOR PRODUCTO</td>
						<td><input type="text" name="txt2" required></td>
					</tr>
					<tr>
						<td class="colucnas">STOCK</td>
						<td><input type="number" name="txt3" required></td>
					</tr>
                    <tr>
						<td class="colucnas">CATEGORIA</td>
					    <td>
                            <select name="txt4">
                                <option value=""></option>
                                <option value="fragancia">FRAGANCIA</option>
                                <option value="maquillaje">MAQUILLAJE</option>
                                <option value="cuidado_personal">CUIDADO PERSONAL</option>
                            </select>
                        </td>
					</tr>
                    <tr>
						<td class="colucnas">PROVEEDORES</td>
                        <td>
						<select name="txt5">
                            <?php 
                                try {
                                    $sql1="SELECT * FROM proveedor";
                                    $resultado1=$base->prepare($sql1);
                                    $resultado1->execute(array());
                                    while ($consulta=$resultado1->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                        <option value="<?php echo $consulta['codigo']; ?>"><?php echo $consulta['nombre']; ?></option>
                                        <?php
                                    }
                                    } catch (exception $err) {
                                        die('error' .$err->getMessage());
                                }
                            ?>
                        </select>
                        </td>
					</tr>
					<tr>
						<td colspan="2"><input type="submit" class="boton" name="btn1" value="REGISTRAR"></td>
					</tr>

				</table>
			</form>
		</div>
	</fieldset>
</body>
	<?php
	if (isset($_POST['btn1'])) {
        $nomb = $_POST['txt0'];
		$desc = $_POST['txt1']; 
		$valor = $_POST['txt2'];
		$stock = $_POST['txt3'];
		$catego = $_POST['txt4'];
        $provee = $_POST['txt5'];
        

		try { 
			$sql="INSERT INTO productos(`codigo_pdto`, `nombre_pro`, `descripcion`, `valor`, `stock`, `categoria`, `fk_provedor`) VALUES('',:nombr,:descr,:val,:stoc,:cate,:fk_pro)";
			$resultado = $base->prepare($sql);
            $resultado->execute(array(":nombr"=>$nomb,":descr"=>$desc,":val"=>$valor,":stoc"=>$stock,":cate"=>$catego,":fk_pro"=>$provee));
            ?>
            <script language="javascript">window.alert(' producto registrado exitosamente!!')</script>
            <?php
            
        } catch (exception $e) {
            die('se produjo un error de conexion con la base de datos: '.$e->getmessage());
        }
	}
	?>
</html>