package Entrega;

public interface InterfaceConcesionario {

	public void realizarVenta(Vendedor vendedor, Vehiculo vehiculo);
	public void anyadirVehiculo(Vehiculo vehiculo);
	public void anyadirVendedor(Vendedor vendedor);
	public void transferirVehiculo(Vehiculo vehiculo, Concesionario concesionario);
	
}
