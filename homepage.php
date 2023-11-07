<?php
if(!isset($_SESSION)){
    session_start();
}
try {
    include 'include/dbconnect.php';
    $post_count = $pdo->query('SELECT COUNT(id) as num FROM blog');
    $stmt = $post_count->fetch(PDO::FETCH_ASSOC);

    $posts = $pdo->query('SELECT blog.id, blog.title, blog.date, blog.image, blog.content, accounts.username 
    FROM blog 
    JOIN accounts ON blog.author_id = accounts.id 
    ORDER BY blog.id DESC');

    $title = 'Greenwich Forum';
    ob_start();
    include 'homepage.html.php';
    $output = ob_get_clean();

}
    catch (PDOException $e) {
    echo 'connection error';
    echo $e->getMessage();
        
}include 'layout.html.php'
?>