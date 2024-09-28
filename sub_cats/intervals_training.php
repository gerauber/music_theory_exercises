<h2> Intervals training</h2>

<hr>

<!-- Message to display instruction -->
<p id="instructionMessage">Choose an interval to play!</p>

<p id="SoundsPlayed">Notes played</p>

<!-- Button to replay the last played sounds -->
<button id="replayButton" visibility="hidden">Replay last interval</button> <!-- Hidden initially -->

<!-- Div to contain the interval buttons -->
<div id="intervalButtons">
    <h3>Ascendent Intervals</h3>
    <div id="ascendentButtons"></div>
    <h3>Descendent Intervals</h3>
    <div id="descendentButtons"></div>
</div>


<script>
    // Mapping of interval names to their corresponding difference values
    const intervalMapping = {
        "Unison": 0,
        "Second Minor": 1,
        "Second Major": 2,
        "Third Minor": 3,
        "Third Major": 4,
        "Fourth": 5,
        "Tritone": 6,
        "Fifth": 7,
        "Sixth Minor": 8,
        "Sixth Major": 9,
        "Seventh Minor": 10,
        "Seventh Major": 11,
        "Octave": 12,
    };

    const noteMapping = {
        "p1": "C1",
        "p2": "C#1/Db1",
        "p3": "D1",
        "p4": "D#1/Eb1",
        "p5": "E1",
        "p6": "F1",
        "p7": "F#1/Gb1",
        "p8": "G1",
        "p9": "G#1/Ab1",
        "p10": "A1",
        "p11": "A#1/Bb1",
        "p12": "B1",
        "p13": "C2",
        "p14": "C#2/Db2",
        "p15": "D2",
        "p16": "D#2/Eb2",
        "p17": "E2",
        "p18": "F2",
        "p19": "F#2/Gb2",
        "p20": "G2",
        "p21": "G#2/Ab2",
        "p22": "A2",
        "p23": "A#2/Bb2",
        "p24": "B2",
        "p25": "C3",
        "p26": "C#3/Db3",
        "p27": "D3",
        "p28": "D#3/Eb3",
        "p29": "E3",
        "p30": "F3",
        "p31": "F#3/Gb3",
        "p32": "G3",
        "p33": "G#3/Ab3",
        "p34": "A3",
        "p35": "A#3/Bb3",
        "p36": "B3",
        "p37": "C4",
        "p38": "C#4/Db4",
        "p39": "D4",
        "p40": "D#4/Eb4",
        "p41": "E4",
        "p42": "F4",
        "p43": "F#4/Gb4",
        "p44": "G4",
        "p45": "G#4/Ab4",
        "p46": "A4",
        "p47": "A#4/Bb4",
        "p48": "B4",
        "p49": "C5",
        "p50": "C#5/Db5",
        "p51": "D5",
        "p52": "D#5/Eb5",
        "p53": "E5",
        "p54": "F5",
        "p55": "F#5/Gb5",
        "p56": "G5",
        "p57": "G#5/Ab5",
        "p58": "A5",
        "p59": "A#5/Bb5",
        "p60": "B5"
    };

    // Variables to hold the last played sounds
    let lastSound1Index, lastSound2Index; 

    // Function to generate the interval buttons for both ascendent and descendent intervals
    function generateIntervalButtons() {
        const ascendentButtonsDiv = document.getElementById("ascendentButtons");
        const descendentButtonsDiv = document.getElementById("descendentButtons");

        // Create buttons for each ascendent interval
        for (const interval in intervalMapping) {
            const button = document.createElement("button");
            button.textContent = interval; // Set button text to interval name
            button.addEventListener("click", function () {
                playIntervalSounds(intervalMapping[interval], true); // Ascendent
            });
            ascendentButtonsDiv.appendChild(button);
        }

        // Create buttons for each descendent interval
        for (const interval in intervalMapping) {
            const button = document.createElement("button");
            button.textContent = interval; // Set button text to interval name
            button.addEventListener("click", function () {
                playIntervalSounds(intervalMapping[interval], false); // Descendent
            });
            descendentButtonsDiv.appendChild(button);
        }
    }

    // Initial call to create the buttons
    generateIntervalButtons();

    // Function to select random sounds based on the given interval difference
    function playIntervalSounds(difference, isAscendent) {
        const min = 1;
        const max = 60;
        const a = max - difference;
        const b = min + difference;
        let sound1Index, sound2Index;

        if (isAscendent) {
            // Randomly select the first sound
            sound1Index = Math.floor(Math.random() * (a - min + 1)) + min; // Ensure there's room for sound2
            // Calculate the second sound index based on the difference
            sound2Index = sound1Index + difference;
        } else {
            // Randomly select the second sound
            sound1Index = Math.floor(Math.random() * (max - b + 1)) + b; // Ensure second sound is higher
            // Calculate the first sound index based on the difference
            sound2Index = sound1Index - difference;
        }

        // Store the last played sounds
        lastSound1Index = sound1Index;
        lastSound2Index = sound2Index;

        // Play the sounds
        playSounds(sound1Index, sound2Index);

        // get name of notes
        key_note1=`p${sound1Index}`
        key_note2=`p${sound2Index}`
        document.getElementById("SoundsPlayed").textContent = noteMapping[key_note1] + " and " + noteMapping[key_note2];

        // Show replay button
        document.getElementById("replayButton").style.display = "inline";
    }

    // Function to play the selected sounds
    function playSounds(sound1Index, sound2Index) {
        const audio1 = new Audio(`../audio/notes/p${sound1Index}.mp3`);
        const audio2 = new Audio(`../audio/notes/p${sound2Index}.mp3`);

        audio1.play();
        setTimeout(function () {
            audio1.pause();
            audio1.currentTime = 0;

            audio2.play();
            setTimeout(function () {
                audio2.pause();
                audio2.currentTime = 0;
            }, 1000); // Wait 1 second before stopping audio2
        }, 1000); // Wait 1 second before playing audio2
    }

    // Add an event listener for the replay button
    document.getElementById("replayButton").addEventListener("click", function () {
        if (lastSound1Index && lastSound2Index) {
            playSounds(lastSound1Index, lastSound2Index); // Replay the last two sounds
        }
    });

</script>

<hr>