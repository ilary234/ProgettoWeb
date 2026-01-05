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
(672901, 6729, 'Disegno dell’Architettura'),
(672902, 6729, 'Laboratorio di Informatica Grafica'),
(672903, 6729, 'Rappresentazione Tecnica'),
(672904, 6729, 'Matematica'),
(672905, 6729, 'Elementi di Urbanistica'),
(672906, 6729, 'Storia dell’Architettura 1'),
(672907, 6729, 'Laboratorio di Progettazione Architettonica I (C.I.)'),
(672908, 6729, 'Architettura degli Interni'),
(672909, 6729, 'Legislazione Urbanistica e delle OO.PP.'),
(672910, 6729, 'Scienza delle Costruzioni'),
(672911, 6729, 'Laboratorio di Urbanistica'),
(666901, 6669, 'Elaborazione dei Segnali'),
(666902, 6669, 'Fisica Tecnica'),
(666903, 6669, 'Bioingegneria'),
(666904, 6669, 'Meccanica dei Biomateriali e delle Strutture'),
(667301, 6673, 'Tecnologie Web'),
(667302, 6673, 'Ingegneria del Software'),
(667303, 6673, 'Ricerca Operativa'),
(667304, 6673, 'Reti di Telecomunicazione'),
(667001, 6670, 'Algoritmi di Ottimizzazione'),
(667002, 6670, 'Elaborazione dei Segnali'),
(667003, 6670, 'Conversione Elettromeccanica dell’Energia'),
(667004, 6670, 'Elettronica'),
(667005, 6670, 'Elettronica dei Sistemi Digitali'),
(600701, 6007, 'Algoritmi e Strutture Dati'),
(600702, 6007, 'Laboratorio di Big Data'),
(600703, 6007, 'Progettazione e Sviluppo del Software'),
(600704, 6007, 'Sistemi Virtualizzati'),
(600705, 6007, 'Basi di Dati');

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
('Offerta', 672901, 'Ripetizioni di Disegno dell’Architettura', '2025-02-20', 'arianna',
 'Disponibile per ripetizioni di disegno tecnico e architettonico.',
 'Sono una studentessa di Architettura e offro ripetizioni di Disegno dell’Architettura. '
 'Possiamo lavorare su proiezioni ortogonali, prospettive e impaginazione delle tavole. '
 'Disponibile sia in presenza che online.'
),

('Domanda', 672910, 'Aiuto per Scienza delle Costruzioni', '2025-02-22','mrossi',
 'Cerco supporto per esercizi di Scienza delle Costruzioni.',
 'Sto preparando l’esame di Scienza delle Costruzioni e cerco qualcuno con buona preparazione '
 'su travi, telai e diagrammi delle sollecitazioni. Studio preferibilmente in biblioteca.'
),

('Offerta', 667301, 'Gruppo di studio Tecnologie Web', '2025-02-26', 'mrossi',
 'Gruppo aperto per preparare l’esame di Tecnologie Web.',
 'Ho creato un gruppo di studio per Tecnologie Web. '
 'Tratteremo HTML, CSS, JavaScript e PHP con esercizi pratici. '
 'Gli incontri si svolgono in laboratorio.'
),

('Domanda', 667302, 'Chiarimenti su UML e Ingegneria del Software', '2025-02-27', 'gconti',
 'Cerco qualcuno per ripassare UML.',
 'Sto preparando l’esame di Ingegneria del Software e avrei bisogno '
 'di chiarimenti su diagrammi UML e casi d’uso. '
 'Disponibile a studiare in gruppo.'
),

('Offerta', 667303, 'Supporto per Ricerca Operativa', '2025-02-28', 'mrossi',
 'Aiuto su esercizi di Ricerca Operativa.',
 'Offro supporto per esercizi di programmazione lineare e metodo del simplesso. '
 'Ideale per chi sta preparando l’esame o ha difficoltà con la parte matematica.'
),

('Domanda', 666903, 'Ripasso di Bioingegneria', '2025-03-02', 'gconti',
 'Cerco gruppo o supporto per Bioingegneria.',
 'Sto preparando l’esame di Bioingegneria e cerco un gruppo di studio o qualcuno '
 'con cui ripassare i concetti base e le principali applicazioni cliniche.'
),

