/*
 ============================================================================
 Name        : P6_Lab3_Repte3.c
 Author      : GonzaloNieto
 Version     :
 Copyright   : Esto es obra de Gonzalo Nieto
 Description : Lab3 Repte3
 ============================================================================
 */

#include <stdio.h>
#include <stdlib.h>

int main(void) {
	int personas;
	int noches;
	float precio_noche= 150;
	float iva;
	float precio_total;

	printf("¿Cuantas personas os vais a alojar?\n");
	setbuf(stdout,NULL);
	scanf ("%d", &personas);
	if (personas<=12 && personas>0) {
		printf("¿Cuantas noches os vais a alojar?\n");
		scanf ("%d", &noches);
		if(noches<=12 && noches>0){
			precio_noche= 150*noches;
			iva =precio_noche*0.21;
			precio_total= precio_noche+iva;
			printf("El precio sin IVA es de: %.2f\n", precio_noche);
			printf("IVA es: %.2f\n", iva);
			printf("El precio total es de: %.2f\n", precio_total);
		}
		else{
				printf("El número mínimo de noches es 1 y el máximo de noches es de 12\n");
				printf("Error, vuelva a intentarlo");
			}
	}
	else {
		printf("El número mínimo de huespedes es 1 y el máximo de huespedes es de 12\n");
		printf("Error, vuelva a intentarlo");
	}
}
