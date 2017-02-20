package spacerace;


/**
 * Base class for asteroids.
 * @author Eduardo Marques, 
 *
 */
public abstract class Asteroid extends MovingElement {
  
  /**
   * Constructor.
   * @param location Initial location.
   * @param direction Initial direction.
   * @param speed Initial speed.
   */
  protected Asteroid(Coord2D location, double direction, int speed) {
    super(location, direction, speed);
  }
}