('Offerta', 666902, 'Studio assistito di Fisica Tecnica', '2025-03-03', 'lbianchi',
 'Incontri di gruppo per Fisica Tecnica.',
 'Organizzo incontri di studio per Fisica Tecnica focalizzati su termodinamica, '
 'scambi di calore ed esercizi d’esame. '
 'Ideale per chi vuole ripassare in vista dell’appello.'
),

('Domanda', 667002, 'Aiuto su Elaborazione dei Segnali', '2025-03-05', 'mrossi',
 'Cerco supporto per esercizi di Elaborazione dei Segnali.',
 'Sto preparando l’esame di Elaborazione dei Segnali e cerco qualcuno '
 'per ripassare FFT, filtraggio e segnali discreti/continui.'
),

('Offerta', 667005, 'Supporto Elettronica Digitale', '2025-03-06', 'fneri',
 'Aiuto su logica digitale e flip-flop.',
 'Offro supporto su Elettronica dei Sistemi Digitali. '
 'Tratteremo logica combinatoria, flip-flop, registri e semplici circuiti digitali.'
),

('Domanda', 600702, 'Aiuto su Laboratorio di Big Data', '2025-03-08', 'fneri',
 'Cerco supporto per esercizi di Big Data.',
 'Sto studiando MapReduce e database NoSQL, cerco qualcuno con cui ripassare '
 'e svolgere esercizi pratici di laboratorio.'
),

('Offerta', 600705, 'Preparazione Basi di Dati', '2025-03-09', 'mrossi',
 'Aiuto su progettazione e SQL avanzato.',
 'Offro supporto per Basi di Dati: progettazione schema E/R, SQL avanzato e ottimizzazione query. '
 'Ideale per chi vuole esercitarsi prima dell’esame.'
);


-- =============================
--           COMMENTI
-- =============================
INSERT INTO Commento (Username, Id_annuncio, DataPubblicazione, Ora, Testo) VALUES
('gconti', 3, '2025-02-26', '16:30:00', 'Interessato! Gli incontri sono settimanali?'),
('arianna', 3, '2025-02-26', '18:00:00', 'Mi piacerebbe partecipare, soprattutto per la parte PHP.'),
('mrossi', 4, '2025-02-27', '17:15:00', 'Posso aiutarti con UML, soprattutto diagrammi delle classi.'),
('lbianchi', 4, '2025-02-27', '19:00:00', 'Anch’io sto studiando UML, potremmo organizzarci.'),
('gconti', 5, '2025-02-28', '15:45:00', 'Ottimo! Il metodo del simplesso è proprio quello che mi serve.'),
('fneri', 5, '2025-02-28', '17:20:00', 'Ti occupi anche di esercizi con vincoli multipli?'),
('mrossi', 1, '2025-02-20', '17:10:00', 'Ciao! Fai anche esercizi su prospettive accidentali?'),
('gconti', 1, '2025-02-20', '18:45:00', 'Interessante, sei disponibile anche per revisione delle tavole?'),
('lbianchi', 1, '2025-02-21', '10:30:00', 'Ottimo! Preferisci incontri in presenza o online?'),
('arianna', 2, '2025-02-22', '16:20:00','Posso darti una mano su travi e diagrammi delle sollecitazioni.'),
('fneri', 2, '2025-02-22', '18:00:00','Anch’io sto preparando l’esame, potremmo studiare insieme.'),
('gconti', 2, '2025-02-23', '11:15:00','Se organizzi un gruppo in biblioteca mi unisco volentieri.'),
('lbianchi', 6, '2025-03-02', '15:30:00', 'Io ho creato un gruppo base, se vuoi puoi unirti.'),
('arianna', 6, '2025-03-02', '17:45:00', 'Seguo Bioingegneria come materia affine, potrei partecipare anch’io.'),
('gconti', 7, '2025-03-03', '16:20:00', 'Ottimo! Fate anche esercizi sugli scambi termici?'),
('fneri', 7, '2025-03-03', '18:10:00', 'Mi interessa, soprattutto per la parte di termodinamica.'),
('fneri', 8, '2025-03-05', '15:45:00', 'Posso aiutarti con FFT e filtraggio dei segnali.'),
('gconti', 8, '2025-03-05', '18:10:00', 'Anche io sto studiando segnali, possiamo fare gruppo.'),
('mrossi', 9, '2025-03-06', '16:20:00', 'Interessante! Mi serve chiarire alcuni dubbi sui flip-flop.'),
('arianna', 9, '2025-03-06', '17:50:00', 'Mi piacerebbe partecipare, soprattutto per la logica combinatoria.'),
('gconti', 10, '2025-03-08', '15:20:00', 'Ottimo! Possiamo fare esercizi su MapReduce insieme.'),
('arianna', 10, '2025-03-08', '17:10:00', 'Mi interessa, soprattutto per NoSQL.'),
('gconti', 11, '2025-03-09', '16:45:00', 'Perfetto, posso partecipare anche io per esercitarmi su SQL avanzato.'),
('fneri', 11, '2025-03-09', '17:30:00', 'Mi interessa, soprattutto ottimizzazione query.');

