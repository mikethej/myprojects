package spacerace.players;

import spacerace.AIPlayer;
import spacerace.Coord2D;
import spacerace.GameState;
import spacerace.areas.Dust;
import spacerace.areas.EmptyArea;

// TODO
public final class CrazyPlayer extends AIPlayer {

	private int steps;

	public CrazyPlayer(Coord2D location, double direction, int referenceSpeed) {
		super(location, direction, referenceSpeed);
	}

	@Override
	public void step(GameState gs) {
		if(steps == 50){
			if(gs.getArea(this.getLocation()) instanceof EmptyArea){
				gs.addArea(new Dust(this.getLocation()));
			}
			this.setDirection(Math.random()*360);
			steps = 0;
		}
		++steps;
	}
}

