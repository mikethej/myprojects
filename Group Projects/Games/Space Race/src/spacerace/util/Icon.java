package spacerace.util;

import java.awt.Graphics;
import java.awt.Image;
import java.util.HashMap;

import javax.swing.ImageIcon;


/**
 * Image icon. 
 * 
 * <p>
 * Image icons must 
 * be stored in the <code>images/icons/NAME.png</code>
 * where <code>NAME</code> is the name of the icon,
 * and have <code>n * n</code> dimension where
 * <code>n = GameConstants.ICON_SIZE</code>.
 * </p>
 * 
 * @author Eduardo Marques, 2015, DI/FCUL
 *
 */
public final class Icon  {
  
  /**
   * Map for loaded icons.
   */
  private static final HashMap<String,Icon> LOADED_ICONS = new HashMap<>();
  /**
   * Factory method to get an  icon
   * (avoids creating the same icon twice).
   * @param iconName The name of the icon.
   * @return An icon instance.
   */
  public static Icon getIcon(String iconName) {
    synchronized (LOADED_ICONS) {
      Icon i = LOADED_ICONS.get(iconName);
      if (i == null) {
        i = new Icon(iconName);
        LOADED_ICONS.put(iconName, i);
      }
      return i;
    }
  }
  
  /**
   * Image for icon. 
   */
  private final Image image;

  /**
   * Constructs a new icon.
   * @param iconName Name of icon.
   */
  private Icon(String iconName) {
    image = new ImageIcon("resources/images/icons/"+iconName + ".png").getImage();
  }

  /**
   * Draw the icon at given center location.
   * @param g Graphics object for drawing.
   * @param x X coordinate for drawing icon.
   * @param y Y coordinate for drawing icon.
   */
  public void draw(Graphics g, int x, int y) {
    g.drawImage(image, x, y, null);    
  }
}
