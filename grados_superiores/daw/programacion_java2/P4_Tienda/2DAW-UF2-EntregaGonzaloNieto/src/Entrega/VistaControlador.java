package Entrega;

import java.awt.GridLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Date;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import javax.swing.JButton;
import javax.swing.JComboBox;
import javax.swing.JDialog;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.JPasswordField;
import javax.swing.JTextArea;
import javax.swing.JTextField;

public class VistaControlador implements ActionListener{
	
	private Map<String, String> credenciales;//string string , el primero sera el usuario y el segundo string es la contraseña , hago un mapa padre por MAP
	private List<Producto> productos; //hago una lista padre por List
	private Carrito carrito;
	private JFrame  ventanaInicio;
	private JFrame  ventanaCompra;
	private JButton botonTerminar;
	private JTextField fieldUsuario;
	private JPasswordField fieldContrasena;
	private JComboBox desplegableProductos;
	private JTextField fieldCantidad;
	
	public void empezar() {
		credenciales = new HashMap<String , String>(); ////y aquí en el new es el hijo HashMap
		credenciales.put("pepe","1234");
		credenciales.put("alberto","1234");
		credenciales.put("juan","1234");
		credenciales.put("luis","1234");
		credenciales.put("ramon","1234");
		
		productos = new ArrayList<Producto>(); //y aquí en el new es el hijo ArrayList
		productos.add(new ProductoFresco("Queso",10,5));//Primero nombre del producto, segundo precio, tercero peso
		productos.add(new ProductoFresco("Salmón",30,15));
		productos.add(new ProductoEnvasado("Pepinillo",2,new Date(130,7,6)));//Primero nombre del producto, segundo precio, tercero fecha
		productos.add(new ProductoEnvasado("Atún",4,new Date(140,9,17)));
		
		carrito = new Carrito();
	
		mostrarVentanaInicio();
	}
	
	
	public void mostrarVentanaInicio() {
		ventanaInicio = new JFrame("Menú Inicio");
		ventanaInicio.setResizable(false);//sirve para rescalar la ventana
		ventanaInicio.setLocationRelativeTo(null);//crea la ventana en el centro de la pantalla
		ventanaInicio.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);//si clicas en la "X" cierra
		ventanaInicio.setFocusable(true);//la ventana te aparece en primer plano
		
		
		JPanel contenido = (JPanel)(ventanaInicio.getContentPane());//el panel de dentro de la ventana donde metemos las elementos
		contenido.setLayout(new GridLayout(0,2));//va a tener 2 columnas y las filas que queramos gracias al 0 , si fueran 2 filas y 3 columnas pondriamos (2,3)	
		
		fieldUsuario=new JTextField(20);
		contenido.add(new JLabel("Usuario:"));//label de usuario
		contenido.add(fieldUsuario);//text field de usuario
		
		fieldContrasena=new JPasswordField(20);
		contenido.add(new JLabel("Contraseña:"));//label de contraseña
		contenido.add(fieldContrasena);//text field de contraseña
		
		JButton botonAcceder = new JButton("Acceder");
		botonAcceder.setActionCommand("Acceder");//esto se ejecutará en el Controller que esta situado abajo del documento
		botonAcceder.addActionListener(this);
		contenido.add(botonAcceder);//metemos boton de acceso en el panel
		
