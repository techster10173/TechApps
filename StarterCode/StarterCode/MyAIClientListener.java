import netgame.client.Client;

public class MyAIClientListener extends AIClientListener {

    public MyAIClientListener() {

    }

    @Override
    public void yourTurn(AmazonsRules rules, Client<AmazonsState, AmazonsRules> client) {
        //pick a random, legal move
        //request it from the server
        AmazonsState state = rules.getState();
        List<String> moves = new LinkedList<>();

        for (Point piece : state.getPieces(this.getMyPlayerNumber())) {
            if (null == piece) {
                System.out.println("Missing piece...");
                continue;
            }
            int fromX = piece.x;
            int fromY = piece.y;

            for (int toX = 0; toX < 10; toX++) {
                for (int toY = 0; toY < 10; toY++) {
                    for (int shootX = 0; shootX < 10; shootX++) {
                        for (int shootY = 0; shootY < 10; shootY++) {
                            if (rules.canMove(fromX, fromY, toX, toY, shootX, shootY)) {
                                moves.add(fromX + C.SPACE + fromY + C.SPACE + toX + C.SPACE + toY + C.SPACE + shootX + C.SPACE + shootY);
                            }
                        }
                    }
                }
            }
        }

        //pick a random move
        Collections.shuffle(moves);
        client.send(C.MOVE + C.SPACE + moves.get(0));
    }

    public int score(){
        int score = 0;
        if()
    }

    @Override
    public void gameover(String reason) {
        System.out.println("gameover: " + reason);
    }
}




