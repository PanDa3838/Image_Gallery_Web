<?php

namespace App;

class Authenticate
{
    public function isAuth()
    {
        return isset($_SESSION['user_id']); // bool
    }

    public function redirectIfNotAuth()
    {
        if (!$this->isAuth())
            header('location: SignIn.php');
    }

    public function redirectIfAuth()
    {
        // Used in page SignIn & SignUp
        if ($this->isAuth())
            header('location: index.php');
    }

    public function signUp()
    {
      
        if (isset($_POST['signUpBtn'])) {
            //var_dump($_POST);
            $username = $_POST['username'];
            $email = $_POST['email']; //
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];
            if ($password != $confirmPassword)
                \App\Alert::PrintMessage("Confirm Password not matched", 'Danger');
            else {
                $myDatabaseObj = new \App\DB();
                $insertStatement = "INSERT INTO `user` VALUES(NULL,?,?,?)"; // Sql injection
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
                    // Alert::PrintMessage("Hello, " . $rowArr['username'], 'Normal');
                    header("location:index.php");
                } else {
                    Alert::PrintMessage('Wrong password', 'Danger');
                }
            } else {
                Alert::PrintMessage('Invalid email', 'Danger');
            }
        }
    }
}
}