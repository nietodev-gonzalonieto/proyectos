package Entrega;

import java.util.ArrayList;

public class Vendedor implements InterfaceVendedor {

	private Fecha fechaNacimiento;
	private NIF dni;	//tengo que hacer el ejercicio 8 del nif de la P2
	private ArrayList<Vehiculo> listaVentas;
	
	
	public Vendedor(NIF dni,Fecha fechaNacimiento) {
		this.dni=dni;
		this.fechaNacimiento = fechaNacimiento;
		this.listaVentas= new ArrayList<>();
	}
	
	public Fecha getFechaNacimiento() {
		return fechaNacimiento;
	}

	public void setFechaNacimiento(Fecha fechaNacimiento) {
		this.fechaNacimiento = fechaNacimiento;
	}

	public NIF getDni() {
		return dni;
	}

	public void setDni(NIF dni) {
		this.dni = dni;
	}

	public ArrayList<Vehiculo> getListaVentas() {
		return listaVentas;
	}

	public void setListaVentas(ArrayList<Vehiculo> listaVentas) {
		this.listaVentas = listaVentas;
	}

	public void anyadirVehiculo(Vehiculo vehiculo) {/*Primero lo que es y luego como lo vas a llamar*/
		listaVentas.add(vehiculo);
	}
	
//Numero TOTAL de coches vendidos
	public int numeroCochesVendidos() {//Vehiculo es el nombre del objeto, vehiculo es el nombre de la instancia , listaVentas es el array de vehiculos
		int contador=0;			 //vehiculo va a tomar todos los elementos de listaVentas
		for(Vehiculo vehiculo : listaVentas) {//recorre toda la lista 
			if(vehiculo instanceof Coche) {	//si vehiculo es un coche
				contador++;
			}
		}
		return contador;//aqui devuelve cuando ha recorrido toda la lista
	}

//Numero de coches de gama ALTA vendidos	
	public int numeroCochesGamaAltaVendidos() {
		int contador=0;			 
		for(Vehiculo vehiculo : listaVentas) {
			if(vehiculo instanceof Coche) {//Comprobamos si X es una instancia de coche
				Coche coche = (Coche) vehiculo;//Transformamos vehiculo a Coche,porque sabemos que es un coche por la linea anterior
				if(coche.getGama()==EnumGama.ALTA) {//Si el coche es de gama alta
					contador++; 
				}
			}
		}
		return contador;
	}
	
	public int numeroMotosVendidos() {//Vehiculo es el nombre del objeto, vehiculo es el nombre de la instancia , listaVentas es el array de vehiculos
		int contador=0;			 //vehiculo va a tomar todos los elementos de listaVentas
		for(Vehiculo vehiculo : listaVentas) {//recorre toda la lista 
			if(vehiculo instanceof Moto) {	//si vehiculo es una moto
				contador++;
			}
		}
		return contador;//aqui devuelve cuando ha recorrido toda la lista
	}
	
	public double precioMedio() {
		int precio=0;
		for(Vehiculo vehiculo : listaVentas) { //Vehiculo es el nombre del objeto, vehiculo es el nombre de la instancia , listaVentas es el array de vehiculos
			precio += vehiculo.getPrecio();	//vehiculo va a tomar todos los elementos de listaVentas
		}
		return precio/listaVentas.size();//.size es la funcion que debuelbe cuantos vehiculos hay
										 //la media es la suma total de precios dividida por el numero de vehiculos
	}	
	public String toString() {
		//Esto devolvera una string de coche
			return "Fecha Nacimiento: "+ getFechaNacimiento()+
					" , Dni: "+ getDni()+
					" , Lista de ventas: "+ getListaVentas();	
				
	}
}
