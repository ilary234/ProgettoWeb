document.addEventListener("DOMContentLoaded", () => {
    console.log("JS CARICATO");

    if (!ANNUNCIO_ID) {
        console.error("ID annuncio mancante");
        return;
    }

    loadAnnuncio(ANNUNCIO_ID);
    loadCommenti(ANNUNCIO_ID);

    document.getElementById("commentForm")
        ?.addEventListener("submit", saveComment);
});

async function loadAnnuncio(id) {
    const res = await fetch(`API/api-dettagli-annuncio.php?annuncio=${id}`);
    const data = await res.json();

    document.getElementById("titolo").textContent = data.Titolo;
    document.getElementById("meta").textContent =
        `${data.Username} - ${data.DataPubblicazione}`;
    document.getElementById("descrizione").textContent = data.Descrizione;
}

async function loadCommenti(id) {
    const res = await fetch(`API/api-commenti.php?id=${id}`);
    const commenti = await res.json();

    const lista = document.getElementById("commenti");
    lista.innerHTML = "";

    commenti.forEach(c => {
        const isOwner = LOGGED_USER && c.Username === LOGGED_USER;
 
        lista.innerHTML += `
            <div class="commento">
                ${isOwner ? `
                    <button class="delete-btn comment-delete"
                            data-annuncio="${ANNUNCIO_ID}"
                            data-username="${c.Username}"
                            data-data="${c.DataPubblicazione}"
                            data-ora="${c.Ora}">
                        ✕
                    </button>
                ` : ``}
                <div class="commento-meta">
                    ${c.Username}
                </div>
                <div class="commento-testo">
                    ${c.Testo}
                </div>
            </div>
        `;
    });

    document.getElementById("commenti-title").textContent =
        `Commenti (${commenti.length})`;

    const commentiCount = document.getElementById("commenti-count");
    if (commentiCount) {
        commentiCount.textContent = `Commenti (${commenti.length})`;
    }
}

async function saveComment(e, id) {
    e.preventDefault();

    const textarea = e.target.querySelector("textarea");

    const res = await fetch("API/api-inserisci-commento.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
            id_annuncio: ANNUNCIO_ID,
            testo: textarea.value
        })
    });

    const result = await res.json();

    if (!result.success) {
        alert(result.message || "Errore");
        return;
    }

    textarea.value = "";
    loadCommenti(ANNUNCIO_ID);
}

let commentoDaEliminare = null;

document.addEventListener("click", e => {
    if (e.target.classList.contains("comment-delete")) {
        commentoDaEliminare = {
            id_annuncio: e.target.dataset.annuncio,
            username: e.target.dataset.username,
            data: e.target.dataset.data,
            ora: e.target.dataset.ora
        };

        const modal = new bootstrap.Modal(
            document.getElementById("confermaAzione")
        );
        modal.show();
    }
});

document.addEventListener("DOMContentLoaded", () => {
    document.querySelector(".confirmAzione")
        .addEventListener("click", async () => {
            if (!commentoDaEliminare) return;

            await eliminaCommento(commentoDaEliminare);
            commentoDaEliminare = null;
        });
});

async function eliminaCommento(commento) {
    const urlDelete = "API/api-delete-commento.php";
    const formData = new FormData();

    formData.append("idAnnuncio", commento.id_annuncio);
    formData.append("username", commento.username);
    formData.append("data", commento.data);
    formData.append("ora", commento.ora);

    try {
        const response = await fetch(urlDelete, {
            method: "POST",
            body: formData
        });

        if (!response.ok) {
            throw new Error("Response: " + response.status);
        }

        const res = await response.json();

        if (!res.success) {
            console.log(res.message || res.error);
        } else {
            loadCommenti(ANNUNCIO_ID);
        }

    } catch (error) {
        console.log(error);
    }
}
