<?php
session_start();


if(isset($_POST['createpost'])){
    try{
        include('include/dbconnect.php');


        $get_id_query = "SELECT id  as userid FROM accounts WHERE username = '{$_SESSION['username']}'";
        $sql2= $pdo->query($get_id_query);
        $author = $sql2->fetch(PDO::FETCH_ASSOC);

        $sql = 'INSERT INTO blog SET
        title = :title,
        date = CURDATE(),
        content = :content,
        author_id = :author_id,
        image = :image';

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':title', $_POST['title']);
        $stmt->bindValue(':content', $_POST['content']);
        $stmt->bindValue(':author_id', $author['userid']);

        // Count total image
        $countfiles = count($_FILES['image']['name']);
    
        // Prepared statement
        $query = "INSERT INTO blog(image) VALUES (:image)";
    
        $statement = $pdo->prepare($query);
    
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
                    // $statement->execute();
                }
            }else{
                $stmt->bindValue(':image', NULL);
            }
        }
        $stmt->execute();
        
        echo "File upload successfully";
        header('location: postsuccess');

        }catch(PDOException $e){
            $title = 'An error has occurred';
            echo 'Database error: ' . $e->getMessage();
        }
    }
    else{
        $title = 'Create a post';
        ob_start();
        include 'addblog.html.php';
        $output = ob_get_clean();
    } include 'layout.html.php'
?>