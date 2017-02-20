package spacerace.asteroids;

import spacerace.Asteroid;
import spacerace.Coord2D;
import spacerace.GameState;

// TODO
public final class OrbitalAsteroid extends Asteroid {

	private double orbita;
	
	public OrbitalAsteroid(Coord2D location, double orbitStep, int speed) {
		super(location, orbitStep, speed);
		orbita = orbitStep;
	}

	public void step(GameState gs){
		this.setDirection(this.getDirection()+orbita);
	}
}

