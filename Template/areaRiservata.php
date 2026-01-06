<?php
    $loggedUser = $templateParams["loggedUser"];
    $profileUser = $templateParams["profileUser"];
    $isOwner = $templateParams["isOwner"];
?>
<script>
    const LOGGED_USER  = <?= $loggedUser ? json_encode($loggedUser) : 'null' ?>;
    const PROFILE_USER = <?= json_encode($profileUser) ?>;
</script>
<script src="JS/areaRiservata.js"></script>
<section class="container my-5 <?= $isOwner ? 'owner-view' : 'guest-view' ?>">

    <h2 class="text-center mb-4">Area Riservata</h2>

    <div class="card mb-5 position-relative">
        <div class="card-body">
            <?php if ($isOwner): ?>
                <div class="position-absolute top-0 end-0 m-3 d-flex gap-2">
                    <a href="modificaProfilo.php" class="btn btn-outline-secondary">✏️</a>
                    <a href="cambiaPassword.php" class="btn btn-outline-primary">Cambia password</a>
                    <a href="logout.php" class="btn btn-outline-danger">➜]</a>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Nome e Cognome</strong><br>
                        <span id="nome-cognome"></span>
                    </p>
                    <p><strong>Username</strong><br>
                        <span id="username"></span>
                    </p>
                    <p><strong>Email</strong><br>
                        <span id="email"></span>
                    </p>
                </div>
                <div class="col-md-6">
                    <p><strong>Telefono</strong><br>
                        <span id="telefono"></span>
                    </p>
                    <p><strong>Corso di laurea</strong><br>
                        <span id="corso"></span>
                    </p>
                    <p><strong>Anno</strong><br>
                        <span id="anno"></span>
                    </p>
                </div>
            </div>

        </div>
    </div>

    <!-- MATERIALE CONDIVISO -> DA SISTEMARE -->
     <?php if ($isOwner): ?>
        <h3 class="text-center mb-4">Materiale condiviso</h3>
        <section class="flex-container"></section>
    <?php endif; ?>

</section>

