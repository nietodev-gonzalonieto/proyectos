package Entrega;

public class Moto extends Vehiculo {
					//La clase Moto hereda de Vehiculo
	public Moto(String matricula , String marca,String modelo, EnumColor color,int numeroRuedas,int precio) {
		super(matricula,marca,modelo,numeroRuedas,color,precio);
	}
	
	public double calcularPrecio() {
		return getPrecio();
	}
	
	public String toString() {
		return "Marca: "+this.getMarca()+
				" , Modelo: "+this.getModelo()+
				" , Color: "+this.getColor()+
				" , Numero de ruedas: "+this.getNumeroRuedas()+
				" , Precio: "+this.getPrecio()+
				" , Matricula: "+this.getMatricula();
				
	}
}
