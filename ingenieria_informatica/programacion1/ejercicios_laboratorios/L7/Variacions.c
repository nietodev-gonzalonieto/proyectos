#include <stdio.h>
#include <stdlib.h>

int factorial(int num){
	int b, factorial = 1;
	  for (b = num; b > 1; b--){
	    factorial = factorial * b;
	}
	 return factorial;
}

int variacions_sense_repeticio(int m, int n){
	if(m < n) return 0;
	return (factorial(m) / factorial(m-n));
}

int main() {
	int num1,num2;
	printf("Introduce un numero para calcular el factorial:\n");
	printf("Introduce un numero que es 'm':\n");
	scanf("%d",&num1);
	printf("Introduce un numero que es 'n':\n");
	scanf("%d",&num2);
	printf("Resultado: %d \n" ,variacions_sense_repeticio(num1,num2));
}
