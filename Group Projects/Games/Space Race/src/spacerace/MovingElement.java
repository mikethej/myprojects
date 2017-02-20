package spacerace;

import java.awt.Color;
import java.awt.Graphics;

/**
 * Moving element. 
 * 
 * @author Eduardo Marques, DI/FCUL, 2015
 *
 */
public abstract class MovingElement extends DynamicElement {
  
  /**
   * Color used for "direction circle".
   */
  private static final Color DIRECTION_COLOR = new Color(255,255,255,50);

  /**
   * Current speed.
   */
  private int speed;
  
  /**
   * Target speed.
   */
  private int referenceSpeed;
  
  /**
   * Maximum speed (determined by area).
   */
  private int maxSpeed;
  
  /**
   * Current direction.
   */
  private double direction;
  
  /**
   * Constructor, assuming an initial speed of 0.
   * @param location Initial location.
   * @param initialDirection Initial direction.
   */
  protected MovingElement(Coord2D location, double initialDirection) {
    this(location, initialDirection, 0);
  }
  
  /**
   * Constructor, assuming maximum initial speed.
   * @param location Initial location.
   * @param direction Initial direction.
   * @param speed Initial speed & reference speed.
   */
  protected MovingElement
  (Coord2D location, double direction, int speed) {
    super(location);
    setSpeed(speed);
    setReferenceSpeed(speed);
    setMaximumSpeed(Constants.MAX_SPEED);
    setDirection(direction);
  }

  /**
   * Change direction.
   * @param d New direction in degrees.
   */
  public void setDirection(double d) {
    direction = d % 360.0;
  }

  /**
   * Set speed (unconditionally).
   * @param s Speed value.
   */
  final void setSpeed(int s) {
    speed = s;
  }
  
  /**
   * Update element position.
   */
  final void updatePosition() {
    int targetSpeed = Math.min(referenceSpeed, maxSpeed);
    if (speed < targetSpeed) {
      speed++;
    } else if (speed > targetSpeed) {
      speed--;
    }
    Coord2D p = getLocation().displace(speed, direction);
    double x = p.getX();
    double y = p.getY();
    if (x < 0) {
      x = Constants.GAME_AREA_LENGTH + x;
    } else if (x > Constants.GAME_AREA_LENGTH) {
      x = x - Constants.GAME_AREA_LENGTH;
    }
    if (y < 0) {
      y = Constants.GAME_AREA_LENGTH + y;
    } else if (y > Constants.GAME_AREA_LENGTH) {
      y = y - Constants.GAME_AREA_LENGTH;
    }
    setLocation(new Coord2D(x, y));
  }
  
  /**
   * Get direction.
   * @return Direction of element.
   */
  public final double getDirection() {
    return direction;
  }
  
  /**
   * Get speed.
   * @return Speed of element.
   */
  public final int getSpeed() {
    return speed;
  }
  
  /**
   * Get nominal speed.
   * @return Speed of element.
   */
  public final int getReferenceSpeed() {
    return referenceSpeed;
  }
  
  
  /**
   * Set target speed.
   * @param s Target speed.
   */
  public final void setReferenceSpeed(int s) {
    referenceSpeed = s;
  }
  
  /**
   * Get maximum speed.
   * @return Current maximum speed allowed.
   */
  public final int getMaximumSpeed() {
    return maxSpeed;
  }
  
  /**
   * Set maximum speed.
   * @param s Target speed.
   */
  public final void setMaximumSpeed(int s) {
    maxSpeed = s;
  }
  
  /**
   * Draw the moving element.
   * In addition to the element's icon,
   * a "direction circle" is also painted
   * to give an impression of the element's direction.
   * @param g Graphics object for drawing.
   */
  @Override
  public void draw(Graphics g) {
    super.draw(g);
    Coord2D p = getLocation().displace(Constants.ELEM_WIDTH/2+6, getDirection());
    g.setColor(DIRECTION_COLOR);
    g.fillOval((int) p.getX() - 3, (int) p.getY() - 3, 6, 6);
  }
}
