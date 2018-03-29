<?php

class Users
{
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function insertUser($table)
    {
        if ($this->checkIfEmailExits()[0] == '0' && $this->checkIfUserExits()[0] == '0') {
            try {
                $statement = $this->pdo->prepare(
                    "INSERT INTO {$table}
                    (username, email, password) 
                    VALUES 
                    (:username, :email, :password)"
                    );
                $statement->execute(array(
                    'username' => $_POST['username'],
                    'email' => $_POST['email'],
                    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
                    ));
            } catch (PDOException $error) {
                echo $error->getMessage();
            }
        } else {
            return 'User already exits!';
        }
    }

    protected function checkIfEmailExits()
    {
        $statement = $this->pdo->prepare(
            "SELECT EXISTS(
            SELECT 1 
            FROM users
            WHERE email = :email ) AS userExists;"
            );
        $statement->bindParam(":email", $_POST['email']);
        $statement->execute();
        return $statement->fetch();
    }

    protected function checkIfUserExits()
    {
        $statement = $this->pdo->prepare(
            "SELECT EXISTS(
            SELECT 1 
            FROM users
            WHERE username = :username ) AS userExists;"
            );
        $statement->bindParam(":username", $_POST["username"]);
        $statement->execute();
        return $statement->fetch();
    }

    public function verifyLogin()
    {
        try {
            $statement = $this->pdo->prepare(
                "SELECT * FROM users WHERE
                username=:username"
                );
            $statement->bindParam(":username", $_POST["username"], PDO::PARAM_STR);
            $statement->execute();
            $user = $statement->fetch();

            //Verify login
            if (password_verify($_POST["password"], $user["password"])) {
                session_start();
                $_SESSION['user'] = $user;
                $_SESSION['loggedIn'] = true;
            } else {
                return 'Wrong password or username';
            }
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }
}
