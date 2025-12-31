<section class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center mb-4">Registrati</h1>
            <?php if(isset($templateParams["registrationerror"])): ?>
                <div class="alert alert-danger"><?php echo $templateParams["registrationerror"]; ?></div>
            <?php endif; ?>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>
                <div class="mb-3">
                    <label for="cognome" class="form-label">Cognome</label>
                    <input type="text" class="form-control" id="cognome" name="cognome" required>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-submit">Invia</button>
                </div>
            </form>
            <div class="text-center mt-3">
                <p><a href="login.php" class="link">Accedi</a></p>
            </div>
        </div>
    </div>
</section>
