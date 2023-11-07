<?php
session_start();
$username = "";
$email    = "";

if(isset($_POST['login_user'])){
    try{
        include('include/dbconnect.php');
        $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
        $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;

        //Retrieve the user account information for the given username.
        $sql = "SELECT id, username, password FROM accounts WHERE username = :username and password = :password";
        $stmt = $pdo->prepare($sql);
        
        //Bind value.
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':password', $passwordAttempt);
        
        //Execute.
        $stmt->execute();
        
        //Fetch row.
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        //If $row is FALSE.
        if($user === false){
            header('location: login_failed.php');
        } else{       
            $_SESSION['username'] = $username;
            $_SESSION['counter'] = 0;
            header('location:index.php');
            exit();
        }
        }catch(PDOException $e){
            $title = 'An error has occurred';
            echo 'Database error: ' . $e->getMessage();
        }
    }
    else{
        $title = 'Login';
        ob_start();
        include 'login.html.php';
        $output = ob_get_clean();

    } include 'layout.html.php'
?>