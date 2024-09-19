#include <stdio.h>
#include <stdlib.h>

int factorial(int num){
	int b, factorial = 1;
	  for (b = num; b > 1; b--){
	    factorial = factorial * b;
	}
	 return factorial;
}

int main() {
	int num1;
	printf("Introduce un numero para calcular el factorial:");
	scanf("%d",&num1);
	printf("El factorial del numero %d es: %d \n", num1 , factorial(num1));
}

