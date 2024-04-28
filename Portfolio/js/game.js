"use strict";

const containerEl = document.querySelector('.gamecontainer');
const btnPlayEl = document.querySelector('.btn_again');
const btnChckEl = document.querySelector('.btn_check');
const hideNumEl = document.querySelector('.hide_num');
const msgEl = document.querySelector('.message');
const inputNumEl = document.querySelector('.input_number');
const scoreEl = document.querySelector('.score');
const lastScoreEl = document.querySelector('.last_score');

// random num generator 1 - 30;
let secretNum = Math.trunc(Math.random() * 20 + 1);

let score = 10;

//ok funguje na enter;
let enterButton = document.getElementById("enterButton");
containerEl.addEventListener("keypress", function(event){
    if(event.key === "Enter"){
        event.preventDefault();
        document.getElementById("enterButton").click();
    }
});

// kontrola schovaného čísla;
btnChckEl.addEventListener("click", () => {
    const guess = Number(inputNumEl.value);

    //kontrola nulového inputu;
    if(guess){
        //fail;
        if(guess != secretNum){
            if(score > 1){
                score--;
                scoreEl.textContent = score;

                msgEl.textContent = guess > secretNum ? "Moc vysoko!" : "Moc nízko!"
                scoreEl.textContent = score;
            }
            else{
                displayMessage("Prohra! :(")
                containerEl.style.backgroundColor = "lightcoral";
                scoreEl.textContent = 0;
            }
        }
        //win;
        else{
            hideNumEl.textContent = secretNum;
            hideNumEl.style.width = "50%";
            hideNumEl.style.transition = "all 0.5s ease-in"
            containerEl.style.backgroundColor = "lightgreen";
            displayMessage("Výhra! :)");
        }
    }
    else{
        displayMessage("Nebylo vloženo žádné číslo!");
    }
});
//message čendžr
const displayMessage = function(message) {
    msgEl.textContent = message;
};
//reset;
btnPlayEl.addEventListener("click", () => {
    lastScoreEl.textContent = score;
    score = 10;
    secretNum = Math.trunc(Math.random() * 20 + 1);
    scoreEl.textContent = score;
    hideNumEl.textContent = "?";
    hideNumEl.style.width = "25%";
    hideNumEl.style.transition = "all 0.5s ease-in";
    inputNumEl.value = "";
    containerEl.style.backgroundColor = "#f0f0f0"
    displayMessage("Začni hádat...");
});