-- =============================
--            GRUPPI
-- =============================
INSERT INTO Gruppo (AdminGruppo, NomeGruppo, Anno, CorsoLaurea, Materia, NumeroPartecipanti, LuogoIncontro, PercentualeCompletamento) VALUES
('arianna', 'Disegno Base Architettura', 2024, 6729, 672901, 3, 'Aula Disegno 3.14', 35),
('arianna', 'Lab Progettazione I', 2024, 6729, 672907, 4, 'Laboratorio Progetti', 40),
('mrossi', 'Scienza Costruzioni A', 2023, 6729, 672910, 2, 'Biblioteca Tecnica', 25),
('gconti', 'Urbanistica Insieme',2023, 6729, 672911, 3, 'Aula Studio 5', 30),
('lbianchi', 'Segnali Biomedici', 2022, 6669, 666901, 3, 'Aula Studio Ingegneria', 40),
('lbianchi', 'Bioingegneria Base', 2022, 6669, 666903, 2, 'Biblioteca Scientifica', 25),
('mrossi', 'Tecnologie Web 2025', 2023, 6673, 667301, 4, 'Laboratorio Informatica', 45),
('mrossi', 'Ingegneria Software', 2023, 6673, 667302, 3, 'Aula Studio 2', 30),
('gconti', 'Ricerca Operativa Base', 2023, 6673, 667303, 2, 'Biblioteca Informatica', 20),
('fneri', 'Ottimizzazione Avanzata', 2021, 6670, 667001, 2, 'Aula Studio Ingegneria', 30),
('fneri', 'Elaborazione Segnali Elettronici', 2021, 6670, 667002, 3, 'Laboratorio Elettronica', 33),
('fneri', 'Elettronica Digitale Base', 2021, 6670, 667005, 2, 'Biblioteca Tecnica', 25),
('gconti', 'Algoritmi Avanzati', 2023, 6007, 600701, 3, 'Aula Informatica', 40),
('gconti', 'Big Data Lab', 2023, 6007, 600702, 2, 'Laboratorio Sistemi', 30),
('mrossi', 'Basi di Dati Studio', 2023, 6007, 600705, 3, 'Biblioteca Informatica', 35);

-- =============================
--          ARGOMENTI
-- =============================
-- Disegno dell’Architettura
INSERT INTO Argomento VALUES
('Proiezioni ortogonali', 'arianna', 'Disegno Base Architettura', false),
('Assonometria e prospettiva', 'arianna', 'Disegno Base Architettura', false),
('Sezioni e piante', 'arianna', 'Disegno Base Architettura', true);

-- Progettazione Architettonica I
INSERT INTO Argomento VALUES
('Analisi del sito', 'arianna', 'Lab Progettazione I', false),
('Concept progettuale', 'arianna', 'Lab Progettazione I', true),
('Modello preliminare', 'arianna', 'Lab Progettazione I', false);

-- Scienza delle Costruzioni
INSERT INTO Argomento VALUES
('Equilibrio delle strutture', 'mrossi', 'Scienza Costruzioni A', false),
('Travi e telai', 'mrossi', 'Scienza Costruzioni A', true);

-- Urbanistica
INSERT INTO Argomento VALUES
('Piani regolatori', 'gconti', 'Urbanistica Insieme', true),
('Zonizzazione urbana', 'gconti', 'Urbanistica Insieme', false);

-- Elaborazione dei Segnali
INSERT INTO Argomento VALUES
('Segnali continui e discreti', 'lbianchi', 'Segnali Biomedici', false),
('Trasformata di Fourier', 'lbianchi', 'Segnali Biomedici', true),
('Filtraggio dei segnali biologici', 'lbianchi', 'Segnali Biomedici', true);

-- Bioingegneria
INSERT INTO Argomento VALUES
('Introduzione alla bioingegneria', 'lbianchi', 'Bioingegneria Base', false),
('Applicazioni cliniche', 'lbianchi', 'Bioingegneria Base', true);

