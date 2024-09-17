package view;

import java.awt.Color;
import java.awt.Insets;
import java.awt.FlowLayout;
import java.awt.GridLayout;
import java.awt.BorderLayout;
import javax.swing.ImageIcon;
import javax.swing.JComponent;
import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.JLabel;
import javax.swing.JTextField;
import javax.swing.JButton;
import javax.swing.border.EmptyBorder;
import javax.swing.border.BevelBorder;
import javax.swing.border.TitledBorder;
import javax.swing.border.CompoundBorder;

import controller.Listener;
import controller.FieldException;

public class Window extends JFrame {
   // Atributs

   private JLabel subtitle = new JLabel("", JLabel.CENTER);
   private JButton[] arrows1 = new JButton[2];
   private JButton[] arrows2 = new JButton[2];
   private JButton[] actions1 = new JButton[3];
   private JButton[] actions2 = new JButton[2];
   private JTextField[] fields = new JTextField[5];

   private Listener listener;

   // Constructors

   public Window(Listener listener) {
      JPanel content = (JPanel)(getContentPane());
      String path = "src/main/resources/images/";

      this.listener = listener;

      content.setLayout(new BorderLayout());
      content.add(top(), BorderLayout.NORTH);
      content.add(left(), BorderLayout.WEST);
      content.add(center(), BorderLayout.CENTER);
      pack();

      setTitle("Registre de persones");
      setIconImage(new ImageIcon(path + "logo.png").getImage());
      setResizable(false);
      setLocationRelativeTo(null);
      setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
      setFocusable(true);

      addKeyListener(listener);
      listener.setWindow(this);
   }

   private JButton create(Button button) {
      JButton result = new JButton(button.getLabel());

      result.setToolTipText(button.getHelp());
      result.setActionCommand(button.getCommand());
      result.addActionListener(listener);

      return(result);
   }

   private JPanel topLeft() {
      final Button[] BUTTONS = {Button.FIRST, Button.PREVIOUS};

      JPanel panel = new JPanel(new FlowLayout(FlowLayout.RIGHT, 5, 5));
      int index = 0;

      while(index < arrows1.length) {
         arrows1[index] = create(BUTTONS[index]);
         panel.add(arrows1[index]);
         index++;
      }

      return(panel);
   }

   private JPanel topRight() {
      final Button[] BUTTONS = {Button.NEXT, Button.LAST};

      JPanel panel = new JPanel(new FlowLayout(FlowLayout.LEFT, 5, 5));
      int index = 0;

      while(index < arrows2.length) {
         arrows2[index] = create(BUTTONS[index]);
         panel.add(arrows2[index]);
         index++;
      }

      panel.add(create(Button.HELP));

      return(panel);
   }

   private JPanel top() {
      JPanel panel = new JPanel(new BorderLayout());

      panel.setBorder(new CompoundBorder(
            new EmptyBorder(7, 7, 7, 7),
            new CompoundBorder(
                  new BevelBorder(BevelBorder.LOWERED),
                  new EmptyBorder(3, 3, 3, 3))));

      panel.add(topLeft(), BorderLayout.WEST);
      panel.add(subtitle, BorderLayout.CENTER);
      panel.add(topRight(), BorderLayout.EAST);

      return(panel);
   }

   private JPanel left() {
      final Button[] BUTTONS1 = {Button.INSERT, Button.UPDATE, Button.DELETE};
      final Button[] BUTTONS2 = {Button.SAVE, Button.CANCEL};

      JPanel panel = new JPanel(new GridLayout(0, 1));
      int index = 0;

      panel.setBorder(new CompoundBorder(
            new EmptyBorder(5, 5, 5, 5),
            new CompoundBorder(
                  new TitledBorder(new BevelBorder(BevelBorder.LOWERED),
                        "Accions", TitledBorder.CENTER, TitledBorder.TOP),
                  new EmptyBorder(5, 5, 5, 5))));

      while(index < actions1.length) {
         actions1[index] = create(BUTTONS1[index]);
         panel.add(actions1[index]);
         index++;
      }

      panel.add(new JLabel());
      index = 0;

      while(index < actions2.length) {
         actions2[index] = create(BUTTONS2[index]);
         panel.add(actions2[index]);
         index++;
      }

      return(panel);
   }

   private JPanel center() {
      final Field[] FIELDS = {Field.DNI, Field.FORENAME, Field.SURNAME1,
            Field.SURNAME2, Field.AGE};

      JPanel panel = new JPanel(new GridLayout(0, 2));
      int index = 0;

      panel.setBorder(new EmptyBorder(15, 15, 15, 15));

      while(index < fields.length) {
         panel.add(new JLabel(FIELDS[index].getLabel() + ":"));
         fields[index] = new JTextField(12);
         fields[index].setMargin(new Insets(0, 5, 0, 0));
         fields[index].addKeyListener(listener);
         panel.add(fields[index]);
         index++;
      }

      return(panel);
   }

   // Metodes

   private void enable(JComponent[] array, boolean status) {
      int index = 0;

      while(index < array.length) {
         if(array[index] instanceof JTextField) {
            ((JTextField)(array[index])).setEditable(status);
         } else {
            array[index].setEnabled(status);
         }

         index++;
      }
   }

   private void setSubtitle(String subtitle) {
      this.subtitle.setText(subtitle);
   }

   private void setEditable(boolean editable) {
      enable(arrows1, !editable);
      enable(arrows2, !editable);
      enable(actions1, !editable);
      enable(actions2, editable);
      enable(fields, editable);
   }

   public boolean getEditable() {
      return(!actions1[0].isEnabled());
   }

   public void empty() {
      int index = 0;

      setSubtitle("Registre buit");
      enable(arrows1, false);
      enable(arrows2, false);
      enable(actions2, false);
      enable(fields, false);
      actions1[0].setEnabled(true);
      actions1[1].setEnabled(false);
      actions1[2].setEnabled(false);

      while(index < fields.length) {
         fields[index].setBackground(Color.WHITE);
         fields[index].setText("");
         index++;
      }
   }

   public void select(int person, int size, String[] results) {
      int index = 0;

      setSubtitle("Persona " + (person + 1) + " de " + size);
      setEditable(false);

      if(size == 1) {
         enable(arrows1, false);
         enable(arrows2, false);
      }

      while(index < fields.length) {
         fields[index].setBackground(Color.WHITE);
         fields[index].setText(results[index]);
         index++;
      }
   }

   public void insert() {
      int index = 0;

      setSubtitle("Insertar persona");
      setEditable(true);

      while(index < fields.length) {
         fields[index].setText("");
         index++;
      }

      fields[0].requestFocus();
   }

   public void update() {
      setSubtitle("Actualitzar persona");
      setEditable(true);

      fields[0].requestFocus();
   }

   public String[] save() throws FieldException {
      String[] results = new String[fields.length];
      int index = 0;
      boolean error = false;

      while(index < results.length) {
         results[index] = fields[index].getText().trim();

         if(results[index].isEmpty()) {
            error = true;
         }

         index++;
      }

      if(error) {
         throw(new FieldException(results));
      }

      return(results);
   }

   public void evaluate(String[] errors) {
      int index = fields.length - 1;

      while(index >= 0) {
         if(errors[index].isEmpty()) {
            fields[index].setBackground(Color.PINK);
            fields[index].requestFocus();
         } else {
            fields[index].setBackground(Color.WHITE);
         }

         index--;
      }
   }
}