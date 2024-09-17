#!/bin/bash

if [ -n "$1" ] && [ -n "$2" ]; then
	echo 'En el directorio '$1 ', hemos encontrado archivos con extension: ' $2 ' hay un total de: '
	find $1 -type f -name '*.'$2 | wc -l
	find $1 -type f -name '*.'$2
else
	echo 'Introduce un directorio como primer parametro y un tipo de archivo como segundo'
fi



