<?php
include 'conect.php';

try {
    if (isset($_POST['boton'])) {
        $nombre = $_POST['nombre_pro'];
        $descrip = $_POST['descri'];
        $valor = $_POST['valor'];
        $stoc = $_POST['stock'];
        $categ = $_POST['categoria'];
        $prove = $_POST['provee'];
        $sql1 = "UPDATE productos SET  nombre_pro=:nombre, descripcion=:descr, valor=:val, stock=:stoc, categoria=:categ, fk_provedor=:provee WHERE codigo_pdto =".$_REQUEST['nuevo'].";";
            $resultado = $base ->prepare($sql1);
            $resultado -> execute(array(":nombre"=>$nombre,":descr"=>$descrip,":val"=>$valor,":stoc"=>$stoc,":categ"=>$categ,":provee"=>$prove));   
        }
        ?>
            <script type="text/javascript">window.alert("La informacion del producto se actualizo con exito..");window.location="consulta_productos.php"</script>
        <?php
    } catch (exception $e) {
    die('se produjo un error de conexion con la base de datos: '.$e->getmessage());
}