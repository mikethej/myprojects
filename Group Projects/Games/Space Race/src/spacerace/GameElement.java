package spacerace;

import java.awt.Color;
import java.awt.Font;
import java.awt.Graphics;

import spacerace.util.Icon;

/**
 * Game element.
 * 
 */
public abstract class GameElement {
  /**
   * Element location.
   */
  private Coord2D location;

  
  
  /**
   * Constructor with supplied location,
   * using the class name to define the icon.
   * @param location Location of the element.
   */
  protected GameElement(Coord2D location) {
    this.location = location;
  }
  
  /** 
   * Constructor with supplied location and icon.
   * @param location Initial location.
   * @param icon Icon for the element.
   */
  protected GameElement(Coord2D location, Icon icon) {
    this.location = location;
  }

  /**
   * Get current location.
   * @return Coordinates for current location.
   */
  public final Coord2D getLocation() {
    return location;
  }

  /**
   * Change location.
   * @param location Coordinates for new location.
   */
  public final void setLocation(Coord2D location) {
    this.location = location;
  }
  
  
  /**
   * Font used for label.
   */
  private static final Font LABEL_FONT = new Font("Courier", Font.PLAIN, 10);

  /**
   * Color used for label.
   */
  private static final Color LABEL_COLOR = Color.YELLOW;

  /**
   * Draw the element.
   * @param g Graphics object to draw.
   */
  public void draw(Graphics g) {
    Coord2D c = getLocation();
    int radius = Constants.ELEM_WIDTH / 2;
    int x = (int) c.getX() ;
    int y = (int) c.getY();
    Icon icon = Icon.getIcon(getClass().getSimpleName());
    icon.draw(g, x - radius, y - radius);  
    String s = getLabel();
    if (s.length() > 0) {
      g.setFont(LABEL_FONT);
      g.setColor(LABEL_COLOR);
      g.drawString(s, x+radius, y+radius);
    }
//    c = Constants.normalize(c);
//    x = (int) c.getX() ;
//    y = (int) c.getY();
//    g.setColor(new Color(hashCode()%256,hashCode()%256,hashCode() % 256,50));
//    g.fillRect(x-radius, y-radius, 2*radius, 2*radius);
  }
  
  /**
   * Get element label. 
   * The default implementation returns
   * the empty string. Subclasses should
   * override this method if necessary.
   * @return A string object.
   */
  public String getLabel() {
    return "";
  }

}
