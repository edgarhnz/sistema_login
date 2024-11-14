<?php
require_once 'db.php';
require_once 'session.php';

class Auth {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    public function login($username, $password) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            Session::start();
            Session::set("user_id", $user['id']);
            return true;
        }
        return false;
    }

    public function isLoggedIn() {
        Session::start();
        return Session::get("user_id") !== null;
    }
}
?>
