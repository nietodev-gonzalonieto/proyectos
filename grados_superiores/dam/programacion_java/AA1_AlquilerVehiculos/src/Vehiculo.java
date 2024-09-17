
public abstract class Vehiculo {
	private String matricula;
	private String marca;
	private String modelo;
	
	//Constructor
	public Vehiculo(String matricula, String marca, String modelo) {
		this.matricula = matricula;
		this.marca = marca;
		this.modelo = modelo;
	}
	
	public String getMatricula() {
		return matricula;
	}
	
	public String getMarca() {
		return marca;
	}
	
	public String getModelo() {
		return modelo;
	}
	
	 public abstract int getPuertas();
	 public abstract int getPlazas();

	 @Override
	 public String toString() {
		 return "Matricula: " + matricula + ", Marca: " + marca + ", Modelo: " + modelo;
	 }
}
