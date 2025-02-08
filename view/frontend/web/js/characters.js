let currentIndex = -1;
let charactersHistory = [];

function loadCharacter(index) {
    if (charactersHistory[index]) {
        displayCharacter(charactersHistory[index]);
        return;
    }

    fetch(`https://swapi.dev/api/people/${index + 1}`)
        .then(response => response.json())
        .then(data => {
            charactersHistory[index] = data;
            displayCharacter(data);
        })
        .catch(error => console.error('Error:', error));
}

function displayCharacter(character) {
    let info = `
            <span>Name: ${character.name}</span><br>
            <span>Height: ${character.height}</span><br>
            <span>Mass: ${character.mass}</span><br>
            <span>Hair Color: ${character.hair_color}</span><br>
            <span>Skin Color: ${character.skin_color}</span><br>
        `;
    document.getElementById("swapiCharacterInfo").innerHTML = info;
}

function loadNextCharacter() {
    currentIndex++;
    loadCharacter(currentIndex);
    updateLocalStorage();
}

function loadPreviousCharacter() {
    if (currentIndex > 0) {
        currentIndex--;
        loadCharacter(currentIndex);
    }
}

function updateLocalStorage() {
    localStorage.setItem('charactersHistory', JSON.stringify(charactersHistory.slice(-6)));
}

window.onload = function() {
    const storedHistory = JSON.parse(localStorage.getItem('charactersHistory'));
    if (storedHistory) {
        charactersHistory = storedHistory;
        currentIndex = charactersHistory.length - 1;
        displayCharacter(charactersHistory[currentIndex]);
    } else {
        loadNextCharacter();
    }
}
