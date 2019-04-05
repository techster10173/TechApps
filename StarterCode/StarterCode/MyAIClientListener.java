import netgame.client.Client;

import java.awt.*;
import java.util.ArrayList;
import java.util.LinkedList;
import java.util.List;

public class MyAIClientListener extends AIClientListener {

    public MyAIClientListener(String name) {
        super(name);
    }

    @Override
    public void yourTurn(AmazonsRules rules, Client<AmazonsState, AmazonsRules> client) {
        //pick a random, legal move
        //request it from the server
        AmazonsState state = rules.getState();
        List<String> moves = new LinkedList<>();
        ArrayList<Integer> list = new ArrayList<Integer>();

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
                                list.add(getScore(toX, toY, fromX, fromY));
                                moves.add(fromX + C.SPACE + fromY + C.SPACE + toX + C.SPACE + toY + C.SPACE + shootX + C.SPACE + shootY);
                            }
                        }
                    }
                }
            }
        }

        //pick a random move
        client.send(C.MOVE + C.SPACE + moves.get(getHighestScoreIndex(list)));
    }

    public Integer getScore(int x, int y, int fx, int fy){
        return Math.abs((fx-x)*(fy-y));
    }
    public int getHighestScoreIndex(ArrayList<Integer> temp){
        if ( temp == null || temp.size() == 0 ) return -1; // null or empty

        int largest = 0;
        for ( int i = 1; i < temp.size(); i++ )
        {
            if ( temp.get(i) > temp.get(largest)) largest = i;
        }
        return largest; // position of the first largest found
    }

    @Override
    public void gameover(String reason) {
        System.out.println("gameover: " + reason);
    }
}




