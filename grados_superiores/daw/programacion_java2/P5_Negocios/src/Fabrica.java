
public class Fabrica extends Negocio {

	public Fabrica(String identificador) {
		super(identificador);
	}
	
	public void a�adirEmpleado(Empleado e) {
		e.a�adirComplemento(Complemento.MEDIO);
		e.a�adirComplemento(Complemento.ALTO);
		listaEmpleados[numEmpleados] = e;
		numEmpleados++;
	}

}
