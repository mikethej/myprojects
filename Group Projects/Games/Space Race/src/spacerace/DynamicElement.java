package spacerace;


/**
 * Dynamic element. 
 * 
 * <p>
 * A dynamic element changes its properties over time,
 * and may also die. Subclasses should redefine the {@link #step} method
 * for the element's dynamics.
 * The element dies when {@link #die()}
 * method is called.
 * </p>
 * 
 * @author Eduardo Marques, DI/FCUL, 2015
 *
 */
public abstract class DynamicElement extends GameElement {
  /**
   * Alive flag.
   */
  private boolean alive; 
  
  /**
   * Constructor.
   * @param location Element location.
   */
  protected DynamicElement(Coord2D location) {
    super(location);
    alive = true;
  }
  
  /**
   * Test if element is alive.
   * @return <code>true</code> if the element is alive.
   */
  public final boolean isAlive() {
    return alive;
  }
  
  /**
   * Kill the element.
   */
  public final void die() {
    alive = false;
  }
  
  /**
   * Execute a step.
   * Subclasses should redefine this method
   * to define the elements dynamics if necessary.
   * The base class implementation does nothing.
   * 
   * @param gs Game state.
   */
  public void step(GameState gs) {
    
  }
   
}
