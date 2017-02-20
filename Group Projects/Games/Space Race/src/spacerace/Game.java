//package spacerace;
//
//import java.awt.Font;
//import java.awt.Graphics;
//import java.awt.Image;
//import java.awt.event.KeyEvent;
//import java.awt.event.KeyListener;
//import java.io.File;
//import java.util.Arrays;
//import java.util.Comparator;
//
//import javax.swing.ImageIcon;
//
//import spacerace.areas.BlackHole;
//import spacerace.areas.Dust;
//import spacerace.areas.Planet;
//import spacerace.areas.WayPoint;
//import spacerace.areas.WormHole;
//import spacerace.asteroids.OrbitalAsteroid;
//import spacerace.players.CrazyPlayer;
//import spacerace.players.HumanPlayer;
//import spacerace.players.HumanPlayerCommand;
//import spacerace.players.SmartPlayer;
//import spacerace.players.StraightAheadPlayer;
//import spacerace.util.Coord2D;
//import spacerace.util.Sound;
//
//
///**
// * Main game class.
// * 
// * @author Eduardo Marques, DI/FCUL, 2014
// */
//public final class Game implements KeyListener  {
//
//  /**
//   * Game data.
//   */
//  private GameState state;
//
//  /**
//   * Bacgkround music.
//   */
//  private final Sound bMusic;
//
//
//
//  /**
//   * Font for game status.
//   */
//  private static Font ARIAL_20 = new Font("Arial", Font.PLAIN, 20);
//
//
//  /**
//   * Constructor.
//   */
//  public Game() {
//    state = GameState.create();
//    
//    bMusic = new Sound(new File("resources/sounds/trippygaia1.mid"));
//    bMusic.loop();
//    try {
//      GameLevelReader.read(0, state);
//      state.setBackground("background");
//
//    } 
//    catch(Throwable e) {
//      e.printStackTrace();
//    }
//  }
//
//  /**
//   * Comparator for player ranking.
//   */
//  private  Comparator<Player>
//  PLAYER_RANKING_COMPARATOR = new Comparator<Player>() {
//    @Override
//    public int compare(Player a, Player b) {
//      int aWpt = a.getTargetWayPoint(); 
//      int bWpt = b.getTargetWayPoint();
//      int c = bWpt - aWpt;
//      if (c == 0) {
//        Coord2D awPos = state.getWayPointLocation(aWpt);
//        Coord2D bwPos = state.getWayPointLocation(bWpt);
//        double da = a.getLocation().distanceTo(awPos);
//        double db = b.getLocation().distanceTo(bwPos);
//        c = (int) Math.signum(da-db);
//      }
//      return c;
//    }
//  };
//  /**
//   * Perform a game step.
//   */
//  public synchronized void step() {
//    System.out.println("Game over? " + state.gameIsOver());
//    if (! state.gameIsOver()) {
//      state.step();
////      Player[] players = state.getPlayers();
////      Arrays.sort(players, PLAYER_RANKING_COMPARATOR);
////      int pos = 0;
////      System.out.println("---");
////      for (Player p : players) {
////        int wpIdx = p.getTargetWayPoint();
////        Coord2D wpCoord = GameState.INSTANCE.getWayPointLocation(wpIdx);
////        System.out.printf("%02d %s %d %.0f\n",
////            ++pos,
////            p.getClass().getSimpleName(),
////            wpIdx,
////            p.getLocation().distanceTo(wpCoord));
////      }
//
//    }
//  }
//
//  /** 
//   * Draw the game contents.
//   * @param g Graphics object for rendering.
//   */
//  public synchronized void draw(Graphics g) {
//    state.draw(g); 
//  }
//
//  /**
//   * Handler for key presses.
//   * @param e key event.
//   */
//  @Override
//  public synchronized void keyPressed(KeyEvent e) {
//    HumanPlayerCommand hpc = null;
//    switch (e.getKeyCode()) {
//      case KeyEvent.VK_LEFT:
//        hpc = HumanPlayerCommand.TURN_LEFT;
//        break;
//      case KeyEvent.VK_RIGHT:
//        hpc = HumanPlayerCommand.TURN_RIGHT;
//        break;
//      case KeyEvent.VK_UP:
//        hpc = HumanPlayerCommand.SPEED_UP;
//        break;
//      case KeyEvent.VK_DOWN:
//        hpc = HumanPlayerCommand.SPEED_DOWN;
//        break; 
//        //      case KeyEvent.VK_SPACE:
//        //        if (fireCountdown == 0) {
//        //          c = Command.FIRE;
//        //          fireCountdown = FIRE_INTERVAL;
//        //        }
//        //        break;
//      case 'P':
//        //        if (state == ACTIVE)
//        //          state = PAUSED;
//        //        else if (state == PAUSED)
//        //          state = ACTIVE;
//        break;
//        //      case 'R':
//        //        load(level);
//        //        break;
//      case 'K':
//        Sound.volumeDown();
//        break;
//      case 'L':
//        Sound.volumeUp();
//        break;
//      case 'M':
//        if (bMusic.playing()) {
//          bMusic.stop();
//        } else {
//          bMusic.loop();
//        }
//        break;
//      case '0': case '1': case '2':
//      case '3': case '4': case '5':
//      case '6': case '7': case '8':
//      case '9':
//        state = GameState.create();
//        try {
//          GameLevelReader.read(e.getKeyCode() - '0', state);
//          state.setBackground("background");
//        }
//        catch(Throwable th) {
//          th.printStackTrace();
//        }
//        break;
//      default:
//    }
//    if (hpc != null) {
//      HumanPlayer hp = state.getHumanPlayer();
//      if (hp != null && hp.isAlive()) {
//        hp.handleCommand(hpc);
//      }
//    }
//  }
//
//  /**
//   * Handler for key releases. 
//   * Nothing is done by this method.
//   * @param e key event.
//   */
//  @Override
//  public final void keyReleased(KeyEvent e) {
//    // DO NOTHING
//  }
//
//  /**
//   * Handler for typed keys. 
//   * Nothing is done by this method.
//   * @param e key event.
//   */
//  @Override
//  public final void keyTyped(KeyEvent e) { 
//    // DO NOTHING
//  }
//}
