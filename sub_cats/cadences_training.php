
<h2> Cadences training</h2>

<hr>

<!-- Message to display instruction -->
<p id="instructionMessage">Choose a cadence to play!</p>

<p id="SoundsPlayed">Notes played</p>

<!-- Button to replay the last played sounds -->
<p><button id="replayButton">Replay last cadence</button></p>

<!-- Div to contain the cadence buttons -->
<div id="cadenceButtons"></div>

<!-- debug -->
<!-- <p id="debugSoundcadence" style="font-size: 16px;"></p> -->


<script>
    // Mapping of cadence names to their corresponding difference values
    const cadenceMapping = {
        "Perfect": 0,
        "Plagal": 1,
        "Interrupted": 2,
        "Half": 3,
    };
    const cadenceTypes = ["perf", "plag", "int", "half"];
    const cadenceMappingDist = {
        "perf": [[14, 7, 5, 4], [7, 16, 3, 5]],
        "plag": [[0, 24, 4, 3], [7, 16, 3, 5]],
        "int": [[14, 7, 5, 4], [16, 3, 4, 5]],
        "half": [[12, 12, 4, 3], [1, 7, 5, 4]],
    };

    const noteMapping = {
        "note_1": "F1",
        "note_2": "F#1/Gb1",
        "note_3": "G1",
        "note_4": "G#1/Ab1",
        "note_5": "A1",
        "note_6": "A#1/Bb1",
        "note_7": "B1",
        "note_8": "C2",
        "note_9": "C#2/Db2",
        "note_10": "D2",
        "note_11": "D#2/Eb2",
        "note_12": "E2",
        "note_13": "F2",
        "note_14": "F#2/Gb2",
        "note_15": "G2",
        "note_16": "G#2/Ab2",
        "note_17": "A2",
        "note_18": "A#2/Bb2",
        "note_19": "B2",
        "note_20": "C3",
        "note_21": "C#3/Db3",
        "note_22": "D3",
        "note_23": "D#3/Eb3",
        "note_24": "E3",
        "note_25": "F3",
        "note_26": "F#3/Gb3",
        "note_27": "G3",
        "note_28": "G#3/Ab3",
        "note_29": "A3",
        "note_30": "A#3/Bb3",
        "note_31": "B3",
        "note_32": "C4",
        "note_33": "C#4/Db4",
        "note_34": "D4",
        "note_35": "D#4/Eb4",
        "note_36": "E4",
        "note_37": "F4",
        "note_38": "F#4/Gb4",
        "note_39": "G4",
        "note_40": "G#4/Ab4",
        "note_41": "A4",
        "note_42": "A#4/Bb4",
        "note_43": "B4",
        "note_44": "C5",
        "note_45": "C#5/Db5",
        "note_46": "D5",
        "note_47": "D#5/Eb5",
        "note_48": "E5",
        "note_49": "F5",
        "note_50": "F#5/Gb5",
        "note_51": "G5",
        "note_52": "G#5/Ab5",
        "note_53": "A5",
        "note_54": "A#5/Bb5",
        "note_55": "B5"
    };

    // Variables to hold the last played sounds
    let lastSound1Index; 
    let lastcadenceType;

    // Function to generate the cadence buttons for both ascendent and descendent cadences
    function generatecadenceButtons() {
        const cadenceButtonsDiv = document.getElementById("cadenceButtons");

        // Create buttons for each ascendent cadence
        for (const cadence in cadenceMapping) {
            const button = document.createElement("button");
            button.textContent = cadence; // Set button text to cadence name
            button.addEventListener("click", function () {
                playcadenceSounds(cadenceMapping[cadence]); // Ascendent
            });
            cadenceButtonsDiv.appendChild(button);
        }
    }

    // Initial call to create the buttons
    generatecadenceButtons();

    // Function to select random sounds based on the given cadence difference
    function playcadenceSounds(cadenceType) {
        let sound1Index;
        const minVar = 1;
        const maxVar = 12;

        // select the height randomly
        sound1Index = Math.floor(Math.random() * (maxVar - minVar + 1)) + minVar; // +1 otherwise it will never go until 60

        // Store the last played sounds
        lastSound1Index = sound1Index;
        lastcadenceType = cadenceType;

        // Play the sounds
        playSounds(cadenceType, sound1Index);


        // get name of notes
        let sound1comp = sound1Index + cadenceMappingDist[cadenceTypes[cadenceType]][0][0];
        let sound2comp = sound1comp + cadenceMappingDist[cadenceTypes[cadenceType]][0][1];
        let sound3comp = sound2comp + cadenceMappingDist[cadenceTypes[cadenceType]][0][2];
        let sound4comp = sound3comp + cadenceMappingDist[cadenceTypes[cadenceType]][0][3];
        key_note1=`note_${sound1comp}`;
        key_note2=`note_${sound2comp}`;
        key_note3=`note_${sound3comp}`;
        key_note4=`note_${sound4comp}`;
        let sound1compa = sound1Index + cadenceMappingDist[cadenceTypes[cadenceType]][1][0];
        let sound2compa = sound1compa + cadenceMappingDist[cadenceTypes[cadenceType]][1][1];
        let sound3compa = sound2compa + cadenceMappingDist[cadenceTypes[cadenceType]][1][2];
        let sound4compa = sound3compa + cadenceMappingDist[cadenceTypes[cadenceType]][1][3];
        key_note1a=`note_${sound1compa}`;
        key_note2a=`note_${sound2compa}`;
        key_note3a=`note_${sound3compa}`;
        key_note4a=`note_${sound4compa}`;
        document.getElementById("SoundsPlayed").textContent = noteMapping[key_note1] + ",  " + noteMapping[key_note2] + ", " + noteMapping[key_note3] + ", " + noteMapping[key_note4] + "  and  " + noteMapping[key_note1a] + ",  " + noteMapping[key_note2a] + ", " + noteMapping[key_note3a] + ", " + noteMapping[key_note4a];


        // Show replay button
        // document.getElementById("replayButton").style.display = "inline";

        // Debug
        // document.getElementById("debugSoundcadence").textContent = `cadence: ${cadenceType}, sound: ${sound1Index}`;

    }

    // Function to play the selected sounds
    function playSounds(correctcadence, sound1Index, partofpath="cadences/cad_", len=2000) {
        const audio1 = new Audio(`../audio/${partofpath}${cadenceTypes[correctcadence]}_${sound1Index}.mp3`);

        audio1.play();
        setTimeout(function () {
            audio1.pause();
            audio1.currentTime = 0;
        }, len); // Wait 1 second before playing audio2
    }

    // Add an event listener for the replay button
    document.getElementById("replayButton").addEventListener("click", function () {
        if (lastSound1Index) {
            playSounds(lastcadenceType, lastSound1Index); // Replay the sound
        }
    });


</script>

<hr>