#!/bin/bash

if [ -n "$1" ]; then
	echo 'Esta es la transformacion en mayusculas del contenido del fichero: '
	sudo tr "a-z" "A-Z" < $1
else
	echo 'Tienes que introducir un fichero valido...'
fi


