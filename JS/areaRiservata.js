const profileUser = PROFILE_USER;
const isOwner = LOGGED_USER !== null && (profileUser === null || profileUser === LOGGED_USER);

async function loadUserData() {
    try {
        const url = profileUser
            ? `API/api-utente.php?user=${encodeURIComponent(profileUser)}`
            : `API/api-utente.php`;
        const response = await fetch(url);

        if (!response.ok) {
            throw new Error("Errore caricamento utente");
        }

        const data = await response.json();

        const user = data.user;
        const corso = data.corso;

        document.getElementById("nome-cognome").textContent =
            `${user.Nome} ${user.Cognome}`;

        document.getElementById("username").textContent =
            user.Username;

        document.getElementById("email").textContent =
            user.Email;

        document.getElementById("telefono").textContent =
            user.Telefono ?? "Non specificato";

        document.getElementById("corso").textContent =
            corso?.NomeCorso ?? "Non specificato";

        document.getElementById("anno").textContent =
            user.Anno ?? "Non specificato";

    } catch (error) {
        console.error(error.message);
    }
}

const imgdir = "./Upload/Preview/"
const filedir = "./Upload/"
let files;

function getFiles() {
    let section = ``;
    for (let i = 0; i < files.length; i++) {
        section += `<div class="materiale">
                <div class="anteprima">
                    <img src="${imgdir}${files[i]["Tipo"]}.png" alt="Estensione file ${files[i]["Tipo"]}">
                </div>
                <h2>${files[i]["Titolo"]}</h2>
                <a href="${filedir}${files[i]["Percorso"]}" class="download" download>Scarica</a>
            </div>`;
    }
    return section;
}

async function getFileData() {
    let urlFiles = `API/api-materiale-utente.php`;
    try {
        const responseFile = await fetch(urlFiles);
        if(!responseFile.ok){
            throw new Error("Response File status: " + responseFile.status);
        }
        files = await responseFile.json();
        document.querySelector(".flex-container").innerHTML = getFiles();
    } catch (error) {
        console.log(error.message);
    }    
}

document.addEventListener("DOMContentLoaded", () => {
    loadUserData();
    if (isOwner) {
        getFileData();
    }
});