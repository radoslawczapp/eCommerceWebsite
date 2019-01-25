<?php

/**
 * User Class for account creation and login purpose
 */
class User{
    private $con;
    function __construct(){
        include_once("../database/db.php");
        $db = new Database();
        $this->con = $db->connect();
    }

    // User is already registered or not

    private function emailExists($email){
        // include_once("constants.php");
        // $pdo = new PDO(HOST, USER, PASS, DB);
        // $pdo->setAtribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // $stmt = $pdo->query('SELECT id FROM users WHERE email = :email');
        // $stmt->bindValue(':email', $email);
        // $result = $stmt->execute();
        $pre_stmt = $this->con->prepare("SELECT id FROM users WHERE email = ?");
        $pre_stmt->bind_param("s", $email);
        $pre_stmt->execute() or die($this->con->error);
        $result = $pre_stmt->get_result();
        if ($result->num_rows > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createUserAccount($username, $email, $password, $usertype){
        if ($this->emailExists($email)) {
            return "EMAIL_ALREADY_EXISTS";
        } else {
            $pass_hash = password_hash($password, PASSWORD_BCRYPT, ["cost" => 8]);
            $date = date("Y-m-d");
            $notes = "";
            $pre_stmt = $this->con->prepare("INSERT INTO `users`(`username`, `email`, `password`, `usertype`, `register_date`, `last_login`, `notes`) VALUES (?,?,?,?,?,?,?)");
            $pre_stmt->bind_param("sssssss", $username, $email, $pass_hash, $usertype, $date, $date, $notes);
            $result = $pre_stmt->execute() or die($this->con->error);
            if ($result) {
                return $this->con->insert_id;
            } else {
                return "SOME_ERROR";
            }
        }

    }
}

$user = new User();
echo $user->createUserAccount("John", "johndoe@gmail.com", "1234567890", "Admin");



 ?>
