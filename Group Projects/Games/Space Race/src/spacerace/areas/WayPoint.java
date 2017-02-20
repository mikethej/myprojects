package spacerace.areas;

import spacerace.Area;
import spacerace.Coord2D;
import spacerace.GameState;
import spacerace.MovingElement;
import spacerace.Player;
import spacerace.SoundEffect;
import spacerace.decorations.WayPointReached;

public final class WayPoint extends Area {

	private int index;

	public WayPoint(Coord2D location, int index) {
		super(location);
		this.index=index;
	}

	public int getIndex() {
		return index;
	}


	@Override
	public void interactWith(GameState gs, MovingElement e) {
		if (e instanceof Player && ((Player) e).getTargetWayPoint() == this.index){
			((Player) e).advanceToNextWayPoint();
			gs.addDecoration(new WayPointReached(this.getLocation()));
			if(((Player) e).getTargetWayPoint() != gs.numberOfWaypoints()){
				gs.playSound(SoundEffect.WAYPOINT_REACHED);
			} else {
				gs.playSound(SoundEffect.PLAYER_WON);
			}
		}
	}

	/**
	 * Yield way-point index as label.
	 * @return A string for the way-point index.
	 */
	@Override
	public String getLabel() {
		return String.valueOf(getIndex());
	}

}
