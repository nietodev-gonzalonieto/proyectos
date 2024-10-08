package data;

import org.hibernate.Session;
import org.hibernate.SessionFactory;
import org.hibernate.cfg.Configuration;

public class Hibernate {
   // Atribut

   private static final SessionFactory sessionFactory = buildSessionFactory();

   // Metodes

   private static SessionFactory buildSessionFactory() {
      return(new Configuration().configure().buildSessionFactory());
   }

   public static Session open() {
      return(sessionFactory.openSession());
   }

   public static void close() {
      sessionFactory.close();
   }
}