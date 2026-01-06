<section class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center mb-4">Cambia password</h1>
            <div id="errorBox" class="alert alert-danger d-none"></div>
            <form id="changePasswordForm" class="form-wrapper">
                <div class="mb-3">
                    <label for="oldPassword" class="form-label">Password attuale</label>
                    <input type="password" id="oldPassword" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="newPassword" class="form-label">Nuova password</label>
                    <input type="password" id="newPassword" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Conferma nuova password</label>
                    <input type="password" id="confirmPassword" class="form-control" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-submit">Salva</button>
                </div>
            </form>

        </div>
    </div>
</section>
