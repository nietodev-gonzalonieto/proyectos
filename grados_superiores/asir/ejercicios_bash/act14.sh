#!/bin/bash
Error(){
	echo "Error 27 , el archivo no esta comprimido."
}
if test $# -lt 1
then 
	Error
elif test -f $1
then
	if [[ "$1" == *".zip" ]];
	then 
		unzip $1
	elif [[ "$1" == *".bz2" ]];
	then 
		bzip2 -d $1
	elif [[ "$1" == *".tar.gz" ||  "$1" == *".tgz" ]];
	then 
		tar -xvf $1
	fi
	echo "$1 descomprimido"
elif test -d $1
then 
	cd $1
else 
	echo "No esta comprimido"
fi

