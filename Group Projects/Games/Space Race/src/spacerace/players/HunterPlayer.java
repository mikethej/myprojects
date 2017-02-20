package spacerace.players;

import spacerace.AIPlayer;
import spacerace.Bullet;
import spacerace.Coord2D;
import spacerace.GameState;

/**
 * 
 * extra
 *
 */

public class HunterPlayer extends AIPlayer{
	
	private int steps;

	public HunterPlayer(Coord2D location, double direction, int referenceSpeed) {
		super(location, direction, referenceSpeed);
	}

	@Override
	public void step(GameState gs) {
		if(steps == 50){
			
			if(gs.getHumanPlayer().isAlive()){
				
				double dir = this.getLocation().directionTo(gs.getHumanPlayer().getLocation());
				
				gs.addBullet(new Bullet(this.getLocation(), dir, 15));
			}
			
			this.setDirection(Math.random()*360);
			steps = 0;

		}
		++steps;

	}

}
