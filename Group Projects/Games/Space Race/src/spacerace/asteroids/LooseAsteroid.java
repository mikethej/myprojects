package spacerace.asteroids;

import spacerace.Asteroid;
import spacerace.Coord2D;

/**
 * Loose asteroid element (ALREADY PROVIDED).
 */
public final class LooseAsteroid extends Asteroid {

  /**
   * Constructs a loose asteroid.
   * @param location Location.
   * @param direction Initial direction.
   * @param referenceSpeed Reference speed.
   */
  public LooseAsteroid(Coord2D location, double direction, int referenceSpeed) {
    super(location, direction, referenceSpeed);
  }
}
