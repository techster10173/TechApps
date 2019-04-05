public class RunAll {

 public static void main(String[] args)
 {
  int port = 8082;
  
  new AmazonsServer(port,5);
  
  AmazonsClient clientA = new AmazonsClient();
  AmazonsClient clientB = new AmazonsClient();
  
  clientA.registerListener(new MyAIClientListener("ClientA"));
//  clientA.registerListener(new GUIListener());
  
  clientB.registerListener(new RandomAIClientListener("ClientB"));
  
  clientA.connect(port);
  clientB.connect(port);
 }
}
