package spacerace;

import java.awt.Color;
import java.awt.Graphics;
import java.awt.Image;
import java.io.File;
import java.util.ArrayList;
import java.util.Collection;
import java.util.EnumSet;
import java.util.HashMap;
import java.util.HashSet;
import java.util.Iterator;
import java.util.function.Consumer;

import javax.swing.ImageIcon;

import spacerace.areas.EmptyArea;
import spacerace.areas.WayPoint;
import spacerace.areas.WormHole;
import spacerace.decorations.Explosion;
import spacerace.decorations.Trail;
import spacerace.decorations.WormHoleConnection;
import spacerace.players.HumanPlayer;
import spacerace.players.HunterPlayer;
import spacerace.players.SecondHumanPlayer;
import spacerace.util.Sound;
import static spacerace.Constants.*;

/**
 * Game data.
 * 
 * @author Eduardo Marques, DI/FCUL, 2015.
 *
 */
public final class GameState {

	/**
	 * Game level.
	 */
	private final int level;

	/**
	 * Background image.
	 */
	private final Image background;

	/**
	 * Background drawing flag.
	 */
	private boolean drawBackground;
	/**
	 * Constructor.
	 * @param level Game level.
	 */
	public GameState(int level) {
		this.level = level;
		background = new ImageIcon(Constants.BACKGROUNDS_PATH.getAbsolutePath() + "/background_" + level + ".jpg").getImage();
		drawBackground = true;
	}
	/**
	 * Get game level.
	 * @return The game level.
	 */
	public int getLevel() {
		return level;
	}

	/**
	 * Toggle background display.
	 */
	void toggleBackground() {
		drawBackground = !drawBackground;
	}

	/** Area  by location. */
	private final HashMap<Coord2D,Area> areas = new HashMap<>();


	//##########################################################################################################################


	/** EXTRA */
	private final ArrayList<Bullet> bullets = new ArrayList<>();


	//##########################################################################################################################


	/**
	 * Decorations.
	 */
	private final ArrayList<Decoration> decorations = new ArrayList<>();

	/** Players. */
	private final HashSet<Player> players = new HashSet<>();

	/** Dynamic elements */
	private final HashSet<MovingElement> movingElements = new HashSet<>();

	/** Human player. */
	private HumanPlayer humanPlayer;

	//##########################################################################################################################
	
	/** Second Human player. */
	private SecondHumanPlayer secondhumanPlayer;

	//##########################################################################################################################
	
	/**
	 * Game over flag.
	 */
	private boolean gameOver = false;

	/**
	 * Add area element.
	 * @param a Area element.
	 */
	public void addArea(Area a) {
		Coord2D nl = normalize(a.getLocation());
		a.setLocation(nl);
		areas.put(a.getLocation(), a);
		if (a.getClass() == WayPoint.class) {
			WayPoint w = (WayPoint) a;
			wps.add(w.getLocation());
		} else if (a.getClass() == WormHole.class) {
			WormHole w = (WormHole) a;
			Coord2D l1 = w.getLocation();
			Coord2D l2 = normalize(w.getExit());
			WormHole twin = new WormHole(l2, l1);
			areas.put(l2, twin);
			addDecoration(new WormHoleConnection(twin));
		}
	}
	/**
	 * Get area near given location.
	 * @param location Location.
	 * @return An area object.
	 */
	public Area getArea(Coord2D location) {
		Coord2D nl = normalize(location);
		Area a = areas.get(nl);
		if (a == null) {
			a = new EmptyArea(nl);
			areas.put(nl, a);
		}
		return a;
	}

	/**
	 * Add an asteroid.
	 * @param a The asteroid to add.
	 */
	public void addAsteroid(Asteroid a) {
		movingElements.add(a);
	}


	//##########################################################################################################################


	/**
	 * extra
	 */
	public void addBullet(Bullet a) {
		bullets.add(a);
	}


	//##########################################################################################################################


	/**
	 * Add a decoration element.
	 * @param d Decoration element.
	 */
	public void addDecoration(Decoration d) {
		decorations.add(d);
	}

