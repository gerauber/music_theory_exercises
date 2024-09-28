<h2> Cadences exercises</h2>

<hr>

<h3> Perfect, Plagal, Interrupted and Half cadences</h3>

<!-- Main buttons-->
<button id="playButton">Play random cadences</button>
<button id="replayButton">Replay cadence</button> 

<!-- Message to display -->
<p id="resultMessage" style="margin-bottom: 20px;">Let's see what you'll answer!</p>

<!-- guess buttons -->
<div id="guessButtons"></div>

<!-- debug -->
<!-- <p id="debugSoundcadence" style="font-size: 16px;"></p> -->

<script>
    // Variable
    let correctcadence = 0;
    let sound1Index; // selected sounds
    let audio1; // Audio objects for playback

    // Mapping of numbers to cadence names
    const cadenceNames = ["Perfect", "Plagal", "Interrupted", "Half"];
    const cadenceTypes = ["perf", "plag", "int", "half"];

    // generate the cadences guess buttons
    function generateGuessButtons() {
        const guessButtonsDiv = document.getElementById("guessButtons");
        guessButtonsDiv.innerHTML = ''; // Clear previous buttons

        // Create buttons for each cadence
        for (let i = 0; i < cadenceNames.length; i++) {
            const button = document.createElement("button");
            button.textContent = cadenceNames[i]; // Set button text to cadence name
            button.addEventListener("click", function () {
                checkGuess(i); // Pass the numerical value of the cadence
            });
            guessButtonsDiv.appendChild(button);
        }
    }

    // Initial buttons with cadence names
    generateGuessButtons();

    // select random sounds and play them
    function selectAndPlaySounds() {
        const minType = 0;
        const maxType = 3;
        const minVar = 1;
        const maxVar = 12;

        // select the first sound between p1 and p60
        sound1Index = Math.floor(Math.random() * (maxVar - minVar + 1)) + minVar; 

        // difference
        correctcadence = Math.floor(Math.random() * (maxType + 1));

        // Play
        playSounds();
    }

    // play the selected sounds
    function playSounds() {
        // Create Audio
        audio1 = new Audio(`../audio/cadences/cad_${cadenceTypes[correctcadence]}_${sound1Index}.mp3`);

        audio1.play();
        setTimeout(function () {
            audio1.pause();
            audio1.currentTime = 0;
        }, 2000);
    }

    // Play random sounds and reset messages
    document.getElementById("playButton").addEventListener("click", function () {
        selectAndPlaySounds();
        document.getElementById("replayButton").textContent = "Replay cadence"; 

        document.getElementById("resultMessage").textContent = "Let's see what you'll answer!";
    });

    // check the user's guess
    function checkGuess(guess) {
        const resultMessage = document.getElementById("resultMessage");
        if (guess === correctcadence) {
            resultMessage.innerHTML = "Correct! The cadence is <b>" + cadenceNames[correctcadence] + "</b>";
            sound1Index = null;

            document.getElementById("replayButton").textContent = "Hear again the cadence"; 
        } else {
            resultMessage.textContent = "Wrong! Try again.";
        }
    }

    // Replay buttons functionality
    document.getElementById("replayButton").addEventListener("click", function () {
        if (audio1) {
            audio1.currentTime = 0;
            audio1.play();
            setTimeout(function () {
                audio1.pause();
                audio1.currentTime = 0;
            }, 2000);
        }
    });

</script>

<!-- ------------------------------------------------------------------------------------------------ -->
<hr>