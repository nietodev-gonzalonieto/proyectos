package Entrega;

public class Coche extends Vehiculo {
							//La clase Coche hereda de Vehiculo
	private EnumGama gama;
	
	public Coche(EnumGama gama , String matricula , String marca,String modelo, EnumColor color,int numeroRuedas,double precio) {
		super(matricula,marca,modelo,numeroRuedas,color,precio);
		this.gama=gama;
		/*PONER LOS CONSTRUCTORES DEL SUPER EN EL MISMO ORDEN QUE LOS DEL PADRE*/
	}
		
		
		public EnumGama getGama() {
			return gama;
		}

		public void setGama(EnumGama gama) {
			this.gama = gama;
		}
		
		public double calcularPrecio() {
			if(gama == EnumGama.MEDIA) {
				
				return getPrecio()+1000;
			}
			if(gama == EnumGama.ALTA) {
				return getPrecio()+2000;
			}
			
			return getPrecio();
		}
	
	//Esto devolvera una string de coche
		public String toString() {
			return "Marca: "+this.getMarca()+
					" , Modelo: "+this.getModelo()+
					" , Matricula: "+this.getMatricula()+
					" , Numero de Rueda"+this.getNumeroRuedas()+
					" , Color: "+this.getColor()+
					" , Precio: "+this.getPrecio()+
					" , Gama: "+this.getGama();
					
		}
}

	
