@;----------------------------------------------------------------

.include "avgmaxmintemp.i"

.data
		.align 2
	div12: .word 0x00000AAB
	
.bss
		.align 2	
	max: 	.space 4
	min: 	.space 4
	mod:	.space 4
	avg:	.space 4
	idmax: 	.space 2
	idmin: 	.space 2
	
.text
		.align 2
		.arm
		
@;----------------------------------------------------------------
@;	Input: r0->ttemp[][12], r1->nrows, r2->id_city, r3->t_maxmin
@;	Output: avg->r0
@;----------------------------------------------------------------
		.global avgmaxmin_city
avgmaxmin_city:

		push {r4-r10, lr}
			
			mov r8, #12
			mul r4, r2, r8				@; r4 = id_city*12
			ldr r5, [r0, r4, lsl #2] 	@; r5 = avg = ttemp[id_city][0]
			
			ldr r6, =max
			str r5, [r6] 				@; max = avg
			ldr r6, =min
			str r5, [r6]				@; min = avg
			
			mov r8, #0
			ldr r6, =idmax		@; inicializar idmax con 0
			strh r8, [r6]
			ldr r6, =idmin		@; inicializar idmin con 0
			strh r8, [r6]
			
			mov r8, #1   	@; r8 es la variable local 'i'
			
		.Lfor:
			add r9, r4, r8 				@; r9 = id_city*12 (r4) + i (r8)
			ldr r10, [r0, r9, lsl #2] 	@; tvar = ttemp[id_city][i]
			add r5, r10					@; avg += tvar
			
			ldr r6, =max
			ldr r7, [r6]			@; r7 = max
			cmp r10, r7 			@; comprobar condición
			bgt .Lif1 				@; saltar si tvar > max
			
			ldr r6, =min
			ldr r7, [r6]			@; r7 = min
			cmp r10, r7 			@; comprobar condición
			blt .Lif2 				@; saltar si tvar < min
			b .Lcontinue
			
		.Lif1:
			str r10, [r6] 			@; max = tvar
			ldr r6, =idmax
			strh r8, [r6]			@; idmax = i
			b .Lcontinue
		
		.Lif2:
			str r10, [r6] 			@; min = tvar
			ldr r6, =idmin
			strh r8, [r6]			@; idmin = i
			b .Lcontinue

		.Lcontinue:
			add r8, #1 			@; incrementa índice 'i'
			cmp r8, #12 		@; compara índice 'i' con el valor 12
			blt .Lfor 			@; salto al inicio del bucle si i < 12
			
		.Lendfor:	
			ldr r6, =min
			ldr r0, [r6]				@; r0 guarda el valor de min	
			str r0, [r3, #MM_TMINC]		@; guarda min en celsius en la posición 0 de la tabla maxmin
			bl Celsius2Fahrenheit		@; pasa el valor de min por el cambio de grado
			str r0, [r3, #MM_TMINF]		@; guarda min en fahrenheit en la posición 8 de la tabla maxmin
			
			ldr r6, =max
			ldr r0, [r6]				@; r0 guarda el valor de max
			str r0, [r3, #MM_TMAXC] 	@; guarda max en celsius en la posición 4 de la tabla maxmin
			bl Celsius2Fahrenheit		@; pasa el valor de max por el cambio de grado
			str r0, [r3, #MM_TMAXF] 	@; guarda max en fahrenheit en la posición 12 de la tabla maxmin
			
			ldr r6, =idmin
			ldr r0, [r6]				@; r0 guarda el valor de idmin
			strh r0, [r3, #MM_IDMIN] 	@; guarda idmin en la posición 16 de la tabla maxmin
			
			ldr r6, =idmax
			ldr r0, [r6]				@; r0 guarda el valor de idmax
			strh r0, [r3, #MM_IDMAX]	@; @; guarda idmax en la posición 18 de la tabla maxmin
			
			ldr r6, =div12
			ldr r7, [r6]			@; r7 guarda el valor de 1/12
			
			smull r1, r2, r5, r7	@; avg * 1/12
			mov r8, #15				@; definim el registre r8 amb el valor 15	
			rsb r9, r8, #32			@; resta 15 a 32 i ho guarda en r9
			mov r1, r1, lsr r8		@; desplaça a la dreta 15 posicions el r1
			orr r0, r1, r2, lsl r9 	@; afegeix a la esquerra el r2 a r1 y ho guarda a r0
			
								@; r0 es la media de temperaturas
		pop {r4-r10, pc}


@;----------------------------------------------------------------
@;	Input: r0->ttemp[][12], r1->nrows, r2->id_month, r3->t_maxmin
@;	Output: avg-> r0
@;----------------------------------------------------------------
		.global avgmaxmin_month
avgmaxmin_month:

		push {r4-r10, lr}
			
			ldr r5, [r0, r2, lsl #2] 	@; r5 = avg = ttemp[0][id_month]
			
			ldr r6, =max
			str r5, [r6] 		@; max = avg
			ldr r6, =min
			str r5, [r6]		@; min = avg
			
			mov r8, #0
			ldr r6, =idmax		@; inicializar idmax con 0
			strh r8, [r6]
			ldr r6, =idmin		@; inicializar idmin con 0
			strh r8, [r6]
			
			mov r8, #1   		@; r8 es la variable local 'i'
			
		.Lwhile:
			mov r4, #12
			mul r7, r4, r8		@; multiplicar NumeroColumnasTotal por el NumeroColumnaConcreto -> (12*i)
			add r7, r2			@; sumarle r2=id_month (la fila correspondiente)
			
			ldr r10, [r0, r7, lsl #2]	@; tvar = ttemp[i][id_month]
			add r5, r10					@; avg += tvar
			
			ldr r6, =max			
			ldr r7, [r6]			@; r7 = max
			cmp r10, r7 			@; comprobar condición
			bgt .Lsi1 				@; saltar si tvar > max
			
			ldr r6, =min
			ldr r7, [r6]			@; r7 = min
			cmp r10, r7 			@; comprobar condición
			blt .Lsi2 				@; saltar si tvar < min
			b .Lcontinuar
			
		.Lsi1:
			str r10, [r6] 			@; max = tvar
			ldr r6, =idmax
			strh r8, [r6]			@; idmax = i
			b .Lcontinuar
		
		.Lsi2:
			str r10, [r6] 			@; min = tvar
			ldr r6, =idmin
			strh r8, [r6]			@; idmin = i
			b .Lcontinuar

		.Lcontinuar:
			add r8, #1 				@; i++
			cmp r8, r1 				@; comprobar si hay que continuar el bucle
			blt .Lwhile 			@; vuelve a empezar si i < nrows
		
		.Lfinwhile:
		
			ldr r6, =min
			ldr r0, [r6]				@; r0 guarda el valor de min	
			str r0, [r3, #MM_TMINC]		@; guarda min en celsius en la posición 0 de la tabla maxmin
			bl Celsius2Fahrenheit		@; pasa el valor de min por el cambio de grado
			str r0, [r3, #MM_TMINF]		@; guarda min en fahrenheit en la posición 8 de la tabla maxmin
			
			ldr r6, =max
			ldr r0, [r6]				@; r0 guarda el valor de max
			str r0, [r3, #MM_TMAXC] 	@; guarda max en celsius en la posición 4 de la tabla maxmin
			bl Celsius2Fahrenheit		@; pasa el valor de max por el cambio de grado
			str r0, [r3, #MM_TMAXF] 	@; guarda max en fahrenheit en la posición 12 de la tabla maxmin
			
			ldr r6, =idmin
			ldr r0, [r6]				@; r0 guarda el valor de idmin
			strh r0, [r3, #MM_IDMIN] 	@; guarda idmin en la posición 16 de la tabla maxmin
			
			ldr r6, =idmax
			ldr r0, [r6]				@; r0 guarda el valor de idmax
			strh r0, [r3, #MM_IDMAX]	@; @; guarda idmax en la posición 18 de la tabla maxmin
			
			cmp r5, #0			@; comprobar condición	
			mvnlt r0, r5		@; si avg < 0, copiar en r0 con NoT de todos los bits 
			addlt r0, #1		@; si avg < 0, r0 + 1
		
			movge r0, r5		@; si avg >= 0, copiar directamente avg en r0

			ldr r2, =avg		@; r2 tiene la dirección de avg
			ldr r3, =mod		@; r3 tiene la dirección de mod
			bl div_mod			@; llama a div_mod para conseguir la media de temperaturas de un mes
			ldr r0, [r2]		@; guardamos el resultado en r0
			ldr r4, [r3]
			cmp r5, #0			@; si avg (r5) era negativo
			sublt r0, #1		@; avg < 0, restamos 1 al resultado (r0)
			mvnlt r0, r0		@; avg < 0, NoT de todos los bits 
			
								@; r0 es la media de temperaturas
		pop {r4-r10, pc}
