<script>
    const ANNUNCIO_ID = <?= json_encode($templateParams["idAnnuncio"]); ?>;
</script>
<script src="JS/annuncioAperto.js"></script>
<section class="container-fluid mt-4 pagina-annuncio" data-id="<?= $templateParams['idAnnuncio']; ?>">
    <div class="row">
        <div class="col-md-6 annuncio-col">
            <div class="annuncio-dettagli">
                <h1 id="titolo"></h1>
                <p class="meta"><strong id="meta"></strong></p>
                <div class="descrizione">
                    <p id="descrizione"></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 commenti-col">
            <div class="commenti-sezione">
                <div class="commenti-toggle d-md-none" onclick="toggleComments()">
                    <span id="commenti-count"></span>
                    <span class="toggle-icon">⌃</span>
                </div>
                <div class="commenti-header d-none d-md-flex">
                    <h3 id="commenti-title"></h3>
                </div>
                <div class="commenti-lista" id="commenti"></div>
                <div class="aggiungi-commento">
                    <form id="commentForm">
                        <textarea name="commento" required placeholder="Aggiungi un commento..."></textarea>
                        <button type="submit">➤</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
function toggleComments() {
    const drawer = document.querySelector('.commenti-sezione');
    if (!drawer) return;

    drawer.classList.toggle('open');
}
</script>
