
public class EmpresaAdministrativa extends Negocio {

	public EmpresaAdministrativa(String identificador) {
		super(identificador);
	}
	
	public void aņadirEmpleado(Empleado e) {
		e.aņadirComplemento(Complemento.BAJO);
		listaEmpleados[numEmpleados] = e;
		numEmpleados++;
	}

}
