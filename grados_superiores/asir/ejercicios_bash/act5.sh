#!/bin/bash

if [ $(whoami) == "gonzalo" ]; then
	echo "Hola $USER"
else
	echo "No eres gonzalo , eres $USER . No te esperaba"
fi

