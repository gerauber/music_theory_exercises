<h2> Scales training</h2>


<hr>

<!-- Message to display instruction -->
<p id="instructionMessage">Choose a scale to play!</p>

<p id="SoundsPlayed">Notes played</p>

<!-- Button to replay the last played sounds -->
<p><button id="replayButton">Replay last scale</button></p>

<!-- Div to contain the scale buttons -->
<div id="scaleButtons"></div>

<!-- debug -->
<!-- <p id="debugSoundscale" style="font-size: 16px;"></p> -->


<script>
    // Mapping of scale names to their corresponding difference values
    const scaleMapping = {
        "Major": 0,
        "Minor Nat.": 1,
        "Minor Harm.": 2,
        "Minor Mel.": 3,
    };
    const scaleTypes = ["maj", "minnat", "minharm", "minmel"];
    // const scaleMappingDist = {
    //     "perf": [[15, 7, 5, 4], [8, 16, 3, 5]],
    //     "plag": [[1, 24, 4, 3], [8, 16, 3, 5]],
    //     "int": [[15, 7, 5, 4], [17, 3, 4, 5]],
    //     "half": [[13, 12, 4, 3], [15, 7, 5, 4]],
    // };

    const noteMapping = {
        "note_1": "C2",
        "note_2": "C#2/Db2",
        "note_3": "D2",
        "note_4": "D#2/Eb2",
        "note_5": "E2",
        "note_6": "F2",
        "note_7": "F#2/Gb2",
        "note_8": "G2",
        "note_9": "G#2/Ab2",
        "note_10": "A2",
        "note_11": "A#2/Bb2",
        "note_12": "B2",
        "note_13": "C3",
        "note_14": "C#3/Db3",
        "note_15": "D3",
        "note_16": "D#3/Eb3",
        "note_17": "E3",
        "note_18": "F3",
        "note_19": "F#3/Gb3",
        "note_20": "G3",
        "note_21": "G#3/Ab3",
        "note_22": "A3",
        "note_23": "A#3/Bb3",
        "note_24": "B3",
        "note_25": "C4"
    };

    // Variables to hold the last played sounds
    let lastSound1Index; 
    let lastscaleType;

    // Function to generate the scale buttons for both ascendent and descendent scales
    function generatescaleButtons() {
        const scaleButtonsDiv = document.getElementById("scaleButtons");

        // Create buttons for each ascendent scale
        for (const scale in scaleMapping) {
            const button = document.createElement("button");
            button.textContent = scale; // Set button text to scale name
            button.addEventListener("click", function () {
                playscaleSounds(scaleMapping[scale]); // Ascendent
            });
            scaleButtonsDiv.appendChild(button);
        }
    }

    // Initial call to create the buttons
    generatescaleButtons();

    // Function to select random sounds based on the given scale difference
    function playscaleSounds(scaleType) {
        let sound1Index;
        const minVar = 1;
        const maxVar = 12;

        // select the height randomly
        sound1Index = Math.floor(Math.random() * (maxVar - minVar + 1)) + minVar; // +1 otherwise it will never go until 60

        // Store the last played sounds
        lastSound1Index = sound1Index;
        lastscaleType = scaleType;

        // Play the sounds
        playSounds(scaleType, sound1Index);


        // get name of notes
        // let sound1comp = sound1Index + scaleMappingDist[scaleTypes[scaleType]][0][0];
        // let sound2comp = sound1comp + scaleMappingDist[scaleTypes[scaleType]][0][1];
        // let sound3comp = sound2comp + scaleMappingDist[scaleTypes[scaleType]][0][2];
        // let sound4comp = sound3comp + scaleMappingDist[scaleTypes[scaleType]][0][3];
        // key_note1=`note_${sound1comp}`;
        // key_note2=`note_${sound2comp}`;
        // key_note3=`note_${sound3comp}`;
        // key_note4=`note_${sound4comp}`;
        // let sound1compa = sound1Index + scaleMappingDist[scaleTypes[scaleType]][1][0];
        // let sound2compa = sound1compa + scaleMappingDist[scaleTypes[scaleType]][1][1];
        // let sound3compa = sound2compa + scaleMappingDist[scaleTypes[scaleType]][1][2];
        // let sound4compa = sound3compa + scaleMappingDist[scaleTypes[scaleType]][1][3];
        // key_note1a=`note_${sound1compa}`;
        // key_note2a=`note_${sound2compa}`;
        // key_note3a=`note_${sound3compa}`;
        // key_note4a=`note_${sound4compa}`;
        // document.getElementById("SoundsPlayed").textContent = noteMapping[key_note1] + ",  " + noteMapping[key_note2] + ", " + noteMapping[key_note3] + ", " + noteMapping[key_note4] + "  and  " + noteMapping[key_note1a] + ",  " + noteMapping[key_note2a] + ", " + noteMapping[key_note3a] + ", " + noteMapping[key_note4a];


        // Show replay button
        // document.getElementById("replayButton").style.display = "inline";

        // Debug
        // document.getElementById("debugSoundscale").textContent = `scale: ${scaleType}, sound: ${sound1Index}`;

    }

    // Function to play the selected sounds
    function playSounds(correctscale, sound1Index, partofpath="scales/scale_", len=14000) {
        const audio1 = new Audio(`../audio/${partofpath}${scaleTypes[correctscale]}_${sound1Index}.mp3`);

        audio1.play();
        setTimeout(function () {
            audio1.pause();
            audio1.currentTime = 0;
        }, len); // Wait 1 second before playing audio2
    }

    // Add an event listener for the replay button
    document.getElementById("replayButton").addEventListener("click", function () {
        if (lastSound1Index) {
            playSounds(lastscaleType, lastSound1Index); // Replay the sound
        }
    });


</script>

<hr>