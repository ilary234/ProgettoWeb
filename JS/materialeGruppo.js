const urlParams = new URLSearchParams(window.location.search);
const imgdir = "./Upload/Preview/"
const filedir = "./Upload/"
let files;
let fileDaEliminare, titoloDaEliminare;

document.querySelector(".button").addEventListener("click", () => window.location.href = `caricaFile.php?nomeGruppo=${urlParams.get('nomeGruppo')}&admin=${urlParams.get('admin')}`);

document.addEventListener("click", function(event) {
    if (event.target.classList.contains("delete-btn")) {
        event.preventDefault();

        titoloDaEliminare = event.target.dataset.titolo;
        fileDaEliminare = event.target.dataset.file;
        new bootstrap.Modal(document.getElementById("confermaEliminazione")).show();
    }
})

document.querySelector(".confirmDelete").addEventListener("click", () => {
    document.querySelector(".confirmDelete").blur();
    deleteMateriale(titoloDaEliminare, fileDaEliminare);
})

document.querySelector(".calcelDelete").addEventListener("click", () => {
    document.querySelector(".calcelDelete").blur();
})

document.querySelector(".closeDelete").addEventListener("click", () => {
    document.querySelector(".closeDelete").blur();
})

document.querySelector(".disiscriviti").addEventListener("click", function(event) {
    event.preventDefault();
    new bootstrap.Modal(document.getElementById("confermaAzione")).show();
})

document.querySelector(".confirmAzione").addEventListener("click", () => {
    document.querySelector(".confirmAzione").blur();
    disiscrizione();
})

document.querySelector(".calcelAzione").addEventListener("click", () => {
    document.querySelector(".calcelAzione").blur();
})

document.querySelector(".closeAzione").addEventListener("click", () => {
    document.querySelector(".closeAzione").blur();
})

async function disiscrizione() {
    let urlDisiscrizione = "API/api-disiscrizione-gruppo.php";
    const formData = new FormData();
    formData.append("username", document.querySelector("#username").innerText);
    formData.append("admin", urlParams.get('admin'));
    formData.append("nomeGruppo", urlParams.get('nomeGruppo'));
    try {
        const response = await fetch(urlDisiscrizione, {
            method: "POST",
            body: formData
        });
        if(!response.ok) {
            throw new Error("Response: " + response.status);
        }
        let DisiscrizioneRes = await response.json();
        console.log(DisiscrizioneRes);
        if(!DisiscrizioneRes["success"]) {
            console.log(DisiscrizioneRes["error"]);
        } else {
            window.location.href = `infoGruppo.php?nomeGruppo=${urlParams.get('nomeGruppo')}&admin=${urlParams.get('admin')}`;
        }
    } catch (error) {
        console.log(error);
    }
}

function getFiles() {
    let section = ``;
    for (let i = 0; i < files.length; i++) {
        section += `<div class="materiale">
                <div class="anteprima">`;
        if(document.querySelector("#username").innerText == files[i]["Username"]) {
           section +=  `<a href="#" class="btn btn-secondary material-icons delete-btn" data-titolo="${files[i]["Titolo"]}" data-file="${files[i]["Percorso"]}">close</a>`;
        }
        section += `<img src="${imgdir}${files[i]["Tipo"]}.png" alt="Estensione file ${files[i]["Tipo"]}">
                </div>
                <h2>${files[i]["Titolo"]}</h2>
                <p>${files[i]["Username"]}  -  ${files[i]["DataPubblicazione"]}</p>
                <a href="${filedir}${files[i]["Percorso"]}" class="download" download>Scarica</a>
            </div>`;
    }
    return section;
}

async function deleteMateriale(titolo, fileName) {
    let urlDelete = "API/api-delete-file.php";
    const formData = new FormData();
    formData.append("titolo", titolo);
    formData.append("fileName", fileName);
    formData.append("admin", urlParams.get('admin'));
    formData.append("nomeGruppo", urlParams.get('nomeGruppo'));
    try {
        const response = await fetch(urlDelete, {
            method: "POST",
            body: formData
        });
        if(!response.ok) {
            throw new Error("Response: " + response.status);
        }
        let deleteRes = await response.json();
        if(!deleteRes["success"]) {
            console.log(deleteRes["error"]);
        } else {
            getFileData();
        }
    } catch (error) {
        console.log(error);
    }
}

async function getFileData() {
    let urlFiles = `API/api-materiale-gruppo.php?nomeGruppo=${urlParams.get('nomeGruppo')}&admin=${urlParams.get('admin')}`;
    try {
        const responseFile = await fetch(urlFiles);
        if(!responseFile.ok){
            throw new Error("Response File status: " + responseFile.status);
        }
        files = await responseFile.json();
        document.querySelector("main section:last-of-type").innerHTML = getFiles(files);
    } catch (error) {
        console.log(error.message);
    }    
}

getFileData();