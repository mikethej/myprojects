package pco.melody;


import java.awt.Component;
import java.awt.Dimension;
import java.awt.FlowLayout;
import java.awt.GridLayout;
import java.awt.LayoutManager;
import java.awt.Toolkit;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.io.File;
import java.io.IOException;
import java.text.DecimalFormat;

import javax.swing.Box;
import javax.swing.ImageIcon;
import javax.swing.JButton;
import javax.swing.JCheckBox;
import javax.swing.JFileChooser;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.JSlider;
import javax.swing.JSpinner;
import javax.swing.JTextField;
import javax.swing.SpinnerNumberModel;
import javax.swing.filechooser.FileFilter;

/**
 * Melody test program. 
 *
 * @author Eduardo R. B. Marques (adaptation, refactoring)
 * @author Allison Obourn and Marty Stepp (original code)
 */
public class Program implements ActionListener { // , StdAudio.AudioEventListener {
  // constants for important directories used by the program

  /** Program entry point. 
   * @param args Arguments (ignored)
   */
  public static void main(String[] args) {
    new Program();
  }

  //State 
  /** Melody */
  private Melody melody;
  /** Indicates if melody is playing */
  private boolean playing; 
  /** Cached melody duration */
  private double melodyDuration;


  /**
   * Constructor.
   */
  private Program() {
    melody = null;
    melodyDuration = 0;
    createComponents();
    layoutComponents();
    frame.setVisible(true);
  }

  /**
   * Method callback for handling commands.
   * @param event Event.
   */
  @Override
  public void actionPerformed(ActionEvent event) {
    switch (event.getActionCommand()) {
      case "Play":  handlePlay(); break;
      case "Stop":  handleStop(); break;
      case "Load":  handleLoad(); break;
      case "Save":  handleSave(); break;
      case "Reverse": handleReverse(); break;
      case "Up": handleUp(); break;
      case "Down": handleDown(); break;
      case "Change Tempo": handleChangeTempo(); break;
    }
  }
  // GUI elements
  /** Main frame */
  private JFrame frame;
  /** Text field for melody title */
  private JTextField titleField;
  /** Text field for melody author. */
  private JTextField authorField;
  /** Status label. */
  private JLabel statusLabel;
  /** Play button. */
  private JButton playButton; 
  /** Stop button. */
  private JButton stopButton;
  /** Load button. */
  private JButton loadButton;
  /** Append-option checkbox. */
  private JCheckBox appendCheckBox;
  /** Save button. */
  private JButton saveButton;
  /** Reverse button. */
  private JButton reverseButton;
  /** Change-tempo button. */
  private JButton changeTempoButton;
  /** Change-tempo spinner */
  private JSpinner changeTempoSpinner; // numeric duration field
  /** Octave-up button */
  private JButton octaveUpButton;
  /** Octave-down button */
  private JButton octaveDownButton;
  /** File chooser */
  private JFileChooser fileChooser; 
  /** Melody time slider */
  private JSlider currentTimeSlider; // displays current time in the song
  /** Melody time label */
  private JLabel currentTimeLabel;
  /** Melody total time label */
  private JLabel totalTimeLabel;

  /** Handle "Load" command. */
  private void handleLoad()  {
    if (fileChooser.showOpenDialog(frame) != JFileChooser.APPROVE_OPTION) {
      return;
    }
    File selected = fileChooser.getSelectedFile();
    if (selected == null) {
      return;
    }
    try {
      Melody m = MelodyIO.load(selected);
      if (! appendCheckBox.isSelected()) {
        melody = m;
      } else {
        melody.append(m);
      }
      titleField.setText(melody.getTitle());
      authorField.setText(melody.getAuthor());
      melodyDuration = melody.getDuration();
      changeTempoSpinner.setValue(1.0);
      statusLabel.setText("Melody loaded");
      setCurrentTime(0);
      totalTimeLabel.setText(String.format("%08.2f s", melodyDuration));
      statusLabel.setText("Loaded " + selected.getName() + " !");
      doEnabling();
    } catch (IOException e) {
      displayError("I/O error", "I/O error: " + e.getMessage());
    }
  }

