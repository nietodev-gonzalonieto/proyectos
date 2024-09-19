<?php

include "credenciales.php";

$mysqli = new mysqli('127.0.0.1',$usr,$pwd,'pagaments');

if($mysqli->connect_errno) {
    echo "Ha ocurrido un error: ";
    echo $mysqli->connect_errno;
    echo $mysqli->connect_error;
}