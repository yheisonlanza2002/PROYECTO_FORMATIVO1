<?php
	try {
	$base = new PDO('mysql:host=localhost; dbname=proyecto_formativo','root','');
		// echo "CONEXION EXITOSA .. FELICITACIONES:)";
	} catch (exception $e) {
    die('se produjo un error de conexion con la base de datos: '.$e->getmessage());
	}
?>