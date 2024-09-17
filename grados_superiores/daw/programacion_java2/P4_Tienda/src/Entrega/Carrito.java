package Entrega;

import java.util.Stack;

public class Carrito {
	Stack<Producto> pila;

	public Carrito() {
		this.pila = new Stack<Producto>();
	}
	public void anadirProducto(Producto producto , int cantidad) {
		for(int i=0; i<cantidad;i++) {
			this.pila.push(producto);//Push para meterlo en la pila
		}
	}
	public Producto sacarProducto() {
		return this.pila.pop();//pop para  sacar el último de la pila
	}
	public boolean estaVacioCarrito() { //esta funcion te dice si la pila esta vacia
		return this.pila.isEmpty();
	}
}
