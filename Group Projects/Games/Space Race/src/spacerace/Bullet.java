package spacerace;

import spacerace.decorations.Explosion;

/**
 * 
 * extra
 *
 */

public class Bullet extends MovingElement{
	
	private int steps;

	public Bullet(Coord2D location, double direction, int speed) {
		super(location, direction, speed);
	}

	@Override
	public void step(GameState gs) {
		if (steps != 50){
			steps++;
		} else {
			this.die();
			gs.playSound(SoundEffect.EXPLOSION);
			gs.addDecoration(new Explosion(this.getLocation()));
		}
	}
}
