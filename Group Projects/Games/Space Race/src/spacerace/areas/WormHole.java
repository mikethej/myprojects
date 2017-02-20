package spacerace.areas;

import spacerace.Area;
import spacerace.Constants;
import spacerace.Coord2D;
import spacerace.GameState;
import spacerace.MovingElement;
import spacerace.SoundEffect;

// TODO
public final class WormHole extends Area {

	private Coord2D exit;

	public WormHole(Coord2D location, Coord2D exit) {
		super(location);
		this.exit = exit;
	}

	public Coord2D getExit() {
		return exit;
	}

	@Override
	public void interactWith(GameState gs, MovingElement e) {
		e.setLocation(exit.displace(Constants.ELEM_WIDTH * 1.1, e.getDirection()));
		gs.playSound(SoundEffect.ENTER_WORMHOLE);
	}
}
