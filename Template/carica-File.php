<section class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center mb-4">Carica File</h1>
            <div class="alert alert-danger d-none"></div>
            <form action="#" method="post" class="form-wrapper" enctype="multipart/form-data">
                <input type="hidden" id="username" name="username" value="<?php echo $templateParams["username"] ?>">
                <input type="hidden" id="admin" name="admin" value="<?php echo $templateParams["admin"] ?>">
                <input type="hidden" id="nomeGruppo" name="nomeGruppo" value="<?php echo $templateParams["nomeGruppo"] ?>">
                <div class="mb-3">
                    <label for="titolo" class="form-label">Titolo</label>
                    <input type="text" class="form-control" id="titolo" name="titolo" required>
                </div>
                <div class="mb-3">
                    <label for="uploadFile" class="form-label">File</label>
                    <input type="file" class="form-control" id="uploadFile" name="uploadFile" required>
                </div>
                <div class="d-grid">
                    <button type="submit" id="caricaFile" class="btn btn-primary btn-submit">Invia</button>
                </div>
            </form>
        </div>
    </div>
</section>