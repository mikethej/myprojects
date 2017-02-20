package pco.melody;

// COMPLETE ESTA CLASSE
public class Note {

  public Note(double duration) {

  }

  public Note(double duration, Pitch pitch, int octave, Acc acc) {

  }

  public Pitch getPitch() {
    return null;
  }

  public Acc getAccidental() {
    return null;
  }

  public int getOctave() {
    return -1;
  }

  public double getDuration() {
    return -1;
  }

  public boolean isSilence() {
    return true;
  }

  public String toString() {
    return "";
  }

  public Note octaveDown() {
    return null;
  }

  public Note octaveUp() {
    return null;
  }

  public Note changeTempo(double factor) {
    return null;
  }

}
