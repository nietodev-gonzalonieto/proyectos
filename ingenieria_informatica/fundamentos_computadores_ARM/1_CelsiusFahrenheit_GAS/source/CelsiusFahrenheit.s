@;----------------------------------------------------------------
@;  CelsiusFahrenheit.s: rutines de conversió de temperatura en 
@;						 format Q15 (Coma Fixa 1:16:15). 
@;----------------------------------------------------------------
@;	santiago.romani@urv.cat
@;	pere.millan@urv.cat
@;	(Març 2021, Març 2022, Març 2023)
@;----------------------------------------------------------------

.include "Q15.i"

.data
		.align 2
		cf32: .word 0x00100000		@; 32 en hexadecimal q15
		cf59: .word 0x0000471D		@; 5/9 en hexadecimal q15
		cf95: .word 0x0000E666		@; 9/5 en hexadecimal q15

.text
		.align 2
		.arm


@; Celsius2Fahrenheit(): converteix una temperatura en graus Celsius a la
@;						temperatura equivalent en graus Fahrenheit, utilitzant
@;						valors codificats en Coma Fixa 1:16:15.
@;	Entrada:
@;		input 	-> R0
@;	Sortida:
@;		R0 		-> output = (input * 9/5) + 32.0;

	.global Celsius2Fahrenheit
Celsius2Fahrenheit:

		push {r1-r6, lr}
		
		ldr r1, =cf95 			@; carga la direccio de "cf95"
		ldr r2, =cf32 			@; carga la direccio de "cf32"
		ldr r3, [r1]			@; guarda el valor de "cf95" en r3
		ldr r4, [r2]			@; guarda el valor de "cf32" en r4
		
		smull r1, r2, r0, r3	@; multiplica l'input per 9/5, r1=part baixa i r2=part alta
		mov r5, #15				@; definim el registre r5 amb el valor 15	
		rsb r6, r5, #32			@; resta 15 a 32 i ho guarda en r6
		mov r1, r1, lsr r5		@; desplaça a la dreta 15 posicions el r1
		orr r1, r2, lsl r6 		@; afegeix a la esquerra el r2 a r1
		
		add r0, r1, r4			@; suma 32 a r1 i ho guarda en r0

		pop {r1-r6, pc}



@; Fahrenheit2Celsius(): converteix una temperatura en graus Fahrenheit a la
@;						temperatura equivalent en graus Celsius, utilitzant
@;						valors codificats en Coma Fixa 1:16:15.
@;	Entrada:
@;		input 	-> R0
@;	Sortida:
@;		R0 		-> output = (input - 32.0) * 5/9;

	.global Fahrenheit2Celsius
Fahrenheit2Celsius:

		push {r1-r6, lr}
		
		ldr r1, =cf32 			@; carga la direccio de "cf32"
		ldr r2, =cf59 			@; carga la direccio de "cf59"
		ldr r3, [r1]  			@; guarda el valor de "cf32" en r3
		ldr r4, [r2]  			@; guarda el valor de "cf59" en r4
		
		sub r0, r3	  			@; resta 32 a r0 (r0=input)
		
		smull r1, r2, r0, r4  	@; multiplica l'input per 5/9, r1=part baixa i r2=part alta		
		mov r5, #15			  	@; Definim el registre r5 amb el valor 15
		rsb r6, r5, #32		  	@; Resta 15(r5) a 32 y lo guarda en r6
		mov r1, r1, lsr r5	  	@; Desplazar a la derecha la parte baja (r1)
		orr r0, r1, r2, lsl r6	@; Añadir a la izquierda la parte alta (r2) y guardalo en r0

		pop {r1-r6, pc}

