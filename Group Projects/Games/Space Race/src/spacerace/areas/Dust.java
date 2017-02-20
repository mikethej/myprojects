package spacerace.areas;

import spacerace.Area;
import spacerace.Constants;
import spacerace.Coord2D;
import spacerace.GameState;
import spacerace.MovingElement;


// TODO
public final class Dust extends Area {

	public Dust(Coord2D location) {
		super(location);
	}

	@Override
	public void interactWith(GameState gs, MovingElement e) {
		e.setMaximumSpeed(Constants.MAX_SPEED_IN_DUST);
	}
	
}

