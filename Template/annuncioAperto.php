<script>
    const ANNUNCIO_ID = <?= json_encode($templateParams["idAnnuncio"]); ?>;
    const LOGGED_USER = "<?php echo $_SESSION['username'] ?? ''; ?>";
</script>
<section class="container-fluid mt-4 pagina-annuncio" data-id="<?= $templateParams['idAnnuncio']; ?>">
    <div class="row">
        <div class="col-md-6 annuncio-col">
            <div class="annuncio-dettagli">
                <div class="annuncio-header">
                    <h2 id="titolo"></h2>
                    <div class="annuncio-actions d-none" id="annuncioActions">
                        <button class="btn btn-sm btn-outline-primary" id="editAnnuncioBtn">✏️</button>
                        <button class="btn btn-sm btn-outline-danger" id="deleteAnnuncioBtn">✕</button>
                    </div>
                </div>
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
                        <label for="commento">Nuovo commento</label>
                        <textarea id="commento" name="commento" required placeholder="Aggiungi un commento..."></textarea>
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
<div class="modal fade" id="confermaEliminazioneAnnuncio" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confermaEliminazioneAnnuncioLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="confermaEliminazioneAnnuncioLabel">Conferma</h1>
        <button type="button" class="btn-close closeDeleteAnnuncio" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Sei sicuro di voler eliminare l'annuncio?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary cancelDeleteAnnuncio" data-bs-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary confirmDeleteAnnuncio" data-bs-dismiss="modal">Yes</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="loginNecessario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="loginNecessarioLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="loginNecessarioLabel">Inserimento commento</h1>
        <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Per inserire il commento è necessario effettuare il <a href="login.php" class="tooltip-test" title="Tooltip">login</a></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary ok" data-bs-dismiss="modal">Ok</button>
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
