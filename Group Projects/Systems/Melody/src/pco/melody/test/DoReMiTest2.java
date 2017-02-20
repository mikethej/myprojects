package pco.melody.test;

import pco.melody.Acc;
import pco.melody.Melody;
import pco.melody.Note;
import pco.melody.Pitch;
import pco.melody.SoundPlayer;

/**
 * "Do-ré-mi" test program, version .
 * 
 * @author Eduardo R.B. Marques, DI/FCUL, 2015
 *
 */
public class DoReMiTest2 {

  /**
   * Program entry point.
   * @param args Arguments (ignored)
   */
  public static void main(String[] args) {
    SoundPlayer player = SoundPlayer.getPlayer();
    Pitch[] doReMi = { Pitch.C, Pitch.D, Pitch.E, Pitch.F, Pitch.G, Pitch.A, Pitch.B, Pitch.C };
    Melody melody = new Melody("Test", "Test", doReMi.length);

    for (int i = 1; i <= doReMi.length; i++) {
      melody.set(i-1, new Note(1, doReMi[i-1], 5 + i / 8, Acc.NATURAL));
    }
    for (int i = 0; i < melody.notes(); i++) {
      player.play(melody.get(i));
    }
  }
}
