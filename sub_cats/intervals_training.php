<h2> Some training for the ears</h2>

<!-- Message to display instruction -->
<p id="instructionMessage">Choose an interval to play two random notes!</p>

<!-- Div to contain the interval buttons -->
<div id="intervalButtons">
    <h3>Ascendent Intervals</h3>
    <div id="ascendentButtons"></div>
    <h3>Descendent Intervals</h3>
    <div id="descendentButtons"></div>
</div>


<br>
<h3> Just in case</h3>
<!-- Button to replay the last played sounds -->
<button id="replayButton" visibility="hidden">Replay Last Sounds</button> <!-- Hidden initially -->

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