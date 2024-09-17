import java.util.Collections;
import java.util.Hashtable;
import java.util.LinkedList;
import java.util.List;
import java.util.Stack;
import java.util.Vector;
import java.util.stream.Collectors;

public class Main {

	public static void main(String[] args) {
		Vector <String> lista = new Vector<String> (10);
		lista.add("uno");
		lista.add(0, "dos");
		System.out.println(lista);
		System.out.println(lista.get(1));
		System.out.println(lista.size());
		System.out.println(lista.capacity());
		
		//-------------------------------------------
		
		LinkedList <String> lista2 = new LinkedList <String> ();
		lista2.add("cuatro");
		lista2.add("tres");
		lista2.add(1, "cinco");
		System.out.println(lista2);
		System.out.println(lista2.remove(0));
		System.out.println(lista2);
		System.out.println(lista2.size());
		System.out.println(lista2.contains("tres"));
		
        //-------------------------------------------------
		
		Hashtable <String, Integer> tabla = new Hashtable <String, Integer> ();
		tabla.put("uno", 1);
		tabla.put("dos", 2);
		tabla.put("tres", 3);
		
		System.out.println(tabla.get("uno") + tabla.get("dos"));
		tabla.remove("uno");
		System.out.println(tabla);
		
		//----------------------------------------------------
		
		Stack <String> pila = new Stack <String> ();
		pila.push("a");
		pila.push("b");
		while(!pila.empty())
			System.out.println(pila.pop());
		
		//----------------------------------------------------
		lista2.add("a");
		System.out.println(lista2);
		Collections.sort(lista2);
		System.out.println(lista2);
		
		Collections.reverse(lista2);
		System.out.println(lista2);
		
		System.out.println(Collections.max(lista2));
		System.out.println(Collections.min(lista2));
		
		System.out.println(Collections.binarySearch(lista2, "a"));
		Collections.sort(lista2);
		System.out.println(Collections.binarySearch(lista2, "a"));
		
		//-------------------------------------------------------------
		
		List <Persona> lista3 = new LinkedList<Persona> ();
		lista3.add(new Persona("34543830Y", 10));
		lista3.add(new Persona("34534430L", 20));
		lista3.add(new Persona("34567833M", 17));
		lista3.add(new Persona("34567834S", 35));
		lista3.add(new Persona("34567843T", 46));
		lista3.add(new Persona("34567866D", 50));
		
		lista3.forEach(p -> System.out.println(p.getDNI()));
		
		System.out.println("mayores de edad:");
		lista3.stream().filter(x -> x.getEdat() >= 18).forEach(x -> System.out.println(x.getDNI()));
		
		System.out.println("en la lista resultado");
		List <Persona> resultado = lista3.stream().filter(x -> x.getEdat() >=18).collect(Collectors.toList());
		resultado.forEach(x -> System.out.println(x.getDNI()));
		
		double media = lista3.stream().filter(x -> x.getEdat() > 18).mapToDouble(x -> x.getEdat()).average().getAsDouble();
		System.out.println("media de edad: "+media);
		
		lista3.forEach(x -> System.out.println(x.getDNI()+ " " + x.getEdat()));
		lista3.stream().filter(x -> x.getEdat() > 18).forEach(x -> x.setEdat(x.getEdat()-18));
		System.out.println("Edad - 18");
		lista3.forEach(x -> System.out.println(x.getDNI()+ " " + x.getEdat()));
		
		//-------------------------------------------------------
		System.out.println("------------------------");
		for(Persona p: lista3) {
			System.out.println(p.getDNI());
		}
		
		//------------------------------------------------
		System.out.println("------------------------");
		ListaDinamica<String> lista4 = new ListaDinamica<String>();
		lista4.add("uno");
		lista4.add("dos");
		lista4.add("tres");
		lista4.add("cuatro");
		System.out.println(lista4.getSize());
		for(int i=1; i<=lista4.getSize();i++)
			System.out.println(lista4.get(i));

		
	}

}