		ventanaInicio.pack();//esto es para que te redimensione bien las cosas
		ventanaInicio.setVisible(true); //esto es para que pinte la ventana por pantalla
	}
	
	public void mostrarVentanaMenuCompra() {
		ventanaCompra = new JFrame("Menú Compra");
		ventanaCompra.setResizable(false);//sirve para rescalar la ventana
		ventanaCompra.setLocationRelativeTo(null);//crea la ventana en el centro de la pantalla
		ventanaCompra.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);//si clicas en la "X" cierra
		ventanaCompra.setFocusable(true);//la ventana te aparece en primer plano
		
		JPanel contenido = (JPanel)(ventanaCompra.getContentPane());//el panel de dentro de la ventana donde metemos las elementos
		contenido.setLayout(new GridLayout(0,2));//va a tener 2 columnas 	
		
		contenido.add(new JLabel("Producto:"));//label de producto
		
		//String[] opciones = {productos.get(0).getNombre()+" "+productos.get(0).calcularPrecio(),productos.get(1).getNombre()+" "+productos.get(1).calcularPrecio()};//esto es una array de string que nos sirve para realizar el desplegable
	
		String[] opciones = new String[productos.size()];//esto recorre la lista de productos para saber el tamaño de nuestra Array de opciones
		for(int i=0;i < productos.size();i++) { 
			opciones[i]=productos.get(i).getNombre()+" "+productos.get(i).calcularPrecio();
		}
		
		desplegableProductos = new JComboBox(opciones);
		contenido.add(desplegableProductos);//desplegable de producto
		
		fieldCantidad = new  JTextField(20);
		contenido.add(new JLabel("Numero:"));//label de numero
		contenido.add(fieldCantidad);//textField de numero
		
		JButton botonAnadir = new JButton("Añadir");
		botonAnadir.setActionCommand("Añadir");//esto se ejecutará en el Controller que esta situado abajo del documento
		botonAnadir.addActionListener(this);
		contenido.add(botonAnadir);//boton de añadir
		contenido.add(new JLabel());//Esto lo utilizamos como espacio para saltar de fila
		
	
		
		botonTerminar = new JButton("Terminar Compra");
		botonTerminar.setEnabled(false);//Esto sirve para desactivar el botón
		botonTerminar.setActionCommand("Terminar Compra");//esto se ejecutará en el Controller que esta situado abajo del documento
		botonTerminar.addActionListener(this);
		contenido.add(botonTerminar);//boton de terminar compra
		
		ventanaCompra.pack();//esto es para que te redimensione bien las cosas
		ventanaCompra.setVisible(true); //esto es para que pinte la ventana por pantalla

	}
	public void mostrarVentanaFactura() {
		JFrame  ventana = new JFrame("Factura");
		ventana.setResizable(false);//sirve para rescalar la ventana
		ventana.setLocationRelativeTo(null);//crea la ventana en el centro de la pantalla
		ventana.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);//si clicas en la "X" cierra
		ventana.setFocusable(true);//la ventana te aparece en primer plano
		
		JPanel contenido = (JPanel)(ventana.getContentPane());//el panel de dentro de la ventana donde metemos las elementos
		//al solo tener un elemento no hace falta definir un Layout (el layout interesa cuando queremos especificar la posición entre varios elementos).
		
		
		String factura="";
		Producto productoUltimo; 
		ProductoEnvasado productoEnvasado;
		ProductoFresco productoFresco;
		double precioTotal=0;
		
		while(!carrito.estaVacioCarrito()) {
			productoUltimo=carrito.sacarProducto();
			factura+=productoUltimo.getNombre();//le sumamos el nombre de productoUltimo
			factura+="     "+productoUltimo.getPrecio()+"€";//le sumamos el precio de productoUltimo
			
			if(productoUltimo instanceof ProductoEnvasado) {//si es producto envasado entra
				productoEnvasado = (ProductoEnvasado)productoUltimo; //con esto transformamos producto Ultimo en Producto Envasado , esto se le llama Cast
				factura+="     "+new SimpleDateFormat("dd/MM/yyyy").format(productoEnvasado.getFechaCaducidad());//al ser un producto envasado nos sale para seleccionar la fecha de caducidad
			}else {											//si el producto es fresco entra
				productoFresco = (ProductoFresco)productoUltimo; //con esto transformamos producto Ultimo en Producto Fresco , esto se le llama Cast
				factura+="     "+productoFresco.getPeso()+"KG";		 //al ser un producto fresco nos sale para seleccionar el peso
			}
			//factura+=productoUltimo.get();//le sumamos el nombre de productoUltimo
			factura+="     "+productoUltimo.calcularPrecio()+"€ \n";//calculamos el precio de ese producto no el total
			precioTotal+=productoUltimo.calcularPrecio();
		}
		factura+="Precio Total:      "+precioTotal+"€";
		
		JTextArea textoFactura = new JTextArea(factura,0,40);
		textoFactura.setEnabled(false);//Esto sirve para desactivar el text area
		contenido.add(textoFactura);//textArea de factura
		
		
		
		ventana.pack();//esto es para que te redimensione bien las cosas
		ventana.setVisible(true); //esto es para que pinte la ventana por pantalla
	}
	
	
	public void ocultarVentanaInicio() {
		ventanaInicio.setVisible(false);
	}
	public void ocultarVentanaMenuCompra() {
		ventanaCompra.setVisible(false);
	}
	
	
	
//******CONTROLLER *********************************************************************************
	
	public void actionPerformed(ActionEvent evento) {
		String accion = evento.getActionCommand();
		if(accion.equals("Acceder")) { //Aquí entrará cuando le demos al botón acceder de la ventana inicio porque se han unido por la accion "Acceder".
			if(comprovarAcceso()) {
				ocultarVentanaInicio();
				mostrarVentanaMenuCompra();
			}
		}
		else if(accion.equals("Añadir")) { //Aquí entrará cuando le demos al botón Añadir de la ventana menuCompra porque se han unido por la accion "Acceder".
			try {
				anadirProductoSeleccionado();
				botonTerminar.setEnabled(true);//Cuando le das a "Añadir" el botón Terminar se activa
			} catch (CantidadException e) {
				JOptionPane mensajeError = new JOptionPane();
				mensajeError.showMessageDialog(ventanaCompra, "Tienes que insertar una cantidad que no sea 0", "Error", JOptionPane.ERROR_MESSAGE);//ventana padre , mensaje , titulo, tipo de ventana
				
			}
			
		}
		else if(accion.equals("Terminar Compra")) { //Aquí entrará cuando le demos al botón Terminar Compra de la ventana menuCompra porque se han unido por la accion "Acceder".
			ocultarVentanaMenuCompra();
			mostrarVentanaFactura();
		}
	}
	public boolean comprovarAcceso() {
		String usuario = fieldUsuario.getText();
		String contrasena = String.valueOf(fieldContrasena.getPassword());
		if(contrasena.equals(credenciales.get(usuario))) { //credenciales.get(usuario) te devuelbe la contraseña de ese usuario si encuentra el usuario y con el equals comparas la contraseña
														   //si no encuentra el usuario devuelbe null, por eso he puesto contraeña primero en el equals.
			return true;
		}
		return false;
	}
	
	public void anadirProductoSeleccionado() throws CantidadException{
		int indiceProducto = desplegableProductos.getSelectedIndex();
		String cantidad = fieldCantidad.getText();
		if(!cantidad.matches("\\d+")||cantidad.equals("0")) {
			throw new CantidadException();
		}
		carrito.anadirProducto(productos.get(indiceProducto), Integer.parseInt(cantidad));
		
	}
	
}
