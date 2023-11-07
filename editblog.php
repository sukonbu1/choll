<?php
session_start();
include 'include/dbconnect.php';
try{
    if(isset($_POST['updatepost'])){

        $sql = "UPDATE blog SET 
        title = :title,
        content = :content,
        image = :image
        WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':title', $_POST['title']);
        $stmt->bindValue(':content', $_POST['content']);
        $stmt->bindValue(':id', $_POST['id']); 
        $countfiles = count($_FILES['image']['name']);
    
        // Loop all image
        for($i = 0; $i < $countfiles; $i++) {
    
            // File name
            $filename = $_FILES['image']['name'][$i];
        
            // Location
            $target_file = './uploads/'.$filename;
        
            // file extension
            $file_extension = pathinfo(
                $target_file, PATHINFO_EXTENSION);
                
            $file_extension = strtolower($file_extension);

            // Valid image extension
            $valid_extension = array("png","jpeg","jpg");
            if(in_array($file_extension, $valid_extension)) {
                // Upload file
                if(move_uploaded_file(
                    $_FILES['image']['tmp_name'][$i],
                    $target_file)
                ) {
                    // Execute query
                    $stmt->bindValue(':image', $target_file);
                }
            }else{
                $stmt->bindValue(':image', NULL);
            }
        }   
        $stmt->execute();
        header('location: homepage.php');
    }else{
        $sql = 'SELECT * FROM blog WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->execute();
        $post = $stmt->fetch();
        $title = 'Edit post';

        ob_start();
        include 'editblog.html.php';
        $output = ob_get_clean();
    }
}catch(PDOException $e){
    $title = 'error has occured';
    $output =  'Error editing post: ' . $e->getMessage();
}
include 'layout.html.php';
?>