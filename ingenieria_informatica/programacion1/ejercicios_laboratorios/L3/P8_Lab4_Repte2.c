/*
 ============================================================================
 Name        : P8_Lab4_Repte2.c
 Author      : GonzaloNieto
 Version     :
 Copyright   : Esto es obra de Gonzalo Nieto
 Description : Hello World in C, Ansi-style
 ============================================================================
 */

#include <stdio.h>
#include <stdlib.h>
#include <stdbool.h>
#include <time.h>

/**
 * El procediment inicialitza el generador d'aleatoris amb la data/hora actuals.
 * No te parametres
*/
void ini_llavor (void){
	srand(time(NULL));
}

/**
 * El procediment genera un enter aleatori entre 'min' i 'max'.
 * @param min (Valor (E): enter). El valor minim.
 * @param max (Valor (E): enter). El valor maxim.
 * @return enter, el valor aleatori.
*/
int aleatori_entre (int min, int max){
	return (min + (rand()%(max-min+1)));
}


int main (){

	ini_llavor();
	int edad_ordenador = aleatori_entre (10,50);
	//int edad_ordenador = 50;
	int edad_usuario;
	int max_intentos=5;
	int intentos=0;
	bool fi = false;

	while(fi == false){
		if(intentos < max_intentos){
			printf("Quants anys tinc? endevina l'edat de l'ordinador\n");
			printf("Introduce la edad que crees que tiene el ordenador por teclado: \n");
			setbuf(stdout,NULL);
			scanf ("%d", &edad_usuario);
			if (edad_usuario <= 9 || edad_usuario >= 51) {
				printf("¡Mi edad ronda entre los 10 y 50 anyos \n");
				intentos++;
			}
			else if(edad_usuario==edad_ordenador){
				printf("¡Enhorabuena, has acertado la edad del ordenador! \n");
				printf("¡¡¡Has GANADO!!!");
				fi=true;
			}
			else if (edad_usuario > edad_ordenador) {
				printf("¡No soy tan viejo! Prueba con un numero menor \n");
				intentos++;
			}
			else if (edad_usuario < edad_ordenador) {
				printf("¡No soy tan joven! Prueba con un numero mayor \n");
				intentos++;
			}
		}
		else{
			printf("Has superado el máximo de intentos, HAS PERDIDO!! \n");
			fi=true;
		}
	}
	return 0;
}
