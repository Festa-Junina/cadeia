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
        // Checará caso o detento que estiver respondendo a pergunta
        // tiver alguma alternativa já selecionada, para que, mesmo
        // com o tempo esgotado, seja enviada a resposta que estiver sido marcada.
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
            // Caso não tiver nenhuma alternativa assinalada,
            // é levado em conta como um erro da questão.
            window.location.href = `errou.php?idDetento=${idDetento}`;
        }
    }
    timer.innerHTML =
            minutes.toString().padStart(2, "0") +
            ":" +
            seconds.toString().padStart(2, "0");
}, 1000);
