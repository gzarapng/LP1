<?php
    date_default_timezone_set("America/Sao_Paulo");
    header('Content-Type: text/html; charset=utf-8');
    $servidor="localhost";
    $usuario="id5717724_root";
    $senhabd="vuNoGameNoLife*";
    $banco="id5717724_velvetunderground";
    $mysqli  = new mysqli($servidor, $usuario, $senhabd, $banco) ;
	if ( mysqli_connect_errno() ) {
	    trigger_error( mysqli_connect_error() ) ;
    }
?>