  /** Handle "Save" command. */
  private void handleSave() {
    if (fileChooser.showSaveDialog(frame) != JFileChooser.APPROVE_OPTION) {
      return;
    }
    File selected = fileChooser.getSelectedFile();
    if (selected == null) {
      return;
    }
    try {
      melody.setTitle(titleField.getText());
      melody.setAuthor(authorField.getText());
      MelodyIO.save(melody, selected);
      statusLabel.setText("Saved to " + selected.getName() + " !");
    } catch (IOException e) {
      displayError("I/O error", e.getMessage());
    }
  }


  /** Handle "Play" command. */
  private void handlePlay() {
    if (melody != null) {
      setCurrentTime(0.0);
      Thread playThread = new Thread(new Runnable() {
        public void run() {
          //StdAudio.setMute(false);
          playing = true;
          doEnabling();
          double time = 0;
          for (int i = 0; playing && i < melody.notes(); i++) {
            Note n = melody.get(i);
            System.out.println(i + " " + n.toString());
            if (n.isSilence()) {
              statusLabel.setText(String.format("Silence: %.2f", n.getDuration()));
            } else {
              statusLabel.setText(
                  String.format("Playing: %.2f %s %d %s",
                      n.getDuration(), n.getPitch(), n.getOctave(),
                      n.getAccidental()));
            }
            SoundPlayer.getPlayer().play(n);
            time += n.getDuration();
            setCurrentTime(time);
          }
          statusLabel.setText("Done!");
          playing = false;
          setCurrentTime(0);
          doEnabling();
        }
      });
      playThread.start();
    }
  }


  /** Handle "Stop" command. */
  private void handleStop() {
    if (playing) {
      statusLabel.setText("Stopped!");
      playing = false;
    }
  }

  /** Handle "Reverse" command. */
  private void handleReverse() {
    melody.reverse();
    statusLabel.setText("Reversed!");
  }

  /** Handle "Change Tempo" command. */
  private void handleChangeTempo() {
    double factor = ((Double) changeTempoSpinner.getValue()).doubleValue();
    melody.changeTempo(factor);
    melodyDuration = melody.getDuration();
    totalTimeLabel.setText(String.format("%08.2f s", melodyDuration));
    statusLabel.setText("Tempo changed!");
  }

  /** Handle "Up" command. */
  private void handleUp() {
    melody.octaveUp();
    statusLabel.setText("One octave up!");
  }

  /** Handle "Down" command. */
  private void handleDown() {
    melody.octaveDown();
    statusLabel.setText("One octave down!");
  }

  /**
   * Create GUI components.
   */
  private void createComponents() {
    frame = new JFrame("PCO/PPO -- Melody Test program");
    frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
    frame.setResizable(false);

    fileChooser = new JFileChooser(".");
    fileChooser.setFileFilter(new FileFilter() {
      @Override
      public boolean accept(File f) {
        return f.isDirectory() || f.getName().endsWith(".txt");
      }
      @Override
      public String getDescription() {
        return "Melody files (*.txt)";
      }
    });
    statusLabel = new JLabel("Welcome!");
    titleField = new JTextField("", 30);
    authorField = new JTextField("", 30);
    playButton = createButton("Play");
    stopButton = createButton("Stop");
    loadButton = createButton("Load");
    appendCheckBox = new JCheckBox("Append");
    saveButton = createButton("Save");
    reverseButton = createButton("Reverse");
    octaveUpButton = createButton("Up");
    octaveDownButton = createButton("Down");
    changeTempoButton = createButton("Change");
    changeTempoButton.setActionCommand("Change Tempo");
    changeTempoSpinner = new JSpinner(new SpinnerNumberModel(1.0, 0.1, 9.9, 0.1));

    currentTimeSlider = new JSlider(/* min */0, /* max */100);
    currentTimeSlider.setValue(0);
    currentTimeSlider.setMajorTickSpacing(10);
    currentTimeSlider.setMinorTickSpacing(5);
    currentTimeSlider.setPaintLabels(false);
    currentTimeSlider.setPaintTicks(true);
    currentTimeSlider.setSnapToTicks(false);
    currentTimeSlider.setPreferredSize(new Dimension(300,
        currentTimeSlider.getPreferredSize().height));
    currentTimeLabel = new JLabel("000000.0 /");
    totalTimeLabel = new JLabel("000000.0 s");

    JSpinner.NumberEditor editor = (JSpinner.NumberEditor) changeTempoSpinner.getEditor();
    DecimalFormat format = editor.getFormat();
    format.setMinimumFractionDigits(1);
    changeTempoSpinner.setValue(1.0);
    doEnabling();
  }

