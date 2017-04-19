<?php
require_once('dbconfig.php');

class USER {
    private $conn;

    public function __construct() {
        $database = new Database();
        $db = $database->dbConnection();
        $this->conn = $db;
    }

    public function runQuery($sql) {
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }

    public function register($username, $password, $fname, $lname, $email, $vname, $vtype, $vcolor) {
        try {
            $new_password = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $this->conn->prepare("INSERT INTO users(username, password, fname, lname, email, vname, vtype, vcolor)
                                                      VALUES(:username, :password, :fname, :lname, :email, :vname, :vtype, :vcolor)");

            $stmt->bindparam(":username", $username);
            $stmt->bindparam(":password", $new_password);
            $stmt->bindparam(":fname", $fname);
            $stmt->bindparam(":lname", $lname);
            $stmt->bindparam(":email", $email);
            $stmt->bindparam(":vname", $vname);
            $stmt->bindparam(":vtype", $vtype);
            $stmt->bindparam(":vcolor", $vcolor);

            $stmt->execute();

            return $stmt;
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function doLogin($username, $email, $password) {
        try {
            $stmt = $this->conn->prepare("SELECT id, username, password, fname, lname, email, vname, vtype, vcolor FROM users WHERE username=:ussername OR email=:email");
            $stmt->execute(array(':username'=>$username, ':email'=>$email));
            $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
            if($stmt->rowCount() == 1) {
                if(password_verify($password, $userRow['password'])) {
                    $_SESSION['user_session'] = $userRow['id'];
                    return true;
                } else {
                    return false;
                }
            }
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function is_loggedin(){
        if(isset($_SESSION['user_session'])){
            return true;
        }
    }

    public function redirect($url) {
        header("Location: $url");
    }
}