-- Database Section
-- ________________ 

create database progWeb;
use progWeb;


-- Tables Section
-- _____________ 

create table Annuncio (
     `Id_annuncio` integer auto_increment,
     `Categoria`  enum('Domanda', 'Offerta') not null,
     `Materia` integer not null,
     `Titolo` varchar(50) not null,
     `DataPubblicazione` date not null,
     `Username` varchar(20) not null,
     `Anteprima` text not null,
     `Descrizione` mediumtext not null,
     constraint IDAnnuncio primary key (Id_annuncio));

create table Commento (
     `Username` varchar(20) not null,
     `Id_annuncio` integer not null,
     `DataPubblicazione` date not null,
     `Ora` time not null,
     `Testo` mediumtext not null,
     constraint IDCommento primary key (Id_annuncio, Username, DataPubblicazione, Ora));

create table Utente (
     `Username` varchar(20) not null,
     `Nome` varchar(20) not null,
     `Cognome` varchar(20) not null,
     `Password` varchar(50) not null,
     `Email` varchar(50) not null,
     `Telefono` varchar(15),
     `CorsoLaurea` integer,
     `Anno` year,
     constraint IDUtente primary key (Username));

create table Gruppo (
     `AdminGruppo` varchar(20) not null,
     `NomeGruppo` varchar(80) not null,
     `Anno` year not null,
     `CorsoLaurea` integer not null,
     `Materia` integer not null,
     `NumeroPartecipanti` integer not null,
     `LuogoIncontro` text not null,
     `PercentualeCompletamento` float not null,
     constraint IDGruppo primary key (AdminGruppo, NomeGruppo));
     
create table Argomento (
     `Titolo` varchar(100) not null,
     `AdminGruppo` varchar(20) not null,
     `NomeGruppo` varchar(80) not null,
     constraint IDArgomento primary key (AdminGruppo, NomeGruppo, Titolo));

create table Incontro (
     `AdminGruppo` varchar(20) not null,
     `NomeGruppo` varchar(80) not null,
     `DataIncontro` date not null,
     `Ora` time not null,
     constraint IDIncontro primary key (AdminGruppo, NomeGruppo, DataIncontro));

create table Materiale (
     `Username` varchar(20) not null,
     `AdminGruppo` varchar(20) not null,
     `NomeGruppo` varchar(80) not null,
     `Titolo` varchar(100) not null,
     `DataPubblicazione` date not null,
     `Immagine` blob not null,
     `Percorso` text not null,
     constraint IDMateriale primary key (Username, AdminGruppo, NomeGruppo, Titolo));

create table Iscrizione (
     `AdminGruppo` varchar(20) not null,
     `NomeGruppo` varchar(80) not null,
     `Username` varchar(20) not null,
     constraint IDIscrizione primary key (AdminGruppo, NomeGruppo, Username));

create table Link (
     `Id_link` integer auto_increment,
     `NomeLink` varchar(20) not null,
     `Indirizzo` varchar(200) not null,
     constraint IDLink primary key (Id_link));

create table CorsoLaurea (
     `Id_Corso` integer not null,
     `NomeCorso` varchar(100) not null,
     constraint IDCorsoLaurea primary key (Id_Corso));

create table Materia (
     `Id_Materia` integer not null,
     `Corso` integer not null,
     `NomeMateria` varchar(100) not null,
     constraint IDMateria primary key (Id_Materia));


-- Constraints Section
-- ___________________ 

alter table Annuncio add constraint FKScrittura
     foreign key (Username)
     references Utente (Username);

alter table Annuncio add constraint FKMateria
     foreign key (Materia)
     references Materia (Id_Materia);

alter table Commento add constraint FKDi
     foreign key (Id_annuncio)
     references Annuncio (Id_annuncio);

alter table Commento add constraint FKRisposta
     foreign key (Username)
     references Utente (Username);

alter table Utente add constraint FKCorsoUtente
     foreign key (CorsoLaurea)
     references CorsoLaurea (Id_Corso);

alter table Gruppo add constraint FKAdmin
     foreign key (AdminGruppo)
     references Utente (Username);

alter table Gruppo add constraint FKMateriaGruppo
     foreign key (Materia)
     references Materia (Id_Materia);
     
alter table Gruppo add constraint FKCorsoGruppo
     foreign key (CorsoLaurea)
     references CorsoLaurea (Id_Corso);
     
alter table Argomento add constraint FKArgomento
     foreign key (AdminGruppo, NomeGruppo)
     references Gruppo (AdminGruppo, NomeGruppo);

alter table Incontro add constraint FKStabilisce
     foreign key (AdminGruppo, NomeGruppo)
     references Gruppo (AdminGruppo, NomeGruppo);

alter table Materiale add constraint FKCaricato
     foreign key (AdminGruppo, NomeGruppo)
     references Gruppo (AdminGruppo, NomeGruppo);

alter table Materiale add constraint FKPubblica
     foreign key (Username)
     references Utente (Username);

alter table Iscrizione add constraint FKIsc_Ute
     foreign key (Username)
     references Utente (Username);

alter table Iscrizione add constraint FKIsc_Gru
     foreign key (AdminGruppo, NomeGruppo)
     references Gruppo (AdminGruppo, NomeGruppo);

alter table Materia add constraint FKAppartiene
     foreign key (Corso)
     references CorsoLaurea (Id_Corso);