package pco.melody.test;

import pco.melody.SoundPlayer;

/**
 * Sound sanity test.
 * @author Eduardo R. B. Marques, DI/FCUL, 2015.
 *
 */
public class SoundSanityTest {

  /**
   * Program entry point.
   * @param args Arguments (ignored).
   */
  public static void main(String[] args) {
    SoundPlayer player = SoundPlayer.getPlayer();
    for (int t=1; t <= 3; t++) {
      for (int n=SoundPlayer.MIN_MIDI_NOTE; n < SoundPlayer.MAX_MIDI_NOTE; n++) {
        player.play(n, 0.05);
      }
      for (int n=SoundPlayer.MAX_MIDI_NOTE-1; n >= SoundPlayer.MIN_MIDI_NOTE; n--) {
        player.play(n, 0.05);
      }
      player.silence(1);
    }
  }

}
