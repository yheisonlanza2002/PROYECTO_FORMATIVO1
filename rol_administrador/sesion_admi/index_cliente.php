<?php
    include '../conect.php';
    session_start();
    if (isset($_POST['enviar'])) {
        if (empty($_POST['cedu']) || empty($_POST['pass'])) {
            ?>
                <script leguage="javascript">window.alert('campos de obligatorios')</script>
            <?php
        }else{
            $sql="SELECT * FROM usuario WHERE pk_identificacion=:cedula AND contraseña=:passwordd";
            $resultado=$base->prepare($sql);
            $resultado->execute(array("cedula"=>$_POST['cedu'],"passwordd"=>$_POST['pass']));
            while ($consulta=$resultado->fetch(PDO::FETCH_ASSOC) ) {
                $_SESSION['nombre']=$consulta['nombre'];
                $_SESSION['id']=$consulta['pk_identificacion'];
                $_SESSION['tipo']=$consulta['tipo_usuario'];
            }
            $verificar = $resultado -> rowCount();
            if ($verificar > 0 and $_SESSION['tipo']=="cliente") {
                header("location:perfil_cliente.php");
            }else{
                ?>
                <script leguage="javascript">window.alert("datos erroneos :(")</script>
                <?php
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inicio Seccion</title>
</head>
<body>
    
</body>
</html>
<form method="POST" action="">
    <table>
        <tr>
            <td colspan="2">Inicio de Seccion</td>
        </tr>
        <tr>
            <td>Identificacion</td>
            <td><input type="text" name="cedu"></td>
        </tr>
        <tr>
            <td>contraseña</td>
            <td><input type="password" name="pass"></td>
        </tr>
        <tr>
            <td><a href="../registro_usuarios.php">Registrarme</a></td>
        </tr>
        
        <tr>
            <td><input type="submit" name="enviar" value="Ingresar"></td>
        </tr>
    </table>
</form>