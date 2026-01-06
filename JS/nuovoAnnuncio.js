document.getElementById("newAnnouncementForm").addEventListener("submit", createAnnouncement);

let materie = [];
let categorie = [];

async function loadSelectData() {
    try {
        const responseMaterie = await fetch("API/api-materie.php");
        const responseCategorie = await fetch("API/api-categorie.php");

        if (!responseMaterie.ok) {
            throw new Error("Errore caricamento materie");
        }

        if (!responseCategorie.ok) {
            throw new Error("Errore caricamento categorie");
        }

        materie = await responseMaterie.json();
        categorie = await responseCategorie.json();
        document.getElementById("materie").innerHTML = getMaterieOptions();
        document.getElementById("categorie").innerHTML = getCategoriesOptions();

    } catch (error) {
        console.error(error.message);
    }
}

function getCategoriesOptions() {
    let select = `<option value="">--</option>`;
    categorie.forEach(cat => {
        select += `<option value="${cat.Categoria}">${cat.Categoria}</option>`;
    });
    return select;
}

function getMaterieOptions() {
    let select = `<option value="">--</option>`;
    materie.forEach(mat => {
        select += `<option value="${mat.Id_Materia}">${mat.NomeMateria}</option>`;
    });
    return select;
}

async function createAnnouncement(e) {
    e.preventDefault();

    const errorBox = document.getElementById("errorBox");
    errorBox.classList.add("d-none");
    errorBox.innerText = "";

    const titolo = document.getElementById("titolo").value.trim();
    const anteprima = document.getElementById("anteprima").value.trim();
    const descrizione = document.getElementById("descrizione").value.trim();
    const categoria = document.getElementById("categorie").value;
    const materia = document.getElementById("materie").value;

    if (titolo.length > 50) {
        errorBox.innerText = "Il titolo può contenere al massimo 50 caratteri";
        errorBox.classList.remove("d-none");
        return;
    }

    if (!titolo || !anteprima || !descrizione || !categoria || !materia) {
        errorBox.innerText = "Tutti i campi sono obbligatori";
        errorBox.classList.remove("d-none");
        return;
    }

    const response = await fetch("API/api-nuovo-annuncio.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
            titolo,
            anteprima,
            descrizione,
            categoria,
            materia
        })
    });

    const result = await response.json();

    if (!response.ok || !result.success) {
        errorBox.innerText = result.message || "Errore nella creazione dell'annuncio";
        errorBox.classList.remove("d-none");
        return;
    }

    window.location.replace("/ProgettoWeb/annunci.php");
}

loadSelectData();
