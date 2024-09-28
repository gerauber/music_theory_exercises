<h2> Chords exercises</h2>

<hr>

<h3> Diminished, Minor, Major and Augmented chords</h3>

<!-- Main buttons-->
<button id="playButton">Play random chords</button>
<button id="replayButton">Replay chord</button> 
<button id="replayButtonSep">Replay chord separated</button> 

<!-- Message to display -->
<p id="resultMessage" style="margin-bottom: 20px;">Let's see what you'll answer!</p>

<!-- guess buttons -->
<div id="guessButtons"></div>

<!-- debug -->
<!-- <p id="debugSoundchord" style="font-size: 16px;"></p> -->

<script>
    // Variable
    let correctChord = 0;
    let sound1Index; // selected sounds
    let audio1; // Audio objects for playback
    let audio1sep; // Separated sound playback

    // Mapping of numbers to chord names
    const chordNames = ["Diminished", "Minor", "Major", "Augmented"];
    const chordTypes = ["dim", "min", "maj", "aug"];

    // generate the chords guess buttons
    function generateGuessButtons() {
        const guessButtonsDiv = document.getElementById("guessButtons");
        guessButtonsDiv.innerHTML = ''; // Clear previous buttons

        // Create buttons for each chord
        for (let i = 0; i < chordNames.length; i++) {
            const button = document.createElement("button");
            button.textContent = chordNames[i]; // Set button text to chord name
            button.addEventListener("click", function () {
                checkGuess(i); // Pass the numerical value of the chord
            });
            guessButtonsDiv.appendChild(button);
        }
    }

    // Initial buttons with chord names
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
        correctChord = Math.floor(Math.random() * (maxType + 1));

        // Play
        playSounds();
    }

    // play the selected sounds
    function playSounds() {
        // Create Audio
        audio1 = new Audio(`../audio/chords/chord_${chordTypes[correctChord]}_${sound1Index}.mp3`);
        audio1sep = new Audio(`../audio/chords/repeat/chord_${chordTypes[correctChord]}_${sound1Index}.mp3`);

        audio1.play();
        setTimeout(function () {
            audio1.pause();
            audio1.currentTime = 0;
        }, 2000);
    }

    // Play random sounds and reset messages
    document.getElementById("playButton").addEventListener("click", function () {
        selectAndPlaySounds();
        document.getElementById("replayButton").textContent = "Replay chord"; 
        document.getElementById("replayButtonSep").textContent = "Replay chord separated"; 

        document.getElementById("resultMessage").textContent = "Let's see what you'll answer!";
    });

    // check the user's guess
    function checkGuess(guess) {
        const resultMessage = document.getElementById("resultMessage");
        if (guess === correctChord) {
            resultMessage.innerHTML = "Correct! The chord is <b>" + chordNames[correctChord] + "</b>";
            sound1Index = null;

            document.getElementById("replayButton").textContent = "Hear again the chord"; 
            document.getElementById("replayButtonSep").textContent = "Hear again the separated chord"; 
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

    document.getElementById("replayButtonSep").addEventListener("click", function () {
        if (audio1sep) {
            audio1sep.currentTime = 0;
            audio1sep.play();
            setTimeout(function () {
                audio1sep.pause();
                audio1sep.currentTime = 0;
            }, 3000);
        }
    });
</script>

<!-- ------------------------------------------------------------------------------------------------ -->
<hr>

<h3> Minor and Major chords types</h3>

<!-- Main buttons-->
<button id="playButtonInv">Play random chords</button>
<button id="replayButtonInv">Replay chord</button> 
<button id="replayButtonSepInv">Replay chord separated</button> 

<!-- Message to display -->
<p id="resultMessageInv" style="margin-bottom: 20px;">Let's see what you'll answer!</p>

<!-- guess buttons -->
<div id="guessButtonsInv"></div>

<script>
    // Variables for the second part
    let correctChordInv = 0;
    let sound1IndexInv;
    let audio1Inv;
    let audio1sepInv;

    const chordNamesInv = ["Minor normal", "Minor Inversed", "Minor twice Inversed", "Major normal", "Major Inversed", "Major twice Inversed"];
    const chordTypesInv = ["min", "mininv1", "mininv2", "maj", "majinv1", "majinv2"];

    function generateGuessButtonsInv() {
        const guessButtonsDivInv = document.getElementById("guessButtonsInv");
        guessButtonsDivInv.innerHTML = ''; // Clear previous buttons

        for (let i = 0; i < chordNamesInv.length; i++) {
            const button = document.createElement("button");
            button.textContent = chordNamesInv[i];
            button.addEventListener("click", function () {
                checkGuessInv(i);
            });
            guessButtonsDivInv.appendChild(button);
        }
    }

    generateGuessButtonsInv();

    function selectAndPlaySoundsInv() {
        const minTypeInv = 0;
        const maxTypeInv = 5;
        const minVarInv = 1;
        const maxVarInv = 12;

        sound1IndexInv = Math.floor(Math.random() * (maxVarInv - minVarInv + 1)) + minVarInv;
        correctChordInv = Math.floor(Math.random() * (maxTypeInv + 1));

        playSoundsInv();
    }

    function playSoundsInv() {
        audio1Inv = new Audio(`../audio/chords/chord_${chordTypesInv[correctChordInv]}_${sound1IndexInv}.mp3`);
        audio1sepInv = new Audio(`../audio/chords/repeat/chord_${chordTypesInv[correctChordInv]}_${sound1IndexInv}.mp3`);

        audio1Inv.play();
        setTimeout(function () {
            audio1Inv.pause();
            audio1Inv.currentTime = 0;
        }, 2000);
    }

    document.getElementById("playButtonInv").addEventListener("click", function () {
        selectAndPlaySoundsInv();
        document.getElementById("replayButtonInv").textContent = "Replay chord";
        document.getElementById("replayButtonSepInv").textContent = "Replay chord separated";
        document.getElementById("resultMessageInv").textContent = "Let's see what you'll answer!";
    });

    function checkGuessInv(guess) {
        const resultMessageInv = document.getElementById("resultMessageInv");
        if (guess === correctChordInv) {
            resultMessageInv.innerHTML = "Correct! The chord is <b>" + chordNamesInv[correctChordInv] + "</b>";
            sound1IndexInv = null;
            document.getElementById("replayButtonInv").textContent = "Hear again the chord";
            document.getElementById("replayButtonSepInv").textContent = "Hear again the separated chord";
        } else {
            resultMessageInv.textContent = "Wrong! Try again.";
        }
    }

    document.getElementById("replayButtonInv").addEventListener("click", function () {
        if (audio1Inv) {
            audio1Inv.currentTime = 0;
            audio1Inv.play();
            setTimeout(function () {
                audio1Inv.pause();
                audio1Inv.currentTime = 0;
            }, 2000);
        }
    });

    document.getElementById("replayButtonSepInv").addEventListener("click", function () {
        if (audio1sepInv) {
            audio1sepInv.currentTime = 0;
            audio1sepInv.play();
            setTimeout(function () {
                audio1sepInv.pause();
                audio1sepInv.currentTime = 0;
            }, 3000);
        }
    });
</script>

<!-- ------------------------------------------------------------------------------------------------ -->
<hr>

<h3> 7th chords types</h3>

<!-- Main buttons-->
<button id="playButton7th">Play random chords</button>
<button id="replayButton7th">Replay chord</button> 
<button id="replayButtonSep7th">Replay chord separated</button> 

<!-- Message to display -->
<p id="resultMessage7th" style="margin-bottom: 20px;">Let's see what you'll answer!</p>

<!-- guess buttons -->
<div id="guessButtons7th"></div>

<script>
    // Variables for the second part
    let correctChord7th = 0;
    let sound1Index7th;
    let audio17th;
    let audio1sep7th;

    const chordNames7th = ["Diminished", "Dominant"];
    const chordTypes7th = ["dim7th", "dom7th"];

    function generateGuessButtons7th() {
        const guessButtonsDiv7th = document.getElementById("guessButtons7th");
        guessButtonsDiv7th.innerHTML = ''; // Clear previous buttons

        for (let i = 0; i < chordNames7th.length; i++) {
            const button = document.createElement("button");
            button.textContent = chordNames7th[i];
            button.addEventListener("click", function () {
                checkGuess7th(i);
            });
            guessButtonsDiv7th.appendChild(button);
        }
    }

    generateGuessButtons7th();

    function selectAndPlaySounds7th() {
        const minType7th = 0;
        const maxType7th = 1;
        const minVar7th = 1;
        const maxVar7th = 12;

        sound1Index7th = Math.floor(Math.random() * (maxVar7th - minVar7th + 1)) + minVar7th;
        correctChord7th = Math.floor(Math.random() * (maxType7th + 1));

        playSounds7th();
    }

    function playSounds7th() {
        audio17th = new Audio(`../audio/chords/chord_${chordTypes7th[correctChord7th]}_${sound1Index7th}.mp3`);
        audio1sep7th = new Audio(`../audio/chords/repeat/chord_${chordTypes7th[correctChord7th]}_${sound1Index7th}.mp3`);

        audio17th.play();
        setTimeout(function () {
            audio17th.pause();
            audio17th.currentTime = 0;
        }, 2000);
    }

    document.getElementById("playButton7th").addEventListener("click", function () {
        selectAndPlaySounds7th();
        document.getElementById("replayButton7th").textContent = "Replay chord";
        document.getElementById("replayButtonSep7th").textContent = "Replay chord separated";
        document.getElementById("resultMessage7th").textContent = "Let's see what you'll answer!";
    });

    function checkGuess7th(guess) {
        const resultMessage7th = document.getElementById("resultMessage7th");
        if (guess === correctChord7th) {
            resultMessage7th.innerHTML = "Correct! The chord is <b>" + chordNames7th[correctChord7th] + "</b>";
            sound1Index7th = null;
            document.getElementById("replayButton7th").textContent = "Hear again the chord";
            document.getElementById("replayButtonSep7th").textContent = "Hear again the separated chord";
        } else {
            resultMessage7th.textContent = "Wrong! Try again.";
        }
    }

    document.getElementById("replayButton7th").addEventListener("click", function () {
        if (audio17th) {
            audio17th.currentTime = 0;
            audio17th.play();
            setTimeout(function () {
                audio17th.pause();
                audio17th.currentTime = 0;
            }, 2000);
        }
    });

    document.getElementById("replayButtonSep7th").addEventListener("click", function () {
        if (audio1sep7th) {
            audio1sep7th.currentTime = 0;
            audio1sep7th.play();
            setTimeout(function () {
                audio1sep7th.pause();
                audio1sep7th.currentTime = 0;
            }, 3000);
        }
    });
</script>

<hr>