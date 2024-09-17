package data;

import javax.persistence.Entity;
import javax.persistence.Table;
import javax.persistence.Id;
import javax.persistence.Column;

@Entity @Table(name="person") public class PersonDAO {
   // Atributs

   @Id @Column(nullable=false) private String dni;
   @Column(nullable=false) private String forename;
   @Column(nullable=false) private String surname1;
   @Column(nullable=false) private String surname2;
   private int age;

   // Constructor

   public PersonDAO(){
      dni = "";
      forename = "";
      surname1 = "";
      surname2 = "";
      age = 0;
   }

   // Metodes

   public String getDNI() {
      return(dni);
   }

   public void setDni(String dni) {
      this.dni = dni;
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

   public void setAge(int age) {
      this.age = age;
   }
}