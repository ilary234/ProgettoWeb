<script>
    const LOGGED_USER = "<?php echo $_SESSION['username'] ?? ''; ?>";
</script>
<section>
    <form action="#" class="row text-center">
        <div class="col-12">
            <div class="row justify-content-sm-center">
            <label for="categorie" class="col-3 col-sm-auto">Categoria:</label>
            <select id="categorie" name="categorie" class="col-3">
                <option value="--">--</option>
            </select>
            <label for="materie" class="col-3 col-sm-auto">Materia:</label>
            <select id="materie" name="materie" class="col-3">
                <option value="--">--</option>
            </select>
            </div>
        </div>
    </form>
</section>
<section class="flex-container"></section>
<a href="nuovoAnnuncio.php" class="new-announcement">+</a>
<div class="modal fade" id="confermaAzione" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confermaAzioneLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="confermaAzioneLabel">Conferma</h1>
        <button type="button" class="btn-close closeAzione" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Sei sicuro di voler eliminare l'annuncio?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary calcelAzione" data-bs-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary confirmAzione" data-bs-dismiss="modal">Yes</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="loginNecessario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="loginNecessarioLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="loginNecessarioLabel">Creazione annuncio</h1>
        <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Per creare un annuncio è necessario effettuare il <a href="login.php" class="tooltip-test" title="Tooltip">login</a></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary ok" data-bs-dismiss="modal">Ok</button>
      </div>
    </div>
  </div>
</div>