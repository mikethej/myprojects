package pco.melody;

import java.io.File;
import java.io.IOException;
import java.io.PrintStream;
import java.util.Locale;
import java.util.Scanner;

/**
 * Melody I/O utility class.
 *
 */
public class MelodyIO {

  
  
  public static Melody load(File file) throws IOException {
    Scanner sc = new Scanner(file);
    sc.useLocale(Locale.ENGLISH);

    // COMPLETAR ...
    
    sc.close();
    return null;
  }
  public static void save(Melody melody, File file) throws IOException {
    PrintStream out = new PrintStream(file);
    
    // COMPLETAR ...
    
    out.close();
  }
  
  // DEIXAR COMO ESTÁ
  private MelodyIO() { }
}
