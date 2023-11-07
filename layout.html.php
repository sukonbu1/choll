<?php
  if (isset($_GET['logout'])) {
          session_destroy();
          unset($_SESSION['username']);
          header("location: index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>
    <?=$title?>
  </title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/selfmade.css">
</head>

<body>


  <main>
  <?php include ('navbar.php')?>
  <?php if (isset($output)) : ?>
    <?=$output?>
  <?php endif; ?>
  </main>
  <footer>&copy; IJDB 2023</footer>
</body>


</html>
