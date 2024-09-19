/*
 ============================================================================
 Name        : P13_Lab5_Calculadora.c
 Author      : GonzaloNieto
 Version     :
 Copyright   : Esto es obra de Gonzalo Nieto
 Description : Lab de la calculadora
 ============================================================================
 */

#include <stdio.h>
#include <stdlib.h>
#include <stdbool.h>

int factorial(int num){
	int b, factorial = 1;
	  for (b = num; b > 1; b--){
	    factorial = factorial * b;
	}
	 return factorial;
}

int variacions_sense_repeticio(int m , int n){
	if(m < n) return 0;
	return (factorial(m) / factorial(m-n));
}

void menu(){
	printf("¡Bienvenidos a la calculadora!\n");
	printf("Elige una de las siguientes opciones:\n");
	printf("1 - Calcular factorial\n");
	printf("2 - Calcular variaciones (sin repeticiones)\n");
	printf("3 - Salir del programa\n");
}

int main(){
	bool seguir = true;
	int opcion , num1 , num2;

	while(seguir){
		menu();
		scanf("%d", &opcion);
		if(opcion==1){
			printf("Introduce un numero para calcular el factorial:");
			scanf("%d",&num1);
			printf("El factorial del numero %d es: %d \n", num1 , factorial(num1));
		}
		else if(opcion==2){
			printf("Introduce un numero para calcular el factorial:\n");
			printf("Introduce un numero que es 'm':\n");
			scanf("%d",&num1);
			printf("Introduce un numero que es 'n':\n");
			scanf("%d",&num2);
			printf("Resultado: %d \n" ,variacions_sense_repeticio(num1,num2));
		}
		else if(opcion==3){
			printf("Hasta la proxima");
			seguir=false;
		}
		else{
			printf("¡Elige una opción correcta!\n");
			seguir=true;
		}
	}
	return 0;
}
