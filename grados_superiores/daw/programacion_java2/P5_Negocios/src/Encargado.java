
public class Encargado extends Empleado {
	
	private double sueldoExtra;
	private Empleado [] listaEmpleados = new Empleado[50];
	private int numEmpleados;

	public Encargado(String dNI, double sueldoBase, double sueldoExtra) {
		super(dNI, sueldoBase);
		this.sueldoExtra=sueldoExtra;
		numEmpleados=0;
	}
	
	@Override
	public double getSueldoBase() {
		return sueldoBase + sueldoExtra;
	}
	
	public boolean buscarEmpleado(String dni) {
		for(int i = 0; i<numEmpleados; i++)
			if(listaEmpleados[i].getDNI().equals(dni))
				return true;
		return false;
	}
	
	public void añadirEmpleado(Empleado e) {
		if(!(e instanceof Encargado) || !(((Encargado) e).buscarEmpleado(DNI))) {
			listaEmpleados[numEmpleados] = e;
			numEmpleados++;
		}
	}
	
	public void eliminarEmpleado(String dni) {
		for(int i = 0; i<numEmpleados; i++) {
			if(listaEmpleados[i].getDNI().equals(dni)) {
				for(int j = i; j<numEmpleados - 1; j++) {
					listaEmpleados[j] = listaEmpleados[j+1];
				}
				numEmpleados--;
				break;
			}
		}
	}
	
	public int nivelEncargado() {
		int nivel = 1;
		int maxNivel = 0;
		int aux = 0;
		
		for(int i = 0; i<numEmpleados; i++) {
			if(listaEmpleados[i] instanceof Encargado) {
				aux = ((Encargado) listaEmpleados[i]).nivelEncargado();
				if(aux>maxNivel)
					maxNivel = aux;
			}
		}
		
		nivel += maxNivel;
		return nivel;
	}
	
	public void vaciarLista() {
		listaEmpleados = new Empleado[50];
		numEmpleados = 0;
	}
	
	public String toString() {
		String resultado = "DNI: " + DNI + " sueldo: " + this.getSueldoBase() + "\nLista de empleados:\n [";
		for(int i = 0; i<numEmpleados; i++)
			resultado += "Empleado " + (i+1) + ": " + listaEmpleados[i].toString() + "; ";
		return resultado + "]";
	}

}
