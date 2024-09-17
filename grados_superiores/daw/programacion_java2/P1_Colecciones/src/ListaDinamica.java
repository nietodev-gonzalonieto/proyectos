
public class ListaDinamica<T> {
	private Nodo<T> raiz;
	private int size;

	public ListaDinamica() {
		raiz=null;
		size=0;
	}
	public void add(T elem) {
		Nodo<T> aux=raiz;
		if(aux==null) {
			raiz=new Nodo<T>(elem, null);
		} else {
			while(aux.siguiente!=null) {
				aux=aux.siguiente;
			}
			aux.siguiente=new Nodo<T>(elem, null);
		}
		size++;
	}
	
	public int getSize() {
		return size;
	}
	
	public T get(int index) {
		Nodo<T> aux=raiz;
		for(int i=1; i<index; i++) {
			aux=aux.siguiente;
		}
		if(aux!=null) {
			return aux.info;
		}
		return null;
	}
	
}
