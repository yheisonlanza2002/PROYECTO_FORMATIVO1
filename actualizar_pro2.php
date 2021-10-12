<?php 
include 'conect.php';
    try {
        if (isset($_POST['boton'])) {
            $nombre = $_POST['nombre'];
            $nit = $_POST['nit'];
            $sql1 = "UPDATE proveedor SET nit=:nit ,nombre=:nombre WHERE codigo =".$_REQUEST['nuevo'].";";
            $resultado = $base ->prepare($sql1);
            $resultado -> execute(array(":nit"=>$nit,":nombre"=>$nombre));
        }
        ?>
            <script type="text/javascript">window.alert("La informacion del proveedor se actualizo con exito..");window.location="consulta_proveedores.php"</script>
        <?php
    } catch (exception $e) {
        die('se produjo un error de conexion con la base de datos: '.$e->getmessage());
    }
?>