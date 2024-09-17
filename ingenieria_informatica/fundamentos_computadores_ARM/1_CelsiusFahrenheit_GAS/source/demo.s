@;-----------------------------------------------------------------------
@;  Description: a program to check the temperature-scale conversion
@;				functions implemented in "CelsiusFahrenheit.c".
@;	IMPORTANT NOTE: there is a much confident testing set implemented in
@;				"tests/test_CelsiusFahrenheit.c"; the aim of "demo.s" is
@;				to show how would it be a usual main() code invoking the
@;				mentioned functions.
@;-----------------------------------------------------------------------
@;	Author: Santiago Romani (DEIM, URV)
@;	Date:   March/2022, March/2023 
@;-----------------------------------------------------------------------

.data
		.align 2
	temp1C:	.word 0x00119AE1		@; temp1C = 35.21 ºC
	temp2F:	.word 0xFFF42000		@; temp2F = -23.75 ºF

.bss
		.align 2
	temp1F:	.space 4				@; expected conversion:  95.377532958984375 ºF
	temp2C:	.space 4				@; expected conversion: -30.971466064453125 ºC 


.text
		.align 2
		.arm
		.global main
main:
		push {lr}
		
			@; temp1F = Celsius2Fahrenheit(temp1C);
			ldr r1, =temp1C			@; carga la dirección de temp1C en r1
			ldr r0, [r1]			@; guarda el valor de temp2F en r0
			bl Celsius2Fahrenheit	@; llama a la rutina, r0 input, devuelve r0
			
			@; Vuelve de la rutina, guarda el resultado;
			ldr r2, =temp1F			@; adjudicamos a r2 la dirección de la variable temp1F
			str r0, [r2]			@; se guarda el resultado (que se encuentra en r0), en temp1F (r2)
		
@; -------------------------------------------------------------------------------------------------------------------------------;
	
			@; temp2C = Fahrenheit2Celsius(temp2F);
			ldr r3, =temp2F	 		@; carga la dirección de temp2F en r3
			ldr r0, [r3]	 		@; guarda el valor de temp2F en r0
			bl Fahrenheit2Celsius	@; llama a la rutina, r0 input, devuelve r0
			
			@; Vuelve de la rutina, guarda el resultado;
			ldr r4, =temp2C	 		@; adjudicamos a r4 la dirección de la variable temp2C
			str r0, [r4]	 		@; se guarda el resultado (que se encuentra en r0), en temp2C (r4)



@; TESTING POINT: check the results
@;	(gdb) p /x temp1F		-> 0x002FB053 
@;	(gdb) p /x temp2C		-> 0xFFF083A7 
@; BREAKPOINT
		mov r0, #0					@; return(0)
		
		pop {pc}

.end

