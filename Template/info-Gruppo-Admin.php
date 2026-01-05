<?php if(count($gruppo)>0): ?>
<header>
    <div class="row">
        <nav class="col-12">
            <ul class="row nav text-center">
                <li class="nav-item col-6"><a class="nav-link attivo" href="#">Info</a></li>
                <li class="nav-item col-6"><a class="nav-link" href="materialeGruppo.php?nomeGruppo=<?php echo $gruppo[0]["NomeGruppo"]?>&admin=<?php echo $gruppo[0]["AdminGruppo"]?>" style="border-right: 0px;">Materiale</a></li>
            </ul>
        </nav>
    </div>
</header>
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
            <header>
              <h1><?php echo $gruppo[0]["NomeGruppo"]?> - <?php echo $gruppo[0]["Anno"]?></h1>
              <div class="edit-buttons">
                  <button class="btn btn-outline-secondary material-icons" id="edit">edit</button>
              </div>
            </header>
            <p><?php echo $gruppo[0]["AdminGruppo"]?></p>
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
<?php else: echo "Gruppo non esistente"?>
<?php endif ?>