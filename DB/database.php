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

}




?>