package spacerace.decorations;

import java.awt.Color;
import java.awt.Graphics;

import spacerace.Coord2D;
import spacerace.Decoration;
import spacerace.GameState;

// TODO
public final class Trail extends Decoration {

	private int raio = 20;

	public Trail(Coord2D location) {
		super(location);
	}


	@Override
	public void step(GameState gs) {
		if (raio != 0){
			raio--;
		} else {
			this.die();
		}
	}


	@Override
	public void draw(Graphics g) {
		g.setColor(new Color(0, 128, 0, raio));
		g.fillOval((int)getLocation().getX()-10, (int)getLocation().getY()-10, raio, raio);
	}

}
