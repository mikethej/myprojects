package spacerace;


/**
 * Representation of an area in the game.
 */
public abstract class Area extends GameElement {
  
  /**
   * Constructor.
   * @param location Area location.
   */
  protected Area(Coord2D location) {
    super(location);
  }

  /**
   * Interact with a moving element.
   * @param gs Game state.
   * @param e Moving element.
   */
  public abstract void 
  interactWith(GameState gs, MovingElement e);
  

}
