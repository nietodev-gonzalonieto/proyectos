package model;

import java.util.List;
import java.util.TreeSet;

import controller.DNIException;
import data.Persistence;
import data.PersonDAO;

public class Registration {
   // Atribut

   private TreeSet<Person> registration;
   private Person person;
   private int index;
   private boolean connection;

   // Constructor

   public Registration(boolean connection) {
      List<PersonDAO> list;

      registration = new TreeSet<Person>();
      
      if(connection) {
         list = Persistence.list();

         for(PersonDAO register : list) {
            person = new Person(register);
            registration.add(person);
         }
      }
      
      person = new Person();
      index = 0;
      this.connection = connection;
      
      if(registration.size() > 1) {
     	 person.copy(registration.first());
      }
   }

   // Metodes

   public int getIndex() {
      return(index);
   }

   public int getSize() {
      return(registration.size());
   }

   public String[] getFields() {
      String[] fields = {person.getDni(), person.getForename(),
            person.getSurname1(), person.getSurname2(), person.getAge()};

      return(fields);
   }

   public void add(Person person) {
      registration.add(person);
      this.person.copy(person);
      index = registration.headSet(person).size();

      if(connection) {
         Persistence.add(person);
      }
   }

   public void delete() {
      Person buffer = new Person();

      buffer.copy(person);

      if(registration.size() > 1) {
         if(index < registration.size() - 1) {
            person.copy(registration.tailSet(person, false).first());
         } else {
            person.copy(registration.headSet(person).last());
            index--;
         }
      }

      registration.remove(buffer);

      if(connection) {
         Persistence.delete(buffer);
      }
   }

   public void test(Person person) throws DNIException {
      if(registration.contains(person)) {
         throw(new DNIException("valor"));
      }
   }

   public void first() {
      person.copy(registration.first());
      index = 0;
   }

   public void previous() {
      person.copy(registration.headSet(person).last());
      index--;
   }

   public void next() {
      person.copy(registration.tailSet(person, false).first());
      index++;
   }

   public void last() {
      person.copy(registration.last());
      index = registration.size() - 1;
   }
}