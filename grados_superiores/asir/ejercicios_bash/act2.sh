#!/bin/bash

valor=$1
echo "Has introducido el parametro: $1"

if [ -e "$valor" ];
then
        echo "El parametro  $valor existe y su tamaño en bytes es de"
	stat -c %s "$valor"
else
        echo "El parametro $valor no existe"
fi


