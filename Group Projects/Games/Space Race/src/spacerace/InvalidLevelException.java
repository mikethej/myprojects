package spacerace;

/**
 * Base class for game exceptions.
 * 
 * @author Eduardo R. B. Marques, DI/FCUL, 2015.
 *
 */
@SuppressWarnings("serial")
public class InvalidLevelException extends GameException {
  /**
   * Constructor.
   * @param msg Error message.
   */
  public InvalidLevelException(String msg) {
    super(msg);
  }
}
