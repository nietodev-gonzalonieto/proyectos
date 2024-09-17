package view;

import java.awt.event.KeyEvent;
import javax.swing.Icon;
import javax.swing.ImageIcon;

public enum Button {
   // Valors

   FIRST("|<", "Primer", KeyEvent.VK_PAGE_UP),
   PREVIOUS("<", "Anterior", KeyEvent.VK_LEFT),
   NEXT(">", "Següent", KeyEvent.VK_RIGHT),
   LAST(">|", "Últim", KeyEvent.VK_PAGE_DOWN),
   HELP("?", "Ajuda", KeyEvent.VK_F1),
   INSERT("Insertar", null, KeyEvent.VK_PLUS),
   UPDATE("Actualitzar", null, KeyEvent.VK_SHIFT),
   DELETE("Esborrar", null, KeyEvent.VK_MINUS),
   SAVE("Guardar", null, KeyEvent.VK_ENTER),
   CANCEL("Cancel·lar", null, KeyEvent.VK_ESCAPE);

   // Atributs

   private String label;
   private String help;
   private int key;

   // Constructor

   private Button(String label, String help, int key) {
      this.label = label;
      this.help = help;
      this.key = key;
   }

   // Metodes

   public String getLabel() {
      return(label);
   }

   public String getHelp() {
      return(help);
   }

   public int getKey() {
      return(key);
   }

   public Icon getIcon() {
      String path = "src/main/resources/icons/";

      return(new ImageIcon(path + name().toLowerCase() + ".png"));
   }

   public String getName() {
      if(help != null) {
         return(help);
      }

      return(label);
   }

   public String getCommand() {
      return(name().toLowerCase());
   }
}