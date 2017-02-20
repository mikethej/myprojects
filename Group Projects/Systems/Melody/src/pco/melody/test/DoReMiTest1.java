package pco.melody.test;

import pco.melody.Acc;
import pco.melody.Note;
import pco.melody.Pitch;
import pco.melody.SoundPlayer;

/**
 * "Do-ré-mi" test program, version 2 - uses Note class only.
 * 
 * @author Eduardo R.B. Marques, DI/FCUL, 2015
 *
 */
public class DoReMiTest1 {

  /**
   * Program entry point.
   * @param args Arguments (ignored)
   */
  public static void main(String[] args) {
    SoundPlayer player = SoundPlayer.getPlayer();
   
    Pitch[] doReMi = { Pitch.C, Pitch.D, Pitch.E, Pitch.F, 
                       Pitch.G, Pitch.A, Pitch.B, Pitch.C };

    for (int i = 1; i <= doReMi.length; i++) {
      player.play(new Note(1, doReMi[i-1], 5 + i / 8, Acc.NATURAL));
    }
  }
}
