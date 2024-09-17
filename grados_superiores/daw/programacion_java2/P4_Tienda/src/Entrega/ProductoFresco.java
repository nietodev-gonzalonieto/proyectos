package Entrega;

public class ProductoFresco extends Producto{
	private double peso;

	public double getPeso() {
		return peso;
	}

	public void setPeso(double peso) {
		this.peso = peso;
	}

	public ProductoFresco(String nombre, double precio, double peso) {
		super(nombre, precio);
		this.peso = peso;
	}

	@Override
	public double calcularPrecio() {
		return peso*this.getPrecio();
	}
	
}
