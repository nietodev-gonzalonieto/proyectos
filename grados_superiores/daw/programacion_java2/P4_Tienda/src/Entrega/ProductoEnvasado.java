package Entrega;

import java.util.Date;

public class ProductoEnvasado extends Producto{
	private Date fechaCaducidad;

	public Date getFechaCaducidad() {
		return fechaCaducidad;
	}

	public void setFechaCaducidad(Date fechaCaducidad) {
		this.fechaCaducidad = fechaCaducidad;
	}

	public ProductoEnvasado(String nombre, double precio, Date fechaCaducidad) {
		super(nombre, precio);
		this.fechaCaducidad = fechaCaducidad;
	}

	@Override
	public double calcularPrecio() {
		return this.getPrecio();
	}
	
}
