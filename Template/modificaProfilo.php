<section class="container my-5">
    <h2 class="text-center mb-4">Modifica dati personali</h2>

    <form id="editProfileForm" class="row g-3">

        <!-- Nome -->
        <div class="col-md-6">
            <label class="form-label">Nome</label>
            <input type="text" id="nome" class="form-control" required>
        </div>

        <!-- Email -->
        <div class="col-md-6">
            <label class="form-label">Email</label>
            <input type="email" id="email" class="form-control" required>
        </div>

        <!-- Cognome -->
        <div class="col-md-6">
            <label class="form-label">Cognome</label>
            <input type="text" id="cognome" class="form-control" required>
        </div>

        <!-- Telefono -->
        <div class="col-md-6">
            <label class="form-label">Telefono</label>
            <input type="tel" id="telefono" class="form-control">
        </div>

        <!-- Corso di laurea -->
        <div class="col-md-6">
            <label class="form-label">Corso di laurea</label>
            <select id="corso" class="form-select">
                <!-- opzioni caricate via JS -->
            </select>
        </div>
        
        <!-- Anno -->
        <div class="col-md-6">
            <label class="form-label">Anno</label>
            <input type="number" id="anno" class="form-control">
        </div>

        <!-- Pulsante -->
        <div class="col-12 text-end mt-4">
            <button type="submit" class="btn btn-primary px-4">Salva</button>
        </div>

    </form>
</section>
