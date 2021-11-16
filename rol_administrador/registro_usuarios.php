<?php
include 'conect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>registro usuarios</title>
	<link rel="stylesheet" href="../css/style-usua.css">
	<link rel="stylesheet" href="../icons/all.css">
    <script src="../js/script.js"></script>
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
				<table colspan="2">
					<tr>
						<td class="colucnas" colspan="2">..::REGISTRO USUARIOS::..</td>
					</tr>
					<tr>
						<td class="colucnas">TIPO USUARIO</td>
					    <td>
                        <select name="txt3">
							<option value=""></option>
                            <option value="administrador">Administrador</option>
                            <option value="cliente">Cliente</option>
                        </select>
                        </td>
					</tr>
					<tr>
						<td class="colucnas">IDENTIFICACION</td>
						<td><input type="number" name="txt0" required></td>
					</tr>
					<tr>
						<td class="colucnas">NOMBRES USUARIO</td>
						<td><input type="text" name="txt1" required></td>
					</tr>
					<tr>
						<td class="colucnas">TELEFONO</td>
						<td><input type="text" name="txt2" required></td>
					</tr>
					<tr>
						<td class="colucnas">DIRECCION</td>
						<td><input type="text" name="txt4" required></td>
					</tr>
                    <tr>
						<td class="colucnas">USUARIO</td>
						<td><input type="email" name="txt5" required></td>
					</tr>
					<tr>
						<td class="colucnas">CONTRASEÑA</td>
						<td><input type="password" name="txt6" required></td>
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
        $ident = $_POST['txt0'];
		$nomb = $_POST['txt1']; 
		$telef = $_POST['txt2'];
		$tipo_u = $_POST['txt3'];
		$direc = $_POST['txt4'];
        $usua = $_POST['txt5'];
        $cont = $_POST['txt6'];
        

		try { 
			$sql="INSERT INTO usuario(`pk_identificacion`, `nombre`, `telefono`, `tipo_usuario`, `direccion`, `usuario`, `contraseña`) VALUES(:pk_id,:nombr,:tele,:tipou,:direct,:usuar,:contr)";
			$resultado = $base->prepare($sql);
            $resultado->execute(array(":pk_id"=>$ident,":nombr"=>$nomb,":tele"=>$telef,":tipou"=>$tipo_u,":direct"=>$direc,":usuar"=>$usua,":contr"=>$cont));
            ?>
            <script language="javascript">window.alert(' Usuario registrado exitosamente!!')</script>
            <?php
            
        } catch (exception $e) {
            die('se produjo un error de conexion con la base de datos: '.$e->getmessage());
        }
	}
	?>
</html>