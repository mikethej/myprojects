package spacerace;


/**
 * AI player abstract class.
 * 
 * @author Eduardo Marques, DI/FCUL, 2015
 *
 */
public abstract class AIPlayer extends Player {

  /**
   * Constructor.
   * @param location Initial location.
   * @param direction Initial direction.
   * @param referenceSpeed Reference speed.
   */
  public AIPlayer(Coord2D location, double direction, int referenceSpeed) {
    super(location, direction, referenceSpeed);
  }
}
