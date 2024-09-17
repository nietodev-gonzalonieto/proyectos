
public class Gestor implements InterfaceGestor {

	@Override
	public void transferirEmpleado(Negocio n1, Negocio n2, String dni) {
		Empleado e = n1.eliminarEmpleado(dni);
		if(e instanceof Encargado)
			((Encargado) e).vaciarLista();
		n2.añadirEmpleado(e);
	}

	@Override
	public String obtenerTipo(Negocio n) {
		if(n instanceof EmpresaAdministrativa)
			return "empresa administrativa";
		
		if(n instanceof Fabrica)
			return "fabrica";
		
		return "objeto nulo";
	}
	
}
