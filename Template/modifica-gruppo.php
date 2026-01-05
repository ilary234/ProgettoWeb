<?php if(count($gruppo)>0): ?>
<section>
    <div class="info-gruppo">
        <div class="calendar-wrapper">
            <header>
                <p class="data-corrente"></p>
                <div class="icone">
                    <span id ="prev" class="material-icons">chevron_left</span>
                    <span id ="next" class="material-icons">chevron_right</span>
                </div>
            </header>
            <div class="calendario">
                <ul class="settimana">
                    <li>L</li>
                    <li>M</li>
                    <li>M</li>
                    <li>G</li>
                    <li>V</li>
                    <li>S</li>
                    <li>D</li>
                </ul>
                <ul class="giorni">
                </ul>
            </div>
        </div>
        <section class="dati-gruppo">
            <header class="position-relative">
                <h1><?php echo $gruppo[0]["NomeGruppo"]?> - <?php echo $gruppo[0]["Anno"]?></h1>
                <div class="buttons position-absolute top-0 d-flex gap-1">
                    <button class="btn btn-outline-secondary material-icons" id="delete">delete</button>
                    <button class="btn btn-outline-secondary material-icons" id="save">save</button>
                </div>
            </header>
            <p><?php echo $gruppo[0]["AdminGruppo"]?></p>
            <form action="#">
                <label for="luogo">Luogo:</label><br>
                <input type="text" id="luogo" name="luogo" class="col-10" placeholder="<?php echo $gruppo[0]["LuogoIncontro"]?>">
            </form>
            <section class="prossimo-incontro">
            </section>
        </section>
    </div>
    <section class="argomenti-gruppo">
        <label for="completamento">Percentuale di Completamento: </label><br>
        <progress id="completamento" value="<?php echo $gruppo[0]["PercentualeCompletamento"]?>" max="100"><?php echo $gruppo[0]["PercentualeCompletamento"]?></progress>
        <div>
            <h2>Argomenti:</h2>
            <button class="btn btn-outline-secondary material-icons" id="addArgomento">add</button>
        </div>
        <section>
            <form>
                <p id="numeroArgomenti" hidden><?php echo count($argomenti) ?></p>
                <?php for ($i=0; $i < count($argomenti); $i++): ?>
                    <?php if($argomenti[$i]["Svolto"]): ?>
                        <input type="checkbox" id="argomento<?php echo $i ?>" name="argomento<?php echo $i ?>" value="<?php echo $argomenti[$i]["Titolo"] ?>" checked>
                    <?php else: ?>
                        <input type="checkbox" id="argomento<?php echo $i ?>" name="argomento<?php echo $i ?>" value="<?php echo $argomenti[$i]["Titolo"] ?>">
                    <?php endif ?>
                    <label for="argomento<?php echo $i ?>"><?php echo $argomenti[$i]["Titolo"] ?></label><br>
                <?php endfor ?>
            </form>
        </section>
    </section>
</section>
<div class="modal fade" id="inserisciIncontro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="inserisciIncontroLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="inserisciIncontroLabel">Nuovo incontro</h1>
        <button type="button" class="btn-close closeInserisciIncontro" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger d-none alertIncontro"></div>
        <form action="#">
            <label for="orarioIncontro">Orario incontro:</label>
            <input type="time" id="orarioIncontro" name="orarioIncontro">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary saveIncontro">Salva</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="eliminaIncontro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="eliminaIncontroLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="eliminaIncontroLabel">Elimina incontro</h1>
        <button type="button" class="btn-close closeEliminaIncontro" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Sei sicuro di voler eliminare l'incontro?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary deleteIncontro" data-bs-dismiss="modal">Delete</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="eliminaGruppo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="eliminaGruppoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="eliminaGruppoLabel">Elimina gruppo</h1>
        <button type="button" class="btn-close closeEliminaGruppo" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Sei sicuro di voler eliminare il gruppo?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary deleteGruppo" data-bs-dismiss="modal">Delete</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="inserisciArgomento" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="inserisciArgomentoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="inserisciArgomentoLabel">Nuovo Argomento</h1>
        <button type="button" class="btn-close closeInserisciArgomento" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger d-none alertArgomento"></div>
        <form action="#">
            <label for="titoloArgomento">Titolo:</label>
            <input type="text" id="titoloArgomento" name="titoloArgomento">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary saveArgomento">Salva</button>
      </div>
    </div>
  </div>
</div>
<?php else: echo "Gruppo non esistente"?>
<?php endif ?>