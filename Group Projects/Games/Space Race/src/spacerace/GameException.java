package spacerace;

/**
 * Base class for game exceptions.
 * 
 * @author Eduardo R. B. Marques, DI/FCUL, 2015.
 *
 */
@SuppressWarnings("serial")
public class GameException extends RuntimeException {
  /**
   * Constructor.
   * @param msg Error message.
   */
  public GameException(String msg) {
    super(msg);
  }

  /**
   * Constructor.
   * @param msg Error message.
   * @param cause Exception that caused the error.
   */
  public GameException(String msg, Throwable cause) {
    super(msg,cause);
  }
}
