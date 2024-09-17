package controller;

import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.KeyEvent;
import java.awt.event.KeyListener;

import view.Field;
import view.Button;
import view.Dialog;
import view.Window;
import model.Person;
import model.Registration;

public class Listener implements ActionListener, KeyListener {
   // Atributs

   private boolean replace;

   private Dialog dialog;
   private Window window;
   private Registration registration;

   // Constructor

   public Listener(Registration registration) {
      this.registration = registration;
   }

   // Metodes

   private boolean compare(String[] left, String[] right) {
      int index = 0;

      if(left.length != right.length) {
         return(false);
      }

      while(index < left.length) {
         if(!left[index].equals(right[index])) {
            return(false);
         }

         index++;
      }

      return(true);
   }

   private void first() {
      if(registration.getIndex() > 0) {
         registration.first();
         window.select(registration.getIndex(), registration.getSize(),
               registration.getFields());
      }
   }

   private void previous() {
      if((registration.getIndex() > 0)
            || dialog.askQuestion("Desitja anar al final?")) {
         if(registration.getIndex() > 0) {
            registration.previous();
         } else {
            registration.last();
         }

         window.select(registration.getIndex(), registration.getSize(),
               registration.getFields());
      }
   }

   private void next() {
      if((registration.getIndex() < registration.getSize() - 1)
            || dialog.askQuestion("Desitja anar a l'inici?")) {
         if(registration.getIndex() < registration.getSize() - 1) {
            registration.next();
         } else {
            registration.first();
         }

         window.select(registration.getIndex(), registration.getSize(),
               registration.getFields());
      }
   }

   private void last() {
      if(registration.getIndex() < registration.getSize() - 1) {
         registration.last();
         window.select(registration.getIndex(), registration.getSize(),
               registration.getFields());
      }
   }

   private void help() {
      dialog.showHelp();
   }

   private void insert() {
      replace = false;
      window.insert();
   }

   private void update() {
      replace = true;
      window.update();
   }

   private void delete() {
      if(dialog.askWarning("Desitja esborrar aquesta persona?")) {
         registration.delete();
         dialog.showInformation("Operació realitzada");
         restore();
      }
   }

   private void save() {
      String[] fields;
      Person person = new Person();
      String message = "Operació no realitzada:";
      boolean error = false;

      try {
         fields = window.save();
      } catch(FieldException exception) {
         fields = exception.getFields();
         message += "\nCamps obligatoris";
         error = true;
      }

      try {
         if(!fields[Field.DNI.ordinal()].isEmpty()) {
            person.setDni(fields[Field.DNI.ordinal()]);
         }
      } catch(DNIException exception) {
         fields[Field.DNI.ordinal()] = "";
         message += "\nDNI incorrecte (" + exception.getReason() + ")";
         error = true;
      }

      try {
         if(!fields[Field.AGE.ordinal()].isEmpty()) {
            person.setAge(fields[Field.AGE.ordinal()]);
         }
      } catch(AgeException exception) {
         fields[Field.AGE.ordinal()] = "";
         message += "\nEdat incorrecta (" + exception.getReason() + ")";
         error = true;
      }

      try {
         if(!fields[Field.DNI.ordinal()].isEmpty() && !replace) {
            registration.test(person);
         }
      } catch(DNIException exception) {
         fields[Field.DNI.ordinal()] = "";
         message += "\nDNI incorrecte (" + exception.getReason() + ")";
         error = true;
      }

      if(error) {
         dialog.showError(message);
         window.evaluate(fields);
      } else {
         person.setForename(fields[Field.FORENAME.ordinal()]);
         person.setSurname1(fields[Field.SURNAME1.ordinal()]);
         person.setSurname2(fields[Field.SURNAME2.ordinal()]);

         if(!replace || !compare(fields, registration.getFields())) {
            if(replace) {
               registration.delete();
            }

            registration.add(person);
            dialog.showInformation("Operació realitzada");
         } else {
            dialog.showInformation("Sense canvis");
         }

         window.select(registration.getIndex(), registration.getSize(),
               registration.getFields());
      }
   }

   private void restore() {
      if(registration.getSize() > 0) {
         window.select(registration.getIndex(), registration.getSize(),
               registration.getFields());
      } else {
         window.empty();
      }
   }

   public void setWindow(Window window) {
      this.window = window;
      dialog = new Dialog(window);

      restore();
      window.setVisible(true);
   }

   public void actionPerformed(ActionEvent event) {
      String action = event.getActionCommand();

      window.requestFocus();

      if(action.equals(Button.HELP.getCommand())) {
         help();
      } else if(window.getEditable()) {
         if(action.equals(Button.SAVE.getCommand())) {
            save();
         } else if(action.equals(Button.CANCEL.getCommand())) {
            restore();
         }
      } else {
         if(action.equals(Button.INSERT.getCommand())) {
            insert();
         } else if(registration.getSize() > 0) {
            if(action.equals(Button.UPDATE.getCommand())) {
               update();
            } else if(action.equals(Button.DELETE.getCommand())) {
               delete();
            } else if(registration.getSize() > 1) {
               if(action.equals(Button.FIRST.getCommand())) {
                  first();
               } else if(action.equals(Button.PREVIOUS.getCommand())) {
                  previous();
               } else if(action.equals(Button.NEXT.getCommand())) {
                  next();
               } else if(action.equals(Button.LAST.getCommand())) {
                  last();
               }
            }
         }
      }
   }

   public void keyPressed(KeyEvent event) {
      int key = event.getKeyCode();

      if(key == Button.HELP.getKey()) {
         help();
      } else if(window.getEditable()) {
         if(key == Button.SAVE.getKey()) {
            window.requestFocus();
            save();
         } else if(key == Button.CANCEL.getKey()) {
            window.requestFocus();
            restore();
         }
      } else {
         if(key == Button.INSERT.getKey()) {
            insert();
         } else if(registration.getSize() > 0) {
            if(key == Button.UPDATE.getKey()) {
               update();
            } else if(key == Button.DELETE.getKey()) {
               delete();
            } else if(registration.getSize() > 1) {
               if(key == Button.FIRST.getKey()) {
                  first();
               } else if(key == Button.PREVIOUS.getKey()) {
                  previous();
               } else if(key == Button.NEXT.getKey()) {
                  next();
               } else if(key == Button.LAST.getKey()) {
                  last();
               }
            }
         }
      }
   }

   public void keyReleased(KeyEvent event) {}

   public void keyTyped(KeyEvent event) {}
}