const kerdes = [];
// Kerdesek tombje
kerdes[0] = "Mi a répa tudományos neve?";
kerdes[1] = "Milyen tápanyagokat tartalmaz a répa?";
kerdes[2] = "Milyen színűek lehetnek a répák?";
kerdes[3] = "Hogyan befolyásolja a répa a látást?";
kerdes[4] = "Milyen ételekben használják a répát?";
kerdes[5] = "Hogyan termesztik a répát?";

const jovalasz = [];
// jo valaszok tombje
jovalasz[0] = "A répa tudományos neve a Daucus carota.";
jovalasz[1] = "A répa gazdag A-vitaminban, K-vitaminban, B6-vitaminban.";
jovalasz[2] = "Narancssárga, lila, fehér, vörös vagy sárga színűek.";
jovalasz[3] = "A répa magas A-vitamin tartalma segíthet a látás javításában, különösen éjszaka.";
jovalasz[4] = "Salátákban, levesekben, pörköltekben, süteményekben használják.";
jovalasz[5] = "Nem szereti az átültetést. Szereti a napos helyeket és a jól lecsepegtetett talajt.";

const valasz = [];
// rossz valaszok tombje
valasz[0] = "A répa tudományos neve a Solanum tuberosum.";
valasz[1] = "A répa gazdag C-vitaminban és vasban.";
valasz[2] = "A répák mindig narancssárga színűek.";
valasz[3] = "A répa fogyasztása rontja a látást.";
valasz[4] = "A répát általában csak nyersen fogyasztják, nem használják főzéshez vagy sütéshez.";
valasz[5] = "A répát általában konténerekben termesztik, és nem szereti a napfényt.";

const valasz2 = [];
// rossz valaszok tombje
valasz2[0] = "A répa tudományos neve a Brassica oleracea.";
valasz2[1] = "A répa gazdag D-vitaminban és kalciumban.";
valasz2[2] = "A répák mindig zöld színűek.";
valasz2[3] = "A répa fogyasztása javítja a hallást.";
valasz2[4] = "A répát csak grillezve fogyasztják, nem használják salátákhoz vagy levesekhez.";
valasz2[5] = "A répát általában szobanövényként termesztik, és nem szereti a vízben való növekedést.";


//////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////          FUNCTIONS        //////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

const szam = generateRandomNumber(); // ujratoltesnel general egy szamot mert 2 fuggvenyben is hasznalva van
const options = [];

window.onload = function() {
    /**
     * Oldal ujratoltesnel a shopfront oldalon a quiz kerdeseit random sorrendben tolti be
     */

    document.getElementById("question").innerHTML = kerdes[szam];
    
    /**
     * Amig van hely az oldalon levo options-ben bekeri azokat egy tombbe (options[]), 
     * hogy kesobb tudjunk bele tenni valaszokat
     * #answer -> select html tag
     */
    for (let i = 1; i < Object.values(document.getElementById('answer').options).length; i++) {
        const element = Object.values(document.getElementById('answer').options)[i];
        options[i-1] = element;
    }

    // randomizaljuk a tomb tagjait
    shuffle(options);

    // valaszok beallitasa az option-oknek
    options[0].text = jovalasz[szam];
    options[1].text = valasz[szam];
    options[2].text = valasz2[szam];
}

function generateRandomNumber() {
    // random szamot general 1-5ig
    return Math.floor(Math.random() * 6);
}

function shuffle(array) {
    // Osszekavarja a tomb elemeit hogy random sorrendu legyen
    let currentIndex = array.length,  randomIndex;

    while (currentIndex > 0) {
  
      // Random elem valasztas
      randomIndex = Math.floor(Math.random() * currentIndex);
      currentIndex--;
  
      // Elem csereje a mostani indexure
      [array[currentIndex], array[randomIndex]] = [array[randomIndex], array[currentIndex]];
    }
}

function goodOrWrongAlert() {
    /**
     * js - php kommunikaciohoz kell, a submit gomb name attributuma donti el milyen alert jelenik meg a felhasznalonak
     * 
     * A kupon kod alertjehez hasznalatos, ha a valasztott 
     * option megegyezik a jo valasszal akkor a submit gomb name attributuma -> showGoodAlert
     * ha nem, akkor -> showWrongAlert
     */
    const submitButton = document.getElementById("submit");
    
    if(document.getElementById('answer').options[document.getElementById('answer').options.selectedIndex].text == jovalasz[szam]) {
        submitButton.name = "showGoodAlert";

    } else if (document.getElementById('answer').options[document.getElementById('answer').options.selectedIndex].text == "Válassz") {
    } else {
        submitButton.name = "showWrongAlert";
    }
}
