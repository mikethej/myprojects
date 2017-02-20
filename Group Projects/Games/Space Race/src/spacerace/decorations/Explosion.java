package spacerace.decorations;

import spacerace.Coord2D;
import spacerace.Decoration;
import spacerace.GameState;

/**
 * Class for explosion.
 *
 */
public final class Explosion extends Decoration {

  /**
   * Duration of explosion.
   */
  private static final int EXPLOSION_DURATION = 10;
  
  /**
   * Count-down timer.
   */
  private int timeLeft;
  
  /**
   * Constructor.
   * @param location Location of the explosion.
   */
  public Explosion(Coord2D location) {
    super(location);
    timeLeft = EXPLOSION_DURATION;
  }

  /**
   * Explosion step. 
   */
  @Override
  public void step(GameState gs) {
    timeLeft --;
    if (timeLeft == 0) {
      super.die();
    }
  }

}
