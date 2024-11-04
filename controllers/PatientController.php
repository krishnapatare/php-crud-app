<?php
require_once __DIR__ . '/../config/database.php';

class PatientController {
    private $conn;

    public function __construct($db_conn) {
        $this->conn = $db_conn;
    }

    // Fetch all patients
    public function getPatients() {
        $query = "SELECT * FROM patients";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Mark a patient as cured
    public function markAsCured($id) {
        $query = "UPDATE patients SET cured = 1 WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>
