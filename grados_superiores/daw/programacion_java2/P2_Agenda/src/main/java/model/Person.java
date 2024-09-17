package model;

import controller.DNIException;
import controller.AgeException;
import data.PersonDAO;

public class Person implements Comparable<Person> {
   // Atribut

   private DNI dni;
   private String forename;
   private String surname1;
   private String surname2;
   private int age;

   // Constructor

   public Person() {
      dni = new DNI();
      forename = "";
      surname1 = "";
      surname2 = "";
      age = 0;
   }
   
   public Person(PersonDAO person) {
	  dni = new DNI();
      dni.setDni(person.getDNI());
      forename = person.getForename();
      surname1 = person.getSurname1();
      surname2 = person.getSurname2();
      age = Integer.valueOf(person.getAge());
   }

   // Metodes

   public String getDni() {
      return(dni.getDni());
   }

   public void setDni(String dni) throws DNIException {
      this.dni.setDni(dni);
   }

   public String getForename() {
      return(forename);
   }

   public void setForename(String forename) {
      this.forename = forename;
   }

   public String getSurname1() {
      return(surname1);
   }

   public void setSurname1(String surname1) {
      this.surname1 = surname1;
   }

   public String getSurname2() {
      return(surname2);
   }

   public void setSurname2(String surname2) {
      this.surname2 = surname2;
   }

   public String getAge() {
      return(String.valueOf(age));
   }

   public void setAge(String age) throws AgeException {
      if(!age.matches("-?\\d+")) {
         throw(new AgeException("format"));
      }

      this.age = Integer.valueOf(age);

      if((this.age < 0) || (this.age >= Math.pow(10, 3))) {
         throw(new AgeException("valor"));
      }
   }

   public void copy(Person person) {
      dni.setDni(person.getDni());
      forename = person.forename;
      surname1 = person.surname1;
      surname2 = person.surname2;
      age = person.age;
   }

   public int compareTo(Person person) {
      if(dni.getDni().equals(person.dni.getDni())) {
         return(0);
      }

      if(!surname1.equals(person.surname1)) {
         return(surname1.compareToIgnoreCase(person.surname1));
      }

      if(!surname2.equals(person.surname2)) {
         return(surname2.compareToIgnoreCase(person.surname2));
      }

      if(!forename.equals(person.forename)) {
         return(forename.compareToIgnoreCase(person.forename));
      }

      return(dni.getDni().compareTo(person.dni.getDni()));
   }
}