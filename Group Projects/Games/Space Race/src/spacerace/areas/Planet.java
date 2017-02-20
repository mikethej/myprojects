package spacerace.areas;

import spacerace.Area;
import spacerace.Coord2D;
import spacerace.GameState;
import spacerace.MovingElement;
import spacerace.SoundEffect;




public final class Planet extends Area {

	public Planet(Coord2D location) {
		super(location);
	}

	@Override
	public void interactWith(GameState gs, MovingElement e) {
		e.setDirection(e.getDirection()-180);
		gs.playSound(SoundEffect.COLLISION);
	}
	
}
