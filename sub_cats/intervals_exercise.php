<h2> Intervals exercises</h2>


<hr>
<!-- Main buttons-->
<button id="playButton">Play random intervals</button>
<button id="replayButton">Replay interval</button> 

<!-- Message to display -->
<p id="resultMessage" style="margin-bottom: 20px;">Let's see what you'll answer!</p>

<!-- guess buttons -->
<div id="guessButtons"></div>

<!-- debug -->
<!-- 
<p id="debugSoundIndices" style="font-size: 16px;"></p>
<p id="debugSoundInterval" style="font-size: 16px;"></p> -->


<script>
    // Variable
    let correctDifference = 0;
    let sound1Index, sound2Index; // selected sounds
    let audio1, audio2; // Audio objects for playback
    const maxint = 13;

    // Mapping of numbers to interval names
    const intervalNames = ["Unison", "Second Minor", "Second Major", "Third Minor", "Third Major", "Fourth", "Tritone", "Fifth", "Sixth Minor", "Sixth Major", "Seventh Minor", "Seventh Major", "Octave"];

    // generate the interval guess buttons
    function generateGuessButtons() {
        const guessButtonsDiv = document.getElementById("guessButtons");
        guessButtonsDiv.innerHTML = ''; // Clear previous buttons

        // Create buttons for each interval
        for (let i = 0; i < intervalNames.length; i++) {
            const button = document.createElement("button");
            button.textContent = intervalNames[i]; // Set button text to interval name
            button.addEventListener("click", function () {
                checkGuess(i); // Pass the numerical value of the interval
            });
            guessButtonsDiv.appendChild(button);
        }
    }

    // Initial buttons with interval names
    generateGuessButtons();

    // select random sounds and play them
    function selectAndPlaySounds() {
        const min = 1;
        const max = 60;

        // select the first sound between p1 and p60
        sound1Index = Math.floor(Math.random() * (max - min + 1)) + min; // +1 otherwise it will never go until 60

        // second sound with a max difference of 8
        if (sound1Index <= max - maxint) {
            // 9 is actually 8 + 1. In the condition of floor, the result will never be bigger than 8
            sound2Index = sound1Index + Math.floor(Math.random() * maxint); 
        } else {
            sound2Index = sound1Index + Math.floor(Math.random() * (max - sound1Index)); // restricts to valid range
        }

        // difference
        correctDifference = Math.abs(sound2Index - sound1Index);


        // Debug
        // document.getElementById("debugSoundIndices").textContent = `sound1Index: ${sound1Index}, sound2Index: ${sound2Index}`;
        // document.getElementById("debugSoundInterval").textContent = `correctDifference: ${correctDifference}`;


        // Play
        playSounds();
    }

    // play the selected sounds
    function playSounds() {
        // Create Audio
        audio1 = new Audio(`../audio/notes/p${sound1Index}.mp3`);
        audio2 = new Audio(`../audio/notes/p${sound2Index}.mp3`);

        audio1.play();
        setTimeout(function () {
            audio1.pause();
            audio1.currentTime = 0;

            audio2.play();
            setTimeout(function () {
                audio2.pause();
                audio2.currentTime = 0;
            }, 1000);
        }, 1000);
    }

    // two random sounds and allow replay
    document.getElementById("playButton").addEventListener("click", function () {
        selectAndPlaySounds();
        replayButton.textContent = "Replay interval"; // Change text

        // Reset result message to the default instruction
        document.getElementById("resultMessage").textContent = "Let's see what you'll answer!";
    });

    // check the user's guess
    function checkGuess(guess) {
        const resultMessage = document.getElementById("resultMessage");
        if (guess === correctDifference) {
            resultMessage.innerHTML = "Correct! The interval is <b>" + intervalNames[correctDifference] + "</b>";
            sound1Index = null; // Reset to allow selection of new sounds next time
            sound2Index = null;

            // Show the replay button and change its text
            const replayButton = document.getElementById("replayButton");
            replayButton.style.display = "inline"; // Make the replay button visible
            replayButton.textContent = "Hear again the interval"; // Change text
        } else {
            resultMessage.textContent = "Wrong! Try again.";
        }
    }

    // Add an event listener for the replay button
    document.getElementById("replayButton").addEventListener("click", function () {
        if (audio1 && audio2) { // Check if the audio elements are defined
            audio1.currentTime = 0; // Reset playback position
            audio2.currentTime = 0; // Reset playback position

            // Replay the first sound
            audio1.play();
            setTimeout(function () {
                audio1.pause();
                audio1.currentTime = 0;

                // Replay the second sound
                audio2.play();
                setTimeout(function () {
                    audio2.pause();
                    audio2.currentTime = 0;
                }, 1000);
            }, 1000);
        }
    });
</script>

<hr>