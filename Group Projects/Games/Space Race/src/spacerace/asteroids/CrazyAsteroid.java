package spacerace.asteroids;

import spacerace.Asteroid;
import spacerace.Coord2D;
import spacerace.GameState;


// TODO 
public final class CrazyAsteroid extends Asteroid {
	
	private int steps=0;

	public CrazyAsteroid(Coord2D location, double direction, int speed) {
		super(location, direction, speed);
	}
	
	public void step(GameState gs){
		if(steps == 100){
			this.setDirection(Math.random()*360);
			steps = 0;
		}
		++steps;
	}

}
