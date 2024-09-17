package Entrega;

public abstract class Vehiculo {
	private String matricula;
	private String marca;
	private String modelo;
	private int numeroRuedas;
	private EnumColor color;
	private double precio;
	
	
	public Vehiculo(String matricula, String marca, String modelo, int numeroRuedas, EnumColor color, double precio) {
		this.matricula = matricula;
		this.marca = marca;
		this.modelo = modelo;
		this.numeroRuedas = numeroRuedas;
		this.color = color;
		this.precio = precio;
	
	}


	public String getMatricula() {
		return matricula;
	}


	public void setMatricula(String matricula) {
		this.matricula = matricula;
	}


	public String getMarca() {
		return marca;
	}


	public void setMarca(String marca) {
		this.marca = marca;
	}


	public String getModelo() {
		return modelo;
	}


	public void setModelo(String modelo) {
		this.modelo = modelo;
	}


	public int getNumeroRuedas() {
		return numeroRuedas;
	}


	public void setNumeroRuedas(int numeroRuedas) {
		this.numeroRuedas = numeroRuedas;
	}


	public EnumColor getColor() {
		return color;
	}


	public void setColor(EnumColor color) {
		this.color = color;
	}


	public double getPrecio() {
		return precio;
	}


	public void setPrecio(double precio) {
		this.precio = precio;
	}
	
	public abstract double calcularPrecio();//Al ser un metodo abstracto el contenido se pone en las clases que heredan
	
}
