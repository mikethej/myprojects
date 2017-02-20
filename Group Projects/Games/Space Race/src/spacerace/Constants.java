package spacerace;

import java.io.File;


/**
 * Class that declares constants used in the game,
 * and provides a few utility methods.
 * 
 * @author Eduardo R. B. Marques, DI/FCUL, 2015
 */
public final class Constants {
  /**
   * Icon size for game elements.
   */
  public static final int ELEM_WIDTH = 50;
  /**
   * Area length.
   */
  static final int GAME_AREA_LENGTH = 600;
  
  /**
   * Maximum speed in dust.
   */
  public static final int MAX_SPEED_IN_DUST = 2;
  
  /**
   * Maximum speed of a game element.
   */
  public static final int MAX_SPEED = 10;
  
  /**
   * Refresh period (in milliseconds).
   */
  static final int REFRESH_PERIOD = 100;
  
 

  /**
   * Utility method to normalize coordinates.
   * @param c Coordinate to normalize.
   * @return Normalized coordinate.
   */
  public static Coord2D normalize(Coord2D c) {
    double x = c.getX(); 
    double y = c.getY();
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
    x = (Math.floor(x / ELEM_WIDTH) + 0.5) * ELEM_WIDTH;
    y = (Math.floor(y / ELEM_WIDTH) + 0.5 ) * ELEM_WIDTH;
    return new Coord2D(x, y);
  }
  
  /**
   * Path for images.
   */
  static final File IMAGES_PATH = new File("resources/images");
  
  /**
   * Path for icon images.
   */
  static final File ICONS_PATH = new File(IMAGES_PATH, "icons");
  
  /**
   * Path for icon images.
   */
  static final File BACKGROUNDS_PATH = new File(IMAGES_PATH, "backgrounds");
  
  /**
   * Sounds path.
   */
  static final File SOUNDS_PATH = new File("resources/sounds");
  
  /**
   * Level files path.
   */
  static final File LEVELS_PATH = new File("resources/levels");
  
  /**
   * Background music file.
   */
  static final File BACKGROUND_MUSIC_FILE = 
    new File(SOUNDS_PATH, "BACKGROUND_MUSIC.mid");
  /**
   * Private constructor to prevent instantiation.
   */
  private Constants() { }
}
