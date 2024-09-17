#!/bin/bash

if [ "$(whoami)" = "root" ]; then
	shutdown -r +1
else
	echo "Que no eres root pringado"
fi

