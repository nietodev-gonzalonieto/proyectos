#!/bin/bash

valor=$1
if [ -d "$valor" ];
then
        echo "El parametro  $valor es un directorio"
	cd $valor/
	for i in *;
	do
		echo "Archivo -> $i"		
		file -0 $i
	done
else
        echo "El parametro $valor no es un directorio"
fi

