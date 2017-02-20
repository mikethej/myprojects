package spacerace.decorations;

import java.awt.Color;
import java.awt.Graphics;

import spacerace.Coord2D;
import spacerace.Decoration;
import spacerace.GameState;
import spacerace.areas.WormHole;

/**
 * Decoration of worm-hole connection.
 */
public final class WormHoleConnection extends Decoration {

	private int alpha = 0;
	private Coord2D exit;

	public WormHoleConnection(WormHole w) {
		super(w.getLocation());
		exit = w.getExit();
	}

	/**
	 * Step, varying alpha.
	 */
	@Override
	public void step(GameState gs) {
		if (alpha <= 100){
			alpha+=10;
		} else {
			alpha = 0;
		}
	}

	@Override
	public void draw(Graphics g) {
		g.setColor(new Color(255, 255, 255, alpha));
		g.fillOval((int)getLocation().getX()-5, (int)getLocation().getY()-5, 10, 10);
		g.fillOval((int)exit.getX()-5, (int)exit.getY()-5, 10, 10);
		g.drawLine((int)getLocation().getX(), (int)getLocation().getY(), (int)exit.getX(), (int)exit.getY());
	}

}
