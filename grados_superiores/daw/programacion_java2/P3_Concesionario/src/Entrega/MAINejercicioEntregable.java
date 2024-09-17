package Entrega;

public class MAINejercicioEntregable {
	
	public static void main(String[] args) {
		Coche mercedes = new Coche(EnumGama.ALTA,"3142 SDS","Mercedes","Clase C",EnumColor.Rojo,4,60000);
		Coche cupra = new Coche(EnumGama.ALTA,"2345 RTT","Cupra","Formentor",EnumColor.Azul,4,50000);
		Moto yamaha = new Moto("2315 RTT","Yamaha","500CC",EnumColor.Azul,2,10000);
		
		Vendedor jbalvin = new Vendedor(new NIF(21691221,"J"), new Fecha(27,8,1998));
		Vendedor maluma = new Vendedor(new NIF(21693221,"M"), new Fecha(17,3,1992));
		
		Concesionario barcelona = new Concesionario();
		Concesionario madrid = new Concesionario();
		
		barcelona.anyadirVehiculo(cupra);
		madrid.anyadirVehiculo(mercedes);
		barcelona.anyadirVehiculo(yamaha);
		
		barcelona.anyadirVendedor(jbalvin);
		madrid.anyadirVendedor(maluma);

		madrid.realizarVenta(maluma, mercedes);
		
		System.out.println(barcelona);
		System.out.println(madrid);
	}

}
