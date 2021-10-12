<?php
include 'conect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>consulta productos</title>
    <link rel="stylesheet" href="style_consultas.css">
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
                <li><a href="consulta_proveedores.php"><i class="fas fa-search"></i>Registro Proveedores</a></li>
                <li><a href="consulta_productos.php"><i class="fas fa-search"></i>Registro Productos</a></li>
            </ul>
        </nav>
<table>
        <tr>
            <td colspan="7" class="titulo">Consulta Productos</td>
        </tr>
        <tr>
            <td class="colucnas">Nombre proveedor</td>
            <td class="colucnas">Nombre Producto</td>
            <td class="colucnas">nit</td>
            <td class="colucnas">Descripcion</td>
            <td class="colucnas">Valor</td> 
            <td class="colucnas">Stock</td> 
            <td class="colucnas">Categoria</td>
            <td><img src="img/actualizar.png" width="30px" alt=""></td>
        </tr>
        <tr>
            <?php
            try {
                $sql="SELECT * FROM productos INNER JOIN proveedor ON fk_provedor = codigo";
                $resultado = $base->prepare($sql);
                $resultado->execute(array());
                while ($consulta = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <tr>
                        <td class="registro"><?php echo $consulta['nombre'];?></td>
                        <td class="registro"><?php echo $consulta['nombre_pro'];?></td>
                        <td class="registro"><?php echo $consulta['nit'];?></td>
                        <td class="registro"><?php echo $consulta['descripcion'];?></td>
                        <td class="registro"><?php echo $consulta['valor'];?></td>
                        <td class="registro"><?php echo $consulta['stock'];?></td>
                        <td class="registro"><?php echo $consulta['categoria'];?></td>
                        <td><a href="actualizar_productos.php?cod2=<?php echo $consulta['codigo_pdto'];?>"><img src="img/actualizar.png" width="30px" alt=""></a></td>
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