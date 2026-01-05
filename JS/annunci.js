document.getElementById("categorie").addEventListener("change", filterAnnunci);
document.getElementById("materie").addEventListener("change", filterAnnunci);

let annunci, categorie, materie;

async function getStartData() {
    let urlAnnunci = "API/api-annunci.php";
    let urlCategories = "API/api-categorie.php";
    let urlMaterie = "API/api-materie.php";
    try {
        const responseAnnunci = await fetch(urlAnnunci);
        const responseCategories = await fetch(urlCategories);
        const responseMaterie = await fetch(urlMaterie);
        if(!responseAnnunci.ok){
            throw new Error("Response Annunci status: " + responseAnnunci.status);
        } else if(!responseCategories.ok){
            throw new Error("Response Categories status: " + responseCategories.status);
        } else if(!responseMaterie.ok){
            throw new Error("Response Materie status: " + responseMaterie.status);
        }
        annunci = await responseAnnunci.json();
        categorie = await responseCategories.json();
        materie = await responseMaterie.json();
        console.log(annunci);
        console.log(categorie);
        console.log(materie);
        document.getElementById("categorie").innerHTML = getCategoriesOptions();
        document.getElementById("materie").innerHTML = getMaterieOptions();
        document.querySelector("main section:last-of-type").innerHTML = getAnnunciHTML(annunci);
    } catch (error) {
        console.log(error.message);
    }    
}

function getCategoriesOptions() {
    let select = `<option value="--">--</option>`;
    categorie.forEach(cat => {
        select += `<option value="${cat.Categoria}">${cat.Categoria}</option>`;
    });
    return select;
}

function getMaterieOptions() {
    let select = `<option value="--">--</option>`;
    materie.forEach(mat => {
        select += `<option value="${mat.Id_Materia}">${mat.NomeMateria}</option>`;
    });
    return select;
}

function filterAnnunci() {
    const categoriaSelezionata = document.getElementById("categorie").value;
    const materiaSelezionata = document.getElementById("materie").value;
    
    let annunciFiltrati = annunci;
    
    if (categoriaSelezionata !== "--") {
        annunciFiltrati = annunciFiltrati.filter(a => a.Categoria === categoriaSelezionata);
    }
    
    if (materiaSelezionata !== "--") {
        annunciFiltrati = annunciFiltrati.filter(a => a.Materia == materiaSelezionata);
    }
    
    document.querySelector("main section:last-of-type").innerHTML = getAnnunciHTML(annunciFiltrati);
}

function getAnnunciHTML(annunciList) {
    let section = ``;
    annunciList.forEach(annuncio => {
        const isOwner = LOGGED_USER && annuncio.Username === LOGGED_USER;
        section += `<div class="annuncio">
            ${isOwner ? `
                <button class="delete-btn" data-id="${annuncio.Id_annuncio}">✕</button>
            ` : ``}
            <h2>${annuncio.Titolo}</h2>
            <p>${annuncio.Username} - ${annuncio.DataPubblicazione}</p>
            <p>${annuncio.Anteprima}</p>
            <a href="annuncioAperto.php?annuncio=${annuncio.Id_annuncio}">Leggi tutto</a>
        </div>`;
    });

    return section;
}

getStartData();

let annuncioDaEliminare = null;

document.addEventListener("click", function (e) {
    if (e.target.classList.contains("delete-btn")) {
        annuncioDaEliminare = e.target.dataset.id;

        const modal = new bootstrap.Modal(
            document.getElementById("confermaAzione")
        );
        modal.show();
    }
});

document.addEventListener("DOMContentLoaded", () => {
    document.querySelector(".confirmAzione")
        .addEventListener("click", async () => {
            if (!annuncioDaEliminare) return;

            await eliminaAnnuncio(annuncioDaEliminare);
            annuncioDaEliminare = null;
        });
});

async function eliminaAnnuncio(id) {
    let urlDelete = "API/api-delete-annuncio.php";
    const formData = new FormData();
    formData.append("idAnnuncio", id);

    try {
        const response = await fetch(urlDelete, {
            method: "POST",
            body: formData
        });

        if (!response.ok) {
            throw new Error("Response: " + response.status);
        }

        let res = await response.json();

        if (!res.success) {
            console.log(res.error);
        } else {
            getStartData();
        }

    } catch (error) {
        console.log(error);
    }
}


