#!/bin/bash

valor=$1
if [ -d "$valor" ];
then
	echo "El parametro $valor es un directorio quieres borrarlo? 'si' - 'no' :"
	read decision
	if [ "$decision" = "si" ];
	then
		echo "Pues lo borro"
		rm -r "$valor"
	elif  [ "$decision" = "no"  ];
	then
		echo "No borro el directorio tranquilo" 	
	else
		echo "Tienes que introducir 'si' o 'no'"
	fi	
elif  [ -f "$valor" ];
then 
	echo "El parametro $valor es un archivo quieres borrarlo? 'si' - 'no' :"
	read decision
	if [ "$decision" = "si" ];
	then
		echo "Pues lo borro"
		rm -r "$valor"
	elif  [ "$decision" = "no"  ];
	then
		echo "No borro el archivo tranquilo" 	
	else
		echo "Tienes que introducir 'si' o 'no'"
	fi	
else
	echo "tienes que introducir el nombre de un directorio o fichero para borrar"
fi