-- Tecnologie Web
INSERT INTO Argomento VALUES
('HTML e CSS', 'mrossi', 'Tecnologie Web 2025', true),
('JavaScript', 'mrossi', 'Tecnologie Web 2025', false),
('PHP e MySQL', 'mrossi', 'Tecnologie Web 2025', false);

-- Ingegneria del Software
INSERT INTO Argomento VALUES
('Ciclo di vita del software', 'mrossi', 'Ingegneria Software', true),
('UML e diagrammi', 'mrossi', 'Ingegneria Software', false);

-- Ricerca Operativa
INSERT INTO Argomento VALUES
('Programmazione lineare', 'gconti', 'Ricerca Operativa Base', false),
('Metodo del simplesso', 'gconti', 'Ricerca Operativa Base', true);

-- Algoritmi di Ottimizzazione
INSERT INTO Argomento VALUES
('Programmazione lineare', 'fneri', 'Ottimizzazione Avanzata', true),
('Algoritmi genetici', 'fneri', 'Ottimizzazione Avanzata', false);

-- Elaborazione dei Segnali
INSERT INTO Argomento VALUES
('Filtraggio e FFT', 'fneri', 'Elaborazione Segnali Elettronici', false),
('Segnali continui e discreti', 'fneri', 'Elaborazione Segnali Elettronici', true),
('Applicazioni in elettronica', 'fneri', 'Elaborazione Segnali Elettronici', false);

-- Elettronica dei Sistemi Digitali
INSERT INTO Argomento VALUES
('Logica combinatoria', 'fneri', 'Elettronica Digitale Base', true),
('Flip-flop e registri', 'fneri', 'Elettronica Digitale Base', false);

-- Algoritmi e Strutture Dati
INSERT INTO Argomento VALUES
('Algoritmi di ordinamento', 'gconti', 'Algoritmi Avanzati', true),
('Strutture dati lineari', 'gconti', 'Algoritmi Avanzati', false),
('Strutture dati non lineari', 'gconti', 'Algoritmi Avanzati', false);

-- Laboratorio di Big Data
INSERT INTO Argomento VALUES
('MapReduce', 'gconti', 'Big Data Lab', true),
('NoSQL', 'gconti', 'Big Data Lab', false);

-- Basi di Dati
INSERT INTO Argomento VALUES
('Progettazione schema E/R', 'mrossi', 'Basi di Dati Studio', true),
('SQL avanzato', 'mrossi', 'Basi di Dati Studio', true),
('Ottimizzazione query', 'mrossi', 'Basi di Dati Studio', false);

-- =============================
--           INCONTRI
-- =============================
INSERT INTO Incontro (AdminGruppo, NomeGruppo, DataIncontro, Ora) VALUES
('lbianchi', 'Segnali Biomedici', '2026-01-11', '15:00:00'),
('lbianchi', 'Segnali Biomedici', '2026-01-18', '15:00:00'),
('lbianchi', 'Bioingegneria Base', '2026-01-13', '16:00:00'),
('mrossi', 'Tecnologie Web 2025', '2026-01-14', '14:00:00'),
('mrossi', 'Tecnologie Web 2025', '2026-01-21', '14:00:00'),
('mrossi', 'Ingegneria Software', '2026-01-15', '10:00:00'),
('gconti', 'Ricerca Operativa Base', '2026-01-18', '16:00:00'),
('fneri', 'Ottimizzazione Avanzata', '2026-01-12', '14:00:00'),
('fneri', 'Ottimizzazione Avanzata', '2026-01-19', '14:00:00'),
('fneri', 'Elaborazione Segnali Elettronici', '2026-01-13', '15:00:00'),
('fneri', 'Elaborazione Segnali Elettronici', '2026-01-20', '15:00:00'),
('fneri', 'Elettronica Digitale Base', '2026-01-14', '16:00:00'),
('gconti', 'Algoritmi Avanzati', '2026-01-16', '14:00:00'),
('gconti', 'Algoritmi Avanzati', '2026-01-23', '14:00:00'),
('gconti', 'Big Data Lab', '2026-01-17', '15:00:00'),
('mrossi', 'Basi di Dati Studio', '2026-01-18', '16:00:00'),
('mrossi', 'Basi di Dati Studio', '2026-01-25', '16:00:00');

-- =============================
--           MATERIALE
-- =============================


