#!/bin/bash

cp -r /home/gonzalopcubuntu/Escritorio/Actividades /home/gonzalopcubuntu/Escritorio/Backup-"$(date '+%Y-%m-%d %H:%M')"
#Primero espera a que se copien los archivos y luego ejecuta el script que comprime el archivo copiado.
sleep 2s && ./act7.1.sh

