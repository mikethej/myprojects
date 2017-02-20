package spacerace.players;

import spacerace.Bullet;
import spacerace.Constants;
import spacerace.Coord2D;
import spacerace.GameState;
import spacerace.Player;
import spacerace.SecondHumanPlayerCommand;

public class SecondHumanPlayer extends Player {

	public SecondHumanPlayer(Coord2D location, double direction) {
		super(location, direction, 0);
	}
 
	public final void handleCommand(SecondHumanPlayerCommand c, GameState gs) {
		switch(c) {
	      	case SPEED_UP:
	      		if (getSpeed() < Constants.MAX_SPEED) {
	      			setReferenceSpeed(getSpeed() + 1);
	      		}
	      		break;
	      	case SPEED_DOWN:
	      		if (getSpeed() > 0) {
	      			setReferenceSpeed(getSpeed() - 1);
	      		}
	      		break;
	      	case TURN_LEFT:
	      		setDirection(getDirection() - 10 );
	      		break;
	      	case TURN_RIGHT:
	      		setDirection(getDirection() + 10 );
	      		break;
	        case FIRE:
	        	gs.addBullet(new Bullet(this.getLocation().displace(Constants.ELEM_WIDTH * 1.1, getDirection()), getDirection(), 15));
	        	break; 
		}
	}
}
