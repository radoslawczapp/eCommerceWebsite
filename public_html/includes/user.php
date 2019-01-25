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

    public function userLogin($email, $password){
        $pre_stmt = $this->con->prepare("SELECT id, username, password, last_login FROM users WHERE email = ?");
        $pre_stmt->bind_param("s", $email);
        $pre_stmt->execute() or die($this->con->error);
        $result = $pre_stmt->get_result();

        if ($result->num_rows < 1) {
            return "NOT REGISTERED";
        } else {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['last_login'] = $row['last_login'];

                $last_login = date('Y-m-d H:i:s');

                $pre_stmt = $this->con->prepare("UPDATE users SET last_login = ? WHERE email = ?");
                $pre_stmt->bind_param('ss', $last_login, $email);
                $result = $pre_stmt->execute() or die($this->con->error);
                if ($result) {
                    return 1;
                } else {
                    return 0;
                }
            } else {
                return "PASSWORD_NOT_MATCHED";
            }
        }
    }
}
$user = new User();
// echo $user->createUserAccount("Jane Doe", "janedoe@gmail.com", "0987654321", "Admin");

echo $user->userLogin("janedoe@gmail.com", "0987654321");

echo $_SESSION['username'];
 ?>
