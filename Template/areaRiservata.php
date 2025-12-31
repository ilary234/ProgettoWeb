<section class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center mb-4">Area Riservata</h2>
            
            <!-- Informazioni utente -->
            <div class="user-info bg-light p-4 rounded mb-5">
                <div class="row mb-3">
                    <div class="col-6">
                        <strong>Nome e Cognome:</strong> <?php echo $user['Nome']; ?>&nbsp;</strong> <?php echo $user['Cognome']; ?>
                    </div>
                    <div class="col-6">
                        <strong>Telefono:</strong> <?php echo $user['Telefono'] ?: 'Non specificato'; ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <strong>Username:</strong> <?php echo $user['Username']; ?>
                    </div>
                    <div class="col-6">
                        <strong>Corso di Laurea:</strong> <?php echo $user['CorsoLaurea'] ?: 'Non specificato'; ?>
                    </div>
                </div>                
                <div class="row">
                    <div class="col-6">
                        <strong>Email:</strong> <?php echo $user['Email']; ?>
                    </div>
                    <div class="col-6">
                        <strong>Anno:</strong> <?php echo $user['Anno'] ?: 'Non specificato'; ?>
                    </div>
                </div>
            </div>
            
            <!-- Materiale condiviso -->
            <div class="materiale-condiviso">
                <h3 class="text-center mb-4">Materiale Condiviso</h3>
                <div class="row">
                    <!-- Qui verranno aggiunti i materiali -->
                    <p class="text-center text-muted">Nessun materiale condiviso al momento.</p>
                </div>
            </div>
            
            <!-- Pulsante Logout -->
            <div class="text-center mt-4">
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
</section>
