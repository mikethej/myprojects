package spacerace;

// TODO A COMPLETAR
public abstract class Player extends MovingElement {

	private int target = 0;

	public Player(Coord2D location, double direction, int referenceSpeed) {
		super(location, direction, referenceSpeed);

	}

	public final int getTargetWayPoint() {
		return target;
	}

	public final void advanceToNextWayPoint() {
		target++;
	}

	/**
	 * Yield target way-point as label.
	 * @return The target way-point as a string.
	 */
	@Override
	public String getLabel() {
		return String.valueOf(getTargetWayPoint());
	}
}
