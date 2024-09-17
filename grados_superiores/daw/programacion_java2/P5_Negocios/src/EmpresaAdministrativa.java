
public class EmpresaAdministrativa extends Negocio {

	public EmpresaAdministrativa(String identificador) {
		super(identificador);
	}
	
	public void a�adirEmpleado(Empleado e) {
		e.a�adirComplemento(Complemento.BAJO);
		listaEmpleados[numEmpleados] = e;
		numEmpleados++;
	}

}
