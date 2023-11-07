<?php 
session_start();
$username = "";
$email    = "";

if(isset($_POST['reg_user'])){
    try{
        include('include/dbconnect.php');

        $user = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $pass2 = $_POST['password2'];	
         
        if($pass != $pass2){
            echo "<script type='text/javascript'>alert('Passwords do not match');
                    window.location='register.php';
                    </script>";
        }else{
            //Check if username exists
            $sql = "SELECT COUNT(username) AS num FROM accounts WHERE username =        :username";
            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(':username', $user);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if($row['num'] > 0){
               header('location: register_failed.php');
            }
            else{

                $stmt = $pdo->prepare("INSERT INTO accounts (username, email, password) 
                VALUES (:username,:email, :pw)");
                $stmt->bindParam(':username', $user);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':pw', $pass);
            
                if($stmt->execute()){
                    echo "<script type='text/javascript'>alert('Successfully registered');
                    window.location='login.php';
                    </script>";

                }else{
                    echo '<script>alert("An error occurred")</script>';
                }
            }
        }
        }catch(PDOException $e){
            $title = 'An error has occurred';
            $output = 'Database error: ' . $e->getMessage();
        }
    }else{
        $title = 'Create Account';
        ob_start();
        include 'register.html.php';
        $output = ob_get_clean();
    }include 'layout.html.php';
    
    ?>
