<?php
$host = 'localhost';
$dbname = 'poo'; 
$username = 'root'; 
$password = ''; 
class Connexion {
    private $conn;
    public function __construct($host, $username, $password, $dbName) {
        $this->conn = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
    }
    public function countTable($requete) {
        $resultat = $this->conn->query($requete);
        $count = $resultat->fetchColumn();
        return $count;
    }
}
$connexion = new Connexion($host, $username, $password, $dbname);
$requete = "SELECT COUNT(*) FROM users";
$resultat = $connexion->countTable($requete);

echo "Number of users : " . $resultat;
