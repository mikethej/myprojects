package spacerace.areas;

import spacerace.Area;
import spacerace.Coord2D;
import spacerace.GameState;
import spacerace.MovingElement;
import spacerace.Player;
import spacerace.SoundEffect;
import spacerace.decorations.Explosion;


// TODO
public final class BlackHole extends Area {

	public BlackHole(Coord2D location) {
		super(location);
	}

	@Override
	public void interactWith(GameState gs, MovingElement e) {
		if(e instanceof Player){
			e.die();
			gs.playSound(SoundEffect.EXPLOSION);
			gs.addDecoration(new Explosion(e.getLocation()));
		}
		
	}

}
