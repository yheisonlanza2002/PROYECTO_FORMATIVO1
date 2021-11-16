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
    <link rel="stylesheet" href="../css/hiper.css">
    <link rel="stylesheet" href="../icons/all.css">
</head>
<body>
    
</body>
</html>
<div>
<form method="POST" action="">
    <table >
        
        <tr class="icon">
        <!-- <td colspan="2"><i class="fas fa-user-circle"></i></td> -->
        <tr>
        <td class="titulo" colspan="2">Inicio de Seccion</td>
        </tr>
        </tr>
        <tr>
            <!-- <td>Identificacion</td> -->
           <td colspan="2"><i class="far fa-id-card"></i>   <input  type="text" name="cedu" placeholder="Identificacion"></td>
        </tr>
        <tr>
            <!-- <td>contraseña</td> -->
            <td colspan="2"><i class="fas fa-lock"></i>  <input type="password" name="pass" placeholder="Contraseña"></td>
        </tr>
        <tr>
            <td><a href="../registro_usuarios.php"><i class="fas fa-server"></i>  Registrarme</a></td><td><a href="../index.html"><i class="fas fa-home"></i> Regresar</a></td>
        </tr>
        
        <tr>
            <td colspan="2"><input type="submit" name="enviar" value="Ingresar"></td>
        </tr>
    </table>
</form>
</div>