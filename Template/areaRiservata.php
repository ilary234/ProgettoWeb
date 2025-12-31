<section class="container my-5">

    <h2 class="text-center mb-4">Area Riservata</h2>

    <!-- BOX UTENTE -->
    <div class="card mb-5 position-relative">
        <div class="card-body">

            <!-- PULSANTI AZIONE (MODIFICA / CAMBIA PASSWORD / LOGOUT) -->
            <div class="position-absolute top-0 end-0 m-3 d-flex gap-2">

                <!-- Modifica profilo -->
                <a href="modifica_profilo.php" class="btn btn-outline-secondary">✏️</a>

                <!-- Cambia password -->
                <a href="cambia_password.php" class="btn btn-outline-primary">Cambia password</a>

                <!-- Logout -->
                <a href="logout.php" class="btn btn-outline-danger">➜]</a>

            </div>

            <div class="row">
                <!-- Colonna sinistra -->
                <div class="col-md-6">
                    <p><strong>Nome e Cognome</strong><br>
                        <?php echo $user['Nome'] . ' ' . $user['Cognome']; ?>
                    </p>

                    <p><strong>Username</strong><br>
                        <?php echo $user['Username']; ?>
                    </p>

                    <p><strong>Email</strong><br>
                        <?php echo $user['Email']; ?>
                    </p>
                </div>

                <!-- Colonna destra -->
                <div class="col-md-6">
                    <p><strong>Telefono</strong><br>
                        <?php echo $user['Telefono'] ?: 'Non specificato'; ?>
                    </p>

                    <p><strong>Corso di laurea</strong><br>
                        <?php echo $user['CorsoLaurea'] ?: 'Non specificato'; ?>
                    </p>

                    <p><strong>Anno</strong><br>
                        <?php echo $user['Anno'] ?: 'Non specificato'; ?>
                    </p>
                </div>
            </div>

        </div>
    </div>

    <!-- MATERIALE CONDIVISO -->
    <h3 class="text-center mb-4">Materiale condiviso</h3>

    <div class="row g-4">

        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <div class="bg-light mb-3" style="height:150px;"></div>
                    <h5 class="card-title">Titolo</h5>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <div class="bg-light mb-3" style="height:150px;"></div>
                    <h5 class="card-title">Titolo</h5>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <div class="bg-light mb-3" style="height:150px;"></div>
                    <h5 class="card-title">Titolo</h5>
                </div>
            </div>
        </div>

    </div>

</section>
