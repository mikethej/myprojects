package pco.melody;

import javax.sound.midi.MidiChannel;
import javax.sound.midi.MidiSystem;
import javax.sound.midi.MidiUnavailableException;
import javax.sound.midi.Synthesizer;


/**
 * Sound player class used to play notes.
 * 
 * <p>
 * A <code>NotePlayer</code> object can be used to play notes.
 * Internally, MIDI is used to play piano-like sound. 
 * </p>
 * 
 * @author Eduardo R. B. Marques, DI/FCUL, 2015
 */
public class SoundPlayer {

  /** Singleton instance. */
  private static final SoundPlayer INSTANCE = new SoundPlayer();
  
  /** Position in octave for each note */
  private static final int[] POS_IN_OCTAVE = { 9, 11, 0, 2, 4, 5, 7 };

  /** Minimum code for MIDI note. */
  public static final int MIN_MIDI_NOTE = 0;
  
  /** Maximum code for MIDI note. */
  public static final int MAX_MIDI_NOTE = 127;
  
  /**
   * Get player instance.
   * @return An instance of a MIDI player.
   */
  public static SoundPlayer getPlayer() {
    return INSTANCE;
  }
  
  /** MIDI Synthesizer. */
  private Synthesizer synth;

  /** MIDI Channel. */
  private MidiChannel channel;
  
  /**
   * Constructs a note player.
   */
  private SoundPlayer() {
    try {
      synth = MidiSystem.getSynthesizer();
      synth.open();

      MidiChannel[] channels = synth.getChannels();
      int pos = 0;
      while (channel == null) {
        channel = channels[pos++];
      }
    } catch (MidiUnavailableException e) {
      throw new Error("Could not load MIDI system.");
    }
  }

  /**
   * Delay execution for a given duration.
   * @param duration Duration in seconds.
   */
  private void delay(double duration) {
    try { 
      Thread.sleep(Math.round(duration * 1e+03));
    } catch (InterruptedException e) {
      throw new Error("Unexected interruption", e);
    }
  }
  
  /**
   * Silence player for a certain duration.
   * @param duration Duration in seconds.
   */
  public void silence(double duration) {
    delay(duration);
  }
  
  /**
   * Play a  note by MIDI code.
   * @param midiCode Code for the note [0-127].
   * @param duration Duration in seconds.
   */
  public void play(int midiCode, double duration) {
    channel.noteOn(midiCode, 100);
    delay(duration);
    channel.noteOff(midiCode);
  }

  /**
   * Play a note.
   * @param note Note to play.
   */
  public void play(Note note) {
    Pitch type = note.getPitch();
    if (type != Pitch.S) {
      int midiCode = 12 * note.getOctave() + POS_IN_OCTAVE[type.ordinal()];  
      switch (note.getAccidental()) {
        case SHARP: midiCode ++; break;
        case FLAT:  midiCode --; break;
        default:
      }
      play(midiCode, note.getDuration());
    } else {
      silence(note.getDuration());
    }
  }

  /**
   * Object finalizer.
   */
  @Override
  protected void finalize() {
    synth.close();
  }
}
