<?php

namespace App;
    
class Authenticate
{
    public function isAuth()
    {
        return isset($_SESSION['userID']); 
    }

    public function redirectIfNotAuth()
    {
        if (!$this->isAuth())
            header('location: login.php');
    }

    public function redirectIfAuth()
    {
        if ($this->isAuth())
            header('location: home.php');
    }

    public function signUp()
    {
      
        if (isset($_POST['signUpBtn'])) {
            $username = $_POST['username'];
            $email = $_POST['email']; //
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];
            if ($password != $confirmPassword)
                \App\Alert::PrintMessage("Confirm Password not matched", 'Danger');
            else {
                $myDatabaseObj = new DB();
                $insertStatement = "INSERT INTO `user` VALUES(NULL,?,?,?)";
                $queryObj = $myDatabaseObj->Connection->prepare($insertStatement);
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $queryObj->bind_param('sss', $username, $email, $hashedPassword);
                $queryStatus = $queryObj->execute();
                if ($queryStatus)
                    header('location: login.php?doneSignUp=1');
                else
                    \App\Alert::PrintMessage("Failed to create your account", 'Danger');
            }
        }
    }
public function login() {
    if (isset($_POST["logInBtn"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $myDatabaseObj = new DB();
        $selectStatement = "SELECT * FROM `user` WHERE email = ?";
        $queryStatementObj = $myDatabaseObj->Connection->prepare($selectStatement);

        if (!$queryStatementObj) {
            Alert::PrintMessage('Something went wrong preparing the query', 'Danger');
            return;
        }

        $queryStatementObj->bind_param("s", $email);
        $queryStatus = $queryStatementObj->execute();

        if ($queryStatus == false) {
            Alert::PrintMessage('Something went wrong executing the query', 'Danger');
        } else {
            $resultedObj = $queryStatementObj->get_result();

            if ($resultedObj->num_rows == 1) {
                $rowArr = $resultedObj->fetch_assoc();

                if (password_verify($password, $rowArr["password"])) {
                    $_SESSION['userID'] = $rowArr["user_id"];
                    $_SESSION['userName'] = $rowArr["username"];
                    header("location:home.php");
                } else {
                    Alert::PrintMessage('Wrong password', 'Danger');
                }
            } else {
                Alert::PrintMessage('Invalid email', 'Danger');
            }
        }
    }
}
public function logout(){
    if(isset($_GET['logout'])){
        session_unset();
        session_destroy();
        header('location:login.php');
    }
    }
}