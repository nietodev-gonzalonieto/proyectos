
public class Main {

	public static void main(String[] args) {
		Empleado e1 = new Empleado("3445345", 1987.45);
		Empleado e2 = new Empleado("434364", 32424);
		Empleado en1 = new Encargado("32432452", 13232, 2313);
		Empleado en2 = new Encargado("324545452", 13232, 2313); 
		Empleado en3 = new Encargado("32464652", 13232, 2313);
		Empleado e3 = new Empleado("43436dffddf4", 32424);
		
		((Encargado) en1).aņadirEmpleado(en2);
		((Encargado) en2).aņadirEmpleado(en3);
		((Encargado) en2).aņadirEmpleado(e1);
		((Encargado) en3).aņadirEmpleado(e2);
		
		System.out.println(((Encargado) en1).nivelEncargado());
		
		Negocio n1 = new EmpresaAdministrativa("1234");
		Negocio n2 = new Fabrica("4321");
		
		n1.aņadirEmpleado(e1);
		n1.aņadirEmpleado(e2);
		n1.aņadirEmpleado(en1);
		n1.aņadirEmpleado(en2);
		n1.aņadirEmpleado(en3);
		
		n2.aņadirEmpleado(e3);
		
		System.out.println(n1.calcularSalarioMedio());
		
		System.out.println(n1);
		System.out.println(n2);
		
		Gestor g = new Gestor();
		System.out.println(g.obtenerTipo(n1));
		System.out.println(g.obtenerTipo(n2));
		
		g.transferirEmpleado(n1, n2, "32432452");
		System.out.println(((Encargado) en1).nivelEncargado());
		System.out.println("--------------------------");
		System.out.println(n1);
		System.out.println(n2);
		
		System.out.println("numero de negocios creados: "+Negocio.getNumNegocios());

	}

}
