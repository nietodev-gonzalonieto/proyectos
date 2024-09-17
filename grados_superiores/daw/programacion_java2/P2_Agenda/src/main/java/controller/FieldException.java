package controller;

public class FieldException extends IllegalArgumentException {
   // Atribut

   private String[] fields;

   // Constructor

   public FieldException(String[] fields) {
      this.fields = fields;
   }

   // Metode

   public String[] getFields() {
      return(fields);
   }
}