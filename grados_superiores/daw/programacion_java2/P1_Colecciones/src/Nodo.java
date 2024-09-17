
public class Nodo<T> {
	public T info;
	public Nodo<T> siguiente;
	public Nodo(T info, Nodo<T> siguiente) {
		this.info = info;
		this.siguiente = siguiente;
	}
}