	/**
	 * Add human player.
	 * @param hp Human player.
	 */
	public void addHumanPlayer(HumanPlayer hp) {
		if (humanPlayer != null) {
			throw new GameException("Human player already defined.");
		}
		movingElements.add(hp);
		players.add(hp);
		humanPlayer = hp;

	}
	
	/**
	 * Get human player.
	 * @return Human player (will be <code>null</code> if undefined).
	 */
	public HumanPlayer getHumanPlayer() {
		return humanPlayer;
	}

	//##########################################################################################################################

	public void addSecondHumanPlayer(SecondHumanPlayer ndhp) {
		if (secondhumanPlayer != null) {
			throw new GameException("Human player already defined.");
		}
		movingElements.add(ndhp);
		players.add(ndhp);
		secondhumanPlayer = ndhp;

	}
	
	/**
	 * Get human player.
	 * @return Human player (will be <code>null</code> if undefined).
	 */
	public SecondHumanPlayer getSecondHumanPlayer() {
		return secondhumanPlayer;
	}

	//##########################################################################################################################
	
	/**
	 * Add AI player.
	 * @param aip AI player.
	 */
	public void addAIPlayer(AIPlayer aip) {
		movingElements.add(aip);
		players.add(aip);
	}


	/**
	 * Get alive players.
	 * @return Array with all alive players.
	 */
	public Player[] getPlayers() {
		return players.toArray(new Player[players.size()]);
	}

	/**
	 * Draw the game data.
	 * @param g Graphics object for drawing.
	 */
	void draw(Graphics g) {
		if (drawBackground) {
			g.drawImage(background, 0, 0, null);
		} else {
			g.setColor(Color.BLACK);
			g.fillRect(0, 0, Constants.GAME_AREA_LENGTH, Constants.GAME_AREA_LENGTH);
		}
		Consumer<GameElement> doDraw = 
				e -> e.draw(g);
				areas.values().forEach(doDraw);
				decorations.forEach(doDraw);
				movingElements.forEach(doDraw);
	}

	/**
	 * Step of the game.
	 */
	void step() {
		clearSoundEffects();
		handleElementSteps(decorations);
		handleElementSteps(movingElements);
		handleCollisions();
		handleAreaInteraction();
		handlePositionUpdate();
		playSoundEffects();
		if (players.size() == 0) {
			createSound(SoundEffect.ALL_PLAYERS_DEAD).play();
			gameOver = true;
		} else {
			for (Player p : players) {
				if (p.getTargetWayPoint() == numberOfWaypoints()) {
					gameOver = true;
				}
			}
		}
	}


	/**
	 * Call the {@link Area#interactWith(GameState,MovingElement)}.
	 * for each dynamic element. If an
	 * element becomes dead, it is removed from the
	 * game.
	 */
	private void handleAreaInteraction() {
		Iterator<MovingElement> itr = movingElements.iterator();
		while (itr.hasNext()) {
			MovingElement e = itr.next();
			Area a = getArea(e.getLocation());
			a.interactWith(this, e);
			if (! e.isAlive()) {
				itr.remove();
				if (e instanceof Player) {
					players.remove(e);
				}
				addDecoration(new Explosion(e.getLocation()));
			}
		}
		//##########################################################################################################################
		movingElements.addAll(bullets);
		bullets.clear();
		//##########################################################################################################################
	}
	/**
	 * Call the {@link DynamicElement#step(GameState)}
	 * for each dynamic element. If an
	 * element becomes dead, it is removed.
	 * @param coll Collection of elements.
	 */
	private void handleElementSteps(Collection<? extends DynamicElement> coll) {
		Iterator<? extends DynamicElement> itr = coll.iterator();
		while (itr.hasNext()) {
			DynamicElement e = itr.next();
			e.step(this);
			if (! e.isAlive()) {
				itr.remove();
				if (e instanceof MovingElement)
					addDecoration(new Explosion(e.getLocation()));
			}
		}
	}

