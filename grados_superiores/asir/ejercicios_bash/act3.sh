#!/bin/bash

valor=$1
echo "Has introducido el parametro: $1"

if [ -z $1 ];
then	
	echo "Pasa como argumento un archivo o directorio."
else
	if [ -e "$valor" ];
	then
		echo "El parametro  $valor existe"
	else
		echo "El parametro $valor no existe"
	fi

	if [ -d "$valor" ];
	then
		echo "El parametro $valor es un directorio"
	else
		echo "El parametro $valor no es un directorio"
	fi

	if [ -f "$valor" ];
	then
		echo "El parametro $valor es un fichero"
	else
		echo "El parametro $valor no es un fichero"
	fi
fi
