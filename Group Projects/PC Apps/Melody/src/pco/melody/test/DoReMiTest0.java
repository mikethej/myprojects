package pco.melody.test;

import pco.melody.SoundPlayer;

/**
 * "Do-ré-mi" test program, version 0 - uses MIDI codes.
 * 
 * @author Eduardo R.B. Marques, DI/FCUL, 2015
 *
 */
public class DoReMiTest0 {

  /**
   * Program entry point.
   * @param args Arguments (ignored)
   */
  public static void main(String[] args) {
    SoundPlayer player = SoundPlayer.getPlayer();
   
    int[] doReMi = { 60, 62, 64, 65, 67, 69, 71, 72 };

    for (int i = 0; i < doReMi.length; i++) {
      player.play(doReMi[i], 1);
    }
    
  }
}
