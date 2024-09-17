package view;

public enum Field {
   // Valors

   DNI("DNI"),
   FORENAME("Nom"),
   SURNAME1("1er cognom"),
   SURNAME2("2on cognom"),
   AGE("Edat");

   // Atribut

   private String label;

   // Constructor

   private Field(String label) {
      this.label = label;
   }

   // Metode

   public String getLabel() {
      return(label);
   }
}