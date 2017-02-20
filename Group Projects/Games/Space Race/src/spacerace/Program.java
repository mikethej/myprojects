package spacerace;

import static spacerace.Constants.GAME_AREA_LENGTH;
import static spacerace.Constants.REFRESH_PERIOD;

import java.awt.BorderLayout;
import java.awt.Dimension;
import java.awt.Graphics;
import java.awt.Toolkit;
import java.awt.event.KeyEvent;
import java.awt.event.KeyListener;
import java.awt.event.WindowEvent;
import java.awt.image.BufferedImage;

import javax.swing.JFrame;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.SwingUtilities;

import spacerace.players.HumanPlayer;
import spacerace.players.SecondHumanPlayer;
import spacerace.util.Sound;

/**
 * Main program.
 * @author Eduardo Marques, DI/FCUL, 2014.
 */
@SuppressWarnings("serial")
public class Program extends JFrame implements  Runnable, KeyListener {

	/**
	 * Program entry point.
	 * @param args Arguments are ignored.
	 */
	public static void main(String[] args) {
		Program p = new Program();
		SwingUtilities.invokeLater(p);
	}  

	/**
	 * Game state.
	 */
	private GameState state;

	/**
	 * Background music.
	 */
	private final Sound bMusic;

	/**
	 * Constructor.
	 */
	private Program() {
		// Call superclass constructor.
		super("Space race");
		loadLevel(0);
		addKeyListener(this);
		JPanel gamePanel = new JPanel() {
			private final BufferedImage img 
			= new BufferedImage(GAME_AREA_LENGTH, GAME_AREA_LENGTH, BufferedImage.TYPE_INT_RGB);
			@Override
			public void paintComponent(Graphics g) {
				try {
					if (state != null) {
						if (!state.gameIsOver()) {
							state.step();
							state.draw(img.getGraphics());
						}
						g.drawImage(img, 0, 0, null);
					}
				}
				catch (Throwable ex) {
					ex.printStackTrace();
				}
			}
		};
		gamePanel.setSize(GAME_AREA_LENGTH, GAME_AREA_LENGTH);
		gamePanel.setPreferredSize(new Dimension(GAME_AREA_LENGTH, GAME_AREA_LENGTH));
		add(gamePanel, BorderLayout.CENTER);
		pack();
		setVisible(true);
		setResizable(false);
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		Dimension screenSize = Toolkit.getDefaultToolkit().getScreenSize();
		setLocation(screenSize.width/2 - getWidth()/2,
				screenSize.height/2 - getHeight()/2);
		bMusic = new Sound(Constants.BACKGROUND_MUSIC_FILE);
		bMusic.loop();
	}

	/**
	 * Load level.
	 * @param level Level.
	 */
	private synchronized void loadLevel(int level) {
		try {
			System.gc();
			state = GameLevelReader.read(level);
		} 
		catch(Throwable e) {
			e.printStackTrace();
			JOptionPane.showMessageDialog(this, e.getMessage(), "Level " + level, JOptionPane.ERROR_MESSAGE);
		}
	}

	/**
	 * Implementation of Runnable interface.
	 */
	@Override
	public final void run() {
		SwingUtilities.invokeLater(new Runnable() {
			@Override
			public void run() {
				try { 
					Thread.sleep(REFRESH_PERIOD); 
					repaint(); 
					Toolkit.getDefaultToolkit().sync();
					SwingUtilities.invokeLater(this);
				}
				catch (Throwable ex) {
					ex.printStackTrace();
				}
			}
		});
	}

	/**
	 * Handler for key presses.
	 * @param e key event.
	 */
	@Override
	public synchronized void keyPressed(KeyEvent e) {
		HumanPlayerCommand hpc = null;
		SecondHumanPlayerCommand ndhpc = null;
		switch (e.getKeyCode()) {
		case '0': case '1': case '2':
		case '3': case '4': case '5':
		case '6': case '7': case '8':
		case '9':
			loadLevel(e.getKeyCode() - '0');
			break;
		case 'B':
			state.toggleBackground();
			break;
		
			//# comando F para "FX" sonoros #########################################################################################################################
		case 'F':
			state.toggleSoundEffects(); 
			break;
			//##########################################################################################################################

		case 'Q':
			dispatchEvent(new WindowEvent(this, WindowEvent.WINDOW_CLOSING));
			break;
		case 'M':
			if (bMusic.playing()) {
				bMusic.stop();
			} else {
				bMusic.loop();
			}
			break;
		case KeyEvent.VK_LEFT:
			hpc = HumanPlayerCommand.TURN_LEFT; break;
		case KeyEvent.VK_RIGHT:
			hpc = HumanPlayerCommand.TURN_RIGHT; break;
		case KeyEvent.VK_UP:
			hpc = HumanPlayerCommand.SPEED_UP; break;
		case KeyEvent.VK_DOWN:
			hpc = HumanPlayerCommand.SPEED_DOWN; break; 
			//##########################################################################################################################
		case KeyEvent.VK_SPACE:
			hpc = HumanPlayerCommand.FIRE; break; 
			//##########################################################################################################################
			
			//##########################################################################################################################
		case KeyEvent.VK_A:
			ndhpc = SecondHumanPlayerCommand.TURN_LEFT; break;
		case KeyEvent.VK_D:
			ndhpc = SecondHumanPlayerCommand.TURN_RIGHT; break;
		case KeyEvent.VK_W:
			ndhpc = SecondHumanPlayerCommand.SPEED_UP; break;
		case KeyEvent.VK_S:
			ndhpc = SecondHumanPlayerCommand.SPEED_DOWN; break; 
		case KeyEvent.VK_V:
			ndhpc = SecondHumanPlayerCommand.FIRE; break; 
			//##########################################################################################################################

		default:
		}
		if (hpc != null && !state.gameIsOver()) {
			HumanPlayer hp = state.getHumanPlayer();
			if (hp != null && hp.isAlive()) {
				hp.handleCommand(hpc, state);
			}
		}
		
		if (ndhpc != null && !state.gameIsOver()) {
			SecondHumanPlayer ndhp = state.getSecondHumanPlayer();
			if (ndhp != null && ndhp.isAlive()) {
				ndhp.handleCommand(ndhpc, state);
			}
		}
	}

	/**
	 * Handler for key releases. 
	 * Nothing is done by this method.
	 * @param e key event.
	 */
	@Override
	public final void keyReleased(KeyEvent e) { }

	/**
	 * Handler for typed keys. 
	 * Nothing is done by this method.
	 * @param e key event.
	 */
	@Override
	public final void keyTyped(KeyEvent e) { }

}