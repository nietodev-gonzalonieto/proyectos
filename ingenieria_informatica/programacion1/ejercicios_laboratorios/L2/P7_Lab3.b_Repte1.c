/*
 ============================================================================
 Name        : b_Repte1.c
 Author      : GonzaloNieto
 Version     :
 Copyright   : Esto es obra de Gonzalo Nieto
 Description : Lab3.b Act1
 ============================================================================
 */

#include <stdio.h>
#include <stdlib.h>
#include <math.h>

int main(void) {
	int a,b,c;
	float discriminante;

	printf("Una ecuacion de segundo grado tiene la forma: ax^2+ + bx + c = 0 \n");
	printf("Introduce los valores de a, b i c \n");
	printf("Introduce el valor de:  a \n");
	setbuf(stdout,NULL);
	scanf ("%d", &a);
	if (a > 0) {
		printf("Introduce el valor de:  b \n");
		scanf ("%d", &b);
		printf("Introduce el valor de:  c \n");
		scanf ("%d", &c);

		discriminante=b*b-(4*a*c);
		if (discriminante==0) {
			printf("Solucion unica es: %d \n", -b/(2*a));
		}
		else if (discriminante>0) {
			printf("Solucion 1 es: %.2f \n", (-b+sqrt(discriminante))/(2*a));
			printf("Solucion 2 es: %.2f \n", (-b-sqrt(discriminante))/(2*a));
		}
		else {
			printf("No existen soluciones.");
		}
	}
	else {
		printf("No es una ecuacion de segundo grado.");
	}
}
