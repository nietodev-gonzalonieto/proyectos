
public class Empleado {
	
	protected String DNI;
	protected double sueldoBase;
	
	public Empleado(String dNI, double sueldoBase) {
		DNI = dNI;
		this.sueldoBase = sueldoBase;
	}

	public String getDNI() {
		return DNI;
	}

	public void setDNI(String dNI) {
		DNI = dNI;
	}

	public double getSueldoBase() {
		return sueldoBase;
	}

	public void setSueldoBase(double sueldoBase) {
		this.sueldoBase = sueldoBase;
	}
	
	public void añadirComplemento(Complemento c) {
		if(c==Complemento.BAJO)
			sueldoBase+=100;
		else if(c==Complemento.MEDIO)
			sueldoBase+=500;
		else if(c==Complemento.ALTO)
			sueldoBase+=1000;
	}
	
	public String toString() {
		return "DNI: " + DNI + " sueldo: " + sueldoBase;
	}
	
}
