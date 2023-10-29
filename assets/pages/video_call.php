

    <style>
        
/* Reset some default styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Basic styling for the page */
body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    line-height: 1.6;
}

header {
    background-color: #6fbcf3;
    color: #fff;
    text-align: center;
    padding: 20px 0;
}

nav {
    background-color: #444;
    text-align: center;
}

nav ul {
    list-style: none;
}

nav ul li {
    display: inline;
    margin-right: 20px;
}

nav a {
    text-decoration: none;
    color: #fff;
    font-weight: bold;
}

main {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

section {
    margin-bottom: 20px;
}

h2 {
    color: #333;
}

ul {
    list-style: disc;
    margin-left: 20px;
}

footer {
    text-align: center;
    background-color: #333;
    color: #fff;
    padding: 10px 0;
}

/* Add your additional CSS styles here */
/* ... */
/* Add your additional CSS styles here */

/* Styling for the countdown timer section */
.timer {
    text-align: center;
    margin-top: 20px;
}

label {
    font-size: 18px;
    display: block;
    margin-top: 20px;
}

input[type="datetime-local"] {
    width: 300px;
    padding: 10px;
    font-size: 24px;
}

button {
    background-color: #007BFF;
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-size: 18px;
    cursor: pointer;
    margin-top: 20px;
}

button:hover {
    background-color: #0056b3;
}

#countdown {
    font-size: 24px;
    margin-top: 20px;
    color: #333;
}

/* Styling for the "Meeting Agenda" and "Meeting Participants" sections */
.agenda, .participants {
    border: 1px solid #ccc;
    padding: 20px;
    background-color: #f9f9f9;
}

.agenda h2, .participants h2 {
    color: #333;
    font-size: 20px;
    margin-bottom: 10px;
}

.agenda ul, .participants ul {
    list-style: disc;
    margin-left: 20px;
}

.agenda li, .participants li {
    margin-bottom: 5px;
}

/* Styling for the "Meeting Minutes" section */
.minutes {
    padding: 20px;
    background-color: #f9f9f9;
}

.minutes h2 {
    color: #333;
    font-size: 20px;
    margin-bottom: 10px;
}

/* Styling for the buttons in the "Meeting Minutes" section */
#startButton, #endButton, #startMeetButton {
    background-color: #007BFF;
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-size: 18px;
    cursor: pointer;
    margin-top: 20px;
    margin-right: 10px;
}

#startButton:disabled, #endButton:disabled {
    background-color: #ccc;
    cursor: not-allowed;
}

#startButton:hover, #endButton:hover, #startMeetButton:hover {
    background-color: #0056b3;
}

/* Styling for the footer */
footer {
    text-align: center;
    background-color: #333;
    color: #fff;
    padding: 10px 0;
}


    </style>
    <script>
        // JavaScript code for the Countdown Timer
let countdownInterval;

function startCountdown() {
    const selectedDate = new Date(document.getElementById('countdown-date').value).getTime();

    if (isNaN(selectedDate)) {
        alert('Please select a valid date and time.');
        return;
    }

    clearInterval(countdownInterval);

    countdownInterval = setInterval(function () {
        const now = new Date().getTime();
        const timeRemaining = selectedDate - now;

        if (timeRemaining <= 0) {
            clearInterval(countdownInterval);
            document.getElementById('countdown').innerHTML = 'Countdown expired!';
        } else {
            const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
            const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

            document.getElementById('countdown').innerHTML = `${days}d ${hours}h ${minutes}m ${seconds}s`;
        }
    }, 1000);

    // JavaScript code for the "Start" and "End" buttons
    let stream;
    const startButton = document.getElementById("startCountdownButton");
    const endButton = document.getElementById("endButton");

    startButton.addEventListener("click", async () => {
        try {
            stream = await navigator.mediaDevices.getUserMedia({ audio: true, video: true });
            // Enable the "End" button and disable the "Start" button
            startButton.disabled = true;
            endButton.disabled = false;
        } catch (error) {
            console.error("Error accessing camera and microphone:", error);
        }
    });

    endButton.addEventListener("click", () => {
        if (stream) {
            stream.getTracks().forEach(track => {
                track.stop();
            });
            // Disable the "End" button and enable the "Start" button
            startButton.disabled = false;
            endButton.disabled = true;
        }
    });

    // Function to open Google Meet in the same tab
    function startGoogleMeet() {
        // Replace this URL with your Google Meet link
        const meetURL = 'https://meet.google.com/isc-wgwj-yii';

        // Redirect the current tab to the Google Meet link
        window.location.href = meetURL;
    }

    // Attach click event listener to the "Start Google Meet" button
    const startMeetButton = document.getElementById('startMeetButton');
    startMeetButton.addEventListener('click', startGoogleMeet);
}

        let stream;

        const startButton = document.getElementById("startButton");
        const endButton = document.getElementById("endButton");

        startButton.addEventListener("click", async () => {
            try {
                stream = await navigator.mediaDevices.getUserMedia({ audio: true, video: true });
                // Enable the "End" button and disable the "Start" button
                startButton.disabled = true;
                endButton.disabled = false;
            } catch (error) {
                console.error("Error accessing camera and microphone:", error);
            }
        });

        endButton.addEventListener("click", () => {
            if (stream) {
                stream.getTracks().forEach(track => {
                    track.stop();
                });
                // Disable the "End" button and enable the "Start" button
                startButton.disabled = false;
                endButton.disabled = true;
            }
        });
// Function to open Google Meet in a new tab
function startGoogleMeet() {
    // Replace this URL with your Google Meet link
    const meetURL = 'https://meet.google.com/';

    // Open the Google Meet link in a new tab
    window.open(meetURL, '_blank');
}

// Attach click event listener to the "Start Google Meet" button
const startMeetButton = document.getElementById('startMeetButton');
startMeetButton.addEventListener('click', startGoogleMeet);

    </script>
    <header>
        <h1>Committee Meeting</h1>
    </header>
    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Agenda</a></li>
            <li><a href="#">Participants</a></li>
            <li><a href="#">Minutes</a></li>
        </ul>
    </nav>
    <div class="timer">
        <h1>Custom Countdown Timer</h1>
        <label for="countdown-date">Select a date and time:</label>
        <input type="datetime-local" id="countdown-date">
        <button onclick="startCountdown()">Start Countdown</button>
        <div id="countdown"></div>
    </div>
    <main>
        <section class="agenda">
            <h2>Meeting Agenda</h2>
            <ul>
                <li>Item 1: Discuss budget allocation</li>
                <li>Item 2: Plan upcoming events</li>
                <li>Item 3: Membership updates</li>
                <!-- Add more agenda items as needed -->
            </ul>
        </section>
        <section class="participants">
            <h2>Meeting Participants</h2>
            <ul>
                <li>Vedant</li>
                <li>Prathmesh</li>
                <li>Shivam</li>
                <!-- Add more participants as needed -->
            </ul>
        </section>
        <section class="minutes">
            <h2>Permission of Audio and Video for  Google Meet</h2>
            <button id="startButton">Start</button>
            <button id="endButton" disabled>End</button>
            <br>
            <button id="startMeetButton">Start Google Meet</button>
        </section>
    </main>
    <footer>
        <p>&copy; 2023 Committee Name</p>
    </footer>

