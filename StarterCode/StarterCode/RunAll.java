public class RunAllq {

 public static void main(String[] args)
 {
  int port = 8082;
  
  new AmazonsServer(port);
  
  AmazonsClient clientA = new AmazonsClient();
  AmazonsClient clientB = new AmazonsClient();
  
  clientA.registerListener(new MyAIClientListener("ClientA"));
  clientA.registerListener(new GUIListener());
  
  clientB.registerListener(new RandomAIClientListener("ClientB"));
  
  clientA.connect(port);
  clientB.connect(port);
 }
}