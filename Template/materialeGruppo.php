<header>
    <div class="row">
        <nav class="col-12">
            <ul class="row nav text-center">
                <li class="nav-item col-4"><a class="nav-link" href="">Info</a></li>
                <li class="nav-item col-4"><a class="nav-link" href="#">Materiali</a></li>
                <li class="nav-item col-4"><a style="border-right: 0px;" class="nav-link" href="#">Inscriviti</a></li>
            </ul>
        </nav>
    </div>
</header>
<section>
    <div class="materiale-gruppo">
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