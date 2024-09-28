<h2> Rhythms exercises</h2>

<hr>

<h3> Binary rhythms</h3>

<!-- Main buttons-->
<button id="playButtonBinary">Play random binary rhythms</button>
<button id="replayButtonBinary">Replay binary rhythm</button>

<!-- Message to display -->
<p id="resultMessageBinary" style="margin-bottom: 20px;">Let's see what you'll answer!</p>

<!-- guess buttons -->
<div id="guessButtonsBinary"></div>

<!-- debug -->
<!-- <p id="debugSoundrhythmBinary" style="font-size: 16px;"></p> -->

<script>
    // Binary rhythms variables
    let correctrhythmBinary = 0;
    let sound1IndexBinary;
    let audioBinary;

    // Mapping of numbers to binary rhythm names
    const rhythmNamesBinary = ["Bi1", "Bi2", "Bi3", "Bi4", "Bi5", "Bi6", "Bi7", "Bi8", "Bi9", "Bi10"];

    // Generate guess buttons for binary rhythms as SVG images
    function generateGuessButtonsBinary() {
        const guessButtonsDivBinary = document.getElementById("guessButtonsBinary");
        guessButtonsDivBinary.innerHTML = ''; // Clear previous buttons

        for (let i = 0; i < rhythmNamesBinary.length; i++) {
            const button = document.createElement("button");
            button.className = 'button-rhy'; // Apply the button class for consistency

            const img = document.createElement("img");
            img.src = `button_pic/${rhythmNamesBinary[i]}.svg`;
            img.alt = rhythmNamesBinary[i];

            button.appendChild(img); // Add image to button

            button.addEventListener("click", function () {
                checkGuessBinary(i);
            });

            guessButtonsDivBinary.appendChild(button); // Append button to container
        }
    }


    // Initial buttons for binary rhythms
    generateGuessButtonsBinary();

    // Select and play binary sounds
    function selectAndPlaySoundsBinary() {
        const minVar = 1;
        const maxVar = 10;
        sound1IndexBinary = Math.floor(Math.random() * (maxVar - minVar + 1)) + minVar;
        correctrhythmBinary = sound1IndexBinary;
        playSoundsBinary();
    }

    // Play binary sounds
    function playSoundsBinary() {
        audioBinary = new Audio(`../audio/rhythms/binary/bi${sound1IndexBinary}.mp3`);
        audioBinary.play();
        setTimeout(function () {
            audioBinary.pause();
            audioBinary.currentTime = 0;
        }, 5000);
    }

    // Check binary guess
    function checkGuessBinary(guess) {
        const resultMessageBinary = document.getElementById("resultMessageBinary");
        if (guess === correctrhythmBinary - 1) {
            resultMessageBinary.innerHTML = "Correct!";
            sound1IndexBinary = null;
            document.getElementById("replayButtonBinary").textContent = "Hear again the rhythm";
        } else {
            resultMessageBinary.textContent = "Wrong! Try again.";
        }
    }

    // Replay binary sound
    document.getElementById("replayButtonBinary").addEventListener("click", function () {
        if (audioBinary) {
            audioBinary.currentTime = 0;
            audioBinary.play();
            setTimeout(function () {
                audioBinary.pause();
                audioBinary.currentTime = 0;
            }, 14000);
        }
    });

    // Play random binary rhythm
    document.getElementById("playButtonBinary").addEventListener("click", function () {
        selectAndPlaySoundsBinary();
        document.getElementById("replayButtonBinary").textContent = "Replay rhythm";
        document.getElementById("resultMessageBinary").textContent = "Let's see what you'll answer!";
    });

</script>

<hr>

<h3> Ternary rhythms</h3>

<!-- Main buttons-->
<button id="playButtonTernary">Play random ternary rhythms</button>
<button id="replayButtonTernary">Replay ternary rhythm</button>

<!-- Message to display -->
<p id="resultMessageTernary" style="margin-bottom: 20px;">Let's see what you'll answer!</p>

<!-- guess buttons -->
<div id="guessButtonsTernary"></div>

<!-- debug -->
<!-- <p id="debugSoundrhythmTernary" style="font-size: 16px;"></p> -->

<script>
    // Ternary rhythms variables
    let correctrhythmTernary = 0;
    let sound1IndexTernary;
    let audioTernary;

    // Mapping of numbers to ternary rhythm names
    const rhythmNamesTernary = ["Te1", "Te2", "Te3", "Te4", "Te5", "Te6", "Te7", "Te8", "Te9", "Te10", "Te11", "Te12", "Te13", "Te14", "Te15", "Te16", "Te17", "Te18", "Te19", "Te20", "Te21", "Te22", "Te23", "Te24", "Te25", "Te26", "Te27", "Te28", "Te29", "Te30", "Te31", "Te32"];

    // Generate guess buttons for ternary rhythms as SVG images
    function generateGuessButtonsTernary() {
        const guessButtonsDivTernary = document.getElementById("guessButtonsTernary");
        guessButtonsDivTernary.innerHTML = ''; // Clear previous buttons

        for (let i = 0; i < rhythmNamesTernary.length; i++) {
            const button = document.createElement("button");
            button.className = 'button-rhy'; // Apply the button class for consistency

            const img = document.createElement("img");
            img.src = `button_pic/${rhythmNamesTernary[i]}.svg`;
            img.alt = rhythmNamesTernary[i];

            button.appendChild(img); // Add image to button

            button.addEventListener("click", function () {
                checkGuessTernary(i);
            });

            guessButtonsDivTernary.appendChild(button); // Append button to container
        }
    }


    // Initial buttons for ternary rhythms
    generateGuessButtonsTernary();

    // Select and play ternary sounds
    function selectAndPlaySoundsTernary() {
        const minVar = 1;
        const maxVar = 32;
        sound1IndexTernary = Math.floor(Math.random() * (maxVar - minVar + 1)) + minVar;
        correctrhythmTernary = sound1IndexTernary;
        playSoundsTernary();
    }

    // Play ternary sounds
    function playSoundsTernary() {
        audioTernary = new Audio(`../audio/rhythms/ternary/te${sound1IndexTernary}.mp3`);
        audioTernary.play();
        setTimeout(function () {
            audioTernary.pause();
            audioTernary.currentTime = 0;
        }, 14000);
    }

    // Check ternary guess
    function checkGuessTernary(guess) {
        const resultMessageTernary = document.getElementById("resultMessageTernary");
        if (guess === correctrhythmTernary - 1) {
            resultMessageTernary.innerHTML = "Correct!";
            sound1IndexTernary = null;
            document.getElementById("replayButtonTernary").textContent = "Hear again the rhythm";
        } else {
            resultMessageTernary.textContent = "Wrong! Try again.";
        }
    }

    // Replay ternary sound
    document.getElementById("replayButtonTernary").addEventListener("click", function () {
        if (audioTernary) {
            audioTernary.currentTime = 0;
            audioTernary.play();
            setTimeout(function () {
                audioTernary.pause();
                audioTernary.currentTime = 0;
            }, 5000);
        }
    });

    // Play random ternary rhythm
    document.getElementById("playButtonTernary").addEventListener("click", function () {
        selectAndPlaySoundsTernary();
        document.getElementById("replayButtonTernary").textContent = "Replay rhythm";
        document.getElementById("resultMessageTernary").textContent = "Let's see what you'll answer!";
    });

</script>
