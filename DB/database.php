<?php
class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }        
    }

    public function getGroups(){
        $stmt = $this->db->prepare("SELECT NomeGruppo, AdminGruppo, Anno, NumeroPartecipanti, CorsoLaurea, Materia FROM Gruppo ORDER BY Anno");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getCourses() {
        $stmt = $this->db->prepare("SELECT * FROM CorsoLaurea ORDER BY Id_Corso");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getSubjects() {
        $stmt = $this->db->prepare("SELECT * FROM Materia");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getIscrizione($username, $admin, $nomeGruppo) {
        $stmt = $this->db->prepare("SELECT * FROM Iscrizione WHERE Username = ? AND AdminGruppo = ? AND NomeGruppo = ?");
        $stmt->bind_param('sss',  $username, $admin, $nomeGruppo);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertIscrizione($username, $admin, $nomeGruppo) {
        $stmt = $this->db->prepare("INSERT INTO Iscrizione VALUES (?, ?, ?)");
        $stmt->bind_param('sss',  $admin, $nomeGruppo, $username);
        return $stmt->execute();
    }

    public function deleteIscrizione($username, $admin, $nomeGruppo) {
        $stmt = $this->db->prepare("DELETE FROM Iscrizione WHERE Username = ? AND AdminGruppo = ? AND NomeGruppo = ?");
        $stmt->bind_param('sss',$username, $admin, $nomeGruppo);
        return $stmt->execute();
    }

    public function getGroupData($admin, $nomeGruppo) {
        $stmt = $this->db->prepare("SELECT * FROM Gruppo WHERE AdminGruppo = ? AND NomeGruppo = ?");
        $stmt->bind_param('ss', $admin, $nomeGruppo);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getTopics($admin, $nomeGruppo) {
        $stmt = $this->db->prepare("SELECT Titolo FROM Argomento WHERE AdminGruppo = ? AND NomeGruppo = ?");
        $stmt->bind_param('ss', $admin, $nomeGruppo);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getMeetings($admin, $nomeGruppo) {
        $stmt = $this->db->prepare("SELECT DataIncontro, Ora FROM Incontro WHERE AdminGruppo = ? AND NomeGruppo = ?");
        $stmt->bind_param('ss', $admin, $nomeGruppo);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getGroupMaterial($admin, $nomeGruppo) {
        $stmt = $this->db->prepare("SELECT Username, Titolo, DataPubblicazione, Tipo, Percorso FROM Materiale WHERE AdminGruppo = ? AND NomeGruppo = ?");
        $stmt->bind_param('ss', $admin, $nomeGruppo);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertMaterial($username, $admin, $nomeGruppo, $titolo, $type, $file) {
        $stmt = $this->db->prepare("INSERT INTO Materiale VALUES (?, ?, ?, ?, CURDATE(), ?, ?)");
        $stmt->bind_param('ssssss', $username, $admin, $nomeGruppo, $titolo, $type, $file);
        return $stmt->execute();
    }

    public function deleteMaterial($username, $admin, $nomeGruppo, $titolo) {
        $stmt = $this->db->prepare("DELETE FROM Materiale WHERE Username = ? AND AdminGruppo = ? AND NomeGruppo = ? AND Titolo = ?");
        $stmt->bind_param('ssss',$username, $admin, $nomeGruppo, $titolo);
        return $stmt->execute();
    }

    public function getCategories() {
        $stmt = $this->db->prepare("SELECT DISTINCT Categoria FROM Annuncio");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAnnunci() {
        $stmt = $this->db->prepare("SELECT * FROM Annuncio ORDER BY DataPubblicazione DESC");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAnnuncioById($id) {
        $stmt = $this->db->prepare("SELECT * FROM Annuncio WHERE Id_annuncio = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getCommentiByAnnuncio($id) {
        $stmt = $this->db->prepare("SELECT Username, DataPubblicazione, Ora, Testo FROM Commento WHERE Id_annuncio = ? ORDER BY DataPubblicazione DESC, Ora DESC");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertCommento($username, $idAnnuncio, $testo) {
        $stmt = $this->db->prepare("INSERT INTO Commento (Username, Id_annuncio, DataPubblicazione, Ora, Testo) VALUES (?, ?, CURDATE(), CURTIME(), ?)");
        $stmt->bind_param("sis", $username, $idAnnuncio, $testo);
        return $stmt->execute();
    }

    public function getUserByUsername($username) {
        $stmt = $this->db->prepare("SELECT * FROM Utente WHERE Username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function checkLogin($username, $password) {
        $query = "SELECT Username, Nome, Cognome, Email, Telefono, CorsoLaurea, Anno FROM Utente WHERE Username = ? AND Password = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function checkUsername($username) {
        $query = "SELECT Username, Nome, Cognome, Email, Telefono, CorsoLaurea, Anno FROM Utente WHERE Username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertUtente($username, $nome, $cognome, $password, $email) {
        $stmt = $this->db->prepare("INSERT INTO Utente (Username, Nome, Cognome, Password, Email, Telefono, CorsoLaurea, Anno) VALUES (?, ?, ?, ?, ?, null, null, null)");
        $stmt->bind_param("sssss", $username, $nome, $cognome, $password, $email);
        return $stmt->execute();
    }

    public function getCorsoLaureaById($id) {
        $stmt = $this->db->prepare("SELECT NomeCorso FROM CorsoLaurea WHERE Id_Corso = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updateUserProfile($nome, $cognome, $email, $telefono, $anno, $corso, $username) {
        $stmt = $this->db->prepare("UPDATE Utente SET Nome = ?, Cognome = ?, Email = ?, Telefono = ?, Anno = ?, CorsoLaurea = ? WHERE Username = ?");

        if (!$stmt) {
            return false;
        }

        $stmt->bind_param("ssssiis", $nome, $cognome, $email, $telefono, $anno, $corso, $username);

        return $stmt->execute();
    }

    public function updatePassword($username, $newPassword) {
        $stmt = $this->db->prepare("UPDATE Utente SET Password = ? WHERE Username = ?");
        $stmt->bind_param("ss", $newPassword, $username);
        return $stmt->execute();
    }
}

?>