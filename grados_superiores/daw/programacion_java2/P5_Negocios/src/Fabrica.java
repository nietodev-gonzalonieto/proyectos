
public class Fabrica extends Negocio {

	public Fabrica(String identificador) {
		super(identificador);
	}
	
	public void aņadirEmpleado(Empleado e) {
		e.aņadirComplemento(Complemento.MEDIO);
		e.aņadirComplemento(Complemento.ALTO);
		listaEmpleados[numEmpleados] = e;
		numEmpleados++;
	}

}
