package spacerace.areas;

import java.awt.Graphics;

import spacerace.Area;
import spacerace.Constants;
import spacerace.Coord2D;
import spacerace.GameState;
import spacerace.MovingElement;

/**
 * Empty area (ALREADY PROVIDED).
 */
public final class EmptyArea extends Area {

  /**
   * Constructor. 
   * @param location Empty area location.
   */
  public EmptyArea(Coord2D location) {
    super(location);
  }

  /**
   * Draw the empty area.
   * @param g Graphics object for drawing.
   */
  public void draw(Graphics g) {
    // DRAW NOTHING
    // BASE IMPLEMENTATION WOULD ATTEMPT 
    // TO DRAW AN ICON.
     
  }
  /**
   * Interact with moving element.
   * The interaction has no effect.
   * @param e Moving element.
   */
  @Override
  public void interactWith(GameState gs, MovingElement e) {
    e.setMaximumSpeed(Constants.MAX_SPEED);
  }

}
