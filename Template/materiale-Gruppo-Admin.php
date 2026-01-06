<header>
    <div class="row">
        <nav class="col-12">
            <ul class="row nav text-center">
                <li class="nav-item col-6"><a class="nav-link" href="infoGruppo.php?nomeGruppo=<?php echo $templateParams["nomeGruppo"]?>&admin=<?php echo $templateParams["admin"]?>">Info</a></li>
                <li class="nav-item col-6"><a class="nav-link attivo" href="#" style="border-right: 0px;">Materiale</a></li>
            </ul>
        </nav>
    </div>
</header>
<section class="flex-container"></section>
<button class="addMaterial material-icons">add</button>
<div class="modal fade" id="confermaEliminazione" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confermaEliminazioneLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="confermaEliminazioneLabel">Conferma eliminazione file</h1>
        <button type="button" class="btn-close closeDelete" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Sei sicuro di voler eliminare il file?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary calcelDelete" data-bs-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary confirmDelete" data-bs-dismiss="modal">Yes</button>
      </div>
    </div>
  </div>
</div>