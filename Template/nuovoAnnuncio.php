<section class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center mb-4">Nuovo Annuncio</h1>
            <div id="errorBox" class="alert alert-danger d-none"></div>
            <form id="newAnnouncementForm">
                <div class="mb-3">
                    <label for="titolo" class="form-label">Titolo</label>
                    <input type="text" id="titolo" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="anteprima" class="form-label">Anteprima</label>
                    <textarea id="anteprima" class="form-control textarea-2" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="descrizione" class="form-label">Descrizione</label>
                    <textarea id="descrizione" class="form-control textarea-4" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="categorie" class="form-label">Categoria</label>
                    <select id="categorie" class="form-select" required></select>
                </div>
                 <div class="mb-3">
                    <label for="materie" class="form-label">Materia</label>
                    <select id="materie" class="form-select" required></select>
                </div>
                <div class="mb-4 d-none" id="newMateriaBox">
                    <label for="newMateria" class="form-label">Nuova materia</label>
                    <input type="text" id="newMateria" class="form-control" placeholder="Inserisci nuova materia">
                </div>
                <div class="mb-4 text-end">
                    <button type="submit" class="btn btn-primary">Salva</button>
                </div>
            </form>
        </div>
    </div>
</section>