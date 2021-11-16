<?php
include 'conect.php';
try {
    if (isset($_POST['boton'])) {
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $tipo = $_POST['tipo'];
        $direccion = $_POST['direccion'];
        $email = $_POST['email'];
        $contra = $_POST['contra'];
        $sql = "UPDATE usuario SET nombre=:nombre , telefono=:telef , tipo_usuario=:tip , direccion=:direc , usuario=:usu , contraseña=:contr WHERE pk_identificacion =".$_REQUEST['upusu'].";";
        $resultado = $base-> prepare($sql);
        $resultado -> execute(array(":nombre"=>$nombre ,":telef"=>$telefono ,":tip"=>$tipo ,":direc"=>$direccion ,":usu"=>$email ,":contr"=>$contra));
    }
    ?>
        <script type="text/javascript">window.alert("La informacion del usuario se actualizo con exito..");window.location="consulta_usuarios.php"</script>
    <?php
} catch (exception $e) {
    die('se produjo un error de conexion con la base de datos: '.$e->getmessage());
}
