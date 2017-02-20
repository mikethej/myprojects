package spacerace;


/**
 * Base class for decoration elements.
 */
public abstract class Decoration extends DynamicElement {

  /**
   * Constructor.
   * @param location Location.
   */
  protected Decoration(Coord2D location) {
    super(location);
  }

}
