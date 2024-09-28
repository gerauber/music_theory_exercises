<h2> Scales exercises</h2>

<hr>

<h3> Major, Minor (natural, harmonic or melodic) scales</h3>

<!-- Main buttons-->
<button id="playButton">Play random scales</button>
<button id="replayButton">Replay scale</button> 

<!-- Message to display -->
<p id="resultMessage" style="margin-bottom: 20px;">Let's see what you'll answer!</p>

<!-- guess buttons -->
<div id="guessButtons"></div>

<!-- debug -->
<!-- <p id="debugSoundscale" style="font-size: 16px;"></p> -->

<script>
    // Variable
    let correctscale = 0;
    let sound1Index; // selected sounds
    let audio1; // Audio objects for playback

    // Mapping of numbers to scale names
    const scaleNames = ["Major", "Minor Nat.", "Minor Harm.", "Minor Mel."];
    const scaleTypes = ["maj", "minnat", "minharm", "minmel"];

    // generate the scales guess buttons
    function generateGuessButtons() {
        const guessButtonsDiv = document.getElementById("guessButtons");
        guessButtonsDiv.innerHTML = ''; // Clear previous buttons

        // Create buttons for each scale
        for (let i = 0; i < scaleNames.length; i++) {
            const button = document.createElement("button");
            button.textContent = scaleNames[i]; // Set button text to scale name
            button.addEventListener("click", function () {
                checkGuess(i); // Pass the numerical value of the scale
            });
            guessButtonsDiv.appendChild(button);
        }
    }

    // Initial buttons with scale names
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
        correctscale = Math.floor(Math.random() * (maxType + 1));

        // Play
        playSounds();
    }

    // play the selected sounds
    function playSounds() {
        // Create Audio
        audio1 = new Audio(`../audio/scales/scale_${scaleTypes[correctscale]}_${sound1Index}.mp3`);

        audio1.play();
        setTimeout(function () {
            audio1.pause();
            audio1.currentTime = 0;
        }, 14000);
    }

    // Play random sounds and reset messages
    document.getElementById("playButton").addEventListener("click", function () {
        selectAndPlaySounds();
        document.getElementById("replayButton").textContent = "Replay scale"; 

        document.getElementById("resultMessage").textContent = "Let's see what you'll answer!";
    });

    // check the user's guess
    function checkGuess(guess) {
        const resultMessage = document.getElementById("resultMessage");
        if (guess === correctscale) {
            resultMessage.innerHTML = "Correct! The scale is <b>" + scaleNames[correctscale] + "</b>";
            sound1Index = null;

            document.getElementById("replayButton").textContent = "Hear again the scale"; 
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
            }, 14000);
        }
    });

</script>

<!-- ------------------------------------------------------------------------------------------------ -->
<hr>