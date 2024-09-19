/*
 ============================================================================
 Name        : P12_Lab7_Repte1.c
 Author      : GonzaloNieto
 Version     :
 Copyright   : Esto es obra de Gonzalo Nieto
 Description : Lab7 Repte1
 ============================================================================
 */

#include <stdio.h>
#include <stdlib.h>
#include <stdbool.h>

char vocales[] = {'a', 'e', 'i', 'o', 'u'};
int longitud = 100;

bool esVocal(char letra){
	for (int i=0; i<5; i++){
		if (vocales[i] == letra)
			return true;
	}
	return false;
}

int main(){
	char cadena_frase[longitud];

	printf("Introdueix una frase acabada en punt: \n");
	fgets(cadena_frase, longitud, stdin);

	for (int i=0; i<5; i++){
		for (int j=0; j<longitud; j++){
			if(esVocal(cadena_frase[j])==true){
				printf("%c",vocales[i]);
			}
			else if (esVocal(cadena_frase[j])==false) {
				printf("%c",cadena_frase[j]);
			}
		}
		printf("\n");
		printf("%s",cadena_frase);
	}
}