  /** 
   * Layout GUI components. 
   */
  private void layoutComponents() {
    Box overallLayout = Box.createVerticalBox();
    overallLayout.add(createPanel(statusLabel));
    overallLayout.add(createPanel(new JLabel("Title:"), titleField));
    overallLayout.add(createPanel(new JLabel("Author:"), authorField));
    overallLayout.add(createPanel(currentTimeSlider,
        createPanel(new GridLayout(2, 1), currentTimeLabel, totalTimeLabel)));
    overallLayout.add(createPanel(loadButton, appendCheckBox, saveButton, playButton, stopButton));
    overallLayout.add(createPanel(reverseButton, octaveUpButton, octaveDownButton));
    overallLayout.add(createPanel(new JLabel("Tempo: "), changeTempoSpinner,
        changeTempoButton));
    frame.setContentPane(overallLayout);
    frame.pack();
    Dimension screenSize = Toolkit.getDefaultToolkit().getScreenSize();
    frame.setLocation(screenSize.width/2 - frame.getWidth()/2,
        screenSize.height/2 - frame.getHeight()/2);
  }

  /** 
   * Enable/disable GUI components according to state. 
   */
  private void doEnabling() {
    titleField.setEnabled(melody != null);
    authorField.setEnabled(melody != null);
    playButton.setEnabled(melody != null && !playing);
    saveButton.setEnabled(melody != null && !playing);
    stopButton.setEnabled(melody != null && playing);
    loadButton.setEnabled(!playing);
    appendCheckBox.setEnabled(!playing);
    currentTimeSlider.setEnabled(false);
    reverseButton.setEnabled(melody != null && !playing);
    octaveUpButton.setEnabled(melody != null && !playing);
    octaveDownButton.setEnabled(melody != null && !playing);
    changeTempoButton.setEnabled(melody != null && !playing);
    changeTempoSpinner.setEnabled(melody != null && !playing);
  }



  /**
   * Sets the current time for the display slider/label.
   * @param time Time.
   */
  private void setCurrentTime(double time) {
    time = Math.max(0, Math.min(melodyDuration, time));
    currentTimeLabel.setText(String.format("%08.2f /", time));
    currentTimeSlider.setValue((int) (100 * time / melodyDuration));
  }
  
  /** 
   * Display error message using a pop-up window.
   * @param title Window title.
   * @param message Window message.
   */
  private void displayError(String title, String message) {
    JOptionPane.showMessageDialog(frame, message, title, JOptionPane.ERROR_MESSAGE);
  }
  /** 
   * Create new panel for specified components.
   * @param components Components in panel.
   * @return A new panel.
   */
  private static JPanel createPanel(Component... components) {
    return createPanel(new FlowLayout(FlowLayout.CENTER), components);
  }
  /** 
   * Create new panel with given layout for specified components 
   * @param layout Layout.
   * @param components Components in panel.
   * @return A new panel.
   */
  private static JPanel createPanel(LayoutManager layout, Component... components) {
    JPanel panel = new JPanel(layout);
    for (Component comp : components) {
      panel.add(comp);
    }
    return panel;
  }
  /**
   * Create button.
   * @param text Button text.
   * @return A new button.
   */
  private JButton createButton(String text) {
    JButton button = new JButton(text);
    button.setIcon(new ImageIcon("resources/icons/" + text.toLowerCase() + ".gif"));
    button.addActionListener(this);
    return button;
  }

}
