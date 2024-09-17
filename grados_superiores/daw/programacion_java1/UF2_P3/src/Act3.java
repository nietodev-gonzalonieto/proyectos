import java.util.Scanner;
import java.util.ArrayList;

/**
* @author gonzaloNM
*/

public class Act3 {
	 public static Scanner scanner=new Scanner(System.in);
	    public static void main(String args[]){
	        
	    	System.out.print("Introdueix el numero de jugadors ");
	        int jugadors=scanner.nextInt(); 					//Num de jugadors
	        
	        System.out.print("Introdueix el numero de forats: ");
	        int forats=scanner.nextInt(); 						//Num de forats
	        
	        ArrayList<int[]> punts=njugadors(jugadors); 		//Lista puntuacions dels jugador
	        int hoyos[]=nHoyos(forats); //Lista distanciaancias de forats
	        
	        for (int h=0; h<hoyos.length; h++){
	        	
	            	System.out.println("Forat "+(h+1)+"("+hoyos[h]+"metres)");
	            	
	            for (int p=0; p<punts.size(); p++){
	                System.out.println("***********");
	                
	                System.out.println("Jugador "+(p+1));
	                int llancaments=juego(hoyos[h]);
	                punts.get(p)[0]=punts.get(p)[0]+llancaments;
	                
	                
	                if(punts.get(p)[4]==0 || llancaments<punts.get(p)[4]){
	                    punts.get(p)[4]=llancaments;
	                    punts.get(p)[1]=h;
	                }
	                
	                if(punts.get(p)[5]==0 || llancaments>punts.get(p)[5]){
	                    punts.get(p)[5]=llancaments;
	                    punts.get(p)[2]=h;
	                }
	            }
	        }
	        resultados(punts);
	    }
	    //jugadors nuevos
	    public static ArrayList<int[]> njugadors (int j){
	    	
	        ArrayList<int[]> punts=new ArrayList<>();
	        
	        for (int i=0; i<j; i++){
	        		punts.add(new int[6]);
	            for (int x=0; x<punts.get(i).length; x++){
	                punts.get(i)[x]=0;
	            }
	            	punts.get(i)[3]=i;
	        }
	        return punts;
	
	    }
	    // Els forats nous
	    
	    public static int[] nHoyos(int o){
	        int hoyos []=new int [o];
	        System.out.println("Introdueix la distanciaancia dels forats en m");
	        
	        for (int i=0; i<hoyos.length; i++){
	            System.out.print((i+1)+": ");
	           
	            int hoyo=scanner.nextInt();
	            
	            while(hoyo<200 || hoyo>400){
	                System.out.println("La distanciaancia ha de ser entre 200-400");
	                
	                System.out.print("Introdueix la distanciaancia: ");
	               
	                hoyo=scanner.nextInt();
	            }
	            	hoyos[i]=hoyo;
	        }
	        return hoyos;
	    }
	    //Partida
	    public static int juego(int distancia){
	        int contador=0,llancament;
	        do{
	            System.out.println("***********");
	            if (distancia<50){
	                System.out.println("distanciaancia: "+Math.abs(distancia));
	                System.out.println("Pal");
	                System.out.println("1.Put(50m)");
	                System.out.print("llancament: ");
	                if (Math.floor(Math.random()*(1-0+1)+0)==1){
	                    System.out.println("entra.");
	                    distancia=0;
	                } else{
	                    System.out.println("falla.");
	                }
	            } else {
	                System.out.println("distanciaancia: "+Math.abs(distancia)+"m");
	                
	                System.out.println("Elige el palo");
	                
	                System.out.print("1.Driver(220m) // 2.Madera(170m) // 3.Hierro(100m): ");
	                
	                int palo=scanner.nextInt();
	                
	                while (palo<1 || palo>3){
	                    System.out.print("Valor incorrecto. Elige un palo: ");
	                    palo=scanner.nextInt();
	                }
	                switch (palo){
	                
	                    case 1:
	                        llancament=(int)Math.floor(Math.random()*((220*1.2)-(220*0.8)+1)+(220*0.8));
	                        System.out.println("llancament: "+llancament);
	                        distancia=distancia-llancament;
	                        break;
	                    
	                    case 2:
	                        llancament=(int)Math.floor(Math.random()*((170*1.2)-(170*0.8)+1)+(170*0.8));
	                        System.out.println("llancament: "+llancament);
	                        distancia=distancia-llancament;
	                        break;
	                    
	                    case 3:
	                        llancament=(int)Math.floor(Math.random()*((100*1.2)-(100*0.8)+1)+(100*0.8));
	                        System.out.println("llancament: "+llancament);
	                        distancia=distancia-llancament;
	                        break;
	                }
	            }
	            contador++;
	        }while (distancia!=0);
	        return contador;
	    }
	    //Mostrar los resultados
	    public static void resultados (ArrayList<int[]> punts){
	        System.out.println("********");
	        
	        System.out.println("RESULTATS: ");
	        
	        for (int i=0;i<punts.size(); i++){
	            
	        	for (int j=i+1;j<punts.size(); j++){
	               
	            	if (punts.get(i)[0] > punts.get(j)[0]){
	                   
	            		int temp[]=new int [punts.get(0).length];
	                    temp=punts.get(i);
	                    punts.set(i, punts.get(j));
	                    punts.set(j, temp);
	                }
	            }
	        }
	        
	        for(int i=0; i<punts.size(); i++){
	        	
	            System.out.println("P"+(i+1)+".:Jugador "+ (punts.get(i)[3]+1));
	            System.out.println(" numero de cops: "+punts.get(i)[0]);
	            System.out.println(" Forats amb menys cops donats: "+(punts.get(i)[1]+1));
	            System.out.println(" Forats amb mes cops donats: "+(punts.get(i)[2]+1));
	        
	        }
	    }
}
