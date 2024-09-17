#!/bin/bash
RecorrerDirectori(){
	var=$(ls $1)
	cd $1
	echo "Listando directorios:" $1 >> /home/gonzalo/Escritorio/Bash/resultado.txt
	for i in $var
	do 
		echo $i >> /home/gonzalo/Escritorio/Bash/resultado.txt	
		if [[ -d $i ]];
		then 
			
			RecorrerDirectori $i
		fi
	done	
}
RecorrerDirectori $1
echo "En que ruta quieres que te guarde el comprimido (introduce ruta absoluta):"
read decision
if [ -e "$decision" ];
then
    	echo "El parametro  $decision existe"
    	tar -cvf resultados.tar /home/gonzalo/Escritorio/Actividades/resultado.txt $decision
else
    	echo "El parametro $decision no existe"
fi



