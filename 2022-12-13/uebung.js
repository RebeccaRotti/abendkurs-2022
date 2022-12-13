'use strict';

function greetings(){
    let name = prompt("Gib deinen Namen ein");
    alert('Herzlich Willkommen ' + name);
}
greetings();


/* Return Werte von Funktionen */
function greeting2() {
    let forename = prompt("Dein Vorname");
    let familyname = prompt("Dein Nachname");
    let returnValue = new Array();
    returnValue[returnValue.length] = forename;
    returnValue[returnValue.length] = familyname;
    return returnValue;
}
let functionValue = greeting2();
for (let value of functionValue) {
    document.write(' ' + value + ' ');
}

/* Übergabeparameter von Funktionen */
let user = prompt('Dein Name');
let age = prompt('Dein Alter');
function greetings3(username, age) {
    document.write('der User ' + username + ' ist ' + age + ' alt');
}
greetings3(user, age);

/* Übergabe und Rückgabeparameter */
function mathquestion(x) {
    let result = 2 * x * x + 5 * x + 7;
    return result;
}
let userInput = Number(prompt('gib eine Zahl ein'));
let mathresult = mathquestion(userInput);
document.write('<br>' + mathresult + '<br>');

/* Fehlerbehandlung */
let a = 1.23857352474857463928749834593459088;
let x = window.prompt('Wie viele Stellen sollen angezeigt werden');

try {
    let b = a.toPrecision(x);
    document.write('Gewünschte Präzision: ' + b);
} catch(err) {
    document.write(err.name);
    document.write(err.message);
}





