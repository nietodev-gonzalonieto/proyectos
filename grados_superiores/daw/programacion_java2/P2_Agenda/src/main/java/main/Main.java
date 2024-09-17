package main;

import model.Registration;
import controller.Listener;
import view.Window;

public class Main {
   public static void main(String[] arguments) {
      Registration registration = new Registration(false);
      Listener listener = new Listener(registration);
      Window window = new Window(listener);
   }
}