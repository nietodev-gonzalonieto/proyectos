package model;

import controller.DNIException;

public class DNI {
   // Atribut

   private final String[] LETTERS = {"T", "R", "W", "A", "G", "M", "I", "F",
         "P", "D", "X", "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K",
         "E", "T"};

   private int number;
   private String letter;

   // Constructor

   public DNI() {
      number = 0;
      letter = LETTERS[0];
   }

   // Metodes

   public String getDni() {
      String buffer = String.valueOf(number);

      while(buffer.length() < 8) {
         buffer = "0" + buffer;
      }

      return(buffer + letter);
   }

   public void setDni(String dni) throws DNIException {
      String buffer = dni.substring(0, dni.length() - 1);

      if(!buffer.matches("\\d+[-\\s]?")) {
         throw(new DNIException("format"));
      }

      if(!buffer.matches("\\d+")) {
         buffer = buffer.substring(0, buffer.length() - 1);
      }

      number = Integer.valueOf(buffer);

      if(number >= Math.pow(10, 8)) {
         throw(new DNIException("nombre"));
      }

      letter = dni.substring(dni.length() - 1).toUpperCase();

      if(!letter.equals(LETTERS[number % 23])) {
         throw(new DNIException("lletra"));
      }
   }
}