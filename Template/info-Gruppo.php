<?php if(count($gruppo)>0): ?>
<header>
    <div class="row">
        <nav class="col-12">
            <ul class="row nav text-center">
                <li class="nav-item col-4"><a class="nav-link attivo" href="#">Info</a></li>
                <?php if(isset($templateParams["username"]) && $templateParams["iscritto"]): ?>
                <li class="nav-item col-4"><a class="nav-link" href="materialeGruppo.php?nomeGruppo=<?php echo $gruppo[0]["NomeGruppo"]?>&admin=<?php echo $gruppo[0]["AdminGruppo"]?>">Materiale</a></li>
                <?php else: ?>
                <li class="nav-item col-4"><a class="nav-link disabled" href="#" aria-disabled="true" tabindex="-1">Materiale</a></li>
                <?php endif ?>
                <?php if(!isset($templateParams["username"]) || (isset($templateParams["username"]) && !$templateParams["iscritto"])): ?>
                <li class="nav-item col-4"><a style="border-right: 0px;" class="nav-link gestioneIscrizione" href="#">Iscriviti</a></li>
                <?php else: ?>
                <li class="nav-item col-4"><a style="border-right: 0px;" class="nav-link gestioneIscrizione" href="#">Disiscriviti</a></li>
                <?php endif ?>
            </ul>
        </nav>
    </div>
</header>
<?php if(isset($templateParams["username"])): ?>
<p id="username" hidden><?php echo $_SESSION["username"] ?></p>
<?php else: ?>
<p id="username" hidden></p>
<?php endif ?>
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
            <h1><?php echo $gruppo[0]["NomeGruppo"]?> - <?php echo $gruppo[0]["Anno"]?></h1>
            <p><a href="areaRiservata.php?user=<?php echo $gruppo[0]["AdminGruppo"]?>">
                <?php echo $gruppo[0]["AdminGruppo"]?></a></p>
            <p>Luogo: <?php echo $gruppo[0]["LuogoIncontro"]?></p><br>
            <section class="prossimo-incontro">
            </section>
        </section>
    </div>
    <section class="argomenti-gruppo">
        <label for="completamento">Percentuale di Completamento: </label><br>
        <progress id="completamento" value="<?php echo $gruppo[0]["PercentualeCompletamento"]?>" max="100"> <?php echo $gruppo[0]["PercentualeCompletamento"]?>%</progress>
        <h2>Argomenti:</h2>
        <section>
            <ul>
            <?php foreach($argomenti as $argomento): ?>
                <li><?php echo $argomento["Titolo"]?></li>
            <?php endforeach ?>
            </ul>
        </section>
    </section>
</section>
<div class="modal fade" id="confermaAzione" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confermaAzioneLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="confermaAzioneLabel">Conferma</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php if(!isset($templateParams["username"]) || (isset($templateParams["username"]) && !$templateParams["iscritto"])): ?>
        <p id="iscrizione">Sei sicuro di volerti Iscrivere?</p>
        <?php else: ?>
        <p id="disiscrizione">Sei sicuro di volerti Disiscrivere?</p>
        <?php endif ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary calcel" data-bs-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary confirm" data-bs-dismiss="modal">Yes</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="loginNecessario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="loginNecessarioLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="loginNecessarioLabel">Iscrizione</h1>
        <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Per iscriversi è necessario effettuare il <a href="login.php" class="tooltip-test" title="Tooltip">login</a></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary ok" data-bs-dismiss="modal">Ok</button>
      </div>
    </div>
  </div>
</div>
<?php else: echo "Gruppo non esistente"?>
<?php endif ?>