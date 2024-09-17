
public abstract class Negocio {
	
	private String identificador;
	protected Empleado [] listaEmpleados = new Empleado[50];
	protected int numEmpleados;
	private static int numNegocios = 0;
	
	public Negocio(String identificador) {
		this.identificador = identificador;
		numEmpleados = 0;
		numNegocios++;
	}

	public String getIdentificador() {
		return identificador;
	}

	public void setIdentificador(String identificador) {
		this.identificador = identificador;
	}
	
	public static int getNumNegocios() {
		return numNegocios;
	}
	
	public double calcularSalarioMedio() {
		double resultado = 0;
		for(int i = 0; i<numEmpleados; i++)
			resultado += listaEmpleados[i].getSueldoBase();
		return resultado;
	}
	
	public Empleado eliminarEmpleado(String dni) {
		Empleado e = null;
		for(int i = 0; i<numEmpleados; i++) {
			if(listaEmpleados[i].getDNI().equals(dni)) {
				e = listaEmpleados[i];
				for(int j = i; j<numEmpleados - 1; j++) {
					listaEmpleados[j] = listaEmpleados[j+1];
				}
				numEmpleados--;
				break;
			}
		}
		return e;
	}
	
	public String toString() {
		String resultado = "Identificador: " + identificador + "\nLista de empleados: [";
		for(int i = 0; i<numEmpleados; i++)
			resultado += "Empleado " + (i+1) + ": " + listaEmpleados[i].toString() + "; ";
		return resultado + "]";
	}
	
	public abstract void añadirEmpleado(Empleado e);
	
}
