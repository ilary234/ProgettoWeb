<script>
    const ANNUNCIO_ID = <?= json_encode($templateParams["idAnnuncio"]); ?>;
    const LOGGED_USER = "<?php echo $_SESSION['username'] ?? ''; ?>";
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
<div class="modal fade" id="confermaAzione" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confermaAzioneLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="confermaAzioneLabel">Conferma</h1>
        <button type="button" class="btn-close closeAzione" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Sei sicuro di voler eliminare il commento?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary calcelAzione" data-bs-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary confirmAzione" data-bs-dismiss="modal">Yes</button>
      </div>
    </div>
  </div>
</div>
<script>
function toggleComments() {
    const drawer = document.querySelector('.commenti-sezione');
    if (!drawer) return;

    drawer.classList.toggle('open');
}
</script>
