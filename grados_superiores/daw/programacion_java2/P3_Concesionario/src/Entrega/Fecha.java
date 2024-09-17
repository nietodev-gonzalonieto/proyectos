package Entrega;

import java.time.*;

public class Fecha {
	    private int any;
	    private int mes; // 1 a 12
	    private int dia; // 1 a 31
	
	    static int[] diasMes= {31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31};
	    
	public int getAny() {
			return any;
		}

		public void setAny(int año) {
			this.any = any;
		}

		public int getMes() {
			return mes;
		}

		public void setMes(int mes) {
			this.mes = mes;
		}

		public int getDia() {
			return dia;
		}

		public void setDia(int dia) {
			this.dia = dia;
		}
		
		public Fecha(int dia,int mes,int any) {
			this.dia=dia;
			this.mes=mes;
			this.any=any;	
		}
		
		public boolean validarFecha(){
			
		    if ( this.mes<1 || this.mes>12 )
		        return false;
		    // Para febrero y bisiesto el limite es 29
		    if ( this.mes==2 && this.any%4==0 )
		        return this.dia>=1 && this.dia<=29;
		    return this.dia>=1 && this.dia<=diasMes[this.mes-1];
		}
		
		public Fecha devolverSiguiente() {
			if(!validarFecha()) {
				return null;
			}
			Fecha resultado= new Fecha(this.dia+1,this.mes,this.any);//Aqui le sumamos 1 dia a nuestro this.dia
			
			if(resultado.validarFecha()) {
				return resultado;
			}
			
			resultado.setDia(1);
			resultado.setMes(this.mes+1);//Aqui le sumamos 1 mes a nuestro this.mes
			
			if(resultado.validarFecha()) {
				return resultado;
			}
			resultado.setMes(1);
			resultado.setAny(this.any+1);//Aqui le sumamos 1 any a nuestro this.any
			return resultado;
		}
		
		public String toString() {
			return dia+"/"+mes+"/"+any;
			
		}
}


