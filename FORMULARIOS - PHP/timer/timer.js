let startTime = new Date().getTime();
let timerInterval;

function startTimer() {
    timerInterval = setInterval(function() {
        let currentTime = new Date().getTime();
        let elapsedTime = currentTime - startTime;

        let hours = Math.floor((elapsedTime / (1000 * 60 * 60)) % 24);
        let minutes = Math.floor((elapsedTime / (1000 * 60)) % 60);
        let seconds = Math.floor((elapsedTime / 1000) % 60);

        //FORMATEEAR PARA QUE HAYA SIEMPRE DOS DIGITOS
        hours = (hours < 10) ? "0" + hours : hours;
        minutes = (minutes < 10) ? "0" + minutes : minutes;
        seconds = (seconds < 10) ? "0" + seconds : seconds;

        document.getElementById("timer").innerHTML = `${hours}:${minutes}:${seconds}`;
    }, 1000);
}

document.getElementById("finish-btn").addEventListener("click", function() {
    clearInterval(timerInterval);
    let finalTime = document.getElementById("timer").innerText;
    document.getElementById("time-input").value = finalTime;
    document.getElementById("time-form").submit();
});

window.onload = function() {
    startTimer();
};