	/**
	 * Handle collisions.
	 */
	private void handleCollisions() {
		// Not very efficient :(
		final int n = movingElements.size();
		MovingElement[] array =  new MovingElement[n];
		movingElements.toArray(array);
		for (int i = 0; i < n; i++) {
			for (int j = i+1; j < n; j++) {
				handleCollision(array[i], array[j]);
			}
		}
	}

	/**
	 * Handle collision between two elements.
	 * @param a First element.
	 * @param b Second element.
	 */
	private void 
	handleCollision(MovingElement a, MovingElement b) {
		Coord2D aPos = a.getLocation();
		Coord2D bPos = b.getLocation();
		if (aPos.distanceTo(bPos) <= Constants.ELEM_WIDTH) {
			//##########################################################################################################################
			if((a instanceof Bullet) && (b instanceof Player && !(b instanceof HunterPlayer))){
				a.die();
				b.die();
				playSound(SoundEffect.EXPLOSION);
				addDecoration(new Explosion(a.getLocation()));
			} else if((a instanceof Player && !(a instanceof HunterPlayer)) && (b instanceof Bullet)){
				b.die();
				a.die();
				playSound(SoundEffect.EXPLOSION);
				addDecoration(new Explosion(b.getLocation()));
			} else if((a instanceof Bullet) && (b instanceof HunterPlayer)|(a instanceof Player && a instanceof HunterPlayer)){
				//O HunterPlayer não é afetado
			} else {
				double aDir = aPos.directionTo(bPos) + 180;
				double bDir = bPos.directionTo(aPos) + 180;
				int aSpeed = b.getSpeed();
				int bSpeed = a.getSpeed();
				a.setDirection(aDir);
				b.setDirection(bDir);
				a.setSpeed(aSpeed);
				b.setSpeed(bSpeed);
				playSound(SoundEffect.COLLISION);
			}
			//##########################################################################################################################
		}
	}

	/**
	 * Update positions of moving elements.
	 */
	private void handlePositionUpdate() {
		for (MovingElement e : movingElements) {
			e.updatePosition();
			addDecoration(new Trail(e.getLocation()));
		}
	}

	/** Way-point coordinates by index. */
	private final ArrayList<Coord2D> wps = new ArrayList<>();

	/**
	 * Get number of way-points.
	 * @return The number of way-points in the game.
	 */
	public int numberOfWaypoints() {
		return wps.size();
	}
	/**
	 * Get coordinate of way-point.
	 * @param index Index of way-point.
	 * @return The coordinate of the way-point.
	 */
	public Coord2D getWayPointLocation(int index) {
		return wps.get(index);
	}

	/**
	 * Test if game is over.
	 * @return <code>true</code> if game is over.s
	 */
	public boolean gameIsOver() {
		return gameOver;
	}


	/**
	 * Activated sound effects.
	 */
	private final EnumSet<SoundEffect> activatedSoundEffects = EnumSet.noneOf(SoundEffect.class);

	/**
	 * Request to play sound effect.
	 * @param se Sound effect.
	 */
	public void playSound(SoundEffect se) {
		activatedSoundEffects.add(se);
	}

	/**
	 * Clear sound effects.
	 */
	private void clearSoundEffects() {
		activatedSoundEffects.clear();
	}

	/**
	 * Sound effects on/off.
	 */
	private boolean soundEffectsOn = true;
	/**
	 * Toggle sound effects on/off.
	 */
	void toggleSoundEffects() {
		soundEffectsOn = !soundEffectsOn;
	}
	/**
	 * Avoid simultaneous collision sounds for better 
	 * use of memory.
	 */
	private static final Sound 
	COLLISION_SOUND = createSound(SoundEffect.COLLISION);

	/**
	 * Create sound.
	 * @param se Sound effect.
	 * @return The sound object.
	 */
	private static Sound createSound(SoundEffect se) {
		return new Sound(new File(SOUNDS_PATH, se.toString() + ".wav"));  
	}

	/**
	 * Play sound effects.
	 */
	private final void playSoundEffects() {
		if (soundEffectsOn) {
			for (SoundEffect se : activatedSoundEffects) {
				if (se == SoundEffect.COLLISION) {
					COLLISION_SOUND.play();
				} else {
					createSound(se).play();
				}
			}
		}
	}


}
