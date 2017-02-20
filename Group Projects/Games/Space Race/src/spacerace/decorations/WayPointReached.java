package spacerace.decorations;

import java.awt.Color;
import java.awt.Graphics;

import spacerace.Coord2D;
import spacerace.Decoration;
import spacerace.GameState;


// TODO
public class WayPointReached extends Decoration {
	
	private int timer = 20;

	public WayPointReached(Coord2D location) {
		super(location);
		// TODO Auto-generated constructor stub
	}

	@Override
	public void step(GameState gs) {
		if (timer != 0){
			timer--;
		} else {
			this.die();
		}
	}
	
	@Override
	public void draw(Graphics g) {
		if(timer%2 == 0){
			g.setColor(new Color(0, 128, 0, 50));
		} else {
			g.setColor(new Color(0, 128, 0, 10));
		}
		g.fillOval((int)getLocation().getX()-25, (int)getLocation().getY()-25, 50, 50);
	}


}

