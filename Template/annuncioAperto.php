<section class="container-fluid mt-4">
    <div class="row">
        <!-- Parte sinistra: Titolo, Autore, Data, Descrizione -->
        <div class="col-md-6">
            <div class="annuncio-dettagli">
                <h1><?php echo $annuncio['Titolo']; ?></h1>
                <p><strong>Autore:</strong> <?php echo $annuncio['Username']; ?></p>
                <p><strong>Data:</strong> <?php echo $annuncio['DataPubblicazione']; ?></p>
                <div class="descrizione">
                    <h3>Descrizione</h3>
                    <p><?php echo $annuncio['Descrizione']; ?></p>
                </div>
                <!-- Pulsante per mostrare commenti su mobile -->
                <button class="btn btn-primary d-md-none mt-3" onclick="toggleComments()">Mostra Commenti</button>
            </div>
        </div>
        <!-- Parte destra: Commenti -->
        <div class="col-md-6">
            <div class="commenti-sezione">
                <!-- Header commenti -->
                <div class="commenti-header d-flex justify-content-between align-items-center">
                    <h3>Commenti</h3>
                    <div>
                        <span class="badge bg-primary"><?php echo count($commenti); ?> commenti</span>
                        <button class="btn btn-sm btn-outline-secondary d-md-none ms-2" onclick="toggleComments()">Chiudi</button>
                    </div>
                </div>
                <!-- Sezione scrollabile per i commenti -->
                <div class="commenti-lista" style="max-height: 400px; overflow-y: auto; border: 1px solid #ddd; padding: 10px;">
                    <?php if (!empty($commenti)): ?>
                        <?php foreach ($commenti as $commento): ?>
                            <div class="commento mb-3">
                                <strong><?php echo $commento['Username']; ?>:</strong>
                                <p><?php echo $commento['Testo']; ?></p>
                                <small><?php echo $commento['DataPubblicazione'] . ' ' . $commento['Ora']; ?></small>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>Nessun commento ancora.</p>
                    <?php endif; ?>
                </div>
                <!-- Sezione per aggiungere commento -->
                <div class="aggiungi-commento mt-3">
                    <?php if(isset($commentError)): ?>
                        <div class="alert alert-danger"><?php echo $commentError; ?></div>
                    <?php endif; ?>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="nuovo-commento" class="form-label">Aggiungi un commento</label>
                            <textarea class="form-control" id="nuovo-commento" name="commento" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Aggiungi Commento</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
function toggleComments() {
    document.querySelector('.commenti-sezione').classList.toggle('open');
}
</script>