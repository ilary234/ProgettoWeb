USE progWeb;

-- =============================
--        CORSI DI LAUREA
-- =============================
INSERT INTO CorsoLaurea (Id_Corso, NomeCorso) VALUES
(6729, 'Architettura'),
(6669, 'Ingegneria Biomedica'),
(6673, 'Ingegneria e Scienze Informatiche (Triennale)'),
(6670, 'Ingegneria Elettronica'),
(6007, 'Tecnologie dei Sistemi Informatici'),
(6624, 'Scienze e Tecniche Psicologiche'),
(6681, 'Scienze e Cultura della Gastronomia'),
(6629, 'Tecnologie Alimentari'),
(6630, 'Viticoltura ed Enologia'),
(6823, 'Digital Transformation Management'),
(6705, 'Biomedical Engineering'),
(6699, 'Ingegneria e Scienze Informatiche (Magistrale)'),
(6715, "Ingegneria Elettronica e dell'Informazione"),
(6743, 'Neuroscienze e Riabilitazione Neuropsicologica'),
(6744, 'Psicologia Clinica'),
(6748, 'Psicologia Scolastica e di Comunità'),
(6747, 'Work, Organizational and Personnel Psychology'),
(6788, 'Scienze e Tecnologie Alimentari');

-- =============================
--            MATERIE
-- =============================
INSERT INTO Materia (Id_Materia, Corso, NomeMateria) VALUES
(1, 6673, 'Programmazione 1'),
(2, 6673, 'Basi di Dati'),
(3, 6669, 'Biomeccanica'),
(4, 6669, 'Biofisica'),
(5, 6670, 'Elettronica Digitale'),
(6, 6670, 'Campi Elettromagnetici'),
(7, 6729, 'Progettazione Architettonica'),
(8, 6007, 'Sistemi Operativi'),
(9, 6007, 'Reti di Calcolatori'),
(10, 6729, 'Storia dell’Architettura');

-- =============================
--            UTENTI
-- =============================
INSERT INTO Utente (Username, Nome, Cognome, Password, Email, Telefono, CorsoLaurea, Anno) VALUES
('mrossi',  'Marco',   'Rossi',   'pw123', 'mrossi@studio.unibo.it',  '3331111111', 6673, 2023),
('lbianchi','Luca',    'Bianchi', 'pw123', 'luca@studio.unibo.it',    '3332222222', 6669, 2022),
('fneri',   'Francesca','Neri',    'pw123', 'fneri@studio.unibo.it',   NULL,         6670, 2021),
('arianna', 'Arianna', 'Verdi',   'pw123', 'averdi@studio.unibo.it',  '3333333333', 6729, 2024),
('gconti',  'Giorgio', 'Conti',   'pw123', 'gconti@studio.unibo.it',  '3334444444', 6007, 2023);

-- =============================
--           ANNUNCI
-- =============================
INSERT INTO Annuncio (Categoria, Materia, Titolo, DataPubblicazione, Username, Anteprima, Descrizione) VALUES
('Domanda', 1, 'Cerco aiuto Programmazione 1', '2024-10-01', 'mrossi', 'Aiuto per esercizi...', 'Cerco tutor per preparare esame di Programmazione 1.'),
('Offerta', 2, 'Appunti Basi di Dati', '2024-10-02', 'lbianchi', 'Appunti completi...', 'Vendo appunti completi e riassunti per Basi di Dati.'),
('Domanda', 3, 'Spiegazioni Biomeccanica', '2024-10-03', 'fneri', 'Richiesta spiegazioni...', 'Ho bisogno di una mano per la parte di biomeccanica applicata.'),
('Offerta', 5, 'Lezioni private di elettronica', '2024-10-05', 'gconti', 'Offro lezioni...', 'Disponibile per ripetizioni su elettronica digitale.'),
('Domanda', 7, 'Supporto per Progettazione Architettonica', '2024-10-10', 'arianna', 'Aiuto progetto...', 'Cerco un collega per lavorare insieme al progetto.');

