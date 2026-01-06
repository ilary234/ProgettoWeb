document.addEventListener("DOMContentLoaded", async () => {
    console.log("JS CARICATO - modifica annuncio");

    if (!ANNUNCIO_ID) {
        showError("ID annuncio mancante");
        return;
    }

    try {
        await loadSelectData(); 
        await loadAnnuncio(ANNUNCIO_ID); 

        document
            .getElementById("newAnnouncementForm")
            .addEventListener("submit", e =>
                saveAnnuncio(e, ANNUNCIO_ID)
            );

    } catch (err) {
        console.error(err);
        showError("Errore inizializzazione pagina");
    }
});

function showError(msg) {
    const box = document.getElementById("errorBox");
    box.textContent = msg;
    box.classList.remove("d-none");
}

let materie = [];
let categorie = [];

async function loadSelectData() {
    const resMaterie = await fetch("API/api-materie.php");
    const resCategorie = await fetch("API/api-categorie.php");

    if (!resMaterie.ok || !resCategorie.ok) {
        throw new Error("Errore caricamento select");
    }

    materie = await resMaterie.json();
    categorie = await resCategorie.json();

    document.getElementById("materie").innerHTML = getMaterieOptions();
    document.getElementById("categorie").innerHTML = getCategorieOptions();
}

function getCategorieOptions() {
    let html = `<option value="">--</option>`;
    categorie.forEach(cat => {
        html += `<option value="${cat.Categoria}">${cat.Categoria}</option>`;
    });
    return html;
}

function getMaterieOptions() {
    let html = `<option value="">--</option>`;
    materie.forEach(mat => {
        html += `<option value="${mat.Id_Materia}">${mat.NomeMateria}</option>`;
    });
    return html;
}

async function loadAnnuncio(id) {
    const res = await fetch(`API/api-dettagli-annuncio.php?annuncio=${id}`);
    const data = await res.json();

    if (!res.ok || data.error) {
        showError(data.error || "Errore caricamento annuncio");
        return;
    }

    document.getElementById("titolo").value = data.Titolo;
    document.getElementById("anteprima").value = data.Anteprima;
    document.getElementById("descrizione").value = data.Descrizione;
    document.getElementById("categorie").value = data.Categoria;
    document.getElementById("materie").value = data.Materia;
}

async function saveAnnuncio(e, idAnnuncio) {
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

    const payload = {
        id_annuncio: idAnnuncio,
        titolo,
        anteprima,
        descrizione,
        categoria,
        materia
    };

    const res = await fetch("API/api-update-annuncio.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(payload)
    });

    const result = await res.json();

    if (!res.ok || !result.success) {
        showError(result.message || "Errore salvataggio");
        return;
    }

    window.location.href = `annuncioAperto.php?id=${idAnnuncio}`;
}
