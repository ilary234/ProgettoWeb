<section class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center mb-4">Nuovo Gruppo</h1>
            <?php if(isset($templateParams["createGruppoError"])): ?>
                <div class="alert alert-danger"><?php echo $templateParams["createGruppoError"]; ?></div>
            <?php endif; ?>
            <form action="#" method="post" class="form-wrapper">
                <div class="mb-3">
                    <label for="nomeGruppo" class="form-label">Nome Gruppo</label>
                    <input type="text" class="form-control" id="nomeGruppo" name="nomeGruppo" maxlength=80 required>
                </div>
                <div class="mb-3">
                    <label for="luogo" class="form-label">Luogo</label>
                    <input type="text" class="form-control" id="luogo" name="luogo" required>
                </div>
                <div class="mb-3">
                    <label for="corso" class="form-label">Corso</label>
                    <select id="corso" name="corso" class="col-12" required></select>
                </div>
                <div class="mb-3">
                    <label for="materia" class="form-label">Materia</label>
                    <select id="materia" name="materia" class="col-12" required></select>
                </div>
                <div class="flex-container">
                    <button type="button" id="cancel" class="btn btn-primary material-icons">arrow_back</button>
                    <button type="submit" class="btn btn-primary btn-submit">Invia</button>
                </div>
            </form>
        </div>
    </div>
</section>