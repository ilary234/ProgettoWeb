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

    public function insertCommento($idAnnuncio, $username, $testo) {
        $data = date("Y-m-d");
        $ora = date("H:i:s");
        $stmt = $this->db->prepare("INSERT INTO Commento (Username, Id_annuncio, DataPubblicazione, Ora, Testo) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sisss", $username, $idAnnuncio, $data, $ora, $testo);
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

}




?>