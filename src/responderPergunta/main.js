// main.js

const timer = document.getElementById("timer");
let [minutes, seconds] = timer.innerHTML.split(":");
const idDetento = document.getElementById("idDetento").value;
const buttonSubmit = document.getElementById("button");


setInterval(() => {
    if (Number(seconds) <= 0) {
        seconds = 59;
        minutes--;
    } else {
        seconds--;
    }
    if (minutes <= 0 && seconds <= 0) {
        let opts = document.querySelectorAll("label>input[type='radio']");

        let selectedRadio = false;

        opts.forEach((opt) => {
            if (opt.checked) {
                selectedRadio = true;
            }
        });

        if (selectedRadio) {
            buttonSubmit.click();
        } else {
            window.location.href = `errou.php?idDetento=${idDetento}`;
        }
    }
    timer.innerHTML =
            minutes.toString().padStart(2, "0") +
            ":" +
            seconds.toString().padStart(2, "0");
}, 1000);