-- =============================
--         ISCRIZIONI
-- =============================
-- Disegno dell’Architettura
INSERT INTO Iscrizione VALUES
('arianna', 'Disegno Base Architettura', 'arianna'),
('arianna', 'Disegno Base Architettura', 'mrossi'),
('arianna', 'Disegno Base Architettura', 'gconti');

-- Progettazione Architettonica I
INSERT INTO Iscrizione VALUES
('arianna', 'Lab Progettazione I', 'arianna'),
('arianna', 'Lab Progettazione I', 'mrossi'),
('arianna', 'Lab Progettazione I', 'lbianchi'),
('arianna', 'Lab Progettazione I', 'fneri');

-- Scienza delle Costruzioni
INSERT INTO Iscrizione VALUES
('mrossi', 'Scienza Costruzioni A', 'mrossi'),
('mrossi', 'Scienza Costruzioni A', 'arianna');

-- Urbanistica
INSERT INTO Iscrizione VALUES
('gconti', 'Urbanistica Insieme', 'gconti'),
('gconti', 'Urbanistica Insieme', 'arianna'),
('gconti', 'Urbanistica Insieme', 'mrossi');

-- Segnali Biomedici
INSERT INTO Iscrizione VALUES
('lbianchi', 'Segnali Biomedici', 'lbianchi'),
('lbianchi', 'Segnali Biomedici', 'mrossi'),
('lbianchi', 'Segnali Biomedici', 'fneri');

-- Bioingegneria Base
INSERT INTO Iscrizione VALUES
('lbianchi', 'Bioingegneria Base', 'lbianchi'),
('lbianchi', 'Bioingegneria Base', 'gconti');

-- Tecnologie Web 2025
INSERT INTO Iscrizione VALUES
('mrossi', 'Tecnologie Web 2025', 'mrossi'),
('mrossi', 'Tecnologie Web 2025', 'gconti'),
('mrossi', 'Tecnologie Web 2025', 'arianna'),
('mrossi', 'Tecnologie Web 2025', 'fneri');

-- Ingegneria del Software
INSERT INTO Iscrizione VALUES
('mrossi', 'Ingegneria Software', 'mrossi'),
('mrossi', 'Ingegneria Software', 'lbianchi'),
('mrossi', 'Ingegneria Software', 'gconti');

-- Ricerca Operativa Base
INSERT INTO Iscrizione VALUES
('gconti', 'Ricerca Operativa Base', 'gconti'),
('gconti', 'Ricerca Operativa Base', 'mrossi');

-- Ottimizzazione Avanzata
INSERT INTO Iscrizione VALUES
('fneri', 'Ottimizzazione Avanzata', 'fneri'),
('fneri', 'Ottimizzazione Avanzata', 'mrossi');

-- Elaborazione Segnali Elettronici
INSERT INTO Iscrizione VALUES
('fneri', 'Elaborazione Segnali Elettronici', 'fneri'),
('fneri', 'Elaborazione Segnali Elettronici', 'mrossi'),
('fneri', 'Elaborazione Segnali Elettronici', 'gconti');

-- Elettronica Digitale Base
INSERT INTO Iscrizione VALUES
('fneri', 'Elettronica Digitale Base', 'fneri'),
('fneri', 'Elettronica Digitale Base', 'arianna');

-- Algoritmi Avanzati (3 partecipanti)
INSERT INTO Iscrizione VALUES
('gconti', 'Algoritmi Avanzati', 'gconti'),
('gconti', 'Algoritmi Avanzati', 'mrossi'),
('gconti', 'Algoritmi Avanzati', 'arianna');

-- Big Data Lab (2 partecipanti)
INSERT INTO Iscrizione VALUES
('gconti', 'Big Data Lab', 'gconti'),
('gconti', 'Big Data Lab', 'fneri');

-- Basi di Dati Studio (3 partecipanti)
INSERT INTO Iscrizione VALUES
('mrossi', 'Basi di Dati Studio', 'mrossi'),
('mrossi', 'Basi di Dati Studio', 'arianna'),
('mrossi', 'Basi di Dati Studio', 'gconti');

-- =============================
--             LINK
-- =============================
INSERT INTO Link (NomeLink, Indirizzo) VALUES
('Google', 'https://www.google.com'),
('Ateneo', 'https://portale.univ.it'),
('Materiali', 'https://drive.google.com'),
('Forum', 'https://forumstudenti.it'),
('GitHub', 'https://github.com');
