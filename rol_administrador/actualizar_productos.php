<?php
include 'conect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Productos</title>
    <link rel="stylesheet" href="../css/style-actua.css">
</head>
<body>
    <a href="../sesion/perfil_admi.php">regresar</a>
<?php 
        try {
            $sql2="SELECT * FROM productos WHERE codigo_pdto=".$_REQUEST['cod2'].";";
            $resultado = $base->prepare($sql2);
            $resultado->execute(array());
            while ($consulta=$resultado->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <form name="form" action="actualizar_producto2.php?nuevo=<?php echo $_REQUEST['cod2']; ?>" method="POST">
                    <table>
                    <tr>
                        <td colspan="2" class="colucnas"><span>actualizando informacion del producto - <?php echo $consulta['nombre_pro']; ?></span></td>
                    </tr>

                        <tr>
                            <td  class="colucnas">Nombre Producto</td>
                            <td ><input type="text" name="nombre_pro" require value="<?php echo $consulta['nombre_pro']; ?>"></td>
                        </tr>

                        <tr>
                            <td class="colucnas">Descripcion Producto</td>
                            <td><input type="text" name="descri" require value="<?php echo $consulta['descripcion']; ?>"></td>
                        </tr>
                        <tr>
                            <td class="colucnas">Valor</td>
                            <td><input type="text" name="valor" require value="<?php echo $consulta['valor']; ?>"></td>
                        </tr>
                        <tr>
                            <td class="colucnas">Stock</td>
                            <td><input type="number" name="stock" require value="<?php echo $consulta['stock']; ?>"></td>
                        </tr>
                        <tr>
						<td class="colucnas">Categoria</td>
					    <td>
                            <select name="categoria">
                                <option><?php echo $consulta['categoria']; ?></option>
                                <option value="fragancia">FRAGANCIA</option>
                                <option value="maquillaje">MAQUILLAJE</option>
                                <option value="cuidado_personal">CUIDADO PERSONAL</option>
                            </select>
                        </td>
					</tr>
                    <tr>
						<td class="colucnas">Proveedores</td>
                        <td>
						<select name="provee">
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