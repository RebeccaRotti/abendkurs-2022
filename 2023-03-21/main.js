document.querySelector('#catObject').addEventListener('click', function () {
    cat.showCat();
});

const cat = {
  name: 'Mieze',
  breed: 'gemeine Hauskatze',
  age: 13,
  showCat: function () {
      document.querySelector('#objectOutput').innerHTML = `
      Name: ${this.name} gehört zur Rasse ${this.breed}. <br>
      Alter: ${this.age}<br><hr>`;
  }
};


// Allgemeinen Stuff

let allCats = [];
const months = [
    "Jan", "Feb", "Mär", "Apr", "Mai", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Dez"
];
const week = [
    "So", "Mo", "Di", "Mi", "Do", "Fr", "Sa"
];

function validateForm() {
    let input = [];
    input[0] = document.querySelector('#name').value;
    input[1] = document.querySelector('#breed').value;
    input[2] = Number(document.querySelector('#age').value).toFixed(2);
    input[3] = new Date(document.querySelector('#birth').value);
    return input;
}

function show(value) {
    document.querySelector('#output').innerHTML +=
        `<p>Name: ${value.name}<br>
        Rasse: ${value.breed}<br>
        Alter: ${value.age}<br>
        Geboren Jahr: ${value.birth.getFullYear()}<br>
        Geburtsmonat: ${months[value.birth.getMonth()]}<br>
        Geburtswochentag: ${week[value.birth.getDay()]}<br>
        Button: ${value.button}<br>
        Zeichenlänge Name: ${value.name.length}</p>`;
}

function showAllCats() {
    document.querySelector('#output').innerHTML = "";
    allCats.sort((minAge, maxAge) => minAge.age - maxAge.age);
    showAge(allCats);
    for(const thisCat of allCats) {
        thisCat.showCat();
    }
}

function showAge(allCats) {
    let maxAgeValue = -Number.MAX_VALUE;
    let minAgeValue = Number.MAX_VALUE;
    console.log(maxAgeValue, minAgeValue);

    allCats.forEach(cat => {
       if(cat.age > maxAgeValue) {
           maxAgeValue = cat.age;
       }
       if(cat.age < minAgeValue) {
           minAgeValue = cat.age;
       }
    });
    document.querySelector('#outputAge').innerHTML =
        `<p>jüngste Katze: ${minAgeValue}</p>
        <p>älteste Katze: ${maxAgeValue}</p>`;
}

// Objekt mit Konstruktor
function CatConstructor(name, breed, age, birth, button) {
    this.name = name;
    this.breed = breed;
    this.age = age;
    this.birth = birth;
    this.button = button;
    this.showCat = function () {
        show(this);
    }
}
document.querySelector('#newCatConstructor').addEventListener('click', function () {
    let returnValue = validateForm();
    allCats[allCats.length] = new CatConstructor(
        returnValue[0], returnValue[1], returnValue[2], returnValue[3], 'Constructor gedrückt'
    );
    console.log(allCats);
    showAllCats();
});

// Mit Klasse
class CatClass {
    constructor(name, breed, age, birth, button) {
        this.name = name;
        this.breed = breed;
        this.age = age;
        this.birth = birth;
        this.button = button;
    }
    showCat() {
        show(this);
    }
}

document.querySelector('#newCatClass').addEventListener('click', function () {
    let returnValue = validateForm();
    allCats.push(new CatClass(
        returnValue[0], returnValue[1], returnValue[2], returnValue[3], 'Button Klasse gedrückt'
    ));
    console.log(allCats);
    showAllCats();
});


















