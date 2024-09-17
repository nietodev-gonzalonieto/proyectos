
public class EmpresaAdministrativa extends Negocio {

	public EmpresaAdministrativa(String identificador) {
		super(identificador);
	}
	
	public void añadirEmpleado(Empleado e) {
		e.añadirComplemento(Complemento.BAJO);
		listaEmpleados[numEmpleados] = e;
		numEmpleados++;
	}

}
