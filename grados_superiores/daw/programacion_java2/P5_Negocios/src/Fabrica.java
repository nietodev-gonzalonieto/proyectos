
public class Fabrica extends Negocio {

	public Fabrica(String identificador) {
		super(identificador);
	}
	
	public void añadirEmpleado(Empleado e) {
		e.añadirComplemento(Complemento.MEDIO);
		e.añadirComplemento(Complemento.ALTO);
		listaEmpleados[numEmpleados] = e;
		numEmpleados++;
	}

}
