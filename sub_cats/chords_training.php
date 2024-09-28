<h2> Chords training</h2>

<hr>

<!-- Message to display instruction -->
<p id="instructionMessage">Choose a chord to play!</p>

<p id="SoundsPlayed">Notes played</p>

<!-- Button to replay the last played sounds -->
<button id="replayButton">Replay last chord</button>
<button id="replayButtonSep">Replay last chord separated</button> 

<!-- Div to contain the chord buttons -->
<h3> Diminished, Major, Minor, Augmented chords</h3>
<p><div id="chordButtons"></div></p>
<h3> Minor and Major chords types</h3>
<p><div id="chordButtonsInv"></div></p>
<h3> 7th chords types</h3>
<p><div id="chordButtons7th"></div></p>

<!-- debug -->
<!-- <p id="debugSoundchord" style="font-size: 16px;"></p> -->


<script>
    // Mapping of chord names to their corresponding difference values
    const chordMapping = {
        "Diminished": 0,
        "Minor": 1,
        "Major": 2,
        "Augmented": 3,
    };
    const chordTypes = ["dim", "min", "maj", "aug"];
    const chordMappingDist = {
        "dim": [0, 3, 3],
        "min": [0, 3, 4],
        "maj": [0, 4, 3],
        "aug": [0, 4, 4],
    };
    const chordMappingInv = {
        "Minor Inversed": 0, 
        "Minor twice Inversed": 1,
        "Major Inversed": 2, 
        "Major twice Inversed": 3
    };
    const chordTypesInv = ["mininv1", "mininv2", "majinv1", "majinv2"];
    const chordMappingDistInv = {
        "mininv1": [3, 4, 5],
        "mininv2": [7, 5, 3],
        "majinv1": [4, 3, 5],
        "majinv2": [7, 5, 4],
    };
    const chordMapping7th = {
        "Diminished": 0, 
        "Dominant": 1
    };
    const chordTypes7th = ["dim7th", "dom7th"];
    const chordMappingDist7th = {
        "dim7th": [0, 3, 3, 3],
        "dom7th": [0, 4, 3, 3],
    };

    const noteMapping = {
        "note_1": "C3",
        "note_2": "C#3/Db3",
        "note_3": "D3",
        "note_4": "D#3/Eb3",
        "note_5": "E3",
        "note_6": "F3",
        "note_7": "F#3/Gb3",
        "note_8": "G3",
        "note_9": "G#3/Ab3",
        "note_10": "A3",
        "note_11": "A#3/Bb3",
        "note_12": "B3",
        "note_13": "C4",
        "note_14": "C#4/Db4",
        "note_15": "D4",
        "note_16": "D#4/Eb4",
        "note_17": "E4",
        "note_18": "F4",
        "note_19": "F#4/Gb4",
        "note_20": "G4",
        "note_21": "G#4/Ab4",
        "note_22": "A4",
        "note_23": "A#4/Bb4",
        "note_24": "B4",
        "note_25": "C5",
        "note_26": "C#5/Db5",
        "note_27": "D5",
        "note_28": "D#5/Eb5"
    };

    // Variables to hold the last played sounds
    let lastSound1Index; 
    let lastchordType;
    let lastMappingDist;
    let lastchordTypeArray;

    // Function to generate the chord buttons 
    function generatechordButtons(buttonContainerId, chordMap, chordTypeArray, mappingDist, is7th) {
        const chordButtonsDiv = document.getElementById(buttonContainerId);

        // Create buttons for each chord type in the map
        for (const chord in chordMap) {
            const button = document.createElement("button");
            button.textContent = chord; // Set button text to chord name
            button.addEventListener("click", function () {
                playchordSounds(chordMap[chord], chordTypeArray, mappingDist, is7th); // Pass all necessary details
            });
            chordButtonsDiv.appendChild(button);
        }
    }

    // Initial call to create the buttons for each category
    generatechordButtons("chordButtons", chordMapping, chordTypes, chordMappingDist, false);
    generatechordButtons("chordButtonsInv", chordMappingInv, chordTypesInv, chordMappingDistInv, false);
    generatechordButtons("chordButtons7th", chordMapping7th, chordTypes7th, chordMappingDist7th, true);

    // Function to select random sounds based on the given chord type and mapping
    function playchordSounds(chordTypeIndex, chordTypeArray, mappingDist, is7th) {
        let sound1Index;
        const minVar = 1;
        const maxVar = 12;

        // select the base note randomly
        sound1Index = Math.floor(Math.random() * (maxVar - minVar + 1)) + minVar;

        // Store the last played sounds for replay functionality
        lastSound1Index = sound1Index;
        lastchordType = chordTypeIndex;
        lastMappingDist = mappingDist;
        lastchordTypeArray = chordTypeArray;

        // Play the sounds for the selected chord type
        playSounds(chordTypeIndex, sound1Index, chordTypeArray, mappingDist);

        // Get the names of the notes being played
        let sound1comp = sound1Index + mappingDist[chordTypeArray[chordTypeIndex]][0];
        let sound2comp = sound1comp + mappingDist[chordTypeArray[chordTypeIndex]][1];
        let sound3comp = sound2comp + mappingDist[chordTypeArray[chordTypeIndex]][2];
        let key_note1 = `note_${sound1comp}`;
        let key_note2 = `note_${sound2comp}`;
        let key_note3 = `note_${sound3comp}`;

        if (is7th) {
            let sound4comp = sound1Index + mappingDist[chordTypeArray[chordTypeIndex]][0] + mappingDist[chordTypeArray[chordTypeIndex]][1] + mappingDist[chordTypeArray[chordTypeIndex]][2];
            let key_note4 = `note_${sound4comp}`;
            document.getElementById("SoundsPlayed").textContent = noteMapping[key_note1] + ",  " + noteMapping[key_note2] + ",  " + noteMapping[key_note3] + " and " + noteMapping[key_note4];
        } else {
            document.getElementById("SoundsPlayed").textContent = noteMapping[key_note1] + ",  " + noteMapping[key_note2] + " and " + noteMapping[key_note3];
        }
        // Show replay buttons
        document.getElementById("replayButton").style.display = "inline";
        document.getElementById("replayButtonSep").style.display = "inline";
    }

    // Function to play the selected sounds
    function playSounds(correctChord, sound1Index, chordTypeArray, mappingDist, partofpath="chords/chord_", len=2000) {
        const audio1 = new Audio(`../audio/${partofpath}${chordTypeArray[correctChord]}_${sound1Index}.mp3`);

        audio1.play();
        setTimeout(function () {
            audio1.pause();
            audio1.currentTime = 0;
        }, len);
    }

    // Event listener for replay button (same chord)
    document.getElementById("replayButton").addEventListener("click", function () {
        if (lastSound1Index) {
            playSounds(lastchordType, lastSound1Index, lastchordTypeArray, lastMappingDist); // Replay the last played chord
        }
    });

    // Event listener for replay button (separate path)
    document.getElementById("replayButtonSep").addEventListener("click", function () {
        if (lastSound1Index) {
            const lastpartofpath = "chords/repeat/chord_";
            playSounds(lastchordType, lastSound1Index, lastchordTypeArray, lastMappingDist, lastpartofpath, len=3000); // Replay in a separate audio path
        }
    });
</script>

<hr>