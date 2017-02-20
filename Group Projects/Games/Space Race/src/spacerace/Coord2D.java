package spacerace;


/**
 * A coordinate in a XY two-dimensional space (immutable implementation).
 * @author Eduardo Marques, DI/FCUL, 2014
 *
 */
public final strictfp class Coord2D 
 implements Comparable<Coord2D> {
  /**
   * Constant for conversion from degrees to radians.
   */
  public static final double D2R = Math.PI / 180;
   
  /**
   * Constant for conversion from radians to degrees.
   */
  public static final double R2D =  180 / Math.PI;

  /**
   * Tolerance for considering values for X or Y 
   * as equal.
   */
  public static final double CTOL = 1e-03;
  
  /**
   * Inverse of CTOL.
   */
  public static final double INV_CTOL = 1e+03;
  
  /** X coordinate */
  private final double x;
  
  /** Y coordinate */
  private final double y;
  

  /**
   * Constructor.
   * @param x X coordinate.
   * @param y Y coordinate.
   */
  public Coord2D(double x, double y) {
    this.x = x;
    this.y = y;
  }
  

  /**
   * Get X.
   * @return The value for the X coordinate.
   */
  public double getX() {
    return x;
  }
  
  /**
   * Get Y.
   * @return The value for the Y coordinate.
   */
  public double getY() {
    return y;
  }
  

  /**
   * Add coordinates.
   * @param other Other coordinate.
   * @return The sum of <code>this</code> with <code>other</code>.
   */
  public Coord2D add(Coord2D other) {
    return new Coord2D(x + other.x, y + other.y);
  }

  /**
   * Move according to given distance and angle.
   * @param d Distance.
   * @param a Angle in degrees.
   * @return New coordinate <code>c</code> such that 
   *         <code>this.distanceTo(c)</code> is <code>d</code>
   *         and <code>this.directionTo(c)</code> is <code>a</code>.
   */
  public Coord2D displace(double d, double a) {
    double rad = a * D2R;
    return new Coord2D(x + d * Math.cos(rad), y + d * Math.sin(rad));
  }
  
  /**
   * Get distance to given coordinate.
   * @param c The other coordinate.
   * @return The distance between both coordinates.
   */
  public double distanceTo(Coord2D c) {
    double dx = x - c.x;
    double dy = y - c.y;
    return Math.sqrt(dx * dx + dy * dy);
  }
  
  /**
   * Get direction to given coordinate in degrees.
   * @param c The other coordinate.
   * @return The direction between both coordinates.
   */
  public double directionTo(Coord2D c) {
    return Math.atan2(c.y - y, c.x - x) * R2D;
  }
  
  /**
   * Test for equality against given coordinates.
   * @param o Object reference.
   * @return Returns <code>true</code> if the argument
   *     refers to an equivalent coordinate, <code>false</code> if not.
   */
  @Override
  public boolean equals(Object o) {
    if (o == this)
      return true;
    if (! (o instanceof Coord2D))
      return false;
    Coord2D c = (Coord2D) o;
    return  Math.abs(x - c.x) <= CTOL 
         && Math.abs(y - c.y) <= CTOL;
  }
  
  /** 
   * Get hash code.
   * @return Hash code for the coordinate.
   */
  @Override 
  public int hashCode() {
    return (int) 
      (31L * Math.round(INV_CTOL * x)
           + Math.round(INV_CTOL * y));
  }
 
  /**
   * Get textual representation.
   * @return A string with <code>(x,y)</code> format.
   */
  @Override
  public String toString() {
    return "(" + x + "," + y + ")";
  }


  /**
   * Compare coordinates.
   * @param other Other coordinate.
   * @return Comparison result.
   */
  @Override
  public int compareTo(Coord2D other) {
    double d = x - other.x;
    if (Math.abs(d) <= CTOL) {
      d = Math.abs(y - other.y);
      if (d <= CTOL) {
        d = 0;
      }
    }
    return (int) Math.signum(d);
  }
  
}
