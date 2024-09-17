package view;

import java.awt.GridLayout;
import javax.swing.Icon;
import javax.swing.ImageIcon;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.JLabel;

public class Dialog extends JOptionPane {
   // Atribut

   private Window parent;

   // Constructor

   public Dialog(Window parent) {
      this.parent = parent;
   }

   // Metodes

   public boolean askQuestion(String message) {
      int result = showConfirmDialog(parent, message, "Pregunta",
            JOptionPane.YES_NO_OPTION);

      return(result == JOptionPane.YES_OPTION);
   }

   public boolean askWarning(String message) {
      int result = showConfirmDialog(parent, message, "Advertència",
            JOptionPane.YES_NO_OPTION, JOptionPane.WARNING_MESSAGE);

      return(result == JOptionPane.YES_OPTION);
   }

   public void showError(String message) {
      showMessageDialog(parent, message, "Error", JOptionPane.ERROR_MESSAGE);
   }

   public void showInformation(String message) {
      showMessageDialog(parent, message, "Informació",
            JOptionPane.INFORMATION_MESSAGE);
   }

   public void showHelp() {
      final Button[] BUTTONS = Button.values();

      GridLayout grid = new GridLayout(0, 2);
      JPanel panel = new JPanel();
      String path = "src/main/resources/images/";
      int index = 0;

      grid.setHgap(15);
      grid.setVgap(5);
      panel.setLayout(grid);

      while(index < BUTTONS.length) {
         panel.add(new JLabel(BUTTONS[index].getName(),
               BUTTONS[index].getIcon(), JLabel.LEFT));
         index++;
      }

      panel.add(new JLabel());
      panel.add(new JLabel("© Vice-Soft, 2018"));

      showMessageDialog(parent, panel, "Ajuda", JOptionPane.INFORMATION_MESSAGE,
            (Icon)(new ImageIcon(path + "logo.png")));
   }
}