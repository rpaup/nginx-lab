<?php
class Player {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function add($name, $email, $age, $game, $format, $experience) {
        $stmt = $this->pdo->prepare(
            "INSERT INTO Players (name, email, age, game, format, experience) VALUES (?, ?, ?, ?, ?, ?)"
        );
        $stmt->execute([$name, $email, $age, $game, $format, $experience]);
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM Players ORDER BY id DESC");
        return $stmt->fetchAll();
    }
}