-- =============================
--           COMMENTI
-- =============================
INSERT INTO Commento (Username, Id_annuncio, DataPubblicazione, Ora, Testo) VALUES
('lbianchi', 1, '2024-10-02', '10:00:00', 'Posso aiutarti, scrivimi pure.'),
('mrossi', 2, '2024-10-03', '14:35:00', 'Sono interessato agli appunti.'),
('arianna', 4, '2024-10-06', '09:12:00', 'Di che livello sono le lezioni?'),
('fneri', 1, '2024-10-04', '16:00:00', 'Anch’io ho difficoltà con quella parte.'),
('gconti', 3, '2024-10-05', '18:22:00', 'Ti mando qualche esercizio risolto.');

-- =============================
--            GRUPPI
-- =============================
INSERT INTO Gruppo (AdminGruppo, NomeGruppo, Anno, CorsoLaurea, Materia, NumeroPartecipanti, LuogoIncontro, PercentualeCompletamento) VALUES
('mrossi', 'Studio Programmazione 1', 2023, 6673, 1, 5, 'Aula 2.3 - Campus', 40),
('lbianchi', 'Gruppo Biomeccanica', 2022, 6669, 3, 4, 'Biblioteca centrale', 20),
('arianna', 'Architettura Progetto A', 2024, 6729, 7, 6, 'Laboratorio Architettura', 50),
('fneri', 'Elettronica avanzata', 2021, 6670, 5, 3, 'Aula 1.1 - Dip. Ingegneria', 70),
('gconti', 'Sistemi operativi team', 2023, 6007, 8, 4, 'Online - Google Meet', 10);

-- =============================
--          ARGOMENTI
-- =============================
INSERT INTO Argomento (Titolo, AdminGruppo, NomeGruppo) VALUES
('Ricorsione', 'mrossi', 'Studio Programmazione 1'),
('Tabelle relazionali', 'mrossi', 'Studio Programmazione 1'),
('Analisi del cammino', 'lbianchi', 'Gruppo Biomeccanica'),
('Progetto preliminare', 'arianna', 'Architettura Progetto A'),
('Circuiti sequenziali', 'fneri', 'Elettronica avanzata');

-- =============================
--           INCONTRI
-- =============================
INSERT INTO Incontro (AdminGruppo, NomeGruppo, DataIncontro, Ora) VALUES
('mrossi', 'Studio Programmazione 1', '2024-10-12', '15:00:00'),
('lbianchi', 'Gruppo Biomeccanica', '2024-10-14', '09:00:00'),
('arianna', 'Architettura Progetto A', '2024-10-15', '10:30:00'),
('fneri', 'Elettronica avanzata', '2024-10-16', '14:00:00'),
('gconti', 'Sistemi operativi team', '2024-10-17', '17:00:00');

-- =============================
--           MATERIALE
-- =============================
INSERT INTO Materiale (Username, AdminGruppo, NomeGruppo, Titolo, DataPubblicazione, Immagine, Percorso) VALUES
('mrossi', 'mrossi', 'Studio Programmazione 1', 'Esercizi base', '2024-10-05', 0x01, '/docs/esercizi_prog1.pdf'),
('lbianchi', 'lbianchi', 'Gruppo Biomeccanica', 'Dispensa biomeccanica', '2024-10-07', 0x01, '/docs/biomecc_dispensa.pdf'),
('arianna', 'arianna', 'Architettura Progetto A', 'Planimetria', '2024-10-08', 0x01, '/files/progettoA_planimetria.png'),
('fneri', 'fneri', 'Elettronica avanzata', 'Slide circuiti', '2024-10-09', 0x01, '/slides/circuiti.pdf'),
('gconti', 'gconti', 'Sistemi operativi team', 'Appunti scheduling', '2024-10-10', 0x01, '/notes/scheduling.docx');

-- =============================
--         ISCRIZIONI
-- =============================
INSERT INTO Iscrizione (AdminGruppo, NomeGruppo, Username) VALUES
('mrossi', 'Studio Programmazione 1', 'lbianchi'),
('mrossi', 'Studio Programmazione 1', 'gconti'),
('lbianchi', 'Gruppo Biomeccanica', 'fneri'),
('arianna', 'Architettura Progetto A', 'mrossi'),
('gconti', 'Sistemi operativi team', 'mrossi');

-- =============================
--             LINK
-- =============================
INSERT INTO Link (NomeLink, Indirizzo) VALUES
('Google', 'https://www.google.com'),
('Ateneo', 'https://portale.univ.it'),
('Materiali', 'https://drive.google.com'),
('Forum', 'https://forumstudenti.it'),
('GitHub', 'https://github.com');
