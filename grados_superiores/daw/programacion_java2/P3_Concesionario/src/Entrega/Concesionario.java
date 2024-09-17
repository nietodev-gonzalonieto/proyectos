package Entrega;

import java.util.ArrayList;

public class Concesionario implements InterfaceConcesionario{
	private ArrayList<Vendedor> listaVendedor;
	private ArrayList<Vehiculo> listaVehiculo;
	private static int numConcesionarios=0;
	
	public Concesionario() {
		this.listaVendedor = new ArrayList<>();
		this.listaVehiculo = new ArrayList<>();
		numConcesionarios++;
	}

	public ArrayList<Vendedor> getListaVendedor() {
		return listaVendedor;
	}

	public void setListaVendedor(ArrayList<Vendedor> listaVendedor) {
		this.listaVendedor = listaVendedor;
	}

	public ArrayList<Vehiculo> getListaVehiculo() {
		return listaVehiculo;
	}

	public void setListaVehiculo(ArrayList<Vehiculo> listaVehiculo) {
		this.listaVehiculo = listaVehiculo;
	}
	
	public void anyadirVehiculo(Vehiculo vehiculo) {
		listaVehiculo.add(vehiculo);
	}
	
	public void anyadirVendedor(Vendedor vendedor) {
		listaVendedor.add(vendedor);
	}
	
	public static int getNumConcesionarios() {
		return numConcesionarios;
	}
	
	public void realizarVenta(Vendedor vendedor, Vehiculo vehiculo) {	//Vendedor=x Vehiculo=y
		listaVehiculo.remove(vehiculo);//elimina el vehiculo de la lista
		vendedor.anyadirVehiculo(vehiculo);
	}
	
	public void transferirVehiculo(Vehiculo vehiculo, Concesionario concesionario) {
		listaVehiculo.remove(vehiculo);//le mandamos el vehiculo y eliminamos el vehiculo del concesionario
		concesionario.anyadirVehiculo(vehiculo); //cojemos el concesionario al cual queremos transferir el vehiculo que le hemos pasado
	}
	
	public String toString() {
		return "Lista de vendedores: " + getListaVendedor()+
				" , Lista de vehiculos " + getListaVehiculo();
	}
}
