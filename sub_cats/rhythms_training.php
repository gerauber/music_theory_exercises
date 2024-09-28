<h2>Rhythms Training</h2>
<hr>

<!-- Message to display instruction -->
<p id="instructionMessage">Choose a rhythm to play!</p>
<p id="SoundsPlayed">Notes played</p>

<!-- Button to replay the last played sounds -->
<p><button id="replayButton">Replay last rhythm</button></p>

<h3>Binary Rhythms</h3>
<!-- Div to contain the binary rhythm buttons -->
<div id="rhythmButtonsBinary"></div>

<h3>Ternary Rhythms</h3>
<!-- Div to contain the ternary rhythm buttons -->
<div id="rhythmButtonsTernary"></div>

<!-- debug -->
<!-- <p id="debugSoundrhythm" style="font-size: 16px;"></p> -->

<script>
    // Mapping of binary rhythm names to their corresponding values
    const rhythmMappingBinary = {
        "Bi1": 1, 
        "Bi2": 2, 
        "Bi3": 3, 
        "Bi4": 4, 
        "Bi5": 5, 
        "Bi6": 6, 
        "Bi7": 7, 
        "Bi8": 8, 
        "Bi9": 9, 
        "Bi10": 10
    };

    // Mapping of ternary rhythm names to their corresponding values
    const rhythmMappingTernary = {
        "Te1": 1, 
        "Te2": 2, 
        "Te3": 3, 
        "Te4": 4, 
        "Te5": 5, 
        "Te6": 6, 
        "Te7": 7, 
        "Te8": 8, 
        "Te9": 9, 
        "Te10": 10, 
        "Te11": 11, 
        "Te12": 12,
        "Te13": 13, 
        "Te14": 14, 
        "Te15": 15, 
        "Te16": 16, 
        "Te17": 17, 
        "Te18": 18, 
        "Te19": 19, 
        "Te20": 20, 
        "Te21": 21, 
        "Te22": 22, 
        "Te23": 23, 
        "Te24": 24,
        "Te25": 25, 
        "Te26": 26, 
        "Te27": 27, 
        "Te28": 28, 
        "Te29": 29, 
        "Te30": 30, 
        "Te31": 31, 
        "Te32": 32
    };

    // Variables to hold the last played sounds
    let lastSoundIndex; 
    let lastrhythmType;
    let lastRhythmCategory;

    // Function to generate the rhythm buttons for both binary and ternary rhythms
    function generaterhythmButtons(rhythmMapping, rhythmButtonsDivId, partofpath) {
        const rhythmButtonsDiv = document.getElementById(rhythmButtonsDivId);
        rhythmButtonsDiv.innerHTML = ''; // Clear previous buttons

        // Loop through each rhythm in the mapping
        for (const rhythm in rhythmMapping) {
            const button = document.createElement("button");
            button.className = 'button-rhy'; // Apply the button class for consistent styling

            // Create an image element for the rhythm button
            const img = document.createElement("img");
            img.src = `button_pic/${rhythm}.svg`; // Use the image corresponding to the rhythm name
            img.alt = rhythm; // Alt text for accessibility

            // Add the image to the button, or fallback to text if the image is missing
            img.onerror = function() {
                button.textContent = rhythm; // If the image doesn't load, show text
            };

            button.appendChild(img); // Add image to the button

            // Set up the button's click event to play the rhythm sound
            button.addEventListener("click", function () {
                playrhythmSounds(rhythmMapping[rhythm], partofpath); // Play the correct rhythm sound
            });

            // Append the button to the container
            rhythmButtonsDiv.appendChild(button);
        }
    }

    // Initial call to create the buttons for binary and ternary rhythms
    generaterhythmButtons(rhythmMappingBinary, "rhythmButtonsBinary", "rhythms/binary/bi");
    generaterhythmButtons(rhythmMappingTernary, "rhythmButtonsTernary", "rhythms/ternary/te");

    // Function to play the selected sounds
    function playrhythmSounds(rhythmType, partofpath="rhythms/binary/bi", len=2000) {
        const audio = new Audio(`../audio/${partofpath}${rhythmType}.mp3`);

        // Play the selected audio
        audio.play();
        setTimeout(function () {
            audio.pause();
            audio.currentTime = 0;
        }, len); // Wait before stopping the sound

        lastrhythmType = rhythmType; // Store the last rhythm played
        lastRhythmCategory = partofpath; // Store the last rhythm category for replay
    }

    // Add an event listener for the replay button
    document.getElementById("replayButton").addEventListener("click", function () {
        if (lastrhythmType && lastRhythmCategory) {
            playrhythmSounds(lastrhythmType, lastRhythmCategory); // Replay the sound
        }
    });

</script>

<hr>
