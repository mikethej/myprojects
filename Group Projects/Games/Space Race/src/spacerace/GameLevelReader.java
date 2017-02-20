package spacerace;

import java.io.File;
import java.io.FileNotFoundException;
import java.util.Scanner;

import spacerace.areas.*;
import spacerace.asteroids.*;
import spacerace.players.*;


public class GameLevelReader {

	public static GameState read(int level) throws FileNotFoundException, InvalidLevelException {
		GameState gs = new GameState(level);
		File file = new File(Constants.LEVELS_PATH, "level_" + level + ".txt");
		Scanner inp;
		if(file.exists()){
			inp = new Scanner(file);
		} else {
			throw new FileNotFoundException("O ficheiro não foi encontrado");
		}
		try {
			while(inp.hasNext()) {
				String typeOfElem = inp.next();
				//System.out.println(typeOfElem);
				switch (typeOfElem) {
				case "HumanPlayer":
					HumanPlayer hp = new HumanPlayer(readCoord(inp), readDirection(inp));
					gs.addHumanPlayer(hp);
					break;
				case "WayPoints": 
					int n = inp.nextInt();
					for (int i=0; i < n; i++) {
						gs.addArea(new WayPoint(readCoord(inp), i));
					}
					break;
				case "LooseAsteroid":
					gs.addAsteroid(new LooseAsteroid(readCoord(inp), readDirection(inp),readSpeed(inp)));
					break;
				case "WormHole":
					gs.addArea(new WormHole(readCoord(inp), readCoord(inp)));
					break;
				case "BlackHole":
					gs.addArea(new BlackHole(readCoord(inp)));
					break;
				case "Dust":
					gs.addArea(new Dust(readCoord(inp)));
					break;
				case "Planet":
					gs.addArea(new Planet(readCoord(inp)));
					break;
				case "OrbitalAsteroid":
					gs.addAsteroid(new OrbitalAsteroid(readCoord(inp), readDirection(inp), readSpeed(inp)));
					break;
				case "CrazyAsteroid":
					gs.addAsteroid(new CrazyAsteroid(readCoord(inp), readDirection(inp), readSpeed(inp)));
					break;
				case "StraightAheadPlayer":
					gs.addAIPlayer(new StraightAheadPlayer(readCoord(inp), readDirection(inp), readSpeed(inp)));
					break;
				case "CrazyPlayer":
					gs.addAIPlayer(new CrazyPlayer(readCoord(inp), readDirection(inp), readSpeed(inp)));
					break;
				case "SmartPlayer":
					gs.addAIPlayer(new SmartPlayer(readCoord(inp), readDirection(inp), readSpeed(inp)));
					break;
				case "HunterPlayer":
					gs.addAIPlayer(new HunterPlayer(readCoord(inp), readDirection(inp), readSpeed(inp)));
					break;
				case "SecondHumanPlayer":
					SecondHumanPlayer ndhp = new SecondHumanPlayer(readCoord(inp), readDirection(inp));
					gs.addSecondHumanPlayer(ndhp);
					break;
				default:
					 
				}
			}
		}
		finally {
			inp.close();
		}
		return gs;
	}

	private static Coord2D readCoord(Scanner inp){
		int x = inp.nextInt();
		int y = inp.nextInt();
		if ( 0 >> x > Constants.GAME_AREA_LENGTH || 0 >> y > Constants.GAME_AREA_LENGTH){
			throw new InvalidLocationException("A posição (" + x + "," + y + ") é inválida"); 
		}
		return new Coord2D(x,y);
	}


	private static int readDirection(Scanner inp){
		int d = inp.nextInt();
		if (0 >> d > 360){
			throw new InvalidDirectionException("A direção" + d + "é inválida");
		}
		return d;
	}

	private static int readSpeed(Scanner inp){
		int s = inp.nextInt();
		if(0 >> s > Constants.MAX_SPEED){
			throw new InvalidSpeedException("A velocidade é inválida");
		}
		return s;
	}

	/**
	 * Private constructor to prevent instantiation.
	 */
	private GameLevelReader() {

	}

}
