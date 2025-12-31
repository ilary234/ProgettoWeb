<section class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center mb-4">Accedi</h1>
            <?php if(isset($templateParams["loginerror"])): ?>
                <div class="alert alert-danger"><?php echo $templateParams["loginerror"]; ?></div>
            <?php endif; ?>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-submit">Invia</button>
                </div>
            </form>
            <div class="text-center mt-3">
                <a href="registrazione.php" class="link">Registrati</a>
            </div>
        </div>
    </div>
</section>