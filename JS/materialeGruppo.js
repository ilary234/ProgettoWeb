document.querySelector(".button").addEventListener("click", () => window.location.href = `caricaFile.php?nomeGruppo=${urlParams.get('nomeGruppo')}&admin=${urlParams.get('admin')}`);

const urlParams = new URLSearchParams(window.location.search);

function getFiles() {
    let section = ``;
    for (let i = 0; i < files.length; i++) {
        section += `<div class="materiale">
                <div class="anteprima">
                <img src="${imgdir}png.png" alt="Anteprima file">
                </div>
                <h2>${files[i]["Titolo"]}</h2>
                <p>${files[i]["Username"]}  -  ${files[i]["DataPubblicazione"]}</p>
                <button class="btn btn-primary">Scarica</button>
            </div>`;
    }
    return section;
    //Aggiungi tasto elimina
    //Correggi anteprima
    //Fai download
}

async function getStartData() {
    let urlFiles = `API/api-materiale-gruppo.php?nomeGruppo=${urlParams.get('nomeGruppo')}&admin=${urlParams.get('admin')}`;
    try {
        const responseFile = await fetch(urlFiles);
        if(!responseFile.ok){
            throw new Error("Response File status: " + responseFile.status);
        }
        files = await responseFile.json();
        console.log(files);
        document.querySelector("main section:last-of-type").innerHTML = getFiles(files);
    } catch (error) {
        console.log(error.message);
    }    
}

const imgdir = "./Upload/Preview/"
let files;
getStartData();