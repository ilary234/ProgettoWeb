<section>
    <form action="#" class="row text-center">
        <div class="col-12">
            <div class="row justify-content-sm-center">
            <label for="corsi" class="col-3 col-sm-auto">Corso: </label>
            <select id="corsi" name="corsi" class="col-3">
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
<?php if(isUserLoggedIn()): ?>
<a href="creaGruppo.php" class="addGroup material-icons">add</a>
<?php endif ?>