package
import java.util.Scanner;

public class Act2 {	
public static void main(String []args) {
	Scanner sc= new Scanner(System.in);
	//1.Divisores
		int n= LeeNum1();
		int operacio= odivisor(n);
		imprimir(operacio);
		
	//2.Equaciones segundo grado
		int a= LeeNum();
		int b= LeeNum();
		int c= LeeNum();
		double x1= xp(a,b,c);
		double x2 = xs(a,b,c);
		imprimir(x1,x2);
		
	//3.4.Amigos y Perfectos
		 System.out.print("Digues un valor: ");
	        int resultado = sc.nextInt();
	        System.out.print("Digues un altre valor: ");
	        int resultado2 = sc.nextInt();
	        int total = Calculo(resultado);
	        System.out.println("El resultat total:" + total);
	        if (Perfecto(resultado)==true) {
	            System.out.println("El numero es perfecte!!");
	        } else {
	            System.out.println("El numero no es perfecte!!");
	        	}
     //AMIGOS 
	        if (Amigos(resultado,resultado2)==true) {
	        	System.out.println("El numero "+resultado+" y el num "+ resultado2+" son amigos :)");
	        }else
	        	System.out.println("El numero "+resultado+" y el num "+ resultado2+" NO son amigos :(");
	
	 //5. MaximComuDivisor
	        System.out.println("El mcd de "+ resultat + " i " +resultat2+ " es " +mcd(resultat1,resultat2)); 
	
	 //6.Vocal
	       System.out.print("Diguem una lletra");
	       char lletra = sc.next().charAt(0);
	       if(vocals(lletra)) {
	    	   System.out.println("Tens una vocal");
	       }else {
	    	   System.out.println("NO tens cap vocal");
	       }
	 //7.Vocal caracter
	     System.out.println("El numero de vocals es "+caracter());  
	 
	 //8.Reloj
	     System.out.println("Donam les hores:");
	     	int hora=sc.nextInt();
	     System.out.println("Donam els minuts:");
	     	int min=sc.nextInt();
	     System.out.println("Donam els segons:");
	     	int sec=sc.nextInt();
	     	
	     System.out.println("La hora que has introduit son: "+hminsec(hora,min,sec));
	     
	//9.Hores Minuts Segons     
}

//1.DIVISORES
	public static int LeeNum1(){
		Scanner sc= new Scanner(System.in);
		System.out.println("Diguem el valor (i clica Enter)");
		int n = sc.nextInt();
		return n;	
	}
	
	public static int odivisor(int n){
		  int contador=0;
	        for (int i = 1 ; i <= n ; i++)
	        {
	        	
	            if (n % i == 0)
	            {
	               
	                contador=contador+i;
	            }
	        }
	        return contador;
	 }
	 public static void imprimir(int operacio) {
		    System.out.println("El resultat es  "+operacio);
		   
		  
	 } 
	 
//2.Equaciones
	 public static int LeeNum(){
	    	Scanner sc= new Scanner(System.in);
	    	System.out.println("Diguem el valors a, b , c  (cada cop que introdueixis un valor clica Enter)");
	    	int num = sc.nextInt();
	    	return num;	
	    }
	    public static double xp(int a, int b,int c){
	    	
	    	double x1 = (-b + Math.sqrt((b*b)-(4*a*c)))/(2*a);	
	    	return x1;
	    }
	    public static double xs(int a,int b,int c) {
	    	
	    	double x2 = (-b - Math.sqrt((b*b)-(4*a*c)))/(2*a);
	    	return x2;
	    }
	    public static void imprimir(double x1 , double x2) {
	    System.out.println("La solució de x1 es"+x1);
	    System.out.println("La solució de x2 es"+x2);	
	    	} 
	    
//3.4.Amigos y Perfectos
	    public static int Calculo(int resultado) {
	        int total = 0;

	        for (int i = 1; i <= resultado; i++) {
	            int divisores = resultado % i;
	            if (divisores == 0) {
	                total = total + i;
	            }
	        }
	        return total;
	    }
	   
	    public static boolean Perfecto(int resultado) {
	        boolean perf=false;
	        if((Calculo(resultado)-resultado)== resultado) {
	            perf=true;
	        }
	        return perf;
	    }
	    public static boolean Amigos (int resultado,int resultado2) {
	    	boolean amigos=false;
	    	if(((Calculo(resultado)-resultado)==resultado2) && (Calculo(resultado2)-resultado2)==resultado) {
	    		amigos=true;
	    	}
	    	return amigos;
	    }
	    
//5.MaximComuDivisor
	    public static int mcd(int resultat, int resultat2) {
	    	boolean mcdivisor = false;
	    		int resposta=0;
	    		while(!mcdivisor) {
	    			resposta = resultat % resultat2;
	    	if(resposta == 0){
	    		mcdivisor = true;
	    	}else{
	    		resultat=resultat2;
	    		resultat2=resposta;
	    	}
	    		}
	    	return resultat2;
	    }
	    
//6.Vocals Caracters
	    public static boolean vocals(char lletra) {
	    	boolean vocal = false;
	    	if(lletra=='a'||lletra=='e'|| lletra=='i'||lletra=='o'||lletra=='u'||lletra=='A'||lletra=='E'|| lletra=='I'||lletra=='O'||lletra=='U'){
	    	 vocal =true;	
	    	}
	    	return vocal;
	    }
	    
//7. Caracter = 0	    
	   public static int caracter() {    
		   Scanner sc= new Scanner(System.in);
		   boolean cont=false;
		   int contv = 0;
		  
		   while(!cont) {
			   System.out.print("Diguem una lletra");
			   char lletra = sc.next().charAt(0);
			   if(vocals(lletra)) {
				   contv++;
				   
		   }if (lletra=='0') {
			   cont=true;
		   	}
	
	       }
		   return contv;
	   }
	   
//8.Hora Segons Minuts	
	   public static int hminsec(int hora,int min,int sec) { 
		   Scanner sc= new Scanner(System.in);
		   
		   int segon1 = hora*3600;
		   int segon2 = min*60;
		   int segons = segon1 + segon2 + sec;
		   return segons;
	   }

//9. Hora Segons Minuts V2	   
	   public static String hminsec2() { 
		   
	   }
}
