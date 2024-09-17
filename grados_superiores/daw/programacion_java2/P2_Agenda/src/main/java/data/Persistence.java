package data;

import java.util.List;
import javax.persistence.Query;
import org.hibernate.Session;

import model.Person;

public class Persistence {
   // Atributs

   private static PersonDAO personDao = new PersonDAO();

   // Metodes

   public static void add(Person person) {
      Session session = Hibernate.open();

      session.beginTransaction();
      personDao.setDni(person.getDni());
      personDao.setForename(person.getForename());
      personDao.setSurname1(person.getSurname1());
      personDao.setSurname2(person.getSurname2());
      personDao.setAge(Integer.valueOf(person.getAge()));
      session.save(personDao);
      session.getTransaction().commit();
      session.close();
   }

   public static void delete(Person person) {
      Session session = Hibernate.open();

      session.beginTransaction();
      personDao.setDni(person.getDni());
      personDao.setForename(person.getForename());
      personDao.setSurname1(person.getSurname1());
      personDao.setSurname2(person.getSurname2());
      personDao.setAge(Integer.valueOf(person.getAge()));
      session.delete(personDao);
      session.getTransaction().commit();
      session.close();
   }

   public static List<PersonDAO> list() {
      List<PersonDAO> result;
      Session session = Hibernate.open();
      Query query = session.createQuery("FROM PersonDAO");

      result = query.getResultList();
      session.close();

      return(result);
   }
}