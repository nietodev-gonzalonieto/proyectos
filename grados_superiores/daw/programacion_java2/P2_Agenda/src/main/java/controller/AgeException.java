package controller;

public class AgeException extends IllegalArgumentException {
   // Atribut

   private String reason;

   // Constructor

   public AgeException(String reason) {
      this.reason = reason;
   }

   // Metode

   public String getReason() {
      return(reason);
   }
}