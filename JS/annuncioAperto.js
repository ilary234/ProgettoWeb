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

    document.addEventListener("click", function (e) {
        const toggle = e.target.closest(".commenti-toggle");
        if (!toggle) return;

        const sezione = document.querySelector(".commenti-sezione");
        if (!sezione) return;

        sezione.classList.toggle("open");
        console.log("CLICK → open:", sezione.classList.contains("open"));
    });


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
        lista.innerHTML += `
            <div class="commento">
                <div class="commento-meta">
                    ${c.Username} - ${c.DataPubblicazione}
                </div>
                <div class="commento-testo">
                    ${c.Testo}
                </div>
            </div>
        `;
    });

    document.getElementById("commenti-title").textContent =
        `Commenti (${commenti.length})`;

    // Aggiorna anche il conteggio nella toggle bar per mobile
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
