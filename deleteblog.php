<?php
try{
    include 'include/dbconnect.php';

    $sql = 'DELETE FROM blog WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $_POST['id']);
    $stmt->execute();
    header('location: homepage.php');
}catch(PDOException $e){
$title = 'An error has occured';
$output = 'Unable to connect to delete blog: ' .$e->getMessage();
}
include 'layout.html.php';
