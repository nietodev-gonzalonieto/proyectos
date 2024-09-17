package controller;

public class DNIException extends IllegalArgumentException {
   // Atribut

   private String reason;

   // Constructor

   public DNIException(String reason) {
      this.reason = reason;
   }

   // Metode

   public String getReason() {
      return(reason);
   }
}