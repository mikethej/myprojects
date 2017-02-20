package spacerace.players;

import spacerace.AIPlayer;
import spacerace.Area;
import spacerace.Constants;
import spacerace.Coord2D;
import spacerace.GameState;
import spacerace.areas.BlackHole;
import spacerace.areas.Dust;
import spacerace.areas.EmptyArea;
import spacerace.areas.Planet;
import spacerace.areas.WayPoint;
import spacerace.areas.WormHole;

public class SmartPlayer extends AIPlayer {

	private double[] d = {0,90,180,270};

	private double[][] melhor_pior = new double[4][2];

	public SmartPlayer(Coord2D location, double direction, int referenceSpeed) {
		super(location, direction, referenceSpeed);
	}

	public void step(GameState gs) {

		melhor_pior[3][0] = 600;
		melhor_pior[2][0] = 600;

		Area look1 = gs.getArea(this.getLocation().displace(Constants.ELEM_WIDTH * 1.1, d[0]));
		Area look2 = gs.getArea(this.getLocation().displace(Constants.ELEM_WIDTH * 1.1, d[1]));
		Area look3 = gs.getArea(this.getLocation().displace(Constants.ELEM_WIDTH * 1.1, d[2]));
		Area look4 = gs.getArea(this.getLocation().displace(Constants.ELEM_WIDTH * 1.1, d[3]));

		double distancia1 = gs.getWayPointLocation(getTargetWayPoint()).distanceTo(look1.getLocation());
		double distancia2 = gs.getWayPointLocation(getTargetWayPoint()).distanceTo(look2.getLocation());

		if(look1 instanceof Dust){
			distancia1*=1.25;
		}
		if(look2 instanceof Dust){
			distancia2*=1.25;
		}

		if (distancia1 < distancia2){

			melhor_pior[0][0] = distancia1;
			melhor_pior[0][1] = 0;

			melhor_pior[1][0] = distancia2;
			melhor_pior[1][1] = 90;

		} else {
			melhor_pior[0][0] = distancia2;
			melhor_pior[0][1] = 90;

			melhor_pior[1][0] = distancia1;
			melhor_pior[1][1] = 0;

		}

		for (int i=2; i<4; i++){

			Area look;

			if(i == 2){
				look = look3;
			} else {
				look = look4;
			}

			double distance = gs.getWayPointLocation(getTargetWayPoint()).distanceTo(look.getLocation());

			if(look instanceof Dust){
				distance*=1.25;
			}

			if (distance > melhor_pior[3][0]){
			} else {
				for (int x = 3; x>=0; x--) {

					if (distance > melhor_pior[x][0] && x == 2){

						melhor_pior[x+1][0] = distance;
						melhor_pior[x+1][1] = d[i];
						break;

					} else if (distance > melhor_pior[x][0] && x == 1){


						melhor_pior[x+2][0] = melhor_pior[x+1][0];
						melhor_pior[x+2][1] = melhor_pior[x+1][1];
						melhor_pior[x+1][0] = distance;
						melhor_pior[x+1][1] = d[i];
						break;

					} else if (distance > melhor_pior[x][0] && x == 0){

						melhor_pior[x+3][0] = melhor_pior[x+2][0];
						melhor_pior[x+3][1] = melhor_pior[x+2][1];
						melhor_pior[x+2][0] = melhor_pior[x+1][0];
						melhor_pior[x+2][1] = melhor_pior[x+1][1];
						melhor_pior[x+1][0] = distance;
						melhor_pior[x+1][1] = d[i];
						break;

					} else if (distance < melhor_pior[x][0] && x == 0){

						melhor_pior[x+3][0] = melhor_pior[x+2][0];
						melhor_pior[x+3][1] = melhor_pior[x+2][1];
						melhor_pior[x+2][0] = melhor_pior[x+1][0];
						melhor_pior[x+2][1] = melhor_pior[x+1][1];
						melhor_pior[x+1][0] = melhor_pior[x][0];
						melhor_pior[x+1][1] = melhor_pior[x][1];
						melhor_pior[x][0] = distance;
						melhor_pior[x][1] = d[i];
						break;
					}
				}
			}
		}
		
		System.out.println();
		for (double[] e : melhor_pior) {
			System.out.println(e[0] + " - " + e[1]);
		}
		System.out.println();
		
		for (double[] e : melhor_pior) {
			if(e[1] == 0 && (!(look1 instanceof Planet) && !(look1 instanceof BlackHole))){
				setDirection(e[1]);
				break;
			} else if(e[1] == 90 && (!(look2 instanceof Planet) && !(look2 instanceof BlackHole))){
				setDirection(e[1]);
				break;
			} else if(e[1] == 180 && (!(look3 instanceof Planet) && !(look3 instanceof BlackHole))){
				setDirection(e[1]);
				break;
			} else if(e[1] == 270 && (!(look4 instanceof Planet) && !(look4 instanceof BlackHole))){
				setDirection(e[1]);
				break;
			}
			System.out.println(this.getDirection());
		}
		
		System.out.println("final = " + this.getDirection());
	}
}
