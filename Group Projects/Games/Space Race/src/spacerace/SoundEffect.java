package spacerace;


/**
 * Sound effects enumeration.
 * 
 * @see GameState#playSound(SoundEffect)
 *
 */
public enum SoundEffect {
  /**
   * Game over.
   */
  PLAYER_WON,
  /**
   * Explosion.
   */
  EXPLOSION,
  /**
   * Collision.
   */
  COLLISION,
  /**
   * Worm-hole entry.
   */
  ENTER_WORMHOLE,
  /**
   * Way-point reached.
   */
  WAYPOINT_REACHED,
  /**
   * All players dead.
   */
  ALL_PLAYERS_DEAD;
}
